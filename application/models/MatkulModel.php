<?php

class MatkulModel extends CI_Model
{

	//JOIN TABLE DENGAN SINTAK QUERY SQL
	public function getData($id)
	{
		$this->db->select('*');
		$this->db->from('matakuliah');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = matakuliah.kd_jurusan', 'left');
		$this->db->where('matakuliah.kd_jurusan', $id);
		$this->db->order_by('smt', 'ASC');
		$query = $this->db->get()->result();
		return $query;
	}
	public function getMk()
	{
		$this->db->select('*');
		$this->db->from('matakuliah');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = matakuliah.kd_jurusan', 'left');
		// $this->db->where('matakuliah.kd_jurusan');

		$query = $this->db->get()->result();
		return $query;
	}

	// public function allData($table, $where)
	// {
	// }

	public function getMatkul()
	{
		$this->db->order_by('smt', 'ASC');
		$query = $this->db->get('matakuliah');
		return $query;
	}

	public function getJurusan()
	{
		$this->db->order_by('jurusan', 'ASC');
		$query = $this->db->get('jurusan');
		return $query;
	}

	//GET TABLE DOSEN
	public function getDosen()
	{
		$this->db->order_by('nama_dosen', 'ASC');
		$query = $this->db->get('dosen');
		return $query;
	}
	public function getDosen2()
	{
		$this->db->order_by('nama_dosen', 'ASC');
		$query = $this->db->get('dosen');
		return $query;
	}
	public function getKoor()
	{
		$this->db->order_by('nama_dosen', 'ASC');
		$query = $this->db->get('dosen');
		return $query;
	}

	//Insert Data
	public function insertData($table, $data)
	{
		$this->db->insert($table, $data);
	}
	public function getWhere($table, $where)
	{
		return $this->db->get_where($table, $where);
	}
}
