<?php



class MY_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
    }


    function send_json($data, $status_code = 200)
    {
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($status_code)
            ->set_output(json_encode(array_merge($data, ['code' => $status_code])));
    }
}



class Admin_Controller extends MY_Controller
{

    function __construct()
    {
        parent::__construct();


        if (!$this->session->userdata('logged_in')) {
            redirect('login');
        }
    }
}
