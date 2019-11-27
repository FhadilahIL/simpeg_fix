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
        $this->db->join('users', 'berita.nik = users.nik', 'inner');
        $this->db->limit('nik', $limit);
        return $this->db->get('berita');
    }

    function daftar_berita()
    {
        $this->db->select('*');
        $this->db->join('users', 'berita.nik = users.nik', 'inner');
        return $this->db->get('berita');
    }

    function input_berita($data)
    {
        return $this->db->insert('berita', $data);
    }
}
