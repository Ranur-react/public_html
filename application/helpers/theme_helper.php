<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


//Letak Folder Back-End Server pada Server
if (!function_exists('backend')) {
    function backend()
    {
        $CI = &get_instance();
        $CI->load->model('settings/Mconfig');
        $data = $CI->Mconfig->pathBackEnd();
        $path = $data->value_seting;
        return $path;
    }
}

if (!function_exists('coprightLink')) {
    function coprightLink()
    {
        $CI = &get_instance();
        $CI->load->model('settings/Mconfig');
        $data = $CI->Mconfig->coprightLink();
        $path = $data->value_seting;
        return $path;
    }
}
if (!function_exists('coprightLable')) {
    function coprightLable()
    {
        $CI = &get_instance();
        $CI->load->model('settings/Mconfig');
        $data = $CI->Mconfig->coprightLable();
        $path = $data->value_seting;
        return $path;
    }
}

