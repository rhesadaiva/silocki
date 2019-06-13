<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pejabat_model extends CI_Model
{
    public function getAllKontrak()
    {
        $query = $this->db->query("SELECT `kontrakkinerja`.*, `user`.nama, `user`.nip, `user`.atasan, `user`.nipatasan from kontrakkinerja join user using (nip)");

        return $query->result_array();
    }

    public function getKontrakBawahan()
    {
        $role = $this->session->userdata('nama');

        $query = $this->db->query("SELECT `kontrakkinerja`.*, `user`.nama, `user`.nip, `user`.atasan, `user`.nipatasan from kontrakkinerja join user using (nip) where atasan = '$role' ");

        return $query->result_array();
    }

    public function approvekontrak($id)
    {
        $data =
            [
                'is_validated' => 2
            ];

        $this->db->where('id', $id);
        $this->db->update('kontrakkinerja', $data);
    }

    public function batalapprovekontrak($id)
    {
        $data =
            [
                'is_validated' => 1
            ];

        $this->db->where('id', $id);
        $this->db->update('kontrakkinerja', $data);
    }

    public function getdetailkontrak($id)
    {
        return $this->db->get_where('kontrakkinerja', ['id' => $id])->row_array();
    }

    public function getIKUFromKontrak($id)
    {
        $id = $this->uri->segment(3);
        $query = $this->db->query("SELECT `kontrakkinerja`.*, `indikatorkinerjautama`.* FROM kontrakkinerja JOIN indikatorkinerjautama using (nomorkk) where id = '$id' ");
        return $query->result_array();
    }

    public function approveiku($idiku)
    {
        $data =
            [
                'iku_validated' => 1
            ];

        $this->db->where('id_iku', $idiku);
        $this->db->update('indikatorkinerjautama', $data);
    }

    public function batalapproveiku($idiku)
    {
        $data =
            [
                'iku_validated' => 0
            ];

        $this->db->where('id_iku', $idiku);
        $this->db->update('indikatorkinerjautama', $data);
    }

    public function approvelogbook($idlogbook)
    {
        $data =
            [
                'is_approved' => 1
            ];

        $this->db->where('id_logbook', $idlogbook);
        $this->db->update('logbook', $data);
    }

    public function batalapprovelogbook($idlogbook)
    {
        $data =
            [
                'is_approved' => 0,
                'is_sent' => 0
            ];

        $this->db->where('id_logbook', $idlogbook);
        $this->db->update('logbook', $data);
    }
}
