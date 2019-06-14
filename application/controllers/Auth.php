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
                } elseif ($user['role_id'] == 3) {

                    redirect('pejabat');
                } elseif ($user['role_id'] == 4) {

                    redirect('pejabat');
                } else {
                    redirect('pelaksana');
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

    public function gantipassword()
    {
        $data['title'] = 'Ganti Password';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->form_validation->set_rules('passwordlama', 'Password Lama', 'trim|required');
        $this->form_validation->set_rules('passwordbaru1', 'Password Baru', 'trim|required|matches[passwordbaru2]');
        $this->form_validation->set_rules('passwordbaru2', 'Konfirmasi Password Baru', 'trim|required|matches[passwordbaru1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            cek_sidebar();
            $this->load->view('templates/topbar', $data);
            $this->load->view('login/gantipassword', $data);
            $this->load->view('templates/footer');
        } else {

            $passwordlama = $this->input->post('passwordlama');
            $passwordbaru = $this->input->post('passwordbaru1');

            if (!md5($passwordlama, $data['user']['password'])) {
                $this->load->view('login/invalidpassword');
            } else {
                $newpassword = md5($passwordbaru);

                $this->db->set('password', $newpassword);
                $this->db->where('nip', $this->session->userdata('nip'));
                $this->db->update('user');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah, silahkan login kembali.</div>');
                redirect('auth');
            }
        }
    }
}
