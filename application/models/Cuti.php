<?php
defined('BASEPATH') or exit('Cieee ga boleh akses');

class Cuti extends CI_Model
{
    function get_cuti()
    {
        return $this->db->get('cuti');
    }
}
