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
        $this->db->select('users.id_pegawai, nik, nama, email, password, jabatan.id_jabatan, divisi.id_divisi, nama_jabatan, nama_divisi');
        $this->db->join('jabatan', 'jabatan.id_jabatan = users.id_jabatan', 'inner');
        $this->db->join('divisi', 'users.id_divisi = divisi.id_divisi', 'inner');
        $this->db->where('users.nik', $username);
        $this->db->or_where('users.email', $username);
        return $this->db->get('users');
    }

    function cari_detail_user($id)
    {
        $this->db->where('id_pegawai', $id);
        return $this->db->get('detail_user');
    }

    function detail_pegawai($username)
    {

        $this->db->select('users.id_pegawai, nik, nama , email, password, alamat, agama, jenis_kelamin, pendidikan, status, no_telp, nama_gambar_profile');
        $this->db->join('detail_user', 'users.id_pegawai = detail_user.id_pegawai', 'left');
        $this->db->where('users.nik', $username);
        return $this->db->get('users');
    }

    function cari_user_admin($id_divisi)
    {
        $this->db->select('*');
        $this->db->join('jabatan', 'jabatan.id_jabatan = users.id_jabatan', 'inner');
        $this->db->where('jabatan.id_jabatan', 1);
        $this->db->where('users.id_divisi', $id_divisi);
        return $this->db->get('users');
    }

    function cari_user_pegawai($id_divisi)
    {
        $this->db->select('*');
        $this->db->join('jabatan', 'jabatan.id_jabatan = users.id_jabatan', 'inner');
        $this->db->where('jabatan.id_jabatan', 2);
        $this->db->where('users.id_divisi', $id_divisi);
        return $this->db->get('users');
    }

    function cari_user_manager($id_divisi)
    {
        $this->db->select('*');
        $this->db->join('jabatan', 'jabatan.id_jabatan = users.id_jabatan', 'inner');
        $this->db->where('jabatan.id_jabatan', 3);
        $this->db->where('users.id_divisi', $id_divisi);
        return $this->db->get('users');
    }

    function update_data_users($user, $id)
    {
        $this->db->where('id_pegawai', $id);
        return $this->db->update('users', $user);
    }

    function update_data_detail_user($detail, $id)
    {
        $this->db->where('id_pegawai', $id);
        return $this->db->update('detail_user', $detail);
    }

    function insert_data_detail_user($detail)
    {
        return $this->db->insert('detail_user', $detail);
    }

    function get_pegawai($id_divisi)
    {
        return $this->db->query("SELECT * FROM `users` INNER JOIN detail_user ON users.id_pegawai = detail_user.id_pegawai INNER JOIN jabatan on users.id_jabatan = jabatan.id_jabatan INNER JOIN divisi ON users.id_divisi = divisi.id_divisi WHERE users.id_divisi = '$id_divisi' AND users.id_jabatan = '2' OR users.id_divisi = '$id_divisi' AND users.id_jabatan = '3'");
    }

    function input_user($user)
    {
        $this->db->insert('users', $user);
    }

    function input_detail_user($detail)
    {
        $this->db->insert('detail_user', $detail);
    }

    function cari_nik($nik)
    {
        $this->db->select('nik');
        $this->db->where('nik', $nik);
        return $this->db->get('users');
    }

    function cari_nik_pegawai($id_divisi, $nik)
    {
        return $this->db->query("SELECT * FROM `users` INNER JOIN detail_user ON users.id_pegawai = detail_user.id_pegawai INNER JOIN jabatan on users.id_jabatan = jabatan.id_jabatan INNER JOIN divisi ON users.id_divisi = divisi.id_divisi WHERE users.id_divisi = '$id_divisi' AND users.id_jabatan != '1' AND nik LIKE '%$nik%'");
    }

    function cari_nama_manager($nama)
    {
        return $this->db->query("SELECT * FROM `users` INNER JOIN jabatan ON jabatan.id_jabatan = users.id_jabatan WHERE nama LIKE '%$nama%' OR nik LIKE '%$nama%'");
    }

    function manager_cari_pegawai_admin($id_divisi, $id_jabatan, $nik)
    {
        return $this->db->query("SELECT * FROM `users` INNER JOIN detail_user ON users.id_pegawai = detail_user.id_pegawai INNER JOIN jabatan on users.id_jabatan = jabatan.id_jabatan INNER JOIN divisi ON users.id_divisi = divisi.id_divisi WHERE users.id_divisi = '$id_divisi' AND users.id_jabatan = '$id_jabatan' AND nik LIKE '%$nik%'");
    }

    function cari_data($nik)
    {
        $this->db->where('nik', $nik);
        return $this->db->get('users');
    }

    function update_password($nik, $data)
    {
        $this->db->where('nik', $nik);
        return $this->db->update('users', $data);
    }

    function delete_data($id_pegawai)
    {
        $this->db->where('id_pegawai', $id_pegawai);
        return $this->db->delete('users');
    }
}
