<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Dompdf\Dompdf;
use Dompdf\Options;

class KusionerEdom extends CI_Controller
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
		$this->load->view('admin-st/evaluasi/evaluasi-st', $data);
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
		$data['krs_get'] = $this->KurikulumModel->getKRSByMatakuliah($id);
		
		// $this->load->view('admin/template/header', $data);
		// $this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin-st/evaluasi/view_list_edom-st', $data);
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
		$data['rata_rata'] = $this->EdomModel->getRataRataByIdKrsDosen($kd_mk, $id_dosen);
		$data['info_dosen'] = $this->EdomModel->getRataRataByIdKrsDosen($kd_mk, $id_dosen);
		$data['dosen_info'] = $this->EdomModel->getDosenInfo($id_dosen);
		$data['saran'] = $this->EdomModel->getSaran($kd_mk,$id_dosen);
		$data['info_edom'] = $this->EdomModel->getInfoMk($kd_mk);
		// Data tambahan
		$data['kd_mk'] = $kd_mk;
		$data['id_dosen'] = $id_dosen;
      	$jumlahMahasiswa = $this->EdomModel->countMahasiswaEvaluasi($id_dosen);
		$listMahasiswa = $this->EdomModel->countMahasiswaEvaluasi_list($kd_mk);
        $data['tahun'] = $this->TaModel->getAktif()->row_array();
        // Mengirim jumlah mahasiswa ke view
		$data['list_mhs'] = $listMahasiswa;
        $data['jumlah_mahasiswa'] = $jumlahMahasiswa;
		// Tampilkan tampilan hasil kuesioner EDOM
		
		$data['mahasiswa_evaluasi'] = $this->EdomModel->MahasiswaEvaluasi($id_dosen, $kd_mk);
		$data['mahasiswa_krs'] = $this->EdomModel->Mahasiswakrs($kd_mk);	


		$this->load->view('admin-st/evaluasi/hasil_kuesioner_edom-st', $data);
	
	}
public function generatePdfTes()
{

    // Load HTML content
    $html = '<h1>Hello, World!</h1>';

    // Load HTML to Dompdf
    $this->dompdf->loadHtml($html);

    // Render PDF (optional)
    $this->dompdf->render();

    // Output PDF to browser
    $this->dompdf->stream("example_pdf.pdf", array("Attachment" => false));
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


	public function cetak($kd_mk, $id_dosen) {
	    
	    $this->load->library('fpdf');
      
        // Inisialisasi FPDF
        $pdf = new FPDF();
        $pdf->AddPage();
      	$tahun = $this->TaModel->getAktif()->row_array();
      	$rata_rata = $this->EdomModel->getRataRataByIdKrsDosen($kd_mk, $id_dosen);
		$info_edom = $this->EdomModel->getInfoMk($kd_mk);
		$dosen_info = $this->EdomModel->getDosenInfo($id_dosen);
        $saran = $this->EdomModel->getSaran($kd_mk,$id_dosen);
		$jumlahMahasiswa = $this->EdomModel->countMahasiswaEvaluasi();
		$listMahasiswa = $this->EdomModel->countMahasiswaEvaluasi_list();

    	// Judul
    	
    	error_reporting(E_ALL);
        ini_set('display_errors', 1);
        
        
    	$image_path = FCPATH . 'assets/images/Logo_Stikes_Sosmed.png'; // Path gambar header
        $pdf->Image($image_path, 10, 10, 100); // Koordinat dan ukuran gambar
    
        $pdf->SetFont('Helvetica', '', 9);
        $pdf->SetXY(170, 10); // Menggeser teks ke kanan
        $pdf->Cell(10, 20, 'Bogor, ' . date('d F Y'), 0, 1); // Teks tanggal
            
        // Informasi Lampiran
        $pdf->SetFont('Helvetica', 'B', 12);
        // Teks - Hal
        $pdf->SetXY(10, 40); // Koordinat untuk teks "Hal: Hasil Evaluasi Dosen Mengajar Oleh Mahasiswa"
        $pdf->Cell(0, 10, 'Hasil Evaluasi Dosen Mengajar Oleh Mahasiswa', 0, 1,'C');

        // Informasi Mata Kuliah
        // Informasi Mata Kuliah
        $pdf->SetFont('Helvetica', '', 9);
        
        // Teks - Hal
       $pdf->SetXY(10, 50); // Koordinat untuk teks informasi

        $pdf->Cell(30, 10, 'Nama Dosen', 0, 0); // Teks statis
        $pdf->Cell(10); // Spasi antara label dan titik dua
        $pdf->Cell(10, 10, ':', 0, 0); // ini untuk :
        $pdf->Cell(0, 10, $dosen_info->nama_dosen, 0, 1); // Teks dinamis
        
        $pdf->Cell(30, 10, 'Nama Matakuliah', 0, 0); // Teks statis
        $pdf->Cell(10); // Spasi antara label dan titik dua
        $pdf->Cell(10, 10, ':', 0, 0); // ini untuk :
        $pdf->Cell(0, 10, $info_edom->matakuliah, 0, 1);
        
        // $pdf->Cell(30, 10, 'Angakatan / Tingkat', 0, 0); // Teks statis
        // $pdf->Cell(10); // Spasi antara label dan titik dua
        // $pdf->Cell(10, 10, ':', 0, 0); // ini untuk :
        // $pdf->Cell(0, 10, $info_edom->matakuliah, 0, 1);
        
        $pdf->Cell(30, 10, 'Jumlah Mahasiswa', 0, 0); // Teks statis
        $pdf->Cell(10); // Spasi antara label dan titik dua
        $pdf->Cell(10, 10, ':', 0, 0); // ini untuk :
        $pdf->Cell(0, 10, $jumlahMahasiswa, 0, 1);
        
        $pdf->Cell(30, 10, 'Jumlah Responden', 0, 0); // Teks statis
        $pdf->Cell(10); // Spasi antara label dan titik dua
        $pdf->Cell(10, 10, ':', 0, 0); // ini untuk :
        $pdf->Cell(0, 10, $listMahasiswa, 0, 1);
        
               // Tambahkan Tahun Akademik ke dalam PDF
        $pdf->Cell(30, 10, 'Tahun Akademik', 0, 0); // Teks statis
        $pdf->Cell(10); // Spasi antara label dan titik dua
        $pdf->Cell(10, 10, ':', 0, 0); // ini untuk :
        
        // Ambil Tahun Akademik dari hasil query
        $tahun_akademik = ""; // Variabel untuk menyimpan Tahun Akademik
        $semester = ""; //Variabel untuk menambahkan semesternya
        if (!empty($rata_rata)) {
            // Misalnya, ambil dari data pertama
            $tahun_akademik = $rata_rata[0]->tahun_ajaran;
            $semester = $rata_rata[0]->semes;
        }
        
     $pdf->Cell(0, 10, $tahun_akademik . ' - ' . $semester, 0, 1);
        
       
   // Tabel Hasil EDOM
    $pdf->SetFont('Helvetica', '', 8);
    $pdf->SetFillColor(200);

    // Header Tabel
    $pdf->Cell(10, 10, 'No', 1, 0, 'C', true);
    $pdf->Cell(120, 10, 'Aspek Penilaian', 1, 0, 'C', true);
    $pdf->Cell(30, 10, 'Nilai Rata Rata', 1, 0, 'C', true);
    $pdf->Cell(30, 10, 'Keterangan', 1, 1, 'C', true);

    // Data untuk Tabel
    $no = 1; // Nomor urutan
    $totalNilai = 0; // Total nilai

    foreach ($rata_rata as $row) {
        $kriteria = ""; // Variabel untuk menyimpan kriteria penilaian
        $totalNilai += $row->rata_rata; // Menambahkan nilai ke total
       
        // Logika untuk menentukan kriteria
       // Menentukan kriteria total rata-rata
            $kriteria = "";
            $hasil2 = $totalNilai / count($rata_rata);
            
            if ($row->rata_rata < 1.05) {
                    $kriteria = "Sangat Kurang";
                } elseif ($row->rata_rata >= 1.05 && $row->rata_rata <= 2.04) {
                    $kriteria = "Kurang";
                } elseif ($row->rata_rata >= 2.05 && $row->rata_rata <= 3.04) {
                    $kriteria = "Cukup";
                } elseif ($row->rata_rata >= 3.05 && $row->rata_rata <= 4.04) {
                    $kriteria = "Baik";
                } elseif ($row->rata_rata >= 4.05 && $row->rata_rata <= 5) {
                    $kriteria = "Sangat Baik";
				} 

            
            
        // Menambahkan data ke dalam PDF
        $pdf->Cell(10, 10, $no, 1, 0, 'C'); // Nomor urutan
        $pdf->Cell(120, 10, $row->pertanyaan, 1, 0); // Pertanyaan
        $pdf->Cell(30, 10, number_format($row->rata_rata, 2), 1, 0, 'C'); // Rata-rata
        $pdf->Cell(30, 10, $kriteria, 1, 1, 'C'); // Kriteria

        $no++;
    }
            if ($hasil2 >= 4.05 && $hasil2 <= 5.00) {
                $kriteria = "Sangat Baik";
            } elseif ($hasil2 >= 3.05 && $hasil2 <= 4.04) {
                $kriteria = "Baik";
            } elseif ($hasil2 >= 2.05 && $hasil2 <= 3.04) {
                $kriteria = "Cukup";
            } elseif ($hasil2 >= 1.05 && $hasil2 <= 2.04) {
                $kriteria = "Kurang";
            } elseif ($hasil2 < 1.05) {
                $kriteria = "Sangat Kurang";
            } else {
                $kriteria = "Null";
            }

    // Footer tabel - Total Rata-rata dan Kriteria Total
    $pdf->SetFillColor(200);
    $pdf->Cell(130, 10, 'Total Rata-Rata', 1, 0, 'C', true);
    $pdf->Cell(30, 10, number_format($totalNilai / count($rata_rata), 2), 1, 0, 'C', true);

    // Menentukan kriteria total rata-rata
    $kriteria_total = "";
    $hasil2 = $totalNilai / count($rata_rata);
    // Logika untuk menentukan kriteria total rata-rata
     // Menentukan kriteria total rata-rata
        $kriteria_total = "";
        $hasil2 = $totalNilai / count($rata_rata);
        
        if ($hasil2 >= 4.05 && $hasil2 <= 5.00) {
            $kriteria_total = "Sangat Baik";
        } elseif ($hasil2 >= 3.05 && $hasil2 <= 4.04) {
            $kriteria_total = "Baik";
        } elseif ($hasil2 >= 2.05 && $hasil2 <= 3.04) {
            $kriteria_total = "Cukup";
        } elseif ($hasil2 >= 1.05 && $hasil2 <= 2.04) {
            $kriteria_total = "Kurang";
        } elseif ($hasil2 < 1.05) {
            $kriteria_total = "Sangat Kurang";
        } else {
            $kriteria_total = "Tidak Dapat Ditetapkan";
        }


    $pdf->Cell(30, 10, $kriteria_total, 1, 1, 'C', true);
        // Setelah selesai mencetak tabel hasil EDOM, tambahkan keterangan kriteria penilaian di bawahnya
        $pdf->SetFont('Helvetica', '', 8);
      
        
    // Keterangan kriteria penilaian
$pdf->Cell(0, 7, 'Kriteria Penilaian:', 0, 1);

    // Definisikan kriteria penilaian
    $kriteria = array(
        '> 1.05 = Sangat Kurang',
        '1.05 - 2.04 = Kurang',
        '2.05 - 3.04 = Cukup',
        '3.05 - 4.04 = Baik',
        '4.05 - 5.00 = Sangat Baik'
    );
    
    // Tentukan posisi awal untuk kolom pertama dan kedua
    $x1 = 10; // Koordinat X kolom pertama
    $x2 = 80; // Koordinat X kolom kedua
    $y = $pdf->GetY(); // Nilai Y saat ini
    
    // Bagi kriteria menjadi dua kolom
    $jumlahKriteria = count($kriteria);
    $setengah = ceil($jumlahKriteria / 2);
    for ($i = 0; $i < $setengah; $i++) {
        $pdf->SetXY($x1, $y); // Atur posisi untuk kolom pertama
        $pdf->Cell(0, 5, $kriteria[$i], 0, 1);
    
        if ($i + $setengah < $jumlahKriteria) {
            $pdf->SetXY($x2, $y); // Atur posisi untuk kolom kedua
            $pdf->Cell(0, 5, $kriteria[$i + $setengah], 0, 1);
        }
        $y += 5; // Tambahkan margin di antara baris
    }


     // Tabel Hasil Saran Mahasiswa
        $pdf->SetFont('Helvetica', '', 9);
        $pdf->SetFillColor(200);
        
        // Header Tabel
        $pdf->SetY(185); // Atur posisi Y dengan margin atas sebesar 20
        // ... Kode lainnya untuk header tabel dan data

        $pdf->Cell(10, 10, 'No', 1, 0, 'C', true);
        $pdf->Cell(180, 10, 'Saran', 1, 1, 'C', true); // Perubahan disini untuk mengakhiri baris header
        
        // Data untuk Tabel
        $no = 1; // Nomor urutan
        foreach ($saran as $row) {
            // Menambahkan data ke dalam PDF
            $pdf->Cell(10, 10, $no, 1, 0, 'C'); // Nomor urutan
            $pdf->MultiCell(180, 10, $row->saran, 1, 'L'); // Saran dengan MultiCell
            $no++;
        }
    
    
           function forceJustifyText($pdf, $text, $width, $height) {
            $words = explode(' ', $text);
            $line = '';
            foreach ($words as $word) {
                if ($pdf->GetStringWidth($line . ' ' . $word) < $width) {
                    $line .= ' ' . $word;
                } else {
                    $pdf->MultiCell($width, $height, $line, 0, 'J');
                    $line = $word;
                }
            }
            $pdf->MultiCell($width, $height, $line, 0, 'J');
        }
        
        // Penggunaan di dalam kode Anda
        $text = " Demikian hasil EDOM dalam proses belajar mengajar, diharapkan dari hasil tersebut dapat digunakan sebagai bahan evaluasi untuk proses pembelajaran selanjutnya. Atas perhatian Bapak/Ibu Kami ucapkan terimakasih.";
        
        $pdf->SetFont('Helvetica', '', 9);
        $pdf->SetY(-85); // Posisi Y di bagian bawah dokumen
        forceJustifyText($pdf, $text, $pdf->GetPageWidth() - 20, 5);
                // Spasi sebelum elemen selanjutnya
       
    
    // Output PDF
      $judul = 'Hasil EDOM ' . $dosen_info->nama_dosen . '-' . $info_edom->matakuliah;
      $pdf->SetTitle($judul);

    $pdf->Output(); // Menampilkan atau mengunduh PDF

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