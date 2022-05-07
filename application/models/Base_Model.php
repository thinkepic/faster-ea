<?php


class Base_Model extends CI_Model
{

    function get_head_of_units($user_id) {
        return $this->db->select('u.id, u.username, u.email')
        ->from('tb_pr_approver pr')
        ->join('tb_userapp u', 'u.id = pr.kepala_unit_id')
        ->join('tb_pr_approver_members pm', 'pm.pr_approver_id = pr.id')
        ->where('pm.member_id', $user_id)
        ->get()->result_array();
    }
}
