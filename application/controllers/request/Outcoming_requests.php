<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Outcoming_requests extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Request_Model', 'request');
		$this->load->model('Base_Model', 'base_model');
		$this->template->set('pageParent', 'Outcoming Requests');
		$this->template->set_default_layout('layouts/default');
	}

	public function pending()
	{
		$this->template->set('page', 'Pending requests');
		$requests = $this->db->select('*')->from('ea_requests')->get()->result();
		$data['requests'] = $requests;
		$this->template->render('request/index', $data);
	}

	public function create()
	{
		$this->template->set('assets_css', [
			site_url('assets/css/demo1/pages/wizard/wizard-3.css')
		]);
		$data['head_of_units'] = $this->base_model->get_head_of_units($this->user_data->userId);
		$data['requestor_data'] = $this->user_data;
		$this->template->set('page', 'Create request');
		$this->template->render('request/create', $data);
	}

	public function detail($id = null)
	{
		$id = decrypt($id);
		$detail = $this->request->get_request_by_id($id);
		if($detail) {
			// echo json_encode($data);
			$data['detail'] = $detail;
			$this->template->set('page', 'Requests detail');
			$this->template->render('request/detail', $data);
		} else {
			show_404();
		}
	}

	public function store()
	{	

		$this->form_validation->set_rules('request_base', 'Request base', 'required');
		$this->form_validation->set_rules('departure_date', 'Departure date', 'required');
		$this->form_validation->set_rules('return_date', 'Return date', 'required');
		$this->form_validation->set_rules('originating_city', 'City', 'required');
		$this->form_validation->set_rules('country_director_notified', 'Country director notified', 'required');
		$this->form_validation->set_rules('travel_advance', 'Travel advance', 'required');
		$this->form_validation->set_rules('need_documents', 'Need documents', 'required');
		$this->form_validation->set_rules('car_rental', 'Car rental', 'required');
		$this->form_validation->set_rules('hotel_reservations', 'Hotel reservations', 'required');
		$this->form_validation->set_rules('other_transportation', 'Other trasportation', 'required');
		$this->form_validation->set_rules('head_of_units_email', 'Head of units email', 'required');

		if ($this->form_validation->run()) {

			$payload = $this->input->post();
			if ($_FILES['exteral_invitation']['name']) {
				$dir = './uploads/exteral_invitation/';
				if (!is_dir($dir)) {
					mkdir($dir, 0777, true);
				}

				$config['upload_path']          = $dir;
				$config['allowed_types']        = 'xls|xlsx|pdf|jpg|png|jpeg';
				$config['max_size']             = 10048;
				$config['encrypt_name']         = true;

				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('exteral_invitation')) {
					$payload['exteral_invitation_file'] = $this->upload->data('file_name');
				} else {
					$response = ['status' => false, 'message' => strip_tags($this->upload->display_errors())]; die;
				}
			} else {
				$payload['exteral_invitation_file'] = null;
			}

			if ($_FILES['car_rental_memo']['name']) {
				$dir2 = './uploads/car_rental_memo/';
				if (!is_dir($dir2)) {
					mkdir($dir2, 0777, true);
				}

				$config2['upload_path']          = $dir2;
				$config2['allowed_types']        = 'xls|xlsx|pdf|jpg|png|jpeg';
				$config2['max_size']             = 10048;
				$config2['encrypt_name']         = true;

				$this->load->library('upload', $config2);
				$this->upload->initialize($config2);

				if ($this->upload->do_upload('car_rental_memo')) {
					$payload['car_rental_memo'] = $this->upload->data('file_name');
				} else {
					$response = ['status' => false, 'message' => strip_tags($this->upload->display_errors())]; die;
				}
			} else {
				$payload['car_rental_memo'] = null;
			}

			// // Soon -> Get from session
			// $requestor_data = [
			// 	'requestor_id' => 999,
			// 	'requestor_name' => 'Fadel Al Fayed',
			// 	'requestor_email' => 'fadelalfayed27@gmail.com',
			// ];
			// $payload = array_merge($payload, $requestor_data);
			$saved = $this->request->insert_request($payload);
			if($saved) {
				$response['message'] = 'Your request has been sent';
				$response['data'] = $payload;
				$status_code = 200;
			} else {
				$response['errors'] = $this->form_validation->error_array();
				$response['message'] = 'Failed to send request';
				$status_code = 422;
			}
		} else {
			$response['errors'] = $this->form_validation->error_array();
			$response['message'] = 'Please fill all required fields';
			$status_code = 422;
		}

		$this->send_json($response, $status_code);
	}

	public function datatable()
    {	
        $this->datatable->select('requestor_name, request_base, employment, originating_city,
		DATE_FORMAT(departure_date, "%d %M %Y") as departure_date, DATE_FORMAT(return_date, "%d %M %Y") as return_date,
		DATE_FORMAT(created_at, "%d %M %Y") as created_at, id', true);
        $this->datatable->from('ea_requests');
        $this->datatable->order_by('created_at', 'desc');
		$this->datatable->edit_column('id', "$1", 'encrypt(id)');
        echo $this->datatable->generate();
    }

	public function set_status() {
		if ($this->input->is_ajax_request() && $this->input->server('REQUEST_METHOD') === 'POST') {
			$id =  $this->input->post('id');
			$status =  $this->input->post('status');
			$status_field =  $this->input->post('level');
			$updated = $this->request->update_status($id, $status, $status_field);
			if($updated) {
				$response['success'] = true;
				$response['message'] = 'Status has been updated!';
				$status_code = 200;
				$this->send_json($response, $status_code);
			} else {
				$response['success'] = false;
				$response['message'] = 'Failed to update status!';
				$status_code = 400;
				$this->send_json($response, $status_code);
			}
		} else {
			exit('No direct script access allowed');
		}
	}

	public function test() {
		echo json_encode($this->user_data);
	}

	public function get_head_of_units() {
		echo json_encode($this->base_model->get_head_of_units($this->user_data->userId));
	}

}
