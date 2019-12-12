<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User');
        $this->load->helper('loguser_helper');
    }

    function cek_login()
    {
        $this->load->helper('loguser');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $data = $this->User->cari_user($username);
        if ($data->num_rows() > 0) {

            $user = $data->row();

            if (password_verify($password, $user->password)) {
                $data_user = array(
                    'nama'          => $user->nama,
                    'id'            => $user->id_pegawai,
                    'nik'           => $user->nik,
                    'role'          => $user->id_jabatan,
                    'jabatan'       => $user->nama_jabatan,
                    'id_divisi'     => $user->id_divisi,
                    'nama_divisi'   => $user->nama_divisi
                );

                if ($data_user['role'] == 1) {
                    $data_user['akses'] = "admin.psd";
                } else if ($data_user['role'] == 2) {
                    $data_user['akses'] = "pegawai.psd";
                } else if ($data_user['role'] == 3) {
                    $data_user['akses'] = "manager.psd";
                } else {
                    $this->session->set_flashdata('pesan', 'User Belum Didaftarkan Hak Aksesnya');
                    redirect('guest/login_page');
                }
                userLog('User maelakukan Login Akun', $data_user['id']);
                $this->session->set_userdata($data_user);
                redirect('auth/cek_session');
            } else {
                $this->session->set_flashdata('pesan', 'Password Yang Anda Masukan Salah');
                redirect('guest/login_page');
            }
        } else {
            $this->session->set_flashdata('pesan', 'NIK atau Email Tidak Terdaftar');
            redirect('guest/login_page');
        }
    }

    function cek_session()
    {
        if ($this->session->userdata('role') === '1') {
            redirect('admin');
        } else if ($this->session->userdata('role') === '2') {
            redirect('pegawai');
        } else if ($this->session->userdata('role') === '3') {
            redirect('manager');
        } else {
            $this->session->set_flashdata('pesan', 'Anda Harus Login Terlebih Dahulu');
            redirect('guest/login_page');
        }
    }

    function logout()
    {
        userLog('User melakukan Logout Akun', $this->session->userdata('id'));
        $this->session->sess_destroy();
        redirect(base_url());
    }

    function ubah_password()
    {
        $nik = $this->input->post('nik');
        $email = $this->input->post('email');
        $nama = $this->input->post('nama');
        $data = $this->User->cari_data($nik);
        if ($data->result()) {
            $user = $data->row();
            if ($user->email == $email) {
                if ($user->nama == $nama) {
                    $data = [
                        'nik'   => $user->nik
                    ];
                    $this->session->set_userdata($data);
                    redirect('guest/ubah_password');
                } else {
                    $this->session->set_flashdata('pesan', 'Nama Yang anda Masukan Tidak Sesuai');
                    redirect(base_url('guest/lupa_password'));
                }
            } else {
                $this->session->set_flashdata('pesan', 'Email Yang anda Masukan Tidak Sesuai');
                redirect(base_url('guest/lupa_password'));
            }
        } else {
            $this->session->set_flashdata('pesan', 'Data Yang anda Masukan Tidak Sesuai');
            redirect(base_url('guest/lupa_password'));
        }
    }

    function change_password()
    {
        $nik = $this->session->userdata('nik');
        $password = $this->input->post('password');
        $password_confirm = $this->input->post('password_confirm');

        if ($password === $password_confirm) {
            if (($password != "") && ($password_confirm != "")) {
                $data = [
                    'password' => password_hash($password, PASSWORD_DEFAULT)
                ];
                $this->User->update_password($nik, $data);
                $this->session->unset_userdata('nik');
                $this->session->set_flashdata('pesan_berhasil', 'Password Berhasil Diubah. Silahkan Login');
                redirect('guest/login_page');
            } else {
                $this->session->set_flashdata('pesan', 'Password Harus Diisi');
                redirect('guest/ubah_password');
            }
        } else {
            $this->session->set_flashdata('pesan', 'Password Tidak Sama. Silahkan Isi Ulang Password Baru');
            redirect(base_url('guest/ubah_password'));
        }
    }
}
