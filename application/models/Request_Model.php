<?php


class Request_Model extends CI_Model
{

    protected $fillable_columns = [
        "request_base",
        "tor_number",
        "employment",
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
        "head_of_units",
        "requestor_id",
        "requestor_name",
        "max_budget",
    ];

    function insert_request($data)
    {   
        $request_data = array_intersect_key($data, array_flip($this->fillable_columns));
        $this->db->insert('ea_requests', $request_data);
        return $this->db->insert_id();
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
