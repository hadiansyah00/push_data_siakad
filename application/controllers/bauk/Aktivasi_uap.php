<?php
defined('BASEPATH') or exit('No direct script access allowed');


//ini Halaman Dashboardnya

class Aktivasi_uap extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{

		$data['title'] = 'Aktivasi UAP SBH';
		$data['judul'] = 'KEBIDANAN-UAP';
		$data['subJudul'] = '';

		// $data = $this->UserModel->getSession($this->session->userdata(['username']));
		// $data = array(
		// 	'username'	=> $data->username,
		// 	'level'		=> $data->level
		// );
		
		 $data['mhs']  = $this->MahasiswaModel->getDataBidan('mahasiswa')->result();
		// $this->load->view('bauk/template/header', $data);
		// $this->load->view('bauk/template/sidebar', $data);
		$this->load->view('bauk/prodi_bidan', $data);
		// $this->load->view('bauk/template/footer');
	}
}
