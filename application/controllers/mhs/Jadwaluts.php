<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwaluts extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
		$this->load->library('Pdf');
	}

	public function index()
	{
		//Session login mahasiswa berdasarkan id login (ambil data KRS)
		$mhs = $this->KrsModel->getDataMhs();
		$ta = $this->TaModel->getAktif()->row_array();

		$data['title'] = 'UAS (Ujian Akhir Semester)';
		$data['judul'] = 'UAS Mahasiswa';
		//setting krs
		$data['setting_krs'] = $this->db->get('set_krs')->row_array();
		$data['setting'] = $this->db->get('set_krs')->row_array();
		$data['getUts'] = $this->JadwalutsModel->getMatkul_KRS($mhs['kd_jurusan']);
		$data['getUts_karyawan'] = $this->JadwalutsModel->getMatkul_karyawan($mhs['kd_jurusan']);
		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		//get data from session
		$data['mhs'] = $this->KrsModel->getDataMhs();
		//get Jadwal for mahasiswa
		//tampil data KRS berdasarkan sessi login mhs
		$data['viewKrs'] = $this->KrsModel->viewKrs($mhs['id_mahasiswa'], $ta['id_ta']);

		// $this->load->view('mhs/templates/header', $data);
		$this->load->view('mhs/jadwal/jadwal_uts', $data);
		// $this->load->view('mhs/templates/footer');
	}
	
	public function print_uts_kelas_pagi($data)
	{
		$data['title'] = 'Kartu UTS';
		$data['judul'] = 'Kartu UTS Mahasiswa';
        $mhs = $this->KrsModel->getDataMhs();
		$ta = $this->TaModel->getAktif()->row_array();

		//setting krs
		$setting = $this->db->get('set_krs')->row_array();
		$getUts = $this->JadwalutsModel->getMatkul_KRS($mhs['kd_jurusan']);
		$tahun = $this->TaModel->getAktif()->row_array();
		//get data from session
		$mhs = $this->KrsModel->getDataMhs();
		//get Jadwal for mahasiswa
		//tampil data KRS berdasarkan sessi login mhs
		$viewKrs = $this->KrsModel->viewKrs($mhs['id_mahasiswa'], $ta['id_ta']);
		
		error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
		$pdf = new FPDF('P', 'mm', 'Letter');
		$pdf->addPage();
		$pdf->SetFont('Helvetica', 'B', 12);
		$pdf->Image('assets/img/logo_sbh.png',95, 10, 30,20);
		$pdf->Ln(22);
		$pdf->Cell(0, 7, 'Kartu Ujian Akhir Semester'.' - '.$tahun['ta'], 0, 1, 'C');
		$pdf->Ln();
		$pdf->SetFont('Helvetica', '', 9);
		$pdf->Cell(25);
		$pdf->Cell(150, 2, 'Nama '.' : '.$mhs['nama_mhs'], 0 , 1 ,'L');
		$pdf->Cell(125);
		$pdf->Cell(0, 2, 'Prog. Studi '.' : '.$mhs['jurusan'], 0, 1);
		$pdf->Ln();
		$pdf->Cell(25);
		$pdf->Cell(0, 2, 'Nim '.'    : '.$mhs['nim'], 0, 1,'L');
		$pdf->Cell(125);
		$pdf->Cell(0, 2, 'Semester'.'    : '.$mhs['semester'], 0, 1);
		$pdf->Ln();

		
		$pdf->Cell(10, 7, '', 0, 1,'C');
		$pdf->SetFont('Helvetica', 'B', 9);
		$pdf->Cell(10, 9, 'No', 1, 0, 'C');
		$pdf->Cell(75, 9, 'Matakuliah ', 1, 0, 'C');
		$pdf->Cell(20, 9, 'Ruang', 1, 0, 'C');
		$pdf->Cell(30, 9, 'Tanggal', 1, 0, 'C');
		$pdf->Cell(20, 9, 'Waktu', 1, 0, 'C');
		$pdf->Cell(20, 9, 'Pengawas', 1, 0, 'C');
		$pdf->Cell(20, 9, 'Paraf', 1, 0, 'C');
		$pdf->SetFont('Times', '', 9);
		$pdf->Ln();
		$no = 1;
		$sksk = 0;
		foreach ($getUts as $d) {
		    	if ($d->semester == $tahun['semester']) { 
				if ($d->smt == $mhs['semester']) { 
		
				$sksk = $sksk + $row->sks; 
				
				
			$pdf->Cell(10, 7, $no++. '.', 1, 0, 'C');
			$pdf->Cell(75, 7, $d->matakuliah, 1, 0,'L');
			$pdf->Cell(20, 7, $d->ruang_uas, 1, 0);
			$pdf->Cell(30, 7, format_indo($d->tgl_uas ,date('d-m-y')),1, 0,'C');
			$pdf->Cell(20, 7, $d->jam_uas, 1, 0,'C');
		    $pdf->Cell(20, 7, '', 1, 0);
			$pdf->Cell(20, 7, '', 1, 1,0);
	        	}
	    	}
		
	}
			$pdf->Ln(5);
		    $pdf->Cell(8);
		    $pdf->SetFont('Helvetica', 'B', 8);
		    $pdf->Cell(0, 7, 'Perhatian : ', 0 , 1 ,'L');
		    $pdf->SetFont('Helvetica', '', 7);
		    $pdf->Cell(10);
		    $pdf->Cell(0, 5, '1. Peserta Ujian wajib menggunakan atribut lengkap', 0 , 1 );
		    $pdf->Cell(10);
		    $pdf->Cell(0, 5, '- Untuk PRODI Kebidanan menggunakan  Seragam dan Name Tag', 0 , 1 );
		    $pdf->Cell(10);
		    $pdf->Cell(0, 5, '- Untuk PRODI Farmasi & Gizi Menggunakan Almamater dan Name Tag', 0 , 1 );
		    $pdf->Cell(10);
		    $pdf->Cell(0, 5, '2. Membawa alat tulis sendiri', 0 , 1 );
		    $pdf->Cell(10);
		    $pdf->Cell(0, 5, '3. Kartu Ujian ini wajib dibawa setiap pelaksanaan ujian', 0 , 1 );	  
	    	$pdf->Ln(20);
			$url='assets/images/uploads/'. $mhs['ttd'];
	        $pdf->Cell('140');
			$pdf->Cell(10, 7, 'KAPRODI' . ' ' .$mhs['jurusan'], 0, 1, 'C');
	        $pdf->Cell(50, 40, $pdf->Image($url, 5, $pdf->GetY(), 173.158), 0, 0, 'L');
			$pdf->Ln(20);
			$pdf->SetFont('Times', 'B', 9);
			$pdf->Cell('75');
			$pdf->Cell(150, 7, $mhs['kaprod'], 0, 1, 'C');
			$pdf->SetFont('Times', '', 9);
            ob_end_clean();
		    $pdf->Output( 'Kartu UTS STIKes Bogor Husada Reguler A'.'_'. $mhs['nama_mhs'].'.pdf','D');
	}
	
		public function print_uts_kelas_karyawan($data)
	{
		$data['title'] = 'Kartu UTS';
		$data['judul'] = 'Kartu UTS Mahasiswa';
        $mhs = $this->KrsModel->getDataMhs();
		$ta = $this->TaModel->getAktif()->row_array();

		//setting krs
		$setting = $this->db->get('set_krs')->row_array();
        $getUts_karyawan= $this->JadwalutsModel->getMatkul_karyawan($mhs['kd_jurusan']);
		$tahun = $this->TaModel->getAktif()->row_array();
		//get data from session
		$mhs = $this->KrsModel->getDataMhs();
		//get Jadwal for mahasiswa
		//tampil data KRS berdasarkan sessi login mhs
		$viewKrs = $this->KrsModel->viewKrs($mhs['id_mahasiswa'], $ta['id_ta']);

		error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
		$pdf = new FPDF('P', 'mm', 'Letter');
		$pdf->addPage();
		$pdf->SetFont('Helvetica', 'B', 12);
		$pdf->Image('assets/img/logo_sbh.png',95, 10, 30,20);
		$pdf->Ln(22);
		$pdf->Cell(0, 7, 'Kartu Ujian Akhir Semester'.' - '.$tahun['ta'], 0, 1, 'C');
		$pdf->Ln();
		$pdf->SetFont('Helvetica', '', 9);
		$pdf->Cell(25);
		$pdf->Cell(150, 2, 'Nama '.' : '.$mhs['nama_mhs'], 0 , 1 ,'L');
		$pdf->Cell(125);
		$pdf->Cell(0, 2, 'Prog. Studi '.' : '.$mhs['jurusan'], 0, 1);
		$pdf->Ln();
		$pdf->Cell(25);
		$pdf->Cell(0, 2, 'Nim '.'    : '.$mhs['nim'], 0, 1,'L');
		$pdf->Cell(125);
		$pdf->Cell(0, 2, 'Semester'.'    : '.$mhs['semester'], 0, 1);
		$pdf->Ln();

		
		$pdf->Cell(10, 7, '', 0, 1,'C');
		$pdf->SetFont('Helvetica', 'B', 9);
		$pdf->Cell(10, 9, 'No', 1, 0, 'C');
		$pdf->Cell(75, 9, 'Matakuliah ', 1, 0, 'C');
		$pdf->Cell(20, 9, 'Ruang', 1, 0, 'C');
		$pdf->Cell(30, 9, 'Tanggal', 1, 0, 'C');
		$pdf->Cell(20, 9, 'Waktu', 1, 0, 'C');
		$pdf->Cell(20, 9, 'Pengawas', 1, 0, 'C');
		$pdf->Cell(20, 9, 'Paraf', 1, 0, 'C');
		$pdf->SetFont('Times', '', 9);
		$pdf->Ln();
		$no = 1;
		$sksk = 0;
		
		foreach ($getUts_karyawan as $d) {
		     	if ($d->semester == $tahun['semester']) { 
				if ($d->smt == $mhs['semester']) { 
				
				$sksk = $sksk + $row->sks; 
				
			$pdf->Cell(10, 7, $no++. '.', 1, 0, 'C');
			$pdf->Cell(75, 7, $d->matakuliah, 1, 0,'L');
			$pdf->Cell(20, 7, $d->ruang_uas, 1, 0);
			$pdf->Cell(30, 7, format_indo($d->tgl_uas ,date('d-m-y')),1, 0,'C');
			$pdf->Cell(20, 7, $d->jam_uas, 1, 0,'C');
		    $pdf->Cell(20, 7, '', 1, 0);
			$pdf->Cell(20, 7, '', 1, 1,0);
	        	}
	    	}
		
	}
			$pdf->Ln(5);
		    $pdf->Cell(8);
		    $pdf->SetFont('Helvetica', 'B', 8);
		    $pdf->Cell(0, 7, 'Perhatian : ', 0 , 1 ,'L');
		    $pdf->SetFont('Helvetica', '', 7);
		    $pdf->Cell(10);
		    $pdf->Cell(0, 5, '1. Peserta Ujian wajib menggunakan atribut lengkap', 0 , 1 );
		    $pdf->Cell(10);
		    $pdf->Cell(0, 5, '- Untuk PRODI Kebidanan menggunakan  Seragam dan Name Tag', 0 , 1 );
		    $pdf->Cell(10);
		    $pdf->Cell(0, 5, '- Untuk PRODI Farmasi & Gizi Menggunakan Almamater dan Name Tag', 0 , 1 );
		    $pdf->Cell(10);
		    $pdf->Cell(0, 5, '2. Membawa alat tulis sendiri', 0 , 1 );
		    $pdf->Cell(10);
		    $pdf->Cell(0, 5, '3. Kartu Ujian ini wajib dibawa setiap pelaksanaan ujian', 0 , 1 );
		  //  Membawa alat tulis sendiri
		  //  Kartu Ujian ini wajib dibawa setiap pelaksanaan ujian.
	    	$pdf->Ln(20);   
            $url='assets/images/uploads/'. $mhs['ttd'];
	        $pdf->Cell('140');
			$pdf->Cell(10, 7, 'KAPRODI' . ' ' .$mhs['jurusan'], 0, 1, 'C');
	        $pdf->Cell(50, 40, $pdf->Image($url, 5, $pdf->GetY(), 173.158), 0, 0, 'L');
			$pdf->Ln(20);
			$pdf->SetFont('Times', 'B', 9);
			$pdf->Cell('75');
			$pdf->Cell(150, 7, $mhs['kaprod'], 0, 1, 'C');
			$pdf->SetFont('Times', 'B', 9);
		
		
          ob_end_clean();
        
     
		$pdf->Output( 'Kartu UTS STIKes Bogor Husada Reguler B'.'_'. $mhs['nama_mhs'].'.pdf','D');
	}
}