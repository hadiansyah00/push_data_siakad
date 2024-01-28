<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Data Mahasiswa SBH';
		$data['judul'] = 'Master';
		$data['subJudul'] = 'Mahasiswa';
		$data['mahasiswa'] = $this->MahasiswaModel->getData()->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/mahasiswa/mahasiswa', $data);
		$this->load->view('admin/template/footer');
	}

	public function insert()
	{
		$data = array(
			'nim'				=> htmlspecialchars($this->input->post('nim')),
			'nama_mhs'			=> htmlspecialchars($this->input->post('nama_mhs')),
// 			'nama_kepanjangan'	=> htmlspecialchars($this->input->post('nama_kepanjangan')),
			'kelas'		=> htmlspecialchars($this->input->post('kelas')),
			'tahun_masuk'		=> htmlspecialchars($this->input->post('tahun_masuk')),
			'kd_jurusan'		=> htmlspecialchars($this->input->post('jurusan')),
			'id_dosen	'		=> htmlspecialchars($this->input->post('nama_dosen')),
			'password'			=> md5($this->input->post('password', TRUE)),
			'tgl_insert'		=> date('y-m-d')
		);

		$this->MahasiswaModel->insertData('mahasiswa', $data);

		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data
				<strong class="green">
					Mahasiswa
				</strong>Berhasi di input!
			</div>'
		);
		redirect('admin/Mahasiswa');
	}

	//lihat detil mahasiswa..//belum data detil tidak tampil!
	public function view_mhs($id_mhs)
	{

		$data['title'] = 'Detail View Mahasiswa SBH';
		$data['judul'] = 'Master';
		$data['subJudul'] = 'Detail Mahasiswa';

		//$where = array('id_mahasiswa' => $id_mahasiswa);
		//var_dump($where);die();

		$data['mhs'] = $this->MahasiswaModel->mhsId($id_mhs)->row_array();
		//$data['mahasiswa'] = $this->MahasiswaModel->getMhsId($where)->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/mahasiswa/view_mhs', $data);
		$this->load->view('admin/template/footer');
	}

	//update data mahasiswa
	public function update($id)
	{
		$data['title'] = 'Update Data Mahasiswa SBH';
		$data['judul'] = 'Master';
		$data['subJudul'] = 'Update Data Mahasiswa';

		$where = array('id_mahasiswa' => $id);
		$data['mahasiswa'] = $this->db->get_where('mahasiswa', $where)->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/mahasiswa/update', $data);
		$this->load->view('admin/template/footer');
	}

	public function updateAksi()
	{
		$id 	= $this->input->post('id_mahasiswa');
		// $photo	= $_FILES['photo']['name'];
		// 	if($photo){
		// 		$config ['upload_path']		= './assets/images/uploads';
		// 		$config ['allowed_types']	= 'jpeg|jpg|png|gif|tiff';

		// 		$this->load->library('upload', $config);

		// 		if($this->upload->do_upload('photo')){
		// 			$photo = $this->upload->data('file_name');
		// 			$this->db->set('photo', $photo);
		// 		}else{
		// 			echo "Gagal upload";
		// 		}
		// 	}

		$data = array(
			'nama_mhs'			=> htmlspecialchars($this->input->post('nama_mhs')),
// 			'nama_kepanjangan'	=> htmlspecialchars($this->input->post('nama_kepanjangan')),
			'jk'				=> htmlspecialchars($this->input->post('jk')),
			'tempat_lahir'		=> htmlspecialchars($this->input->post('tempat_lahir')),
			'tgl_lahir'			=> htmlspecialchars($this->input->post('tgl_lahir')),
			'alamat'			=> htmlspecialchars($this->input->post('alamat')),
			'kota'				=> htmlspecialchars($this->input->post('kota')),
			'hp'				=> htmlspecialchars($this->input->post('hp')),
			'email'				=> htmlspecialchars($this->input->post('email')),
			'nama_ayah'			=> htmlspecialchars($this->input->post('nama_ayah')),
			'nama_ibu'			=> htmlspecialchars($this->input->post('nama_ibu')),
			'alamat_ortu'		=> htmlspecialchars($this->input->post('alamat_ortu')),
			'hp_ortu'			=> htmlspecialchars($this->input->post('hp_ortu')),
			'semester'			=> htmlspecialchars($this->input->post('semester')),
			'status_mhs'			=> htmlspecialchars($this->input->post('status_mhs')),
				'status'			=> htmlspecialchars($this->input->post('status')),
			'agama'			=> htmlspecialchars($this->input->post('agama')),
			'pendapatan_ortu'			=> htmlspecialchars($this->input->post('pendapatan_ortu')),
			'asal_sekolah'		=> htmlspecialchars($this->input->post('asal_sekolah')),
			'nisn'			=> htmlspecialchars($this->input->post('nisn')),
			'tahun_masuk'			=> htmlspecialchars($this->input->post('tahun_masuk')),
			//'photo'				=> $photo,
			'tgl_update'		=> date('y-m-d')
		);

		$where = array('id_mahasiswa' => $id);
		//var_dump($data);
		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data 
				<strong class="green">
					Mahasiswa
				</strong>
				Berhasi di Update!
			</div>'
		);
		redirect('admin/Mahasiswa');
	}

	public function updatePass($id)
	{
		$data['title'] = 'Detail View Mahasiswa SBH';
		$data['judul'] = 'Master';
		$data['subJudul'] = 'Update Mahasiswa';

		$where = array('id_mahasiswa' => $id);
		$data['mhs'] = $this->db->get_where('mahasiswa', $where)->row_array();

		//$data['mahasiswa'] = $this->MahasiswaModel->getMhsId($where)->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/mahasiswa/updatePass', $data);
		$this->load->view('admin/template/footer');
	}

	public function updatePassAksi()
	{
		$id 	= $this->input->post('id_mahasiswa');

		$data = array(
 		      'nama_mhs'			=> htmlspecialchars($this->input->post('nama_mhs')),
 		    'tahun_masuk'			=> htmlspecialchars($this->input->post('tahun_masuk')),
    		'status_mhs'		    => htmlspecialchars($this->input->post('status_mhs')),
// 			'id_dosen'			    => htmlspecialchars($this->input->post('nama_dosen')),
// 			'kd_jurusan'			=> htmlspecialchars($this->input->post('jurusan')),
			'password' => md5($this->input->post('password')),
			'tgl_update' => date('y-m-d')
		);

		$where = array('id_mahasiswa' => $id);
		//var_dump($data);
		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>
 
				<strong class="green">
					Mahasiswa
				</strong>
				Berhasi di Update!
			</div>'
		);
		redirect('admin/mahasiswa');
	}
	//update Dospem
	
	public function updateDospem($id)
	{
		$data['title'] = 'Edit Mahasiswa SBH';
		$data['judul'] = 'Mahasiswa SBH';
		$data['subJudul'] = 'Update Dosen Pembimbing Mahasiswa';

		$where = array('id_mahasiswa' => $id);
		$data['mhs'] = $this->db->get_where('mahasiswa', $where)->row_array();

		//$data['mahasiswa'] = $this->MahasiswaModel->getMhsId($where)->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/mahasiswa/update_dospem', $data);
		$this->load->view('admin/template/footer');
	}

	public function updateDospemAksi()
	{
		$id 	= $this->input->post('id_mahasiswa');

		$data = array(
 		  
			'id_dosen'			    => htmlspecialchars($this->input->post('nama_dosen')),
			'tgl_update' => date('y-m-d')
		);

		$where = array('id_mahasiswa' => $id);
		//var_dump($data);
		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>
 
				<strong class="green">
					Mahasiswa
				</strong>
				Berhasi di Update!
			</div>'
		);
		redirect('admin/mahasiswa');
	}
	
		
	public function upStatus($id)
	{
		$data['title'] = 'Edit Status Mahasiswa';
		$data['judul'] = 'Mahasiswa SBH';
		$data['subJudul'] = 'Update Status Mahasiswa';

		$where = array('id_mahasiswa' => $id);
		$data['mhs'] = $this->db->get_where('mahasiswa', $where)->row_array();

		//$data['mahasiswa'] = $this->MahasiswaModel->getMhsId($where)->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/mahasiswa/update_status', $data);
		$this->load->view('admin/template/footer');
	}

	public function upStatusAksi()
	{
		$id 	= $this->input->post('id_mahasiswa');

		$data = array(
 		  
			'id_dosen'			    => htmlspecialchars($this->input->post('nama_dosen')),
			'tgl_update' => date('y-m-d')
		);

		$where = array('id_mahasiswa' => $id);
		//var_dump($data);
		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>
 
				<strong class="green">
					Mahasiswa
				</strong>
				Berhasi di Update!
			</div>'
		);
		redirect('admin/mahasiswa');
	}


	//Delete data
	public function delete($id)
	{
		$data = array('id_mahasiswa' => $id);
		$this->db->delete('mahasiswa', $data);

		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check red"></i>

				Data Mahasiswa Berhasi di 
				<strong class="red">
					Hapus!
				</strong>
			</div>'
		);
		redirect('admin/Mahasiswa');
	}
}
