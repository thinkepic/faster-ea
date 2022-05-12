<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Spipu\Html2Pdf\Html2Pdf;
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

    function attach_payment_request() {
        ob_start();
		$detail = $this->request->get_request_by_id(55);
		$data['requestor'] = $this->request->get_requestor_data($detail['requestor_id']);
		$data['detail'] = $detail;
		$content = $this->load->view('template/form_payment_reimburstment', $data, true);
        $html2pdf = new Html2Pdf('P', [210, 330], 'en', true, 'UTF-8', array(15, 10, 15, 10));
        $html2pdf->setDefaultFont('arial');
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->setTestTdInOnePage(false);
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $pdf = $html2pdf->Output('Payment Request Form.pdf', 'S');
		return $pdf;
	}
}
