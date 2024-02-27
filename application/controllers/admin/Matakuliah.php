<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matakuliah extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Data Matakuliah SBH';
		$data['judul'] = 'Master';
		$data['subJudul'] = 'Matakuliah';
		$data['jurusan'] = $this->JurusanModel->getData('jurusan')->result();
		$data['tahun'] = $this->TaModel->getAktif()->result();


		// $this->load->view('admin/template/header', $data);
		// $this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin-st/matakuliah/tambah-matkul-st', $data);
		// $this->load->view('admin/template/footer');
	}

	public function detil($kd_jurusan)
	{
		$data['title'] = 'Data Kurikulum SBH';
		$data['judul'] = 'Master';
		$data['subJudul'] = 'Detil Kurikulum';

		$where = array('kd_jurusan' => $kd_jurusan);
		$data['detil'] = $this->JurusanModel->detilData('jurusan', $where)->result();
		$data['matkul'] = $this->MatkulModel->getData($kd_jurusan);
		$data['tahun'] = $this->TaModel->getAktif()->result();
		
	
		$mkpilist = array(
			'0' => 'Tidak',
			'1' => 'Ya'
		);
		
		$selekaja = $matkul->mk_pilihan; 
		//$data['matkul'] = $this->db->get_where('matakuliah',$where)->result();
		// $this->load->view('admin/template/header', $data);
		// $this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin-st/matakuliah/matakuliah-st', $data);
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
        $this->form_validation->set_rules('kd_mk', 'Matakuliah', 'required');
        $this->form_validation->set_rules('matakuliah', 'Nama Matakuliah', 'required');
        // Tambahkan aturan validasi lainnya sesuai kebutuhan

        // Jalankan validasi
        if ($this->form_validation->run() == FALSE) {
            // Validasi gagal, kirim respon error
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
            return;
        }
		$smt = $this->input->post('smt');
		if ($smt == 1) {
			$s = "Ganjil";
		} elseif ($smt == 3) {
			$s = "Ganjil";
		} elseif ($smt == 5) {
			$s = "Ganjil";
		} elseif ($smt == 7) {
			$s = "Ganjil";
		} elseif ($smt == 9) {
			$s = "Ganjil";
		} else {
			$s = "Genap";
		}
		$semester = $s;
        // Formulir valid, lakukan penyimpanan data
        $data = [
            'kd_mk' => $this->input->post('kd_mk'),
            'kd_jurusan' => $this->input->post('kd_jurusan'),
            'matakuliah' => $this->input->post('matakuliah'),
            // 'singkat' => $this->input->post('singkat'),
           	'semester'			=> $semester,
			'smt' 				=> $smt,
            'sks' => $this->input->post('sks'),
            'mk_pilihan' => $this->input->post('mk_pilihan'),
            'tgl_insert' => date('y-m-d')
        ];

        // Simpan data ke database
        $this->MahasiswaModel->insertData('matakuliah', $data);

        // Kirim respon sukses dengan AJAX
        echo json_encode(['status' => 'success', 'message' => 'Data Matakuliah berhasil disimpan']);
    } else {
        // Jika metode bukan POST, kirim respon error
        echo json_encode(['status' => 'error', 'message' => 'Invalid Request Method']);
    }
}


public function updateMatkul()
{
    if (!$this->input->is_ajax_request()) {
        show_404();
    }
		$smt = $this->input->post('smt');
		if ($smt == 1) {
			$s = "Ganjil";
		} elseif ($smt == 3) {
			$s = "Ganjil";
		} elseif ($smt == 5) {
			$s = "Ganjil";
		} elseif ($smt == 7) {
			$s = "Ganjil";
		} elseif ($smt == 9) {
			$s = "Ganjil";
		} else {
			$s = "Genap";
		}
		$semester = $s;
    
    $kdMk 		= $this->input->post('kd_mk');
    $matakuliah = $this->input->post('matakuliah');
    $smts 		= $semester;
    $sks    	= $this->input->post('sks');
	$mk_pilihan    = $this->input->post('mk_pilihan');
    
    $data = array(
		'kd_mk' 			=> $kdMk,
        // 'kd_jurusan' 	=> $kdJurusan,
        'matakuliah' 		=> $matakuliah,
        'smt'				=> $smts,
		'sks'				=> $sks,
        'mk_pilihan' 		=> $mk_pilihan,
    );
    // Validate CSRF token
    if ($this->input->post($this->security->get_csrf_token_name()) !== $this->security->get_csrf_hash()) {
        echo json_encode(['status' => 'error', 'message' => 'CSRF Token Mismatch']);
        return;
    }

    // Update the data in the database
    $result = $this->MahasiswaModel->updateData('matakuliah', $data, ['kd_mk' => $kdMk]);

    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Data Mahasiswa updated successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update data Mahasiswa']);
    }
}

public function update()
{
    if (!$this->input->is_ajax_request()) {
        show_404();
    }
		$smt = $this->input->post('smt');
		if ($smt == 1) {
			$s = "Ganjil";
		} elseif ($smt == 3) {
			$s = "Ganjil";
		} elseif ($smt == 5) {
			$s = "Ganjil";
		} elseif ($smt == 7) {
			$s = "Ganjil";
		} elseif ($smt == 9) {
			$s = "Ganjil";
		} else {
			$s = "Genap";
		}
		$semester = $s;

    $kdMk 		= $this->input->post('kd_mk');
    $matakuliah = $this->input->post('matakuliah');
    $smts 		= $semester;
    $sks    	= $this->input->post('sks');
	$mk_pilihan    = $this->input->post('mk_pilihan');
    
    $data = array(
		'kd_mk' 			=> $kdMk,
        // 'kd_jurusan' 	=> $kdJurusan,
        'matakuliah' 		=> $matakuliah,
        // 'smt'				=> $smts,
		'sks'			=> $sks,
        'mk_pilihan' 	=> $mk_pilihan,
    );

    // Validate CSRF token
    if ($this->input->post($this->security->get_csrf_token_name()) !== $this->security->get_csrf_hash()) {
        echo json_encode(['status' => 'error', 'message' => 'CSRF Token Mismatch']);
        return;
    }

    // Update the data in the database
    $result = $this->MahasiswaModel->updateData('matakuliah', $data, ['kd_mk' => $kdMk]);

    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Data Kurikulum updated successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Gagal to update data Kurikulum']);
    }
}


	public function delete()
{
    $kdMk = $this->input->post('kd_mk');
 
    $result = $this->MahasiswaModel->deleteData('matakuliah', array('kd_mk' => $kdMk));
    if ($result) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'error'));
    }
}

	
}