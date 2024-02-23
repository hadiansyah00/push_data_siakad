<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aktivitas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
		$this->load->model('EdomModel');
		$this->load->model('KurikulumModel');
	}

	public function index()
	{
	$data['title'] = 'List Update Perbaikan Website';
	$data['judul'] = 'Update Website';
	$data['subJudul'] = 'Update-SBH';
	$data['list'] = $this->EdomModel->getData_Aktivitas('aktivitas')->result();
	// $data['tahun'] = $this->TaModel->getAktif()->result();
	// $this->load->view('admin/template/header', $data);
	// $this->load->view('admin/template/sidebar', $data);
	$this->load->view('admin-st/aktivitas/aktivitas-st', $data);
	// $this->load->view('admin/template/footer');
	
	}
	public function DataPerbaikan ()
	{
	
	$data['title'] = 'List Update Perbaikan Website';
	$data['judul'] = 'Update Website';
	$data['subJudul'] = 'Update-SBH';
	$data['list'] = $this->EdomModel->getData_Aktivitas('aktivitas')->result();
	// $data['tahun'] = $this->TaModel->getAktif()->result();
	// $this->load->view('admin/template/header', $data);
	// $this->load->view('admin/template/sidebar', $data);
	$this->load->view('mhs/acktivitas-mhs-st', $data);

	}
	
   public function insert()
{
    // Periksa apakah metode yang digunakan adalah POST
    if ($this->input->server('REQUEST_METHOD') === 'POST') {
        // Periksa apakah CSRF token valid
        if ($this->input->post($this->security->get_csrf_token_name()) !== $this->security->get_csrf_hash()) {
            // CSRF token tidak valid, handle sesuai kebutuhan
            echo json_encode(['status' => 'error', 'message' => 'CSRF Token Mismatch']);
            return;
        }

        // Set aturan validasi sesuai kebutuhan
        $this->form_validation->set_rules('list_perbaikan', 'Perbaikan', 'required');
		 $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
      
        // Jalankan validasi
        if ($this->form_validation->run() == FALSE) {
            // Validasi gagal, kirim respon error
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
            return;
        }
		// Set zona waktu menjadi GMT+7 (Waktu Indonesia Barat)
		date_default_timezone_set('Asia/Jakarta');

		// Hitung offset waktu dari UTC (GMT)
		$offset_in_seconds = 7 * 60 * 60; // 7 jam * 60 menit * 60 detik

		// Tambahkan offset waktu ke tanggal dan waktu saat ini
		$current_time_gmt7 = gmdate('Y-m-d H:i:s', time() + $offset_in_seconds);

        // Formulir valid, lakukan penyimpanan data
        $data = [
          	'list_perbaikan'	=> $this->input->post('list_perbaikan'),
			'tgl'	=> date('y-m-d'),
			'tgl_insert'	=> $current_time_gmt7
        ];

        // Simpan data ke database
        $this->MahasiswaModel->insertData('aktivitas', $data);

        // Kirim respon sukses
        echo json_encode(['status' => 'success', 'message' => 'Data Mahasiswa berhasil disimpan']);
    } else {
        // Jika metode bukan POST, kirim respon error
        echo json_encode(['status' => 'error', 'message' => 'Invalid Request Method']);
    }
}
	
    public function delete()
{
    $id = $this->input->post('id_aktivitas');
 
    $result = $this->MahasiswaModel->deleteData('aktivitas', array('id_aktivitas' => $id));
    if ($result) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'error'));
    }
}

}
