<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AktivitasMhs extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();	

	}

	public function index()
	{
	
	$data['title'] = 'List Update Perbaikan Website';
	$data['judul'] = 'Update Website';
	$data['subJudul'] = 'Update-SBH';
	$data['perbaikan'] = $this->EdomModel->getData_Aktivitas('aktivitas')->result();
	// $data['tahun'] = $this->TaModel->getAktif()->result();
	// $this->load->view('admin/template/header', $da	ta);
	// $this->load->view('admin/template/sidebar', $data);
	$this->load->view('mhs/acktivitas-mhs-st', $data);
	// $this->load->view('admin/template/footer');
	
	}
}
