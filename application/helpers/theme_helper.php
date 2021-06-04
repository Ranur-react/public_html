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

