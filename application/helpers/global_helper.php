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