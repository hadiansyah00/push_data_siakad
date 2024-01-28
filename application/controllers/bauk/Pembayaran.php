<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
		$this->load->model('PembayaranModel');
		$this->load->helper('rupiah_helper');
	}

	public function index()
	{
		$data['title'] = ' Pembayaran Mahasiswa SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Input Pembayaran Mahasiswa ';

		$data['tahun'] = $this->TaModel->getAktif()->result();
		$data['mhs'] = $this->MahasiswaModel->getData('mahasiswa')->result();
		$this->load->view('bauk/template/header', $data);
		$this->load->view('bauk/template/sidebar', $data);
		$this->load->view('bauk/mahasiswa/pembayaran', $data);
		$this->load->view('bauk/template/footer');
	}
	
	public function index_pembayaran($id)
	{
		$data['title'] = 'Modul Pembayaran SBH';
		$data['judul'] = 'Input Pembayaran Mahasiswa';
		$data['subJudul'] = 'Transaksi Mahasiswa';

		$where = array('id_mahasiswa' => $id);
// 		$where = 'kd_jurusan';
		$data['tahun'] 		= $this->TaModel->getAktif()->row_array();
	
		$data['detil'] 		= $this->MahasiswaModel->detilData('mahasiswa', $where)->result();
// 		$data['matkul'] 	= $this->KurikulumModel->getMatkul($id)->result();
        $data['mhs'] = $this->db->get_where('mahasiswa', $where)->row_array();
		$data['list'] 	= $this->PembayaranModel->getAll($id)->result();
		$this->load->view('bauk/template/header', $data);
		$this->load->view('bauk/template/sidebar', $data);
		$this->load->view('bauk/mahasiswa/master_pembayaran', $data);
		$this->load->view('bauk/template/footer');
	}
	
	//Insert Data
	public function insertCicilan($id_mahasiswa)
	{
		$ta = $this->TaModel->getAktif()->result();
		foreach ($ta as $t) :
			$a = $t->id_ta;
		endforeach;

		$data = array(
			'id_mahasiswa'		=> $id_mahasiswa,
			'id_ta'				=> $a,
			'tgl_bayar'	    	=> htmlspecialchars($this->input->post('tgl_bayar')),
			'angsuran'			=> htmlspecialchars($this->input->post('angsuran')),
			'smt_pmb'          =>htmlspecialchars($this->input->post('smt_pmb'))
			
		);

		//var_dump($data);
		$this->PembayaranModel->insertData('pembayaran', $data);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data
				<strong class="green">
					Jadwal
				</strong>Berhasi di input!
			</div>'
		);
		redirect('bauk/pembayaran/index_pembayaran/' . $id_mahasiswa);
	}
	
		
		public function insertAwal($id)
	{
	    $id 	= $this->input->post('id_mahasiswa');
		$data = array(
		
// 			'total'		    	=> htmlspecialchars($this->input->post('total')),
			'sisa'		    	=> htmlspecialchars($this->input->post('sisa')),
			'smt_1'		    	=> htmlspecialchars($this->input->post('smt_1')),
			'smt_2'		    	=> htmlspecialchars($this->input->post('smt_2')),
			'smt_3'		    	=> htmlspecialchars($this->input->post('smt_3')),
			'smt_4'		    	=> htmlspecialchars($this->input->post('smt_4')),
			'smt_5'		    	=> htmlspecialchars($this->input->post('smt_5')),
			'smt_6'		    	=> htmlspecialchars($this->input->post('smt_6')),
			'smt_7'		    	=> htmlspecialchars($this->input->post('smt_7')),
			'smt_8'		    	=> htmlspecialchars($this->input->post('smt_8')),
		
		
		);

    	$where = array('id_mahasiswa' => $id);
		//var_dump($data);
		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data
				<strong class="green">
					Jadwal
				</strong>Berhasi di input!
			</div>'
		);
		redirect('bauk/pembayaran/index_pembayaran/' . $id);
	}
	public function delete($id)
	{
		$where = array('id_pmb' => $id);

		$this->db->delete('pembayaran', $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check red"></i>

				Data Jadwal Berhasi di 
				<strong class="red">
					Hapus!
				</strong>
			</div>'
		);
		redirect($_SERVER['HTTP_REFERER']);
	}
}