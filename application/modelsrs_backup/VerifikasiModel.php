<?php

class VerifikasiModel extends CI_Model
{
	//GET TABLE DOSEN
	public function getDs()
	{
		$this->db->order_by('nama_dosen', 'ASC');
		$query = $this->db->get('dosen');
		return $query;
	}
	public function getMh()
	{
		$this->db->order_by('nama_mhs', 'ASC');
		$query = $this->db->get('mahasiswa');
		return $query;
	}
	public function getJurusan()
	{
		$this->db->order_by('jurusan', 'ASC');
		$query = $this->db->get('jurusan');
		return $query;
	}


	public function getAll()
	{
		$id_dosen = $this->session->userdata('username');
		// SELECT nim, nama_mhs, status_verfikasi,id_kurikulum from mahasiswa INNER JOIN krs ON 
		// mahasiswa.id_mahasiswa=krs.id_mahasiswa WHERE id_dosen=2 AND status_verfikasi="Belum Verfikasi"
		// $data = "SELECT 
		// mahasiswa.id_mahasiswa,
		// mahasiswa.nim,
		// mahasiswa.nama_mhs,
		// mahasiswa.kd_jurusan,
		// jurusan.jurusan
		// krs.id_mahasiswa
		// dosen.nama_dosen
		// FROM
		// mahasiswa
		// INNER JOIN krs ON krs.id_mahasiswa = krs.id_mahasiswa
		// INNER JOIN jurusan ON jurusan.kd_jurusan = mahasiswa.kd_jurusan
		// WHERE mahasiswa.id_dosen=$id_dosen and status_verfikasi ='Belum Verfikasi'
		// INNER JOIN dosen on dosen.id.dosen = mahasiswa.id_dosen
		// ORDER BY nim ASC";
		// $data = $this->db->get();
		// return $data;

		// $id_dosen = $this->session->userdata('username');
		// $verKrs = $this->db->query("SELECT 	*
		// 									FROM krs 
		// 									inner join jurusan on jurusan.jurusan=mahasiswa.kd_jurusan
		// 									inner join mahasiswa on mahasiswa.id_mahasiswa=krs.id_mahasiswa
		//  									where krs.id_dosen=$id_dosen
		// 									AND status_verfikasi='Belum Verfikasi' GROUP BY nim");

		// $verKrs = $this->db->get()->result();
		// return $verKrs;


		// $this->db->select('*');
		// $this->db->from('krs');
		// $this->db->from
		// $this->db->join('kurikulum', 'krs.id_kurulum = kurikulum.id_kurikulum');
		// $this->db->join(' mahasiswa', 'krs.id_mahasiswa = mahasiswa.id_mahasiswa');
		// $this->db->where('krs.status_verfikasi', '=', 'Belum Verfikasi');
		// $result = $this->db->get();
		// return $result;
	}

	public function getdsMhs($id_dosen, $stats)
	{


		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->join('dosen', 'dosen.id_dosen = mahasiswa.id_dosen', 'left');
		$this->db->join('krs', 'krs.id_mahasiswa = mahasiswa.id_mahasiswa', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = mahasiswa.kd_jurusan', 'left');
		$this->db->where('id_dosen', $id_dosen);
		$this->db->where('status_verfikasi', $stats);
		$query = $this->db->get('mahasiswa');
		return $query->result();
	}
	// // public function getAll()
	// // {
	// // 	$this->db->from($this->table);
	// // 	$this->db->where("id_dosen", "nama_dosen");
	// // 	$query = $this->db->get();
	// // 	return $query->result();
	// // }
	// public function getMhs()
	// {
	// 	$this->db->order_by('nama_dosen', 'ASC');
	// 	$query = $this->db->get('dosen');
	// 	return $query;
	// }

	// public function getDosen()
	// {
	// 	$this->db->order_by('nama_mhs', 'ASC');
	// 	$query = $this->db->get('mahasiswa');
	// 	return $query->result();
	// }
	// public function viewMhs()
	// {

	// 	$this->db->select('*');
	// 	$this->db->from('mahasiswa');
	// 	$this->db->join('dosen', 'dosen.id_dosen = mahasiswa.id_dosen');
	// 	$this->db->where('mahasiswa.id_dosen', $this->session->userdata('username'));
	// 	$query = $this->db->get()->row_array();
	// 	return $query;
	// }
	// public function ViewKrsDosen()

	// {
	// 	$id_dosen = $this->session->userdata('username');
	// 	$this->db->select('*');
	// 	$this->db->from('mahasiswa');
	// 	$this->db->join('krs', 'krs.id_mahasiswa = mahasiswa.id_krs');
	// 	// $this->db->join('ta', 'ta.id_ta = krs.id_ta', 'left');
	// 	$this->db->join('dosen', 'dosen.id_dosen = mahasiswa.id_dosen');
	// 	$this->db->where('mahasiswa.id_dosen', $id_dosen);
	// 	$this->db->where('krs', 'status_verfikasi', '=', 'Belum Verfikasi');
	// 	$query = $this->db->get()->result();
	// 	return $query;
	// }
	public function insertData($data, $table)
	{
		$this->db->insert($data, $table);
	}
	public function getWhere($table, $where)
	{
		return $this->db->get_where($table, $where);
	}
}
