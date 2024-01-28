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
	 $id 	= $this->input->post('id');
	
		$where = array('id' => $id);
		//var_dump($data);
		$data['title'] = 'Data BAUK SBH';
		$data['judul'] = 'BAUK';
		$data['subJudul'] = 'Registrasi BAUK';
		$data['users'] = $this->db->get_where('a', $id)->row_array();
		$this->load->view('bauk/template/header', $data);
		$this->load->view('bauk/template/sidebar', $data);
		$this->load->view('bauk/user/index', $data);
		$this->load->view('bauk/template/footer');
	}

// 	public function tambahUser()
// 	{
// 		//$this->_rules();
// 		//TAMBAH ADMIN
// 		if ($this->form_validation->run() == FALSE) {
// 			$data = array(
// 				'username'   => $this->input->post('username', TRUE),
// 				'password'   => md5($this->input->post('password', TRUE)),
// 				'tgl_insert' => date('y-m-d'),
// 				'id_session' => md5($this->input->post('id_session', TRUE)),
// 			);
// 		} else {
// 			return redirect('bauk/user');
// 		}


// 		$this->UserModel->insertData($data, 'a');
// 		$this->session->set_flashdata(
// 			'pesan',
// 			'<div class="alert alert-block alert-success">
// 				<button type="button" class="close" data-dismiss="alert">
// 					<i class="ace-icon fa fa-times"></i>
// 				</button>

// 				<i class="ace-icon fa fa-check green"></i>
// 				Data
// 				<strong class="green">
// 					BAUK
// 				</strong>Berhasil ditambahkan!
// 			</div>'
// 		);
// 		redirect('bauk/user');
// 	}

	public function updatePass()
	{
	    $id 	= $this->input->get('id');
	
		$where = array('id' => $id);
		//var_dump($data);
		$data['title'] = 'Data BAUK SBH';
		$data['judul'] = 'BAUK';
		$data['subJudul'] = 'Registrasi BAUK';
		$data['users'] = $this->db->get_where('a', $id)->row_array();
		$this->load->view('bauk/template/header', $data);
		$this->load->view('bauk/template/sidebar', $data);
		$this->load->view('bauk/user/index', $data);
		$this->load->view('bauk/template/footer');
// 	

	}
       	public function updatePassAksi()
	{
		$id 	= $this->input->post('id');

		$data = array(
		    'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
		);

		$where = array('id' => $id);
		//var_dump($data);
		$this->db->update('a', $data, $where);
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
		redirect('bauk/user');
	}
	public function delete($id)
	{
		$where = array('id' => $id);

		$this->db->delete('a', $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check red"></i>

				Data 
				<strong class="red">
					User BAUK
				</strong>
				Berhasi di Hapus!
			</div>'
		);
		redirect('bauk/User');
		
	}
	public function updatePass2 (){
	    $where = array('id' => $id);
	    
		$data['title'] = 'Update Pass BAUK SBH';
		$data['judul'] = 'Users BAUK';
		$data['subJudul'] = 'Registrasi BAUK';
		$data['users'] = $this->db->get_where('users', $where)->row_array();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/user/updatePass', $data);
		$this->load->view('admin/template/footer');
		
		redirect('admin/user');
	}
}
