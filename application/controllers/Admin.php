<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User');
        $this->load->model('News');
        if ($this->session->userdata('role') != 1) {
            redirect('auth/cek_session');
        }
    }

    function index()
    {
        $data['judul_halaman'] = "Admin - Dashboard";
        $data['active'] = "active";
        $data['dashboard'] = "admin";
        $admin = $this->User->cari_user_admin(1)->result();
        $pegawai = $this->User->cari_user_pegawai(2)->result();
        $manager = $this->User->cari_user_manager(3)->result();
        $data['berita'] = $this->News->tampil_berita_index(5)->result();
        $data['card'] = [
            ['Pegawai', count($pegawai), '#'],
            ['Manager', count($manager), '#'],
            ['Admin', count($admin), '#']
        ];
        $data['menu'] = [
            ['Data Pegawai', 'admin/data_pegawai', '', 'fa-user'],
            ['Cuti', 'admin/data_cuti', '', 'fa-calendar-alt'],
            ['Berita', 'admin/data_berita', '', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }

    function data_pegawai()
    {
        $data['judul_halaman'] = "Admin - Data Pegawai";
        $data['active'] = "";
        $data['dashboard'] = "admin";
        $data['data_pribadi'] = "data_pribadi";
        $data['menu'] = [
            ['Data Pegawai', 'data_pegawai', 'active', 'fa-user'],
            ['Cuti', 'data_cuti', '', 'fa-calendar-alt'],
            ['Berita', 'data_berita', '', 'fa-newspaper']
        ];
        $data['daftar_pegawai'] = $this->User->get_pegawai()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/data_pegawai');
        $this->load->view('templates/footer');
    }

    function tambah_pegawai()
    {
        $data['judul_halaman'] = "Admin - Tambah Pegawai";
        $data['active'] = "";
        $data['dashboard'] = "admin";
        $data['data_pribadi'] = "data_pribadi";
        $data['menu'] = [
            ['Data Pegawai', 'data_pegawai', 'active', 'fa-user'],
            ['Cuti', 'data_cuti', '', 'fa-calendar-alt'],
            ['Berita', 'data_berita', '', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/tambah_pegawai');
        $this->load->view('templates/footer');
    }

    function data_cuti()
    {
        $data['judul_halaman'] = "Admin - Data Cuti";
        $data['active'] = "";
        $data['dashboard'] = "admin";
        $data['data_pribadi'] = "data_pribadi";
        $data['menu'] = [
            ['Data Pegawai', 'data_pegawai', '', 'fa-user'],
            ['Cuti', 'data_cuti', 'active', 'fa-calendar-alt'],
            ['Berita', 'data_berita', '', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/data_cuti');
        $this->load->view('templates/footer');
    }

    function data_berita()
    {
        $data['judul_halaman'] = "Admin - Data Berita";
        $data['active'] = "";
        $data['dashboard'] = "admin";
        $data['data_pribadi'] = "data_pribadi";
        $data['menu'] = [
            ['Data Pegawai', 'data_pegawai', '', 'fa-user'],
            ['Cuti', 'data_cuti', '', 'fa-calendar-alt'],
            ['Berita', 'data_berita', 'active', 'fa-newspaper']
        ];
        $data['daftar_berita'] = $this->News->daftar_berita()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/data_berita');
        $this->load->view('templates/footer');
    }

    function tambah_berita()
    {
        $data['judul_halaman'] = "Admin - Tambah Berita";
        $data['active'] = "";
        $data['dashboard'] = "admin";
        $data['data_pribadi'] = "data_pribadi";
        $data['menu'] = [
            ['Data Pegawai', 'data_pegawai', '', 'fa-user'],
            ['Cuti', 'data_cuti', '', 'fa-calendar-alt'],
            ['Berita', 'data_berita', 'active', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/tambah_berita');
        $this->load->view('templates/footer');
    }

    function ubah_data()
    {
        $data['judul_halaman'] = "Admin - Ubah Data Pegawai";
        $data['active'] = "";
        $data['dashboard'] = "admin";
        $data['data_pribadi'] = "data_pribadi";
        $data['menu'] = [
            ['Data Pegawai', 'data_pegawai', 'active', 'fa-user'],
            ['Cuti', 'data_cuti', '', 'fa-calendar-alt'],
            ['Berita', 'data_berita', '', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/edit_pegawai');
        $this->load->view('templates/footer');
    }

    function ubah_berita()
    {
        $data['judul_halaman'] = "Admin - Ubah Berita";
        $data['active'] = "";
        $data['dashboard'] = "admin";
        $data['data_pribadi'] = "data_pribadi";
        $data['menu'] = [
            ['Data Pegawai', 'data_pegawai', '', 'fa-user'],
            ['Cuti', 'data_cuti', '', 'fa-calendar-alt'],
            ['Berita', 'data_berita', 'active', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/edit_berita');
        $this->load->view('templates/footer');
    }

    function detail_berita()
    {
        $data['judul_halaman'] = "Admin - Detail Berita";
        $data['active'] = "";
        $data['dashboard'] = "admin";
        $data['menu'] = [
            ['Data Pegawai', 'data_pegawai', '', 'fa-user'],
            ['Cuti', 'data_cuti', '', 'fa-calendar-alt'],
            ['Berita', 'data_berita', 'active', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/detail_berita');
        $this->load->view('templates/footer');
    }

    function data_pribadi($id)
    {
        $data['judul_halaman'] = "Admin - Data Pribadi";
        $data['active'] = "";
        $data['dashboard'] = "admin";
        $data['data_pribadi'] = "#";
        $data['menu'] = [
            ['Data Pegawai', base_url('admin/data_pegawai'), 'active', 'fa-user'],
            ['Cuti', 'data_cuti', '', 'fa-calendar-alt'],
            ['Berita', 'data_berita', '', 'fa-newspaper']
        ];

        $id = $this->uri->segment(3);
        $data['user'] = $this->User->cari_user($id)->row();

        if ($data['user']->agama == "Islam") {
            $data['agama'] = ['selected', '', '', '', ''];
        } elseif ($data['user']->agama == "Kristen") {
            $data['agama'] = ['', 'selected', '', '', ''];
        } elseif ($data['user']->agama == "Katholik") {
            $data['agama'] = ['', '', 'selected', '', ''];
        } elseif ($data['user']->agama == "Hindu") {
            $data['agama'] = ['', '', '', 'selected', ''];
        } elseif ($data['user']->agama == "Budha") {
            $data['agama'] = ['', '', '', '', 'selected'];
        }

        if ($data['user']->pendidikan == "SMA") {
            $data['pendidikan'] = ['selected', '', '', '', '', ''];
        } elseif ($data['user']->pendidikan == "D3") {
            $data['pendidikan'] = ['', 'selected', '', '', '', ''];
        } elseif ($data['user']->pendidikan == "D4") {
            $data['pendidikan'] = ['', '', 'selected', '', '', ''];
        } elseif ($data['user']->pendidikan == "S1") {
            $data['pendidikan'] = ['', '', '', 'selected', '', ''];
        } elseif ($data['user']->pendidikan == "S2") {
            $data['pendidikan'] = ['', '', '', '', 'selected', ''];
        } elseif ($data['user']->pendidikan == "S3") {
            $data['pendidikan'] = ['', '', '', '', '', 'selected'];
        }

        if ($data['user']->status == "Belum Menikah") {
            $data['status'] = ['selected', ''];
        } elseif ($data['user']->status == "Menikah") {
            $data['status'] = ['', 'selected'];
        }

        if ($data['user']->jenis_kelamin == "L") {
            $data['jenis_kelamin'] = ['selected', ''];
        } elseif ($data['user']->jenis_kelamin == "P") {
            $data['jenis_kelamin'] = ['', 'selected'];
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/data_pribadi', $data);
        $this->load->view('templates/footer');
    }

    function detail_pegawai()
    {
        $data['judul_halaman'] = "Admin - Detail Pegawai";
        $data['active'] = "";
        $data['dashboard'] = "admin";
        $data['data_pribadi'] = "data_pribadi";
        $data['menu'] = [
            ['Data Pegawai', 'data_pegawai', 'active', 'fa-user'],
            ['Cuti', 'data_cuti', '', 'fa-calendar-alt'],
            ['Berita', 'data_berita', '', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/detail_pegawai');
        $this->load->view('templates/footer');
    }

    function tambah_anak()
    {
        $data['judul_halaman'] = "Admin - Tambah Anak";
        $data['active'] = "";
        $data['dashboard'] = "admin";
        $data['data_pribadi'] = "data_pribadi";
        $data['menu'] = [
            ['Data Pegawai', 'data_pegawai', 'active', 'fa-user'],
            ['Cuti', 'data_cuti', '', 'fa-calendar-alt'],
            ['Berita', 'data_berita', '', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/tambah_anak');
        $this->load->view('templates/footer');
    }

    function tambah_istri()
    {
        $data['judul_halaman'] = "Admin - Tambah Istri";
        $data['active'] = "";
        $data['dashboard'] = "admin";
        $data['data_pribadi'] = "data_pribadi";
        $data['menu'] = [
            ['Data Pegawai', 'data_pegawai', 'active', 'fa-user'],
            ['Cuti', 'data_cuti', '', 'fa-calendar-alt'],
            ['Berita', 'data_berita', '', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/tambah_istri');
        $this->load->view('templates/footer');
    }

    function tambah_suami()
    {
        $data['judul_halaman'] = "Admin - Tambah Suami";
        $data['active'] = "";
        $data['dashboard'] = "admin";
        $data['data_pribadi'] = "data_pribadi";
        $data['menu'] = [
            ['Data Pegawai', 'data_pegawai', 'active', 'fa-user'],
            ['Cuti', 'data_cuti', '', 'fa-calendar-alt'],
            ['Berita', 'data_berita', '', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/tambah_suami');
        $this->load->view('templates/footer');
    }

    function update_data()
    {
        $nik = $this->input->post('nik');
        $password_plain = $this->input->post('password');
        $password_ecrypt = password_hash($password_plain, PASSWORD_DEFAULT);
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'password' => $password_ecrypt,
            'alamat' => $this->input->post('alamat'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'pendidikan' => $this->input->post('pendidikan'),
            'status' => $this->input->post('status'),
            'agama' => $this->input->post('agama'),
            'no_telp' => $this->input->post('no_telp')
        );

        if ($data > 0) {
            $this->User->update_data($data, $nik);
            $data = $this->User->cari_user($nik)->row();
            $data_user = array(
                'nama'      => $data->nama,
                'id'        => $data->nik,
                'password'  => $password_plain,
                'role'      => $data->id_akses,
                'jabatan'   => $data->nama_jabatan
            );
            $this->session->set_userdata($data_user);
            $this->session->set_flashdata('pesan', 'Data Berhasil Di Ubah');
            redirect(base_url('admin/data_pribadi/' . $this->session->userdata('id')));
        } else {
            $this->session->set_flashdata('pesan', 'Data Harus Dilengkapi. Silahkan Isi Data Ulang');
            redirect(base_url('admin/data_pribadi/' . $this->session->userdata('id')));
        }
    }

    function input_news()
    {
        $data = [
            'id_berita'     => '',
            'nik'           => $this->session->userdata('nik'),
            'judul_berita'  => $this->input->post('judul'),
            'nama_gambar'   => 'default.jpg',
            'tanggal'       => $this->input->post('tanggal'),
            'isi_berita'    => $this->input->post('isi'),
            ''
        ];
        if ($data > 0) {
            $this->News->input_berita($data);
        }
    }
}
