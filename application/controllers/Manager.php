<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User');
        $this->load->model('News');
        if ($this->session->userdata('role') != 3) {
            redirect('auth/cek_session');
        }
    }

    function index()
    {
        $data['judul_halaman'] = "Manager - Dashboard";
        $data['active'] = "active";
        $data['dashboard'] = base_url('manager');
        $data['data_pribadi'] = base_url('manager/data_pribadi');
        $data['card'] = [
            ['Jumlah Pegawai', '10', '#'],
            ['Jumlah Keluarga', '2', '#']
        ];
        $data['menu'] = [
            ['Data Pegawai', base_url('manager/data_pegawai'), '', 'fa-user'],
            ['Cuti', base_url('manager/data_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('manager/data_berita'), '', 'fa-newspaper']
        ];
        $id = $this->session->userdata('nik');
        $data['user'] = $this->User->cari_user($id)->row();
        $data['daftar_berita'] = $this->News->tampil_berita_index()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('manager/index', $data);
        $this->load->view('templates/footer');
    }

    function data_pribadi($id_pegawai)
    {
        $data['judul_halaman'] = "Manager - Data Pribadi";
        $data['active'] = "";
        $data['dashboard'] = base_url('manager');
        $data['data_pribadi'] = "#";
        $data['menu'] = [
            ['Data Pegawai', base_url('manager/data_pegawai'), 'active', 'fa-user'],
            ['Cuti', base_url('manager/data_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('manager/data_berita'), '', 'fa-newspaper']
        ];
        $id = $this->session->userdata('nik');
        $data['user'] = $this->User->cari_user($id)->row();
        $id_pegawai = $this->uri->segment(3);
        $data['pegawai'] = $this->User->detail_pegawai($id_pegawai)->row();
        if ($data['pegawai']->agama == "Islam") {
            $data['agama'] = ['selected', '', '', '', ''];
        } elseif ($data['pegawai']->agama == "Kristen") {
            $data['agama'] = ['', 'selected', '', '', ''];
        } elseif ($data['pegawai']->agama == "Katholik") {
            $data['agama'] = ['', '', 'selected', '', ''];
        } elseif ($data['pegawai']->agama == "Hindu") {
            $data['agama'] = ['', '', '', 'selected', ''];
        } elseif ($data['pegawai']->agama == "Budha") {
            $data['agama'] = ['', '', '', '', 'selected'];
        }

        if ($data['pegawai']->pendidikan == "SMA") {
            $data['pendidikan'] = ['selected', '', '', '', '', ''];
        } elseif ($data['pegawai']->pendidikan == "D3") {
            $data['pendidikan'] = ['', 'selected', '', '', '', ''];
        } elseif ($data['pegawai']->pendidikan == "D4") {
            $data['pendidikan'] = ['', '', 'selected', '', '', ''];
        } elseif ($data['pegawai']->pendidikan == "S1") {
            $data['pendidikan'] = ['', '', '', 'selected', '', ''];
        } elseif ($data['pegawai']->pendidikan == "S2") {
            $data['pendidikan'] = ['', '', '', '', 'selected', ''];
        } elseif ($data['pegawai']->pendidikan == "S3") {
            $data['pendidikan'] = ['', '', '', '', '', 'selected'];
        }

        if ($data['pegawai']->status == "Belum Menikah") {
            $data['status'] = ['selected', ''];
        } elseif ($data['pegawai']->status == "Menikah") {
            $data['status'] = ['', 'selected'];
        }

        if ($data['pegawai']->jenis_kelamin == "L") {
            $data['jenis_kelamin'] = ['selected', ''];
        } elseif ($data['pegawai']->jenis_kelamin == "P") {
            $data['jenis_kelamin'] = ['', 'selected'];
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('manager/data_pribadi', $data);
        $this->load->view('templates/footer');
    }

    function data_pegawai()
    {
        $data['judul_halaman'] = "Manager - Data Pegawai";
        $data['active'] = "";
        $data['dashboard'] = base_url('manager');
        $data['data_pribadi'] = base_url('manager/data_pribadi');
        $data['menu'] = [
            ['Data Pegawai', base_url('manager/data_pegawai'), 'active', 'fa-user'],
            ['Cuti', base_url('manager/data_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('manager/data_berita'), '', 'fa-newspaper']
        ];
        $id = $this->session->userdata('nik');
        $data['user'] = $this->User->cari_user($id)->row();
        $data['daftar_pegawai'] = $this->User->get_user()->row();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('manager/data_pegawai', $data);
        $this->load->view('templates/footer');
    }

    function detail_pegawai()
    {
        $data['judul_halaman'] = "Manager - Detail Pegawai";
        $data['active'] = "";
        $data['dashboard'] = base_url('manager');
        $data['data_pribadi'] = base_url('manager/data_pribadi');
        $data['menu'] = [
            ['Data Pegawai', base_url('manager/data_pegawai'), 'active', 'fa-user'],
            ['Cuti', base_url('manager/data_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('manager/data_pribadi'), '', 'fa-newspaper']
        ];
        $id = $this->session->userdata('nik');
        $data['user'] = $this->User->cari_user($id)->row();
        $id_berita = $this->uri->segment(3);
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
        $data['dashboard'] = base_url('manager');
        $data['data_pribadi'] = base_url('manager/data_pribadi');
        $data['menu'] = [
            ['Data Pegawai', base_url('manager/data_pegawai'), '', 'fa-user'],
            ['Cuti', base_url('manager/data_cuti'), 'active', 'fa-calendar-alt'],
            ['Berita', base_url('manager/data_berita'), '', 'fa-newspaper']
        ];
        $id = $this->session->userdata('nik');
        $data['user'] = $this->User->cari_user($id)->row();
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
        $data['dashboard'] = base_url('manager');
        $data['data_pribadi'] = base_url('manager/data_pribadi');
        $data['menu'] = [
            ['Data Pegawai', base_url('manager/data_pegawai'), '', 'fa-user'],
            ['Cuti', base_url('manager/data_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('manager/data_berita'), 'active', 'fa-newspaper']
        ];
        $data['daftar_berita'] = $this->News->daftar_berita()->result();
        $id = $this->session->userdata('nik');
        $data['user'] = $this->User->cari_user($id)->row();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('manager/data_berita', $data);
        $this->load->view('templates/footer');
    }

    function detail_berita($id_berita)
    {
        $data['judul_halaman'] = "Manager - Detail Berita";
        $data['active'] = "";
        $data['dashboard'] = base_url('manager');
        $data['data_pribadi'] = base_url('manager/data_pribadi');
        $data['menu'] = [
            ['Data Pegawai', base_url('manager/data_pegawai'), '', 'fa-user'],
            ['Cuti', base_url('manager/data_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('manager/data_berita'), 'active', 'fa-newspaper']
        ];
        $id_berita = $this->uri->segment(3);
        $id = $this->session->userdata('nik');
        $data['user'] = $this->User->cari_user($id)->row();
        $data['detail_berita'] = $this->News->tampil_berita($id_berita)->row();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('manager/detail_berita', $data);
        $this->load->view('templates/footer');
    }
}
