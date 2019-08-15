<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/authv2_header');
            $this->load->view('login/index_v2');
            $this->load->view('templates/authv2_footer');
        } else {
            //validation success
            $this->_login();
        }
    }

    //Private function login
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
                helper_log("login", "masuk ke aplikasi");

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
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b class="alert-message">NIP atau Password tidak sesuai!</b></div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b class="alert-message">NIP atau Password tidak sesuai!</b></div>');
            redirect('auth');
        }
    }

    //Logout
    public function logout()
    {
        $this->session->sess_destroy();
        helper_log("logout", "keluar dari aplikasi");
        redirect('auth');
    }

    //Halaman Blocked
    public function blocked()
    {
        $this->load->view('login/blocked');
    }

    //Fitur Ganti Password
    public function gantipassword()
    {
        $data['title'] = 'Ganti Password';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->form_validation->set_rules('passwordlama', 'Password Lama', 'trim|required');
        $this->form_validation->set_rules('passwordbaru1', 'Password Baru', 'trim|required|matches[passwordbaru2]|min_length[5]');
        $this->form_validation->set_rules('passwordbaru2', 'Konfirmasi Password Baru', 'trim|required|matches[passwordbaru1]|min_length[5]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            cek_sidebar();
            $this->load->view('templates/topbar', $data);
            $this->load->view('login/gantipassword', $data);
            $this->load->view('templates/footer');
        } else {

            $passwordlama = md5($this->input->post('passwordlama'));
            $passwordbaru = $this->input->post('passwordbaru1');
            $currentpass = $data['user']['password'];

            //Jika input pada form Password Sekarang tidak match pada database
            if ($passwordlama != $currentpass) {

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password lama tidak sesuai dengan password sekarang!</div>');
                redirect('auth/gantipassword');
            } else {

                //Password sudah OK
                $newpassword = md5($passwordbaru);

                $this->db->set('password', $newpassword);
                $this->db->where('nip', $this->session->userdata('nip'));
                $this->db->update('user');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah, silahkan gunakan password baru pada saat login kembali.</div>');
                redirect('auth/gantipassword');
            }
        }
    }

    public function lupapassword()
    {
        $this->form_validation->set_rules('nipforgot', 'NIP', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/authv2_header');
            $this->load->view('login/index_v2');
            $this->load->view('templates/authv2_footer_auto_modal');
        } else {
            $this->_forgotpass();
        }
    }

    private function _forgotpass()
    {
        $nipforgot = $this->input->post('nipforgot', true);
        $user = $this->db->get_where('user', ['nip' => $nipforgot])->row_array();

        // Cek NIP apakah tersedia di database
        if ($nipforgot == $user['nip']) {

            // SIAPKAN TOKEN
            $token = uniqid();
            // var_dump($token);
            // die;

            $user_token = [
                'nama' => $user['nama'],
                'nip' => $nipforgot,
                'token' => $token,
                'is_used' => 0
            ];

            $this->_telegram(
                $user['nama']['nip']['telegram'],
                "Halo, " . $user['nama'] . "\n"
            );

            $this->db->insert('user_token', $user_token);
            // End Token


        } else {
            $this->session->set_flashdata('forgot', '<div class="alert alert-danger-sm" role="alert"><b class="alert-message">NIP atau Password tidak sesuai!</b></div>');
            redirect('auth/lupapassword');
        };
    }

    private function _telegram($idtelegram, $message)
    {
        $url = "https://api.telegram.org/bot905076968:AAG8sNGqlABcYAw6PuUL6eSuFn1-pmSGUpU/sendMessage?parse_mode=markdown&chat_id=" . $idtelegram;
        $url - $url . "&text=" . urlencode($message);

        $ch = curl_init();
        $optArray = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $optArray);
        $result = curl_exec($ch);
        curl_close($ch);
    }
}
