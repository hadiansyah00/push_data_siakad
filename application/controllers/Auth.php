<?php

class Auth extends CI_Controller
{

	public function index()
	{
		$this->load->view('auth_login-st');
		// $this->load->view('login_baak');
		//    $this->ModelSecurity->getCsrf();
		$this->load->library('form_validation');
	
		

	}
	public function dosen()
	{
		$this->load->view('auth_login_dosen-st');
		// $this->load->view('login_baak');
		//    $this->ModelSecurity->getCsrf();
		$this->load->library('form_validation');
	
		

	}
	public function forgotPass()
	{
		$this->load->view('forgot_password');
		// $this->load->view('login_baak');
		//    $this->ModelSecurity->getCsrf();
		$this->load->library('form_validation');
	
		

	}

	public function forgot_password() {
		 // Periksa apakah request merupakan AJAX dan CSRF token valid
		 if (!$this->input->is_ajax_request() || !$this->input->post($this->security->get_csrf_token_name())) {
			show_404(); // Tampilkan halaman 404 jika bukan request AJAX atau token CSRF tidak valid
		}
		
		// Ambil email dari input form
		$email = $this->input->post('email');
	
		// Periksa apakah email ada dalam database mahasiswa
		$mahasiswa = $this->db->get_where('mahasiswa', ['email' => $email])->row_array();
		if (!$mahasiswa) {
			// Email tidak ditemukan dalam database, kirimkan pesan error
			$response['status'] = 'error';
			$response['message'] = 'Email not found.';
			header('Content-Type: application/json');
			echo json_encode($response);
			return;
		}
	
		// Buat token unik untuk reset password
		$token = bin2hex(random_bytes(32)); // Generate 32-byte token
	
		// Simpan token ke database
		$data = [
			'email' => $email,
			'token' => $token,
			'created_at' => date('Y-m-d H:i:s')
		];
		$this->db->insert('password_reset_tokens', $data);
	
		// Konfigurasi email
		$config = [
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'protocol' => 'smtp',
			'smtp_host' => 'smtp.gmail.com', // atau SMTP lainnya                
			'smtp_user' => 'pmb@sbh.ac.id',  // Email admin aplikasi
			'smtp_pass' => 'oordqaidwyefpwyt',  // Password Gmail atau Sandi Aplikasi Gmail
			'smtp_crypto' => 'ssl',
			'smtp_port' => 465,
			'crlf' => "\r\n",
			'newline' => "\r\n"
		];
	
		// Inisialisasi library email dengan konfigurasi
		$this->load->library('email', $config);
	
		// Set pengirim email
		$this->email->from('pmb@sbh.ac.id', 'Reset Password SIAKAD SBH');
	
		// Set penerima email
		$this->email->to($email);
	
		// Set subject email
		$this->email->subject('Reset Password');
	
		// Set isi pesan email
	$message = '<p>Klik tombol di bawah ini untuk melakukan Reset Password:</p>';
	$message .= '<p><a href="' . base_url('auth/reset_password?token=' . $token) . '"><button class="btn btn-sm-primary">Reset Password</button></a></p>';
	$this->email->message($message);
	
		// Kirim email
		if ($this->email->send()) {
			// Jika email berhasil dikirim
			$response['status'] = 'success';
			$response['message'] = 'Reset password instructions sent to your email.';
		} else {
			// Jika email gagal dikirim
			$response['status'] = 'error';
			$response['message'] = 'Failed to send reset password instructions.';
		}
	
		// Kembalikan respons dalam format JSON
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	public function reset_password()
    {
        $token = $this->input->get('token');
        if (!$token) {
            show_404();
        }
		$resetData = $this->MahasiswaModel->getResetData($token);
		$email = $resetData['email'];
		$data['test'] = $this->db->get_where('password_reset_tokens', ['token' => $token])->row_array();
		$data['mahasiswa'] = $this->MahasiswaModel->getMahasiswaByEmail($email);
        $token_data = $this->MahasiswaModel->check_reset_token($token);

        if (!$token_data) {
            // Token tidak valid, alihkan ke halaman lain atau tampilkan pesan error
            redirect('auth');
        }

        // Token valid, tampilkan halaman ganti password
        $this->load->view('change_password', $data,['token' => $token]);
    }

	public function update_password()
	{
		// Ambil data dari form
		$token = $this->input->post('token');
		$new_password = $this->input->post('new_password');
		$confirm_password = $this->input->post('confirm_password');
	
		// Validasi bahwa password baru dan konfirmasi password sesuai
		if ($new_password !== $confirm_password) {
			// Jika tidak sesuai, kirim respon JSON dengan status error
			$response['status'] = 'error';
			$response['message'] = 'New password and confirm password do not match.';
			echo json_encode($response);
			return;
		}
	
		// Cari data reset password berdasarkan token
		$resetData = $this->MahasiswaModel->getResetData($token);
	
		// Periksa apakah data reset password ditemukan
		if (!$resetData) {
			$response['status'] = 'error';
			$response['message'] = 'Token not found.';
			echo json_encode($response);
			return;
		}
	
		// Ambil email dari data reset password
		$email = $resetData['email'];
		// Cari data mahasiswa berdasarkan email
		$mahasiswa = $this->db->get_where('mahasiswa', ['email' => $email])->row_array();
	
		// Periksa apakah data mahasiswa ditemukan
		if (!$mahasiswa) {
			$response['status'] = 'error';
			$response['message'] = 'Mahasiswa not found.';
			echo json_encode($response);
			return;
		}
	
		// Perbarui password mahasiswa
		$this->db->set('password', password_hash($new_password, PASSWORD_DEFAULT));
		$this->db->where('id_mahasiswa', $mahasiswa['id_mahasiswa']);
		$update_result = $this->db->update('mahasiswa');
	
		// Hapus token reset password dari database
		$this->db->delete('password_reset_tokens', ['token' => $token]);
	
		if ($update_result) {
			// Jika berhasil mengupdate password, kirim respon JSON dengan status success
			$response['status'] = 'success';
			$response['message'] = 'Password successfully updated.';
			echo json_encode($response);
		} else {
			// Jika gagal mengupdate password, kirim respon JSON dengan status error
			$response['status'] = 'error';
			$response['message'] = 'Failed to update password.';
			echo json_encode($response);
		}
	}
	


	public function getLogin()
{
    // Validate CSRF token
    if ($this->input->post($this->security->get_csrf_token_name()) !== $this->security->get_csrf_hash()) {
        // CSRF token tidak valid, handle sesuai kebutuhan
        echo json_encode(['status' => 'error', 'message' => 'CSRF Token Mismatch']);
        return;
    }

    $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'NIM wajib diisi']);
    $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib diisi']);

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('auth_login-st');
    } else {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
      
        $response = [];

        // Cek login ke database
        $user = $this->UserModel->getUserByUsernameMahasiswa($username);

        if ($user && password_verify($password, $user->password)) {
            // Jika login berhasil, set session
            $this->session->set_userdata('username', $user->nim);
            $this->session->set_userdata('sess_nama', $user->nama_mhs);
            
            // Perbarui informasi login, tambahkan fungsi updateLoginInfo ke dalam model Anda
            $ip_address = $this->input->ip_address();
            $this->UserModel->updateLoginInfo($user->id_mahasiswa, $ip_address);

            // Include CSRF token in the response
            $response = ['status' => 'success', 'redirect' => 'mhs/home', 'csrf_token' => $this->security->get_csrf_hash()];
        } else {
            $response = ['status' => 'error', 'message' => 'User Name atau Password salah'];
        }

        echo json_encode($response);
    }
}

	
		public function AuthAdmin()
{
    // Validate CSRF token
    if ($this->input->post($this->security->get_csrf_token_name()) !== $this->security->get_csrf_hash()) {
        // CSRF token tidak valid, handle sesuai kebutuhan
        echo json_encode(['status' => 'error', 'message' => 'CSRF Token Mismatch']);
        return;
    }

    // Set rules validasi form
    $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Kode DOSEN wajib diisi']);
    $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib diisi']);

    if ($this->form_validation->run() == FALSE) {
        // Validasi form gagal, tampilkan kembali halaman login dengan pesan error
        $this->load->view('auth_admin-st');
    } else {
        // Validasi form berhasil
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        $response = [];

        // Cek login ke database
        $user = $this->UserModel->getUserByUsernameAdmin($username);

        if ($user && password_verify($password, $user->password)) {
            // Jika login berhasil, set session
            $this->session->set_userdata('username', $user->username);
            $this->session->set_userdata('sess_nama', $user->email);

            // Sertakan token CSRF dalam respons
            $response = ['status' => 'success', 'redirect' => 'admin/dashboard', 'csrf_token' => $this->security->get_csrf_hash()];
        } else {
            // Jika login gagal, kirim pesan error
            $response = ['status' => 'error', 'message' => 'Invalid username or password.'];
        }

        // Kirim respons dalam format JSON
        echo json_encode($response);
    }
}

		public function AuthDosen()
{
    // Validate CSRF token
    if ($this->input->post($this->security->get_csrf_token_name()) !== $this->security->get_csrf_hash()) {
        // CSRF token tidak valid, handle sesuai kebutuhan
        echo json_encode(['status' => 'error', 'message' => 'CSRF Token Mismatch']);
        return;
    }

    // Set rules validasi form
    $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Kode DOSEN wajib diisi']);
    $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib diisi']);

    if ($this->form_validation->run() == FALSE) {
        // Validasi form gagal, tampilkan kembali halaman login dengan pesan error
        $this->load->view('auth_login_dosen-st');
    } else {
        // Validasi form berhasil
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        $response = [];

        // Cek login ke database
        $user = $this->UserModel->getUserByUsername($username);

        if ($user && password_verify($password, $user->password)) {
            // Jika login berhasil, set session
            $this->session->set_userdata('username', $user->kd_dosen);
            $this->session->set_userdata('sess_nama', $user->nama_dosen);

            // Sertakan token CSRF dalam respons
            $response = ['status' => 'success', 'redirect' => 'dosen/home', 'csrf_token' => $this->security->get_csrf_hash()];
        } else {
            // Jika login gagal, kirim pesan error
            $response = ['status' => 'error', 'message' => 'Invalid username or password.'];
        }

        // Kirim respons dalam format JSON
        echo json_encode($response);
    }
}

	public function admin()
	{
		$this->load->view('login_baak');
	}
	public function bauk()
	{
		$this->load->view('login_bauk');
	}


	// LOGIN Baak ADMIN
	public function baak()
	{

		$this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username wajib diisi']);
		$this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib diisi']);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		} else {
			$level = $this->input->post('level', TRUE);
			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);

			//$level_admin = $this->db->get('users')->row_array();

			$pass = md5($password);

			if ($level == 'admin_akademik') {
				$cek_user = $this->UserModel->loginSuper($username, $pass);
				if ($cek_user) {
					//jika data cocok dgn database
					$this->session->set_userdata('username', $cek_user->username);
					//$this->session->set_userdata('username', $cek_user->email);

					//login
					return redirect('admin/dashboard');
				} else {
					//jika gagal
					$this->session->set_flashdata(
						'pesan',
						'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-xmark red"></i>

				
				<strong class="red">
					Username Atau Password Salah !!
				</strong>
			</div>'
					);
					return redirect('auth/admin');
				}
			}
		}
	}
	// LOGIN Baak ADMIN
	public function bauk_login()
	{
	$this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Username wajib diisi']);
		$this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib diisi']);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		} else {
			$level = $this->input->post('level', TRUE);
			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);

			//$level_admin = $this->db->get('users')->row_array();

			$pass = md5($password);

			if ($level == 'admin_keu') {
				$cek_user = $this->UserModel->loginBauk($username, $pass);
				if ($cek_user) {
					//jika data cocok dgn database
				 	$this->session->set_userdata('id_users', $cek_user->id);
					$this->session->set_userdata('username', $cek_user->username);
					//$this->session->set_userdata('username', $cek_user->email);

					//login
					return redirect('bauk/db988b75ef9e581094b3793d4e5da08db6f8df2a');
				} else {
					//jika gagal
					$this->session->set_flashdata(
						'pesan',
						'<div class="alert alert-block alert-danger">
					<button type="button" class="close" data-dismiss="alert">
						<i class="ace-icon fa fa-times"></i>
					</button>
	
					<i class="ace-icon fa fa-xmark red"></i>
	
					
					<strong class="red">
						Username Atau Password Salah !!
					</strong>
				</div>'
					);
					return redirect('auth/bauk');
				}
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>

	<i class="ace-icon fa fa-check red"></i>

	
	<strong class="red">
		Anda Berhasil Logout
	</strong>
</div>'
		);
	}
	public function logout_admin()
	{
		$this->session->sess_destroy();
		redirect('boda');
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>

	<i class="ace-icon fa fa-check red"></i>

	
	<strong class="red">
		Anda Berhasil Logout
	</strong>
</div>'
		);
	}
			public function updatePasswordHash($userId) {
			// Validate CSRF token
			if ($this->input->post($this->security->get_csrf_token_name()) !== $this->security->get_csrf_hash()) {
				// CSRF token tidak valid, handle sesuai kebutuhan
				echo json_encode(['status' => 'error', 'message' => 'CSRF Token Mismatch']);
				return;
			}

			// Retrieve user data
			$user = $this->UserModel->getUserById($userId);

			if (!$user) {
				echo json_encode(['status' => 'error', 'message' => 'User not found']);
				return;
			}

			// Update password to hash
			$updated = $this->UserModel->updatePasswordHash($userId);

			if ($updated) {
			echo json_encode(['status' => 'success', 'message' => 'Password updated successfully']);
			} else {
			echo json_encode(['status' => 'error', 'message' => 'Failed to update password']);
			}	
																		
		}

}
