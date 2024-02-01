<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matakuliah extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Data Matakuliah SBH';
		$data['judul'] = 'Master';
		$data['subJudul'] = 'Matakuliah';
		$data['jurusan'] = $this->JurusanModel->getData('jurusan')->result();
		// $this->load->view('admin/template/header', $data);
		// $this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin-st/matakuliah/tambah-matkul-st', $data);
		// $this->load->view('admin/template/footer');
	}

	public function detil($id)
	{
		$data['title'] = 'Data Kurikulum SBH';
		$data['judul'] = 'Master';
		$data['subJudul'] = 'Detil Kurikulum';

		$where = array('kd_jurusan' => $id);
		$data['detil'] = $this->JurusanModel->detilData('jurusan', $where)->result();
		$data['matkul'] = $this->MatkulModel->getData($id);
		//$data['matkul'] = $this->db->get_where('matakuliah',$where)->result();
		// $this->load->view('admin/template/header', $data);
		// $this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin-st/matakuliah/view_matkul-st', $data);
		// $this->load->view('admin/template/footer');
	}

	public function insertMatkul($kd_jurusan)
	{
		$smt = $this->input->post('smt');
		if ($smt == 1) {
			$s = "Ganjil";
		} elseif ($smt == 3) {
			$s = "Ganjil";
		} elseif ($smt == 5) {
			$s = "Ganjil";
		} elseif ($smt == 7) {
			$s = "Ganjil";
		} elseif ($smt == 9) {
			$s = "Ganjil";
		} else {
			$s = "Genap";
		}
		$semester = $s;

		$data = array(
			'kd_mk'				=> htmlspecialchars($this->input->post('kd_mk')),
            'kd_jurusan'		=> htmlspecialchars($this->input->post('jurusan')),
			'matakuliah'		=> htmlspecialchars($this->input->post('matakuliah')),
			'mk_pilihan'        => htmlspecialchars($this->input->post('mk_pilihan')),
			'sks'				=> htmlspecialchars($this->input->post('sks')),
			'semester'			=> $semester,
			'smt' 				=> $smt,
			'tgl_insert'		=> date('y-m-d')
		);

		//var_dump($data);
		$this->MatkulModel->insertData('matakuliah', $data);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data
				<strong class="green">
					Matakuliah
				</strong>Berhasi di input!
			</div>'
		);
		redirect('admin/Matakuliah/detil/' . $kd_jurusan);
	}

	// public function tambahMatkul()
	// {
	// 	$data['judul'] = 'Akademik';
	// 	$data['subJudul'] = 'Tambah Matakuliah';
	// 	$data['jurusan'] = $this->MatkulModel->getJurusan()->result();
	// 	$this->load->view('admin/template/header');
	// 	$this->load->view('admin/template/sidebar', $data);
	// 	$this->load->view('admin/matakuliah/tambah-matkul', $data);
	// 	$this->load->view('admin/template/footer');
	// }

	// public function simpan()
	// {
	// 	$key['kd_mk']	= $this->input->post('kd_mk');
	// 	$data['kd_mk']	= $this->input->post('kd_mk');
	// 	$data['kd_jurusan']	= $this->input->post('jurusan');
	// 	$data['matakuliah']	= $this->input->post('matakuliah');
	// 	$data['sks']	= $this->input->post('sks');
	// 	$data['smt']	= $this->input->post('smt');
	// 	$data['aktif']	= $this->input->post('aktif');

	// 	$query = $this->db->get_where('matakuliah',$key);
	// 	if($query->num_rows()>0){
	// 		$this->db->update('matakuliah',$key,$data);
	// 		echo "Data berhasil diupdate";
	// 	}else{
	// 		$this->db->insert('matakuliah',$data);
	// 		echo "Data berhasil di masukan";
	// 	}
	// }

	public function update($id)
	{
		$data['title'] = 'Update Data Matakuliah SBH';
		$data['judul'] = 'Master';
		$data['subJudul'] = 'Update Matakuliah';
		$where = array('kd_mk' => $id);
		
		$data['mk'] = $this->db->get_where('matakuliah', $where)->result();
		$this->load->view('admin/template/header', $data);
		$this->load->view('admin/template/sidebar', $data);
		$this->load->view('admin/matakuliah/update', $data);
		$this->load->view('admin/template/footer');
	}

	public  function updateAksi($kd_jurusan)
	{
		$id = $this->input->post('kd_mk');

		$smt = $this->input->post('smt');
		if ($smt == 1) {
			$s = "Ganjil";
		} elseif ($smt == 3) {
			$s = "Ganjil";
		} elseif ($smt == 5) {
			$s = "Ganjil";
		} elseif ($smt == 7) {
			$s = "Ganjil";
		} elseif ($smt == 9) {
			$s = "Ganjil";
		} else {
			$s = "Genap";
		}
		$semester = $s;
		$data = array(
// 			'kd_mk'	    	    => htmlspecialchars($this->input->post('kd_mk')),
			'matakuliah'		=> htmlspecialchars($this->input->post('matakuliah')),
			'sks'				=> htmlspecialchars($this->input->post('sks')),
			'mk_pilihan'        => htmlspecialchars($this->input->post('mk_pilihan')),
			'semester'			=> $semester,
			'smt'				=> $smt,
			'tgl_update'		=> date('y-m-d')
		);

		$where = array('kd_mk' => $id);
		//var_dump($data);
		$this->db->update('matakuliah', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data Matakuliah Berhasi di 
				<strong class="green">
					Update!
				</strong>
			</div>'
		);
		redirect('admin/Matakuliah/detil/' . $kd_jurusan);
	}

	public function delete($id)
	{
		$where = array('kd_mk' => $id);

		$this->db->delete('matakuliah', $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check red"></i>

				Data Matakuliah Berhasi di 
				<strong class="red">
					Hapus!
				</strong>
			</div>'
		);
		redirect($_SERVER['HTTP_REFERER']);
	}
}