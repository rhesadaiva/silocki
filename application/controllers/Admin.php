<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        cek_admin();
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index');
        $this->load->view('templates/footer');
    }

    public function manajemen_user()
    {
        $data['title'] = 'Manajemen User';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['user_data'] = $this->Admin_model->getUsersData();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar');
        $this->load->view('admin/manajemen_user', $data);
        $this->load->view('templates/footer');
    }

    public function tambahUser()
    {
        $data['title'] = 'Tambah User';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['user_data'] = $this->Admin_model->getUsersData();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin');
            $this->load->view('templates/topbar');
            $this->load->view('admin/tambah_user', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Admin_model->tambahUser();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Sub Menu added!</div>');
            redirect('admin/manajemen_user');
        }
    }
}
