<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verifikasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{

		$id_dosen = $this->VerifikasiModel->getDs();
		$data['title'] = 'Dashboard Dosen SBH';
		$data['judul'] = 'Dashboard Dosen';
		$data['subJudul'] = '';

		$stats = array('status_verfikasi' => 'Belum Verfikasi');
		$data['mhsds'] = $this->VerifikasiModel->getdsMhs($id_dosen, ['id_dosen'], $stats, ['status_verfikasi'])->result();
		// $data['setting'] = $this->db->get('set_krs')->row_array();
		// $data['tahun'] = $this->TaModel->getAktif()->row_array();
		// $data = $this->UserModel->getSession($this->session->userdata(['username']));
		// // $data = array(
		// // 	'username'	=> $data->username,
		// // 	'level'		=> $data->level
		// // );
		$this->load->view('dosen/template/header', $data);
		$this->load->view('dosen/template/sidebar', $data);
		$this->load->view('dosen/verifikasi_dosen', $data);
		$this->load->view('dosen/template/footer', $data);
	}
}
