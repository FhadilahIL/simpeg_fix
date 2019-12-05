<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Model
{
    function get_news()
    {
        return $this->db->get('berita');
    }

    function cari($id_berita)
    {
        $this->db->where('id_berita', $id_berita);
        return $this->db->get('berita');
    }

    function tampil_berita_index()
    {
        $this->db->select('*');
        $this->db->join('users', 'berita.id_pegawai = users.id_pegawai', 'inner');
        $this->db->order_by('id_berita DESC');
        $this->db->limit(5);
        return $this->db->get('berita');
    }

    // function detail_berita_index($id)
    // {
    //     $this->db->select('*');
    //     $this->db->join('users', 'berita.id_pegawai = users.id_pegawai', 'inner');
    //     $this->db->where('id_berita', $id);
    //     return $this->db->get('berita');
    // }

    function daftar_berita()
    {
        $this->db->select('*');
        $this->db->join('users', 'berita.id_pegawai = users.id_pegawai', 'inner');
        $this->db->order_by('id_berita DESC');
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

    function update_news($data, $id_berita)
    {
        $this->db->where('id_berita', $id_berita);
        return $this->db->update('berita', $data);
    }

    function related_news()
    {
        $this->db->join('users', 'berita.id_pegawai = users.id_pegawai', 'inner');
        $this->db->limit(3);
        $this->db->order_by('id_berita DESC');
        return $this->db->get('berita');
    }

    function carousel_news()
    {
        $this->db->join('users', 'berita.id_pegawai = users.id_pegawai', 'inner');
        $this->db->order_by(5, 'RANDOM');
        return $this->db->get('berita');
    }
}
