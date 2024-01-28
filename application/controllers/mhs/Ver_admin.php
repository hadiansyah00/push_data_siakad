<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ver_admin extends CI_Controller
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
		$data['title'] = 'Notifikasi SBH';
		$data['judul'] = 'Stikes Bogor Husada';

		$data['mhs'] = $this->KrsModel->getDataMhs();

		$this->load->view('mhs/templates/header', $data);
		$this->load->view('mhs/print', $data);
		$this->load->view('mhs/templates/footer');
	}
}
