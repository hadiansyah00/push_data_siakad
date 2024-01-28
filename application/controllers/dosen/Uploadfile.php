<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Uploadfile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
		// $this->load->helper(array('url', 'download'));
	}
	function Create()
	{
		$data['title'] = 'Rencana Pembelajaran Semester ';
		$data['judul'] = 'RPS Dosen SBH ';
		$data['dsn'] = $this->KrsModel->getDataDosen();
		$data['rps'] = $this->RpsModel->getData();
		$this->load->view('dosen/templates/header', $data);
		$this->load->view('dosen/rps/tambah-rps', $data);
		// $this->load->view('dosen/templates/footer');
	}

	function proses()
	{
		$ta = $this->TaModel->getAktif()->result();
		foreach ($ta as $t) :
			$a = $t->id_ta;
		endforeach;
		$config['upload_path']          = './assets/assets-mhs/img';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 5000;
		$config['encrypt_name']			= TRUE;
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('berkas')) {
			$error = array('error' => $this->upload->display_errors());
			// $this->load->view('dosen/rps/tambah-rps', $error);
			$this->session->set_flashdata(
				'pesan',
				'<div class="alert alert-block alert-success">
					<button type="button" class="close" data-dismiss="alert">
						<i class="ace-icon fa fa-times"></i>
					</button>
	
					<i class="ace-icon fa fa-check red"></i>
	
					Data WAJIB 
					<strong class="red">
						PDF!
					</strong>
				</div>'
			);
		} else {
			$data['nama_berkas'] = $this->upload->data("file_name");
			$data['id_dosen'] = $this->input->post('id_dosen');
			$data['keterangan_berkas'] = $this->input->post('keterangan_berkas');
			$data['smt'] = $this->input->post('smt');
			$data['id_ta']			   = $a;
			$data['kd_jurusan'] = $this->input->post('kd_jurusan');
			$data['tgl_insert'] = date('y-m-d');
			$data['tipe_berkas'] = $this->upload->data('file_ext');
			$data['ukuran_berkas'] = $this->upload->data('file_size');
			$this->db->insert('tb_berkas', $data);
		
		}	redirect('dosen/rps');
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
		// $this->load->view('dosen/templates/footer');
	}
	function download($id)
	{

		// $file = $this->db->get_where('tb_berkas', ['kd_berkas' => $id])->row();
		// $data = file_get_contents('assets/assets-mhs/img/' . $file->nama_berkas);
		// force_download($file, $data);
		$data = $this->db->get_where('tb_berkas', ['kd_berkas' => $id])->row();
		force_download('assets/assets-mhs/img/' . $data->nama_berkas, NULL);

		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check red"></i>

				Data Berhasil 
				<strong class="red">
					Download!
				</strong>
			</div>'
		);
		// redirect('dosen/rps');
	}
	public function deleteRps($id)
	{

		$where = array('kd_berkas' => $id);
		$this->db->delete('tb_berkas', $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check red"></i>

				Data berhasil di hapus
				<strong class="red">
					Hapus!
				</strong>
			</div>'
		);
		redirect('dosen/rps');
	}
}
