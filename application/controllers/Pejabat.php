<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pejabat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        cek_atasan();
        $this->load->model('Pejabat_model');
        $this->load->model('Indikator_model');
        $this->load->model('Logbook_model');
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->load->view('templates/header', $data);
        cek_sidebar();
        $this->load->view('templates/topbar', $data);
        $this->load->view('pejabat/index');
        $this->load->view('templates/footer');
    }

    public function kontrakkinerjabawahan()
    {
        $data['title'] = 'Browse Kontrak Kinerja Bawahan';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['role'] = $this->session->userdata('role_id');
        if ($data['role'] == 1) {
            $data['kontrak_kinerja'] = $this->Pejabat_model->getAllKontrak();
        } else {
            $data['kontrak_kinerja'] = $this->Pejabat_model->getKontrakBawahan();
        }

        $this->load->view('templates/header', $data);
        cek_sidebar();
        $this->load->view('templates/topbar', $data);
        $this->load->view('pejabat/kontrakkinerjabawahan', $data);
        $this->load->view('templates/footer');
    }

    public function approvekontrak($id)
    {
        $this->Pejabat_model->approvekontrak($id);
        $this->session->set_flashdata('kkbawahan', 'Disetujui');
        redirect('pejabat/kontrakkinerjabawahan');
    }

    public function batalapprovekontrak($id)
    {
        $this->Pejabat_model->batalapprovekontrak($id);
        $this->session->set_flashdata('kkbawahan', 'Dibatalkan');
        redirect('pejabat/kontrakkinerjabawahan');
    }

    public function detailkontrak($id)
    {
        $data['detailkontrak'] = $this->Pejabat_model->getdetailkontrak($id);
        $data['title'] = 'Detail Kontrak Kinerja';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['listiku'] = $this->Pejabat_model->getIKUFromKontrak($id);

        $this->load->view('templates/header', $data);
        cek_sidebar();
        $this->load->view('templates/topbar', $data);
        $this->load->view('pejabat/detailkontrak', $data);
        $this->load->view('templates/footer');
    }

    public function approveiku($idiku)
    {
        $this->Pejabat_model->approveiku($idiku);
        $this->session->set_flashdata('ikubawahan', 'Disetujui');
        redirect('pejabat/kontrakkinerjabawahan');
    }


    public function batalapproveiku($idiku)
    {
        $this->Pejabat_model->batalapproveiku($idiku);
        $this->session->set_flashdata('ikubawahan', 'Dibatalkan');
        redirect('pejabat/kontrakkinerjabawahan');
    }

    public function logbookbawahan($idiku)
    {
        $idiku = $this->uri->segment(3);
        $data['title'] = 'Detail Indikator Kinerja Utama';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['role'] = $this->session->userdata('role_id');
        $data['indikator'] = $this->Indikator_model->getIKUById($idiku);
        $data['logbookdetail'] = $this->Logbook_model->getlogbook($idiku);


        $this->load->view('templates/header', $data);
        cek_sidebar();
        $this->load->view('templates/topbar', $data);
        $this->load->view('pejabat/logbookbawahan', $data);
        $this->load->view('templates/footer');
    }

    public function approvelogbook($idlogbook)
    {
        $this->Pejabat_model->approvelogbook($idlogbook);
        $this->session->set_flashdata('logbookbawahan', 'Disetujui');
        redirect('pejabat/kontrakkinerjabawahan');
    }

    public function batalapprovelogbook($idlogbook)
    {
        $this->Pejabat_model->batalapprovelogbook($idlogbook);
        $this->session->set_flashdata('logbookbawahan', 'Dibatalkan');
        redirect('pejabat/kontrakkinerjabawahan');
    }
}
