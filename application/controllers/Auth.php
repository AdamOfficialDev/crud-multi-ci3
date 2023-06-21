<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Auth_m');
    }

    public function index()
    {
        // Cek apakah ada user sedang login?   
        if ($this->session->userdata('is_login')) {
            redirect($this->session->userdata('role'));
        }

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Form';

            $this->load->view('template/header', $data);
            $this->load->view('auth/login');
            $this->load->view('template/footer');
        } else {
            $this->Auth_m->login();
        }
    }


    public function register()
    {
        // Cek apakah ada user sedang login?   
        if ($this->session->userdata('is_login')) {
            redirect($this->session->userdata('role'));
        }

        $this->form_validation->set_rules('name', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration Page';
            $this->load->view('template/header', $data);
            $this->load->view('auth/register');
            $this->load->view('template/footer');
        } else {
            $this->Auth_m->register();
        }
    }

    public function logout()
    {
        // Cek apakah tidak ada user sedang login => harus login dulu?   
        if (!$this->session->userdata('is_login')) {
            redirect('Auth');
        }
        $this->Auth_m->logout();
    }
}
