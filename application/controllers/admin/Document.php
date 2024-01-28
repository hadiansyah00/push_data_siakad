<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Document extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Document Admin SBH';
		$data['judul'] = 'Document';
		$data['subJudul'] = '';

		//$data = $this->UserModel->getSession($this->session->userdata(['username']));
		// $data = array(
		// 	'username'	=> $data->username,
		// 	'level'		=> $data->level
		// );
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/doc/document');
		$this->load->view('admin/template/footer');
	}
}
