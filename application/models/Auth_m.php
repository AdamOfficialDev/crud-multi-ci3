<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_m extends CI_Model
{
    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Query berdasarkan email
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // Cek apakah ada user denagn email tersebut?
        if ($user) {
            // Cek apakah passwordnya benar?
            if (password_verify($password, $user['password'])) {
                // Siapkan session
                $data = [
                    'name' => $user['name'],
                    'role' => $user['role'],
                    'email' => $user['email'],
                    'is_login' => true
                ];
                $this->session->set_userdata($data);
                // Cek Role dan Redirect sesuai Role
                if ($user['role'] == 'admin') {
                    redirect('Admin');
                } elseif ($user['role'] == 'siswa') {
                    redirect('Siswa');
                } else {
                    redirect('User');
                }
            } else {
                $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Wrong password.</div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Email not register.</div>');
            redirect('Auth');
        }
    }


    public function register()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role' => 'user'
        ];
        // insert ke DB
        $this->db->insert('user', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Congratulation! </strong>Create data successfully.</div>');
        redirect('Auth');
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('is_login');

        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Congratulation! </strong>Logout successfully.</div>');
        redirect('Auth');
    }
}
