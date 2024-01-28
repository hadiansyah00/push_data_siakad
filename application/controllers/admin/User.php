<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Data Users SBH';
		$data['judul'] = 'Users';
		$data['subJudul'] = 'Registrasi Admin';
		$data['users'] = $this->UserModel->tampilData('users')->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/user/index', $data);
		$this->load->view('admin/template/footer');
	}

	public function tambahUser()
	{
		//$this->_rules();
		//TAMBAH ADMIN
		if ($this->form_validation->run() == FALSE) {
			$data = array(
				'username'   => $this->input->post('username', TRUE),
				'password'   => md5($this->input->post('password', TRUE)),
				'email'      => $this->input->post('email', TRUE),
				'level'      => $this->input->post('level', TRUE),
				'tgl_insert' => date('y-m-d'),
				'photo'		 => 'default.jpg',
				'id_session' => md5($this->input->post('id_session', TRUE)),
			);
		} else {
			return redirect('admin/user');
		}


		$this->UserModel->insertData($data, 'users');
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>
				Data
				<strong class="green">
					Admin
				</strong>Berhasil ditambahkan!
			</div>'
		);
		redirect('admin/user');
	}


	public function detil($id)
	{
		$where = array('id' => $id);
		$data['title'] = 'Data Users SBH';
		$data['judul'] = 'Users';
		$data['subJudul'] = 'Registrasi Admin';
		$data['users'] = $this->db->get_where('users', $where)->row_array();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/user/detil', $data);
		$this->load->view('admin/template/footer');
	}

	public function update($id)
	{
		$where = ['id' => $id];

		$data = [
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'tgl_update' => date('y-m-d')
		];

		$this->db->update('users', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>
				Data
				<strong class="green">
					Admin
				</strong>Berhasil diupdate!
			</div>'
		);
		return redirect($_SERVER['HTTP_REFERER']);
	}

	public function updatePass($id)
	{
		$where = ['id' => $id];

		$data = [
			'password' => md5($this->input->post('password')),
			'tgl_update' => date('y-m-d')
		];

		$this->db->update('users', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>
				<strong class="green">
					Password Berhasil diupdate!
				</strong>
			</div>'
		);
		return redirect($_SERVER['HTTP_REFERER']);
	}


	public function delete($id)
	{
		$where = array('id' => $id);

		$this->db->delete('users', $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check red"></i>

				Data 
				<strong class="red">
					User Admin
				</strong>
				Berhasi di Hapus!
			</div>'
		);
		redirect('admin/User');
	}
}
