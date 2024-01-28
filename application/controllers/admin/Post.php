<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Post Admin SBH';
		$data['judul'] = 'Post';
		$data['subJudul'] = '';

		//$data = $this->UserModel->getSession($this->session->userdata(['username']));
		// $data = array(
		// 	'username'	=> $data->username,
		// 	'level'		=> $data->level
		// );
		$data['img'] = $this->db->get('img_slider')->result();
		$data['post'] = $this->db->get('post')->row_array();

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/post/post', $data);
		$this->load->view('admin/template/footer');
	}

	public function updateImg($id_img)
	{
		$data['title'] = 'Post Admin SBH';
		$data['judul'] = 'Post';
		$data['subJudul'] = '';
		$where = array('id_img' => $id_img);
		$data['img'] = $this->db->get_where('img_slider', $where)->row_array();

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/post/update', $data);
		$this->load->view('admin/template/footer');
	}

	public function updateAksi()
	{
		$id 	= $this->input->post('id_img');

		$photo	= $_FILES['photo']['name'];
		if ($photo) {
			$config['upload_path']		= './assets/assets-mhs/img';
			$config['allowed_types']	= 'jpeg|jpg|png|gif|tiff|pdf';

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

		$where = array('id_img' => $id);

		//timpah data 
		$item = $this->db->get_where('img_slider', $where)->row();

		if ($item->photo != null) {
			$target_file = './assets/assets-mhs/img/' . $item->photo;
			unlink($target_file);
		}

		//var_dump($data);
		$this->db->update('img_slider', $data, $where);
		redirect('admin/post');
	}

	public function updatePost($id)
	{
		$data['title'] = 'Update Post Info Mahasiswa SBH';
		$data['judul'] = 'Post';
		$data['subJudul'] = 'Update Post';

		$where = array('id_post' => $id);
		$data['post'] = $this->db->get_where('post', $where)->row_array();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/post/updatePost', $data);
		$this->load->view('admin/template/footer');
	}

	public function updatePostAksi()
	{

		$id = $this->input->post('id_post');

		$data = array(
			'judul' => htmlspecialchars($this->input->post('judul')),
			'deskripsi' => htmlspecialchars($this->input->post('deskripsi')),
			'tgl_update' => date('y-m-d')
		);

		$where = array('id_post' => $id);
		//var_dump($data);die();

		$this->db->update('post', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data 
				<strong class="green">
					Info
				</strong>
				Berhasi di Update!
			</div>'
		);
		redirect('admin/Post');
	}
}
