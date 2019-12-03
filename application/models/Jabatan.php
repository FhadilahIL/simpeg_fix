<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Model
{
    function get_jabatan()
    {
        $this->db->select('*');
        $this->db->join('hak_akses', 'jabatan.id_akses = hak_akses.id_akses', 'inner');
        return $this->db->get('jabatan');
    }
}
