<?php

class JadwalutsModel extends CI_Model
{

	

	public function getJadwalUTSByTaAktif() {

    $this->db->select('*');
    $this->db->from('jadwal_uts');
    $this->db->join('ta', 'ta.id_ta = jadwal_uts.id_ta', 'left');
    $this->db->join('jurusan', 'jurusan.kd_jurusan = jadwal_uts.kd_jurusan', 'left');
    $this->db->join('matakuliah', 'matakuliah.kd_mk = jadwal_uts.kd_mk', 'left');
    $this->db->where('ta.status', 1); // Memastikan tahun akademik aktif
    $this->db->order_by('smt', 'ASC');
    $this->db->order_by('tgl_uts', 'ASC');
    $this->db->order_by('id_jadwal', 'ASC');
    $query = $this->db->get();
    return $query;
}
    public function delete_data($id_jadwal) {
        // Lakukan penghapusan data dari database
        $this->db->where('id_jadwal', $id_jadwal);
        $delete = $this->db->delete('jadwal_uts');

        // Mengembalikan status penghapusan
        return $delete;
    }

public function getDataProg()
	{
		$this->db->select('*');
		$this->db->from('jadwal_uts');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = jadwal_uts.kd_jurusan', 'left');
		$query = $this->db->get();
		return $query;
	}
	public function getMatkulgz()
	{
		$this->db->select('*');
		$this->db->from('matakuliah');
		$this->db->where('kd_jurusan', 13211);
		$this->db->order_by('smt', 'ASC');
		$query = $this->db->get();
		return $query;
	}
	public function getMatkulfarm()
	{
		$this->db->select('*');
		$this->db->from('matakuliah');
		$this->db->where('kd_jurusan', 48201);
		$this->db->order_by('smt', 'ASC');
		$query = $this->db->get();
		return $query;
	}
	public function getMatkulkb()
	{
		$this->db->select('*');
		$this->db->from('matakuliah');
		$this->db->where('kd_jurusan', 15401);
		$this->db->order_by('smt', 'ASC');
		$query = $this->db->get();
		return $query;
	}
public function Hide_uts(){

    $this->select('kelas_mhs');
    $this->db->from('mahasiswa');
    
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
				jadwal_uts.id_jadwal,
				jadwal_uts.semester,
				jadwal_uts.hari,
				jadwal_uts.jam,
				jadwal_uts.ruangan,
				jadwal_uts.tgl_uts,
			    	jadwal_uts.ruang_uts,
				jadwal_uts.tgl_insert,
				jadwal_uts.tgl_update,
				jurusan.jurusan,
				matakuliah.matakuliah,
		
				FROM
				jadwal_uts
				INNER JOIN jurusan ON jurusan.kd_jurusan = jadwal_uts.kd_jurusan
		
				INNER JOIN matakuliah ON matakuliah.kd_mk = jadwal_uts.kd_mk
				WHERE jadwal_uts.semester = 1";
		return $this->db->query($data);
	}

	public function getSemester2()
	{
		$data = "SELECT 
				jadwal_uts.id_jadwal,
				jadwal_uts.semester,
				jadwal_uts.hari,
				jadwal_uts.jam,
				jadwal_uts.ruangan,
				jadwal_uts.ruang_uts,
				jadwal_uts.tgl_uts,
	
				jadwal_uts.tgl_insert,
				jadwal_uts.tgl_update,
				jurusan.jurusan,
				matakuliah.matakuliah,

				FROM
				jadwal_uts
				INNER JOIN jurusan ON jurusan.kd_jurusan = jadwal_uts.kd_jurusan
	
				INNER JOIN matakuliah ON matakuliah.kd_mk = jadwal_uts.kd_mk
				WHERE jadwal_uts.semester = 2";
		return $this->db->query($data);
	}

	public function getSemester3()
	{
		$data = "SELECT 
				jadwal_uts.id_jadwal,
				jadwal_uts.semester,
				jadwal_uts.hari,
				jadwal_uts.jam,
				jadwal_uts.ruangan,
				jadwal_uts.tgl_uts,
		        jadwal_uts.ruang_uts,
				jadwal_uts.tgl_insert,
				jadwal_uts.tgl_update,
				jurusan.jurusan,
				matakuliah.matakuliah,
			
				FROM
				jadwal_uts
				INNER JOIN jurusan ON jurusan.kd_jurusan = jadwal_uts.kd_jurusan
			
				INNER JOIN matakuliah ON matakuliah.kd_mk = jadwal_uts.kd_mk
				WHERE jadwal_uts.semester = 3";
		return $this->db->query($data);
	}


	// tampil jadwal dihalaman mahasiswa
	public function viewJadwaluts($id_mahasiswa, $id_ta)
	{
		$this->db->select('*');
		$this->db->from('jadwal_uts');
// 		$this->db->join('dosen', 'dosen.id_dosen = jadwal_uts.id_dosen', 'left');
		$this->db->join('matakuliah', 'matakuliah.kd_mk = jadwal_uts.kd_mk', 'left');
		$this->db->join('ta', 'ta.id_ta = krs.id_ta', 'left');
		//$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa', 'left');
	
		$this->db->where('id_mahasiswa', $id_mahasiswa);
		$this->db->where('krs.id_ta', $id_ta);
		$this->db->order_by('tgl_uts', 'ASC');
		$query = $this->db->get()->result();
		return $query;
	}

	public function getMatkul_KRS($kd_jurusan)
	{
		
		$this->db->select('*');
		$this->db->from('jadwal_uts');
		$this->db->join('ta', 'ta.id_ta = jadwal_uts.id_ta', 'left');
		$this->db->join('matakuliah', 'matakuliah.kd_mk = jadwal_uts.kd_mk', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = jadwal_uts.kd_jurusan', 'left');
		$this->db->where('jadwal_uts.kelas', '1');
		$this->db->where('jadwal_uts.kd_jurusan', $kd_jurusan);
		$this->db->order_by('smt', 'ASC');
		$this->db->order_by('tgl_uts', 'ASC');
		$this->db->order_by('id_jadwal', 'ASC');
		$query = $this->db->get()->result();
		return $query;
	}
		public function getMatkul_karyawan($kd_jurusan)
	{
		$this->db->select('*');
		$this->db->from('jadwal_uts');
		$this->db->join('ta', 'ta.id_ta = jadwal_uts.id_ta', 'left');
		$this->db->join('matakuliah', 'matakuliah.kd_mk = jadwal_uts.kd_mk', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = jadwal_uts.kd_jurusan', 'left');
		$this->db->where('jadwal_uts.kelas', '2');
		$this->db->where('jadwal_uts.kd_jurusan', $kd_jurusan);
		$this->db->order_by('smt', 'ASC');
		$this->db->order_by('tgl_uts', 'ASC');
		$this->db->order_by('id_jadwal', 'ASC');
		$query = $this->db->get()->result();
		return $query;
	}

}