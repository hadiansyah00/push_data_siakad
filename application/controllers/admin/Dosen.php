<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$this->ModelSecurity->getSecurity();

		$data['title'] = 'Data Dosen SBH';
		$data['judul'] = 'Master';
		$data['subJudul'] = 'Dosen';
		$data['dosen'] = $this->DosenModel->getData('dosen')->result();
			// Fetch data for the Jurusan combo box
		$jurusanList = $this->DosenModel->getData('dosen')->result();

		// Get the selected Jurusan from your database or wherever it's stored
		$selectedJurusan = $dosen->kd_jurusan; // Adjust this based on your actual data structure

		// Pass the data to your view
		$data['jurusanList'] = $jurusanList;
		$data['selectedJurusan'] = $selectedJurusan;

		//Select Status Dosen
		$statusListDosen = array(
			'Dosen Tetap' => 'Dosen Tetap',
			'Tidak Tetap' => 'Tidak Tetap'
		);

		// Get the selected value from your database or wherever it's stored
		$selectedStatus = $dosen->status_ds; // Adjust this based on your actual data structure

		// Pass the data to your view
		$data['statusListDosen'] = $statusListDosen;
		$data['selectedStatus'] = $selectedStatus;
		
		///Select Jenis Kelamin
		$jenisKelamin = array(
			'L' => 'Laki-Laki',
			'P' => 'Perempuan'
		);

		// Get the selected value from your database or wherever it's stored
		$selectJenis = $dosen->jenis_kelamin; // Adjust this based on your actual data structure

		// Pass the data to your view
		$data['jenisKelamin'] = $jenisKelamin;
		$data['selectedJenis'] = $selectedJenis;
		// $this->load->view('admin/template/header', $data);
		// $this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin-st/dosen/dosen-st', $data);
		// $this->load->view('admin/template/footer');
	}
	public function get_data() {
        $data['dosen2'] = $this->DosenModel->get_all_dosen(); // Sesuaikan dengan metode yang ada di model Anda
        echo json_encode($data);
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
        $this->form_validation->set_rules('kd_dosen', 'Kode Dosen', 'required');
        $this->form_validation->set_rules('nama_dosen', 'Nama Lengkap', 'required');
        // Tambahkan aturan validasi lainnya sesuai kebutuhan

        // Jalankan validasi
        if ($this->form_validation->run() == FALSE) {
            // Validasi gagal, kirim respon error
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
            return;
        }

        // Formulir valid, lakukan penyimpanan data
        $data = array(
			'nidn'				=> htmlspecialchars($this->input->post('nidn')),
			'nama_dosen'		=> htmlspecialchars($this->input->post('nama_dosen')),
			'kd_dosen'			=> htmlspecialchars($this->input->post('kd_dosen')),
			'jenis_kelamin'		=> htmlspecialchars($this->input->post('jenis_kelamin')),
			'tempat'			=> htmlspecialchars($this->input->post('tempat')),
			'tgl'				=> htmlspecialchars($this->input->post('tgl')),
			'alamat_dosen'		=> htmlspecialchars($this->input->post('alamat_dosen')),
			'hp_ds'				=> htmlspecialchars($this->input->post('hp_ds')),
			'status_ds'			=> htmlspecialchars($this->input->post('status_ds')),
			'kd_jurusan'		=> htmlspecialchars($this->input->post('jurusan')),
			'email_ds'			=> htmlspecialchars($this->input->post('email_ds')),		
			  'password'        => password_hash($this->input->post('password')),
			'tgl_insert'		=> date('y-m-d')
		);

        // Simpan data ke database
        $this->MahasiswaModel->insertData('dosen', $data);

        // Kirim respon sukses
        echo json_encode(['status' => 'success', 'message' => 'Data Dosen berhasil disimpan']);
    } else {
        // Jika metode bukan POST, kirim respon error
        echo json_encode(['status' => 'error', 'message' => 'Invalid Request Method']);
    }
}


public function updateDataDosen()
{
    if (!$this->input->is_ajax_request()) {
        show_404();
    }

    $idDosen = $this->input->post('id_dosen');
    $nidn = $this->input->post('nidn');
	$kdDosen = $this->input->post('kd_dosen');
	$namdos = $this->input->post('nama_dosen');
	$tgl = $this->input->post('tgl');
	$tmpt = $this->input->post('tempat');
	$jk = $this->input->post('jenis_kelamin');
	$hpds = $this->input->post('hp_ds');
	$stds = $this->input->post('status_ds');
	$kdjs = $this->input->post('jurusan');
	$emds = $this->input->post('email_ds');
    $aldos = $this->input->post('alamat_dosen');
    $password = password_hash($this->input->post('password_ds'), PASSWORD_DEFAULT);

    // Validation if needed

    // Check if the password is empty, set a default password
    

    // Update data mahasiswa
    $data = array(
    'nidn' => $nidn,
    'kd_dosen' => $kdDosen, // Assuming 'kd_dosen' is a field in your database
    'nama_dosen' => $namdos,
    'tgl' => $tgl,
    'tempat' => $tmpt,
    'jenis_kelamin' => $jk,
    'hp_ds' => $hpds,
    'status_ds' => $stds,
    'kd_jurusan' => $kdjs,
    'email_ds' => $emds,
    'alamat_dosen' => $aldos,
    'password_ds' => $password,
);

    // Validate CSRF token
    if ($this->input->post($this->security->get_csrf_token_name()) !== $this->security->get_csrf_hash()) {
        echo json_encode(['status' => 'error', 'message' => 'CSRF Token Mismatch']);
        return;
    }

    // Update the data in the database
    $result = $this->MahasiswaModel->updateData('dosen', $data, ['id_dosen' => $idDosen]);

    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Data Dosen updated successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update data Dosen']);
    }
}
//Delete data
	public function deteletDosen()
{
    $idDosen = $this->input->post('id_dosen');
    
    // Perform the delete operation and check for success
    // Adjust the following code based on your implementation
    $result = $this->DosenModel->deleteData('dosen', array('id_dosen' => $idDosen));
    if ($result) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'error'));
    }
}
	
	public function view_dosen($id)
	{
		$data['title'] = 'Detil Data Dosen';
		$data['judul'] = 'Master';
		$data['subJudul'] = 'Detil Data Dosen';

		$where = array('id_dosen' => $id);
		// 		$data['jurusan'] = $this->JurusanModel->getData('jurusan')->result();
		$data['dosen'] = $this->db->get_where('dosen', $where)->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/dosen/view_dosen', $data);
		$this->load->view('admin/template/footer');
	}

	public function update($id)
	{
		$data['title'] = 'Update Data Dosen SBH';
		$data['judul'] = 'Master';
		$data['subJudul'] = 'Update Data Dosen';

		$where = array('id_dosen' => $id);
		// 		$data['jurusan'] = $this->JurusanModel->getData('jurusan')->result();
		$data['dosen'] = $this->db->get_where('dosen', $where)->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/dosen/update', $data);
		$this->load->view('admin/template/footer');
	}

	public  function updateAksi()
	{
		$id = $this->input->post('id_dosen');
		// 		$data['jurusan'] = $this->JurusanModel->getData('jurusan')->result();
		$data = array(
			'nidn'				=> htmlspecialchars($this->input->post('nidn')),
			'nama_dosen'		=> htmlspecialchars($this->input->post('nama_dosen')),
			'kd_dosen'			=> htmlspecialchars($this->input->post('kd_dosen')),
			'jenis_kelamin'		=> htmlspecialchars($this->input->post('jenis_kelamin')),
			'tempat'		=> htmlspecialchars($this->input->post('tempat')),
			'tgl'			=> htmlspecialchars($this->input->post('tgl')),
			'alamat_dosen'			=> htmlspecialchars($this->input->post('alamat_dosen')),
			'hp_ds'				=> htmlspecialchars($this->input->post('hp_ds')),
			'status_ds'			=> htmlspecialchars($this->input->post('status_ds')),
			'kd_jurusan'		=> htmlspecialchars($this->input->post('jurusan')),
			'email_ds'				=> htmlspecialchars($this->input->post('email_ds')),
			'password_ds'			=> md5($this->input->post('password_ds', TRUE)),
			'tgl_update'		=> date('y-m-d')
		);

		$where = array('id_dosen' => $id);
		//var_dump($data);
		$this->db->update('dosen', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data 
				<strong class="green">
					Dosen
				</strong>
				Berhasi di Update!
			</div>'
		);
		redirect('admin/Dosen');
	}

	public function delete($id)
	{
		$where = array('id_dosen' => $id);

		$this->db->delete('dosen', $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check red"></i>

				Data Dosen Berhasi di 
				<strong class="red">
					Hapus!
				</strong>
			</div>'
		);
		redirect('admin/Dosen');
	}
}
