<?php

class JurusanModel extends CI_Model
{

	public function getData($table)
	{   
		$this->db->order_by('jurusan', 'ASC');
		$query = $this->db->get($table);
		return $query;
	}
		public function getData2($table)
	{   
	    $this->db->where('kd_jurusan','15401');
		$this->db->order_by('jurusan', 'ASC');
		$query = $this->db->get($table);
		return $query;
	}


	public function detilData($table, $where)
	{
		return $this->db->get_where($table, $where);
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