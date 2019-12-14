<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manager extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User');
        $this->load->model('News');
        $this->load->model('Divisi');
        $this->load->model('Cuti');
        $this->load->helper('updatesession_helper');
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
        $pegawai = $this->Divisi->pegawai_divisi($this->session->userdata('id_divisi'))->result();
        $admin = $this->Divisi->admin_divisi($this->session->userdata('id_divisi'))->result();
        $data['card'] = [
            ['Jumlah Pegawai', count($pegawai), base_url('manager/data_pegawai_dicari/' . $this->session->userdata('id_divisi') . '/2')],
            ['Jumlah Admin', count($admin), base_url('manager/data_pegawai_dicari/' . $this->session->userdata('id_divisi') . '/1')]
        ];
        $data['menu'] = [
            ['Data Pegawai', base_url('manager/data_pegawai'), '', 'fa-user'],
            ['Cuti', base_url('manager/data_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('manager/data_berita'), '', 'fa-newspaper']
        ];
        $data['user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();
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
        $data['user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();
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
        $data['user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();
        $data['daftar_pegawai'] = $this->Divisi->pegawai_divisi($this->session->userdata('id_divisi'))->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('manager/data_pegawai', $data);
        $this->load->view('templates/footer');
    }

    function detail_pegawai($nik)
    {
        $nik = $this->uri->segment(3);
        $data['judul_halaman'] = "Manager - Detail Pegawai";
        $data['active'] = "";
        $data['dashboard'] = base_url('manager');
        $data['data_pribadi'] = base_url('manager/data_pribadi');
        $data['menu'] = [
            ['Data Pegawai', base_url('manager/data_pegawai'), 'active', 'fa-user'],
            ['Cuti', base_url('manager/data_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('manager/data_pribadi'), '', 'fa-newspaper']
        ];

        $data['user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();
        $data['user_pegawai'] = $this->User->cari_user($nik)->row();
        $data['detail_pegawai'] = $this->User->detail_pegawai($nik)->row();

        if ($data['detail_pegawai']->jenis_kelamin = "L") {
            $data['jenis_kelamin'] = "Laki - Laki";
        } elseif ($data['detail_pegawai']->jenis_kelamin = "P") {
            $data['jenis_kelamin'] = "Perempuan";
        } else {
            $data['jenis_kelamin'] = "";
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('manager/detail_pegawai');
        $this->load->view('templates/footer');
    }

    function hapus_data($id_pegawai)
    {
        $id_pegawai = $this->uri->segment(3);
        if ($this->User->delete_data($id_pegawai)) {
            $this->session->set_flashdata('pesan_berhasil', 'Berhasil Menghapus Data');
            redirect('manager/data_pegawai');
        }
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
        $data['user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();
        $data['data_cuti'] = $this->Cuti->tampil_cuti_manager($this->session->userdata('id_divisi'))->result();
        $data['bulan'] = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
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
        $data['user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();
        $data['daftar_berita'] = $this->News->daftar_berita()->result();

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
        $data['user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();
        $id_berita = $this->uri->segment(3);
        $data['detail_berita'] = $this->News->tampil_berita($id_berita)->row();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('manager/detail_berita', $data);
        $this->load->view('templates/footer');
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
                redirect(base_url('manager/data_pribadi/') . $nik);
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
            redirect(base_url('manager/data_pribadi/') . $nik);
        }
    }

    function data_pegawai_dicari($id_divisi, $id_jabatan = "", $nik = "")
    {
        $id_divisi = $this->uri->segment(3);
        $id_jabatan = $this->uri->segment(4);
        $nik = $this->uri->segment(5);

        $data['judul_halaman'] = "Manager - Data Dicari";
        $data['active'] = "";
        $data['dashboard'] = base_url('manager');
        $data['data_pribadi'] = base_url('manager/data_pribadi');
        $data['menu'] = [
            ['Data Pegawai', base_url('manager/data_pegawai'), 'active', 'fa-user'],
            ['Cuti', base_url('manager/data_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('manager/data_berita'), '', 'fa-newspaper']
        ];
        $data['user'] = $this->User->cari_user($this->session->userdata('nik'))->row();
        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();
        $data['daftar_pegawai'] = $this->User->manager_cari_pegawai_admin($id_divisi, $id_jabatan, $nik)->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('manager/data_pegawai_dicari');
        $this->load->view('templates/footer');
    }

    function log_pengajuan()
    {
        $data['judul_halaman'] = "Manager - Log Pengajuan Cuti";
        $data['active'] = "";
        $data['dashboard'] = base_url('manager');
        $data['data_pribadi'] = base_url('manager/data_pribadi');
        $data['menu'] = [
            ['Data Pegawai', base_url('manager/data_pegawai'), 'active', 'fa-user'],
            ['Cuti', base_url('manager/data_cuti'), '', 'fa-calendar-alt'],
            ['Berita', base_url('manager/data_berita'), '', 'fa-newspaper']
        ];

        $data['detail_user'] = $this->User->cari_detail_user($this->session->userdata('id'))->row();
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $data['data_cuti'] = $this->Cuti->tampil_cuti_log($this->session->userdata('id_divisi'), $bulan, $tahun)->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('manager/log_pengajuan', $data);
        $this->load->view('templates/footer');
    }

    function terima_cuti($id_cutipegawai)
    {
        $id_cutipegawai = $this->uri->segment(3);
        $data = [
            'status'    => 'Diterima',
            'alasan'    => 'Selamat Menikmati Liburan'
        ];
        if ($this->Cuti->terima_cuti($id_cutipegawai, $data)) {
            $this->session->set_flashdata('pesan_berhasil', 'Cuti Berhasil Diterima');
            redirect('manager/data_cuti');
        }
    }

    function tolak_cuti($id_cutipegawai)
    {
        $id_cutipegawai = $this->uri->segment(3);
        $data = [
            'status'    => 'Ditolak',
            'alasan'    => $this->input->post('alasan')
        ];
        if ($this->Cuti->tolak_cuti($id_cutipegawai, $data)) {
            $this->session->set_flashdata('pesan_berhasil', 'Cuti Berhasil Ditolak');
            redirect('manager/data_cuti');
        }
    }
}
