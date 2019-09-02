<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

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
        $data['jumlahbawahan'] = $this->Pejabat_model->countBawahan();
        $data['kkbelumdiapprove'] = $this->Pejabat_model->countKKBawahanNotApproved();
        $data['ikubelumdiapprove'] = $this->Pejabat_model->countIKUBawahanNotApproved();
        $data['logbookbelumdiapprove'] = $this->Pejabat_model->countLogbookBawahanNotApproved();
        $data['pengumuman'] = $this->Pejabat_model->getPengumuman();

        $this->load->view('templates/header', $data);
        cek_sidebar();
        $this->load->view('templates/topbar', $data);
        $this->load->view('pejabat/index');
        $this->load->view('templates/footer');
<<<<<<< HEAD

        // Notif telegram setiap pejabat membuka dashboard
        $this->_notifpejabat();
    }

    private function _notifpejabat()
    {

        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $kknotapproved = $this->Pejabat_model->countKKBawahanNotApproved();
        $ikunotapproved = $this->Pejabat_model->countIKUBawahanNotApproved();
        $logbooknotapproved = $this->Pejabat_model->countLogbookBawahanNotApproved();
        $namalogin = $this->session->userdata('nama');

        if ($kknotapproved > 0) {
            $this->_telegram(
                $data['user']['telegram'],
                "Halo, *" . $namalogin . "* \n\nIzin menyampaikan, bahwa ada *" . $kknotapproved . "* Kontrak Kinerja yang belum disetujui oleh anda. \n\nSilahkan lakukan persetujuan terhadap Kontrak Kinerja tersebut agar bawahan dapat mengisi IKU dan Logbook. Terima kasih"
            );
        };

        if ($ikunotapproved > 0) {
            $this->_telegram(
                $data['user']['telegram'],
                "Halo, *" . $namalogin . "* \n\nIzin menyampaikan, bahwa ada *" . $ikunotapproved . "* Indikator Kinerja Utama (IKU) yang belum disetujui oleh anda. \n\nSilahkan lakukan persetujuan terhadap IKU tersebut agar bawahan dapat mengisi Logbook. Terima kasih"
            );
        };

        if ($logbooknotapproved > 0) {
            $this->_telegram(
                $data['user']['telegram'],
                "Halo, *" . $namalogin . "* \n\nIzin menyampaikan, bahwa ada *" . $logbooknotapproved . "* Logbook yang belum disetujui oleh anda. \n\nSilahkan lakukan persetujuan terhadap Logbook tersebut. Terima kasih"
            );
        };
=======
>>>>>>> notif
    }

    //Ambil Data KK Bawahan
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

    //Approve KK
    public function approvekontrak($id)
    {
        $approvekontrak = $this->Pejabat_model->approvekontrak($id);
        helper_log("approval", "memberikan persetujuan Kontrak Kinerja (id-kontrak-kinerja = $id)");
        // $this->session->set_flashdata('kkbawahan', 'Disetujui');
        // redirect('pejabat/kontrakkinerjabawahan');
        echo json_encode($approvekontrak);
    }

    //Batal Approve KK
    public function batalapprovekontrak($id)
    {
        $batalapprovekontrak = $this->Pejabat_model->batalapprovekontrak($id);
        helper_log("unapprove", "membatalkan persetujuan Kontrak Kinerja (id-kontrak-kinerja = $id)");
        // $this->session->set_flashdata('kkbawahan', 'Dibatalkan');
        // redirect('pejabat/kontrakkinerjabawahan');
        echo json_encode($batalapprovekontrak);
    }

    //Get Data KK
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

    //Approve IKU
    public function approveiku($idiku)
    {
        $approveiku = $this->Pejabat_model->approveiku($idiku);
        helper_log("approval", "memberikan persetujuan IKU (id-iku = $idiku)");
        // $this->session->set_flashdata('ikubawahan', 'Disetujui');
        // redirect('pejabat/kontrakkinerjabawahan');
        echo json_encode($approveiku);
    }

    //Batal Approve IKU
    public function batalapproveiku($idiku)
    {
        $batalapproveiku = $this->Pejabat_model->batalapproveiku($idiku);
        helper_log("unapprove", "membatalkan persetujuan IKU (id-iku = $idiku)");
        // $this->session->set_flashdata('ikubawahan', 'Dibatalkan');
        // redirect('pejabat/kontrakkinerjabawahan');
        echo json_encode($batalapproveiku);
    }

    //Get Logbook Bawahan
    public function logbookbawahan($idiku)
    {
        $idiku = $this->uri->segment(3);
        $data['title'] = 'Detail Indikator Kinerja Utama';
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['role'] = $this->session->userdata('role_id');
        $data['indikator'] = $this->Indikator_model->getIKUById($idiku);
        $data['logbookdetail'] = $this->Logbook_model->getsentlogbook($idiku);


        $this->load->view('templates/header', $data);
        cek_sidebar();
        $this->load->view('templates/topbar', $data);
        $this->load->view('pejabat/logbookbawahan', $data);
        $this->load->view('templates/footer');
    }

    //Approve Logbook
    public function approvelogbook($idlogbook)
    {
        $approvelogbook =  $this->Pejabat_model->approvelogbook($idlogbook);
        helper_log("approval", "memberikan persetujuan Logbook bawahan (id-logbook = $idlogbook)");
        // $this->session->set_flashdata('logbookbawahan', 'Disetujui');
        // redirect('pejabat/kontrakkinerjabawahan');
        echo json_encode($approvelogbook);
    }

    //Batal approve logbook
    public function batalapprovelogbook($idlogbook)
    {
        $batalapprovelogbook = $this->Pejabat_model->batalapprovelogbook($idlogbook);
        helper_log("unapproval", "membatalkan persetujuan Logbook bawahan (id-logbook = $idlogbook)");
        // $this->session->set_flashdata('logbookbawahan', 'Dibatalkan');
        // redirect('pejabat/kontrakkinerjabawahan');
        echo json_encode($batalapprovelogbook);
    }

    private function _telegram($telegram, $message)
    {
        $url = "https://api.telegram.org/bot905076968:AAG8sNGqlABcYAw6PuUL6eSuFn1-pmSGUpU/sendMessage?parse_mode=markdown&chat_id=" . $telegram;
        $url = $url . "&text=" . urlencode($message);

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
