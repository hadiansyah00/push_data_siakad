<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kaldik extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
    
	}

	public function index()
	{
		$data['title'] = 'Kaldik  SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Kalender Akademik';
		$data['dsn'] = $this->KrsModel->getDataDosen();
		$data['kaldik'] = $this->JadwalModel->getDataKaldik();
		$data['tahun'] = $this->TaModel->getAktif()->result();
		$data['jurusan'] = $this->JurusanModel->getData('jurusan')->result();


		$this->load->view('admin-st/kaldik/kaldik-st', $data);

	}
	public function do_upload()
		{
			$config['upload_path'] = './assets/images/uploads'; // Sesuaikan dengan direktori penyimpanan Anda
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = 2048; // Ukuran maksimum dalam kilobyte
			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);

			if ($this->upload->do_upload('pdf_file')) {
				// Berhasil diunggah
				$data = $this->upload->data();
				$file_name = $data['file_name'];

				// Simpan informasi berkas ke dalam database
				$this->simpan_ke_database($file_name);

				// Berhasil upload, kirim pesan ke client
				$response = array(
					'success' => true,
					'message' => 'Data berhasil diunggah!'
				);
				echo json_encode($response);
			} else {
				// Gagal unggah, tangani kesalahan
				$error = array(
					'success' => false,
					'message' => $this->upload->display_errors()
				);
				echo json_encode($error);
			}
		}

		
		private function simpan_ke_database($file_name)
		{
			$ta = $this->TaModel->getAktif()->result();
			foreach ($ta as $t) :
			$a = $t->id_ta;
			endforeach;
			// Data yang akan disimpan dalam database (sesuaikan dengan struktur Anda)
			$data = array(
				'id_ta' => $a,
				'kd_jurusan'=> $this->input->post('kd_jurusan'),
				'nama_berkas' => $file_name,
				'tgl_insert' => date('Y-m-d H:i:s')
			);
			$this->JadwalModel->simpan_data_kaldik($data); 
		}
	public function delete()
	{
		$id_jadwal = $this->input->post('id_kaldik');
	
		$result = $this->MahasiswaModel->deleteData('kaldik', array('id_kaldik' => $id_jadwal));
		if ($result) {
			echo json_encode(array('status' => 'success'));
		} else {
			echo json_encode(array('status' => 'error'));
		}
	}
		
   public function download_file($id)
{
    // Ambil data berkas dari database berdasarkan ID
    $data = $this->db->get_where('kaldik', ['id_kaldik' => $id])->row();

    if ($data) {
        // Tentukan path ke berkas
        $file_path = './assets/images/uploads/' . $data->nama_berkas;

        // Check apakah berkas ada
        if (file_exists($file_path)) {
            // Ambil kd_jurusan dari data berkas
            $kd_jurusan = $data->jurusan;

            // Tentukan nama berkas baru berdasarkan kd_jurusan
            $new_file_name = 'KALDIK STIKES BOGOR HUSADA' . '.pdf';

            // Load helper 'download' CodeIgniter
            $this->load->helper('download');

            // Lakukan unduhan berkas dengan nama yang ditampilkan kepada pengguna
            force_download($file_path, NULL, $new_file_name);
        } else {
            echo 'Berkas tidak ditemukan.';
        }
    } else {
        echo 'Data berkas tidak ditemukan.';
    }
}

}