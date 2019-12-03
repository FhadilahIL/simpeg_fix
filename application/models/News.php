<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Model
{
    function get_news()
    {
        return $this->db->get('berita');
    }

    function tampil_berita_index($limit)
    {
        $this->db->select('*');
        $this->db->join('users', 'berita.id_pegawai = users.id_pegawai', 'inner');
        $this->db->limit($limit);
        return $this->db->get('berita');
    }

    function detail_berita_index($id)
    {
        $this->db->select('*');
        $this->db->join('users', 'berita.id_pegawai = users.id_pegawai', 'inner');
        $this->db->where('id_berita', $id);
        return $this->db->get('berita');
    }

    function daftar_berita()
    {
        $this->db->select('*');
        $this->db->join('users', 'berita.id_pegawai = users.id_pegawai', 'inner');
        return $this->db->get('berita');
    }

    function input_berita($data)
    {
        return $this->db->insert('berita', $data);
    }

    function tampil_berita($id_berita)
    {
        $this->db->select('*');
        $this->db->join('users', 'berita.id_pegawai = users.id_pegawai', 'inner');
        $this->db->where('id_berita', $id_berita);
        return $this->db->get('berita');
    }

    function update_news($data)
    {
        return $this->db->replace('berita', $data);
    }
}
