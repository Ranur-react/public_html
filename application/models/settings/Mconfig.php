<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mconfig extends CI_Model
{
     public function pathBackEnd()
    {
        return $this->db->where('nama_seting', 'pathbackend')->get('settings_m2')->row();
    }
    public function coprightLink()
    {
        return $this->db->where('nama_seting', 'coprightlink')->get('settings_m2')->row();
    }
    public function coprightLable()
    {
        return $this->db->where('nama_seting', 'coprightlable')->get('settings_m2')->row();
    }
   
}

/* End of file Mconfig.php */
