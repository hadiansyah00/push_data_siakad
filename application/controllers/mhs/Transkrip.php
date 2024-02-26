<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transkrip extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		//Session login mahasiswa berdasarkan id login (ambil data KRS)
		$mhs = $this->KrsModel->getDataMhs();
		$ta = $this->TaModel->getTa()->row_array();
		//$ta = $this->TaModel->getTa()->row_array();

		$data['title'] = 'Transkrip Nilai Mahasiswa';
		$data['judul'] = 'Transkrip Nilai';
		//setting krs
	
    	$data['setting'] = $this->db->get('mahasiswa')->row_array();
		$data['setting_krs'] = $this->db->get('set_krs')->row_array();
		//$data['tahun'] = $this->TaModel->getAktif()->row_array();
		//$data['semester'] = $this->db->get('matakuliah')->result();
		//get data from session
		$data['mhs'] = $this->KrsModel->getDataMhs();
		//get ta
		//$data['ta'] = $this->TaModel->getData('ta')->result();
		//tampil data KRS berdasarkan sessi login mhs
		$data['viewKrs'] = $this->KrsModel->viewAll($mhs['id_mahasiswa'], $ta['id_ta']);
		//$data['viewKrs2'] = $this->KrsModel->viewAll($mhs['id_mahasiswa']);

		// $this->load->view('mhs/templates/header', $data);
		$this->load->view('mhs/transkrip/transkrip_mhs-st',$data);
		// $this->load->view('mhs/khs/transkrip-st', $data);
		// $this->load->view('mhs/templates/footer');
	}
public function calculateAndSaveResults() {
    try {
        // Menginisialisasi total nilai sks dan total bobot2
        $totalBobot2 = 0;
        $totalSks = 0;

        // Melakukan perhitungan total bobot2 dan sks
        foreach ($viewKrs as $row) { 
            // Menambahkan nilai sks ke total sks
            $totalSks += $row->sks;

            // Menghitung bobot2
            if ($row->nilai == 'A') {
                $bobot2 = $row->sks * 4.00;
            } elseif ($row->nilai == 'AB') {
                $bobot2 = $row->sks * 3.75;
            } elseif ($row->nilai == 'BA') {
                $bobot2 = $row->sks * 3.50;
            } elseif ($row->nilai == 'B') {
                $bobot2 = $row->sks * 3.00;
            } elseif ($row->nilai == 'BC') {
                $bobot2 = $row->sks * 2.75;
            } elseif ($row->nilai == 'C') {
                $bobot2 = $row->sks * 2.00;
            } elseif ($row->nilai == 'D') {
                $bobot2 = $row->sks * 1.00;
            } elseif ($row->nilai == 'E') {
                $bobot2 = $row->sks * 0;
            } else {
                $bobot2 = 0;
            }

            // Menambahkan bobot2 ke total bobot2
            $totalBobot2 += $bobot2;
        }

        // Simpan hasil perhitungan ke dalam tabel Mahasiswa
        $this->load->model('MahasiswaModel');
        $this->MahasiswaModel->saveResultsToMahasiswa($totalBobot2, $totalSks);

        // Output untuk AJAX
        $response['success'] = true;
        $response['message'] = 'Hasil perhitungan berhasil disimpan.';
        echo json_encode($response);
    } catch (Exception $e) {
        // Tangani kesalahan
        $response['success'] = false;
        $response['message'] = 'Gagal menyimpan hasil perhitungan: ' . $e->getMessage();
        echo json_encode($response);
    }
}



	public function printKHS($id_mhs)
	{
		//Session login mahasiswa berdasarkan id login (ambil data KRS)
		$mhs = $this->KrsModel->getDataMhs();
		$ta = $this->TaModel->getAktif()->row_array();

		$data['setting'] = $this->db->get('set_krs')->row_array();

		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		//get data from session
		$data['mhs'] = $this->KrsModel->getDataMhs();
		//get KRS for mhs
		$data['getKrs'] = $this->KrsModel->getMatkul_KRS($ta['id_ta'], $mhs['kd_jurusan']);
		$data['semester'] = $this->db->get('matakuliah')->row_array();
		//tampil data KRS berdasarkan sessi login mhs
		$data['viewKrs'] = $this->KrsModel->viewKrs($mhs['id_mahasiswa'], $ta['id_ta']);

		$this->load->view('admin/print/print_khs', $data);
	}
	public function printKRS($id_mhs)
	{
		//Session login mahasiswa berdasarkan id login (ambil data KRS)
		$mhs = $this->KrsModel->getDataMhs();
		$ta = $this->TaModel->getAktif()->row_array();

		$data['setting'] = $this->db->get('set_krs')->row_array();

		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		//get data from session
		$data['mhs'] = $this->KrsModel->getDataMhs();
		//get KRS for mhs
		$data['getKrs'] = $this->KrsModel->getMatkul_KRS($ta['id_ta'], $mhs['kd_jurusan']);
		$data['semester'] = $this->db->get('matakuliah')->row_array();
		//tampil data KRS berdasarkan sessi login mhs
		$data['viewKrs'] = $this->KrsModel->viewKrs($mhs['id_mahasiswa'], $ta['id_ta']);

		$this->load->view('admin/print/print_krs', $data);
	}
		public function printKRS_kapro($id_mhs)
	{
		//Session login mahasiswa berdasarkan id login (ambil data KRS)
		$mhs = $this->KrsModel->getDataMhs();
		$ta = $this->TaModel->getAktif()->row_array();

		$data['setting'] = $this->db->get('set_krs')->row_array();

		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		//get data from session
		$data['mhs'] = $this->KrsModel->getDataMhs();
		//get KRS for mhs
		$data['getKrs'] = $this->KrsModel->getMatkul_KRS($ta['id_ta'], $mhs['kd_jurusan']);
		$data['semester'] = $this->db->get('matakuliah')->row_array();
		//tampil data KRS berdasarkan sessi login mhs
		$data['viewKrs'] = $this->KrsModel->viewKrs($mhs['id_mahasiswa'], $ta['id_ta']);

		$this->load->view('admin/print/print_krs_kapro', $data);
	}
		public function printKRS_dospem($id_mhs)
	{
		//Session login mahasiswa berdasarkan id login (ambil data KRS)
		$mhs = $this->KrsModel->getDataMhs();
		$ta = $this->TaModel->getAktif()->row_array();

		$data['setting'] = $this->db->get('set_krs')->row_array();

		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		//get data from session
		$data['mhs'] = $this->KrsModel->getDataMhs();
		//get KRS for mhs
		$data['getKrs'] = $this->KrsModel->getMatkul_KRS($ta['id_ta'], $mhs['kd_jurusan']);
		$data['semester'] = $this->db->get('matakuliah')->row_array();
		//tampil data KRS berdasarkan sessi login mhs
		$data['viewKrs'] = $this->KrsModel->viewKrs($mhs['id_mahasiswa'], $ta['id_ta']);

		$this->load->view('admin/print/print_krs_dospem', $data);
	}
		public function printUTS($id_mhs)
	{
		$mhs = $this->KrsModel->getDataMhs();
		$ta = $this->TaModel->getAktif()->row_array();

		$data['title'] = 'Kartu UTS';
		$data['judul'] = 'Kartu UTS Mahasiswa';
		//setting krs
		$data['setting'] = $this->db->get('set_krs')->row_array();
		$data['getUts'] = $this->JadwalutsModel->getMatkul_KRS($mhs['kd_jurusan']);
		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		//get data from session
		$data['mhs'] = $this->KrsModel->getDataMhs();
		//get Jadwal for mahasiswa
		//tampil data KRS berdasarkan sessi login mhs
		$data['viewKrs'] = $this->KrsModel->viewKrs($mhs['id_mahasiswa'], $ta['id_ta']);


	

		$this->load->view('admin/print/print_uts', $data);
	}
	
	public function printUTS_karyawan($id_mhs)
	{
		$mhs = $this->KrsModel->getDataMhs();
		$ta = $this->TaModel->getAktif()->row_array();

		$data['title'] = 'Kartu UTS';
		$data['judul'] = 'Kartu UTS Mahasiswa';
		//setting krs
		$data['setting'] = $this->db->get('set_krs')->row_array();
		$data['getUts_karyawan'] = $this->JadwalutsModel->getMatkul_karyawan($mhs['kd_jurusan']);
		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		//get data from session
		$data['mhs'] = $this->KrsModel->getDataMhs();
		//get Jadwal for mahasiswa
		//tampil data KRS berdasarkan sessi login mhs
		$data['viewKrs'] = $this->KrsModel->viewKrs($mhs['id_mahasiswa'], $ta['id_ta']);


	

		$this->load->view('admin/print/print_uts_karyawan', $data);
	}
		public function printUAS($id_mhs)
	{
		$mhs = $this->KrsModel->getDataMhs();
		$ta = $this->TaModel->getAktif()->row_array();

		$data['title'] = 'Kartu UAS';
		$data['judul'] = 'Kartu UAS Mahasiswa';
		//setting krs
		$data['setting'] = $this->db->get('set_krs')->row_array();
		$data['getUas'] = $this->JadwaluasModel->getMatkul_KRS($mhs['kd_jurusan']);
		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		//get data from session
		$data['mhs'] = $this->KrsModel->getDataMhs();
		//get Jadwal for mahasiswa
		//tampil data KRS berdasarkan sessi login mhs
		$data['viewKrs'] = $this->KrsModel->viewKrs($mhs['id_mahasiswa'], $ta['id_ta']);
		$this->load->view('admin/print/print_uas', $data);
	}
		public function printUAS_karyawan($id_mhs)
	{
		$mhs = $this->KrsModel->getDataMhs();
		$ta = $this->TaModel->getAktif()->row_array();

		$data['title'] = 'Kartu UAS';
		$data['judul'] = 'Kartu UAS Mahasiswa';
		//setting krs
		$data['setting'] = $this->db->get('set_krs')->row_array();
		$data['getUas_karyawan'] = $this->JadwaluasModel->getMatkul_KRS_karyawan($mhs['kd_jurusan']);
		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		//get data from session
		$data['mhs'] = $this->KrsModel->getDataMhs();
		//get Jadwal for mahasiswa
		//tampil data KRS berdasarkan sessi login mhs
		$data['viewKrs'] = $this->KrsModel->viewKrs($mhs['id_mahasiswa'], $ta['id_ta']);
		$this->load->view('admin/print/print_uas_karyawan', $data);
	}
}
