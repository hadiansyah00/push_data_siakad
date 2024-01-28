<?php

class EdomModel extends CI_Model
{

	//JOIN TABLE DENGAN SINTAK QUERY SQL
	public function getData()
	{
		$this->db->order_by('id_eval', 'ASC');
		$query = $this->db->get('evaluasi');
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

        public function updateStatusEdom($id, $statusEdom) {
        $data = array(
            'status_edom' => $statusEdom
        );

        $this->db->where('id', $id);
        $this->db->update('mahasiswa', $data);
    }
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

	public function getPertanyaan() {
        // Gantilah 'nama_tabel_pertanyaan' dengan nama tabel yang sesuai dalam database Anda
        $this->db->select('id_eval, pertanyaan'); // Pilih kolom yang Anda butuhkan
        $this->db->from('evaluasi'); // Gantilah 'nama_tabel_pertanyaan' dengan nama tabel yang sesuai

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result(); // Mengembalikan hasil query sebagai array objek
        } else {
            return array(); // Jika tidak ada data, mengembalikan array kosong
        }
    }

	 public function getHasilKuesioner($id_krs, $id_dosen) {
        // Lakukan query untuk mengambil data hasil kuesioner EDOM berdasarkan $id_krs dan $id_dosen
        // Misalnya, query SQL untuk mengambil data tersebut

        $this->db->select('*');
        $this->db->from('evaluasi_jawaban');
		$this->db->join('evaluasi', 'evaluasi.id_eval = evaluasi_jawaban.id_eval','left');
        $this->db->where('id_krs', $id_krs);
        $this->db->where('id_dosen', $id_dosen);
        $query = $this->db->get();

        return $query->result(); // Mengembalikan hasil query
    }
	
public function getRataRataByIdKrsDosen($kd_mk, $id_dosen) {
    $this->db->select('evaluasi.id_eval, evaluasi.pertanyaan, AVG(ej.jawaban) as rata_rata, matakuliah.matakuliah, jurusan.jurusan, dosen.nama_dosen, dosen.nidn, ta.semester as semes, ta.ta as tahun_ajaran');
    $this->db->from('evaluasi_jawaban ej');
    $this->db->join('evaluasi', 'evaluasi.id_eval = ej.id_eval', 'left');
    $this->db->join('dosen', 'dosen.id_dosen = ej.id_dosen', 'left');
    $this->db->join('krs k', 'k.id_krs = ej.id_krs', 'left');
    $this->db->join('ta', 'ta.id_ta = ej.id_ta', 'left');
    $this->db->join('kurikulum km', 'km.id_kurikulum = k.id_kurikulum', 'left');
    $this->db->join('matakuliah', 'matakuliah.kd_mk = km.kd_mk', 'left');
    $this->db->join('jurusan', 'jurusan.kd_jurusan = km.kd_jurusan', 'left');
    $this->db->where('ej.kd_mk', $kd_mk);
    $this->db->where('dosen.id_dosen', $id_dosen);
    $this->db->group_by('evaluasi.id_eval');
    $query = $this->db->get();

    return $query->result();
}


    public function getSaran($kd_mk, $id_dosen) {
    
    $this->db->select('*');
    $this->db->from('edom_saran');
	$this->db->join('matakuliah', 'matakuliah.kd_mk = edom_saran.kd_mk', 'left');
    $this->db->join('dosen', 'dosen.id_dosen = edom_saran.id_dosen','left');
    $this->db->where('edom_saran.kd_mk', $kd_mk);
    $this->db->where('edom_saran.id_dosen', $id_dosen);

    $query = $this->db->get();

    return $query->result();
}



	public function countMahasiswaEvaluasi() {
        $this->db->select('COUNT(DISTINCT id_mahasiswa) as total_mahasiswa');
        $this->db->from('evaluasi_jawaban');
        // Tambahkan kondisi sesuai kebutuhan, misalnya berdasarkan semester atau dosen tertentu
        $this->db->where('jawaban IS NOT NULL');
        
        $query = $this->db->get();
        return $query->row()->total_mahasiswa;
    }

	public function countMahasiswaEvaluasi_list() {
        $this->db->select('COUNT(DISTINCT id_mahasiswa) as total_mahasiswa');
		$this->db->join('ta','ta.id_ta = krs.id_ta','left');
        $this->db->from('krs');
        // Tambahkan kondisi sesuai kebutuhan, misalnya berdasarkan semester atau dosen tertentu
        $this->db->where('ta.status', 1);
        
        $query = $this->db->get();
        return $query->row()->total_mahasiswa;
    }
	 public function getDosenInfo($id_dosen) {
        $this->db->select('*');
        $this->db->from('dosen');
        $this->db->where('id_dosen', $id_dosen);
        return $this->db->get()->row();
    }
    
     public function getInfoMk($kd_mk) {
        $this->db->select('*');
        $this->db->from('matakuliah');
        $this->db->where('kd_mk', $kd_mk);
        return $this->db->get()->row();
    }
    
      public function getThn($id_ta) {
        $this->db->select('*');
        $this->db->from('ta');
        $this->db->where('id_ta', $id_ta);
        return $this->db->get()->row();
    }
    
	 public function getEdomData() {
        $this->db->select('status_edom_1,status_edom_2');
       
        return $this->db->get('krs')->row_array();
    }
    
}