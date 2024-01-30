<?php

class ModelSecurity extends CI_Model {

	public function getSecurity()
{
    // Periksa apakah sesi pengguna masih aktif
    $username = $this->session->userdata('username');
    if (empty($username)) {
        // Jika sesi tidak aktif, arahkan ke halaman login
        redirect('auth');
    }

    // Periksa apakah cookie ada
    if ($this->input->cookie('user_data')) {
        // Cookie ditemukan, lanjutkan dengan pemrosesan data pengguna
        $user_data = json_decode($this->input->cookie('user_data'), true);
        // Lakukan validasi atau tindakan lain sesuai kebutuhan
    } else {
        // Redirect ke halaman login jika cookie tidak ditemukan
        redirect('auth');
    }
}

	public function getCsrf(){
		if ($this->input->post($this->security->get_csrf_token_name()) !== $this->security->get_csrf_hash()) {
            // CSRF token tidak valid, handle sesuai kebutuhan
            echo "CSRF Token Mismatch";
            return;
        }
	}
}