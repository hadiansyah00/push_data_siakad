<?php

class MahasiswaModel extends CI_Model
{

	public function getData()
	{

		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = mahasiswa.kd_jurusan', 'left');
		$this->db->join('dosen', 'dosen.id_dosen = mahasiswa.id_dosen', 'left');
		$this->db->order_by('mahasiswa.nim', 'ASC');
		$query = $this->db->get();
		return $query;
	}

	public function getMhsDidik($id_dosen)
	{

     
    	$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->join('dosen', 'dosen.id_dosen = mahasiswa.id_dosen','LEFT');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = dosen.kd_jurusan','LEFT');
		$this->db->where('mahasiswa.id_dosen', $id_dosen);
		$this->db->where('mahasiswa.status_mhs','aktif');
		$query = $this->db->get()->result();
		return $query;
	}


   
	public function getMhsId($where)
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = mahasiswa.kd_jurusan', 'left');
		$this->db->join('dosen', 'dosen.id_dosen = mahasiswa.id_dosen', 'left');
		$this->db->where('mahasiswa.kd_jurusan', $where);
		$query = $this->db->get();
		return $query;
	}

	public function mhsId($id_mhs)
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->join('jurusan', 'mahasiswa.kd_jurusan = jurusan.kd_jurusan', 'left');
		$this->db->join('dosen', 'dosen.id_dosen = mahasiswa.id_dosen', 'left');
		$this->db->where('mahasiswa.id_mahasiswa', $id_mhs);
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
	public function getDataKrs($table)
	{
		//return $this->db->get($table);
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->order_by('id_mahasiswa', 'DESC');
		$query = $this->db->get();
		return $query;
	}
	public function getAktif()
	{
		$data = "SELECT *FROM mahasiswa WHERE status = 1";
		return $this->db->query($data);
	}

	public function getAktifKrs()
	{
		$data = "SELECT *FROM mahasiswa WHERE status = 0";
		return $this->db->query($data);
	}
	public function detilData($table, $where)
	{
		return $this->db->get_where($table, $where);
	}
	public function jumlahMhs()
	{
	$this->db->where('status_mhs','tidak');
	$query = $this->db->get('mahasiswa');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
	}
	
	public function jumlahAktifMhs()
	{
	$this->db->where('status_mhs','aktif');
	$query = $this->db->get('mahasiswa');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
	}
		public function gizi()
	{
		$this->db->where('status_mhs','aktif');
	$this->db->where('kd_jurusan','13211');
	$query = $this->db->get('mahasiswa');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
	}
		public function bidan()
	{
	$this->db->where('status_mhs','aktif');
	$this->db->where('kd_jurusan','15401');
	$query = $this->db->get('mahasiswa');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
	}
		public function farmasi()
	{
	$this->db->where('status_mhs','aktif');
	$this->db->where('kd_jurusan','48201');
	$query = $this->db->get('mahasiswa');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
	}
	
	public function hitungJumlah()
{
   $this->db->select_sum('angsuran');
   $query = $this->db->get('pembayaran');
   if($query->num_rows()>0)
   {
     return $query->row()->angsuran;
   }
   else
   {
     return 0;
   }
}

	public function hitungTotal()
{
   $this->db->select_sum('total');
   $query = $this->db->get('mahasiswa');
   if($query->num_rows()>0)
   {
     return $query->row()->total;
   }
   else
   {
     return 0;
   }
}


}
