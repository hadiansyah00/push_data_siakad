<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
		$this->load->model('PembayaranModel');
		$this->load->helper('rupiah_helper');
	}

	public function index()
	{
		//Session login mahasiswa berdasarkan id login (ambil data KRS)
		$mhs = $this->KrsModel->getDataMhs();
		$ta = $this->TaModel->getAktif()->row_array();
		$data['setting_krs'] = $this->db->get('set_krs')->row_array();
		$data['title'] = 'Administrasi Mahasiswa';
		$data['judul'] = 'Pembayaran Mahasiswa';
		//setting krs
		// 		$data['setting'] = $this->db->get('set_krs')->row_array();
		// 		$data['getUts'] = $this->JadwalutsModel->getMatkul_KRS($mhs['kd_jurusan']);
		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		//get data from session
		$data['mhs'] = $this->KrsModel->getDataMhs();

		//tampil pembayaran mahasiswa
		$data['viewAdm'] = $this->PembayaranModel->viewAdm($mhs['id_mahasiswa'], $ta['id_ta']);

		// $this->load->view('mhs/templates/header', $data);
		$this->load->view('mhs/adm/administrasi-st', $data);
		// $this->load->view('mhs/templates/footer');
	}
}