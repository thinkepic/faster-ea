<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requests_Confirmation extends CI_Controller {


    function __construct()
	{
		parent::__construct();
		$this->load->model('Request_Model', 'request');
		$this->template->set_default_layout('layouts/blank');
	}

	public function index()
	{   
        $req_id = decrypt($this->input->get('req_id'));
        $approver_id = $this->input->get('approver_id');
        $status = $this->input->get('status');
        $level = $this->input->get('level');
		if($status == 3) {
            $email_sent = $this->send_rejected_requests($req_id, $level);
            if($email_sent) {
                $updated = $this->request->update_status($req_id, $approver_id, $status, $level);
                if($updated) {
                    $data['message'] = "EA Requests #EA-$req_id has been rejected";
                } else {
                    $data['message'] = "Something wrong, please try again later";
                }
            } else {
                    $data['message'] = "Something wrong, please try again later";
            }
        } else {
            $data['message'] = "EA Requests #EA-$req_id has been approved";
        }
        $this->template->render('requests_confirmation/index', $data);
	}

    private function send_rejected_requests($req_id, $level) {
        $this->load->library('Phpmailer_library');
        $mail = $this->phpmailer_library->load();
        $mail->isSMTP();
        $mail->SMTPSecure = 'ssl';
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->Port = 465;
        $mail->SMTPDebug = 0; 
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['EMAIL_USERNAME'];
        $mail->Password = $_ENV['EMAIL_PASSWORD'];
		$detail = $this->request->get_request_by_id($req_id);
		$requestor = $this->request->get_requestor_data($detail['requestor_id']);
        if($level == 'head_of_units') {
            $rejected_by = $detail['head_of_units_name'];
        } else if($level == 'ea_assosiate') {
            $rejected_by = $detail['ea_assosiate_name'];
        } else if($level == 'fco_monitor') {
            $rejected_by = $detail['fco_monitor_name'];
        }

		$data['preview'] = '<p>Your EA Request #EA-'.$detail['r_id'].' has been rejected by '.$rejected_by.'</p>';
        $data['content'] = '
                    <p>Dear, '.$requestor['username'].',</p> 
                    <p>'.$data['preview'].'</p>';

        $text = $this->load->view('template/email', $data, true);
        $mail->setFrom('no-reply@faster.bantuanteknis.id', 'FASTER-FHI360');
        $mail->addAddress($requestor['email']);
        $mail->Subject = "Rejected EA Requests";
        $mail->isHTML(true);
        $mail->Body = $text;
        $sent=$mail->send();

		if ($sent) {
			return true;
		} else {
			return false;
		}
    }
}
