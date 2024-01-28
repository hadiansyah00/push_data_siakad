<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Evaluasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
		$this->load->model('EdomModel');
		$this->load->model('KurikulumModel');
	}

	public function index()
	{
		$data['title'] = 'Evaluasi Dosen SBH';
		$data['judul'] = 'Evaluasi';
		$data['subJudul'] = 'EDOM-SBH';
		$data['list_kus'] = $this->EdomModel->getData('evaluasi')->result();
		$data['tahun'] = $this->TaModel->getAktif()->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/evaluasi/tambah-eval', $data);
		$this->load->view('admin/template/footer');
	}
	
    public function insert()
	{

		$data = array(
			'pertanyaan'	=> htmlspecialchars($this->input->post('pertanyaan')),

		);

		//var_dump($data);
		$this->EdomModel->insertData('evaluasi', $data);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data
				<strong class="green">
					Jadwal
				</strong>Berhasi di input!
			</div>'
		);
		redirect('admin/Evaluasi');
	}
	
	
    public function delete($id)
	{
		$where = array('id_eval' => $id);

		$this->db->delete('evaluasi', $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check red"></i>

				Data Jadwal Berhasi di 
				<strong class="red">
					Hapus!
				</strong>
			</div>'
		);
		redirect($_SERVER['HTTP_REFERER']);
	}

}

