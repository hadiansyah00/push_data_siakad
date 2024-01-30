<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
		
		

	}

	public function index()
	{


		$data['title'] = 'Dashboard Admin SBH';
		$data['judul'] = 'Dashboard';
		$data['subJudul'] = '';

		//$data = $this->UserModel->getSession($this->session->userdata(['username']));
		// $data = array(
		// 	'username'	=> $data->username,
		// 	'level'		=> $data->level
		// );
		
		//status mahasiswa sbh
		$data['total_mhs'] = $this->MahasiswaModel->totalMhs();
		$data['total_tidak'] = $this->MahasiswaModel->TotalTidakAktif();
		$data['tidak'] = $this->MahasiswaModel->MhsTidakAktif();
		$data['cuti'] = $this->MahasiswaModel->cutiMhs();
	    $data['lulus'] = $this->MahasiswaModel->lulusMhs();
		$data['aktif'] = $this->MahasiswaModel->jumlahAktifMhs();
	
	    //status mahasiswa bidan
		$data['bidan'] = $this->MahasiswaModel->bidan_semua();
	    $data['bd_akt']     = $this->MahasiswaModel->bidan_aktif();
		$data['bd_ud']      = $this->MahasiswaModel->bidan_tidak();
		$data['bd_cuti']    = $this->MahasiswaModel->bidan_cuti();
		$data['bd_lulus']   = $this->MahasiswaModel->bidan_lulus();
	    $data['bd_2019']    = $this->MahasiswaModel->bidan_2019();
		$data['bd_2020']    = $this->MahasiswaModel->bidan_2020();
	    $data['bd_2021']    = $this->MahasiswaModel->bidan_2021();
		$data['bd_2022']    = $this->MahasiswaModel->bidan_2022();
	
		//status mahasiswa gizi
		$data['gz_sm']  = $this->MahasiswaModel->gizi();
	    $data['gz_akt']     = $this->MahasiswaModel->gz_aktif();
		$data['gz_ud']      = $this->MahasiswaModel->gz_ud();
		$data['gz_cuti']    = $this->MahasiswaModel->gz_cuti();
		$data['gz_lulus']   = $this->MahasiswaModel->gz_lulus();
	    $data['gz_2020']    = $this->MahasiswaModel->gz_2020();
		$data['gz_2021']    = $this->MahasiswaModel->gz_2021();
		$data['gz_2022']    = $this->MahasiswaModel->gz_2022();
		
		//status mahasiswa farmasi
		$data['farmasi_sm']  = $this->MahasiswaModel->farmasi_semua();
	    $data['frm_akt']     = $this->MahasiswaModel->frm_aktif();
		$data['frm_ud']      = $this->MahasiswaModel->frm_ud();
		$data['frm_cuti']    = $this->MahasiswaModel->frm_cuti();
		$data['frm_lulus']   = $this->MahasiswaModel->frm_lulus();
	    $data['frm_2019']    = $this->MahasiswaModel->frm_2019();
	    $data['frm_2020']    = $this->MahasiswaModel->frm_2020();
		$data['frm_2021']    = $this->MahasiswaModel->frm_2021();
		$data['frm_2022']    = $this->MahasiswaModel->frm_2022();
		
		$data['gizi'] = $this->MahasiswaModel->gizi();
		$data['farmasi'] = $this->MahasiswaModel->farmasi();
		
		// $this->load->view('admin/template/header', $data);
		// $this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin-st/dashboard-st');
		// $this->load->view('admin/template/footer');
	}
}
