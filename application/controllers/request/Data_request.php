<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_request extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->template->set('pageParent', 'Request');
		$this->template->set_default_layout('layouts/default');
	}

	public function index()
	{
		$this->template->set('page', 'Data request');
		$this->template->render('request/index');
	}

	public function create()
	{
		$this->template->set('assets_css', [
			site_url('assets/css/demo1/pages/wizard/wizard-3.css')
		]);
		// $this->template->set('assets_js', [
		// 	site_url('assets/js/demo1/pages/wizard/wizard-3.js')
		// ]);
		$this->template->set('page', 'Create request');
		$this->template->render('request/create');
	}

	public function store()
	{	
		echo json_encode($this->input->post());

		// $this->form_validation->set_rules('meta_title', 'Judul', 'required');
		// $this->form_validation->set_rules('summary', 'Deskripsi', 'required');

		// if ($this->form_validation->run()) {
		// 	$status_code = 200;
		// } else {
		// 	$response['errors'] = $this->form_validation->error_array();
		// 	$response['message'] = 'Periksa kembali isian anda';
		// 	$status_code = 422;
		// }

		// $this->send_json($response, $status_code);
	}

}
