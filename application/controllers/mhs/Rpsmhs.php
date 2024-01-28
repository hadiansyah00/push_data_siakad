<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rpsmhs extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{

		$mhs = $this->KrsModel->getDataMhs();
		$data['title'] = 'Rencana Pembelajaran Semester ';
		$data['judul'] = 'RPS MHS SBH ';

		//get data from session
		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		//settingan krs
		$data['setting_krs'] = $this->db->get('set_krs')->row_array();
		$data['setting'] = $this->db->get('set_krs')->row_array();
		//get Session Login
		$data['getRps'] = $this->RpsModel->getRps($mhs['kd_jurusan']);
		$data['mhs'] = $this->KrsModel->getDataMhs();
		// $data['getRps'] = $this->RpsModel->getRps();



		$this->load->view('mhs/templates/header', $data);
		$this->load->view('mhs/rps-mhs', $data);
		$this->load->view('mhs/templates/footer');
	}
}
