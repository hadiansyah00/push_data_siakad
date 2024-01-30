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

	
public function getLogin_dosen()
{
    // Validate CSRF token
    if ($this->input->post($this->security->get_csrf_token_name()) !== $this->security->get_csrf_hash()) {
        // CSRF token tidak valid, handle sesuai kebutuhan
        echo json_encode(['status' => 'error', 'message' => 'CSRF Token Mismatch']);
        return;
    }

    $this->form_validation->set_rules('username', 'Username', 'required', ['required' => 'Kode Dosen wajib diisi']);
    $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib diisi']);

    if ($this->form_validation->run() == FALSE) {
        $this->load->view('auth_login_dosen-st');
    } else {
        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        $pass = md5($password);

        $response = [];

        // Proceed with login
        $cek_mhs = $this->UserModel->loginDosen($username, $pass);

        if ($cek_dsn) {
            $this->session->set_userdata('level', 'dosen');
            $this->session->set_userdata('username', $cek_dsn->kd_dosen);
            $this->session->set_userdata('sess_nama', $cek_dsn->nama_dosen);

            // Include CSRF token in the response
            $response = ['status' => 'success', 'redirect' => 'dosenold/home', 'csrf_token' => $this->security->get_csrf_hash()];
        } else {
            $response = ['status' => 'error', 'message' => 'Cek Username / Password'];
        }

        echo json_encode($response);
    }
}



	// else{
	//       $this->session->set_flashdata(
	//         'pesan',
	//         'Username Atau Password Anda Salah!'
	//       );
	//       redirect('auth');
	//     }


	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Auth_ds');
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
}