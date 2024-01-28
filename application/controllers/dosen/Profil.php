<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Profil Dosen STIKES BOGOR';
		$data['judul'] = 'Profil Dosen';
		//setting krs
		// $data['setting'] = $this->db->get('set_krs')->row_array();
		//get data dari session
		$data['dsn'] = $this->KrsModel->getDataDosen();
		$this->load->view('dosen/templates/header', $data);
		$this->load->view('dosen/profil-dosen', $data);
		$this->load->view('dosen/templates/footer');
	}

	public function updateAksi()
	{
		$id 	= $this->input->post('id_dosen');

		$data = array(
			'nidn'				=> htmlspecialchars($this->input->post('nidn')),
			'nama_dosen'		=> htmlspecialchars($this->input->post('nama_dosen')),
			'kd_dosen'			=> htmlspecialchars($this->input->post('kd_dosen')),
			'jenis_kelamin'		=> htmlspecialchars($this->input->post('jenis_kelamin')),
			'tempat_lahir'		=> htmlspecialchars($this->input->post('tempat_lahir')),
			'tgl_lahir'			=> htmlspecialchars($this->input->post('tgl_lahir')),
			'alamat'			=> htmlspecialchars($this->input->post('alamat')),
			'hp'				=> htmlspecialchars($this->input->post('hp')),
			'status'			=> htmlspecialchars($this->input->post('status')),
			'kd_jurusan'		=> htmlspecialchars($this->input->post('jurusan')),
			'email'				=> htmlspecialchars($this->input->post('email')),
			// 'poto'				=> htmlspecialchars($this->input->post('poto')),
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
					Mahasiswa
				</strong>
				Berhasil di Update!
			</div>'
		);
		redirect('dosen/profil');
	}

	public function updatePhotoDosen()
	{
		$id 	= $this->input->post('id_dosen');

		$photoo	= $_FILES['photoo']['name'];
		if ($photoo) {
			$config['upload_path']		= './assets/images/uploads';
			$config['allowed_types']	= 'jpeg|jpg|png|gif|tiff';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('photoo')) {

				$photoo = $this->upload->data('file_name');
				$this->db->set('photoo', $photoo);
			} else {
				echo "Gagal upload";
			}
		}
		$data = array(
			'photoo' => $photoo,
			'tgl_update' => date('y-m-d')
		);

		$where = array('id_dosen' => $id);

		//timpah data 
		$item = $this->db->get_where('dosen', $where)->row();

		if ($item->$photoo != null) {
			$target_file = './assets/images/uploads/' . $item->$photoo;
			unlink($target_file);
		}

		//var_dump($data);
		$this->db->update('dosen', $data, $where);
		redirect('dosen/profil');
	}

	// public function updateAksiSemester()
	// {
	// 	$id 	= $this->input->post('id_mahasiswa');

	// 	$data = array(
	// 		'semester'			=> htmlspecialchars($this->input->post('semester')),
	// 		'tgl_update'		=> date('y-m-d')
	// 	);

	// 	$where = array('id_mahasiswa' => $id);
	// 	//var_dump($data);
	// 	$this->db->update('mahasiswa', $data, $where);
	// 	$this->session->set_flashdata(
	// 		'pesan',
	// 		'<div class="alert alert-block alert-success">
	// 			<button type="button" class="close" data-dismiss="alert">
	// 				<i class="ace-icon fa fa-times"></i>
	// 			</button>

	// 			<i class="ace-icon fa fa-check green"></i>

	// 			Data 
	// 			<strong class="green">
	// 				Semester
	// 			</strong>
	// 			Berhasi di Update!
	// 		</div>'
	// 	);
	// 	redirect('mhs/profil');
	// }

	public function updatePassDosen()
	{

		$this->form_validation->set_rules('password_ds', 'Password', 'required|trim|min_length[5]|matches[up_password]', [
			'matches' => 'Password tidak sama!',
			'min_length' => 'Password terlalu pendek!'
		]);
		$this->form_validation->set_rules('up_password', 'Password', 'required|trim|matches[password_ds]');

		$id 	= $this->input->post('id_dosen');

		$data = array(
			'password_ds' => md5($this->input->post('password_ds')),
			'tgl_update' => date('y-m-d')
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
 
				<strong class="green">
					Password
				</strong>
				Berhasi di Update!
			</div>'
		);
		redirect('dosen/profil');
	}
	public function updatePassDs()
	{
		$id 	= $this->input->post('id_dosen');

		$data = array(
			'password_ds' => md5($this->input->post('password_ds')),
			'tgl_update' => date('y-m-d')
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
 
				<strong class="green">
					Password
				</strong>
				Berhasi di Update!
			</div>'
		);
		redirect('dosen/profil');
	}
}
