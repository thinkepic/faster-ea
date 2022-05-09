<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Incoming_requests extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Request_Model', 'request');
		$this->load->model('Base_Model', 'base_model');
		$this->template->set('pageParent', 'Incoming Requests');
		$this->template->set_default_layout('layouts/default');
	}

	public function requests_for_review()
	{
		$this->template->set('page', 'Requests for review');
		$requests = $this->db->select('*')->from('ea_requests')->get()->result();
		$data['requests'] = $requests;
		$data['status'] = 'requests_for_review';
		$this->template->render('incoming_requests/requests_for_review', $data);
	}

	public function pending()
	{
		$this->template->set('page', 'Pending requests');
		$requests = $this->db->select('*')->from('ea_requests')->get()->result();
		$data['requests'] = $requests;
		$data['status'] = 'pending';
		$this->template->render('incoming_requests/pending', $data);
	}

	public function rejected()
	{
		$this->template->set('page', 'Rejected requests');
		$requests = $this->db->select('*')->from('ea_requests')->get()->result();
		$data['requests'] = $requests;
		$data['status'] = 'rejected';
		$this->template->render('incoming_requests/rejected', $data);
	}

	public function done()
	{
		$this->template->set('page', 'Done requests');
		$requests = $this->db->select('*')->from('ea_requests')->get()->result();
		$data['requests'] = $requests;
		$data['status'] = 'done';
		$this->template->render('incoming_requests/done', $data);
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
		$this->template->render('incoming_requests/create', $data);
	}

	public function datatable($status = null)
    {	
		$user_id = $this->user_data->userId;

		$this->datatable->select('u.username as requestor_name, ea.request_base, ea.employment, ea.originating_city,
		DATE_FORMAT(ea.departure_date, "%d %M %Y") as departure_date, DATE_FORMAT(ea.return_date, "%d %M %Y") as return_date,
		DATE_FORMAT(ea.created_at, "%d %M %Y - %H:%i") as created_at, ea.id', true);
        $this->datatable->from('ea_requests ea');
        $this->datatable->join('tb_userapp u', 'u.id = ea.requestor_id');
        $this->datatable->join('ea_requests_status st', 'ea.id = st.request_id');
		if($status == 'requests_for_review') {
			if (is_head_of_units() || is_line_supervisor()) {
				$this->datatable->where('st.head_of_units_status =', 1);
				$this->datatable->where('st.head_of_units_id =', $user_id);
			} else if (is_ea_assosiate()) {
				$this->datatable->where('st.head_of_units_status =', 2);
				$this->datatable->where('st.ea_assosiate_status =', 1);
			} else if (is_fco_monitor()) {
				$this->datatable->where('st.ea_assosiate_status =', 2);
				$this->datatable->where('st.fco_monitor_status =', 1);
			} else if (is_finance_teams()) {
				$this->datatable->where('st.fco_monitor_status =', 2);
				$this->datatable->where('st.finance_status =', 1);
			} else {
				$this->datatable->where('st.head_of_units_id =', null);
			}
		}

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
}
