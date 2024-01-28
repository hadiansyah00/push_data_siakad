<?php
class RpsModel extends CI_Model
{

	public function getData()
	{

		$this->db->select('*');
		$this->db->from('jadwal_pdf');
		$this->db->join('ta', 'ta.id_ta = jadwal_pdf.id_ta', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = jadwal_pdf.kd_jurusan', 'left');

	
		$query = $this->db->get()->result();
		return $query;
	}
	public function insertData($table, $data)
	{
		$this->db->insert($table, $data);
	}
	public function getWhere($table, $where)
	{
		return $this->db->get_where($table, $where);
	}
	public function getRps($kd_jurusan)
	{
		$this->db->select('*');
		$this->db->from('tb_berkas');
		$this->db->join('ta', 'ta.id_ta = tb_berkas.id_ta', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = tb_berkas.kd_jurusan', 'left');
		$this->db->join('dosen', 'dosen.id_dosen = tb_berkas.id_dosen', 'left');
		// $this->db->join('matakuliah', 'matakuliah.kd_mk = tb_berkas.kd_mk', 'left');
		$this->db->where('tb_berkas.kd_jurusan', $kd_jurusan);
		// $this->db->order_by('kd_berkas', 'ASC');
		$query = $this->db->get()->result();
		return $query;
	}
}
