<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getUsersData()
    {
        return $this->db->get('user')->result_array();
    }

    public function getPangkat()
    {
        return $this->db->get('pangkat')->result_array();
    }

    public function getRole()
    {
        return $this->db->get('user_role')->result_array();
    }

    public function getSeksi()
    {
        return $this->db->get('seksi/subseksi')->result_array();
    }

    public function tambahUser()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'nip' => $this->input->post('nip'),
            'pangkat' => $this->input->post('pangkat'),
            'password' => md5(123456),
            'role_id' => $this->input->post('role'),
            'seksi' => $this->input->post('seksisub'),
            'atasan' => $this->input->post('atasan'),

        ];
        return $this->db->insert('user', $data);
    }

    public function deleteUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
}
