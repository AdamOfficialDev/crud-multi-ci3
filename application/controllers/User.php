<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_m');
        $this->load->library('form_validation');
        $this->load->library('session');
        // Cek apakah ada user yang masuk ke user sebelum login?
        if (!$this->session->userdata('is_login')) {
            redirect('Auth');
        }
        // Cek apakah user dan atau admin yang login?
        if ($this->session->userdata('role') != 'user' && $this->session->userdata('role') != 'admin') {
            redirect($this->session->userdata('role'));
        }
    }

    public function index()
    {
        $data['title'] = 'Welcome User';
        $data['users'] = $this->User_m->getAll();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('user/read', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Welcome User';
            $data['user'] = $this->User_m->getId($id);
            $data['role'] = ['admin', 'user', 'siswa'];

            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('user/edit', $data);
            $this->load->view('template/footer');
        } else {
            $this->User_m->edit($id);
        }
    }

    public function delete($id)
    {
        $this->User_m->delete($id);
    }
}
