<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logbook_model extends CI_Model
{

    public function newlogbook()
    {
        //Rekam Logbook Baru
        $data = [
            'periode' => $this->input->post('periodepelaporan', true),

            //UNTUK DATA DIBAWAH INI TIDAK PERLU FORM VALIDATION
            'id_iku' => $this->input->post('id_iku', true),
            'id_logbook' => uniqid(),
            'is_sent' => 0,
            'wakturekam' => indonesian_date2(date("Y-m-d H:i:s")),
            //END OF TIDAK PERLU FORM VALIDATION

            'perhitungan' => $this->input->post('perhitungan', true),
            'realisasibulan' => $this->input->post('realisasipadabulan', true),
            'realisasiterakhir' => $this->input->post('realisasisdbulan', true),

            'ket' => $this->input->post('keterangan', true),
        ];

        //Insert data
        $this->db->insert('logbook', $data);
    }

    public function getlogbook($idiku)
    {
        $idiku = $this->uri->segment(3);
        $query = $this->db->query("SELECT indikatorkinerjautama.*, logbook.* FROM indikatorkinerjautama JOIN logbook USING(id_iku) where id_iku='$idiku'");
        return $query->result_array();
    }

    public function ambillogbook()
    {
        $query = $this->db->query('SELECT * from logbook');
        return $query->result_array();
    }

    public function deletelogbook($idlogbook)
    {
        $this->db->where('id_logbook', $idlogbook);
        $this->db->delete('logbook');
    }

    public function kirimlogbook($idlogbook)
    {
        $data = [
            'is_sent' => 1
        ];

        $this->db->where('id_logbook', $idlogbook);
        $this->db->update('logbook', $data);
    }
}
