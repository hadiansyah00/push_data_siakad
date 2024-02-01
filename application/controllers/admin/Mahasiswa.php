<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
		
	}

	public function index()
	{
		$data['title'] = 'Data Mahasiswa SBH';
		$data['judul'] = 'Master';
		$data['subJudul'] = 'Mahasiswa';
		$data['mahasiswa'] = $this->MahasiswaModel->getData()->result();
		// Fetch data for the Jurusan combo box
		$jurusanList = $this->MahasiswaModel->getData('jurusan')->result();

		// Get the selected Jurusan from your database or wherever it's stored
		$selectedJurusan = $mahasiswa->kd_jurusan; // Adjust this based on your actual data structure

		// Pass the data to your view
		$data['jurusanList'] = $jurusanList;
		$data['selectedJurusan'] = $selectedJurusan;

		// Fetch data for the Dosen combo box
		$dosenList = $this->MahasiswaModel->getData('dosen')->result();

		// Get the selected Dosen from your database or wherever it's stored
		$selectedDosen = $mahasiswa->id_dosen; // Adjust this based on your actual data structure

		// Pass the data to your view
		$data['dosenList'] = $dosenList;
		$data['selectedDosen'] = $selectedDosen;


		
		$statusList = array(
			'aktif' => 'Aktif',
			'tidak' => 'Non Aktif',
			'lulus' => 'Lulus',
			'cuti' => 'Cuti'
		);

		// Get the selected value from your database or wherever it's stored
		$selectedStatus = $mahasiswa->status_mhs; // Adjust this based on your actual data structure

		// Pass the data to your view
		$data['statusList'] = $statusList;
		$data['selectedStatus'] = $selectedStatus;
		
		$kelasList = array(
			'0' => 'Pagi',
			'1' => 'Karyawan'
		);

		// Get the selected value from your database or wherever it's stored
		$selectedKelas = $mahasiswa->kelas_mhs; // Adjust this based on your actual data structure

		// Pass the data to your view
		$data['kelasList'] = $kelasList;
		$data['selectedKelas'] = $selectedKelas;
		// $this->load->view('admin/template/header', $data);
		// $this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin-st/mahasiswa/mahasiswa-st', $data);
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
        $this->form_validation->set_rules('nim', 'NIM', 'required|numeric');
        $this->form_validation->set_rules('nama_mhs', 'Nama Lengkap', 'required');
        // Tambahkan aturan validasi lainnya sesuai kebutuhan

        // Jalankan validasi
        if ($this->form_validation->run() == FALSE) {
            // Validasi gagal, kirim respon error
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
            return;
        }

        // Formulir valid, lakukan penyimpanan data
        $data = [
            'nim'         => $this->input->post('nim'),
            'nama_mhs'    => $this->input->post('nama_mhs'),
            'tahun_masuk' => $this->input->post('tahun_masuk'),
            'password'    => md5($this->input->post('password')),
            'kelas_mhs'   => $this->input->post('kelas_mhs'),
			'status_mhs'   => $this->input->post('status_mhs'),
            'kd_jurusan'  => $this->input->post('jurusan'),
            'id_dosen'    => $this->input->post('nama_dosen'),
            'tgl_insert'  => date('y-m-d'),
        ];

        // Simpan data ke database
        $this->MahasiswaModel->insertData('mahasiswa', $data);

        // Kirim respon sukses
        echo json_encode(['status' => 'success', 'message' => 'Data Mahasiswa berhasil disimpan']);
    } else {
        // Jika metode bukan POST, kirim respon error
        echo json_encode(['status' => 'error', 'message' => 'Invalid Request Method']);
    }
}


public function updateMahasiswa()
{
    if (!$this->input->is_ajax_request()) {
        show_404();
    }

    $idMahasiswa = $this->input->post('id_mahasiswa');
    $nim = $this->input->post('nim');
    $namaMhs = $this->input->post('nama_mhs');
    $tahunMasuk = $this->input->post('tahun_masuk');
    $password = $this->input->post('password');
	$kelas_mhs   = $this->input->post('kelas_mhs');
	$status_mhs   = $this->input->post('status_mhs');
	$kd_jurusan  = $this->input->post('jurusan');
    $id_dosen    = $this->input->post('nama_dosen');
	$password = md5($this->input->post('password'), PASSWORD_DEFAULT);
    // Validation if needed

    // Check if the password is empty, set a default password
   
    // Update data mahasiswa
    $data = array(
        'nim' 			=> $nim,
        'nama_mhs' 		=> $namaMhs,
        'tahun_masuk'	=> $tahunMasuk,
        'password' 		=> $password,
		'kelas_mhs'   	=> $kelas_mhs,
		'status_mhs'  	=> $status_mhs,
        'kd_jurusan'  	=> $kd_jurusan,
        'id_dosen'    	=> $id_dosen,
		'password'    	=> $password
    );

    // Validate CSRF token
    if ($this->input->post($this->security->get_csrf_token_name()) !== $this->security->get_csrf_hash()) {
        echo json_encode(['status' => 'error', 'message' => 'CSRF Token Mismatch']);
        return;
    }

    // Update the data in the database
    $result = $this->MahasiswaModel->updateData('mahasiswa', $data, ['id_mahasiswa' => $idMahasiswa]);

    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Data Mahasiswa updated successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update data Mahasiswa']);
    }
}


	public function view_mhs($id_mhs)
	{

		$data['title'] = 'Detail View Mahasiswa SBH';
		$data['judul'] = 'Master';
		$data['subJudul'] = 'Detail Mahasiswa';

		//$where = array('id_mahasiswa' => $id_mahasiswa);
		//var_dump($where);die();

		$data['mhs'] = $this->MahasiswaModel->mhsId($id_mhs)->row_array();
		//$data['mahasiswa'] = $this->MahasiswaModel->getMhsId($where)->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/mahasiswa/view_mhs', $data);
		$this->load->view('admin/template/footer');
	}

	//update data mahasiswa
	public function update($id)
	{
		$data['title'] = 'Update Data Mahasiswa SBH';
		$data['judul'] = 'Master';
		$data['subJudul'] = 'Update Data Mahasiswa';

		$where = array('id_mahasiswa' => $id);
		$data['mahasiswa'] = $this->db->get_where('mahasiswa', $where)->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/mahasiswa/update', $data);
		$this->load->view('admin/template/footer');
	}

	public function updateAksi()
	{
		$id 	= $this->input->post('id_mahasiswa');
		// $photo	= $_FILES['photo']['name'];
		// 	if($photo){
		// 		$config ['upload_path']		= './assets/images/uploads';
		// 		$config ['allowed_types']	= 'jpeg|jpg|png|gif|tiff';

		// 		$this->load->library('upload', $config);

		// 		if($this->upload->do_upload('photo')){
		// 			$photo = $this->upload->data('file_name');
		// 			$this->db->set('photo', $photo);
		// 		}else{
		// 			echo "Gagal upload";
		// 		}
		// 	}

		$data = array(
			'nama_mhs'			=> htmlspecialchars($this->input->post('nama_mhs')),
// 			'nama_kepanjangan'	=> htmlspecialchars($this->input->post('nama_kepanjangan')),
			'jk'				=> htmlspecialchars($this->input->post('jk')),
			'tempat_lahir'		=> htmlspecialchars($this->input->post('tempat_lahir')),
			'tgl_lahir'			=> htmlspecialchars($this->input->post('tgl_lahir')),
			'alamat'			=> htmlspecialchars($this->input->post('alamat')),
			'kota'				=> htmlspecialchars($this->input->post('kota')),
			'hp'				=> htmlspecialchars($this->input->post('hp')),
			'email'				=> htmlspecialchars($this->input->post('email')),
			'nama_ayah'			=> htmlspecialchars($this->input->post('nama_ayah')),
			'nama_ibu'			=> htmlspecialchars($this->input->post('nama_ibu')),
			'alamat_ortu'		=> htmlspecialchars($this->input->post('alamat_ortu')),
			'hp_ortu'			=> htmlspecialchars($this->input->post('hp_ortu')),
			'semester'			=> htmlspecialchars($this->input->post('semester')),
			'status_mhs'			=> htmlspecialchars($this->input->post('status_mhs')),
				'status'			=> htmlspecialchars($this->input->post('status')),
			'agama'			=> htmlspecialchars($this->input->post('agama')),
			'pendapatan_ortu'			=> htmlspecialchars($this->input->post('pendapatan_ortu')),
			'asal_sekolah'		=> htmlspecialchars($this->input->post('asal_sekolah')),
			'nisn'			=> htmlspecialchars($this->input->post('nisn')),
			'tahun_masuk'			=> htmlspecialchars($this->input->post('tahun_masuk')),
			//'photo'				=> $photo,
			'tgl_update'		=> date('y-m-d')
		);

		$where = array('id_mahasiswa' => $id);
		//var_dump($data);
		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data 
				<strong class="green">
					Mahasiswa
				</strong>
				Berhasi di Update!
			</div>'
		);
		redirect('admin/Mahasiswa');
	}

	public function updatePass($id)
	{
		$data['title'] = 'Detail View Mahasiswa SBH';
		$data['judul'] = 'Master';
		$data['subJudul'] = 'Update Mahasiswa';

		$where = array('id_mahasiswa' => $id);
		$data['mhs'] = $this->db->get_where('mahasiswa', $where)->row_array();

		//$data['mahasiswa'] = $this->MahasiswaModel->getMhsId($where)->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/mahasiswa/updatePass', $data);
		$this->load->view('admin/template/footer');
	}

	public function updatePassAksi()
	{
		$id 	= $this->input->post('id_mahasiswa');

		$data = array(
 		      'nama_mhs'			=> htmlspecialchars($this->input->post('nama_mhs')),
 		    'tahun_masuk'			=> htmlspecialchars($this->input->post('tahun_masuk')),
    		'status_mhs'		    => htmlspecialchars($this->input->post('status_mhs')),
// 			'id_dosen'			    => htmlspecialchars($this->input->post('nama_dosen')),
// 			'kd_jurusan'			=> htmlspecialchars($this->input->post('jurusan')),
			'password' => md5($this->input->post('password')),
			'tgl_update' => date('y-m-d')
		);

		$where = array('id_mahasiswa' => $id);
		//var_dump($data);
		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>
 
				<strong class="green">
					Mahasiswa
				</strong>
				Berhasi di Update!
			</div>'
		);
		redirect('admin/mahasiswa');
	}
	//update Dospem
	
	public function updateDospem($id)
	{
		$data['title'] = 'Edit Mahasiswa SBH';
		$data['judul'] = 'Mahasiswa SBH';
		$data['subJudul'] = 'Update Dosen Pembimbing Mahasiswa';

		$where = array('id_mahasiswa' => $id);
		$data['mhs'] = $this->db->get_where('mahasiswa', $where)->row_array();

		//$data['mahasiswa'] = $this->MahasiswaModel->getMhsId($where)->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/mahasiswa/update_dospem', $data);
		$this->load->view('admin/template/footer');
	}

	public function updateDospemAksi()
	{
		$id 	= $this->input->post('id_mahasiswa');

		$data = array(
 		  
			'id_dosen'			    => htmlspecialchars($this->input->post('nama_dosen')),
			'tgl_update' => date('y-m-d')
		);

		$where = array('id_mahasiswa' => $id);
		//var_dump($data);
		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>
 
				<strong class="green">
					Mahasiswa
				</strong>
				Berhasi di Update!
			</div>'
		);
		redirect('admin/mahasiswa');
	}
	
		
	public function upStatus($id)
	{
		$data['title'] = 'Edit Status Mahasiswa';
		$data['judul'] = 'Mahasiswa SBH';
		$data['subJudul'] = 'Update Status Mahasiswa';

		$where = array('id_mahasiswa' => $id);
		$data['mhs'] = $this->db->get_where('mahasiswa', $where)->row_array();

		//$data['mahasiswa'] = $this->MahasiswaModel->getMhsId($where)->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/mahasiswa/update_status', $data);
		$this->load->view('admin/template/footer');
	}

	public function upStatusAksi()
	{
		$id 	= $this->input->post('id_mahasiswa');

		$data = array(
 		  
			'id_dosen'			    => htmlspecialchars($this->input->post('nama_dosen')),
			'tgl_update' => date('y-m-d')
		);

		$where = array('id_mahasiswa' => $id);
		//var_dump($data);
		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>
 
				<strong class="green">
					Mahasiswa
				</strong>
				Berhasi di Update!
			</div>'
		);
		redirect('admin/mahasiswa');
	}


	//Delete data
	public function deleteMahasiswa()
{
    $idMahasiswa = $this->input->post('id_mahasiswa');
    
    // Perform the delete operation and check for success
    // Adjust the following code based on your implementation
    $result = $this->MahasiswaModel->deleteData('mahasiswa', array('id_mahasiswa' => $idMahasiswa));
    if ($result) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'error'));
    }
}

}
