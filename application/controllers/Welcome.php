<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct(); {
			is_logged_in();
		}
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function ambilPengumuman()
	{
		$this->load->model('Admin_model');

		$pengumuman = $this->Admin_model->getPengumuman();
		echo json_encode($pengumuman);
	}
}
