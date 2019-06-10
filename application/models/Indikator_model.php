<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Indikator_model extends CI_Model
{

    public function user()
    {
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function getIKUById($idiku)
    {
        return $this->db->get_where('indikatorkinerjautama', ['id_iku' => $idiku])->row_array();
    }

    public function logbookterakhir()
    {
        $data = $this->db->query("SELECT * FROM logbook ORDER BY id_logbook DESC LIMIT 1");

        if ($data->num_rows() > 0) {
            return $data->result_array()[0];
        } else {
            return 0;
        }
    }

    public function getKontrak()
    {
        $query = $this->db->query('SELECT `kontrakkinerja`.*, `user`.nama from `kontrakkinerja`join `user` using(nip)');
        return $query->result_array();
    }

    public function getKontrakByNIP()
    {
        $role = $this->session->userdata('nip');
        $query = $this->db->query("SELECT * from `kontrakkinerja`  where nip=$role and is_validated=1");
        return $query->row_array();
    }

    public function getIKU()
    {
        //return $this->db->get('indikatorkinerjautama')->result_array();
        $query = $this->db->query("SELECT `indikatorkinerjautama`.*,`user`.nama, `user`.nip from `indikatorkinerjautama`join `user` using(nip)");
        return $query->result_array();
    }

    public function getIKUByNIP()
    {
        $role = $this->session->userdata('nip');
        return $this->db->get_where('indikatorkinerjautama', ['nip' => $role])->result_array();
    }

    public function rekamikubaru()
    {
        $data = [
            'nip' => $this->input->post('nomorpegawai', true),
            'id_iku' => uniqid(),
            'nomorkk' => $this->input->post('nomorkk', true),
            'kodeiku' => $this->input->post('kodeiku', true),
            'namaiku' => $this->input->post('namaiku', true),
            'formulaiku' => $this->input->post('formulaiku', true),
            'targetiku' => $this->input->post('targetiku', true),
            'nilaitertinggi' => $this->input->post('nilaitertinggi', true),
            'satuanpengukuran' => $this->input->post('satuanpengukuran', true),
            'konsolidasiperiodeiku' => $this->input->post('konsolidasiperiode', true),
        ];

        $this->db->insert('indikatorkinerjautama', $data);
    }

    public function hapusiku($idiku)
    {
        $this->db->where('id_iku', $idiku);
        $this->db->delete('indikatorkinerjautama');
    }

    public function ubahdataIKU()
    {
        $data = [
            'kodeiku' => $this->input->post('kodeiku', true),
            'namaiku' => $this->input->post('namaiku', true),
            'formulaiku' => $this->input->post('formulaiku', true),
            'targetiku' => $this->input->post('targetiku', true),
            'nilaitertinggi' => $this->input->post('nilaitertinggi', true),
            'satuanpengukuran' => $this->input->post('satuanpengukuran', true),
            'konsolidasiperiodeiku' => $this->input->post('konsolidasiperiode', true),
        ];

        $this->db->where('id_iku', $this->input->post('id_iku'));
        $this->db->update('indikatorkinerjautama', $data);
    }
}
