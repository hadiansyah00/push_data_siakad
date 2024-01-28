<?php
class PembayaranModel extends CI_Model
{

	public function getAll($id)
	{
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->join('ta', 'ta.id_ta = pembayaran.id_ta', 'left');
		$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pembayaran.id_mahasiswa', 'left');
		$this->db->where('pembayaran.id_mahasiswa', $id);
		$this->db->order_by('mahasiswa.nim', 'ASC');
		$query = $this->db->get();
		return $query;
	}

	public function getMhs($id)
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->where('mahasiswa.id_mahasiswa', $id);
		$query = $this->db->get();
		return $query;
	}


	public function getJurusan()
	{
		$this->db->order_by('jurusan', 'ASC');
		$query = $this->db->get('jurusan');
		return $query;
	}

	public function getMatakuliah()
	{
		$this->db->order_by('matakuliah', 'ASC');
		$query = $this->db->get('matakuliah');
		return $query;
	}

	//GET TABLE DOSEN
	public function getDosen()
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
	
	public function viewAdm($id_mahasiswa, $id_ta){
	    $this->db->select('*');
		$this->db->from('pembayaran');
		// $this->db->join('dosen', 'dosen.kd_dosen = kurikulum.kd_dosen', 'left');
		$this->db->join('ta', 'ta.id_ta = pembayaran.id_ta', 'left');
		$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = pembayaran.id_mahasiswa', 'left');
		$this->db->where('pembayaran.id_mahasiswa', $id_mahasiswa);
		$this->db->where('pembayaran.id_ta', $id_ta);
		$query = $this->db->get()->result();
		return $query;
	}
}