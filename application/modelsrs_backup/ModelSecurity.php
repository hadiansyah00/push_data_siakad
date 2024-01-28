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
}