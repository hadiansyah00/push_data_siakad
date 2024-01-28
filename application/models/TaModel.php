<?php

class TaModel extends CI_Model {

	public function getData($table)
	{
		//return $this->db->get($table);
		$this->db->select('*');
		$this->db->from('ta');
		$this->db->order_by('id_ta', 'DESC');
		$query = $this->db->get();
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

	//get jadwal kuliah berdasarkan tahun akademik aktif
	public function getAktif()
	{
		$data = "SELECT *FROM ta WHERE status = 1";
		return $this->db->query($data);
	}

	public function getAktifKrs()
	{
		$data = "SELECT *FROM ta WHERE status = 1";
		return $this->db->query($data);
	}
	public function getMk()
	{
		$data = "SELECT *FROM matakuliah WHERE mk_pilihan = 1";
		return $this->db->query($data);
	}
    	public function getMk_2()
	{
		$data = "SELECT *FROM matakuliah WHERE mk_pilihan = 0";
		return $this->db->query($data);
	}

	//ambil seluruh matakuliah
	public function getTa()
	{
		$data = "SELECT * FROM ta WHERE semester = 'Ganjil'";
		return $this->db->query($data);
		//return $this->db->get('ta');
	}
	public function getTaa()
	{
		$data = "SELECT * FROM ta WHERE semester = 'Ganjil'";
		return $this->db->query($data);
		//return $this->db->get('ta');
	}
}
