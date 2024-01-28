
application/x-httpd-php Home.php ( C++ source, ASCII text )
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Survey Mahasiswa SBH ';
		$data['judul'] = 'Survey Mahasiswa SBH ';
		//get data from session
		$data['mhs'] = $this->KrsModel->getDataMhs();
		$data['setting'] = $this->db->get('mahasiswa')->row_array();
		$data['setting_krs'] = $this->db->get('set_krs')->row_array();
		//post by admin
// 		$data['post'] = $this->db->get('post')->row_array();
// 		$data['slider'] = $this->db->get('img_slider')->result();

		$this->load->view('mhs/templates/header', $data);
		$this->load->view('mhs/informasi-mhs');
		$this->load->view('mhs/templates/footer');
	}
}