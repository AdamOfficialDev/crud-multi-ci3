<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        // Cek apakah ada user yang masuk ke admin sebelum login?
        if (!$this->session->userdata('is_login')) {
            redirect('Auth');
        }
        // Cek apakah admin yang login?
        if ($this->session->userdata('role') != 'admin') {
            redirect($this->session->userdata('role'));
        }
    }

    public function index()
    {
        $data['title'] = 'Welcome Admin';

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('admin/index');
        $this->load->view('template/footer');
    }
}
