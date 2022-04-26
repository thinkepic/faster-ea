<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->template->set_default_layout('layouts/blank');
	}

	public function login()
	{   
        $this->template->set('assets_css', [
			site_url('assets/css/demo1/pages/login/login-6.css')
		]);
        $this->template->set('page', 'Login');
		$this->template->render('auth/login');

	}
}
