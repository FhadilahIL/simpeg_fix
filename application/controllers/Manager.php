<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 3) {
            redirect('auth/cek_session');
        }
    }

    function index()
    {
        $data['judul_halaman'] = "Manager - Dashboard";
        $data['active'] = "active";
        $data['dashboard'] = "manager";
        $data['data_pribadi'] = "manager/data_pribadi";
        $data['card'] = [
            ['Jumlah Pegawai', '10', '#'],
            ['Jumlah Keluarga', '2', '#']
        ];
        $data['menu'] = [
            ['Data Pegawai', 'manager/data_pegawai', '', 'fa-user'],
            ['Cuti', 'manager/data_cuti', '', 'fa-calendar-alt'],
            ['Berita', 'manager/data_berita', '', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('manager/index');
        $this->load->view('templates/footer');
    }

    function data_pribadi()
    {
        $data['judul_halaman'] = "Manager - Data Pribadi";
        $data['active'] = "";
        $data['dashboard'] = "manager";
        $data['data_pribadi'] = "#";
        $data['menu'] = [
            ['Data Pegawai', 'data_pegawai', 'active', 'fa-user'],
            ['Cuti', 'data_cuti', '', 'fa-calendar-alt'],
            ['Berita', 'data_berita', '', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('manager/data_pribadi');
        $this->load->view('templates/footer');
    }

    function data_pegawai()
    {
        $data['judul_halaman'] = "Manager - Data Pegawai";
        $data['active'] = "";
        $data['dashboard'] = "manager";
        $data['data_pribadi'] = "#";
        $data['menu'] = [
            ['Data Pegawai', '#', 'active', 'fa-user'],
            ['Cuti', 'data_cuti', '', 'fa-calendar-alt'],
            ['Berita', 'data_berita', '', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('manager/data_pegawai');
        $this->load->view('templates/footer');
    }

    function detail_pegawai()
    {
        $data['judul_halaman'] = "Manager - Detail Pegawai";
        $data['active'] = "";
        $data['dashboard'] = "manager";
        $data['data_pribadi'] = "#";
        $data['menu'] = [
            ['Data Pegawai', 'data_pegawai', 'active', 'fa-user'],
            ['Cuti', 'data_cuti', '', 'fa-calendar-alt'],
            ['Berita', 'data_berita', '', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('manager/detail_pegawai');
        $this->load->view('templates/footer');
    }

    function data_cuti()
    {
        $data['judul_halaman'] = "Manager - Data Cuti";
        $data['active'] = "";
        $data['dashboard'] = "manager";
        $data['data_pribadi'] = "#";
        $data['menu'] = [
            ['Data Pegawai', 'data_pegawai', '', 'fa-user'],
            ['Cuti', '#', 'active', 'fa-calendar-alt'],
            ['Berita', 'data_berita', '', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('manager/data_cuti');
        $this->load->view('templates/footer');
    }

    function data_berita()
    {
        $data['judul_halaman'] = "Manager - Data Berita";
        $data['active'] = "";
        $data['dashboard'] = "manager";
        $data['data_pribadi'] = "#";
        $data['menu'] = [
            ['Data Pegawai', 'data_pegawai', '', 'fa-user'],
            ['Cuti', 'data_cuti', '', 'fa-calendar-alt'],
            ['Berita', '#', 'active', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('manager/data_berita');
        $this->load->view('templates/footer');
    }

    function detail_berita()
    {
        $data['judul_halaman'] = "Manager - Detail Berita";
        $data['active'] = "";
        $data['dashboard'] = "manager";
        $data['data_pribadi'] = "#";
        $data['menu'] = [
            ['Data Pegawai', 'data_pegawai', '', 'fa-user'],
            ['Cuti', 'data_cuti', '', 'fa-calendar-alt'],
            ['Berita', 'data_berita', 'active', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('manager/detail_berita');
        $this->load->view('templates/footer');
    }
}
