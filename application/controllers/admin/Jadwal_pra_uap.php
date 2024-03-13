<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_pra_uap extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Jadwal PRA UAP SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Jadwal Uas';

		$data['tahun'] = $this->TaModel->getAktif()->result();
		
		// $this->load->view('admin/template/header', $data);
		// $this->load->view('admin/template/sidebar', $data);
		$data['jadwal'] = $this->JadwaluapModel->getDataPraUap()->result();
		
		$this->load->view('admin-st/jadwal_pra_uap/jadwal_pra_uap-st', $data);
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
			$this->form_validation->set_rules('nama_pra_uap', 'Nama ', 'required');
			// $this->form_validation->set_rules('jurusan', 'Program Studi', 'required');
			
			// Tambahkan aturan validasi lainnya sesuai kebutuhan

			// Jalankan validasi
			if ($this->form_validation->run() == FALSE) {
				// Validasi gagal, kirim respon error
				echo json_encode(['status' => 'error', 'message' => validation_errors()]);
				return;
			}
			$ta = $this->TaModel->getAktif()->row();
			$id_ta = $ta->id_ta;

	
			// Data yang akan disimpan dalam database
			$data = [
				'id_ta'         	=> $id_ta,
				'nama_pra_uap'      => $this->input->post('nama_pra_uap'),
				'kd_jurusan'    	=> '15401', // Menggunakan kode jurusan dari mata kuliah
				'jam_pra_uap'       => $this->input->post('jam_pra_uap'),
				'tanggal_pra_uap'   => $this->input->post('tanggal_pra_uap'),
				// 'tgl_insert'		=> date('y-m-d'),
			];

			// Simpan data ke database
			$this->MahasiswaModel->insertData('jadwal_pra_uap', $data);

			// Kirim respon sukses
			echo json_encode(['status' => 'success', 'message' => 'Data Jadwal UTS berhasil disimpan']);
		} else {
			// Jika metode bukan POST, kirim respon error
			echo json_encode(['status' => 'error', 'message' => 'Invalid Request Method']);
		}
	}
	
	public function delete() {
			// Pastikan ini adalah permintaan AJAX
			if (!$this->input->is_ajax_request()) {
				exit('No direct script access allowed');
			}

			// Tangkap ID jadwal yang akan dihapus dari permintaan POST
			$id_jadwal = $this->input->post('id');

			// Hapus data dengan menggunakan model
			$delete = $this->JadwaluapModel->delete_data_prauap($id_jadwal);

			if ($delete) {
				// Berhasil dihapus
				$response['status'] = 'success';
				$response['message'] = 'Data Jadwal berhasil dihapus.';
			} else {
				// Gagal menghapus
				$response['status'] = 'error';
				$response['message'] = 'Gagal menghapus data. Silakan coba lagi.';
			}

			// Kembalikan respons dalam format JSON
			echo json_encode($response);
		}

  
}
