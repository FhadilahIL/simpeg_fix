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
        $this->db->select('nama, nik, email, password, nama_jabatan, nama_divisi, alamat, agama, jenis_kelamin, pendidikan, status, no_telp, nama_gambar_profile, tanggal_masuk');
        $this->db->join('jabatan', 'jabatan.id_jabatan = users.id_jabatan', 'inner');
        $this->db->join('detail_user', 'users.id_pegawai = detail_user.id_pegawai', 'inner');
        $this->db->join('divisi', 'users.id_divisi = users.id_divisi', 'inner');
        $this->db->where('users.id_divisi', $id_divisi);
        $this->db->where('users.id_jabatan', 2);
        return $this->db->get('users');
    }

    function admin_divisi($id_divisi)
    {
        $this->db->select('nama, nik, email, password, nama_jabatan, nama_divisi, alamat, agama, jenis_kelamin, pendidikan, status, no_telp, nama_gambar_profile, tanggal_masuk');
        $this->db->join('jabatan', 'jabatan.id_jabatan = users.id_jabatan', 'inner');
        $this->db->join('detail_user', 'users.id_pegawai = detail_user.id_pegawai', 'inner');
        $this->db->join('divisi', 'users.id_divisi = users.id_divisi', 'inner');
        $this->db->where('users.id_divisi', $id_divisi);
        $this->db->where('users.id_jabatan', 1);
        return $this->db->get('users');
    }

    function tambah_divisi($data)
    {
        return $this->db->insert($data);
    }
}
