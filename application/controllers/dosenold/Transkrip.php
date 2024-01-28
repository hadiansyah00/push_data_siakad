<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transkrip extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{	
		//Session login mahasiswa berdasarkan id login (ambil data KRS)
		$mhs = $this->KrsModel->getDataMhs();
		$ta = $this->TaModel->getTa()->row_array();
		//$ta = $this->TaModel->getTa()->row_array();

		$data['title'] = 'Transkrip Nilai Mahasiswa';
		$data['judul'] = 'Transkrip Nilai';
		//setting krs
		$data['setting'] = $this->db->get('set_krs')->row_array();	

		//$data['tahun'] = $this->TaModel->getAktif()->row_array();
		//$data['semester'] = $this->db->get('matakuliah')->result();
		//get data from session
		$data['mhs'] = $this->KrsModel->getDataMhs();
		//get ta
		//$data['ta'] = $this->TaModel->getData('ta')->result();
		//tampil data KRS berdasarkan sessi login mhs
		$data['viewKrs'] = $this->KrsModel->viewAll($mhs['id_mahasiswa'], $ta['id_ta']);
		//$data['viewKrs2'] = $this->KrsModel->viewAll($mhs['id_mahasiswa']);
		
		$this->load->view('mhs/templates/header',$data);
		$this->load->view('mhs/transkrip',$data);
		$this->load->view('mhs/templates/footer');
	}

	public function print($id_mhs)
	{
		//$where = array('id_mahasiswa' => $id_mhs);
		$ta = $this->TaModel->getTa()->row_array();
		//$data['jrs'] = $this->db->get('jurusan')->row_array();

		//$data['mhs'] = $this->db->get_where('mahasiswa', $where)->row_array();
		$data['mhs'] = $this->MahasiswaModel->mhsId($id_mhs)->row_array();
		$data['viewKrs'] = $this->KrsModel->viewAll($id_mhs, $ta['id_ta']);

		$this->load->view('admin/print/print', $data);
	}


	public function printKHS($id_mhs)
	{
		//Session login mahasiswa berdasarkan id login (ambil data KRS)
		$mhs = $this->KrsModel->getDataMhs();
		$ta = $this->TaModel->getAktif()->row_array();
		
		$data['setting'] = $this->db->get('set_krs')->row_array();	

		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		//get data from session
		$data['mhs'] = $this->KrsModel->getDataMhs();
		//get KRS for mhs
		$data['getKrs'] = $this->KrsModel->getMatkul_KRS($ta['id_ta'], $mhs['kd_jurusan']);
		$data['semester'] = $this->db->get('matakuliah')->row_array();
		//tampil data KRS berdasarkan sessi login mhs
		$data['viewKrs'] = $this->KrsModel->viewKrs($mhs['id_mahasiswa'], $ta['id_ta']);

		$this->load->view('admin/print/print_khs', $data);
	}



}