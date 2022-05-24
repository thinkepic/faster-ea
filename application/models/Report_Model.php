<?php


class Report_Model extends CI_Model
{

    function get_report_data_by_id($id) {
        $request_data =  $this->db->select('r.id as r_id, CONCAT("EA", r.id) AS ea_number, DATE_FORMAT(r.created_at, "%d %M %Y - %H:%i") as request_date,
        DATE_FORMAT(r.departure_date, "%d %M %Y") as d_date, DATE_FORMAT(r.return_date, "%d %M %Y") as r_date,
        r.*,
        ')
        ->from('ea_requests r')
        ->where('r.id', $id)
        ->get()->row_array();
        if(!$request_data) {
            return false;
        }
        $destinations = $this->db->select('*, format(meals,2,"de_DE") as d_meals, format(lodging,2,"de_DE") as d_lodging,
        format(total_lodging_and_meals,2,"de_DE") as d_total_lodging_and_meals, format(total,2,"de_DE") as d_total,
        DATE_FORMAT(departure_date, "%d %M %Y") as depar_date, DATE_FORMAT(arrival_date, "%d %M %Y") as arriv_date,
        format(actual_meals,2,"de_DE") as d_actual_meals, format(actual_lodging,2,"de_DE") as d_actual_lodging
        ')
        ->from('ea_requests_destinations')
        ->where('request_id', $id)
        ->get()->result_array();
        $total_destinations_cost = 0;
        $total_dest = count($destinations);
        for ($i = 0; $i < $total_dest; $i++) {
            $total_destinations_cost += $destinations[$i]['total'];
            $other_items = $this->get_destination_other_items($destinations[$i]['id']);
            $destinations[$i]['other_items'] = $other_items;
          }
        $request_data['total_destinations_cost'] = $total_destinations_cost;
        $request_data['destinations'] = $destinations;
        return $request_data;
    }

    function get_excel_report_by_id($id) {
        $request_data =  $this->db->select('r.id as r_id, CONCAT("EA", r.id) AS ea_number, DATE_FORMAT(r.created_at, "%d %F %Y") as request_date,
        DATE_FORMAT(r.departure_date, "%d/%M/%y") as departure_date, DATE_FORMAT(r.return_date, "%d/%M/%y") as return_date,
        r.requestor_id, ur.username as requestor_name, ur.signature as requestor_signature ,r.originating_city,
        uh.username as head_of_units_name, uh.signature as head_of_units_signature, uea.username as ea_assosiate_name, ufc.username as fco_monitor_name,
        ufc.signature as fco_monitor_signature, uea.signature as ea_assosiate_signature, ufi.username as finance_name,
        DATE_FORMAT(st.head_of_units_status_at, "%d %M %Y - %H:%i") as head_of_units_status_at, ufi.signature as finance_signature
        ')
            ->from('ea_requests r')
            ->join('ea_requests_status st', 'st.request_id = r.id', 'left')
            ->join('tb_userapp ur', 'r.requestor_id = ur.id', 'left')
            ->join('tb_userapp uh', 'st.head_of_units_id = uh.id', 'left')
            ->join('tb_userapp uea', 'st.ea_assosiate_id = uea.id', 'left')
            ->join('tb_userapp ufc', 'st.fco_monitor_id = ufc.id', 'left')
            ->join('tb_userapp ufi', 'st.finance_id = ufi.id', 'left')
            ->where('r.id', $id)
            ->get()->row_array();
        if(!$request_data) {
            return false;
        }
        $destinations = $this->db->select('id, total, city, night, actual_lodging, actual_meals,
        departure_date, arrival_date,
        DATE_FORMAT(departure_date, "%d/%M/%y") as depar_date, DATE_FORMAT(arrival_date, "%d/%M/%y") as arriv_date
        ')
        ->from('ea_requests_destinations')
        ->where('request_id', $id)
        ->get()->result_array();
        $total_destinations_cost = 0;
        $total_dest = count($destinations);
        for ($i = 0; $i < $total_dest; $i++) {
            $total_destinations_cost += $destinations[$i]['total'];
            $other_items = $this->get_destination_other_items($destinations[$i]['id']);
            $destinations[$i]['other_items'] = $other_items;
          }
        $request_data['total_destinations_cost'] = $total_destinations_cost;
        $request_data['destinations'] = $destinations;
        $request_data['destinations'] = $destinations;
        return $request_data;
    }

    function get_destination_other_items($dest_id) {
        $other_items = $this->db->select('id, receipt, item, cost ,format(cost,2,"de_DE") as text_cost')
        ->from('ea_requests_other_items')
        ->where('destination_id', $dest_id)
        ->get()->result_array();
        return $other_items;
    }

    function insert_actual_cost($dest_id, $payload) {
        $this->db->where('id', $dest_id)->update('ea_requests_destinations', $payload);
        return true;
    }

    function insert_other_items($payload) {
        $this->db->insert('ea_requests_other_items', $payload);
        return $this->db->insert_id();
    }

    function update_other_items($item_id, $data) {
        $updated = $this->db->where('id', $item_id)->update('ea_requests_other_items', $data);
        if($updated) {
            return true;
        }
        return false;
    }

    function get_items_detail($id) {
        return $this->db->select('*, format(cost,0,"de_DE") as clean_cost')->from('ea_requests_other_items')->where('id', $id)->get()->row_array();
    }
}
