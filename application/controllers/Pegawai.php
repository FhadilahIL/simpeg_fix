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
        $this->load->model('Cuti');
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

        $data['user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();

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

        $data['user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();

        if (($data['detail_user']->agama == "Islam") || ($data['detail_user']->agama == "")) {
            $data['agama'] = ['selected', '', '', '', ''];
        } elseif ($data['detail_user']->agama == "Kristen") {
            $data['agama'] = ['', 'selected', '', '', ''];
        } elseif ($data['detail_user']->agama == "Katholik") {
            $data['agama'] = ['', '', 'selected', '', ''];
        } elseif ($data['detail_user']->agama == "Hindu") {
            $data['agama'] = ['', '', '', 'selected', ''];
        } elseif ($data['detail_user']->agama == "Budha") {
            $data['agama'] = ['', '', '', '', 'selected'];
        }

        if (($data['detail_user']->pendidikan == "SMA") || ($data['detail_user']->pendidikan == "")) {
            $data['pendidikan'] = ['selected', '', '', '', '', ''];
        } elseif ($data['detail_user']->pendidikan == "D3") {
            $data['pendidikan'] = ['', 'selected', '', '', '', ''];
        } elseif ($data['detail_user']->pendidikan == "D4") {
            $data['pendidikan'] = ['', '', 'selected', '', '', ''];
        } elseif ($data['detail_user']->pendidikan == "S1") {
            $data['pendidikan'] = ['', '', '', 'selected', '', ''];
        } elseif ($data['detail_user']->pendidikan == "S2") {
            $data['pendidikan'] = ['', '', '', '', 'selected', ''];
        } elseif ($data['detail_user']->pendidikan == "S3") {
            $data['pendidikan'] = ['', '', '', '', '', 'selected'];
        }

        if (($data['detail_user']->status == "Belum Menikah") || ($data['detail_user']->status == "")) {
            $data['status'] = ['selected', ''];
        } elseif ($data['detail_user']->status == "Menikah") {
            $data['status'] = ['', 'selected'];
        }

        if (($data['detail_user']->jenis_kelamin == "L") || ($data['detail_user']->jenis_kelamin == "")) {
            $data['jenis_kelamin'] = ['selected', ''];
        } elseif ($data['detail_user']->jenis_kelamin == "P") {
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
        $data['user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();

        if ($data['detail_user']->jenis_kelamin === "L") {
            $data['jenis_kelamin'] = "Laki - Laki";
        } elseif ($data['detail_user']->jenis_kelamin === "P") {
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

        $data['user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();

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

        $data['user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();
        $data['jenis_cuti'] = $this->Cuti->get_cuti()->result();

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
        $data['user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();
        $data['data_berita'] = $this->News->daftar_berita()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('pegawai/data_berita', $data);
        $this->load->view('templates/footer');
    }

    function detail_berita($id_berita)
    {
        $data['judul_halaman'] = "Pegawai - Detail Berita";
        $data['active'] = "";
        $data['dashboard'] = base_url('pegawai');
        $data['data_pribadi'] = base_url('pegawai/data_pribadi');
        $data['menu'] = [
            ['Data Pegawai', base_url('pegawai/detail_pribadi'), '', 'fa-user'],
            ['Cuti', base_url('pegawai/detail_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('pegawai/data_berita'), 'active', 'fa-newspaper']
        ];
        $data['user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();
        $id_berita = $this->uri->segment(3);
        $cari = $this->News->cari($id_berita);
        if ($cari->num_rows() > 0) {
            $a = $cari->row();
            if ($a->id_berita = $id_berita) {
                $data['detail_berita'] = $this->News->tampil_berita($id_berita)->row();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/navbar', $data);
                $this->load->view('pegawai/detail_berita', $data);
                $this->load->view('templates/footer');
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }

    function upload_gambar_profile($nama)
    {
        $config['upload_path']          = './assets/img/profile/';
        $config['allowed_types']        = 'jpg|png|jpeg|pdf';
        $config['file_name']            = $nama;
        $config['max_size']             = 5120;
        $config['overwrite']            = TRUE;
        $config['encrypt_name']         = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            $config['image_library'] = 'gd2';
            $config['width'] = "150";
            $config['height'] = "150";
            $config['maintain_ratio'] = FALSE;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            return $this->upload->data('file_name');
        } else {
            return $this->upload->display_errors();
        }
    }

    function update_data()
    {
        $id = $this->input->post('id');
        $nik = $this->input->post('nik');
        $password_plain = $this->input->post('password');
        $password_confirm = $this->input->post('password_confirm');
        $password_ecrypt = password_hash($password_plain, PASSWORD_DEFAULT);
        if ($password_plain != "") {
            if ($password_plain == $password_confirm) {
                if ($_FILES['gambar']['name']) {
                    $user = [
                        'nama'      => $this->input->post('nama'),
                        'email'     => $this->input->post('email'),
                        'password'  => $password_ecrypt
                    ];
                    $detail = [
                        'alamat'                => $this->input->post('alamat'),
                        'jenis_kelamin'         => $this->input->post('jenis_kelamin'),
                        'pendidikan'            => $this->input->post('pendidikan'),
                        'status'                => $this->input->post('status'),
                        'agama'                 => $this->input->post('agama'),
                        'no_telp'               => $this->input->post('no_telp'),
                        'nama_gambar_profile'   => $this->upload_gambar_profile($this->input->post('nama'))
                    ];
                    $this->session->set_flashdata('pesan_berhasil', 'Data dan Password Berhasil Diubah');
                } else {
                    $user = [
                        'nama'      => $this->input->post('nama'),
                        'email'     => $this->input->post('email'),
                        'password'  => $password_ecrypt
                    ];
                    $detail = [
                        'alamat'        => $this->input->post('alamat'),
                        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                        'pendidikan'    => $this->input->post('pendidikan'),
                        'status'        => $this->input->post('status'),
                        'agama'         => $this->input->post('agama'),
                        'no_telp'       => $this->input->post('no_telp')
                    ];
                    $this->session->set_flashdata('pesan_berhasil', 'Data dan Password Berhasil Diubah');
                }
            } else {
                $this->session->set_flashdata('pesan_gagal', 'Gagal Merubah Data Pribadi. Password Harus Sama');
                redirect(base_url('pegawai/data_pribadi/') . $nik);
            }
        } else {
            if ($_FILES['gambar']['name']) {
                $user = [
                    'nama'      => $this->input->post('nama'),
                    'email'     => $this->input->post('email'),
                ];
                $detail = [
                    'alamat'                => $this->input->post('alamat'),
                    'jenis_kelamin'         => $this->input->post('jenis_kelamin'),
                    'pendidikan'            => $this->input->post('pendidikan'),
                    'status'                => $this->input->post('status'),
                    'agama'                 => $this->input->post('agama'),
                    'no_telp'               => $this->input->post('no_telp'),
                    'nama_gambar_profile'   => $this->upload_gambar_profile($this->input->post('nama'))
                ];
                $this->session->set_flashdata('pesan_berhasil', 'Data Berhasil Diubah');
            } else {
                $user = [
                    'nama'  => $this->input->post('nama'),
                    'email' => $this->input->post('email')
                ];
                $detail = [
                    'alamat'        => $this->input->post('alamat'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'pendidikan'    => $this->input->post('pendidikan'),
                    'status'        => $this->input->post('status'),
                    'agama'         => $this->input->post('agama'),
                    'no_telp'       => $this->input->post('no_telp')
                ];
                $this->session->set_flashdata('pesan_berhasil', 'Data Berhasil Diubah');
            }
        }

        if (($this->User->update_data_users($user, $id)) && ($this->User->update_data_detail_user($detail, $id))) {
            $this->load->helper('updatesession');
            updateSession(['nama' => $user['nama']]);
            redirect(base_url('pegawai/data_pribadi/') . $nik);
        }
    }
}
