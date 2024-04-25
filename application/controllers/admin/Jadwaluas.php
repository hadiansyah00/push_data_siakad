<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwaluas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Jadwal Uas SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Jadwal Uas';
		
		$data['tahun'] = $this->TaModel->getAktif()->result();
		$data['jurusan'] = $this->JurusanModel->getData('jurusan')->result();
		
		$this->load->view('admin-st/jadwal_uas/index_jadwal_uas', $data);
		
		}

   public function index_jadwal($id)
	{
		$data['title'] = 'Jadwal UAS SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Jadwal UTS';

		$where = array('kd_jurusan' => $id);
		//$where = 'kd_jurusan';
		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		$data['detil'] = $this->JurusanModel->detilData('jurusan', $where)->result();
		$data['matkul'] = $this->JadwaluasModel->getMatkul($id)->result();
		$data['jadwal'] = $this->JadwaluasModel->getAll($id)->result();
		// $this->load->view('admin/template/header', $data);
		// $this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin-st/jadwal_uas/jadwal_uas-st', $data);
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
        $this->form_validation->set_rules('kelas', 'Kelas Mahasiswa', 'required');
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

		// Mendapatkan kode mata kuliah yang dipilih
		$kd_mk = $this->input->post('matkul');

		// Mendapatkan data mata kuliah berdasarkan kode mata kuliah
		$matakuliah = $this->MatkulModel->getByKode($kd_mk);

		// Menggunakan data mata kuliah untuk mendapatkan kode jurusan
		$kd_jurusan = $matakuliah->kd_jurusan;

		// Data yang akan disimpan dalam database
		$data = [
			'id_ta'         => $id_ta,
			'kelas'         => $this->input->post('kelas'),
			'kd_jurusan'    => $kd_jurusan, // Menggunakan kode jurusan dari mata kuliah
			'kd_mk'         => $kd_mk,
			'jam_uas'       => $this->input->post('jam_uas'),
			'ruang_uas'     => $this->input->post('ruang_uas'),
			'tgl_uas'       => $this->input->post('tgl_uas'),
			'tgl_insert'    => date('y-m-d'),
		];
        // Simpan data ke database
        $this->MahasiswaModel->insertData('jadwal_uas', $data);

        // Kirim respon sukses
        echo json_encode(['status' => 'success', 'message' => 'Data Jadwal UTS berhasil disimpan']);
    } else {
        // Jika metode bukan POST, kirim respon error
        echo json_encode(['status' => 'error', 'message' => 'Invalid Request Method']);
    }
}

	public function update()
	{
		if (!$this->input->is_ajax_request()) {
			show_404();
		}

		$idJadwal = $this->input->post('id_jadwal');
		$kelas = $this->input->post('kelas');
		$matkul = $this->input->post('matkul');
		$jam = $this->input->post('jam_uas');
		$ruang = $this->input->post('ruang_uas');
		$tgl   = $this->input->post('tgl_uas');
		$jurs  = $this->input->post('jurusan');
	
		// Check if the password is empty, set a default password
	
		// Update data mahasiswa
		$data = array(
			'id_jadwal' 			=> $idJadwal,
			'kelas' 				=> $kelas,
			'matkul'				=> $matkul,
			'jam_uas' 				=> $jam,
			'ruang_uas'   			=> $ruang,
			'tgl_uas'  				=> $tgl,
			'kd_jurusan'  			=> $jurs,
			
		);

		// Validate CSRF token
		if ($this->input->post($this->security->get_csrf_token_name()) !== $this->security->get_csrf_hash()) {
			echo json_encode(['status' => 'error', 'message' => 'CSRF Token Mismatch']);
			return;
		}

		// Update the data in the database
		$result = $this->MahasiswaModel->updateData('jadwal_uas', $data, ['id_jadwal' => $idMahasiswa]);

		if ($result) {
			echo json_encode(['status' => 'success', 'message' => 'Data Jadwal UAS updated successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Failed to update data Mahasiswa']);
		}
	}
	public function delete() {
        // Pastikan ini adalah permintaan AJAX
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        // Tangkap ID jadwal yang akan dihapus dari permintaan POST
        $id_jadwal = $this->input->post('id_jadwal');

        // Hapus data dengan menggunakan model
        $delete = $this->JadwaluasModel->delete_data($id_jadwal);

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
// 	public function update($id)
// 	{
// 		$data['title'] = 'Update Data Jawdal UAS SBH';
// 		$data['judul'] = 'Akademik';
// 		$data['subJudul'] = 'Update Jadwal UAS';
		
// 		$where = array('id_jadwal' => $id);
	
// // 		$where = array('id_jadwal' => $id);
// 		$data['jadwal'] = $this->db->get_where('jadwal_uas', $where)->result();

// 		$this->load->view('admin/template/header', $data);
// 		$this->load->view('admin/template/sidebar', $data);
// 		$this->load->view('admin/jadwal_uas/update_uas', $data);
// 		$this->load->view('admin/template/footer');
// 	}

// 	public  function updateAksi()
// 	{
	    
// 		$id = $this->input->post('id_jadwal');
// 		$data = array(
// // 	        'kd_jurusan'		=> $kd_jurusan,
// // 			'kd_mk'				=> htmlspecialchars($this->input->post('matkul')),
// // 			'hari_uas'			=> htmlspecialchars($this->input->post('hari_uas')),
//             'kelas'				=> htmlspecialchars($this->input->post('kelas')),
// 			'jam_uas'			=> htmlspecialchars($this->input->post('jam_uas')),
// 			'ruang_uas'			=> htmlspecialchars($this->input->post('ruang_uas')),
// 			'tgl_uas'			=> htmlspecialchars($this->input->post('tgl_uas')),
// 			'tgl_update'        =>  date('y-m-d')
// 		);

// 		$where = array('id_jadwal' => $id);
// 		//var_dump($data);
// 		$this->db->update('jadwal_uas', $data, $where);
// 		$this->session->set_flashdata(
// 			'pesan',
// 			'<div class="alert alert-block alert-success">
// 				<button type="button" class="close" data-dismiss="alert">
// 					<i class="ace-icon fa fa-times"></i>
// 				</button>

// 				<i class="ace-icon fa fa-check green"></i>

// 				Jadwal Berhasil 
// 				<strong class="green">
// 					di Update!
// 				</strong>
// 			</div>'
// 		);
// 	redirect('admin/Jadwaluas');
// 	}

	// public function delete($id)
	// {
	// 	$where = array('id_jadwal' => $id);

	// 	$this->db->delete('jadwal_uas', $where);
	// 	$this->session->set_flashdata(
	// 		'pesan',
	// 		'<div class="alert alert-block alert-danger">
	// 			<button type="button" class="close" data-dismiss="alert">
	// 				<i class="ace-icon fa fa-times"></i>
	// 			</button>

	// 			<i class="ace-icon fa fa-check red"></i>

	// 			Data Jadwal Berhasi di 
	// 			<strong class="red">
	// 				Hapus!
	// 			</strong>
	// 		</div>'
	// 	);
	// 	redirect($_SERVER['HTTP_REFERER']);
	// }
}