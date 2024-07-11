<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Krs extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
		
	}

	public function index()
	{
	    
	    $getAktif = mysqli_query($con, "SELECT *  FROM ta WHERE status = '1' ORDER BY id DESC ");
		//Session login mahasiswa berdasarkan id login (ambil data KRS)
		$mhs = $this->KrsModel->getDataMhs();
		$ta = $this->TaModel->getAktifKrs()->row_array();

		$data['title'] = 'KRS Mahasiswa SBH';
		$data['judul'] = 'Kartu Rencana Studi (KRS)';
		//setting krs
		$data['setting'] = $this->db->get('mahasiswa')->row_array();
		$data['setting_krs'] = $this->db->get('set_krs')->row_array();
		$data['tahun'] = $this->TaModel->getAktifKrs()->row_array();
		$data['mk'] = $this->TaModel->getMk()->row_array();
		$data['mk_2'] = $this->TaModel->getMk_2()->row_array();
		$data['mk_3'] = $this->TaModel->getMkPrak()->row_array();
		//get data from session
		$data['mhs'] = $this->KrsModel->getDataMhs();
		//form get KRS for mhs
		$data['getKrs'] = $this->KrsModel->getMatkul_KRS($mhs['kd_jurusan'], $ta['id_ta']);
		$data['getPrak'] = $this->KrsModel->getMatkul_PRAK($mhs['kd_jurusan'], $ta['id_ta']);
		
		//form get KRS filter berdasarkan tahun akademik aktif
// 		$data['getKrs'] = $this->KrsModel->getMatkul_KRS($ta['id_ta'], $mhs['kd_jurusan'],);
		$data['semester'] = $this->db->get('matakuliah')->row_array();
		//tampil data KRS berdasarkan sessi login mhs
		$data['viewKrs'] = $this->KrsModel->viewKrs($mhs['id_mahasiswa'], $ta['id_ta']);

		// $this->load->view('mhs/templates/header', $data);
		$this->load->view('mhs/krs/krs-mhs-st', $data);
		// $this->load->view('mhs/templates/footer');
	}

   
        public function simpan()
            {
                if ($this->input->is_ajax_request()) {
                    $selectedKrs = $this->input->post('krs');
        
                    // Validasi jika tidak ada mata kuliah yang dipilih
                    if (empty($selectedKrs)) {
                        $response = array('status' => 'error', 'message' => 'Pilih setidaknya satu mata kuliah.');
                    } else {
                        // Validasi atau proses lain sesuai kebutuhan
        
                        // Contoh implementasi penyimpanan KRS di dalam model dengan validasi
                        $result = $this->KrsModel->simpanDataKrs($selectedKrs);
        
                        // Memberikan respons ke client (JavaScript)
                        $response = array(
                            'status' => $result['status'],
                            'message' => $result['message']
                        );
                    }
        
                    echo json_encode($response);
                } else {
                    show_404();
                }
            }
            
            
     public function simpanDataKrs($selectedKrs)
        {
            $kurikulumData = $this->KurikulumModel->getKurikulumById($id_kurikulum);
            // Validasi atau proses lain sesuai kebutuhan
            $id_perdos = $kurikulumData['id_perdos'];
            $id_peran = $kurikulumData['id_peran'];
    		//get data tahun akademik
    		$ta = $this->TaModel->getAktif()->row_array();
    		//get data mahasiswa berdasarkan session login
    		$mhs = $this->KrsModel->getDataMhs();
            // Contoh implementasi penyimpanan KRS dengan validasi
            foreach ($selectedKrs as $krsId) {
                // Cek apakah KRS sudah ada sebelumnya
                $krsExist = $this->db->get_where('krs', array('id_kurikulum' => $krsId))->num_rows() > 0;
    
                if (!$krsExist) {
                    // Lakukan penyimpanan KRS ke dalam database
                     $data = array(
                            'id_kurikulum' => $krsId,
                            'kode_mk' => $krsData['kode_mk'],
                            'matakuliah' => $krsData['matakuliah'],
                            'sks' => $krsData['sks'],
                            // ... Lainnya sesuai dengan struktur tabel ...

        		);

    
                    $this->db->insert('krs', $data);
                }
            }
    
            // Return nilai atau pesan sukses jika diperlukan
            return array('status' => 'success', 'message' => 'KRS berhasil disimpan');
        }
// Helper function untuk mengecek apakah KRS sudah ada atau belum
    private function isKrsExist($existingKrs, $krsId)
    {
        foreach ($existingKrs as $existing) {
            if ($existing['id_krs'] == $krsId) {
                return true;
            }
        }
        return false;
    }
    public function simpan_krs()
	{
    if ($this->input->is_ajax_request()) {
        $selectedKrs = $this->input->post('krs');

        // Validasi jika tidak ada mata kuliah yang dipilih
        if (empty($selectedKrs)) {
            $response = array('status' => 'error', 'message' => 'Pilih setidaknya satu mata kuliah.');
        } else {
            // Dapatkan data mata kuliah berdasarkan ID dan data mahasiswa
            $mhs = $this->KrsModel->getDataMhs();
            $ta = $this->TaModel->getAktif()->row_array();

            foreach ($selectedKrs as $krsId) {
                $kurikulumData = $this->KurikulumModel->getKurikulumById($krsId);
                $id_perdos = $kurikulumData['id_perdos'];
                $id_peran = $kurikulumData['id_peran'];

                // Buat array data untuk penyimpanan KRS
                $data = array(
                    'id_kurikulum' => $krsId,
                    'id_ta' => $ta['id_ta'],
                    'id_mahasiswa' => $mhs['id_mahasiswa'],
                    'id_peran' => $id_peran,
                    'id_perdos' => $id_perdos,
                    'tgl_insert' => date('Y-m-d'),
                    'status_verfikasi' => 'Belum Verifikasi'
                );

                // Contoh implementasi penyimpanan KRS di dalam model dengan validasi
                $result = $this->KrsModel->simpanDataKrs($data);

                // Memberikan respons ke client (JavaScript)
                $response = array(
                    'status' => $result['status'],
                    'message' => $result['message']
                );
            }
        }

        echo json_encode($response);
    } else {
        show_404();
    }
}

 public function simpan_praktikum()
	{
    if ($this->input->is_ajax_request()) {
        $selectedPraktik= $this->input->post('krsprak');

        // Validasi jika tidak ada mata kuliah yang dipilih
        if (empty($selectedPraktik)) {
            $response = array('status' => 'error', 'message' => 'Pilih setidaknya satu mata kuliah Praktikum.');
        } else {
            // Dapatkan data mata kuliah berdasarkan ID dan data mahasiswa
            $mhs = $this->KrsModel->getDataMhs();
            $ta = $this->TaModel->getAktif()->row_array();

            foreach ($selectedPraktik as $p) {
                $s = $this->KurikulumModel->getKurikulumPraktikById($p);
                $id_perdos = $s['id_perdos'];
                $id_peran = $s['id_peran'];

                // Buat array data untuk penyimpanan KRS
                $data = array(
					
                    'id_praktik' => $p,
                    'id_ta' => $ta['id_ta'],
                    'id_mahasiswa' => $mhs['id_mahasiswa'],
                    'id_peran' => $id_peran,
                    'id_perdos' => $id_perdos,
                    'tgl_insert' => date('Y-m-d'),
                  
                );

                // Contoh implementasi penyimpanan KRS di dalam model dengan validasi
                $result = $this->KrsModel->simpanDataPraktik($data);

                // Memberikan respons ke client (JavaScript)
                $response = array(
                    'status' => $result['status'],
                    'message' => $result['message']
                );
            }
        }

        echo json_encode($response);
    } else {
        show_404();
    }
}



	public function delete($krsId)
	{
		$where = array('id_krs' => $krsId);

		$this->db->delete('krs', $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="icofont-times"></i>
				</button>

				<i class="icofont-check red"></i>

				Data  
				<strong class="red">
					KRS
				</strong> berhasil 
				<strong class="red">
					dihapus!
				</strong>
				
			</div>'
		);
		redirect('mhs/KrsView');
	}
	public function deletePrak($krsId)
	{
		$where = array('id_krs_prak' => $krsId);

		$this->db->delete('krs_praktik', $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="icofont-times"></i>
				</button>

				<i class="icofont-check red"></i>

				Data  
				<strong class="red">
					KRS
				</strong> berhasil 
				<strong class="red">
					dihapus!
				</strong>
				
			</div>'
		);
		redirect('mhs/krs');
	}
}