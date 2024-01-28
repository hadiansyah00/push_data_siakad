<?php
defined('BASEPATH') or exit('No direct script access allowed');


// Aktivasi KRS Mahasiswa

class B1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	// public function index()
	// {
	// 	$data['title'] = 'Data Mahasiswa SBH';
	// 	$data['judul'] = 'Master';
	// 	$data['subJudul'] = 'Mahasiswa';
	// 	$data['mahasiswa'] = $this->MahasiswaModel->getData()->result();
	// 	$this->load->view('bauk/template/header', $data);
	// 	$this->load->view('bauk/template/sidebar', $data);
	// 	$this->load->view('bauk/mahasiswa/mahasiswa', $data);
	// 	$this->load->view('bauk/template/footer');
	// }

	//lihat detil mahasiswa..//belum data detil tidak tampil!
	// public function view_mhs($id_mhs)
	// {

	// 	$data['title'] = 'Detail View Mahasiswa SBH';
	// 	$data['judul'] = 'Master';
	// 	$data['subJudul'] = 'Detail Mahasiswa';

	// 	//$where = array('id_mahasiswa' => $id_mahasiswa);
	// 	//var_dump($where);die();

	// 	$data['mhs'] = $this->MahasiswaModel->mhsId($id_mhs)->row_array();
	// 	$data['mhs'] = $this->MahasiswaModel->mhsId($id_mhs)->row_array();
	// 	//$data['mahasiswa'] = $this->MahasiswaModel->getMhsId($where)->result();
	// 	$this->load->view('bauk/template/header', $data);
	// 	$this->load->view('bauk/template/sidebar', $data);
	// 	$this->load->view('bauk/mahasiswa/view_mhs', $data);
	// 	$this->load->view('bauk/template/footer');
	// }

	public function index()
	{
		$data['title'] = 'Aktivasi KRS';
		$data['judul'] = 'Aktivasi KRS - Mahasiswa';
		$data['subJudul'] = '';
		$data['mhs']         = $this->MahasiswaModel->getDataKrs('mahasiswa')->result();
	
		$data['mh'] = $this->MahasiswaModel->getAktifKrs()->row_array();
		$data['status_krs'] = $this->db->get('mahasiswa')->row_array();
        $data['jadwal'] = $this->JadwaluapModel->getDataUap($id)->result();
		
		$this->load->view('bauk/template/header', $data);
		$this->load->view('bauk/template/sidebar', $data);
		$this->load->view('bauk/mahasiswa/mahasiswa', $data);
		$this->load->view('bauk/template/footer');
	}

	//SETTING KRS AKTIF
	public function setKrs($id)
	{
		//Set aktif KRS


		$where = array('id_mahasiswa' => $id);
		$data = array('status' => 1);

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
					KRS berhasil di Aktikkan!
				</strong>
			</div>'
		);
		redirect('bauk/B1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab');
	}

	//SETTING KRS NON-AKTIF
	public function setKrsN($id)
	{
		//Set aktif KRS


		$where = array('id_mahasiswa' => $id);
		$data = array('status' => 0);

		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check danger"></i>

				Data
				<strong class="red">
					KRS berhasil di Non-aktifkan!
				</strong>
			</div>'
		);
		redirect('bauk/B1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab');
	}


	//SETTING UTS AKTIF
	public function setUts($id)
	{
		//Set aktif KRS


		$where = array('id_mahasiswa' => $id);
		$data = array('status_uts' => 1);

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
					UTS berhasil di Aktikkan!
				</strong>
			</div>'
		);
		redirect('bauk/B1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab');
	}

	//SETTING UTS NON-AKTIF
	public function setUtsn($id)
	{
		//Set aktif KRS


		$where = array('id_mahasiswa' => $id);
		$data = array('status_uts' => 0);

		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check danger"></i>

				Data
				<strong class="red">
					UTS berhasil di Non-aktifkan!
				</strong>
			</div>'
		);
		redirect('bauk/B1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab');
	}

	//SETTING UAS AKTIF
	public function setUas($id)
	{
		//Set aktif KRS


		$where = array('id_mahasiswa' => $id);
		$data = array('status_uas' => 1);

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
					UAS berhasil di Aktikkan!
				</strong>
			</div>'
		);
		redirect('bauk/B1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab');
	}

	//SETTING KRS NON-AKTIF
	public function setUasn($id)
	{
		//Set aktif KRS


		$where = array('id_mahasiswa' => $id);
		$data = array('status_uas' => 0);

		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check danger"></i>

				Data
				<strong class="red">
					UAS berhasil di Non-aktifkan!
				</strong>
			</div>'
		);
		redirect('bauk/B1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab');
	}

	public function setNilaiUts($id)
	{
		//Set nilai UTS	
		//setting aktif Nilai UTS
		$where = array('id_mahasiswa' => $id);
		$data = array('status_nilai_uts' => 1);

		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check danger"></i>

				Data
				<strong class="red">
					Nilai UTS berhasil di Non-aktifkan!
				</strong>
			</div>'
		);
		redirect('bauk/B1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab');
	}


	public function setNilaiUtsn($id)
	{
		//Set nilai UTS
		//setting non-aktif Nilai UTS

		$where = array('id_mahasiswa' => $id);
		$data = array('status_nilai_uts' => 0);

		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
					<button type="button" class="close" data-dismiss="alert">
						<i class="ace-icon fa fa-times"></i>
					</button>
	
					<i class="ace-icon fa fa-check danger"></i>
	
					Data
					<strong class="red">
						Nilai UTS berhasil di Non-aktifkan!
					</strong>
				</div>'
		);
		redirect('bauk/B1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab');
	}
	public function setNilaiUas($id)
	{
		//Set nilai UAS


		$where = array('id_mahasiswa' => $id);
		$data = array('status_nilai_uas' => 1);

		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check danger"></i>

				Data
				<strong class="red">
					Nilai UAS berhasil di Non-aktifkan!
				</strong>
			</div>'
		);
		redirect('bauk/B1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab');
	}
	public function setNilaiUasn($id)
	{
		//Set nilai UAS


		$where = array('id_mahasiswa' => $id);
		$data = array('status_nilai_uas' => 0);

		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check danger"></i>

				Data
				<strong class="red">
					Nilai UAS berhasil di Non-aktifkan!
				</strong>
			</div>'
		);
		redirect('bauk/B1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab');
	}
	
	public function setNilaiKhs($id)
	
	{
		//Set nilai KHS
		$where = array('id_mahasiswa' => $id);
		$data = array('status_nilai_khs' => 1);

		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check danger"></i>

				Data
				<strong class="red">
					KHS berhasil di Non-aktifkan!
				</strong>
			</div>'
		);
		redirect('bauk/B1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab');
	}

	public function setNilaiKhsn($id)
	{
		//Set nilai KHS


		$where = array('id_mahasiswa' => $id);
		$data = array('status_nilai_khs' => 0);

		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check danger"></i>

				Data
				<strong class="red">
					KHS berhasil di Non-aktifkan!
				</strong>
			</div>'
		);
		redirect('bauk/B1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab');
	}
    
    public function setUap($id)
	
	{
		//Set nilai KHS
		$where = array('id_mahasiswa' => $id);
		$data = array('status_uap' => 1);

		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check danger"></i>

				Data
				<strong class="red">
					KHS berhasil di Non-aktifkan!
				</strong>
			</div>'
		);
		redirect('bauk/Aktivasi_uap');
	}

    public function setUapN($id)
	{
		//Set nilai KHS
		$where = array('id_mahasiswa' => $id);
		$data = array('status_uap' => 0);

		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check danger"></i>

				Data
				<strong class="red">
					KHS berhasil di Non-aktifkan!
				</strong>
			</div>'
		);
		redirect('bauk/Aktivasi_uap');
	}
	
	public function setpraUap($id)
	
	{
		//Set nilai KHS
		$where = array('id_mahasiswa' => $id);
		$data = array('status_pra_uap' => 1);

		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check danger"></i>

				Data
				<strong class="red">
					KHS berhasil di Non-aktifkan!
				</strong>
			</div>'
		);
		redirect('bauk/Aktivasi_uap');
	}

    public function setpraUapN($id)
	{
		//Set nilai KHS
		$where = array('id_mahasiswa' => $id);
		$data = array('status_pra_uap' => 0);

		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-danger">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check danger"></i>

				Data
				<strong class="red">
					KHS berhasil di Non-aktifkan!
				</strong>
			</div>'
		);
		redirect('bauk/Aktivasi_uap');
	}
    
	//TAHUN AKADEMIK INSERT
	// public function insert()
	// {
	// 	$data = array(
	// 		'ta'		 	=> htmlspecialchars($this->input->post('ta')),
	// 		'semester'		=> htmlspecialchars($this->input->post('semester')),
	// 		'tgl_insert'	=> date('y-m-d')
	// 	);

	// 	$this->TaModel->insertData('ta', $data);
	// 	$this->session->set_flashdata(
	// 		'pesan1',
	// 		'<div class="alert alert-block alert-success">
	// 			<button type="button" class="close" data-dismiss="alert">
	// 				<i class="ace-icon fa fa-times"></i>
	// 			</button>

	// 			<i class="ace-icon fa fa-check green"></i>

	// 			Data
	// 			<strong class="green">
	// 				Tahun Akademik
	// 			</strong>Berhasi di input!
	// 		</div>'
	// 	);
	// 	redirect('admin/settings');
	// }

	//SET TAHUN AKADEMIK AKTIF
	// public function setTa($id)
	// {
	// 	//reset status tahun akademik
	// 	$status = array('status' => 0);
	// 	$this->db->update('ta', $status);

	// 	//Set aktif tahun akademik
	// 	$where = array('id_ta' => $id);
	// 	$data = array('status' => 1);

	// 	$this->db->update('ta', $data, $where);
	// 	$this->session->set_flashdata(
	// 		'pesan1',
	// 		'<div class="alert alert-block alert-success">
	// 			<button type="button" class="close" data-dismiss="alert">
	// 				<i class="ace-icon fa fa-times"></i>
	// 			</button>

	// 			<i class="ace-icon fa fa-check green"></i>

	// 			Data
	// 			<strong class="green">
	// 				Tahun Akademik Telah Aktif!
	// 			</strong>
	// 		</div>'
	// 	);
	// 	redirect('admin/settings');
	// }

	// //DELETE TAHUN AKADEMIK
	// public function delete($id)
	// {
	// 	$where = array('id_ta' => $id);

	// 	$this->db->delete('ta', $where);
	// 	$this->session->set_flashdata(
	// 		'pesan1',
	// 		'<div class="alert alert-block alert-danger">
	// 			<button type="button" class="close" data-dismiss="alert">
	// 				<i class="ace-icon fa fa-times"></i>
	// 			</button>

	// 			<i class="ace-icon fa fa-check red"></i>

	// 			Data Tahun Akademik Berhasi di 
	// 			<strong class="red">
	// 				Hapus!
	// 			</strong>
	// 		</div>'
	// 	);
	// 	redirect('admin/settings');
	// }


	// //UNHIDE BTN DELETE
	// public function setUnhide($id)
	// {
	// 	//Set unhide btn del
	// 	$where = array('id_setkrs' => $id);
	// 	$data = array('hide_btn_del' => 1);

	// 	$this->db->update('set_krs', $data, $where);
	// 	$this->session->set_flashdata(
	// 		'pesan',
	// 		'<div class="alert alert-block alert-success">
	// 			<button type="button" class="close" data-dismiss="alert">
	// 				<i class="ace-icon fa fa-times"></i>
	// 			</button>

	// 			<i class="ace-icon fa fa-check green"></i>
	// 			<strong class="green">
	// 				Button Delete, Aktif!
	// 			</strong>
	// 		</div>'
	// 	);
	// 	redirect('admin/settings');
	// }

	// //HIDE BTN DELETE
	// public function setHide($id)
	// {
	// 	//Set hide btn del
	// 	$where = array('id_setkrs' => $id);
	// 	$data = array('hide_btn_del' => 0);

	// 	$this->db->update('set_krs', $data, $where);
	// 	$this->session->set_flashdata(
	// 		'pesan',
	// 		'<div class="alert alert-block alert-danger">
	// 			<button type="button" class="close" data-dismiss="alert">
	// 				<i class="ace-icon fa fa-times"></i>
	// 			</button>

	// 			<i class="ace-icon fa fa-check danger"></i>
	// 			<strong class="green">
	// 				Button Delete, Disembunyikan!
	// 			</strong>
	// 		</div>'
	// 	);
	// 	redirect('admin/settings');
	// }


}
