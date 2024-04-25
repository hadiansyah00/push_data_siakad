<?php

class JadwaluasModel extends CI_Model
{

		public function getAll($id)
	{
		$this->db->select('*');
		$this->db->from('jadwal_uas');
		$this->db->join('ta', 'ta.id_ta = jadwal_uas.id_ta', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = jadwal_uas.kd_jurusan', 'left');
// 		$this->db->join('dosen', 'dosen.id_dosen = jadwal_uas.id_dosen', 'left');
		$this->db->join('matakuliah', 'matakuliah.kd_mk = jadwal_uas.kd_mk', 'left');
		$this->db->where('jadwal_uas.kd_jurusan', $id);
		$this->db->where('ta.status','1');
		$this->db->order_by('smt', 'ASC');
		$query = $this->db->get();
		return $query;
	}

	public function getMatkul($id)
	{
		$this->db->select('*');
		$this->db->from('matakuliah');
		$this->db->where('matakuliah.kd_jurusan', $id);
		$this->db->order_by('smt', 'ASC');
		$query = $this->db->get();
		return $query;
	}

	// public function getMatkul()
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('matakuliah');
	// 	$this->db->order_by('smt', 'ASC');
	// 	$query = $this->db->get();
	// 	return $query;
	// }
	public function getJadwalUASByTaAktif() {

    $this->db->select('*');
    $this->db->from('jadwal_uas');
    $this->db->join('ta', 'ta.id_ta = jadwal_uas.id_ta', 'left');
    $this->db->join('jurusan', 'jurusan.kd_jurusan = jadwal_uas.kd_jurusan', 'left');
    $this->db->join('matakuliah', 'matakuliah.kd_mk = jadwal_uas.kd_mk', 'left');
    $this->db->where('ta.status', 1); // Memastikan tahun akademik aktif
    $this->db->order_by('smt', 'ASC');
    $this->db->order_by('tgl_uas', 'ASC');
    $this->db->order_by('id_jadwal', 'ASC');
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

	//TAMPIL PER-SEMESTER
	public function getSemester1()
	{
		$data = "SELECT 
				jadwal_uas.id_jadwal,
				jadwal_uas.semester,
		
				jadwal_uas.jam_uas,
				jadwal_uas.ruang_uas,
				jadwal_uas.tgl_uas,
				jadwal_uas.tgl_insert,
				jadwal_uas.tgl_update,
				jurusan.jurusan,
				matakuliah.matakuliah,
				dosen.nama_dosen
				FROM
				jadwal_uas
				INNER JOIN jurusan ON jurusan.kd_jurusan = jadwal_uas.kd_jurusan
				INNER JOIN dosen ON dosen.id_dosen = jadwal_uas.id_dosen
				INNER JOIN matakuliah ON matakuliah.kd_mk = jadwal_uas.kd_mk
				WHERE jadwal_uas.semester = 1";
		return $this->db->query($data);
	}

	public function getSemester2()
	{
		$data = "SELECT 
				jadwal_uas.id_jadwal,
				jadwal_uas.semester,
		
				jadwal_uas.jam_uas,
				jadwal_uas.ruang_uas,
				jadwal_uas.tgl_uas,
				jadwal_uas.tgl_insert,
				jadwal_uas.tgl_update,
				jurusan.jurusan,
				matakuliah.matakuliah,
				dosen.nama_dosen
				FROM
				jadwal_uas
				INNER JOIN jurusan ON jurusan.kd_jurusan = jadwal_uas.kd_jurusan
				INNER JOIN dosen ON dosen.id_dosen = jadwal_uas.id_dosen
				INNER JOIN matakuliah ON matakuliah.kd_mk = jadwal_uas.kd_mk
				WHERE jadwal_uas.semester = 2";
		return $this->db->query($data);
	}

	public function getSemester3()
	{
		$data = "SELECT 
				jadwal_uas.id_jadwal,
				jadwal_uas.semester,
	
				jadwal_uas.jam_uas,
				jadwal_uas.ruang_uas,
				jadwal_uas.tgl_uas,
				jadwal_uas.tgl_insert,
				jadwal_uas.tgl_update,
				jurusan.jurusan,
				matakuliah.matakuliah,
				dosen.nama_dosen
				FROM
				jadwal_uas
				INNER JOIN jurusan ON jurusan.kd_jurusan = jadwal_uas.kd_jurusan
				INNER JOIN dosen ON dosen.id_dosen = jadwal_uas.id_dosen
				INNER JOIN matakuliah ON matakuliah.kd_mk = jadwal_uas.kd_mk
				WHERE jadwal_uas.semester = 3";
		return $this->db->query($data);
	}


	// tampil jadwal dihalaman mahasiswa
	public function viewJadwaluas($id_mahasiswa, $id_ta)
	{
		$this->db->select('*');
		$this->db->from('jadwal_uas');
		$this->db->join('dosen', 'dosen.id_dosen = jadwal_uas.id_dosen', 'left');
		$this->db->join('matakuliah', 'matakuliah.kd_mk = jadwal_uas.kd_mk', 'left');
		$this->db->join('ta', 'ta.id_ta = krs.id_ta', 'left');
		//$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa', 'left');
	
		$this->db->where('id_mahasiswa', $id_mahasiswa);
		$this->db->where('krs.id_ta', $id_ta);
		$this->db->order_by('smt', 'ASC');
		$this->db->order_by('tgl_uas', 'ASC');
		$query = $this->db->get()->result();
		return $query;
	}

	public function getMatkul_KRS($kd_jurusan)
	{
	    $this->db->select('*');
		$this->db->from('jadwal_uas');
		$this->db->join('ta', 'ta.id_ta = jadwal_uas.id_ta', 'left');
		$this->db->join('matakuliah', 'matakuliah.kd_mk = jadwal_uas.kd_mk', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = jadwal_uas.kd_jurusan', 'left');
		$this->db->where('jadwal_uas.kelas', 1);
		$this->db->where('ta.status', '1');
		$this->db->where('jadwal_uas.kd_jurusan', $kd_jurusan);
		$this->db->order_by('smt', 'ASC');
		$this->db->order_by('tgl_uas', 'ASC');
		$this->db->order_by('id_jadwal', 'ASC');
		$query = $this->db->get()->result();
		return $query;
	}
		public function getMatkul_karyawan($kd_jurusan)
	{
		$this->db->select('*');
		$this->db->from('jadwal_uas');
		$this->db->join('ta', 'ta.id_ta = jadwal_uas.id_ta', 'left');
		$this->db->join('matakuliah', 'matakuliah.kd_mk = jadwal_uas.kd_mk', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = jadwal_uas.kd_jurusan', 'left');
		$this->db->where('jadwal_uas.kelas', 2);
		$this->db->where('jadwal_uas.kd_jurusan', $kd_jurusan);
		$this->db->order_by('smt', 'ASC');
		$this->db->order_by('tgl_uas', 'ASC');
		$this->db->order_by('id_jadwal', 'ASC');
		$query = $this->db->get()->result();
		return $query;
	}

	
		public function getWhere($table, $where)
	{
		return $this->db->get_where($table, $where);
	}
	 public function delete_data($id_jadwal) {
        // Lakukan penghapusan data dari database
        $this->db->where('id_jadwal', $id_jadwal);
        $delete = $this->db->delete('jadwal_uas');

        // Mengembalikan status penghapusan
        return $delete;
    }
	

}
