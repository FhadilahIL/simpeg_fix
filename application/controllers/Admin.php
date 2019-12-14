<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User');
        $this->load->model('Jabatan');
        $this->load->model('Cuti');
        $this->load->model('Divisi');
        $this->load->model('News');
        if ($this->session->userdata('role') != 1) {
            redirect('auth/cek_session');
        }
    }

    function index()
    {
        $data['judul_halaman'] = "Admin - Dashboard";
        $data['active'] = "active";
        $data['dashboard'] = base_url('admin');
        $data['data_pribadi'] = base_url('admin/data_pribadi');
        $id_divisi = $this->session->userdata('id_divisi');
        $admin = $this->User->cari_user_admin($id_divisi)->result();
        $pegawai = $this->User->cari_user_pegawai($id_divisi)->result();
        $manager = $this->User->cari_user_manager($id_divisi)->result();
        $data['berita'] = $this->News->tampil_berita_index(5)->result();
        $data['card'] = [
            ['Pegawai', count($pegawai)],
            ['Manager', count($manager)],
            ['Admin', count($admin)]
        ];
        $data['menu'] = [
            ['Data Pegawai', base_url('admin/data_pegawai'), '', 'fa-user'],
            ['Cuti', base_url('admin/data_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('admin/data_berita'), '', 'fa-newspaper'],
            ['Data Divisi', base_url('admin/data_divisi'), '', 'fa-newspaper']
        ];

        $data['user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();
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
        $data['dashboard'] = base_url('admin');
        $data['data_pribadi'] = base_url('admin/data_pribadi');
        $data['menu'] = [
            ['Data Pegawai', base_url('admin/data_pegawai'), 'active', 'fa-user'],
            ['Cuti', base_url('admin/data_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('admin/data_berita'), '', 'fa-newspaper'],
            ['Data Divisi', base_url('admin/data_divisi'), '', 'fa-newspaper']
        ];
        $data['user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();
        $data['daftar_pegawai'] = $this->User->get_pegawai($this->session->userdata('id_divisi'))->result();
        // $data['pegawai_user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        // $data['detail_pegawai'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();

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
        $data['dashboard'] = base_url('admin');
        $data['data_pribadi'] = base_url('admin/data_pribadi');
        $data['menu'] = [
            ['Data Pegawai', base_url('admin/data_pegawai'), 'active', 'fa-user'],
            ['Cuti', base_url('admin/data_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('admin/data_berita'), '', 'fa-newspaper'],
            ['Data Divisi', base_url('admin/data_divisi'), '', 'fa-newspaper']
        ];

        $data['user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();
        $data['jabatan'] = $this->Jabatan->get_jabatan()->result();
        $data['divisi'] = $this->Divisi->get_divisi()->result();

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
        $data['dashboard'] = base_url('admin');
        $data['data_pribadi'] = base_url('admin/data_pribadi');
        $data['menu'] = [
            ['Data Pegawai', base_url('admin/data_pegawai'), '', 'fa-user'],
            ['Cuti', base_url('admin/data_cuti'), 'active', 'fa-calendar-alt'],
            ['Berita', base_url('admin/data_berita'), '', 'fa-newspaper'],
            ['Data Divisi', base_url('admin/data_divisi'), '', 'fa-newspaper']
        ];
        $data['user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();
        $data['jenis_cuti'] = $this->Cuti->get_cuti()->result();
        $data['data_cuti'] = $this->Cuti->tampil_cuti_admin($this->session->userdata('id_divisi'))->result();

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
        $data['dashboard'] = base_url('admin');
        $data['data_pribadi'] = base_url('admin/data_pribadi');
        $data['menu'] = [
            ['Data Pegawai', base_url('admin/data_pegawai'), '', 'fa-user'],
            ['Cuti', base_url('admin/data_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('admin/data_berita'), 'active', 'fa-newspaper'],
            ['Data Divisi', base_url('admin/data_divisi'), '', 'fa-newspaper']
        ];

        $data['user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();
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
        $data['dashboard'] = base_url('admin');
        $data['data_pribadi'] = base_url('admin/data_pribadi');
        $data['menu'] = [
            ['Data Pegawai', base_url('admin/data_pegawai'), '', 'fa-user'],
            ['Cuti', base_url('admin/data_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('admin/data_berita'), 'active', 'fa-newspaper'],
            ['Data Divisi', base_url('admin/data_divisi'), '', 'fa-newspaper']
        ];

        $data['user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/tambah_berita');
        $this->load->view('templates/footer');
    }

    function ubah_data($nik)
    {
        $data['judul_halaman'] = "Admin - Ubah Data Pegawai";
        $data['active'] = "";
        $data['dashboard'] = base_url('admin');
        $data['data_pribadi'] = base_url('admin/data_pribadi');
        $data['menu'] = [
            ['Data Pegawai', base_url('admin/data_pegawai'), 'active', 'fa-user'],
            ['Cuti', base_url('admin/data_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('admin/data_berita'), '', 'fa-newspaper'],
            ['Data Divisi', base_url('admin/data_divisi'), '', 'fa-newspaper']
        ];

        $nik = $this->uri->segment(3);
        $data['user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();
        $data['pegawai'] = $this->User->cari_user($nik)->row();
        $data['detail_pegawai'] = $this->User->cari_detail_user($data['pegawai']->id_pegawai)->row();

        if (($data['detail_pegawai']->agama == "Islam") || ($data['detail_pegawai']->agama == "")) {
            $data['agama'] = ['selected', '', '', '', ''];
        } elseif ($data['detail_pegawai']->agama == "Kristen") {
            $data['agama'] = ['', 'selected', '', '', ''];
        } elseif ($data['detail_pegawai']->agama == "Katholik") {
            $data['agama'] = ['', '', 'selected', '', ''];
        } elseif ($data['detail_pegawai']->agama == "Hindu") {
            $data['agama'] = ['', '', '', 'selected', ''];
        } elseif ($data['detail_pegawai']->agama == "Budha") {
            $data['agama'] = ['', '', '', '', 'selected'];
        }

        if (($data['detail_pegawai']->pendidikan == "SMA") || ($data['detail_pegawai']->pendidikan == "")) {
            $data['pendidikan'] = ['selected', '', '', '', '', ''];
        } elseif ($data['detail_pegawai']->pendidikan == "D3") {
            $data['pendidikan'] = ['', 'selected', '', '', '', ''];
        } elseif ($data['detail_pegawai']->pendidikan == "D4") {
            $data['pendidikan'] = ['', '', 'selected', '', '', ''];
        } elseif ($data['detail_pegawai']->pendidikan == "S1") {
            $data['pendidikan'] = ['', '', '', 'selected', '', ''];
        } elseif ($data['detail_pegawai']->pendidikan == "S2") {
            $data['pendidikan'] = ['', '', '', '', 'selected', ''];
        } elseif ($data['detail_pegawai']->pendidikan == "S3") {
            $data['pendidikan'] = ['', '', '', '', '', 'selected'];
        }

        if (($data['detail_pegawai']->status == "Belum Menikah") || ($data['detail_pegawai']->status == "")) {
            $data['status'] = ['selected', ''];
        } elseif ($data['detail_pegawai']->status == "Menikah") {
            $data['status'] = ['', 'selected'];
        }

        if (($data['detail_pegawai']->jenis_kelamin == "L") || ($data['detail_pegawai']->jenis_kelamin == "")) {
            $data['jenis_kelamin'] = ['selected', ''];
        } elseif ($data['detail_pegawai']->jenis_kelamin == "P") {
            $data['jenis_kelamin'] = ['', 'selected'];
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/edit_pegawai', $data);
        $this->load->view('templates/footer');
    }

    function ubah_berita($id_berita)
    {
        $data['judul_halaman'] = "Admin - Ubah Berita";
        $data['active'] = "";
        $data['dashboard'] = base_url('admin');
        $data['data_pribadi'] = base_url('admin/data_pribadi');
        $data['menu'] = [
            ['Data Pegawai', base_url('admin/data_pegawai'), '', 'fa-user'],
            ['Cuti', base_url('admin/data_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('admin/data_berita'), 'active', 'fa-newspaper'],
            ['Data Divisi', base_url('admin/data_divisi'), '', 'fa-newspaper']
        ];
        $data['user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();
        $data['lihat_berita'] = $this->News->tampil_berita($id_berita)->row();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/edit_berita', $data);
        $this->load->view('templates/footer');
    }

    function detail_berita($id_berita)
    {
        $data['judul_halaman'] = "Admin - Detail Berita";
        $data['active'] = "";
        $data['dashboard'] = base_url('admin');
        $data['data_pribadi'] = base_url('admin/data_pribadi');
        $data['menu'] = [
            ['Data Pegawai', base_url('admin/data_pegawai'), '', 'fa-user'],
            ['Cuti', base_url('admin/data_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('admin/data_berita'), 'active', 'fa-newspaper'],
            ['Data Divisi', base_url('admin/data_divisi'), '', 'fa-newspaper']
        ];
        $data['user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();
        $id_berita = $this->uri->segment(3);
        $data['lihat'] = $this->News->tampil_berita($id_berita)->row();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/detail_berita', $data);
        $this->load->view('templates/footer');
    }

    function data_pribadi($nik)
    {
        $data['judul_halaman'] = "Admin - Data Pribadi";
        $data['active'] = "";
        $data['dashboard'] = base_url('admin');
        $data['data_pribadi'] = "#";
        $data['menu'] = [
            ['Data Pegawai', base_url('admin/data_pegawai'), 'active', 'fa-user'],
            ['Cuti', base_url('admin/data_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('admin/data_berita'), '', 'fa-newspaper'],
            ['Data Divisi', base_url('admin/data_divisi'), '', 'fa-newspaper']
        ];

        $nik = $this->uri->segment(3);
        $data['user'] = $this->User->cari_user($nik)->row();
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
        } elseif ($data['user']->status == "Menikah") {
            $data['status'] = ['', 'selected'];
        }

        if (($data['detail_user']->jenis_kelamin == "L") || ($data['detail_user']->jenis_kelamin == "")) {
            $data['jenis_kelamin'] = ['selected', ''];
        } elseif ($data['user']->jenis_kelamin == "P") {
            $data['jenis_kelamin'] = ['', 'selected'];
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/data_pribadi');
        $this->load->view('templates/footer');
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
                        'nama' => $this->input->post('nama'),
                        'email' => $this->input->post('email'),
                        'password' => $password_ecrypt
                    ];
                    $detail = [
                        'alamat' => $this->input->post('alamat'),
                        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                        'pendidikan' => $this->input->post('pendidikan'),
                        'status' => $this->input->post('status'),
                        'agama' => $this->input->post('agama'),
                        'no_telp' => $this->input->post('no_telp'),
                        'nama_gambar_profile' => $this->upload_gambar_profile($this->input->post('nama'))
                    ];
                    $this->session->set_flashdata('pesan_berhasil', 'Data dan Password Berhasil Diubah');
                } else {
                    $user = [
                        'nama' => $this->input->post('nama'),
                        'email' => $this->input->post('email'),
                        'password' => $password_ecrypt
                    ];
                    $detail = [
                        'alamat' => $this->input->post('alamat'),
                        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                        'pendidikan' => $this->input->post('pendidikan'),
                        'status' => $this->input->post('status'),
                        'agama' => $this->input->post('agama'),
                        'no_telp' => $this->input->post('no_telp')
                    ];
                    $this->session->set_flashdata('pesan_berhasil', 'Data dan Password Berhasil Diubah');
                }
            } else {
                $this->session->set_flashdata('pesan_gagal', 'Gagal Merubah Data Pribadi. Password Harus Sama');
                redirect(base_url('admin/data_pribadi/') . $nik);
            }
        } else {
            if ($_FILES['gambar']['name']) {
                $user = [
                    'nama' => $this->input->post('nama'),
                    'email' => $this->input->post('email'),
                ];
                $detail = [
                    'alamat' => $this->input->post('alamat'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'pendidikan' => $this->input->post('pendidikan'),
                    'status' => $this->input->post('status'),
                    'agama' => $this->input->post('agama'),
                    'no_telp' => $this->input->post('no_telp'),
                    'nama_gambar_profile' => $this->upload_gambar_profile($this->input->post('nama'))
                ];
                $this->session->set_flashdata('pesan_berhasil', 'Data Berhasil Diubah');
            } else {
                $user = [
                    'nama' => $this->input->post('nama'),
                    'email' => $this->input->post('email')
                ];
                $detail = [
                    'alamat' => $this->input->post('alamat'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'pendidikan' => $this->input->post('pendidikan'),
                    'status' => $this->input->post('status'),
                    'agama' => $this->input->post('agama'),
                    'no_telp' => $this->input->post('no_telp')
                ];
                $this->session->set_flashdata('pesan_berhasil', 'Data Berhasil Diubah');
            }
        }

        if (($this->User->update_data_users($user, $id)) && ($this->User->update_data_detail_user($detail, $id))) {
            $this->load->helper('updatesession');
            updateSession(['nama' => $user['nama']]);
            redirect(base_url('admin/data_pribadi/') . $nik);
        }
    }

    function upload_gambar_profile($nama)
    {
        $config['upload_path']          = './assets/img/profile/';
        $config['allowed_types']        = 'jpg|png|jpeg|pdf';
        $config['file_name']            = $nama;
        $config['max_size']             = 5120;
        $config['encrypt_name']         = TRUE;
        $config['overwrite']            = TRUE;

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

    function upload_gambar_berita($nama)
    {
        $config['upload_path']          = './assets/img/berita/';
        $config['allowed_types']        = 'jpg|png|jpeg|pdf';
        $config['file_name']            = $nama;
        $config['max_size']             = 5120;
        $config['overwrite']            = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('gambar')) {
            return $this->upload->data('file_name');
        } else {
            return $this->upload->display_errors();
        }
    }

    function input_news()
    {
        $data = [
            'id_berita'             => '',
            'id_pegawai'            => $this->session->userdata('id'),
            'judul_berita'          => $this->input->post('judul'),
            'nama_gambar_berita'    => $this->upload_gambar_berita($this->input->post('judul')),
            'tanggal'               => date('Ymd'),
            'isi_berita'            => $this->input->post('isi')
        ];
        if ($this->News->input_berita($data)) {
            $this->session->set_flashdata('pesan_berhasil', "Berita Behasil di Publish");
            redirect(base_url('admin/data_berita'));
        }
    }

    function edit_berita()
    {
        $id_berita = $this->input->post('id');
        $data = [
            'judul_berita'          => $this->input->post('judul'),
            'isi_berita'            => $this->input->post('isi'),
            'nama_gambar_berita'    => $this->upload_gambar_berita($this->input->post('judul')),
            'tanggal'               => date('Ymd'),
        ];
        if ($this->News->update_news($data, $id_berita)) {
            $this->session->set_flashdata('pesan_berhasil', 'Berhasil Update Berita');
            redirect(base_url('admin/data_berita'));
        }
    }

    function edit_pegawai()
    {
        $id = $this->input->post('id');
        $password_plain = $this->input->post('password');
        $password_confirm = $this->input->post('password_confirm');
        $password_ecrypt = password_hash($password_plain, PASSWORD_DEFAULT);
        if ($password_plain != "") {
            if ($password_plain == $password_confirm) {
                if ($_FILES['gambar']['name']) {
                    $user = [
                        'nama' => $this->input->post('nama'),
                        'email' => $this->input->post('email'),
                        'password' => $password_ecrypt
                    ];
                    $detail = [
                        'alamat' => $this->input->post('alamat'),
                        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                        'pendidikan' => $this->input->post('pendidikan'),
                        'status' => $this->input->post('status'),
                        'agama' => $this->input->post('agama'),
                        'no_telp' => $this->input->post('no_telp'),
                        'nama_gambar_profile' => $this->upload_gambar_profile($this->input->post('nama'))
                    ];
                    $this->session->set_flashdata('pesan_berhasil', 'Data dan Password Berhasil Diubah');
                } else {
                    $user = [
                        'nama' => $this->input->post('nama'),
                        'email' => $this->input->post('email'),
                        'password' => $password_ecrypt
                    ];
                    $detail = [
                        'alamat' => $this->input->post('alamat'),
                        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                        'pendidikan' => $this->input->post('pendidikan'),
                        'status' => $this->input->post('status'),
                        'agama' => $this->input->post('agama'),
                        'no_telp' => $this->input->post('no_telp')
                    ];
                    $this->session->set_flashdata('pesan_berhasil', 'Data dan Password Berhasil Diubah');
                }
            } else {
                $this->session->set_flashdata('pesan_gagal', 'Gagal Merubah Data Pribadi. Password Harus Sama');
                redirect(base_url('admin/data_pegawai'));
            }
        } else {
            if ($_FILES['gambar']['name']) {
                $user = [
                    'nama' => $this->input->post('nama'),
                    'email' => $this->input->post('email'),
                ];
                $detail = [
                    'alamat' => $this->input->post('alamat'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'pendidikan' => $this->input->post('pendidikan'),
                    'status' => $this->input->post('status'),
                    'agama' => $this->input->post('agama'),
                    'no_telp' => $this->input->post('no_telp'),
                    'nama_gambar_profile' => $this->upload_gambar_profile($this->input->post('nama'))
                ];
                $this->session->set_flashdata('pesan_berhasil', 'Data Berhasil Diubah');
            } else {
                $user = [
                    'nama' => $this->input->post('nama'),
                    'email' => $this->input->post('email')
                ];
                $detail = [
                    'alamat' => $this->input->post('alamat'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'pendidikan' => $this->input->post('pendidikan'),
                    'status' => $this->input->post('status'),
                    'agama' => $this->input->post('agama'),
                    'no_telp' => $this->input->post('no_telp')
                ];
                $this->session->set_flashdata('pesan_berhasil', 'Data Berhasil Diubah');
            }
        }

        if (($this->User->update_data_users($user, $id)) && ($this->User->update_data_detail_user($detail, $id))) {
            redirect(base_url('admin/data_pegawai'));
        }
    }


    function input_data()
    {
        $nik = $this->input->post('nik');
        $id_jabatan = $this->input->post('jabatan');
        if ($id_jabatan == "1") {
            $password_ecrypt = password_hash('admin#' . substr($nik, 12, 4), PASSWORD_DEFAULT);
        } elseif ($id_jabatan == "2") {
            $password_ecrypt = password_hash('pegawai#' . substr($nik, 12, 4), PASSWORD_DEFAULT);
        } elseif ($id_jabatan == "3") {
            $password_ecrypt = password_hash('manager#' . substr($nik, 12, 4), PASSWORD_DEFAULT);
        }
        $user = [
            'id_pegawai'    => '',
            'nik'           => $nik,
            'nama'          => $this->input->post('nama'),
            'email'         => $this->input->post('email'),
            'id_jabatan'    => $id_jabatan,
            'id_divisi'     => $this->input->post('divisi'),
            'password'      => $password_ecrypt
        ];

        if (!$nik == $this->User->cari_nik($nik)->result()) {
            $this->User->input_user($user);
            $cari = $this->User->cari_user($nik)->row();
            $id_cari = $cari->id_pegawai;
            $detail = [
                'id_pegawai'            => $id_cari,
                'alamat'                => '',
                'no_telp'               => '',
                'nama_gambar_profile'   => 'default.svg',
                'tanggal_masuk'         => date('Y-m-d')
            ];
            $this->User->input_detail_user($detail);
            $this->session->set_flashdata('pesan_berhasil', 'Berhasil Menyimpan Data');
            redirect(base_url('admin/data_pegawai'));
        } else {
            $this->session->set_flashdata('pesan_gagal', 'Gagal Menyimpan Data. NIK Sudah Ada');
            redirect(base_url('admin/data_pegawai'));
        }
    }

    function cari_data($nik)
    {
        $nik = $this->uri->segment(3);
        $data['judul_halaman'] = "Admin - Data Dicari";
        $data['active'] = "";
        $data['dashboard'] = base_url('admin');
        $data['data_pribadi'] = base_url('admin/data_pribadi');
        $data['menu'] = [
            ['Data Pegawai', base_url('admin/data_pegawai'), 'active', 'fa-user'],
            ['Cuti', base_url('admin/data_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('admin/data_berita'), '', 'fa-newspaper'],
            ['Data Divisi', base_url('admin/data_divisi'), '', 'fa-newspaper']
        ];
        $data['user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();
        $data['daftar_pegawai'] = $this->User->cari_nik_pegawai($this->session->userdata('id_divisi'), $nik)->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/data_pegawai');
        $this->load->view('templates/footer');
    }

    function cari_nik()
    {
        $nik = $this->input->post('nik');
        redirect('admin/cari_data/' . $nik);
    }

    function data_divisi()
    {
        $data['judul_halaman'] = "Admin - Tambah Divisi";
        $data['active'] = "";
        $data['dashboard'] = base_url('admin');
        $data['data_pribadi'] = base_url('admin/data_pribadi');

        $data['menu'] = [
            ['Data Pegawai', base_url('admin/data_pegawai'), '', 'fa-user'],
            ['Cuti', base_url('admin/data_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('admin/data_berita'), '', 'fa-newspaper'],
            ['Data Divisi', base_url('admin/data_divisi'), 'active', 'fa-newspaper']
        ];

        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();
        $data['data_divisi'] = $this->Divisi->get_divisi()->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/data_divisi');
        $this->load->view('templates/footer');
    }

    function tambah_divisi()
    {
        $data['judul_halaman'] = "Admin - Tambah Divisi";
        $data['active'] = "";
        $data['dashboard'] = base_url('admin');
        $data['data_pribadi'] = base_url('admin/data_pribadi');

        $data['menu'] = [
            ['Data Pegawai', base_url('admin/data_pegawai'), '', 'fa-user'],
            ['Cuti', base_url('admin/data_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('admin/data_berita'), '', 'fa-newspaper'],
            ['Data Divisi', base_url('admin/data_divisi'), 'active', 'fa-newspaper']
        ];

        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/tambah_divisi');
        $this->load->view('templates/footer');
    }

    function input_divisi()
    {
        $nama_divisi = $this->input->post('nama_divisi');
        $data = [
            'id_divisi'     => '',
            'nama_divisi'   => $nama_divisi
        ];

        if ($nama_divisi != '') {
            $this->Divisi->tambah_divisi($data);
            $this->session->set_flashdata('pesan_berhasil', 'Berhasil Menambahkan Divisi');
            redirect(base_url('admin/data_divisi'));
        } else {
            $this->session->set_flashdata('pesan_gagal', 'Gagal Menambahkan Divisi. Nama Harus Diisi');
            redirect(base_url('admin/data_divisi'));
        }
    }

    function ajukan_cuti()
    {
        $detail_user = $this->User->cari_detail_user($this->session->userdata('id'))->row();
        $id_pegawai = $this->input->post('id');
        $id_cuti = $this->input->post('jenis_cuti');
        $awal_cuti = $this->input->post('awal_cuti');
        $cari_cuti = $this->Cuti->cari_cuti($id_cuti)->row();
        $jumlah_hari = $cari_cuti->jumlah_cuti;

        if ($id_cuti != '1') {
            $akhir_cuti = date('Y-m-d', strtotime('+' . $jumlah_hari . ' days', strtotime($awal_cuti)));
            $data = [
                'id_cuti'           => $id_cuti,
                'id_pegawai'        => $id_pegawai,
                'id_cutipegawai'    => '',
                'awal_cuti'         => $awal_cuti,
                'akhir_cuti'        => $akhir_cuti,
                'keterangan'        => $this->input->post('keterangan'),
                'status'            => 'Pending'
            ];
        }
        $cari_akhir_cuti = $this->Cuti->cari_cuti_akhir($this->session->userdata('id'))->row();

        if (empty($awal_cuti)) {
            $this->session->set_flashdata('pesan_gagal', 'Anda Harus Mengisi Form yang Telah Disediakan');
            redirect('admin/data_cuti');
        } else {
            if ((date('m', strtotime($awal_cuti)) == date('m', strtotime($cari_akhir_cuti->akhir_cuti))) && (date('Y', strtotime($awal_cuti)) == date('Y', strtotime($cari_akhir_cuti->akhir_cuti)))) {
                $this->session->set_flashdata('pesan_gagal', 'Anda Sudah Mengajukan Cuti Dibulan Ini');
                redirect('admin/data_cuti');
            } else {
                if ($cari_akhir_cuti->status != 'Pending') {
                    if ($detail_user->jenis_kelamin == 'P') {
                        $this->Cuti->simpan_cuti($data);
                        $this->session->set_flashdata('pesan_berhasil', 'Cuti Berhasil Diajukan. Silahkan Tunggu Persetujuan dari Manager');
                        redirect('admin/data_cuti');
                    } else {
                        if ($id_cuti != '3') {
                            $this->Cuti->simpan_cuti($data);
                            $this->session->set_flashdata('pesan_berhasil', 'Cuti Berhasil Diajukan. Silahkan Tunggu Persetujuan dari Manager');
                            redirect('admin/data_cuti');
                        } else {
                            $this->session->set_flashdata('pesan_gagal', 'Anda Lelaki, Masa Mau lahiran');
                            redirect('admin/data_cuti');
                        }
                    }
                } else {
                    $this->session->set_flashdata('pesan_gagal', 'Silahkan tunggu Konfirmasi Manager. Pengajuan Sebelumnya Belum di Konfirmasi');
                    redirect('admin/data_cuti');
                }
            }
        }
    }
}
