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

    function cari_user_admin()
    {
        $this->db->select('*');
        $this->db->join('jabatan', 'jabatan.id_jabatan = users.id_jabatan', 'inner');
        $this->db->where('jabatan.id_jabatan', 1);
        return $this->db->get('users');
    }

    function cari_user_pegawai()
    {
        $this->db->select('*');
        $this->db->join('jabatan', 'jabatan.id_jabatan = users.id_jabatan', 'inner');
        $this->db->where('jabatan.id_jabatan', 2);
        return $this->db->get('users');
    }

    function cari_user_manager()
    {
        $this->db->select('*');
        $this->db->join('jabatan', 'jabatan.id_jabatan = users.id_jabatan', 'inner');
        $this->db->where('jabatan.id_jabatan', 3);
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
        $this->db->select('nama, nik, email, password, nama_jabatan, nama_divisi, alamat, agama, jenis_kelamin, pendidikan, status, no_telp, nama_gambar_profile, tanggal_masuk');
        $this->db->join('jabatan', 'jabatan.id_jabatan = users.id_jabatan', 'inner');
        $this->db->join('detail_user', 'users.id_pegawai = detail_user.id_pegawai', 'inner');
        $this->db->join('divisi', 'users.id_divisi = users.id_divisi', 'inner');
        $this->db->where('jabatan.id_jabatan', 2);
        $this->db->where('users.id_divisi', $id_divisi);
        $this->db->or_where('jabatan.id_jabatan', 3);
        return $this->db->get('users');
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

    function cari_nik_pegawai($nik)
    {
        $this->db->select('nama, nik, email, password, nama_jabatan, nama_divisi, alamat, agama, jenis_kelamin, pendidikan, status, no_telp, nama_gambar_profile, tanggal_masuk');
        $this->db->join('jabatan', 'jabatan.id_jabatan = users.id_jabatan', 'inner');
        $this->db->join('detail_user', 'users.id_pegawai = detail_user.id_pegawai', 'inner');
        $this->db->join('divisi', 'users.id_divisi = users.id_divisi', 'inner');
        $this->db->like('nik', $nik);
        return $this->db->get('users');
    }

    function cari_nama_manager($nama)
    {
        return $this->db->query("SELECT * FROM `users` INNER JOIN jabatan ON jabatan.id_jabatan = users.id_jabatan WHERE nama LIKE '%$nama%' OR nik LIKE '%$nama%'");
    }

    function manager_cari_pegawai_admin($id_divisi, $id_jabatan, $nik)
    {
        $this->db->select('nama, nik, email, password, nama_jabatan, nama_divisi, alamat, agama, jenis_kelamin, pendidikan, status, no_telp, nama_gambar_profile, tanggal_masuk');
        $this->db->join('jabatan', 'jabatan.id_jabatan = users.id_jabatan', 'inner');
        $this->db->join('detail_user', 'users.id_pegawai = detail_user.id_pegawai', 'inner');
        $this->db->join('divisi', 'users.id_divisi = users.id_divisi', 'inner');
        $this->db->like('nik', $nik);
        $this->db->where('users.id_jabatan', $id_jabatan);
        $this->db->where('users.id_divisi', $id_divisi);
        return $this->db->get('users');
    }
}
