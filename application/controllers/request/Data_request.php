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
		// $this->template->set('assets_css', [
		// 	site_url('assets/css/pages/home.css')
		// ]);
		$this->template->set('page', 'Data request');
		$this->template->render('request/index');
	}

}
