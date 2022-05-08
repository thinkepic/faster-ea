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
		$data['status'] = 'pending';
		$this->template->render('outcoming_requests/pending', $data);
	}

	public function rejected()
	{
		$this->template->set('page', 'Rejected requests');
		$requests = $this->db->select('*')->from('ea_requests')->get()->result();
		$data['requests'] = $requests;
		$data['status'] = 'rejected';
		$this->template->render('outcoming_requests/rejected', $data);
	}

	public function done()
	{
		$this->template->set('page', 'Done requests');
		$requests = $this->db->select('*')->from('ea_requests')->get()->result();
		$data['requests'] = $requests;
		$data['status'] = 'done';
		$this->template->render('outcoming_requests/done', $data);
	}

	public function create()
	{
		$this->template->set('assets_css', [
			site_url('assets/css/demo1/pages/wizard/wizard-3.css')
		]);
		$user_id = $this->user_data->userId;
		$data['head_of_units'] = $this->base_model->get_head_of_units($user_id);
		$data['requestor_data'] = $this->request->get_requestor_data($user_id);
		$this->template->set('page', 'Create request');
		$this->template->render('outcoming_requests/create', $data);
	}

	public function detail($id = null)
	{
		$id = decrypt($id);
		$detail = $this->request->get_request_by_id($id);
		if($detail) {
			$requestor_data = $this->request->get_requestor_data($detail['requestor_id']);
			$data['detail'] = $detail;
			$data['requestor_data'] = $requestor_data;
			// echo json_encode($data);
			$this->template->set('page', 'Requests detail');
			$this->template->render('outcoming_requests/detail', $data);
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
		$this->form_validation->set_rules('head_of_units_id', 'Head of units', 'required');

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

	public function datatable($status = null)
    {	
        $this->datatable->select('u.username as requestor_name, ea.request_base, ea.employment, ea.originating_city,
		DATE_FORMAT(ea.departure_date, "%d %M %Y") as departure_date, DATE_FORMAT(ea.return_date, "%d %M %Y") as return_date,
		DATE_FORMAT(ea.created_at, "%d %M %Y - %H:%i") as created_at, ea.id', true);
        $this->datatable->from('ea_requests ea');
        $this->datatable->join('tb_userapp u', 'u.id = ea.requestor_id');
        $this->datatable->join('ea_requests_status st', 'ea.id = st.request_id');
		if($status == 'pending') {
			$this->datatable->where('st.head_of_units_status !=', 3);
			$this->datatable->where('st.ea_assosiate_status !=', 3);
			$this->datatable->where('st.fco_monitor_status !=', 3);
			$this->datatable->where('st.finance_status !=', 3);
			$this->datatable->where('st.finance_status !=', 2);
		}
		if($status == 'rejected') {
			$this->datatable->where('st.head_of_units_status =', 3);
			$this->datatable->or_where('st.ea_assosiate_status =', 3);
			$this->datatable->or_where('st.fco_monitor_status =', 3);
			$this->datatable->or_where('st.finance_status =', 3);
		}
		if($status == 'done') {
			$this->datatable->where('st.head_of_units_status =', 2);
			$this->datatable->where('st.ea_assosiate_status =', 2);
			$this->datatable->where('st.fco_monitor_status =', 2);
			$this->datatable->where('st.finance_status =', 2);
		}
		$this->datatable->where('ea.requestor_id =', $this->user_data->userId);
        $this->datatable->order_by('created_at', 'desc');
		$this->datatable->edit_column('id', "$1", 'encrypt(id)');
        echo $this->datatable->generate();
    }

	public function set_status() {
		if ($this->input->is_ajax_request() && $this->input->server('REQUEST_METHOD') === 'POST') {
			$id =  $this->input->post('id');
			$status =  $this->input->post('status');
			$level =  $this->input->post('level');
			$updated = $this->request->update_status($id, $status, $level);
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
}
