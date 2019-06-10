<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelaksana extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        cek_pelaksana();
    }


    public function index()
    {
        $data['title'] = 'Home';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_user');
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index');
        $this->load->view('templates/footer');
    }
}
