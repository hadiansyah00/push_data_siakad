<?php

class NilaiModel extends CI_Model
{

	public function getMatkul($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	//ambil data mahasiswa berdasarkan id jurusan
	public function getMhs($id)
	{
		$this->db->select('*');
		$this->db->from('krs');
		$this->db->join('ta', 'ta.id_ta = krs.id_ta');
		$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = mahasiswa.kd_jurusan');
		$this->db->where('mahasiswa.kd_jurusan', $id);
		$query = $this->db->get()->result();
		return $query;
	}


	//Get Data Dosen
	public function getDosen()
	{
		$this->db->select('*');
		$this->db->from('dosen');
		$query = $this->db->get();
		return $query;
	}



	//matakuliah yang di ambil oleh mahasiswa from table KRS
	public function inputNilai($id, $id_ta)
	{
		$this->db->select('*');
		$this->db->from('krs');
		$this->db->join('kurikulum', 'kurikulum.id_kurikulum = krs.id_kurikulum', 'left');
		$this->db->join('matakuliah', 'matakuliah.kd_mk = kurikulum.kd_mk', 'left');
		//$this->db->join('dosen', 'dosen.id_dosen = kurikulum.id_dosen', 'left');
		$this->db->join('ta', 'ta.id_ta = krs.id_ta', 'left');
		$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa', 'left');
		$this->db->where('kurikulum.kd_mk', $id);
		$this->db->where('krs.id_ta', $id_ta);
		//$this->db->where('kurikulum.id_dosen', $id_dosen);
		$this->db->order_by('nim', 'ASC');
		$query = $this->db->get()->result();
		return $query;
	}





	//mahasiswa
	public function getAll($id)
	{
		$this->db->select('*');
		$this->db->from('krs');
		$this->db->join('kurikulum', 'kurikulum.id_kurikulum = krs.id_kurikulum', 'left');
		$this->db->join('ta', 'ta.id_ta = kurikulum.id_ta', 'left');
		$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = kurikulum.kd_jurusan', 'left');
		$this->db->join('dosen', 'dosen.id_dosen = kurikulum.id_dosen', 'left');
		$this->db->join('matakuliah', 'matakuliah.kd_mk = kurikulum.kd_mk', 'left');
		$this->db->where('kurikulum.kd_mk', $id);
		$this->db->order_by('smt', 'ASC');
		$query = $this->db->get();
		return $query;
	}
}
