<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Dashboard Dosen SBH';
		$data['judul'] = 'Dashboard Dosen';
		$data['subJudul'] = '';

		//$data = $this->UserModel->getSession($this->session->userdata(['username']));
		// $data = array(
		// 	'username'	=> $data->username,
		// 	'level'		=> $data->level
		// );
		$this->load->view('dosen/template/header', $data);
		$this->load->view('dosen/template/sidebar', $data);
		$this->load->view('dosen/home-dosen');
		$this->load->view('dosen/template/footer');
	}
}
