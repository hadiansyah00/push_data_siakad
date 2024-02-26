<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mhskrs extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		//Session login mahasiswa berdasarkan id login (ambil data KRS)
		$ds = $this->KrsModel->getDataDosen();
		$ta = $this->TaModel->getAktif()->row_array();

		$data['title'] = 'Mahasiswa Didik ';
		$data['judul'] = 'List Mahasiswa Didik';
		$dsn = $this->MahasiswaModel->getData();
		//get data from session
		$data['dsn'] = $this->KrsModel->getDataDosen();
    	$data['mhs'] = $this->MahasiswaModel->getMhsDidik($ds['id_dosen']);
		
		// $this->load->view('dosen/templates/header', $data);
		$this->load->view('dosen/mahasiswa/mhs-dpa', $data);
		// $this->load->view('dosen/templates/footer');
	}
}