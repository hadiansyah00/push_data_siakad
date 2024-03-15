<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(E_ALL);
ini_set('display_errors', '1');
class Evaluasi_mhs extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
		$this->load->model('EdomModel');
		// $this->ModelSecurity->getCsrf();
	}

	public function index()
	{
		$getAktif = mysqli_query($con, "SELECT *  FROM ta WHERE status = '1' ORDER BY id DESC ");
		//Session login mahasiswa berdasarkan id login (ambil data KRS)
		$mhs = $this->KrsModel->getDataMhs();
		$ta = $this->TaModel->getAktifKrs()->row_array();

		$data['title'] = 'EDOM';
		$data['judul'] = 'Evaluasi Dosen SBH';
		//setting krs
		$data['setting'] = $this->db->get('mahasiswa')->row_array();
		$data['setting_krs'] = $this->db->get('set_krs')->row_array();
		$data['tahun'] = $this->TaModel->getAktifKrs()->row_array();
		//get data from session
		$data['mhs'] = $this->KrsModel->getDataMhs();
		//form get KRS for mhs
		$data['get_edom'] = $this->KrsModel->getEdom($mhs['kd_jurusan'], $ta['id_ta']);
		//form get KRS filter berdasarkan tahun akademik aktif
		// 		$data['getKrs'] = $this->KrsModel->getMatkul_KRS($ta['id_ta'], $mhs['kd_jurusan']);
		$data['semester'] = $this->db->get('matakuliah')->row_array();
		//tampil data KRS berdasarkan sessi login mhs
		$data['viewKrs'] = $this->KrsModel->viewKrs($mhs['id_mahasiswa'], $ta['id_ta']);
		$data['viewEdom'] = $this->KrsModel->viewEdom($mhs['id_mahasiswa'], $ta['id_ta']);
		$this->load->view('mhs/templates/header', $data);
		$this->load->view('mhs/evaluasi_dosen', $data);
		$this->load->view('mhs/templates/footer');
	}

	//SET TAHUN AKADEMIK AKTIF
	public function setEdom($id)
	{
		//reset status tahun akademik
		$status = array('status_edom' => 0);
		$this->db->update('mahasiswa', $status);

		//Set aktif tahun akademik
		$where = array('id_mahasiswa' => $id);
		$data = array('status_edom' => 1);

		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan1',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data
				<strong class="green">
				Terimakasih!
				</strong>
			</div>'
		);
		redirect('mhs/evaluasi_mhs');
	}

	public function add($id_eval)
	{
		//get data tahun akademik
		$ta = $this->TaModel->getAktif()->row_array();
		//get data mahasiswa berdasarkan session login
		$mhs = $this->KrsModel->getDataMhs();


		$data = array(
			'id_eval' 	=> $id_eval,
			'id_ta'			=> $ta['id_ta'],
			'id_mahasiswa'	=> $mhs['id_mahasiswa'],
			'tgl_insert'	=> date('y-m-d'),
		);

		$this->KrsModel->addEdom($data);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
					<button type="button" class="close" data-dismiss="alert">
						<i class="icofont-times"></i>
					</button>

					<i class="icofont-check green"></i>

					Data  
					<strong class="green">
				Silahkan Mengisi EDOM (EVALUASI DOSEN MAHASISWA)
					</strong>
				</div>'
		);
		redirect('mhs/evaluasi_mhs');
	}

	public function mulai($id_krs, $id_dosen)
	{
	      
		//Session login mahasiswa berdasarkan id login (ambil data KRS)
		$krs = $this->KrsModel->getByIdKRS($id_krs);
		if ($krs) {
			// Mengambil data Dosen berdasarkan ID Dosen
			$dosen = $this->KrsModel->getByIdDsn($id_dosen);
			if ($dosen) {
				// Mengambil pertanyaan evaluasi dosen dari model PertanyaanModel
				$pertanyaan = $this->EdomModel->getPertanyaan();
				// Menyiapkan data yang akan dikirim ke view
			
				//Session Mengambil ID Mahasiswa

				$id_mahasiswa = $this->session->userdata('username');
				// Mengambil ID Kurikulum dari objek KRS
            $id_kurikulum = $krs->id_kurikulum;

            // Mengambil kd_mk dari model KurikulumModel
          
			 $kd_mk = $this->KrsModel->getKdMkById($id_kurikulum);   	
            if ($kd_mk !== false) {
				$data = array(
							'krs' => $krs,
							'dosen' => $dosen,
							'pertanyaan' => $pertanyaan,
							'id_mahasiswa' => $id_mahasiswa,
							'kd_mk' => $kd_mk,
							'created_at' => date('y-m-d'),
							
						);

				// Memuat tampilan yang sesuai dengan data
				$data['mhs'] = $this->KrsModel->getDataMhs();
				$ta = $this->TaModel->getAktifKrs()->row_array();

				$data['title'] = 'EDOM';
				$data['judul'] = 'Evaluasi Dosen SBH';
				//setting krs
				$data['setting'] = $this->db->get('mahasiswa')->row_array();
				$data['setting_krs'] = $this->db->get('set_krs')->row_array();
				$data ['nama_mk']= $this->KrsModel->getInfoMk();
				$data['tahun'] = $this->TaModel->getAktifKrs()->row_array();
				//get data from session
				$data['mhs'] = $this->KrsModel->getDataMhs();


				// $this->load->view('mhs/templates/header', $data);
				$this->load->view('mhs/evaluasi_dosen', $data);
				// $this->load->view('mhs/templates/footer');
			} else {
				// Mengatasi ketika data Dosen tidak ditemukan
				show_error('Dosen tidak ditemukan', 404);
			}
		} else {
			// Mengatasi ketika data KRS tidak ditemukan
			show_error('KRS tidak ditemukan', 404);
		}
	}
}


        public function simpan()
        {
            // Mengambil data yang dikirim melalui POST
            $id_krs = $this->input->post('id_krs');
            $kd_mk = $this->input->post('kd_mk'); 
            $id_dosen = $this->input->post('id_dosen');
            $jawaban = $this->input->post('jawaban');
            $id_mahasiswa = $this->input->post('id_mahasiswa');
            $id_ta = $this->input->post('id_ta');
            $saran = $this->input->post('saran'); // Tambah baris ini untuk mendapatkan data saran

        
            // Misalnya, kita akan menyimpan data jawaban ke tabel database (gantilah ini dengan tabel sesuai kebutuhan Anda)
            foreach ($jawaban as $id_eval => $jawaban) {
                $data = array(
                    'id_krs' => $id_krs,
                    'kd_mk' => $kd_mk,
                    'id_dosen' => $id_dosen,
                    'id_eval' => $id_eval,
                    'jawaban' => $jawaban,
                    'id_mahasiswa' => $id_mahasiswa,
                    'id_ta' => $id_ta
                );
        
                $this->db->insert('evaluasi_jawaban', $data);
            }
             // Simpan data saran ke dalam tabel edom_saran
                $dataSaran = array(
                    'id_krs' => $id_krs,
                    'kd_mk' => $kd_mk,
                    'id_dosen' => $id_dosen,
                    'id_mahasiswa' => $id_mahasiswa,
                    'id_ta' => $id_ta,
                    'saran' => $saran // Gunakan data saran yang diambil dari form
                );
            var_dump($dataSaran);
                $this->db->insert('edom_saran', $dataSaran);

        
            $dataStatus = array(
                'status_edom_1' => '1', // Atur status_edom ke 1 untuk menandakan sudah melakukan evaluasi
            );
        
            $this->db->where('id_krs', $id_krs);
            $this->db->update('krs', $dataStatus);
        
            // Setelah berhasil menyimpan data, set Flashdata
          $this->session->set_flashdata('success', 'Terimakasih telah menggisi EDOM');

            // Arahkan pengguna ke halaman baru dengan sedikit keterlambatan
            echo '<script>
                    setTimeout(function(){
                        window.location.href = "'.site_url('mhs/khs').'";
                    }, 10000); // Tunggu 2 detik (2000 milidetik) sebelum mengalihkan
                 </script>';
            // Arahkan pengguna ke halaman baru
            redirect('mhs/khs');
        }


	public function simpan_dosen_2()
	{

	       // Mengambil data yang dikirim melalui POST
            $id_krs = $this->input->post('id_krs');
            $kd_mk = $this->input->post('kd_mk'); 
            $id_dosen = $this->input->post('id_dosen');
            $jawaban = $this->input->post('jawaban');
            $id_mahasiswa = $this->input->post('id_mahasiswa');
            $id_ta = $this->input->post('id_ta');
            $saran = $this->input->post('saran'); // Tambah baris ini untuk mendapatkan data saran

        
            // Misalnya, kita akan menyimpan data jawaban ke tabel database (gantilah ini dengan tabel sesuai kebutuhan Anda)
            foreach ($jawaban as $id_eval => $jawaban) {
                $data = array(
                    'id_krs' => $id_krs,
                    'kd_mk' => $kd_mk,
                    'id_dosen' => $id_dosen,
                    'id_eval' => $id_eval,
                    'jawaban' => $jawaban,
                    'id_mahasiswa' => $id_mahasiswa,
                    'id_ta' => $id_ta
                );
        
                $this->db->insert('evaluasi_jawaban', $data);
            }
             // Simpan data saran ke dalam tabel edom_saran
                $dataSaran = array(
                    'id_krs' => $id_krs,
                    'kd_mk' => $kd_mk,
                    'id_dosen' => $id_dosen,
                    'id_mahasiswa' => $id_mahasiswa,
                    'id_ta' => $id_ta,
                    'saran' => $saran // Gunakan data saran yang diambil dari form
                );
              var_dump($dataSaran);
                $this->db->insert('edom_saran', $dataSaran);

        
		$dataStatus = array(
			'status_edom_2' => '1', // Atur status_edom ke 1 untuk menandakan sudah melakukan evaluasi
			'status_verif' => '1', // Atur status_edom ke Y untuk menandakan sudah melakukan evaluasi dan KHS sudah bisa dilihat
		);

		$this->db->where('id_krs', $id_krs);
		$this->db->update('krs', $dataStatus);
		
		$this->session->set_flashdata('success', 'Terimakasih telah mengisi EDOM!');

            // Arahkan pengguna ke halaman baru dengan sedikit keterlambatan
            echo '<script>
                    setTimeout(function(){
                        window.location.href = "'.site_url('mhs/khs').'";
                    }, 10000); // Tunggu 2 detik (2000 milidetik) sebelum mengalihkan
                 </script>';
            // Arahkan pengguna ke halaman baru
            redirect('mhs/khs');
		// Setelah berhasil menyimpan data, arahkan pengguna ke halaman baru
		redirect('mhs/khs'); 
	}

	public function mulai_2($id_krs, $id_dosen)
	{
		//Session login mahasiswa berdasarkan id login (ambil data KRS)
		$krs = $this->KrsModel->getByIdKRS($id_krs);
		if ($krs) {
			// Mengambil data Dosen berdasarkan ID Dosen
			$dosen = $this->KrsModel->getByIdDsn($id_dosen);
			if ($dosen) {
				// Mengambil pertanyaan evaluasi dosen dari model PertanyaanModel
				$pertanyaan = $this->EdomModel->getPertanyaan();
				// Menyiapkan data yang akan dikirim ke view
			
				//Session Mengambil ID Mahasiswa

				$id_mahasiswa = $this->session->userdata('username');
				// Mengambil ID Kurikulum dari objek KRS
            $id_kurikulum = $krs->id_kurikulum;

            // Mengambil kd_mk dari model KurikulumModel
            $kd_mk = $this->KrsModel->getKdMkById($id_kurikulum);
            //  $nama_mk = $this->KrsModel->getNamaMK($kd_mk);
				
            if ($kd_mk !== false) {
				$data = array(
							'krs' => $krs,
							'dosen' => $dosen,
							'pertanyaan' => $pertanyaan,
							'id_mahasiswa' => $id_mahasiswa,
							'kd_mk' => $kd_mk,
							'created_at' => date('y-m-d'),
							
						);
				// Memuat tampilan yang sesuai dengan data
				$data['mhs'] = $this->KrsModel->getDataMhs();
				$ta = $this->TaModel->getAktifKrs()->row_array();

				$data['title'] = 'EDOM';
				$data['judul'] = 'Evaluasi Dosen SBH';
				//setting krs
				$data['setting'] = $this->db->get('mahasiswa')->row_array();
				$data['setting_krs'] = $this->db->get('set_krs')->row_array();
				$data['tahun'] = $this->TaModel->getAktifKrs()->row_array();
				//get data from session
				$data['mhs'] = $this->KrsModel->getDataMhs();


				// $this->load->view('mhs/templates/header', $data);
				$this->load->view('mhs/evaluasi_dosen_2', $data);
				// $this->load->view('mhs/templates/footer');
			} else {
				// Mengatasi ketika data Dosen tidak ditemukan
				show_error('Dosen tidak ditemukan', 404);
			}
		} else {
			// Mengatasi ketika data KRS tidak ditemukan
			show_error('KRS tidak ditemukan', 404);
		}
	}

	}


	public function sukses()
	{
		// Tampilkan halaman sukses atau pesan sukses di sini
		$mhs = $this->KrsModel->getDataMhs();
		$ta = $this->TaModel->getAktifKrs()->row_array();

		$data['title'] = 'Terimakasih';
		$data['judul'] = 'Terimakasih Telah Melakukan Evaluasi Dosen SBH';
		//setting krs
		$data['setting'] = $this->db->get('mahasiswa')->row_array();
		$data['setting_krs'] = $this->db->get('set_krs')->row_array();
		$data['tahun'] = $this->TaModel->getAktifKrs()->row_array();
		//get data from session
		$data['mhs'] = $this->KrsModel->getDataMhs();

		$this->load->view('mhs/templates/header', $data);
		$this->load->view('mhs/evaluasi_sukses', $data); // Gantilah 'evaluasi_sukses' dengan nama view yang sesuai
		$this->load->view('mhs/templates/footer');
	}
}