<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		//Session login dosen
		$mhs = $this->KrsModel->getDataDosen();
		$ta = $this->TaModel->getAktif()->row_array();

		$data['title'] = 'Jadwal Mengajar';
		$data['judul'] = 'Jadwal Mengajar';
		//setting krs
		$data['setting'] = $this->db->get('set_krs')->row_array();

		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		//get data from session
		$data['dsn'] = $this->KrsModel->getDataDosen();
		//get Jadwal for mahasiswa
		//tampil data KRS berdasarkan sessi login mhs
		$data['viewKrs'] = $this->KrsModel->viewKrs($mhs['id_mahasiswa'], $ta['id_ta']);

		$this->load->view('mhs/templates/header', $data);
		$this->load->view('mhs/jadwal', $data);
		$this->load->view('mhs/templates/footer');
	}
}
