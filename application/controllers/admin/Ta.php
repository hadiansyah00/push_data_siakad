<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Tahun Akademik';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Tahun Akademik';
		$data['ta'] = $this->TaModel->getData('ta')->result();
		$this->load->view('admin/template/header',$data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/ta/ta', $data);
		$this->load->view('admin/template/footer');
	}

	public function insert()
	{
		$data = array(
			'ta'		 	=> htmlspecialchars($this->input->post('ta')),
			'semester'		=> htmlspecialchars($this->input->post('semester')),
			'tgl_insert'	=> date('y-m-d')
		);

		$this->TaModel->insertData('ta', $data);
		$this->session->set_flashdata(
	        'pesan',
	        '<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data
				<strong class="green">
					Tahun Akademik
				</strong>Berhasi di input!
			</div>'
	      );
	      redirect('admin/Ta');
	}

	public function setTa($id)
	{
		//reset status tahun akademik
		$status = array('status' => 0);
		$this->db->update('ta', $status);

		//Set aktif tahun akademik
		$where = array('id_ta' => $id);
		$data = array('status' => 1);

		$this->db->update('ta', $data, $where);
		$this->session->set_flashdata(
	        'pesan',
	        '<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data
				<strong class="green">
					Tahun Akademik Telah Aktif!
				</strong>
			</div>'
	      );
	      redirect('admin/Ta');
	}

	public function delete($id)
	{
		$where = array('id_ta' => $id);

		$this->db->delete('ta', $where);
		$this->session->set_flashdata(
	        'pesan',
	        '<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check red"></i>

				Data Tahun Akademik Berhasi di 
				<strong class="red">
					Hapus!
				</strong>
			</div>'
	      );
	      redirect('admin/Ta');
	}
}