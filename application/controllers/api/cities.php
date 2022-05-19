<?php 


class Cities extends MY_Controller {

    function index () {

        $this->db
        ->from('tb_wilayah_kabupaten');

        if ($this->input->get('select2')) {
            $this->db->select('nama as id, nama as text');
        }
        if ($this->input->get('q')) {
            $this->db->like('nama', $this->input->get('q'));
        }

        $this->db->order_by('nama', 'asc');

        $response['result'] = $this->db->get()->result();
        $this->send_json($response);
    }
}