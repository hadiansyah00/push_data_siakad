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
	
		
		$this->load->helper('date'); // Memuat helper date
		$elapsed_time = time_elapsed_string($login_time);
		$data['title'] = 'Dasboard Mahasiswa SBH ';
		$data['judul'] = 'Dasboard Mahasiswa SBH ';
		//get data from session
		 $user_id = $this->session->userdata('username');
		 $data['login_history'] = $this->UserModel->get_login_history($user_id);
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
