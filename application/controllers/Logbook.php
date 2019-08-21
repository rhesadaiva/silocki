<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Logbook extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Indikator_model');
        $this->load->model('Logbook_model');
    }

    public function showlogbook($idiku)
    {

        $idiku = $this->uri->segment(3);

        $data['title'] = 'Detail Indikator Kinerja Utama';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['role'] = $this->session->userdata('role_id');
        $data['indikator'] = $this->Indikator_model->getIKUById($idiku);
        $data['logbookdetail'] = $this->Logbook_model->getlogbook($idiku);

        //VALIDATION DATA LOGBOOK
        $this->form_validation->set_rules('periodepelaporan', 'Periode Pelaporan', 'required');
        $this->form_validation->set_rules('perhitungan', 'Perhitungan', 'required');
        $this->form_validation->set_rules('realisasipadabulan', 'Realisasi Pada Bulan Pelaporan', 'required');
        $this->form_validation->set_rules('realisasisdbulan', 'Realisasi s.d Bulan Pelaporan', 'required');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
        //END VALIDATION DATA LOGBOOK

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            cek_sidebar();
            $this->load->view('templates/topbar', $data);
            $this->load->view('iku/logbook', $data);
            $this->load->view('templates/footer');
        } else {
            $this->aksirekamlogbook();
        }
    }

    public function aksirekamlogbook()
    {
        $this->Logbook_model->newlogbook();
        helper_log("add", "menambah Logbook baru");
        $this->session->set_flashdata('logbook', 'Ditambahkan');
        redirect('iku/browseiku');
    }

    public function hapuslogbook($idlogbook)
    {
        $this->Logbook_model->deletelogbook($idlogbook);
        helper_log("delete", "menghapus Logbook (id-logbook = $idlogbook)");
        $this->session->set_flashdata('logbook', 'Dihapus');
        redirect('iku/browseiku');
    }

    public function kirimkeatasan($idlogbook)
    {
        $this->Logbook_model->kirimlogbook($idlogbook);
        helper_log("send", "mengirim Logbook ke atasan (id-logbook = $idlogbook)");
        $this->session->set_flashdata('logbook', 'Dikirim ke atasan');
        redirect('iku/browseiku');
    }
}
