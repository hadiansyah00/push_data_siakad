<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Khs extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
			$this->load->model('EdomModel');
	}

	public function index()
	{
		//Session login mahasiswa berdasarkan id login (ambil data KRS)
		$mhs = $this->KrsModel->getDataMhs();
		$ta = $this->TaModel->getAktif()->row_array();

		$data['title'] = 'KHS Mahasiswa SBH ';
		$data['judul'] = 'Kartu Hasil Studi (KHS)';
		//setting krs
		$data['setting'] = $this->db->get('mahasiswa')->row_array();
		$data['setting_krs'] = $this->db->get('set_krs')->row_array();
		// $data['setting_edom'] = $this->db->get('krs',['status_edom_1'])->row_array();
		//  $data['setting_edom'] = $this->EdomModel->getEdomData();
		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		//get data from session
		$data['mhs'] = $this->KrsModel->getDataMhs();
		//get KRS for mhs
		$data['getKrs'] = $this->KrsModel->getMatkul_KRS($ta['id_ta'], $mhs['kd_jurusan']);
		$data['semester'] = $this->db->get('matakuliah')->row_array();
		//tampil data KRS berdasarkan sessi login mhs
		$data['viewKrs'] = $this->KrsModel->viewKrs($mhs['id_mahasiswa'], $ta['id_ta']);
			$data['setting_edom'] = $this->db->get('krs')->row_array();
		// $this->load->view('mhs/templates/header', $data);
		$this->load->view('mhs/khs/khs-mhs-st', $data);
		// $this->load->view('mhs/templates/footer');
	}
}