<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NilaiUts extends CI_Controller
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
		$mhs = $this->KrsModel->getDataMhs();
		$ta = $this->TaModel->getAktif()->row_array();

		$data['title'] = 'UAS (Ujian Tengah Semester Semester)';
		$data['judul'] = 'UTS Mahasiswa';
		//setting krs
		$data['setting_krs'] = $this->db->get('set_krs')->row_array();
		$data['setting'] = $this->db->get('set_krs')->row_array();
		// $data['getUas'] = $this->JadwaluasModel->getMatkul_KRS($mhs['kd_jurusan']);
		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		//get data from session
		$data['mhs'] = $this->KrsModel->getDataMhs();
		//get Jadwal for mahasiswa
		//tampil data KRS berdasarkan sessi login mhs
		$data['viewKrs'] = $this->KrsModel->viewKrs($mhs['id_mahasiswa'], $ta['id_ta']);

		// $this->load->view('mhs/templates/header', $data);
		$this->load->view('mhs/nilai/nilai-uts-st', $data);
		// $this->load->view('mhs/templates/footer');
	}
}