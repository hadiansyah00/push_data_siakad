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