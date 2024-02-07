<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Evaluasi extends CI_Controller
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
		$data['title'] = 'Evaluasi Dosen SBH';
		$data['judul'] = 'Evaluasi';
		$data['subJudul'] = 'EDOM-SBH';
		$data['list_kus'] = $this->EdomModel->getData('evaluasi')->result();
		$data['tahun'] = $this->TaModel->getAktif()->result();
		// $this->load->view('admin/template/header', $data);
		// $this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin-st/evaluasi/tambah-eval-st', $data);
		// $this->load->view('admin/template/footer');
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
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
      
        // Jalankan validasi
        if ($this->form_validation->run() == FALSE) {
            // Validasi gagal, kirim respon error
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
            return;
        }

        // Formulir valid, lakukan penyimpanan data
        $data = [
          	'pertanyaan'	=> $this->input->post('pertanyaan'),
			'tgl_insert'	=> date('y-m-d')
        ];

        // Simpan data ke database
        $this->MahasiswaModel->insertData('evaluasi', $data);

        // Kirim respon sukses
        echo json_encode(['status' => 'success', 'message' => 'Data Mahasiswa berhasil disimpan']);
    } else {
        // Jika metode bukan POST, kirim respon error
        echo json_encode(['status' => 'error', 'message' => 'Invalid Request Method']);
    }
}
	
    public function delete()
{
    $id = $this->input->post('id_eval');
 
    $result = $this->MahasiswaModel->deleteData('evaluasi', array('id_eval' => $id));
    if ($result) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'error'));
    }
}

}