<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kurikulum extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
		$this->load->model('KurikulumModel');

	}

	public function index()
	{
		
		
		$data['title'] = 'Modul Matakuliah SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Matakuliah ';
		$data['tahun'] = $this->TaModel->getAktif()->result();
		$data['jurusan'] = $this->JurusanModel->getData('jurusan')->result();
		// $this->load->view('admin/template/header', $data);
		// $this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin-st/kurikulum/kurikulum-st', $data);
		// $this->load->view('admin/template/footer');
	}
	
	public function index_kurikulum($id)
	{
		
		$data['title'] = 'Modul Matakuliah SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Matakuliah';
		$where = array('kd_jurusan' => $id);
		
		//$where = 'kd_jurusan';
		
		$data['tahun'] 				= $this->TaModel->getAktif()->row_array();

		$data['detil'] 				= $this->JurusanModel->detilData('jurusan', $where)->result();
		$data['matkul'] 			= $this->KurikulumModel->getMatkul($id)->result();
		$data['kurikulum'] 			= $this->KurikulumModel->getAll($id)->result();

		$data['perdos']				= $this->DosenModel->getDataPerdos('peran_dosen')->result();
		$data['dosen_1']			= $this->DosenModel->getPerdos1('peran_dosen')->result();
		$data['dosen_2']			= $this->DosenModel->getPerdos2('perdos')->result();
	
		// $this->load->view('admin/template/header', $data);
		// $this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin-st/kurikulum/master_kurikulum-st', $data);
		// $this->load->view('admin/template/footer');
	}

	
// 	public function insert()
// {
//     // Periksa apakah metode yang digunakan adalah POST
//     if ($this->input->server('REQUEST_METHOD') === 'POST') {
//         // Periksa apakah CSRF token valid
//         $csrf_token_name = $this->security->get_csrf_token_name();
//         $csrf_token_value = $this->input->post($csrf_token_name);
//         if (!$this->security->csrf_verify($csrf_token_value)) {
//             // CSRF token tidak valid, handle sesuai kebutuhan
//             echo json_encode(['status' => 'error', 'message' => 'CSRF Token Mismatch']);
//             return;
//         }

//         // Ambil nilai kd_mk dari form
//         $kd_mk = htmlspecialchars($this->input->post('matkul'));

//         // Lakukan kueri untuk mendapatkan nilai kd_jurusan berdasarkan kd_mk
//         $kd_jurusan = $this->KurikulumModel->getKdJurusanByKdMk($kd_mk);

//         if ($kd_jurusan) {
//             // Jika kd_jurusan berhasil ditemukan, lanjutkan operasi penyimpanan data
//             $ta = $this->TaModel->getAktif()->result();
//             foreach ($ta as $t) {
//                 $a = $t->id_ta;
//             }

//             // Buat array data untuk disimpan ke dalam database
//             $data = [
//                 'kd_jurusan' => $kd_jurusan,
//                 'id_ta' => $a,
//                 'kd_mk' => $kd_mk,
//                 'id_perdos' => htmlspecialchars($this->input->post('perdos')),
//                 'id_peran' => htmlspecialchars($this->input->post('peran')),
//                 'tgl_insert' => date('y-m-d')
//             ];

//             // Simpan data ke dalam database
//             $this->KurikulumModel->insertData('kurikulum', $data);

//             // Kirim respon sukses dengan AJAX
//             echo json_encode(['status' => 'success', 'message' => 'Data Matakuliah berhasil disimpan']);
//         } else {
//             // Jika kd_jurusan tidak ditemukan, kirim respon error
//             echo json_encode(['status' => 'error', 'message' => 'Kode Jurusan tidak ditemukan']);
//         }
//     } else {
//         // Jika metode bukan POST, kirim respon error
//         echo json_encode(['status' => 'error', 'message' => 'Invalid Request Method']);
//     }
// }


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

            // Lakukan validasi form di sini jika diperlukan

        	$kd_jurusan = $this->uri->segment(4);
			echo $kd_jurusan; // Cek nilai kd_jurusan

 		 	$ta = $this->TaModel->getAktif()->result();			
			foreach ($ta as $t) :
			$a = $t->id_ta;
			endforeach;
            
			$data = [	
                'kd_jurusan'    => htmlspecialchars($this->input->post('kd_jurusan')),
				'id_ta' 		=>$a,
                'kd_mk'         => htmlspecialchars($this->input->post('matkul')),
                'id_perdos'     => htmlspecialchars($this->input->post('perdos')),
                'id_peran'      => htmlspecialchars($this->input->post('peran')),
                'tgl_insert'    => date('Y-m-d')
            ];

            // Simpan data ke dalam database
            $this->KurikulumModel->insertData('kurikulum', $data);

            // Kirim respon sukses dengan AJAX
            echo json_encode(['status' => 'success', 'message' => 'Data Matakuliah berhasil disimpan']);
        } else {
            // Jika metode bukan POST, kirim respon error
            echo json_encode(['status' => 'error', 'message' => 'Invalid Request Method']);
        }
    }


	public function delete()
{
    $id = $this->input->post('id_kurikulum');
 
    $result = $this->MahasiswaModel->deleteData('kurikulum', array('id_kurikulum' => $id));
    if ($result) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'error'));
    }
}

}