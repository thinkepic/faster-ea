<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class MY_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->helper('cookie');
        $token = get_cookie('fast_token');
        if (!$token) {
            redirect($_ENV['loginUrl']);
        } else {
            $key = $_ENV['secretKey'];
            $user_data = JWT::decode($token, new Key($key, 'HS256'));
            $this->user_data = $user_data;
        }
    }


    function send_json($data, $status_code = 200)
    {
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($status_code)
            ->set_output(json_encode(array_merge($data, ['code' => $status_code])));
    }
}
