<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->template->set('pageParent', 'Dashboard');
		$this->template->set_default_layout('layouts/default');
	}

	public function index()
	{
		$this->template->render('dashboard');
	}
}
