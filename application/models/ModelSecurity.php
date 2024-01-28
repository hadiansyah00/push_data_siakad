<?php

class ModelSecurity extends CI_Model {

	public function getSecurity()
	{
		$username = $this->session->userdata('username');
		if(empty($username)){
			$this->session->sess_destroy();
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