<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/auth_header.php');
            $this->load->view('login/index');
            $this->load->view('templates/auth_footer.php');
        } else {
            //validation success
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('nip');
        $password = md5($this->input->post('password'));

        $user = $this->db->get_where('user', ['nip' => $username])->row_array();

        if ($user) {
            //cek password
            if ($password == $user['password']) {

                $data = [
                    'nama' => $user['nama'],
                    'nip' => $user['nip'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);

                if ($user['role_id'] == 1) {

                    redirect('admin');
                } elseif ($user['role_id'] == 2) {

                    redirect('kepalakantor');
                } elseif ($user['role_id'] == 5) {

                    redirect('pelaksana');
                } else {

                    redirect('atasan');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak ditemukan! Silahkan login kembali.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak ditemukan! Silahkan login kembali.</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nip');
        $this->session->unset_userdata('role_id');

        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('login/blocked');
    }
}
