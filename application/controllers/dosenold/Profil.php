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
		$data['title'] = 'Profil Dosen STIKES BOGOR HUSADA';
		$data['judul'] = 'Profil Dosen';
		//setting krs
		// $data['setting'] = $this->db->get('set_krs')->row_array();
		//get data dari session
		$data['dns'] = $this->DosenModel->getData();
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
		redirect('dosen/profil');
	}

	public function updatePhoto()
	{
		$id 	= $this->input->post('id_dosen');

		$photo	= $_FILES['photo']['name'];
		if ($photo) {
			$config['upload_path']		= './assets/images/uploads';
			$config['allowed_types']	= 'jpeg|jpg|png|gif|tiff';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('photo')) {

				$photo = $this->upload->data('file_name');
				$this->db->set('photo', $photo);
			} else {
				echo "Gagal upload";
			}
		}
		$data = array(
			'photo' => $photo,
			'tgl_update' => date('y-m-d')
		);

		$where = array('id_dosen' => $id);

		//timpah data 
		$item = $this->db->get_where('dosen', $where)->row();

		if ($item->photo != null) {
			$target_file = './assets/images/uploads/' . $item->photo;
			unlink($target_file);
		}

		//var_dump($data);
		$this->db->update('dosen', $data, $where);
		redirect('mhs/profil');
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

	public function updatePass()
	{

		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[u_password]', [
			'matches' => 'Password tidak sama!',
			'min_length' => 'Password terlalu pendek!'
		]);
		$this->form_validation->set_rules('u_password', 'Password', 'required|trim|matches[password]');

		$id 	= $this->input->post('id_dosen');

		$data = array(
			'password' => md5($this->input->post('password')),
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
