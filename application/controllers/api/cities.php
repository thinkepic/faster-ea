<?php 


class Cities extends MY_Controller {

    function index () {

        $this->db
        ->from('cities');

        if ($this->input->get('select2')) {
            $this->db->select('name as id, name as text');
        }
        if ($this->input->get('q')) {
            $this->db->like('name', $this->input->get('q'));
        }

        $this->db->order_by('name', 'asc');

        $response['result'] = $this->db->get()->result();
        $this->send_json($response);
    }
}