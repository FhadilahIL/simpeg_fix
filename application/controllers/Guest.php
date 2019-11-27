<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guest extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User');
    }

    function index()
    {
        $this->load->view('guest/index');
    }

    function login_page()
    {
        $this->load->view('guest/login');
    }
}
