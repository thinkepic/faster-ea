<?php


class Request_Model extends CI_Model
{

    protected $fillable_columns = [
        "request_base",
        "tor_number",
        "employment",
        "employment_status",
        "participant_group_name",
        "participant_group_email",
        "participant_group_contact_person",
        "number_of_participants",
        "originating_city",
        "departure_date",
        "return_date",
        "country_director_notified",
        "travel_advance",
        "need_documents",
        "document_description",
        "car_rental",
        "hotel_reservations",
        "hotel_check_in",
        "hotel_check_out",
        "preferred_hotel",
        "other_transportation",
        "special_instructions",
        "max_budget",
        "head_of_units_id",
        "head_of_units_email",
        "requestor_id",
        "requestor_name",
        "requestor_email",
    ];

    function insert_request($data)
    {   
        $data['departure_date'] = date('Y-m-d', strtotime($data['departure_date']));
		$data['return_date'] = date('Y-m-d', strtotime($data['return_date']));
        $data['hotel_check_in'] = date('Y-m-d', strtotime($data['hotel_check_in']));
		$data['hotel_check_out'] = date('Y-m-d', strtotime($data['hotel_check_out']));

        $employment = $data['employment'];
        
        if($employment == 'On behalf') {
            $employment_status = $data['employment_status'];
            $participants_name = $data['participant_name'];
            if($employment_status || $employment_status == 'Consultant' || $employment_status == 'Other') {
                $data['number_of_participants'] = count($participants_name);
            }
        }

        $request_data = array_intersect_key($data, array_flip($this->fillable_columns));
        $this->db->trans_start();

        $this->db->insert('ea_requests', $request_data);
        $request_id =  $this->db->insert_id();

        if($employment == 'On behalf') {
            if($employment_status == 'Consultant' || $employment_status == 'Other') {
                $participants_email = $data['participant_email'];
                $participants_title = $data['participant_title'];
                for ($i = 0; $i < count($participants_name); $i++) {
                    $this->db->insert('ea_requests_participants', [
                        'request_id' => $request_id,
                        'name' => $participants_name[$i],
                        'email' => $participants_email[$i],
                        'title' => $participants_title[$i],
                    ]);
                }
            }
        }

        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    function update_request($request_id, $data)
    {
        $update_data = array_intersect_key($data, array_flip($this->fillable_columns));
        $this->db->where('id', $request_id)->update('ea_requests', $update_data);
        return $this->db->affected_rows() === 1;
    }


    function delete_request($request_id)
    {
        $this->db->where('id', $request_id)->delete('ea_requests');
        return $this->db->affected_rows() === 1;
    }
}
