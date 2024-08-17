<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('user')->result_array();
    }

    public function getId($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function edit()
    {
        $data = [
            'name' => htmlspecialchars($this->input->post('name')),
            'email' => htmlspecialchars($this->input->post('email')),
            'role' => htmlspecialchars($this->input->post('role'))
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Congratulation !</strong>Update data successfully.</div>');
        redirect('user');
    }

    public function delete($id)
    {
        $this->db->delete('user', ['id' => $id]);
        $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Congratulation !</strong>Delete data successfully.</div>');
        redirect('user');
    }
}
