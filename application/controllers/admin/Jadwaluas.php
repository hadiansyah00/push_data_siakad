<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwaluas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Jadwal Uas SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Jadwal Uas';
		$data['matkul'] = $this->JadwaluasModel->getMatkul()->result();
		$data['tahun'] = $this->TaModel->getAktif()->result();
		$data['jurusan'] = $this->JurusanModel->getData('jurusan')->result();
		// $this->load->view('admin/template/header', $data);
		// $this->load->view('admin/template/sidebar', $data);
		$data['jadwal'] = $this->JadwaluasModel->getAll()->result();
		$this->load->view('admin-st/jadwal_uas/jadwal_uas-st', $data);
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
        $this->form_validation->set_rules('kelas', 'Kelas Mahasiswa', 'required');
        $this->form_validation->set_rules('jurusan', 'Program Studi', 'required');
		
        // Tambahkan aturan validasi lainnya sesuai kebutuhan

        // Jalankan validasi
        if ($this->form_validation->run() == FALSE) {
            // Validasi gagal, kirim respon error
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
            return;
        }
		$ta = $this->TaModel->getAktif()->result();
		foreach ($ta as $t) :
			$a = $t->id_ta;
		endforeach;
        $data = [
           
            'id_ta'			=> $a,
			'kelas'  		=> $this->input->post('kelas'),
			'kd_jurusan'  	=> $this->input->post('jurusan'),
			'kd_mk'  		=> $this->input->post('matkul'),
			'jam_uas'  		=> $this->input->post('jam_uas'),
			'ruang_uts' 	=> $this->input->post('ruang_uas'),
			'tgl_uas'  		=> $this->input->post('tgl_uas'),
            'tgl_insert'  	=> date('y-m-d'),
        ];

        // Simpan data ke database
        $this->MahasiswaModel->insertData('jadwal_uas', $data);

        // Kirim respon sukses
        echo json_encode(['status' => 'success', 'message' => 'Data Jadwal UTS berhasil disimpan']);
    } else {
        // Jika metode bukan POST, kirim respon error
        echo json_encode(['status' => 'error', 'message' => 'Invalid Request Method']);
    }
}
	// public function insert($kd_jurusan)
	// {
	// 	$ta = $this->TaModel->getAktif()->result();
	// 	foreach ($ta as $t) :
	// 		$a = $t->id_ta;
	// 	endforeach;
	// 	$data = array(
	// 		'kd_jurusan'		=> $kd_jurusan,
	// 		'id_ta'				=> $a,
	// 		'kd_mk'				=> htmlspecialchars($this->input->post('matkul')),
	// 	    'kelas'				=> htmlspecialchars($this->input->post('kelas')),
	// 		'jam_uas'			=> htmlspecialchars($this->input->post('jam_uas')),
	// 		'ruang_uas'			=> htmlspecialchars($this->input->post('ruang_uas')),
	// 		'tgl_uas'			=> htmlspecialchars($this->input->post('tgl_uas')),
	// 		'tgl_uas'			=>  htmlspecialchars($this->input->post('tgl_uas')),
	// 		'tgl_insert'    	=> date('y-m-d'),
	// 	);

	// 	//var_dump($data);
	// 	$this->JadwaluasModel->insertData('jadwal_uas', $data);
	// 	$this->session->set_flashdata(
	// 		'pesan',
	// 		'<div class="alert alert-block alert-success">
	// 			<button type="button" class="close" data-dismiss="alert">
	// 				<i class="ace-icon fa fa-times"></i>
	// 			</button>

	// 			<i class="ace-icon fa fa-check green"></i>

	// 			Data
	// 			<strong class="green">
	// 				Jadwal UAS
	// 			</strong>Berhasi di input!
	// 		</div>'
	// 	);
	// 	redirect($_SERVER['HTTP_REFERER']);
	// }

	public function update()
	{
		if (!$this->input->is_ajax_request()) {
			show_404();
		}

		$idJadwal = $this->input->post('id_jadwal');
		$kelas = $this->input->post('kelas');
		$matkul = $this->input->post('matkul');
		$jam = $this->input->post('jam_uas');
		$ruang = $this->input->post('ruang_uas');
		$tgl   = $this->input->post('tgl_uas');
		$jurs  = $this->input->post('jurusan');
	
		// Check if the password is empty, set a default password
	
		// Update data mahasiswa
		$data = array(
			'id_jadwal' 			=> $idJadwal,
			'kelas' 				=> $kelas,
			'matkul'				=> $matkul,
			'jam_uas' 				=> $jam,
			'ruang_uas'   			=> $ruang,
			'tgl_uas'  				=> $tgl,
			'kd_jurusan'  			=> $jurs,
			
		);

		// Validate CSRF token
		if ($this->input->post($this->security->get_csrf_token_name()) !== $this->security->get_csrf_hash()) {
			echo json_encode(['status' => 'error', 'message' => 'CSRF Token Mismatch']);
			return;
		}

		// Update the data in the database
		$result = $this->MahasiswaModel->updateData('jadwal_uas', $data, ['id_jadwal' => $idMahasiswa]);

		if ($result) {
			echo json_encode(['status' => 'success', 'message' => 'Data Jadwal UAS updated successfully']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Failed to update data Mahasiswa']);
		}
	}
	public function delete()
	{
		$idJadwal = $this->input->post('id_jawdal');
		
		// Perform the delete operation and check for success
		// Adjust the following code based on your implementation
		$result = $this->MahasiswaModel->deleteData('jadwal_uas', array('id_jadwal' => $idJadwal));
		if ($result) {
			echo json_encode(array('status' => 'success'));
		} else {
			echo json_encode(array('status' => 'error'));
		}
	}
// 	public function update($id)
// 	{
// 		$data['title'] = 'Update Data Jawdal UAS SBH';
// 		$data['judul'] = 'Akademik';
// 		$data['subJudul'] = 'Update Jadwal UAS';
		
// 		$where = array('id_jadwal' => $id);
	
// // 		$where = array('id_jadwal' => $id);
// 		$data['jadwal'] = $this->db->get_where('jadwal_uas', $where)->result();

// 		$this->load->view('admin/template/header', $data);
// 		$this->load->view('admin/template/sidebar', $data);
// 		$this->load->view('admin/jadwal_uas/update_uas', $data);
// 		$this->load->view('admin/template/footer');
// 	}

// 	public  function updateAksi()
// 	{
	    
// 		$id = $this->input->post('id_jadwal');
// 		$data = array(
// // 	        'kd_jurusan'		=> $kd_jurusan,
// // 			'kd_mk'				=> htmlspecialchars($this->input->post('matkul')),
// // 			'hari_uas'			=> htmlspecialchars($this->input->post('hari_uas')),
//             'kelas'				=> htmlspecialchars($this->input->post('kelas')),
// 			'jam_uas'			=> htmlspecialchars($this->input->post('jam_uas')),
// 			'ruang_uas'			=> htmlspecialchars($this->input->post('ruang_uas')),
// 			'tgl_uas'			=> htmlspecialchars($this->input->post('tgl_uas')),
// 			'tgl_update'        =>  date('y-m-d')
// 		);

// 		$where = array('id_jadwal' => $id);
// 		//var_dump($data);
// 		$this->db->update('jadwal_uas', $data, $where);
// 		$this->session->set_flashdata(
// 			'pesan',
// 			'<div class="alert alert-block alert-success">
// 				<button type="button" class="close" data-dismiss="alert">
// 					<i class="ace-icon fa fa-times"></i>
// 				</button>

// 				<i class="ace-icon fa fa-check green"></i>

// 				Jadwal Berhasil 
// 				<strong class="green">
// 					di Update!
// 				</strong>
// 			</div>'
// 		);
// 	redirect('admin/Jadwaluas');
// 	}

	// public function delete($id)
	// {
	// 	$where = array('id_jadwal' => $id);

	// 	$this->db->delete('jadwal_uas', $where);
	// 	$this->session->set_flashdata(
	// 		'pesan',
	// 		'<div class="alert alert-block alert-danger">
	// 			<button type="button" class="close" data-dismiss="alert">
	// 				<i class="ace-icon fa fa-times"></i>
	// 			</button>

	// 			<i class="ace-icon fa fa-check red"></i>

	// 			Data Jadwal Berhasi di 
	// 			<strong class="red">
	// 				Hapus!
	// 			</strong>
	// 		</div>'
	// 	);
	// 	redirect($_SERVER['HTTP_REFERER']);
	// }
}