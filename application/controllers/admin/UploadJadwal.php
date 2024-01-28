<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UploadJadwal extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
		$this->load->helper(array('form','url', 'download')); 

		
	}
	public function index()
	{

		$data['title'] = 'Jadwal Kuliah MHS';
		$data['judul'] = 'Upload Jadwal Kuliah ';
		//get data from session

		$data['dsn'] = $this->KrsModel->getDataDosen();
		$data['pdf'] = $this->RpsModel->getData();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/upload_jadwal/jadwal-mhs', $data);
		$this->load->view('admin/template/footer');
		// $this->load->view('dosen/templates/footer');
	}
	
    public function do_upload()
        {
           	$config['upload_path']		= './assets/images/uploads'; // Sesuaikan dengan direktori penyimpanan Anda
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
        
                // Set pesan flash data "Success"
                	$this->session->set_flashdata(
        			'pesan',
        			'<div class="alert alert-block alert-success">
        				<button type="button" class="close" data-dismiss="alert">
        					<i class="ace-icon fa fa-times"></i>
        				</button>
        
        				<i class="ace-icon fa fa-check red"></i>
        
        				Data Berhasil 
        				<strong class="red">
        					Upload!
        				</strong>
        			</div>'
        		);
              // Redirect atau tampilkan pesan sukses
                redirect('admin/UploadJadwal');
            } else {
                // Gagal unggah, tangani kesalahan
                $error = array('error' => $this->upload->display_errors());
                 
        
                // Load tampilan berdasarkan template dengan pesan kesalahan
                $error = array('error' => $this->upload->display_errors());
                    $this->load->view('admin/upload_jadwal/upload_form', $error);
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
            'keterangan_berkas' => $this->input->post('keterangan_berkas'),
            'smt' => $this->input->post('smt')
        );

        // Panggil metode simpan_data dari model Anda untuk menyimpan data ke database
        $this->JadwalModel->simpan_data($data); // Ganti dengan nama model Anda
    }
public function download_file($id)
{
    // Ambil data berkas dari database berdasarkan ID
    $data = $this->db->get_where('jadwal_pdf', ['id_jadwal_pdf' => $id])->row();

    if ($data) {
        // Tentukan path ke berkas
        $file_path = './assets/images/uploads/' . $data->nama_berkas;

        // Check apakah berkas ada
        if (file_exists($file_path)) {
            // Ambil kd_jurusan dari data berkas
            $kd_jurusan = $data->jurusan;

            // Tentukan nama berkas baru berdasarkan kd_jurusan
            $new_file_name = 'STIKES BOGOR HUSADA' . '.pdf';

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


	function download($id)
	{

		// $file = $this->db->get_where('tb_berkas', ['kd_berkas' => $id])->row();
		// $data = file_get_contents('assets/assets-mhs/img/' . $file->nama_berkas);
		// force_download($file, $data);
		$data = $this->db->get_where('tb_berkas', ['kd_berkas' => $id])->row();
		force_download('assets/assets-mhs/img/' . $data->nama_berkas, NULL);

		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check red"></i>

				Data Berhasil 
				<strong class="red">
					Download!
				</strong>
			</div>'
		);
		// redirect('dosen/rps');
	}
	public function deleteJadwal($id)
	{

		$where = array('id_jadwal_pdf' => $id);
		$this->db->delete('jadwal_pdf', $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check red"></i>

				Data berhasil di hapus
				<strong class="red">
					Hapus!
				</strong>
			</div>'
		);
		redirect('admin/UploadJadwal');
	}
}
