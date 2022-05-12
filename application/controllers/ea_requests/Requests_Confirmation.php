<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requests_Confirmation extends CI_Controller {


    function __construct()
	{
		parent::__construct();
		$this->load->model('Request_Model', 'request');
		$this->load->model('Base_Model', 'base_model');
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
            $request_detail = $this->request->get_request_by_id($req_id);
            if ($level == 'fco_monitor') {
                $fco = $this->base_model->get_fco_monitor();
                $email_sent = $this->send_email_to_finance_teams($req_id, $fco['username']);
                
            } else {
                if($level == 'head_of_units') {
                    $ea_assosiate = $this->base_model->get_ea_assosiate();
                    $target_level = 'ea_assosiate';
                    $email_data = [
                        'approver_name' => $request_detail['head_of_units_name'],
                        'target_id' => $ea_assosiate['id'],
                        'target_name' => $ea_assosiate['username'],
                        'target_email' => $ea_assosiate['email'],
                    ];
                } else if ($level == 'ea_assosiate') {
                    $fco_monitor = $this->base_model->get_fco_monitor();
                    $target_level = 'fco_monitor';
                    $email_data = [
                        'approver_name' => $request_detail['ea_assosiate_name'],
                        'target_id' => $fco_monitor['id'],
                        'target_name' => $fco_monitor['username'],
                        'target_email' => $fco_monitor['email'],
                    ];
                }
                $email_sent = $this->send_approved_request($req_id, $target_level, $email_data);
            }
            if($email_sent) {
                $updated = $this->request->update_status($req_id, $approver_id, $status, $level);
                if($updated) {
                    $data['message'] = "EA Requests #EA-$req_id has been approved";
                } else {
                    $data['message'] = "Something wrong, please try again later";
                }
            } else {
                    $data['message'] = "Something wrong, please try again later";
            }
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
		$enc_req_id = encrypt($detail['r_id']);
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
                    <p>'.$data['preview'].'</p>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-detail">
                        <tbody>
                        <tr>
                            <td align="left">
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td> <a href="'.base_url('ea_requests/outcoming-requests/detail').'/'.$enc_req_id.'" target="_blank">DETAILS</a> </td>
                                </tr>
                                </tbody>
                            </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    ';

        $text = $this->load->view('template/email', $data, true);
        $mail->setFrom('no-reply@faster.bantuanteknis.id', 'FASTER-FHI360');
        $mail->addAddress($requestor['email']);
        $mail->Subject = "Rejected EA Request";
        $mail->isHTML(true);
        $mail->Body = $text;
        $sent=$mail->send();

		if ($sent) {
			return true;
		} else {
			return false;
		}
    }

    private function send_approved_request($req_id, $level, $email_detail) {
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
		$enc_req_id = encrypt($detail['r_id']);

		$data['preview'] = '<p>EA Request #EA-'.$detail['r_id'].' has been approved by '.$email_detail['approver_name'].'</p>
                             <p>Please review following requests</p>
             ';
        $data['content'] = '
                    <p>Dear, '.$email_detail['target_name'].',</p> 
                    <p>'.$data['preview'].'</p>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-detail">
                        <tbody>
                        <tr>
                            <td align="left">
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td> <a href="'.base_url('ea_requests/outcoming-requests/detail').'/'.$enc_req_id.'" target="_blank">DETAILS</a> </td>
                                </tr>
                                </tbody>
                            </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>

					<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                        <tbody>
                        <tr>
                            <td align="left">
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
									<td> <a href="'.base_url('ea_requests/requests_confirmation').'?req_id='.$enc_req_id.'&approver_id='.$email_detail['target_id'].'&status=2&level='.$level.'" target="_blank">APPROVE</a> </td>
                                </tr>
                                </tbody>
                            </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
					
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-danger">
                        <tbody>
                        <tr>
                            <td align="left">
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
									<td> <a <a href="'.base_url('ea_requests/requests_confirmation').'?req_id='.$enc_req_id.'&approver_id='.$email_detail['target_id'].'&status=3&level='.$level.'" target="_blank">REJECT</a> </td>
                                </tr>
                                </tbody>
                            </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    ';

        $text = $this->load->view('template/email', $data, true);
        $mail->setFrom('no-reply@faster.bantuanteknis.id', 'FASTER-FHI360');
        $mail->addAddress($email_detail['target_email']);
        $mail->Subject = "EA Requests";
        $mail->isHTML(true);
        $mail->Body = $text;
        $sent=$mail->send();

		if ($sent) {
			return true;
		} else {
			return false;
		}
    }

    private function send_email_to_finance_teams($req_id, $approver_name) {
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
		$enc_req_id = encrypt($detail['r_id']);

		$data['preview'] = '<p>EA Request #EA-'.$detail['r_id'].' has been approved by '.$approver_name.'</p>
                             <p>Please process payment request, check on following details</p>
             ';
        $data['content'] = '
                    <p>Dear Finance Teams,</p> 
                    <p>'.$data['preview'].'</p>
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-detail">
                        <tbody>
                        <tr>
                            <td align="left">
                            <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td> <a href="'.base_url('ea_requests/outcoming-requests/detail').'/'.$enc_req_id.'" target="_blank">DETAILS</a> </td>
                                </tr>
                                </tbody>
                            </table>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    ';

        $text = $this->load->view('template/email', $data, true);
        $mail->setFrom('no-reply@faster.bantuanteknis.id', 'FASTER-FHI360');
		$finance_teams = $this->base_model->get_finance_teams();
		foreach($finance_teams as $user) {
			$mail->addAddress($user['email']);
		}
        $mail->Subject = "Approved EA Requests for review by Finance Teams";
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
