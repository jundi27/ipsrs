<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getUserById($un)
    {
        return $this->db->get_where('user', ['username' => $un])->row_array();
    }

    public function getUser()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role_id', '2');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTeknisi()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('role_id', '3');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function tambah()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'role_id' => $this->input->post('role_id'),
            'is_active' => $this->input->post('is_active'),
            'date_created' => time()
        ];

        $this->db->insert('user', $data);
    }

    public function hapus($id)
    {
        $this->db->delete('user', ['id' => $id]);
    }

    public function ubah()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'role_id' => $this->input->post('role_id'),
            'is_active' => $this->input->post('is_active'),
            'date_created' => time()
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }
}