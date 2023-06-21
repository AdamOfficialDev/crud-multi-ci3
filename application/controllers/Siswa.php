<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_m');
        $this->load->library('form_validation');
        $this->load->library('session');

        // Cek apakah ada user yang masuk ke siswa sebelum login?
        if (!$this->session->userdata('is_login')) {
            redirect('Auth');
        }

        // Cek apakah user dan atau admin yang login?
        if ($this->session->userdata('role') != 'siswa' && $this->session->userdata('role') != 'admin') {
            redirect($this->session->userdata('role'));
        }
    }

    public function index()
    {
        $data['title'] = 'Daftar Siswa';
        $data['siswa'] = $this->Siswa_m->getAll();

        $this->load->view('template/header', $data);
        $this->load->view('template/navbar');
        $this->load->view('siswa/read', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Siswa';
            $data['kelas'] = ['X', 'XI', 'XII'];
            $data['jurusan'] = ['RPL', 'TKJ', 'FARMASI', 'ANKIM', 'PERAWAT'];

            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('siswa/add', $data);
            $this->load->view('template/footer');
        } else {
            $this->Siswa_m->add();
        }
    }

    public function edit($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Data Siswa';
            // $data['kelas'] = ['X', 'XI', 'XII'];
            // $data['jurusan'] = ['RPL', 'TKJ', 'FARMASI', 'ANKIM', 'PERAWAT'];
            $data['siswa'] = $this->Siswa_m->getId($id);

            $this->load->view('template/header', $data);
            $this->load->view('template/navbar');
            $this->load->view('siswa/edit', $data);
            $this->load->view('template/footer');
        } else {
            $this->Siswa_m->edit();
        }
    }

    // public function siswaDetail()
    // {
    //     $data['title'] = 'Siswa Detail';

    //     $this->load->view('template/header', $data);
    //     $this->load->view('template/navbar');
    //     $this->load->view('siswa/detail');
    //     $this->load->view('template/footer');
    // }

    public function delete($id)
    {
        $this->Siswa_m->delete($id);
    }
}
