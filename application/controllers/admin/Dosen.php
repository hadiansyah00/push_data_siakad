<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
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

		$data['title'] = 'Data Dosen SBH';
		$data['judul'] = 'Master';
		$data['subJudul'] = 'Dosen';
		$data['dosen'] = $this->DosenModel->getData('dosen')->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/dosen/dosen', $data);
		$this->load->view('admin/template/footer');
	}

	public function insertDosen()
	{

		// $data['jurusan'] = $this->DosenModel->getJurusan()->result();
		$data = array(
			'nidn'				=> htmlspecialchars($this->input->post('nidn')),
			'nama_dosen'		=> htmlspecialchars($this->input->post('nama_dosen')),
			'kd_dosen'			=> htmlspecialchars($this->input->post('kd_dosen')),
			'jenis_kelamin'		=> htmlspecialchars($this->input->post('jenis_kelamin')),
			'tempat'		=> htmlspecialchars($this->input->post('tempat')),
			'tgl'			=> htmlspecialchars($this->input->post('tgl')),
			'alamat_dosen'			=> htmlspecialchars($this->input->post('alamat_dosen')),
			'hp_ds'				=> htmlspecialchars($this->input->post('hp_ds')),
			'status_ds'			=> htmlspecialchars($this->input->post('status_ds')),
			'kd_jurusan'		=> htmlspecialchars($this->input->post('jurusan')),
			'email_ds'				=> htmlspecialchars($this->input->post('email_ds')),
			'password_ds'			=> md5($this->input->post('password_ds', TRUE)),
			'tgl_insert'		=> date('y-m-d')
		);

		//var_dump($data);
		$this->DosenModel->insertData('dosen', $data);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data
				<strong class="green">
					Dosen
				</strong>Berhasi di input!
			</div>'
		);
		redirect('admin/Dosen');
	}

	// public function tambahMatkul()
	// {
	// 	$data['judul'] = 'Akademik';
	// 	$data['subJudul'] = 'Tambah Matakuliah';
	// 	$data['jurusan'] = $this->MatkulModel->getJurusan()->result();
	// 	$this->load->view('admin/template/header');
	// 	$this->load->view('admin/template/sidebar', $data);
	// 	$this->load->view('admin/matakuliah/tambah-matkul', $data);
	// 	$this->load->view('admin/template/footer');
	// }

	// public function simpan()
	// {
	// 	$key['kd_mk']	= $this->input->post('kd_mk');
	// 	$data['kd_mk']	= $this->input->post('kd_mk');
	// 	$data['kd_jurusan']	= $this->input->post('jurusan');
	// 	$data['matakuliah']	= $this->input->post('matakuliah');
	// 	$data['sks']	= $this->input->post('sks');
	// 	$data['smt']	= $this->input->post('smt');
	// 	$data['aktif']	= $this->input->post('aktif');

	// 	$query = $this->db->get_where('matakuliah',$key);
	// 	if($query->num_rows()>0){
	// 		$this->db->update('matakuliah',$key,$data);
	// 		echo "Data berhasil diupdate";
	// 	}else{
	// 		$this->db->insert('matakuliah',$data);
	// 		echo "Data berhasil di masukan";
	// 	}
	// }
	public function view_dosen($id)
	{
		$data['title'] = 'Detil Data Dosen';
		$data['judul'] = 'Master';
		$data['subJudul'] = 'Detil Data Dosen';

		$where = array('id_dosen' => $id);
		// 		$data['jurusan'] = $this->JurusanModel->getData('jurusan')->result();
		$data['dosen'] = $this->db->get_where('dosen', $where)->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/dosen/view_dosen', $data);
		$this->load->view('admin/template/footer');
	}

	public function update($id)
	{
		$data['title'] = 'Update Data Dosen SBH';
		$data['judul'] = 'Master';
		$data['subJudul'] = 'Update Data Dosen';

		$where = array('id_dosen' => $id);
		// 		$data['jurusan'] = $this->JurusanModel->getData('jurusan')->result();
		$data['dosen'] = $this->db->get_where('dosen', $where)->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/dosen/update', $data);
		$this->load->view('admin/template/footer');
	}

	public  function updateAksi()
	{
		$id = $this->input->post('id_dosen');
		// 		$data['jurusan'] = $this->JurusanModel->getData('jurusan')->result();
		$data = array(
			'nidn'				=> htmlspecialchars($this->input->post('nidn')),
			'nama_dosen'		=> htmlspecialchars($this->input->post('nama_dosen')),
			'kd_dosen'			=> htmlspecialchars($this->input->post('kd_dosen')),
			'jenis_kelamin'		=> htmlspecialchars($this->input->post('jenis_kelamin')),
			'tempat'		=> htmlspecialchars($this->input->post('tempat')),
			'tgl'			=> htmlspecialchars($this->input->post('tgl')),
			'alamat_dosen'			=> htmlspecialchars($this->input->post('alamat_dosen')),
			'hp_ds'				=> htmlspecialchars($this->input->post('hp_ds')),
			'status_ds'			=> htmlspecialchars($this->input->post('status_ds')),
			'kd_jurusan'		=> htmlspecialchars($this->input->post('jurusan')),
			'email_ds'				=> htmlspecialchars($this->input->post('email_ds')),
			'password_ds'			=> md5($this->input->post('password_ds', TRUE)),
			'tgl_update'		=> date('y-m-d')
		);

		$where = array('id_dosen' => $id);
		//var_dump($data);
		$this->db->update('dosen', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data 
				<strong class="green">
					Dosen
				</strong>
				Berhasi di Update!
			</div>'
		);
		redirect('admin/Dosen');
	}

	public function delete($id)
	{
		$where = array('id_dosen' => $id);

		$this->db->delete('dosen', $where);
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
		redirect('admin/Dosen');
	}
}
