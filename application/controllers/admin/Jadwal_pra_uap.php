<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_pra_uap extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Jadwal PRA UAP SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Jadwal Uas';

		$data['tahun'] = $this->TaModel->getAktif()->result();
		$data['jurusan'] = $this->JurusanModel->getData2('jurusan')->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/jadwal_pra_uap/jadwal_pra_uap', $data);
		$this->load->view('admin/template/footer');
	}

    public function index_jadwal2($id)
	{
		$data['title'] = 'Jadwal PRA UAP SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Jadwal PRA UAP';

		$where = array('kd_jurusan' => $id);
		//$where = 'kd_jurusan';
		$data['tahun'] = $this->TaModel->getAktif()->row_array();
		$data['detil'] = $this->JurusanModel->detilData('jurusan', $where)->result();
		$data['matkul'] = $this->JadwaluasModel->getMatkul($id)->result();
		$data['jadwal'] = $this->JadwaluapModel->getDataPra($id)->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/jadwal_pra_uap/master_jadwal_pra_uap', $data);
		$this->load->view('admin/template/footer');
	}

	public function insert($kd_jurusan)
	{
		$ta = $this->TaModel->getAktif()->result();
		foreach ($ta as $t) :
			$a = $t->id_ta;
		endforeach;
		$data = array(
			'kd_jurusan'		=> $kd_jurusan,
			'id_ta'				=> $a,
		    'nama_pra_uap'				=> htmlspecialchars($this->input->post('nama_pra_uap')),
			'jam_pra_uap'			=> htmlspecialchars($this->input->post('jam_pra_uap')),
			'tanggal_pra_uap'	    => htmlspecialchars($this->input->post('tanggal_pra_uap')),
		);

		//var_dump($data);
		$this->JadwaluapModel->insertData('jadwal_pra_uap', $data);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data
				<strong class="green">
					Jadwal PRA UAP
				</strong>Berhasi di input!
			</div>'
		);
		redirect($_SERVER['HTTP_REFERER']);
	}


	public function update($id)
	{
		$data['title'] = 'Update Data Jawdal UAS SBH';
		$data['judul'] = 'Akademik';
		$data['subJudul'] = 'Update Jadwal UAS';
		
		$where = array('id_jadwal' => $id);
	
// 		$where = array('id_jadwal' => $id);
		$data['jadwal'] = $this->db->get_where('jadwal_uas', $where)->result();

		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/jadwal_uas/update_uas', $data);
		$this->load->view('admin/template/footer');
	}

	public  function updateAksi()
	{
	    
		$id = $this->input->post('id_jadwal');
		$data = array(
// 	        'kd_jurusan'		=> $kd_jurusan,
// 			'kd_mk'				=> htmlspecialchars($this->input->post('matkul')),
// 			'hari_uas'			=> htmlspecialchars($this->input->post('hari_uas')),
            'kelas'				=> htmlspecialchars($this->input->post('kelas')),
			'jam_uas'			=> htmlspecialchars($this->input->post('jam_uas')),
			'ruang_uas'			=> htmlspecialchars($this->input->post('ruang_uas')),
			'tgl_uas'			=> htmlspecialchars($this->input->post('tgl_uas')),
			'tgl_update'        =>  date('y-m-d')
		);

		$where = array('id_jadwal' => $id);
		//var_dump($data);
		$this->db->update('jadwal_uas', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>
				<i class="ace-icon fa fa-check green"></i>
				Jadwal Berhasil 
				<strong class="green">
					di Update!
				</strong>
			</div>'
		);
	redirect('admin/Jadwaluas');
	}

	public function delete($id)
	{
		$where = array('id' => $id);

		$this->db->delete('jadwal_pra_uap', $where);
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