<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontrak_model extends CI_Model
{

    //Ambil data user
    public function user()
    {
        $query = $this->db->get('user');
        return $query->result_array();
    }

    //Ambil semua KK (khusus admin)
    public function getKontrak()
    {
        $query = $this->db->query('SELECT `kontrakkinerja`.*, `user`.nama from `kontrakkinerja`join `user` using(nip)');
        return $query->result_array();
    }

    //Ambil KK berdasarkan NIP login
    public function getKontrakByNIP()
    {
        $role = $this->session->userdata('nip');
        $query = $this->db->query("SELECT * from `kontrakkinerja` where nip='$role' ");
        return $query->result_array();
    }

    //ambil KK berdasarkan ID
    public function getKontrakbyID($id)
    {
        return $this->db->get_where('kontrakkinerja', ['id' => $id])->row_array();
    }

    //Tambah KK Baru
    public function tambahkontrakbaru()
    {
        $data = [
            'id' => uniqid(),
            'nip' => $this->input->post('nipkk'),
            'kontrakkinerjake' => $this->input->post('kontrakkinerjake'),
            'nomorkk' => $this->input->post('nomorkontrakkinerja'),
            'tanggalmulai' => $this->input->post('tanggalmulai'),
            'tanggalselesai' => $this->input->post('tanggalselesai'),
            'is_validated' => 1,
        ];

        $this->db->insert('kontrakkinerja', $data);
    }

    //Hapus KK 
    public function hapuskontrak($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kontrakkinerja');
    }

    //Edit KK
    public function editkontrak()
    {
        $data = [
            'kontrakkinerjake' => $this->input->post('kontrakkinerjake'),
            'nomorkk' => $this->input->post('nomorkontrakkinerja'),
            'tanggalmulai' => $this->input->post('tanggalmulai'),
            'tanggalselesai' => $this->input->post('tanggalselesai'),
            'is_validated' => 1,
        ];

        $this->db->where('id', $this->input->post('id_kontrak'));
        $this->db->update('kontrakkinerja', $data);
    }
}
