<?php

class Auth_ds extends CI_Controller
{

	public function index()
	{
		$this->load->view('auth_login_dosen-st');
		// $this->load->view('login_baak');
		//    $this->ModelSecurity->getCsrf();
		$this->load->library('form_validation');
	
	
		

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
    $this->form_validation->set_rules('login', 'Username or Email', 'required', ['required' => 'Username or Email is required']);
    $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password is required']);

    if ($this->form_validation->run() == FALSE) {
        // Validasi form gagal, tampilkan kembali halaman login dengan pesan error
        $this->load->view('auth_login_dosen-st');
    } else {
        // Validasi form berhasil
        $login = $this->input->post('login', TRUE); // Bisa berupa username atau email
        $password = $this->input->post('password', TRUE);

        $response = [];

        // Cek login ke database
        $user = $this->UserModel->getUserByLogin($login);

        if ($user && password_verify($password, $user->password_ds)) {
            // Jika login berhasil, set session
            $this->session->set_userdata('username', $user->kd_dosen);
            $this->session->set_userdata('sess_nama', $user->nama_dosen);

            // Sertakan token CSRF dalam respons
            $response = ['status' => 'success', 'redirect' => 'dosen/home', 'csrf_token' => $this->security->get_csrf_hash()];
        } else {
            // Jika login gagal, kirim pesan error
            $response = ['status' => 'error', 'message' => 'Invalid username, email or password.'];
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
		redirect('dosen');
		
	}
}