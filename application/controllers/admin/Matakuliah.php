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

		$semester = array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6' => '6',
			'7' => '7',
			'8' => '8',
			'9' => '9'
		);
		
		$selectsmt = $matkul->smt; 
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
	$smts = $this->input->post('smt');
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
    // Ambil nilai dari form
    $kdMk = $this->input->post('kd_mk');
    $matakuliah = $this->input->post('matakuliah');
    $smt = $smts;
    $sks = $this->input->post('sks');
    $mk_pilihan = $this->input->post('mk_pilihan');

    // Validasi form
    $this->form_validation->set_rules('kd_mk', 'Kode Mata Kuliah', 'required');
    $this->form_validation->set_rules('matakuliah', 'Mata Kuliah', 'required');
    $this->form_validation->set_rules('smt', 'Semester', 'required|numeric');
    $this->form_validation->set_rules('sks', 'SKS', 'required|numeric');
    $this->form_validation->set_rules('mk_pilihan', 'Mata Kuliah Pilihan', 'required');

    if ($this->form_validation->run() == FALSE) {
        // Jika validasi gagal, kirim pesan error
        $response['status'] = 'error';
        $response['message'] = validation_errors();
    } else {
	
        // Data form valid, lakukan pembaruan di database
        $data = array(
            'matakuliah' => $matakuliah,
            'smt' 				=> $smt,
			'semester'			=> $semester,
            'sks' => $sks,
            'mk_pilihan' => $mk_pilihan
        );

        // Lakukan pembaruan di database
        $result = $this->MahasiswaModel->updateData('matakuliah', $data, array('kd_mk' => $kdMk));

        if ($result) {
            // Pembaruan berhasil
            $response['status'] = 'success';
            $response['message'] = 'Data Mata Kuliah berhasil diperbarui';
        } else {
            // Pembaruan gagal
            $response['status'] = 'error';
            $response['message'] = 'Gagal memperbarui data Mata Kuliah';
        }
    }

    // Mengembalikan respons dalam bentuk JSON
    echo json_encode($response);
}

    // if (!$this->input->is_ajax_request()) {
    //     show_404();
    // }
	
	// // Set aturan validasi form
	// $this->form_validation->set_rules('kd_mk', 'Kode MK', 'required');
	// $this->form_validation->set_rules('matakuliah', 'Matakuliah', 'required');
	// $this->form_validation->set_rules('sks', 'SKS', 'required|numeric');
	// $this->form_validation->set_rules('mk_pilihan', 'Mata Kuliah Pilihan', 'required');
	
	// // Jalankan validasi form
	// if ($this->form_validation->run() == FALSE) {
	// 	echo json_encode(['status' => 'error', 'message' => validation_errors()]);
	// 	return;
	// }
	
	// // Lakukan pengecekan semester dan set nilai semester sesuai aturan
	// $smt = $this->input->post('smt');
	// if ($smt == 1 || $smt == 3 || $smt == 5 || $smt == 7 || $smt == 9) {
	// 	$semester = "Ganjil";
	// } else {
	// 	$semester = "Genap";
	// }
    
    // $kdMk 		= $this->input->post('kd_mk');
    // $matakuliah = $this->input->post('matakuliah');
    // $smts 		= $semester;
    // $sks    	= $this->input->post('sks');
	// $mk_pilihan = $this->input->post('mk_pilihan');
    
    // $data = array(
	// 	'kd_mk' 			=> $kdMk,
    //     'matakuliah' 		=> $matakuliah,
    //     'smt'				=> $smts,
	// 	'sks'				=> $sks,
    //     'mk_pilihan' 		=> $mk_pilihan,
    // );
    
    // // Update data di database
    // $result = $this->MahasiswaModel->updateData('matakuliah', $data, ['kd_mk' => $kdMk]);

    // // Berikan respons sesuai hasil pembaruan
    // if ($result) {
    //     echo json_encode(['status' => 'success', 'message' => 'Data Mahasiswa berhasil diperbarui']);
    // } else {
    //     echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui data Mahasiswa']);
    // }


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
