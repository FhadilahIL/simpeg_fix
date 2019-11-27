<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 2) {
            redirect('auth/cek_session');
        }
    }

    function index()
    {
        $data['judul_halaman'] = "Pegawai - Dashboard";
        $data['active'] = "active";
        $data['dashboard'] = "pegawai";
        $data['data_pribadi'] = "pegawai/data_pribadi";
        $data['menu'] = [
            ['Data Pribadi', 'pegawai/detail_pribadi', '', 'fa-user'],
            ['Cuti', 'pegawai/detail_cuti', '', 'fa-calendar-alt'],
            ['Berita', 'pegawai/data_berita', '', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pegawai/index');
        $this->load->view('templates/footer');
    }

    function data_pribadi()
    {
        $data['judul_halaman'] = "Pegawai - Data Pribadi";
        $data['active'] = "";
        $data['dashboard'] = "pegawai";
        $data['data_pribadi'] = "#";
        $data['menu'] = [
            ['Data Pribadi', 'detail_pribadi', 'active', 'fa-user'],
            ['Cuti', 'detail_cuti', '', 'fa-calendar-alt'],
            ['Berita', 'data_berita', '', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pegawai/data_pribadi');
        $this->load->view('templates/footer');
    }

    function detail_pribadi()
    {
        $data['judul_halaman'] = "Pegawai - Detail Pribadi";
        $data['active'] = "";
        $data['dashboard'] = "pegawai";
        $data['data_pribadi'] = "data_pribadi";
        $data['menu'] = [
            ['Data Pribadi', '#', 'active', 'fa-user'],
            ['Cuti', 'detail_cuti', '', 'fa-calendar-alt'],
            ['Berita', 'data_berita', '', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pegawai/detail_pribadi');
        $this->load->view('templates/footer');
    }

    function detail_cuti()
    {
        $data['judul_halaman'] = "Pegawai - Detail Cuti";
        $data['active'] = "";
        $data['dashboard'] = "pegawai";
        $data['data_pribadi'] = "data_pribadi";
        $data['menu'] = [
            ['Data Pegawai', 'detail_pribadi', '', 'fa-user'],
            ['Cuti', '#', 'active', 'fa-calendar-alt'],
            ['Berita', 'data_berita', '', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pegawai/data_cuti');
        $this->load->view('templates/footer');
    }

    function tambah_cuti()
    {
        $data['judul_halaman'] = "Pegawai - Tambah Cuti";
        $data['active'] = "";
        $data['dashboard'] = "pegawai";
        $data['data_pribadi'] = "data_pribadi";
        $data['menu'] = [
            ['Data Pegawai', 'detail_pribadi', '', 'fa-user'],
            ['Cuti', 'detail_cuti', 'active', 'fa-calendar-alt'],
            ['Berita', 'data_berita', '', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pegawai/tambah_cuti');
        $this->load->view('templates/footer');
    }

    function data_berita()
    {
        $data['judul_halaman'] = "Pegawai - Data Berita";
        $data['active'] = "";
        $data['dashboard'] = "pegawai";
        $data['data_pribadi'] = "data_pribadi";
        $data['menu'] = [
            ['Data Pegawai', 'detail_pribadi', '', 'fa-user'],
            ['Cuti', 'detail_cuti', '', 'fa-calendar-alt'],
            ['Berita', '#', 'active', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pegawai/data_berita');
        $this->load->view('templates/footer');
    }

    function detail_berita()
    {
        $data['judul_halaman'] = "Pegawai - Detail Berita";
        $data['active'] = "";
        $data['dashboard'] = "pegawai";
        $data['data_pribadi'] = "data_pribadi";
        $data['menu'] = [
            ['Data Pegawai', 'detail_pribadi', '', 'fa-user'],
            ['Cuti', 'detail_cuti', '', 'fa-calendar-alt'],
            ['Berita', 'data_berita', 'active', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pegawai/detail_berita');
        $this->load->view('templates/footer');
    }
}
