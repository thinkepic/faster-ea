<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_request extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Request_Model', 'request');
		$this->template->set('pageParent', 'Request');
		$this->template->set_default_layout('layouts/default');
	}

	public function index()
	{
		$this->template->set('page', 'Data request');
		$requests = $this->db->select('*')->from('ea_requests')->get()->result();
		$data['requests'] = $requests;
		$this->template->render('request/index', $data);
	}

	public function create()
	{
		$this->template->set('assets_css', [
			site_url('assets/css/demo1/pages/wizard/wizard-3.css')
		]);
		$this->template->set('page', 'Create request');
		$this->template->render('request/create');
	}

	public function detail()
	{
		$this->template->set('page', 'Data request');
		$this->template->render('request/detail');
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

			// Soon -> Get from session
			$requestor_data = [
				'requestor_id' => 999,
				'requestor_name' => 'Fadel Al Fayed',
				'requestor_email' => 'fadelalfayed27@gmail.com',
				'head_of_units_id' => 9999,
			];
			$payload = array_merge($this->input->post(), $requestor_data);
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
        $this->datatable->select('requestor_name, request_base, employment, originating_city, departure_date, return_date', true);
        $this->datatable->from('ea_requests');

        echo $this->datatable->generate();
    }

	public function test()
    {	
        echo json_encode($this->cookie);
    }

}
