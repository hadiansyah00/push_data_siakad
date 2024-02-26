<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

	public function view_mhs($id_mhs)
	{

		$data['title'] = 'Detail View Mahasiswa SBH';
		$data['judul'] = 'Master';
		$data['subJudul'] = 'Detail Mahasiswa';

		//$where = array('id_mahasiswa' => $id_mahasiswa);
		//var_dump($where);die();
        $data['dsn'] = $this->KrsModel->getDataDosen();
		$data['mhs'] = $this->MahasiswaModel->mhsId($id_mhs)->row_array();
		$data['viewKrs'] = $this->KrsModel->viewAll($id_mhs, $ta['id_ta']);
		//$data['mahasiswa'] = $this->MahasiswaModel->getMhsId($where)->result();
		// $this->load->view('dosen/templates/header', $data);
		$this->load->view('dosen/mahasiswa/view_mhs-st', $data);
		// $this->load->view('dosen/templates/footer');
	}
	
		public function detil_transkrip($id_mhs)
	{
		//Session login mahasiswa berdasarkan id login (ambil data KRS)
		//$mhs = $this->KrsModel->getDataMhs();
		//$where = array('id_mahasiswa' => $id_mhs);
		$ta = $this->TaModel->getTa()->row_array();
		//$ta = $this->TaModel->getTa()->row_array();
		$data['title'] = 'Detail View Mahasiswa SBH';
		$data['judul'] = 'Nilai Mahasiswa';
		$data['subJudul'] = 'Detail Nilai Mahasiswa';
		//Session login Dosen
		$data['dsn'] = $this->KrsModel->getDataDosen();
		//tampil seluruh data KRS yang diambil mahasiswa 
		$data['mhs'] = $this->MahasiswaModel->mhsId($id_mhs)->row_array();
		$data['viewKrs'] = $this->KrsModel->viewAll($id_mhs, $ta['id_ta']);
		//var_dump($data['viewKrs']);die();

		$this->load->view('dosen/templates/header', $data);
	
		$this->load->view('dosen/nilai_mhs/nilai_mhs', $data);
		$this->load->view('dosen/templates/footer');
	}
}