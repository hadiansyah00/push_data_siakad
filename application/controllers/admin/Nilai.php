<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Nilai SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Nilai SBH';

		$data['tahun'] = $this->TaModel->getAktif()->result();
		$data['jurusan'] = $this->JurusanModel->getData('jurusan')->result();
		// $this->load->view('admin/template/header', $data);
		// $this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin-st/nilai/nilai-st', $data);
		// $this->load->view('admin/template/footer');
	}


	//input berdasarkan matakuliah
	public function getMknilai($id)
	{
		// $data['title'] = 'Evaluasi Dosen SBH';
		// $data['judul'] = 'Pilih Program Studi Akademik';
		// $data['subJudul'] = 'EDOM SBH';


		$where = array('kd_jurusan' => $id);
		$where_2 = array('kd_mk' => $id);
	
		//$where = 'kd_jurusan';
		// $data['tahun'] = $this->TaModel->getAktif()->row_array();
		$data['detil'] = $this->JurusanModel->detilData('jurusan', $where)->row_array();
		$data['tahun'] = $this->TaModel->getAktif()->result();
		$data['matkul'] = $this->KurikulumModel->getMatkul($id)->result();
		$data['krs_get'] = $this->KurikulumModel->getKRSByMatakuliah($id);
		
		// $this->load->view('admin/template/header', $data);
		// $this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin-st/nilai/view_list_matkul-st', $data);
		// $this->load->view('admin/template/footer');
	}
	public function getMatkul($id)
	{
		$data['title'] = 'Nilai Mahasiswa SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Input Nilai';


		$where = array('kd_jurusan' => $id);
		$where_2 = array('kd_mk' => $id);
	
		//$where = 'kd_jurusan';
		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		$data['detil'] = $this->JurusanModel->detilData('jurusan', $where)->row_array();

		$data['matkul'] = $this->KurikulumModel->getMatkul($id)->result();
		$data['krs_get'] = $this->KurikulumModel->getKRSByMatakuliahNilai($id);
		// $this->load->view('admin/template/header', $data);
		// $this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin-st/nilai/view_list_matkul-st', $data);
		// $this->load->view('admin/template/footer');
	}
// Nilai KHS
	public function input($id)
{
    // Dapatkan nilai $kd_jurusan berdasarkan $kd_mk
    $kd_jurusan = $this->NilaiModel->getKodeJurusanByKodeMK($id);
    
    $data['title'] = 'Nilai KHS Mahasiswa SBH ';
    $data['judul'] = 'Akademik';
    $data['subJudul'] = 'Input Nilai KHS';
    $ta = $this->TaModel->getAktif()->row_array();
    
    // Tentukan kondisi untuk mendapatkan data matakuliah berdasarkan kd_mk
    $where = array('kd_mk' => $id);
    
    // Dapatkan data matakuliah berdasarkan kd_mk
    $data['matkul'] = $this->NilaiModel->getMatkul('matakuliah', $where)->row_array();
    
    // Dapatkan data mahasiswa untuk input nilai berdasarkan kd_mk dan id_ta
    $data['mahasiswa'] = $this->NilaiModel->inputNilai($id, $ta['id_ta']);
    
    // Pass $kd_jurusan ke view untuk digunakan dalam link "backward"
    $data['kd_jurusan'] = $kd_jurusan;
    
    $this->load->view('admin-st/nilai/view_input-st', $data);
}


	public function input_nilai_aksi($kd_mk) 
	{
		$query = array();
		$id_krs = $_POST['id_krs'];
		$nilai = $_POST['nilai'];
		$nilai_akhir = $_POST['nilai_akhir'];
		$nilai_uts = $_POST['nilai_uts'];
		$nilai_uas = $_POST['nilai_uas'];
		$status_n = array('status_n' => 1);

		for ($i = 0; $i < sizeof($id_krs); $i++) {
			$data = array(
				'nilai' => $nilai[$i],
				'nilai_akhir' => $nilai_akhir[$i],
				'nilai_uts' => $nilai_uts[$i],
				'nilai_uas' => $nilai_uas[$i],
				'status_n' => 1
			);
			$this->db->where('id_krs', $id_krs[$i])->update('krs', $data);
		}

		// Set pesan flash data
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>
				<i class="ace-icon fa fa-check green"></i>
				Data
				<strong class="green">Nilai Akhir</strong> Berhasil diinput!
			</div>'
		);

		redirect('admin/Nilai/input/' . $kd_mk);

	}
	
		public function inputAkhir($id)
	{
		$data['title'] = 'Nilai Akhir Mahasiswa SBH ';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = '';
		$ta = $this->TaModel->getAktif()->row_array();
		//$dosen = $this->NilaiModel->getDosen()->row_array();

		$where = array('kd_mk' => $id);
		//$kd_jurusan = array('kd_jurusan' => $id);
		//$where = 'kd_jurusan';
		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		$data['matkul'] = $this->NilaiModel->getMatkul('matakuliah', $where)->row_array();
		//$data['jurusan'] = $this->db->get('jurusan')->result();
		$data['mahasiswa'] = $this->NilaiModel->inputNilai($id, $ta['id_ta']);
		//$data['status'] = $this->db->get('krs')->row_array();
		//var_dump($data1);die();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/nilai/view_input_nilai_akhir', $data);
		$this->load->view('admin/template/footer');
	}
	public function input_nilai_aksi_akhir($kd_mk)
	{
		$query = array();
		$id_krs = $_POST['id_krs'];
		$nilai_akhir = $_POST['nilai_akhir'];
	
		$status_n = array('status_n' => 1);

		// print_r($id_krs);
		//print_r($bobot); die();

	    for ($i = 0; $i < sizeof($id_krs); $i++) {
			$this->db->set('nilai_akhir', $nilai_akhir[$i])->where('id_krs', $id_krs[$i])->update('krs', $status_n);
		
		}
		

		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data
				<strong class="green">
					Nilai
				</strong>Berhasi di input!
			</div>'
		);
		redirect('admin/Nilai/inputAkhir/' . $kd_mk);
	}
	
// 	Nilai UTS
public function inputUts($id)
	{
		$data['title'] = 'Nilai UTS Mahasiswa SBH ';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Input Nilai UTS';
		$ta = $this->TaModel->getAktif()->row_array();
		//$dosen = $this->NilaiModel->getDosen()->row_array();

		$where = array('kd_mk' => $id);
		//$kd_jurusan = array('kd_jurusan' => $id);
		//$where = 'kd_jurusan';
		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		$data['matkul'] = $this->NilaiModel->getMatkul('matakuliah', $where)->row_array();
		//$data['jurusan'] = $this->db->get('jurusan')->result();
		$data['mahasiswa'] = $this->NilaiModel->inputNilai($id, $ta['id_ta']);
		//$data['status'] = $this->db->get('krs')->row_array();
		//var_dump($data1);die();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/nilai/view_input_uts', $data);
		$this->load->view('admin/template/footer');
	}

	public function input_nilai_aksi_uts($kd_mk)
	{
		$query = array();
		$id_krs = $_POST['id_krs'];
		$nilai = $_POST['nilai'];
		$nilai_uts = $_POST['nilai_uts'];
		$nilai_uas = $_POST['nilai_uas'];
		$status_n = array('status_n' => 1);

		// print_r($id_krs);
		//print_r($bobot); die();

	for ($i = 0; $i < sizeof($id_krs); $i++) {
			$this->db->set('nilai_uts', $nilai_uts[$i])->where('id_krs', $id_krs[$i])->update('krs', $status_n);
		
		}
		
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data
				<strong class="green">
					Nilai
				</strong>Berhasi di input!
			</div>'
		);
		redirect('admin/Nilai/inputUts/' . $kd_mk);
	}
// Nilai UAS
public function inputUas($id)
	{
		$data['title'] = 'Nilai KHS Mahasiswa SBH ';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Input Nilai KHS';
		$ta = $this->TaModel->getAktif()->row_array();
		//$dosen = $this->NilaiModel->getDosen()->row_array();

		$where = array('kd_mk' => $id);
		//$kd_jurusan = array('kd_jurusan' => $id);
		//$where = 'kd_jurusan';
		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		$data['matkul'] = $this->NilaiModel->getMatkul('matakuliah', $where)->row_array();
		//$data['jurusan'] = $this->db->get('jurusan')->result();
		$data['mahasiswa'] = $this->NilaiModel->inputNilai($id, $ta['id_ta']);
		//$data['status'] = $this->db->get('krs')->row_array();
		//var_dump($data1);die();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/nilai/view_input_uas', $data);
		$this->load->view('admin/template/footer');
	}

	public function input_nilai_aksi_uas($kd_mk)
	{
		$query = array();
		$id_krs = $_POST['id_krs'];
		$nilai = $_POST['nilai'];
		$nilai_uts = $_POST['nilai_uts'];
		$nilai_uas = $_POST['nilai_uas'];
		$status_n = array('status_n' => 1);

		// print_r($id_krs);
		//print_r($bobot); die();

	for ($i = 0; $i < sizeof($id_krs); $i++) {
			$this->db->set('nilai_uas', $nilai_uas[$i])->where('id_krs', $id_krs[$i])->update('krs', $status_n);
		
		}
		

		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data
				<strong class="green">
					Nilai
				</strong>Berhasi di input!
			</div>'
		);
		redirect('admin/Nilai/inputUas/' . $kd_mk);
	}
	


	public function buka_n($id_krs)
	{
		//Buka Nilai
		$where = array('id_krs' => $id_krs);
		$data = array('status_n' => 0);

		$this->db->update('krs', $data, $where);
		redirect($_SERVER['HTTP_REFERER']);
	}



	//input berdasarkan mahasiswa

	public function getMhs($id)
	{
		$data['title'] = 'Nilai Mahasiswa SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Input Nilai';


		$where = array('kd_jurusan' => $id);
		//$where = 'kd_jurusan';
		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		$data['detil'] = $this->JurusanModel->detilData('jurusan', $where)->row_array();
		//berdasarkan mahasiswa
		$data['mhs'] = $this->NilaiModel->getMhs($id);
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/nilai/header', $data);
		$this->load->view('admin/nilai/view_list_mhs', $data);
		$this->load->view('admin/template/footer');
	}

	public function inputMhs($id)
	{
		$data['title'] = 'Nilai Mahasiswa SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Input Nilai';

		$where = array('id_mahasiswa' => $id);
		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		$data['mhs'] = $this->db->get_where('mahasiswa', $where)->row_array();
		//matakuliah yang di ambil oleh mahasiswa from table KRS
		//$data['mahasiswa']
		//$data['mahasiswa'] = $this->NilaiModel->inputNilai($id);
		$data['jadwal'] = $this->KurikulumModel->getAll($id)->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/nilai/view_input1', $data);
		$this->load->view('admin/template/footer');
	}


	public function transkrip()
	{
		$data['title'] = 'Data Transkrip Mahasiswa SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Transkrip Nilai Mahasiswa';
		$data['mahasiswa'] = $this->MahasiswaModel->getData()->result();
		// $this->load->view('admin/template/header', $data);
		// $this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin-st/nilai/transkrip-st', $data);
		// $this->load->view('admin/template/footer');
	}

	public function detil_transkrip($id_mhs)
	{
		//Session login mahasiswa berdasarkan id login (ambil data KRS)
		//$mhs = $this->KrsModel->getDataMhs();
		//$where = array('id_mahasiswa' => $id_mhs);
		$ta = $this->TaModel->getTa()->row_array();
		//$ta = $this->TaModel->getTa()->row_array();
		$data['title'] = 'Data Transkrip Mahasiswa SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Transkrip Nilai Mahasiswa';

		//tampil seluruh data KRS yang diambil mahasiswa 
		$data['mhs'] = $this->MahasiswaModel->mhsId($id_mhs)->row_array();
		$data['viewKrs'] = $this->KrsModel->viewAll($id_mhs, $ta['id_ta']);
		//var_dump($data['viewKrs']);die();

		// $this->load->view('admin/template/header', $data);
		// $this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin-st/nilai/transkrip_detil-st', $data);
		// $this->load->view('admin/template/footer');
	}

// 	public function print($id_mhs)
// 	{
// 		//$where = array('id_mahasiswa' => $id_mhs);
// 		$ta = $this->TaModel->getTa()->row_array();
// 		//$data['jrs'] = $this->db->get('jurusan')->row_array();

// 		//$data['mhs'] = $this->db->get_where('mahasiswa', $where)->row_array();
// 		$data['mhs'] = $this->MahasiswaModel->mhsId($id_mhs)->row_array();
// 		$data['viewKrs'] = $this->KrsModel->viewAll($id_mhs, $ta['id_ta']);

// 		$this->load->view('admin/print/print', $data);
// 	}


	public function pdf()
	{
		// $where = array('id_mahasiswa' => $id_mhs);
		// $ta = $this->TaModel->getTa()->row_array();
		//$ta = $this->TaModel->getTa()->row_array();
		// $data['title'] = 'Data Transkrip Mahasiswa SBH';
		// $data['judul'] = 'Akademik';
		// $data['subJudul'] = 'Transkrip Nilai Mahasiswa';	

		//tampil seluruh data KRS yang diambil mahasiswa 
		// $data['mhs'] = $this->db->get_where('mahasiswa', $where)->row_array();
		// $data['viewKrs'] = $this->KrsModel->viewAll($id_mhs, $ta['id_ta']);
		//var_dump($data['viewKrs']);die();

		//$this->load->view('admin/template/header', $data);
		//$this->load->view('admin/nilai/laporan_pdf', $data);




	}
}
