<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Krs extends CI_Controller
{

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
		$ta = $this->TaModel->getAktif()->row_array();

		$data['title'] = 'KRS Mahasiswa SBH';
		$data['judul'] = 'Kartu Rencana Studi (KRS)';
		//setting krs
		$data['setting'] = $this->db->get('set_krs')->row_array();

		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		//get data from session
		$data['mhs'] = $this->KrsModel->getDataMhs();
		//form get KRS for mhs
		$data['getKrs'] = $this->KrsModel->getMatkul_KRS($mhs['kd_jurusan']);
		//form get KRS filter berdasarkan tahun akademik aktif
		//$data['getKrs'] = $this->KrsModel->getMatkul_KRS($ta['id_ta'], $mhs['kd_jurusan']);
		$data['semester'] = $this->db->get('matakuliah')->row_array();
		//tampil data KRS berdasarkan sessi login mhs
		$data['viewKrs'] = $this->KrsModel->viewKrs($mhs['id_mahasiswa'], $ta['id_ta']);

		$this->load->view('mhs/templates/header', $data);
		$this->load->view('mhs/krs-mhs', $data);
		$this->load->view('mhs/templates/footer');
	}

	public function add($id_kurikulum)
	{
		//get data tahun akademik
		$ta = $this->TaModel->getAktif()->row_array();
		//get data mahasiswa berdasarkan session login
		$mhs = $this->KrsModel->getDataMhs();


		$data = array(
			'id_kurikulum' 	=> $id_kurikulum,
			'id_ta'			=> $ta['id_ta'],
			'id_mahasiswa'	=> $mhs['id_mahasiswa'],
			'tgl_insert'	=> date('y-m-d'),
			'status_verfikasi' => "Belum Verfikasi"
		);

		$this->KrsModel->addKrs($data);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
					<button type="button" class="close" data-dismiss="alert">
						<i class="icofont-times"></i>
					</button>

					<i class="icofont-check green"></i>

					Data  
					<strong class="green">
						KRS
					</strong> berhasil ditambahkan!
				</div>'
		);
		redirect('mhs/krs');
	}

	public function print()
	{
		//$mhs = $this->KrsModel->getDataMhs();
		//$ta = $this->TaModel->getAktif()->row_array();

		$data['title'] = 'KRS Mahasiswa SBH ';
		$data['judul'] = 'Print Kartu Rencana Studi (KRS)';

		//$data['tahun'] = $this->TaModel->getAktif()->row_array();
		//setting krs
		$data['setting'] = $this->db->get('set_krs')->row_array();
		//get data from session
		$data['mhs'] = $this->KrsModel->getDataMhs();
		//get KRS for mhs
		//$data['getKrs'] = $this->KrsModel->getMatkul_KRS($ta['id_ta'], $mhs['kd_jurusan']);
		//$data['semester'] = $this->db->get('matakuliah')->row_array();
		//tampil data KRS berdasarkan sessi login mhs
		//$data['viewKrs'] = $this->KrsModel->viewKrs($mhs['id_mahasiswa'], $ta['id_ta']);

		$this->load->view('mhs/templates/header', $data);
		$this->load->view('mhs/print', $data);
		$this->load->view('mhs/templates/footer');
	}

	public function delete($id)
	{
		$where = array('id_krs' => $id);

		$this->db->delete('krs', $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="icofont-times"></i>
				</button>

				<i class="icofont-check red"></i>

				Data  
				<strong class="red">
					KRS
				</strong> berhasil 
				<strong class="red">
					dihapus!
				</strong>
				
			</div>'
		);
		redirect('mhs/krs');
	}
}
