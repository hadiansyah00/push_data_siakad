<?php
defined('BASEPATH') or exit('No direct script access allowed');


//ini Halaman Dashboardnya

class HalamanUtama extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
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
		$this->load->view('bauk/template/header', $data);
		$this->load->view('bauk/template/sidebar', $data);
		$this->load->view('bauk/dashboard');
		$this->load->view('bauk/template/footer');
	}
}
