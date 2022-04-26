<?php 



if (!function_exists('is_superadmin')) {
    function is_superadmin()
    {
        $ci = &get_instance();
        return $ci->session->userdata('role') == ROLE_SUPERADMIN;
    }
}


function is_root () {
    $ci = &get_instance();
    return $ci->session->userdata('role') == ROLE_ROOT;
}

function is_user () {
    $ci = &get_instance();
    return $ci->session->userdata('role') == ROLE_USER;
}