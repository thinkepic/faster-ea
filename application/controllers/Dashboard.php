<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->template->set('pageParent', 'Dashboard');
		$this->template->set_default_layout('layouts/default');
	}

	public function index()
	{
		$this->template->set('page', '');
		$this->template->render('dashboard');
	}
}
