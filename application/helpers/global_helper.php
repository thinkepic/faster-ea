<?php

if (!function_exists('encrypt')) {
	function encrypt($str)
	{
		$ci = &get_instance();

		return $ci->encryption->encrypt($str);
	}
}

if (!function_exists('decrypt')) {
	function decrypt($str)
	{
		$ci = &get_instance();

		return $ci->encryption->decrypt($str);
	}
}

if (!function_exists('selected')) {
    function selected($val, $array)
    {
        if (is_array($array)) {
            foreach ($array as $a) {
                if ($a == $val) {
                    return (string) $val === (string) $a ? 'selected="selected"' : '';
                }
            }

            return '';
        }

        return $val == $array ? 'selected="selected"' : '';
    }
}

if (!function_exists('is_budget_reviewer')) {
    function is_budget_reviewer()
    {   
        $ci = &get_instance();

        if($ci->user_data->isBudgetRiviewer == 1) {
            return true;
        }

        return false;
    }
}

if (!function_exists('is_tor_approver')) {
    function is_tor_approver()
    {   
        $ci = &get_instance();

        if($ci->user_data->isTorApprover == 1) {
            return true;
        }

        return false;
    }
}

if (!function_exists('is_head_of_units')) {
    function is_head_of_units()
    {   
        $ci = &get_instance();

        if($ci->user_data->isHeadUnit == 1) {
            return true;
        }

        return false;
    }
}

if (!function_exists('is_ea_assosiate')) {
    function is_ea_assosiate()
    {   
        $ci = &get_instance();

        if($ci->user_data->email == 'mlisna@fhi360.org' || $ci->user_data->username == 'fadelassosiate') {
            return true;
        }

        return false;
    }
}

if (!function_exists('is_procurement_officer')) {
    function is_procurement_officer()
    {   
        $ci = &get_instance();

        if($ci->user_data->isProcurementOfficer == 1) {
            return true;
        }

        return false;
    }
}