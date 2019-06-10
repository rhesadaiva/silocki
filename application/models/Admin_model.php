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
        return $this->db->get('user')->result_array();
    }

    public function tambahUser()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'nip' => $this->input->post('nip'),
            'pangkat' => $this->input->post('pangkat'),
            'password' => md5($this->input->post('password')),
            'role_id' => $this->input->post('role'),
            'level' => $this->input->post('level'),
            'seksi' => $this->input->post('seksisub'),
            'atasan' => $this->input->post('atasanlangsung'),

        ];
        return $this->db->insert('user', $data);
    }
}
