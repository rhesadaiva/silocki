<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getUsersData()
    {
        return $this->db->get('user')->result_array();
    }

    public function getPangkat()
    {
        return $this->db->get('pangkat')->result_array();
    }

    public function getRole()
    {
        return $this->db->get('user_role')->result_array();
    }

    public function getSeksi()
    {
        return $this->db->get('seksi/subseksi')->result_array();
    }

    public function getUserByID($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function countUser()
    {
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function countKK()
    {
        $query = $this->db->get('kontrakkinerja');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function countIKU()
    {
        $query = $this->db->get('indikatorkinerjautama');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function countLogbook()
    {
        $query = $this->db->get('logbook');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function tambahUser()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'nip' => $this->input->post('nip'),
            'pangkat' => $this->input->post('pangkat'),
            'password' => md5(123456),
            'role_id' => $this->input->post('role'),
            'seksi' => $this->input->post('seksisub'),
            'atasan' => $this->input->post('atasan'),

        ];
        return $this->db->insert('user', $data);
    }

    public function deleteUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    public function editUser($id)
    {

        $id = $this->uri->segment(3);

        $data = [
            'nama' => $this->input->post('nama'),
            'nip' => $this->input->post('nip'),
            'pangkat' => $this->input->post('pangkat'),
            'role_id' => $this->input->post('role'),
            'seksi' => $this->input->post('seksisub'),
            'atasan' => $this->input->post('atasan'),

        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }
    public function pegawainologbook()
    {
        $query = $this->db->query("SELECT `user`.`nama`, `user`.`nip`, `kontrakkinerja`.`nomorkk`, `kontrakkinerja`.`nip`, `indikatorkinerjautama`.id_iku, `indikatorkinerjautama`.`nip`, `logbook`.* 
                                    from `kontrakkinerja` right join `user` using (`nip`) 
                                    join `indikatorkinerjautama` using (`nomorkk`)
                                    join `logbook` using (`id_iku`) where `is_sent` = 0");

        return $query->result_array();
    }

    public function filternologbook($periode)
    {
        $query = $this->db->query("SELECT `user`.`nama`, `user`.`nip`, `kontrakkinerja`.`nomorkk`, `kontrakkinerja`.`nip`, `indikatorkinerjautama`.id_iku, `indikatorkinerjautama`.`nip`, `logbook`.* 
                                    from `kontrakkinerja` right join `user` using (`nip`) 
                                    join `indikatorkinerjautama` using (`nomorkk`)
                                    join `logbook` using (`id_iku`) where `is_sent` = 0 and `periode` =  '$periode'");

        return $query->result_array();
    }

    public function pegawainotvalidatedlogbook()
    {
        $query = $this->db->query("SELECT `user`.`nama`, `user`.`nip`, `kontrakkinerja`.`nomorkk`, `kontrakkinerja`.`nip`, `indikatorkinerjautama`.id_iku, `indikatorkinerjautama`.`nip`, `logbook`.* 
                                    from `kontrakkinerja` right join `user` using (`nip`) 
                                    join `indikatorkinerjautama` using (`nomorkk`)
                                    join `logbook` using (`id_iku`) where `is_sent` = 1 and `is_approved`= 0");

        return $query->result_array();
    }

    public function filternotvalidatedlogbook($periode)
    {
        $query = $this->db->query("SELECT `user`.`nama`, `user`.`nip`, `kontrakkinerja`.`nomorkk`, `kontrakkinerja`.`nip`, `indikatorkinerjautama`.id_iku, `indikatorkinerjautama`.`nip`, `logbook`.* 
                                    from `kontrakkinerja` right join `user` using (`nip`) 
                                    join `indikatorkinerjautama` using (`nomorkk`)
                                    join `logbook` using (`id_iku`) where `is_sent` = 1 and `is_approved`= 0 and `periode` =  '$periode'");

        return $query->result_array();
    }
}
