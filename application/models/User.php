<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model
{
    function get_user()
    {
        return $this->db->get('users');
    }

    function cari_user($username)
    {
        $this->db->select('*');
        $this->db->join('jabatan', 'jabatan.id_jabatan = users.id_jabatan', 'inner');
        $this->db->join('hak_akses', 'jabatan.id_akses = hak_akses.id_akses', 'inner');
        $this->db->where('nik', $username);
        $this->db->or_where('email', $username);
        return $this->db->get('users');
    }

    function cari_user_admin($id_akses)
    {
        $this->db->select('*');
        $this->db->join('jabatan', 'jabatan.id_jabatan = users.id_jabatan', 'inner');
        $this->db->join('hak_akses', 'jabatan.id_akses = hak_akses.id_akses', 'inner');
        $this->db->where('hak_akses.id_akses', $id_akses);
        return $this->db->get('users');
    }

    function cari_user_pegawai($id_akses)
    {
        $this->db->select('*');
        $this->db->join('jabatan', 'jabatan.id_jabatan = users.id_jabatan', 'inner');
        $this->db->join('hak_akses', 'jabatan.id_akses = hak_akses.id_akses', 'inner');
        $this->db->where('hak_akses.id_akses', $id_akses);
        return $this->db->get('users');
    }

    function cari_user_manager($id_akses)
    {
        $this->db->select('*');
        $this->db->join('jabatan', 'jabatan.id_jabatan = users.id_jabatan', 'inner');
        $this->db->join('hak_akses', 'jabatan.id_akses = hak_akses.id_akses', 'inner');
        $this->db->where('hak_akses.id_akses', $id_akses);
        return $this->db->get('users');
    }

    function update_data($data, $nik)
    {
        $this->db->where('nik', $nik);
        return $this->db->update('users', $data);
    }

    function get_pegawai()
    {
        $this->db->select('*');
        $this->db->join('jabatan', 'jabatan.id_jabatan = users.id_jabatan', 'inner');
        $this->db->join('hak_akses', 'jabatan.id_akses = hak_akses.id_akses', 'inner');
        $this->db->where('hak_akses.id_akses', 2);
        $this->db->or_where('hak_akses.id_akses', 3);
        return $this->db->get('users');
    }
}
