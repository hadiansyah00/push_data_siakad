<?php

class MahasiswaModel extends CI_Model
{
	public function updateUserProfile($id_mahasiswa, $data) {
        // Update user profile based on the provided data
        $this->db->where('id_mahasiswa', $id_mahasiswa);
        $this->db->update('mahasiswa', $data);
    }
	  public function deleteData($table, $where)
    {
        // Delete data from the specified table based on the given conditions
        $this->db->where($where);
        $this->db->delete($table);

        // Check if the delete operation was successful
        return ($this->db->affected_rows() > 0);
    }

	public function getData()
	{

		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = mahasiswa.kd_jurusan', 'left');
		$this->db->join('dosen', 'dosen.id_dosen = mahasiswa.id_dosen', 'left');
		$this->db->order_by('mahasiswa.id_mahasiswa', 'DESC');
		$query = $this->db->get();
		return $query;
	}

	public function getMhsDidik($id_dosen)
	{

		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->join('dosen', 'dosen.id_dosen = mahasiswa.id_dosen', 'LEFT');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = dosen.kd_jurusan', 'LEFT');
		$this->db->where('mahasiswa.id_dosen', $id_dosen);
		$this->db->where('mahasiswa.status_mhs', 'aktif');
		$query = $this->db->get()->result();
		return $query;
	}

    public function getMahasiswaById($idMahasiswa) {
        return $this->db->get_where('mahasiswa', array('id_mahasiswa' => $idMahasiswa))->row();
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
	public function updateData($table, $data, $where)
    {
        $this->db->where($where);
        $result = $this->db->update($table, $data);

        return $result;
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

    public function getDataEdom($table)
	{
		//return $this->db->get($table);
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->order_by('id_mahasiswa', 'DESC');
		
		$query = $this->db->get();
		return $query;
	}
	public function getDataBidan()
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->where('kd_jurusan', 15401);
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
		public function totalMhs()
	{
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	public function TotalTidakAktif()
	{
		$this->db->where('status_mhs', 'tidak');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	public function MhsTidakAktif()
	{
		$this->db->where('status_mhs', 'tidak');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
		public function cutiMhs()
	{
		$this->db->where('status_mhs', 'cuti');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
		public function lulusMhs()
	{
		$this->db->where('status_mhs', 'lulus');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	public function jumlahAktifMhs()
	{
		$this->db->where('status_mhs', 'aktif');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	
// 	PRODI KEBIDANAN STATISTIK
		public function bidan_semua()
	{

		$this->db->where('kd_jurusan', '15401');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	
	public function bidan_aktif()
	{
		$this->db->where('status_mhs', 'aktif');
		$this->db->where('kd_jurusan', '15401');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
		public function bidan_lulus()
	{
		$this->db->where('status_mhs', 'lulus');
		$this->db->where('kd_jurusan', '15401');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
		public function bidan_cuti()
	{
		$this->db->where('status_mhs', 'cuti');
		$this->db->where('kd_jurusan', '15401');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
		public function bidan_tidak()
	{
		$this->db->where('status_mhs', 'tidak');
		$this->db->where('kd_jurusan', '15401');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	public function bidan_2019()
	{

		$this->db->where('tahun_masuk', '2019');
		$this->db->where('kd_jurusan', '15401');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	
	public function bidan_2020()
	{

		$this->db->where('tahun_masuk', '2020');
		$this->db->where('kd_jurusan', '15401');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	
	public function bidan_2021()
	{
	
		$this->db->where('tahun_masuk', '2021');
		$this->db->where('kd_jurusan', '15401');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	
	public function bidan_2022()
	{
	
		$this->db->where('tahun_masuk', '2022');
		$this->db->where('kd_jurusan', '15401');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	
	// 	PRODI FARMASI STATISTIK
	public function frm_aktif()
	{
	    $this->db->where('status_mhs', 'aktif');
		$this->db->where('kd_jurusan', '48201');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
		public function frm_lulus()
	{
		$this->db->where('status_mhs', 'lulus');
		$this->db->where('kd_jurusan', '48201');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
		public function frm_cuti()
	{
		$this->db->where('status_mhs', 'cuti');
		$this->db->where('kd_jurusan', '48201');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
		public function frm_ud()
	{
		$this->db->where('status_mhs', 'tidak');
		$this->db->where('kd_jurusan', '48201');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	public function frm_2019()
	{
	
		$this->db->where('tahun_masuk', '2019');
		$this->db->where('kd_jurusan', '48201');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	
	public function frm_2020()
	{
	
		$this->db->where('tahun_masuk', '2020');
		$this->db->where('kd_jurusan', '48201');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	
	public function frm_2021()
	{
	
		$this->db->where('tahun_masuk', '2021');
		$this->db->where('kd_jurusan', '48201');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	
	public function frm_2022()
	{

		$this->db->where('tahun_masuk', '2022');
		$this->db->where('kd_jurusan', '48201');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
		
	public function farmasi_semua()
	{
		$this->db->where('kd_jurusan', '48201');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	
	
	public function farmasi()
	{
		
		$this->db->where('kd_jurusan', '48201');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	
	
		// 	PRODI GIZI STATISTIK
		
	public function gz_aktif()
	{
	    $this->db->where('status_mhs', 'aktif');
		$this->db->where('kd_jurusan', '13211');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
		public function gz_lulus()
	{
		$this->db->where('status_mhs', 'lulus');
		$this->db->where('kd_jurusan', '13211');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
		public function gz_cuti()
	{
		$this->db->where('status_mhs', 'cuti');
		$this->db->where('kd_jurusan', '13211');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
		public function gz_ud()
	{
		$this->db->where('status_mhs', 'tidak');
		$this->db->where('kd_jurusan', '13211');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}

	
	public function gz_2020()
	{
	
		$this->db->where('tahun_masuk', '2020');
		$this->db->where('kd_jurusan', '13211');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	
	public function gz_2021()
	{
	
		$this->db->where('tahun_masuk', '2021');
		$this->db->where('kd_jurusan', '13211');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	
	public function gz_2022()
	{

		$this->db->where('tahun_masuk', '2022');
		$this->db->where('kd_jurusan', '13211');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	
	public function gizi()
	{
		
		$this->db->where('kd_jurusan', '13211');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
		


	public function hitungJumlah()
	{
		$this->db->select_sum('angsuran');
		$query = $this->db->get('pembayaran');
		if ($query->num_rows() > 0) {
			return $query->row()->angsuran;
		} else {
			return 0;
		}
	}

	public function hitungTotal()
	{
		$this->db->select_sum('total');
		$query = $this->db->get('mahasiswa');
		if ($query->num_rows() > 0) {
			return $query->row()->total;
		} else {
			return 0;
		}
	}
}
