<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Model
{
    function get_jabatan()
    {
        $this->db->select('*');
        return $this->db->get('jabatan');
    }
}
