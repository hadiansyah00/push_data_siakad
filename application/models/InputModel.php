<?php

class InputModel extends CI_Model
{

	//Get Data Mahasiswa
	public function getMatkul($id)
	{
		$this->db->select('*');
		$this->db->from('krs');
		$this->db->join('kurikulum', 'kurikulum.id_kurikulum = krs.id_kurikulum', 'left');
		$this->db->join('matakuliah', 'matakuliah.kd_mk = kurikulum.kd_mk', 'left');
		$this->db->where('kurikulum.kd_mk', $id);
		$query = $this->db->get()->row_array();
		return $query;
	}
}
