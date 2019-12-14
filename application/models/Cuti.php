<?php
defined('BASEPATH') or exit('Cieee ga boleh akses');

class Cuti extends CI_Model
{
    function get_cuti()
    {
        return $this->db->get('cuti');
    }

    function cari_cuti($id_cuti)
    {
        $this->db->where('id_cuti', $id_cuti);
        return $this->db->get('cuti');
    }

    function simpan_cuti($data)
    {
        $this->db->insert('cutipegawai', $data);
    }

    function cari_cuti_akhir($id_pegawai)
    {
        return $this->db->query("SELECT * FROM `cutipegawai` WHERE `id_pegawai` = '$id_pegawai' ORDER BY year(akhir_cuti) DESC LIMIT 1");
    }

    function tampil_cuti_pegawai($id_pegawai)
    {
        $this->db->join('cuti', 'cutipegawai.id_cuti = cuti.id_cuti');
        $this->db->join('users', 'cutipegawai.id_pegawai = users.id_pegawai');
        $this->db->order_by('id_cutipegawai', 'desc');
        $this->db->where('cutipegawai.id_pegawai', $id_pegawai);
        return $this->db->get('cutipegawai');
    }

    function tampil_cuti_admin($id_divisi)
    {
        $this->db->join('cuti', 'cutipegawai.id_cuti = cuti.id_cuti', 'inner');
        $this->db->join('users', 'cutipegawai.id_pegawai = users.id_pegawai', 'inner');
        $this->db->where('id_divisi', $id_divisi);
        $this->db->order_by('id_cutipegawai', 'desc');
        return $this->db->get('cutipegawai');
    }

    function tampil_cuti_manager($id_divisi)
    {
        $this->db->join('cuti', 'cutipegawai.id_cuti = cuti.id_cuti', 'inner');
        $this->db->join('users', 'cutipegawai.id_pegawai = users.id_pegawai', 'inner');
        $this->db->where('id_divisi', $id_divisi);
        $this->db->where('status', 'Pending');
        $this->db->order_by('id_cutipegawai', 'desc');
        return $this->db->get('cutipegawai');
    }

    function tampil_cuti_log($id_divisi, $bulan, $tahun)
    {
        $where = "id_divisi = '$id_divisi' AND status != 'Pending' AND month(awal_cuti) = '$bulan' AND year(awal_cuti) = '$tahun'";
        $this->db->join('cuti', 'cutipegawai.id_cuti = cuti.id_cuti', 'inner');
        $this->db->join('users', 'cutipegawai.id_pegawai = users.id_pegawai', 'inner');
        $this->db->where($where);
        $this->db->order_by('id_cutipegawai', 'desc');
        return $this->db->get('cutipegawai');
    }

    function terima_cuti($id_pegawai, $data)
    {
        $this->db->where('id_cutipegawai', $id_pegawai);
        return $this->db->update('cutipegawai', $data);
    }

    function tolak_cuti($id_pegawai, $data)
    {
        $this->db->where('id_cutipegawai', $id_pegawai);
        return $this->db->update('cutipegawai', $data);
    }
}
