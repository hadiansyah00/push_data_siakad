<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurusan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Data Jurusan SBH';
		$data['judul'] = 'Master';
		$data['subJudul'] = 'Jurusan';
		$data['jurusan'] = $this->JurusanModel->getData('jurusan')->result();

				
		$jenjangList = array(
			'D3' => 'Diploma	',
			'S1' => 'Sarjana'
		);
		
		$selectedJenjang = $jurusan->jenjang; // Adjust this based on your actual data structure

		// Pass the data to your view
		$data['jenjangList'] = $jenjangList;
		$data['selectedJenjang'] = $selectedJenjang;

		// $this->load->view('admin/template/header', $data);
		// $this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin-st/jurusan/jurusan-st', $data);
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
        $this->form_validation->set_rules('nim', 'NIM', 'required|numeric');
        $this->form_validation->set_rules('nama_mhs', 'Nama Lengkap', 'required');
        // Tambahkan aturan validasi lainnya sesuai kebutuhan

        // Jalankan validasi
        if ($this->form_validation->run() == FALSE) {
            // Validasi gagal, kirim respon error
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
            return;
        }

        // Formulir valid, lakukan penyimpanan data
        $data = [
          	'kd_jurusan'	=> $this->input->post('kd_jurusan'),
			'jurusan'		=> $this->input->post('jurusan'),
			// 'singkat'		=> $this->input->post('singkat'),
			'jenjang'		=> $this->input->post('jenjang'),
			'id_dosen'    => $this->input->post('nama_dosen'),
			'tgl_insert'	=> date('y-m-d')
        ];

        // Simpan data ke database
        $this->MahasiswaModel->insertData('jurusan', $data);

        // Kirim respon sukses
        echo json_encode(['status' => 'success', 'message' => 'Data Mahasiswa berhasil disimpan']);
    } else {
        // Jika metode bukan POST, kirim respon error
        echo json_encode(['status' => 'error', 'message' => 'Invalid Request Method']);
    }
}


public function updateJurusan()
{
    if (!$this->input->is_ajax_request()) {
        show_404();
    }

    $kdJurusan = $this->input->post('kd_jurusan');
    $jurusan = $this->input->post('jurusan');
    $jenjang = $this->input->post('jenjang');
    $id_dosen    = $this->input->post('nama_dosen');
    // Check if the password is empty, set a default password
   
    // Update data mahasiswa
    $data = array(
        'kd_jurusan' 	=> $kdJurusan,
        'jurusan' 		=> $jurusan,
        'jenjang'		=> $jenjang,
        'id_dosen' 		=> $id_dosen,
    );

    // Validate CSRF token
    if ($this->input->post($this->security->get_csrf_token_name()) !== $this->security->get_csrf_hash()) {
        echo json_encode(['status' => 'error', 'message' => 'CSRF Token Mismatch']);
        return;
    }

    // Update the data in the database
    $result = $this->MahasiswaModel->updateData('jurusan', $data, ['kd_jurusan' => $kdJurusan]);

    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Data Program Studi updated successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update data Program Studi']);
    }
}


	public function deletJurusan()
{
    $kdJurusan = $this->input->post('kd_jurusan');
 
    $result = $this->MahasiswaModel->deleteData('jurusan', array('kd_jurusan' => $kdJurusan));
    if ($result) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'error'));
    }
}
}