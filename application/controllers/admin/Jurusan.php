<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Data Jurusan SBH';
		$data['judul'] = 'Master';
		$data['subJudul'] = 'Jurusan';
		$data['jurusan'] = $this->JurusanModel->getData('jurusan')->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/jurusan/jurusan', $data);
		$this->load->view('admin/template/footer');
	}

	public function tambahJurusan()
	{

		$photo	= $_FILES['ttd']['name'];
		if ($photo) {
			$config['upload_path']		= './assets/images/uploads/ttd';
			$config['allowed_types']	= 'jpeg|jpg|png|gif|tiff';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('ttd')) {

				$photo = $this->upload->data('file_name');
				$this->db->set('ttd', $photo);
			} else {
				echo "Gagal upload";
			}
		}

		$data = array(
			'kd_jurusan'	=> htmlspecialchars($this->input->post('kd_jurusan')),
			'jurusan'		=> htmlspecialchars($this->input->post('jurusan')),
			'singkat'		=> htmlspecialchars($this->input->post('singkat')),
			'jenjang'		=> htmlspecialchars($this->input->post('jenjang')),
			'ttd'       	=> $photo,
			'tgl_insert'	=> date('y-m-d')
		);

		//var_dump($data);
		$this->JurusanModel->insertData('jurusan', $data);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data
				<strong class="green">
					Jurusan
				</strong>Berhasi di input!
			</div>'
		);
		redirect('admin/Jurusan');
	}


	public function updateJurusan($id)
	{
		$data['title'] = 'Update Data Jurusan SBH';
		$data['judul'] = 'Master';
		$data['subJudul'] = 'Update jurusan';

		$where = array('kd_jurusan' => $id);
		$data['jurusan'] = $this->JurusanModel->getWhere('jurusan', $where)->result();

		$this->load->view('admin/template/header');
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/jurusan/update-jurusan', $data);
		$this->load->view('admin/template/footer');
	}

	public function updateAksi()
	{
		$ttd	= $_FILES['ttd']['name'];
		if ($ttd) {
			$config['upload_path']		= './assets/images/uploads';
			$config['allowed_types']	= 'jpeg|jpg|png|gif|tiff';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('ttd')) {

				$ttd = $this->upload->data('file_name');
				$this->db->set('ttd', $ttd);
			} else {
				echo "Gagal upload";
			}
		}
		$id = $this->input->post('kd_jurusan');
		$data = array(
			'kd_jurusan'		=> htmlspecialchars($this->input->post('kd_jurusan')),
			'jurusan'		=> htmlspecialchars($this->input->post('jurusan')),
			'singkat'		=> htmlspecialchars($this->input->post('singkat')),
			'jenjang'		=> htmlspecialchars($this->input->post('jenjang')),
			'ttd'       	=> $ttd,
			'tgl_insert'	=> date('y-m-d')

		);

		$where = array('kd_jurusan' => $id);
		//var_dump($data);
		$this->db->update('jurusan', $data, $where);

		//timpah data 
		$item = $this->db->get_where('jurusan', $where)->row();
		if ($item->$ttd != null) {
			$target_file = './assets/images/uploads/ttd' . $item->$ttd;
			unlink($target_file);
		}

		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data Jurusan Berhasi di 
				<strong class="green">
					Update!
				</strong>
			</div>'
		);
		redirect('admin/Jurusan');
	}

	public function deleteJurusan($id)
	{
		$where = array('kd_jurusan' => $id);
		$this->db->delete('jurusan', $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check red"></i>

				Data jurusan Berhasi di 
				<strong class="red">
					Hapus!
				</strong>
			</div>'
		);
		redirect('admin/Jurusan');
	}
}
