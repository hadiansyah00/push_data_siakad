<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai_akhir extends CI_Controller
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

		$data['title'] = 'Nilai Akhir Semester Mahasiswa SBH ';
		$data['judul'] = 'Nilai Akhir Semester';
		//setting krs
		$data['setting'] = $this->db->get('mahasiswa')->row_array();
		$data['setting_krs'] = $this->db->get('set_krs')->row_array();
		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		//get data from session
		$data['mhs'] = $this->KrsModel->getDataMhs();
		//get KRS for mhs
		$data['getKrs'] = $this->KrsModel->getMatkul_KRS($ta['id_ta'], $mhs['kd_jurusan']);
		$data['semester'] = $this->db->get('matakuliah')->row_array();
		//tampil data KRS berdasarkan sessi login mhs
		$data['viewNilai'] = $this->KrsModel->viewKrs($mhs['id_mahasiswa'], $ta['id_ta']);

		// $this->load->view('mhs/templates/header', $data);
		$this->load->view('mhs/nilai/nilai-akhir-st', $data);
		// $this->load->view('mhs/templates/footer');
	}
}