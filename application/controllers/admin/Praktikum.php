<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Dompdf\Dompdf;
use Dompdf\Options;

class Praktikum extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
		$this->load->model('EdomModel');
		// $this->load->library('Pdf');
	

	}

	public function index()
	{
		$data['title'] = 'Evaluasi Dosen SBH';
		$data['judul'] = 'Pilih Program Studi Akademik';
		$data['subJudul'] = 'EDOM SBH';

		$data['tahun'] = $this->TaModel->getAktif()->result();
		$data['jurusan'] = $this->JurusanModel->getData('jurusan')->result();
		// $this->load->view('admin/template/header', $data);
		// $this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin-st/evaluasi/evaluasi-prak-st', $data);
		// $this->load->view('admin/template/footer');
	}

	public function getEdom($id)
	{
		$data['title'] = 'Evaluasi Dosen SBH';
		$data['judul'] = 'Pilih Program Studi Akademik';
		$data['subJudul'] = 'EDOM SBH';


		$where = array('kd_jurusan' => $id);
		$where_2 = array('kd_mk' => $id);
	
		//$where = 'kd_jurusan';
		// $data['tahun'] = $this->TaModel->getAktif()->row_array();
		$data['detil'] = $this->JurusanModel->detilData('jurusan', $where)->row_array();
		$data['tahun'] = $this->TaModel->getAktif()->result();
		$data['matkul'] = $this->KurikulumModel->getMatkul($id)->result();
		$data['krs_get_prak'] = $this->KurikulumModel->getKRSByMatakuliahPraktik($id);
		
		// $this->load->view('admin/template/header', $data);
		// $this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin-st/evaluasi/view_list_edom-prak-st', $data);
		// $this->load->view('admin/template/footer');
	}
	
	public function listDosen ($id) {

		$data['title'] = 'Evaluasi Dosen SBH';
		$data['judul'] = 'Pilih Program Studi Akademik';
		$data['subJudul'] = 'EDOM SBH';

		$ta = $this->TaModel->getAktif()->row_array();
		//$dosen = $this->NilaiModel->getDosen()->row_array();

		$where = array('kd_mk' => $id);
		//$kd_jurusan = array('kd_jurusan' => $id);
		//$where = 'kd_jurusan';
		$data['detil'] 	= $this->JurusanModel->detilData('jurusan', $where)->result();
		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		$data['matkul'] = $this->NilaiModel->getMatkul('matakuliah', $where)->row_array();
		//$data['jurusan'] = $this->db->get('jurusan')->result();
		$data['dosen'] = $this->KurikulumModel->getListDosen($id, $ta['id_ta']);
		//$data['status'] = $this->db->get('krs')->row_array();
		//var_dump($data1);die();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/evaluasi/list_edom', $data);
		$this->load->view('admin/template/footer');  

	}
		public function lihat($kd_mk, $id_dosen) {
		// Mengambil data hasil kuesioner EDOM dari model
		$data['rata_rata'] = $this->EdomModel->getRataRataByIdKrsDosenPraktik($kd_mk, $id_dosen);
		$data['info_dosen'] = $this->EdomModel->getRataRataByIdKrsDosen($kd_mk, $id_dosen);
		$data['dosen_info'] = $this->EdomModel->getDosenInfo($id_dosen);
		$data['saran'] = $this->EdomModel->getSaranprak($kd_mk,$id_dosen);
		$data['info_edom'] = $this->EdomModel->getInfoMk($kd_mk);
		// Data tambahan
		$data['kd_mk'] = $kd_mk;
		$data['id_dosen'] = $id_dosen;
      	$jumlahMahasiswa = $this->EdomModel->countMahasiswaEvaluasiPraktik($id_dosen);
		$listMahasiswa = $this->EdomModel->countMahasiswaEvaluasi_listPrak($kd_mk);
        $data['tahun'] = $this->TaModel->getAktif()->row_array();
        // Mengirim jumlah mahasiswa ke view
		$data['list_mhs'] = $listMahasiswa;
        $data['jumlah_mahasiswa'] = $jumlahMahasiswa;
		// Tampilkan tampilan hasil kuesioner EDOM
		
		$data['mahasiswa_evaluasi'] = $this->EdomModel->MahasiswaEvaluasiPrak($id_dosen, $kd_mk);
		$data['mahasiswa_krs'] = $this->EdomModel->MahasiswakrsPrak($kd_mk);	


		$this->load->view('admin-st/evaluasi/hasil_kuesioner_edom_prak-st', $data);
	
	}

public function generateCetak($kd_mk, $id_dosen)
{
    // Mendapatkan data yang dibutuhkan
    $tahun = $this->TaModel->getAktif()->row_array();
    $rata_rata = $this->EdomModel->getRataRataByIdKrsDosenPraktik($kd_mk, $id_dosen);
    $info_edom = $this->EdomModel->getInfoMk($kd_mk);
    $dosen_info = $this->EdomModel->getDosenInfo($id_dosen);
    $saran = $this->EdomModel->getSaranprak($kd_mk, $id_dosen);
    $jumlahMahasiswa = $this->EdomModel->countMahasiswaEvaluasiPraktik($id_dosen);
    $listMahasiswa = $this->EdomModel->countMahasiswaEvaluasi_listPrak($kd_mk);

    // Path gambar logo
    $image_path = base_url('assets/images/Logo_Stikes_Sosmed.png');

    // Load HTML content with logo path and additional JavaScript
    $html = $this->load->view('admin-st/evaluasi/pdf_hasil_edom_prak_cetak', compact('tahun', 'rata_rata', 'info_edom', 'dosen_info', 'saran', 'jumlahMahasiswa', 'listMahasiswa', 'image_path'), true);

    // Add JavaScript for auto print
    $html .= "<script type='text/javascript'>
                window.onload = function() {
                    window.print();
                }
              </script>";

    // Display the HTML content in the browser
    echo $html;
}

public function generatePdf($kd_mk, $id_dosen)
{
    // Mendapatkan data yang dibutuhkan
    $tahun = $this->TaModel->getAktif()->row_array();
    $rata_rata = $this->EdomModel->getRataRataByIdKrsDosen($kd_mk, $id_dosen);
    $info_edom = $this->EdomModel->getInfoMk($kd_mk);
    $dosen_info = $this->EdomModel->getDosenInfo($id_dosen);
    $saran = $this->EdomModel->getSaran($kd_mk, $id_dosen);
    $jumlahMahasiswa = $this->EdomModel->countMahasiswaEvaluasi($id_dosen);
    $listMahasiswa = $this->EdomModel->countMahasiswaEvaluasi_list($kd_mk);

    // Load library Dompdf
    $this->load->library('dompdf_lib');

    // Path gambar logo
    $image_path = base_url('assets/images/Logo_Stikes_Sosmed.png');

    // Create new Dompdf instance
    $dompdf = new Dompdf_lib();

    // Load HTML content with logo path
    $html = $this->load->view('admin-st/evaluasi/pdf_hasil_edom', compact('tahun', 'rata_rata', 'info_edom', 'dosen_info', 'saran', 'jumlahMahasiswa', 'listMahasiswa', 'image_path'), true);

    // Generate PDF
    $dompdf->generatePdf($html);
}


		public function SetEdomKHS()
		{
			// Periksa apakah metode yang digunakan adalah POST
			if ($this->input->server('REQUEST_METHOD') === 'POST') {
				// Periksa apakah CSRF token valid
				if (!$this->security->csrf_verify()) {
					// CSRF token tidak valid
					echo json_encode(['status' => 'error', 'message' => 'CSRF Token Mismatch']);
					return;
				}

					
			// Ambil data dari POST
			$id_mahasiswa = $this->input->post('id_mahasiswa');
			$status = $this->input->post('status_edom');

			// Lakukan validasi data jika diperlukan

			// Update status KRS
			$updateData = ['status_edom' => $status];
			$this->MahasiswaModel->updateStatus($id_mahasiswa, $updateData);
			
				// Kirim respon sukses dengan AJAX
				echo json_encode(['status' => 'success', 'message' => 'Status EDOM berhasil diperbarui']);
			} else {
				// Jika metode bukan POST, kirim respon error
				echo json_encode(['status' => 'error', 'message' => 'Invalid EDOM Request Method']);
			}
		}
}