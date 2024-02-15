<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
    
	}

	public function index()
	{
		$data['title'] = 'Jadwal  SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Jadwal';
			$data['dsn'] = $this->KrsModel->getDataDosen();
		$data['pdf'] = $this->RpsModel->getData();
		$data['tahun'] = $this->TaModel->getAktif()->result();
		$data['jurusan'] = $this->JurusanModel->getData('jurusan')->result();
		// $this->load->view('admin/template/header', $data);
		// $this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin-st/jadwal/jadwal-st', $data);
		// $this->load->view('admin/template/footer');
	}
	public function do_upload()
		{
			$config['upload_path'] = './assets/images/uploads'; // Sesuaikan dengan direktori penyimpanan Anda
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = 2048; // Ukuran maksimum dalam kilobyte
			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);

			if ($this->upload->do_upload('pdf_file')) {
				// Berhasil diunggah
				$data = $this->upload->data();
				$file_name = $data['file_name'];

				// Simpan informasi berkas ke dalam database
				$this->simpan_ke_database($file_name);

				// Berhasil upload, kirim pesan ke client
				$response = array(
					'success' => true,
					'message' => 'Data berhasil diunggah!'
				);
				echo json_encode($response);
			} else {
				// Gagal unggah, tangani kesalahan
				$error = array(
					'success' => false,
					'message' => $this->upload->display_errors()
				);
				echo json_encode($error);
			}
		}

		
		private function simpan_ke_database($file_name)
		{
			$ta = $this->TaModel->getAktif()->result();
			foreach ($ta as $t) :
			$a = $t->id_ta;
			endforeach;
			// Data yang akan disimpan dalam database (sesuaikan dengan struktur Anda)
			$data = array(
				'id_ta' => $a,
				'kd_jurusan'=> $this->input->post('kd_jurusan'),
				'nama_berkas' => $file_name,
				'keterangan_berkas' => $this->input->post('keterangan_berkas'),
				'smt' => $this->input->post('smt')
			);

			// Panggil metode simpan_data dari model Anda untuk menyimpan data ke database
			$this->JadwalModel->simpan_data($data); // Ganti dengan nama model Anda
		}
	public function delete()
	{
		$id_jadwal = $this->input->post('id_jadwal_pdf');
	
		$result = $this->MahasiswaModel->deleteData('jadwal_pdf', array('id_jadwal_pdf' => $id_jadwal));
		if ($result) {
			echo json_encode(array('status' => 'success'));
		} else {
			echo json_encode(array('status' => 'error'));
		}
	}
		
   
}
