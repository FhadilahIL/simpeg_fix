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
        $this->load->model('User');
        $this->load->model('News');
    }

    function index()
    {
        $data['judul_halaman'] = "Pegawai - Dashboard";
        $data['active'] = "active";
        $data['dashboard'] = base_url('pegawai');
        $data['data_pribadi'] = base_url('pegawai/data_pribadi');
        $data['menu'] = [
            ['Data Pribadi', base_url('pegawai/detail_pribadi'), '', 'fa-user'],
            ['Cuti', base_url('pegawai/detail_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('pegawai/data_berita'), '', 'fa-newspaper']
        ];
        $id = $this->session->userdata('nik');
        $data['user'] = $this->User->cari_user($id)->row();
        $data['data_berita'] = $this->News->tampil_berita_index()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pegawai/index', $data);
        $this->load->view('templates/footer');
    }

    function data_pribadi($username)
    {
        $username = $this->uri->segment(3);
        // $username = $this->encryption->decrypt($url);
        $data['judul_halaman'] = "Pegawai - Data Pribadi";
        $data['active'] = "";
        $data['dashboard'] = base_url('pegawai');
        $data['data_pribadi'] = "#";
        $data['menu'] = [
            ['Data Pribadi', base_url('pegawai/detail_pribadi'), 'active', 'fa-user'],
            ['Cuti', base_url('pegawai/detail_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('pegawai/data_berita'), '', 'fa-newspaper']
        ];
        $data['user'] = $this->User->detail_pegawai($username)->row();

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
        $this->load->view('pegawai/data_pribadi', $data);
        $this->load->view('templates/footer');
    }

    function detail_pribadi()
    {
        $username = $this->session->userdata('nik');
        $data['judul_halaman'] = "Pegawai - Detail Pribadi";
        $data['active'] = "";
        $data['dashboard'] = base_url('pegawai');
        $data['data_pribadi'] = base_url('pegawai/data_pribadi');
        $data['menu'] = [
            ['Data Pribadi', '#', 'active', 'fa-user'],
            ['Cuti', base_url('pegawai/detail_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('pegawai/data_berita'), '', 'fa-newspaper']
        ];
        $id = $this->session->userdata('nik');
        $data['user'] = $this->User->cari_user($id)->row();
        $data['detail'] = $this->User->detail_pegawai($username)->row();
        if ($data['detail']->jenis_kelamin === "L") {
            $data['jenis_kelamin'] = "Laki - Laki";
        } elseif ($data['detail']->jenis_kelamin === "P") {
            $data['jenis_kelamin'] = "Perempuan";
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pegawai/detail_pribadi', $data);
        $this->load->view('templates/footer');
    }

    function detail_cuti()
    {
        $id = $this->session->userdata('nik');
        $data['user'] = $this->User->cari_user($id)->row();
        $data['judul_halaman'] = "Pegawai - Detail Cuti";
        $data['active'] = "";
        $data['dashboard'] = base_url('pegawai');
        $data['data_pribadi'] = base_url('pegawai/data_pribadi');
        $data['menu'] = [
            ['Data Pegawai', base_url('pegawai/detail_pribadi'), '', 'fa-user'],
            ['Cuti', '#', 'active', 'fa-calendar-alt'],
            ['Berita', base_url('pegawai/data_berita'), '', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pegawai/data_cuti');
        $this->load->view('templates/footer');
    }

    function tambah_cuti()
    {
        $id = $this->session->userdata('nik');
        $data['user'] = $this->User->cari_user($id)->row();
        $data['judul_halaman'] = "Pegawai - Tambah Cuti";
        $data['active'] = "";
        $data['dashboard'] = base_url('pegawai');
        $data['data_pribadi'] = base_url('pegawai/data_pribadi');
        $data['menu'] = [
            ['Data Pegawai', base_url('pegawai/detail_pribadi'), '', 'fa-user'],
            ['Cuti', base_url('pegawai/detail_cuti'), 'active', 'fa-calendar-alt'],
            ['Berita', base_url('pegawai/data_berita'), '', 'fa-newspaper']
        ];
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pegawai/tambah_cuti');
        $this->load->view('templates/footer');
    }

    function data_berita()
    {
        $id = $this->session->userdata('nik');
        $data['user'] = $this->User->cari_user($id)->row();
        $data['judul_halaman'] = "Pegawai - Data Berita";
        $data['active'] = "";
        $data['dashboard'] = base_url('pegawai');
        $data['data_pribadi'] = base_url('pegawai/data_pribadi');
        $data['menu'] = [
            ['Data Pegawai', base_url('pegawai/detail_pribadi'), '', 'fa-user'],
            ['Cuti', base_url('pegawai/detail_cuti'), '', 'fa-calendar-alt'],
            ['Berita', '#', 'active', 'fa-newspaper']
        ];
        $data['data_berita'] = $this->News->daftar_berita()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pegawai/data_berita', $data);
        $this->load->view('templates/footer');
    }

    function upload_gambar($nama)
    {
        $config['upload_path']          = './assets/img/berita/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['file_name']            = $nama;
        $config['max_size']             = 1024;
        $config['overwrite']            = true;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data('file_name');
        } else {
            return $this->upload->display_errors();
        }
    }

    function detail_berita($id_berita)
    {
        $id_berita = $this->uri->segment(3);
        $data['judul_halaman'] = "Pegawai - Detail Berita";
        $data['active'] = "";
        $data['dashboard'] = base_url('pegawai');
        $data['data_pribadi'] = base_url('pegawai/data_pribadi');
        $data['menu'] = [
            ['Data Pegawai', base_url('pegawai/detail_pribadi'), '', 'fa-user'],
            ['Cuti', base_url('pegawai/detail_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('pegawai/data_berita'), 'active', 'fa-newspaper']
        ];
        $id = $this->session->userdata('nik');
        $data['user'] = $this->User->cari_user($id)->row();
        $data['detail_berita'] = $this->News->tampil_berita($id_berita)->row();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pegawai/detail_berita');
        $this->load->view('templates/footer');
    }

    function update_data()
    {
        $nik = $this->input->post('nik');
        $password_plain = $this->input->post('password');
        $gambar = $this->input->post('gambar');
        if ($password_plain != "") {
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'password' => password_hash($password_plain, PASSWORD_DEFAULT),
                'alamat' => $this->input->post('alamat'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'pendidikan' => $this->input->post('pendidikan'),
                'status' => $this->input->post('status'),
                'agama' => $this->input->post('agama'),
                'no_telp' => $this->input->post('no_telp')
            );
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'pendidikan' => $this->input->post('pendidikan'),
                'status' => $this->input->post('status'),
                'agama' => $this->input->post('agama'),
                'no_telp' => $this->input->post('no_telp')
            );
        }
        if ($gambar) {
            $data = ['nama_gambar_profile' => $this->upload_gambar('profile_' . $nik)];
        }
        print_r($data);
        die;

        if ($this->User->update_data($data, $nik)) {
            // $data = $this->User->detail_pegawai($username)->row();
            $this->session->set_flashdata('pesan_berhasil', 'Data Berhasil Di Ubah');
            redirect(base_url('pegawai/data_pribadi/' . $nik));
        } else {
            $this->session->set_flashdata('pesan_gagal', 'Data Harus Dilengkapi. Silahkan Isi Data Ulang');
            redirect(base_url('pegawai/data_pribadi/' . $nik));
        }
    }
}
