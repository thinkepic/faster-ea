<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Spipu\Html2Pdf\Html2Pdf;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class MY_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->helper('cookie');
        $token = get_cookie('fast_token');
        if (!$token) {
            redirect('https://staging.faster.bantuanteknis.id/Login');
        } else {
            $key = 'p3g3lnajarS!@#$)*(JHJHFGHK&H#&^*&!#HUYT*&!';
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

    function attach_payment_request($req_id) {
        ob_start();
		$detail = $this->request->get_request_by_id($req_id);
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

    function attach_ea_form($req_id) {

		$detail = $this->request->get_excel_data_by_id($req_id);
		$requestor = $this->request->get_requestor_data($detail['requestor_id']);
		$inputFileName = FCPATH.'assets/excel/ea_form.xlsx';
		$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		$spreadsheet = $reader->load($inputFileName);
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('C7', $requestor['username']);
		$sheet->setCellValue('AK2', 'EA No. ' . $detail['ea_number']);
		$sheet->setCellValue('AD6', $detail['request_date']);
		$sheet->setCellValue('AD8', $detail['originating_city']);
		$sheet->setCellValue('AD10', $detail['departure_date']);
		$sheet->setCellValue('AM10', $detail['return_date']);
		$sheet->setCellValue('AG13', $requestor['project_name']);
		$sheet->setCellValue('C10', $requestor['project_name']);
		$sheet->setCellValue('C16', $requestor['email']);
		$sheet->setCellValue('G17', 'Employee #' . $requestor['employee_id']);
		$sheet->setCellValue('AK15', $detail['ea_assosiate_name']);
		$sheet->setCellValue('AL16', '$' . $detail['max_budget_usd']);
		$sheet->setCellValue('C77', $detail['special_instructions']);
		$sheet->setCellValue('C18', 'X');
		if($detail['country_director_notified'] == 'Yes') {
			$sheet->setCellValue('X18', 'X');
		}

		if($detail['employment'] == 'On behalf') {
			if($detail['employment_status'] == 'Consultant') {
				$sheet->setCellValue('C21', 'X');
				$first_participants = $detail['participants'][0];
				$sheet->setCellValue('G20', $first_participants['title']. ' # ' . $first_participants['name']);
			} else {
				$sheet->setCellValue('C23', 'X');
				if($detail['employment_status'] == 'Other') {
					$first_participants = $detail['participants'][0];
					$other_text = $first_participants['title']. ' # ' . $first_participants['name'];
				} else {
					$other_text = 'Group: ' . $detail['participant_group_name'] . ' - Number of participants: ' . $detail['number_of_participants'];
				}
				$sheet->setCellValue('K23', $other_text);
			}
		}

		// Signature
		$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
		$drawing->setName('Traveler signature');
		$drawing->setPath(FCPATH.'assets/images/signature/' . $requestor['signature']); // put your path and image here
		$drawing->setCoordinates('I84');
		$drawing->setHeight(40);
		$drawing->setWorksheet($spreadsheet->getActiveSheet());

		if($detail['head_of_units_status'] == 2) {
			$drawing2 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
			$drawing2->setName('Head of units signature');
			$drawing2->setPath(FCPATH.'assets/images/signature/' . $detail['head_of_units_signature']); // put your path and image here
			$drawing2->setCoordinates('I88');
			$drawing2->setHeight(35);
			$drawing2->setWorksheet($spreadsheet->getActiveSheet());

		} 

		// if($detail['ea_assosiate_status'] == 2) {
		// 	$drawing3 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
		// 	$drawing3->setName('EA signature');
		// 	$drawing3->setPath(FCPATH.'assets/images/signature/' . $detail['ea_assosiate_signature']); // put your path and image here
		// 	$drawing3->setCoordinates('AK89');
		// 	$drawing3->setHeight(50);
		// 	$drawing3->setOffsetY(-15); 
		// 	$drawing3->setWorksheet($spreadsheet->getActiveSheet());
		// } 

		if($detail['fco_monitor_status'] == 2) {
			$drawing4 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
			$drawing4->setName('FCO signature');
			$drawing4->setPath(FCPATH.'assets/images/signature/' . $detail['fco_monitor_signature']); // put your path and image here
			$drawing4->setCoordinates('V28');
			$drawing4->setHeight(30);
			$drawing4->setWorksheet($spreadsheet->getActiveSheet());

		} 

		if($detail['finance_status'] == 2) {
			$drawing5 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
			$drawing5->setName('Finance signature');
			$drawing5->setPath(FCPATH.'assets/images/signature/' . $detail['finance_signature']); // put your path and image here
			$drawing5->setCoordinates('AI88');
			$drawing5->setOffsetY(-15); 
			$drawing5->setHeight(50);
			$drawing5->setWorksheet($spreadsheet->getActiveSheet());
		} 

		$destinations= $detail['destinations'];
		// 1st destination
		$sheet->setCellValue('G26', $destinations[0]['city']);
		$sheet->setCellValue('P26', $destinations[0]['arriv_date']);
		$sheet->setCellValue('W26', $destinations[0]['depar_date']);
		$sheet->setCellValue('C29', $destinations[0]['project_number']);
		$sheet->setCellValue('AL28', $destinations[0]['lodging'] + 0);
		$sheet->setCellValue('AL30', $destinations[0]['meals'] + 0);
		$sheet->setCellValue('AL32', $destinations[0]['total_lodging_and_meals'] + 0);
		$sheet->setCellValue('AL34', $destinations[0]['night'] + 0);
		$sheet->setCellValue('AL36', $destinations[0]['total'] + 0);

		if(count($destinations) > 1) {
			// 2nd destination
			$sheet->setCellValue('G39', $destinations[1]['city']);
			$sheet->setCellValue('P39', $destinations[1]['arriv_date']);
			$sheet->setCellValue('W39', $destinations[1]['depar_date']);
			$sheet->setCellValue('C42', $destinations[1]['project_number']);
			$sheet->setCellValue('AL41', $destinations[1]['lodging'] + 0);
			$sheet->setCellValue('AL43', $destinations[1]['meals'] + 0);
			$sheet->setCellValue('AL45', $destinations[1]['total_lodging_and_meals'] + 0);
			$sheet->setCellValue('AL47', $destinations[1]['night'] + 0);
			$sheet->setCellValue('AL49', $destinations[1]['total'] + 0);
			if($detail['fco_monitor_status'] == 2) {
				$drawing6 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
				$drawing6->setName('FCO signature');
				$drawing6->setPath(FCPATH.'assets/images/signature/' . $detail['fco_monitor_signature']); // put your path and image here
				$drawing6->setCoordinates('V41');
				$drawing6->setHeight(30);
				$drawing6->setWorksheet($spreadsheet->getActiveSheet());
			} 
		}

		if(count($destinations) > 2) {
			// 3rd destination
			$sheet->setCellValue('G52', $destinations[2]['city']);
			$sheet->setCellValue('P52', $destinations[2]['arriv_date']);
			$sheet->setCellValue('W52', $destinations[2]['depar_date']);
			$sheet->setCellValue('C55', $destinations[2]['project_number']);
			$sheet->setCellValue('AL54', $destinations[2]['lodging'] + 0);
			$sheet->setCellValue('AL56', $destinations[2]['meals'] + 0);
			$sheet->setCellValue('AL58', $destinations[2]['total_lodging_and_meals'] + 0);
			$sheet->setCellValue('AL60', $destinations[2]['night'] + 0);
			$sheet->setCellValue('AL62', $destinations[2]['total'] + 0);
			if($detail['fco_monitor_status'] == 2) {
				$drawing7 = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
				$drawing7->setName('FCO signature');
				$drawing7->setPath(FCPATH.'assets/images/signature/' . $detail['fco_monitor_signature']); // put your path and image here
				$drawing7->setCoordinates('V54');
				$drawing7->setHeight(30);
				$drawing7->setWorksheet($spreadsheet->getActiveSheet());
			} 
		}

		if($detail['travel_advance'] == 'Yes') {
			$sheet->setCellValue('V68', 'X');
			$sheet->setCellValue('AL79', '80%');
			$total_advance = ($detail['total_destinations_cost'] + 1000000) * 0.8;
			$sheet->setCellValue('AL81', $total_advance);
		} else {
			$sheet->setCellValue('Y68', 'X');
			$sheet->setCellValue('AL79', '');
			$sheet->setCellValue('AL81', $detail['total_destinations_cost'] + 1000000);
		}

		if($detail['need_documents'] == 'Yes') {
			$sheet->setCellValue('V71', 'X');
		} else {
			$sheet->setCellValue('Y71', 'X');
		}

		if($detail['car_rental'] == 'Yes') {
			$sheet->setCellValue('V72', 'X');
		} else {
			$sheet->setCellValue('Y72', 'X');
		}

		if($detail['hotel_reservations'] == 'Yes') {
			$sheet->setCellValue('V73', 'X');
		} else {
			$sheet->setCellValue('Y73', 'X');
		}

		if($detail['other_transportation'] == 'Yes') {
			$sheet->setCellValue('V74', 'X');
		} else {
			$sheet->setCellValue('Y74', 'X');
		}

		$writer = new Xlsx($spreadsheet);
		$ea_number = $detail['ea_number'];
        $current_time = date('d-m-Y h:i:s');
        $filename = "$ea_number Request_Form/$current_time.xlsx";
		$path = FCPATH.'assets/excel/sent_ea_form.xlsx';
		$writer->save($path);
        $excel = [
            'path' => $path,
            'file_name' => $filename,
        ];
        return $excel;
	}

	function delete_ea_excel() {
		$this->load->helper('file');
		$excel_path = './assets/excel/sent_ea_form.xlsx';
		unlink($excel_path);
	}
}
