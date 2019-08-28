<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pejabat_model extends CI_Model
{
    //Ambil semua Kontrak Khusus Admin
    public function getAllKontrak()
    {
        $query = $this->db->query("SELECT `kontrakkinerja`.*, `user`.nama, `user`.nip, `user`.atasan, `user`.telegram from kontrakkinerja join user using (nip)");

        return $query->result_array();
    }

    //Ambil kontrak bawahan
    public function getKontrakBawahan()
    {
        $role = $this->session->userdata('nama');

        $query = $this->db->query("SELECT `kontrakkinerja`.*, `user`.nama, `user`.nip, `user`.atasan, `user`.telegram from kontrakkinerja join user using (nip) where atasan = '$role' ");

        return $query->result_array();

        // $resultKontrak = $query->result_array();

    }

    //Fungsi approve kontrak
    public function approvekontrak($id)
    {
        $role = $this->session->userdata('nama');

        $query = $this->db->query("SELECT `kontrakkinerja`.*, `user`.nama, `user`.nip, `user`.atasan, `user`.telegram from `kontrakkinerja` join `user` using (nip) where `kontrakkinerja`.id = '$id' ");

        $telegram = $query->row_array();

        $data =
            [
                'is_validated' => 2,
                'nama_validated' => $role,
                'tgl_validated' => date("Y-m-d H:i:s"),
            ];

        $this->db->where('id', $id);
        $this->db->update('kontrakkinerja', $data);

        // Kirim notifikasi ke Telegram bahwa Kontrak sudah diapprove
        $this->_telegram(
            $telegram['telegram'],
            "Halo, *" . $telegram['nama'] . " *\n\nKontrak Kinerja anda dengan nomor *" . $telegram['nomorkk'] . "* telah disetujui oleh *" . $telegram['atasan'] . "* . \n\nSilahkan melanjutkan dengan mengisi IKU dan Logbook anda. Terima kasih."
        );
    }


    //Fungsi batal approve kontrak
    public function batalapprovekontrak($id)
    {
        $query = $this->db->query("SELECT `kontrakkinerja`.*, `user`.nama, `user`.nip, `user`.atasan, `user`.telegram from `kontrakkinerja` join `user` using (nip) where `kontrakkinerja`.id = '$id' ");

        $telegram = $query->row_array();

        $data =
            [
                'is_validated' => 1
            ];

        $this->db->where('id', $id);
        $this->db->update('kontrakkinerja', $data);

        $this->_telegram(
            $telegram['telegram'],
            "Halo, *" . $telegram['nama'] . " *\n\nKontrak Kinerja anda dengan nomor *" . $telegram['nomorkk'] . "* tidak disetujui oleh *" . $telegram['atasan'] . "* . \n\nSilahkan perbaiki Kontrak Kinerja . Terima kasih."
        );
    }

    //Ambil detail Kontrak
    public function getdetailkontrak($id)
    {
        return $this->db->get_where('kontrakkinerja', ['id' => $id])->row_array();
    }

    //Ambil IKU dari Kontrak
    public function getIKUFromKontrak($id)
    {
        $id = $this->uri->segment(3);
        $query = $this->db->query("SELECT `user`.nip, `user`.`telegram`, `user`.atasan, 
                                    `kontrakkinerja`.*, `indikatorkinerjautama`.* FROM `user` JOIN `kontrakkinerja` 
                                    using (nip) join `indikatorkinerjautama` where `kontrakkinerja`.id = '$id' ");
        return $query->result_array();
    }

    //Aprrove IKU
    public function approveiku($idiku)
    {
        $role = $this->session->userdata('nama');

        $data =
            [
                'iku_validated' => 1,
                'nama_validated' => $role
            ];

        $this->db->where('id_iku', $idiku);
        $this->db->update('indikatorkinerjautama', $data);

        // Send Notif ke Telegram

    }

    //Batal approve IKU
    public function batalapproveiku($idiku)
    {
        $data =
            [
                'iku_validated' => 0
            ];

        $this->db->where('id_iku', $idiku);
        $this->db->update('indikatorkinerjautama', $data);
    }

    //Approve Logbook
    public function approvelogbook($idlogbook)
    {
        $role = $this->session->userdata('nama');

        $data =
            [
                'is_sent' => 1,
                'is_approved' => 1,
                'tgl_approve' => date("Y-m-d H:i:s"),
                'nama_validated' => $role,
            ];

        $this->db->where('id_logbook', $idlogbook);
        $this->db->update('logbook', $data);
    }

    //Batal approve logbook
    public function batalapprovelogbook($idlogbook)
    {
        $data =
            [
                'is_approved' => 0,
                'is_sent' => 0,
                'tgl_batalapprove' => date("Y-m-d H:i:s")
            ];

        $this->db->where('id_logbook', $idlogbook);
        $this->db->update('logbook', $data);
    }

    //Fungsi Hitung Bawahan
    public function countBawahan()
    {
        $role = $this->session->userdata('nama');

        $query = $this->db->query("SELECT * FROM user where atasan = '$role' ");
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    //Fungsi hitung KK Bawahan yang belum diapprove
    public function countKKBawahanNotApproved()
    {
        $role = $this->session->userdata('nama');

        $akunnotif = $this->db->get_where('user', ['nama' => $role])->row_array();

        $query = $this->db->query("SELECT `kontrakkinerja`.*, `user`.nama, `user`.`atasan` from kontrakkinerja  join user using (nip) where atasan = '$role' and is_validated != 2");
        if ($query->num_rows() > 0) {
            $kknotapproved = $query->num_rows();
            return $kknotapproved;
        } else {
            return 0;
        }
    }

    //Fungsi hitung IKU Bawahan yang belum diapprove
    public function countIKUBawahanNotApproved()
    {
        $role = $this->session->userdata('nama');

        $query = $this->db->query("SELECT `indikatorkinerjautama`.*, `user`.nama, `user`.atasan from indikatorkinerjautama join user using (nip) where atasan = '$role' and iku_validated != 1");
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    //Fungsi hitung Logbook Bawahan yang belum diapprove
    public function countLogbookBawahanNotApproved()
    {
        $role = $this->session->userdata('nama');

        $query = $this->db->query("SELECT `user`.`nama`, `user`.`nip`, `user`.`atasan`, `kontrakkinerja`.`nomorkk`, `kontrakkinerja`.`nip`, `indikatorkinerjautama`.id_iku, `indikatorkinerjautama`.`nip`, `logbook`.* 
                                    from `kontrakkinerja` right join `user` using (`nip`) 
                                    join `indikatorkinerjautama` using (`nomorkk`)
                                    join `logbook` using (`id_iku`) where `is_sent` = 1 and `is_approved` != 1 and `atasan` = '$role'");
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function getPengumuman()
    {
        return $this->db->get('pengumuman')->result_array();
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


// PEJABAT
