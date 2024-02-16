<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Setting Siakad';
		$data['judul'] = 'Settings';
		$data['subJudul'] = '';
		$data['ta'] = $this->TaModel->getData('ta')->result();
		$data['tahun'] = $this->TaModel->getAktifKrs()->row_array();
		$data['status'] = $this->db->get('set_krs')->row_array();
		$data['users'] = $this->UserModel->get_users();
		
		$rolelist = array(
			'bauk' => 'BAUK',
			'admin' => 'Admin',
		);
		$users = $this->UserModel->get_users();
		$selectedRole = $users->role; 
		$data['rolelist'] = $rolelist;
		$data['selectedRole'] = $selectedRole;
		
		$this->load->view('admin-st/settings/settings-st', $data);
		}

//SETTING KRS AKTIF
	public function setKrs($id)
	{
		//Set aktif KRS
		$where = array('id_setkrs' => $id);
		$data = array('status' => 1);

		$this->db->update('set_krs', $data, $where);
		$this->session->set_flashdata(
	        'pesan',
	        '<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data
				<strong class="green">
					KRS berhasil di Aktikkan!
				</strong>
			</div>'
	      );
	      redirect('admin/settings');
	}

//SETTING KRS NON-AKTIF
	public function setKrsN($id)
	{
		//Set aktif KRS
		$where = array('id_setkrs' => $id);
		$data = array('status' => 0);

		$this->db->update('set_krs', $data, $where);
		$this->session->set_flashdata(
	        'pesan',
	        '<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check danger"></i>

				Data
				<strong class="red">
					KRS berhasil di Non-aktifkan!
				</strong>
			</div>'
	      );
	      redirect('admin/settings');
	}
public function AddUsers()
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
        $this->form_validation->set_rules('username', 'Username Pengguna', 'required');
        $this->form_validation->set_rules('role', 'Role Pengguna', 'required');
        // Tambahkan aturan validasi lainnya sesuai kebutuhan

        // Jalankan validasi
        if ($this->form_validation->run() == FALSE) {
            // Validasi gagal, kirim respon error
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
            return;
        }

        // Formulir valid, lakukan penyimpanan data
     	$data = array(
			'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
			'role' => $this->input->post('role'),
			'tgl_insert'	=> date('y-m-d')
		);

        // Simpan data ke database
        $this->MahasiswaModel->insertData('users', $data);

        // Kirim respon sukses
        echo json_encode(['status' => 'success', 'message' => 'Data Tahun Akademik berhasil disimpan']);
    } else {
        // Jika metode bukan POST, kirim respon error
        echo json_encode(['status' => 'error', 'message' => 'Invalid Request Method']);
    }
}
public function UpdateUsers (){
	if (!$this->input->is_ajax_request()) {
        show_404();
    }

    $idUser = $this->input->post('id');
    $username = $this->input->post('username');
    $email = $this->input->post('email');
    $role = $this->input->post('role');
	$password = md5($this->input->post('password'), PASSWORD_DEFAULT);
    // Validation if needed

    // Check if the password is empty, set a default password
   
    // Update data Users
    $data = array(
        'id' 			=> $idUser,
        'username' 		=> $username,
        'email'			=> $email,
		'role'			=> $role,
        'password' 		=> $password,
	
    );

    // Validate CSRF token
    if ($this->input->post($this->security->get_csrf_token_name()) !== $this->security->get_csrf_hash()) {
        echo json_encode(['status' => 'error', 'message' => 'CSRF Token Mismatch']);
        return;
    }

    // Update the data in the database
    $result = $this->MahasiswaModel->updateData('users', $data, ['id' => $idUser]);

    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Data User updated successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update data User ']);
    }
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
        $this->form_validation->set_rules('ta', 'Tahun Akademik', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        // Tambahkan aturan validasi lainnya sesuai kebutuhan

        // Jalankan validasi
        if ($this->form_validation->run() == FALSE) {
            // Validasi gagal, kirim respon error
            echo json_encode(['status' => 'error', 'message' => validation_errors()]);
            return;
        }

        // Formulir valid, lakukan penyimpanan data
     	$data = array(
			'ta'		 	=> htmlspecialchars($this->input->post('ta')),
			'semester'		=> htmlspecialchars($this->input->post('semester')),
			'tgl_insert'	=> date('y-m-d')
		);

        // Simpan data ke database
        $this->MahasiswaModel->insertData('ta', $data);

        // Kirim respon sukses
        echo json_encode(['status' => 'success', 'message' => 'Data Tahun Akademik berhasil disimpan']);
    } else {
        // Jika metode bukan POST, kirim respon error
        echo json_encode(['status' => 'error', 'message' => 'Invalid Request Method']);
    }
}


public function updateStatus()
{
    // Periksa apakah metode yang digunakan adalah POST
    if ($this->input->server('REQUEST_METHOD') === 'POST') {
        // Periksa apakah CSRF token valid
        if (!$this->security->csrf_verify()) {
            // CSRF token tidak valid
            echo json_encode(['status' => 'error', 'message' => 'CSRF Token Mismatch']);
            return;
        }
    
            $id_ta = $this->input->post('id_ta');
            // Perbarui status ta
            $this->MahasiswaModel->updateStatusTa($id_ta);

        echo json_encode(['status' => 'success', 'message' => 'Status berhasil diperbarui']);
    } else {
        // Jika metode bukan POST, kirim respon error
        echo json_encode(['status' => 'error', 'message' => 'Invalid Request Method']);
    }
}

//DELETE TAHUN AKADEMIK
		public function delete()
		{
			$idTa = $this->input->post('id_ta');
		
			$result = $this->MahasiswaModel->deleteData('ta', array('id_ta' => $idTa));
			if ($result) {
				echo json_encode(array('status' => 'success'));
			} else {
				echo json_encode(array('status' => 'error'));
			}
		}	
		public function set_all_status_zero()
		{
		
			$this->MahasiswaModel->set_all_status_zero();
			$this->session->set_flashdata('pesan', 'Semua status berhasil direset.');
				
				// Output untuk AJAX
				$response['success'] = true;
				$response['message'] = 'Semua status berhasil direset.';
				echo json_encode($response);
		}
				
}