<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
		
			// Contoh setelah proses login berhasil
			// $user_data = array(
			// 	'nim' => $user_id,
			// 	'username' => $username,
			// 	'logged_in' => TRUE
			// );

		

	}

	public function index()
	{
	
		$cookie_data = array(
			'name'   => 'user_data',
			'value'  => json_encode($user_data), // Gantilah dengan data pengguna yang sesuai
			'expire' => 60 * 60 * 24 * 365, // Cookie berlaku selama 1 tahun (sesuaikan sesuai kebutuhan)
		);

		$this->input->set_cookie($cookie_data);

		$data['title'] = 'Dasboard Mahasiswa SBH ';
		$data['judul'] = 'Dasboard Mahasiswa SBH ';
		//get data from session
		$data['mhs'] = $this->KrsModel->getDataMhs();
		$data['setting'] = $this->db->get('mahasiswa')->row_array();
		$data['setting_krs'] = $this->db->get('set_krs')->row_array();
		//post by admin
		$data['post'] = $this->db->get('post')->row_array();
		$data['slider'] = $this->db->get('img_slider')->result();

		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		$this->load->view('mhs/dashboard_mhs', $data);
	
	}
}
