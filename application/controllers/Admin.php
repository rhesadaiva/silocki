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
        $data['jumlahuser'] = $this->Admin_model->countUser();
        $data['jumlahkk'] = $this->Admin_model->countKK();
        $data['jumlahiku'] = $this->Admin_model->countIKU();
        $data['jumlahlogbook'] = $this->Admin_model->countLogbook();

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

    public function tambahpegawai()
    {
        $data['title'] = 'Tambah Pegawai';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['user_data'] = $this->Admin_model->getUsersData();
        $data['pangkat'] = $this->Admin_model->getPangkat();
        $data['role'] = $this->Admin_model->getRole();
        $data['seksi'] = $this->Admin_model->getSeksi();

        //Validasi Tambah User

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nip', 'Nomor Induk Pegawai', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin');
            $this->load->view('templates/topbar');
            $this->load->view('admin/tambah_user', $data);
            $this->load->view('templates/footer');
        } else {

            $this->Admin_model->tambahUser();
            $this->session->set_flashdata('user', 'ditambahkan dengan password 123456');
            redirect('admin/manajemen_user');
        }
    }


    //Fitur Edit User
    public function editpegawai($id)
    {
        $data['title'] = 'Ubah Data Pegawai';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['user_data'] = $this->Admin_model->getUsersData();
        $data['userdetail'] = $this->Admin_model->getUserByID($id);
        $data['pangkat'] = $this->Admin_model->getPangkat();
        $data['role'] = $this->Admin_model->getRole();
        $data['seksi'] = $this->Admin_model->getSeksi();

        //Validasi EDIT User

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('nip', 'Nomor Induk Pegawai', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar_admin');
            $this->load->view('templates/topbar');
            $this->load->view('admin/edituser', $data);
            $this->load->view('templates/footer');
        } else {
            //Validasi
            $this->Admin_model->editUser($id);
            $this->session->set_flashdata('user', 'berhasil diubah, silahkan melanjutkan kegiatan anda!');
            redirect('admin/manajemen_user');
        }
    }

    //Hapus User
    public function hapuspegawai($id)
    {
        $this->Admin_model->deleteUser($id);
        $this->session->set_flashdata('user', 'berhasil dihapus. Silahkan melanjutkan kegiatan anda!');
        redirect('admin/manajemen_user');
    }

    //Halaman Daftar Pegawai yang belum rekam logbook
    public function belumrekamlogbook()
    {
        $data['title'] = 'Pegawai Yang Belum Rekam Logbook';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['periode'] = $this->input->get('periodepelaporan');

        $data['belumlogbook'] = $this->Admin_model->pegawainologbook();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/belumrekamlogbook', $data);
        $this->load->view('templates/footer');
    }

    //Halaman Pencarian Pegawai yang belum rekam logbook
    public function filterbelumrekamlogbook()
    {
        $data['title'] = 'Pegawai Yang Belum Rekam Logbook';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['periode'] = $this->input->get('periodepelaporan');

        $data['belumlogbook'] = $this->Admin_model->filternologbook($data['periode']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/belumrekamlogbook', $data);
        $this->load->view('templates/footer');
    }

    public function logbookbelumdisetujui()
    {
        $data['title'] = 'Logbook Yang Belum Disetujui';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['periode'] = $this->input->get('periodepelaporan');

        $data['belumlogbook'] = $this->Admin_model->pegawainotvalidatedlogbook();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/belumapprovelogbook', $data);
        $this->load->view('templates/footer');
    }

    public function filterlogbookbelumdisetujui()
    {
        $data['title'] = 'Logbook Yang Belum Disetujui';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['periode'] = $this->input->get('periodepelaporan');

        $data['belumlogbook'] = $this->Admin_model->filternotvalidatedlogbook($data['periode']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar_admin');
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/belumapprovelogbook', $data);
        $this->load->view('templates/footer');
    }
}
