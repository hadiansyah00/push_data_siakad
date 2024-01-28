<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rps extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Rencana Pembelajaran Semester ';
		$data['judul'] = 'RPS Dosen SBH ';
		//get data from session

		$data['dsn'] = $this->KrsModel->getDataDosen();
		$data['rps'] = $this->RpsModel->getData();

		$this->load->view('dosen/templates/header', $data);
		$this->load->view('dosen/rps/rps-mhs', $data);
		$this->load->view('dosen/templates/footer');
	}


	public function Add()
	{
		$ta = $this->TaModel->getAktif()->result();
		foreach ($ta as $t) :
			$a = $t->id_ta;
		endforeach;

		$config['upload_path']		= './assets/images/uploads';
		$config['allowed_types']       = 'pdf|xls|doc';
		$this->load->library('upload', $config);
		$data = array(
			'id_rps'			=> htmlspecialchars($this->input->post('id_rps')),
			'id_ta'				=> $a,
			'kd_mk'				=> htmlspecialchars($this->input->post('matakuliah')),
			'id_dosen'			=> htmlspecialchars($this->input->post('id_dosen')),
			'kd_jurusan'		=> htmlspecialchars($this->input->post('kd_jurusan')),
			'berkas'			=> $this->upload->data('file_name'),
			'tgl_insert'		=> date('y-m-d')
		);

		//var_dump($data);

		$this->RpsModel->insertData('rps', $data);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data
				<strong class="green">
					RPS
				</strong>Berhasi di input!
			</div>'
		);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function TambahData()
	{
		$ta = $this->TaModel->getAktif()->result();
		foreach ($ta as $t) :
			$a = $t->id_ta;
		endforeach;


		$berkas	= $_FILES['berkas']['name'];
		if ($berkas) {
			$config['upload_path']		= './assets/assets-mhs/img';
			$config['allowed_types']	= 'jpeg|jpg|png|gif|tiff|pdf';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
		}

		$data = array(
			'id_rps'			=> htmlspecialchars($this->input->post('id_rps')),
			'id_ta'				=> $a,
			'kd_mk'				=> htmlspecialchars($this->input->post('matakuliah')),
			'id_dosen'			=> htmlspecialchars($this->input->post('id_dosen')),
			'kd_jurusan'		=> htmlspecialchars($this->input->post('kd_jurusan')),
			'berkas'			=> $berkas,
			'tgl_insert'		=> date('y-m-d')
		);

		$this->RpsModel->insertData('rps', $data);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data
				<strong class="green">
					RPS
				</strong>Berhasi di input!
			</div>'
		);
		redirect($_SERVER['HTTP_REFERER']);
	}
}
