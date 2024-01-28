<?php
defined('BASEPATH') or exit('No direct script access allowed');
//Ini Halaman Dashboard

class Db988b75ef9e581094b3793d4e5da08db6f8df2a extends CI_Controller
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

		$data['title'] = 'Dashboard BAUK SBH';
		$data['judul'] = 'Dashboard';
		$data['subJudul'] = '';

		// $data = $this->UserModel->getSession($this->session->userdata(['username']));
		// $data = array(
		// 	'username'	=> $data->username,
		// 	'level'		=> $data->level
		// );
		$data['mahasiswa'] = $this->MahasiswaModel->hitungTotal();
		$data['keu'] = $this->MahasiswaModel->hitungJumlah();
		$this->load->view('bauk/template/header', $data);
		$this->load->view('bauk/template/sidebar', $data);
		$this->load->view('bauk/dashboard');
		$this->load->view('bauk/template/footer');
	}
}
