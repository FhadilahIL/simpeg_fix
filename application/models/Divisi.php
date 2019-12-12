<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Divisi extends CI_Model
{
    function get_divisi()
    {
        return $this->db->get('divisi');
    }

    function pegawai_divisi($id_divisi)
    {
        return $this->db->query("SELECT * FROM `users` INNER JOIN detail_user ON users.id_pegawai = detail_user.id_pegawai INNER JOIN jabatan on users.id_jabatan = jabatan.id_jabatan INNER JOIN divisi ON users.id_divisi = divisi.id_divisi WHERE users.id_divisi = '$id_divisi' AND users.id_jabatan = '2'");
    }

    function admin_divisi($id_divisi)
    {
        return $this->db->query("SELECT * FROM `users` INNER JOIN detail_user ON users.id_pegawai = detail_user.id_pegawai INNER JOIN jabatan on users.id_jabatan = jabatan.id_jabatan INNER JOIN divisi ON users.id_divisi = divisi.id_divisi WHERE users.id_divisi = '$id_divisi' AND users.id_jabatan = '1'");
    }

    function tambah_divisi($data)
    {
        $this->db->insert('divisi', $data);
    }
}
