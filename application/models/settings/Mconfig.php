<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mconfig extends CI_Model
{
     public function pathBackEnd()
    {
        return $this->db->where('nama_seting', 'pathbackend')->get('settings_m2')->row();
    }
   
}

/* End of file Mconfig.php */
