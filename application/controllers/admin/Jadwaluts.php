<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwaluts extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Jadwal UTS SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Jadwal UTS';

		
		
		$data['jurusan'] = $this->JurusanModel->getData('jurusan')->result();	
		$data['matkul'] = $this->JadwalutsModel->getMatkul()->result();
		$data['jadwal'] = $this->JadwalutsModel->getAll()->result();
		$this->load->view('admin-st/jadwal_uts/jadwal_uts-st', $data);
		// $this->load->view('admin/template/footer');
	}

    // public function index_jadwal($id)
	// {
	// 	$data['title'] = 'Jadwal UTS SBH';
	// 	$data['judul'] = 'Akademik';
	// 	$data['subJudul'] = 'Jadwal UTS';

	// 	$where = array('kd_jurusan' => $id);
	// 	//$where = 'kd_jurusan';
	// 	$data['tahun'] = $this->TaModel->getAktif()->row_array();
	// 	$data['detil'] = $this->JurusanModel->detilData('jurusan', $where)->result();
	// 	$data['matkul'] = $this->JadwalutsModel->getMatkul($id)->result();
	// 	$data['jadwal'] = $this->JadwalutsModel->getAll($id)->result();
	// 	// $this->load->view('admin/template/header', $data);
	// 	// $this->load->view('admin/template/sidebar', $data);
	// 	$this->load->view('admin-st/jadwal_uts/master_jadwal_uts-st', $data);
	// 	// $this->load->view('admin/template/footer');
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
			'jam'  			=> $this->input->post('jam'),
			'ruang_uts' 	=> $this->input->post('ruang_uts'),
			'tgl_uts'  		=> $this->input->post('tgl_uts'),
            'tgl_insert'  	=> date('y-m-d'),
        ];

        // Simpan data ke database
        $this->MahasiswaModel->insertData('jadwal_uts', $data);

        // Kirim respon sukses
        echo json_encode(['status' => 'success', 'message' => 'Data Jadwal UTS berhasil disimpan']);
    } else {
        // Jika metode bukan POST, kirim respon error
        echo json_encode(['status' => 'error', 'message' => 'Invalid Request Method']);
    }
}


	public function update()
	{
		if (!$this->input->is_ajax_request()) {
			show_404();
		}

		$idJadwal = $this->input->post('id_jadwal');
		$kelas = $this->input->post('kelas');
		$matkul = $this->input->post('matkul');
		$jam = $this->input->post('jam');
		$ruang = $this->input->post('ruang_uts');
		$tgl   = $this->input->post('tgl_uts');
		$jurs  = $this->input->post('jurusan');
	
		// Check if the password is empty, set a default password
	
		// Update data mahasiswa
		$data = array(
			'id_jadwal' 			=> $idJadwal,
			'kelas' 		=> $kelas,
			'matkul'		=> $matkul,
			'jam' 			=> $jam,
			'ruang_uts'   	=> $ruang,
			'tgl_uts'  		=> $tgl,
			'kd_jurusan'  	=> $jurs,
			
		);

		// Validate CSRF token
		if ($this->input->post($this->security->get_csrf_token_name()) !== $this->security->get_csrf_hash()) {
			echo json_encode(['status' => 'error', 'message' => 'CSRF Token Mismatch']);
			return;
		}

		// Update the data in the database
		$result = $this->MahasiswaModel->updateData('jadwal_uts', $data, ['id_jadwal' => $idMahasiswa]);

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
		$result = $this->MahasiswaModel->deleteData('jadwal_uts', array('id_jadwal' => $idJadwal));
		if ($result) {
			echo json_encode(array('status' => 'success'));
		} else {
			echo json_encode(array('status' => 'error'));
		}
	}
	// public function insert($kd_jurusan)
	// {
	// 	$ta = $this->TaModel->getAktif()->result();
	// 	foreach ($ta as $t) :
	// 		$a = $t->id_ta;
	// 	endforeach;
	// 	$data = array(
	// 		'kd_jurusan'		=> htmlspecialchars($this->input->post('kd_jurusan')),
	// 		'id_ta'				=> $a,
	// 		'kelas'				=> htmlspecialchars($this->input->post('kelas')),
	// 		'kd_mk'				=> htmlspecialchars($this->input->post('matkul')),
	// 		'jam'		    	=> htmlspecialchars($this->input->post('jam')),
	// 		'ruang_uts'		    => htmlspecialchars($this->input->post('ruang_uts')),
	// 		'tgl_uts'			=> htmlspecialchars($this->input->post('tgl_uts')),
	// 		'tgl_insert'    	=> date('y-m-d'),
	// 	);

	// 	//var_dump($data);
	// 	$this->JadwaluasModel->insertData('jadwal_uts', $data);
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


// 	public function update($id)
// 	{
// 		$data['title'] = 'Update Data Jawdal UTS SBH';
// 		$data['judul'] = 'Akademik';
// 		$data['subJudul'] = 'Update Jadwal UTS';
		
// 		$where = array('id_jadwal' => $id);
	
// // 		$where = array('id_jadwal' => $id);
// 		$data['jadwal'] = $this->db->get_where('jadwal_uts', $where)->result();

// 		$this->load->view('admin/template/header', $data);
// 		$this->load->view('admin/template/sidebar', $data);
// 		$this->load->view('admin/jadwal_uts/update_uts', $data);
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
// 			'jam'			=> htmlspecialchars($this->input->post('jam')),
// 			'ruang_uts'			=> htmlspecialchars($this->input->post('ruang_uts')),
// 			'tgl_uts'			=> htmlspecialchars($this->input->post('tgl_uts')),
// 			'tgl_update'        =>  date('y-m-d')
// 		);

// 		$where = array('id_jadwal' => $id);
// 		//var_dump($data);
// 		$this->db->update('jadwal_uts', $data, $where);
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
// 	redirect('admin/Jadwaluts');
// 	}

// 	public function delete($id)
// 	{
// 		$where = array('id_jadwal' => $id);

// 		$this->db->delete('jadwal_uts', $where);
// 		$this->session->set_flashdata(
// 			'pesan',
// 			'<div class="alert alert-block alert-danger">
// 				<button type="button" class="close" data-dismiss="alert">
// 					<i class="ace-icon fa fa-times"></i>
// 				</button>

// 				<i class="ace-icon fa fa-check red"></i>

// 				Data Jadwal Berhasi di 
// 				<strong class="red">
// 					Hapus!
// 				</strong>
// 			</div>'
// 		);
// 		redirect($_SERVER['HTTP_REFERER']);
// 	}
}
