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

}

	public function getCsrf(){
		if ($this->input->post($this->security->get_csrf_token_name()) !== $this->security->get_csrf_hash()) {
            // CSRF token tidak valid, handle sesuai kebutuhan
            echo "CSRF Token Mismatch";
            return;
        }
	}
}
