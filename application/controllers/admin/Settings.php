<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Setting Siakad';
		$data['judul'] = 'Settings';
		$data['subJudul'] = '';
		$data['ta'] = $this->TaModel->getData('ta')->result();
		$data['tahun'] = $this->TaModel->getAktifKrs()->row_array();
		$data['status'] = $this->db->get('set_krs')->row_array();
		
		//$data['jurusan'] = $this->JurusanModel->getData('jurusan')->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/settings/settings', $data);
		$this->load->view('admin/template/footer');
	}

//SETTING KRS AKTIF
	public function setKrs($id)
	{
		//Set aktif KRS
		$where = array('id_setkrs' => $id);
		$data = array('status' => 1);

		$this->db->update('set_krs', $data, $where);
		$this->session->set_flashdata(
	        'pesan',
	        '<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data
				<strong class="green">
					KRS berhasil di Aktikkan!
				</strong>
			</div>'
	      );
	      redirect('admin/settings');
	}

//SETTING KRS NON-AKTIF
	public function setKrsN($id)
	{
		//Set aktif KRS
		$where = array('id_setkrs' => $id);
		$data = array('status' => 0);

		$this->db->update('set_krs', $data, $where);
		$this->session->set_flashdata(
	        'pesan',
	        '<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check danger"></i>

				Data
				<strong class="red">
					KRS berhasil di Non-aktifkan!
				</strong>
			</div>'
	      );
	      redirect('admin/settings');
	}



//TAHUN AKADEMIK INSERT
	public function insert()
	{
		$data = array(
			'ta'		 	=> htmlspecialchars($this->input->post('ta')),
			'semester'		=> htmlspecialchars($this->input->post('semester')),
			'tgl_insert'	=> date('y-m-d')
		);

		$this->TaModel->insertData('ta', $data);
		$this->session->set_flashdata(
	        'pesan1',
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
	      redirect('admin/settings');
	}

//SET TAHUN AKADEMIK AKTIF
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
	        'pesan1',
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
	      redirect('admin/settings');
	}

//DELETE TAHUN AKADEMIK
	public function delete($id)
	{
		$where = array('id_ta' => $id);

		$this->db->delete('ta', $where);
		$this->session->set_flashdata(
	        'pesan1',
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
	      redirect('admin/settings');
	}


//UNHIDE BTN DELETE
	public function setUnhide($id)
	{
		//Set unhide btn del
		$where = array('id_setkrs' => $id);
		$data = array('hide_btn_del' => 1);

		$this->db->update('set_krs', $data, $where);
		$this->session->set_flashdata(
	        'pesan',
	        '<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>
				<strong class="green">
					Button Delete, Aktif!
				</strong>
			</div>'
	      );
	      redirect('admin/settings');
	}

	//HIDE BTN DELETE
	public function setHide($id)
	{
		//Set hide btn del
		$where = array('id_setkrs' => $id);
		$data = array('hide_btn_del' => 0);

		$this->db->update('set_krs', $data, $where);
		$this->session->set_flashdata(
	        'pesan',
	        '<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check danger"></i>
				<strong class="green">
					Button Delete, Disembunyikan!
				</strong>
			</div>'
	      );
	      redirect('admin/settings');
	}



}