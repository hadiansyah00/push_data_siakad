<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PeranDosen extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$this->ModelSecurity->getSecurity();

		$data['title'] = 'Data Peran Dosen SBH';
		$data['judul'] = 'Master-Peran-Dosen';
		$data['subJudul'] = 'Peran Dosen';
		$data['perdos'] = $this->DosenModel->getDataPerdos('peran_dosen')->result();
		$data['perdos_2'] = $this->DosenModel->getDataPerdos_2('perdos')->result();
		$data['ds'] = $this->DosenModel->getData()->result(); 

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/peran_dosen/perdos', $data);
		$this->load->view('admin/template/footer');
	}


public function insertPeran()
	{

		$data = array(

			'id_dosen'		=> htmlspecialchars($this->input->post('id_dosen')),
			// 'peran'			=> htmlspecialchars($this->input->post('peran')),
	

		);

		//var_dump($data);
		$this->DosenModel->insertData('peran_dosen', $data);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data
				<strong class="green">
					Dosen Pengajar 1
				</strong>Berhasi di input!
			</div>'
		);
		redirect('admin/PeranDosen');
	}

	public function insertPerdos_2()
	{

		$data = array(

			'id_dosen'		=> htmlspecialchars($this->input->post('id_dosen')),
			// 'peran'			=> htmlspecialchars($this->input->post('peran')),
	

		);

		//var_dump($data);
		$this->DosenModel->insertData('perdos', $data);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data
				<strong class="green">
					Dosen Pengajar 2
				</strong>Berhasi di input!
			</div>'
		);
		redirect('admin/PeranDosen');
	}

public function delete($id)
	{
		$where = array('id_peran' => $id);

		$this->db->delete('peran_dosen', $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check red"></i>

				Data Dosen Berhasi di 
				<strong class="red">
					Hapus!
				</strong>
			</div>'
		);
		redirect('admin/PeranDosen');
	}


	public function delete_perdos2($id)
	{
		$where = array('id_perdos' => $id);

		$this->db->delete('perdos', $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check red"></i>

				Data Dosen Pengajar 2 Berhasil di 
				<strong class="red">
					Hapus!
				</strong>
			</div>'
		);
		redirect('admin/PeranDosen');
	}

}
