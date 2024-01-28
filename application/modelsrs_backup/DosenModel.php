<?php

class DosenModel extends CI_Model
{
	public function getData()
	{

		$this->db->select('*');
		$this->db->from('dosen');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = dosen.kd_jurusan', 'left');
		$query = $this->db->get();
		return $query;
	}


	// 	public function getData($table)
	// 	{
	// 		$this->db->order_by('nama_dosen', 'ASC');

	// 		$query = $this->db->get($table);
	// 		return $query;
	// 	}



	public function getDosenId($where)
	{
		$this->db->select('*');
		$this->db->from('dosen');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = mahasiswa.kd_jurusan', 'left');
		$this->db->join('mahasiswa', 'mahasiswa.id_dosen = dosen.id_dosen', 'left');
		$this->db->where('mahasiswa.kd_jurusan', $where);
		$query = $this->db->get();
		return $query;
	}

	public function dsnId($id_dosen)
	{
		$this->db->select('*');
		$this->db->from('dosen');
		$this->db->join('jurusan', 'mahasiswa.kd_jurusan = jurusan.kd_jurusan', 'left');
		$this->db->join('mahasiswa', 'mahasiswa.id_dosen = dosen.id_dosen', 'left');
		$this->db->where('dosen.id_dosen', $id_dosen);
		$query = $this->db->get();
		return $query;
	}



	public function getJurusan()
	{
		$this->db->order_by('jurusan', 'ASC');
		$query = $this->db->get('jurusan');
		return $query;
	}
	public function insertData($data, $table)
	{
		$this->db->insert($data, $table);
	}

	public function getWhere($table, $where)
	{
		return $this->db->get_where($table, $where);
	}
}
