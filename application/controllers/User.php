<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{		
		$this->load->view('mhs/templates/header');
		$this->load->view('mhs/index-mhs');
		$this->load->view('mhs/templates/footer');
	}

	
}