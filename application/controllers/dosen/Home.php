<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Dasboard Dosen SBH ';
		$data['judul'] = 'Dasboard Dosen SBH ';
		//get data from session
		$data['dsn'] = $this->KrsModel->getDataDosen();
		$data['setting'] = $this->db->get('set_krs')->row_array();
		//post by admin
		$data['post'] = $this->db->get('post')->row_array();
		$data['slider'] = $this->db->get('img_slider')->result();

		$this->load->view('dosen/templates/header', $data);
		$this->load->view('dosen/home-dosen');
		$this->load->view('dosen/templates/footer');
	}
}
