<?php

class KrsModel extends CI_Model
{

	//Get Data Mahasiswa
	public function getDataMhs()
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->join('dosen', 'dosen.id_dosen = mahasiswa.id_dosen', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = mahasiswa.kd_jurusan', 'left');
		$this->db->where('mahasiswa.nim', $this->session->userdata('username'));
		$query = $this->db->get()->row_array();
		return $query;
	}
	//get data dosen
	public function getDataDosen()
	{
		$this->db->select('*');
		$this->db->from('dosen');
		$this->db->join('mahasiswa', 'mahasiswa.id_dosen = dosen.id_dosen', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = dosen.kd_jurusan', 'left');
		$this->db->where('dosen.kd_dosen', $this->session->userdata('username'));
		$query = $this->db->get()->row_array();
		return $query;
	}
	public function getDataMhs2()
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->join('dosen', 'dosen.id_dosen = mahasiswa.id_dosen', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = mahasiswa.kd_jurusan', 'left');
		$this->db->where('mahasiswa.nim', $this->session->userdata('username'));
		$query = $this->db->get();
		return $query;
	}


	public function getDosen()
	{

		$this->db->select('*');
		$this->db->from('dosen');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = dosen.kode_jurusan', 'left');
		$this->db->where('dosen.id_dosen', $this->session->userdata('username'));
		$query = $this->db->get()->row_array();
		return $query;
	}

	public function getMhs()

	{
		$this->db->select('*');
		$this->db->from('mahasiswa');

		$this->db->join('jurusan', 'jurusan.kd_jurusan = mahasiswa.kd_jurusan', 'left');
		$this->db->where('id_dosen', $this->session->userdata('username'));
		$query = $this->db->get()->row_array();
		return $query;
	}



	//Get Data KRS for Mahasiswa from table matakuliah
	public function getMatkul_KRS($kd_jurusan)
	{
		$this->db->select('*');
		$this->db->from('kurikulum');
		$this->db->join('matakuliah', 'matakuliah.kd_mk = kurikulum.kd_mk', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = kurikulum.kd_jurusan', 'left');
		//$this->db->where('id_ta', $id_ta);
		$this->db->where('kurikulum.kd_jurusan', $kd_jurusan);
		$this->db->order_by('id_kurikulum', 'ASC');
		$query = $this->db->get()->result();
		return $query;
	}

	//Add Data KRS for Mahasiswa
	public function addKrs($data)
	{
		$this->db->insert('krs', $data);
	}

	//view KRS yang sudah dipilih mahasiswa
	public function viewKrs($id_mahasiswa, $id_ta)
	{
		$this->db->select('*');
		$this->db->from('krs');
		$this->db->join('kurikulum', 'kurikulum.id_kurikulum = krs.id_kurikulum', 'left');
		$this->db->join('matakuliah', 'matakuliah.kd_mk = kurikulum.kd_mk', 'left');
		$this->db->join('dosen', 'dosen.id_dosen = kurikulum.id_dosen', 'left');
		// $this->db->join('dosen', 'dosen.kd_dosen = kurikulum.kd_dosen', 'left');
		$this->db->join('ta', 'ta.id_ta = krs.id_ta', 'left');
		//$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa', 'left');
		$this->db->where('id_mahasiswa', $id_mahasiswa);
		$this->db->where('krs.id_ta', $id_ta);
			$this->db->order_by('id_krs', 'ASC');
		$query = $this->db->get()->result();
		return $query;
	}
	public function viewMhs($id_dosen)
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->join('krs', 'krs.id_mahasiswa = krs.id_mahasiswa', 'left');
		// $this->db->join('dosen', 'dosen.id_dosen = kurikulum.id_dosen', 'left');
		//$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa', 'left');
		$this->db->where('id_dosen', $id_dosen);
		$this->db->order_by('sks', 'DESC');
		$query = $this->db->get()->result();
		return $query;
	}
	public function verDsn($id_dosen)
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = mahasiswa.kd_jurusan', 'left');
		//$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa', 'left');
		$this->db->where('id_dosen', $id_dosen);
	
		$query = $this->db->get()->result();
		return $query;
	}

	public function viewAll($id_mahasiswa)
	{
		$this->db->select('*');
		$this->db->from('krs');
		$this->db->join('kurikulum', 'kurikulum.id_kurikulum = krs.id_kurikulum', 'left');
		$this->db->join('matakuliah', 'matakuliah.kd_mk = kurikulum.kd_mk', 'left');
		$this->db->join('ta', 'ta.id_ta = krs.id_ta', 'left');
		//$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa', 'left');
		$this->db->where('id_mahasiswa', $id_mahasiswa);
		//$this->db->where('krs.id_ta', $id_ta);
		$query = $this->db->get()->result();
		return $query;
	}


	// SELECT nim, nama_mhs, status_verfikasi,id_kurikulum from mahasiswa INNER JOIN krs ON 
	// mahasiswa.id_mahasiswa=krs.id_mahasiswa WHERE id_dosen=2 AND status_verfikasi="Belum Verfikasi"
	//get datadosen
	// public function getDataDosen()
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('mahasiswa');
	// 	$this->db->join('jurusan', 'jurusan.kd_jurusan = mahasiswa.kd_jurusan', 'left');
	// 	$this->db->where('mahasiswa.id_dosen', $this->session->userdata('username'));
	// 	$query = $this->db->get()->row_array();
	// 	return $query;
	// }



	// public function getKrs()
	// {
	// 	$data = "SELECT *FROM krs WHERE id_krs = 97";
	// 	return $this->db->query($data);
	// }


	//view data krs berdasarkan sesi login
	// public function sesiKRS()
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('mahasiswa');
	// 	$this->db->where('nim',  $this->session->userdata('username'));
	// 	$query = $this->db->get()->row_array();
	// 	return $query;
	// }



}
