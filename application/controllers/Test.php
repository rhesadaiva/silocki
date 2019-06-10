<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Test extends CI_Controller
{
    public function index()
    {
        $data['testdata'] = $this->db->get('logbook')->result_array();
        $this->load->view('test', $data);
    }
}
