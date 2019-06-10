<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Iku extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Indikator_model');
        $this->load->model('Logbook_model');
    }

    public function browseiku()
    {
        $data['title'] = 'Browse Indikator Kinerja Utama';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['role'] = $this->session->userdata('role_id');
        if ($data['role'] == 1) {
            $data['indikator'] = $this->Indikator_model->getIKU();
        } else {
            $data['indikator'] = $this->Indikator_model->getIKUbyNIP();
        }

        $this->load->view('templates/header', $data);
        cek_sidebar();
        $this->load->view('templates/topbar', $data);
        $this->load->view('iku/browseiku', $data);
        $this->load->view('templates/footer');
    }

    public function rekamiku()
    {
        $data['title'] = 'Tambah IKU Baru';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['nip'] = $this->Indikator_model->user();
        $data['role'] = $this->session->userdata('role_id');
        if ($data['role'] == 1) {
            $data['kontrak_kinerja'] = $this->Indikator_model->getKontrak();
        } else {
            $data['kontrak_kinerja'] = $this->Indikator_model->getKontrakByNIP();
        }
        $this->form_validation->set_rules('kodeiku', 'Kode IKU', 'required');
        $this->form_validation->set_rules('namaiku', 'Nomor Kontrak Kinerja', 'required');
        $this->form_validation->set_rules('formulaiku', 'Formula IKU', 'required');
        $this->form_validation->set_rules('targetiku', 'Target IKU', 'required');
        $this->form_validation->set_rules('nilaitertinggi', 'Nilai Tertinggi', 'required');
        $this->form_validation->set_rules('satuanpengukuran', 'Satuan Pengukuran', 'required');
        $this->form_validation->set_rules('konsolidasiperiode', 'Konsolidasi Periode', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            cek_sidebar();
            $this->load->view('templates/topbar', $data);
            $this->load->view('iku/tambahiku', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Indikator_model->rekamikubaru();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('iku/browseiku');
        }
    }

    public function hapusiku($idiku)
    {
        $this->Indikator_model->hapusiku($idiku);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('iku/browseiku');
    }

    public function editiku($idiku)
    {
        $data['title'] = 'Edit IKU';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['nip'] = $this->Indikator_model->user();
        $data['role'] = $this->session->userdata('role_id');
        $data['iku'] = $this->Indikator_model->getIKUById($idiku);
        $data['satuanpengukuran'] = ['Persentase', 'Indeks', 'Satuan', 'Waktu'];
        $data['konsolidasiperiode'] = ['Sum', 'Average', 'Take Last Known'];

        $this->form_validation->set_rules('kodeiku', 'Kode IKU', 'required');
        $this->form_validation->set_rules('namaiku', 'Nomor Kontrak Kinerja', 'required');
        $this->form_validation->set_rules('formulaiku', 'Formula IKU', 'required');
        $this->form_validation->set_rules('targetiku', 'Target IKU', 'required');
        $this->form_validation->set_rules('nilaitertinggi', 'Nilai Tertinggi', 'required');
        $this->form_validation->set_rules('satuanpengukuran', 'Satuan Pengukuran', 'required');
        $this->form_validation->set_rules('konsolidasiperiode', 'Konsolidasi Periode', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            cek_sidebar();
            $this->load->view('templates/topbar', $data);
            $this->load->view('iku/editiku', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Indikator_model->ubahdataIKU($idiku);
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('iku/browseiku');
        }
    }
}
