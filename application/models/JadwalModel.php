    <?php

class JadwalModel extends CI_Model
{

	//JOIN TABLE DENGAN SINTAK QUERY SQL
	// public function getData($id)
	// {
	// 	$data = "SELECT 
	// 			jadwal.id_jadwal,
	// 			jadwal.semester,
	// 			jadwal.hari,
	// 			jadwal.jam,
	// 			jadwal.ruangan,
	// 			jadwal.tgl_insert,
	// 			jadwal.tgl_update,
	// 			ta.ta,
	// 			jurusan.jurusan,
	// 			matakuliah.matakuliah,
	// 			dosen.nama_dosen
	// 			FROM
	// 			jadwal
	// 			INNER JOIN ta ON ta.id_ta = jadwal.id_ta
	// 			INNER JOIN jurusan ON jurusan.kd_jurusan = jadwal.kd_jurusan
	// 			INNER JOIN dosen ON dosen.id_dosen = jadwal.id_dosen
	// 			INNER JOIN matakuliah ON matakuliah.kd_mk = jadwal.kd_mk
	// 			WHERE jadwal.kd_jurusan = $id
	// 			ORDER BY semester ASC";
	// 	return $this->db->query($data);
	// }
	public function getPdf()
	
	{
		$this->db->select('*');
		$this->db->from('jadwal_pdf');
		$this->db->join('ta', 'ta.id_ta = jadwal_pdf.id_ta', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = jadwal_pdf.kd_jurusan', 'left');
// 		$this->db->order_by('jadwal_pdf', 'ASC');
		$query = $this->db->get()->result();
		return $query;
	}
	
	public function getJadwal($kd_jurusan)
	{
		$this->db->select('*');
		$this->db->from('jadwal');
		$this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen', 'left');
		$this->db->join('matakuliah', 'matakuliah.kd_mk = jadwal.kd_mk', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = jadwal.kd_jurusan', 'left');
		//$this->db->where('id_ta', $id_ta);
		$this->db->where('jadwal.kd_jurusan', $kd_jurusan);
		$this->db->order_by('smt', 'ASC');
		$query = $this->db->get()->result();
		return $query;
	}
	
	public function getAll($id)
	{
		$this->db->select('*');
		$this->db->from('jadwal');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = jadwal.kd_jurusan', 'left');
		$this->db->join('ta', 'ta.id_ta = jadwal.id_ta', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = jadwal.kd_jurusan', 'left');
		$this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen', 'left');
		$this->db->join('matakuliah', 'matakuliah.kd_mk = jadwal.kd_mk', 'left');
		$this->db->where('jadwal.kd_jurusan', $id);
// 		$this->db->order_by('smt', 'ASC');
		$query = $this->db->get();
		return $query;
	}
	public function getData($id)
	{
		$this->db->select('*');
		$this->db->from('jadwal');
		$this->db->join('ta', 'ta.id_ta = jadwal.id_ta', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = jadwal.kd_jurusan', 'left');
		$this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen', 'left');
		$this->db->join('matakuliah', 'matakuliah.kd_mk = jadwal.kd_mk', 'left');
		$this->db->where('jadwal.kd_jurusan', $id);
// 		$this->db->order_by('smt', 'ASC');
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
    public function simpan_data($data)
    {
        // Simpan data ke dalam tabel 'rps'
        $this->db->insert('jadwal_pdf', $data);
    }
    
    public function upload_file($file_field_name, $upload_path)
    {
        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 2048; // Ukuran maksimum dalam kilobyte
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($file_field_name)) {
            // Unggahan berhasil
            $data = $this->upload->data();
            return $data['file_name']; // Mengembalikan nama berkas yang diunggah
        } else {
            // Unggahan gagal, mengembalikan FALSE
            return FALSE;
        }
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
				jadwal.id_jadwal,
				jadwal.semester,
				jadwal.hari,
				jadwal.jam,
				jadwal.ruangan,
				jadwal.tgl_insert,
				jadwal.tgl_update,
				jurusan.jurusan,
				matakuliah.matakuliah,
				dosen.nama_dosen
				FROM
				jadwal
				INNER JOIN jurusan ON jurusan.kd_jurusan = jadwal.kd_jurusan
				INNER JOIN dosen ON dosen.id_dosen = jadwal.id_dosen
				INNER JOIN matakuliah ON matakuliah.kd_mk = jadwal.kd_mk
				WHERE jadwal.semester = 1";
		return $this->db->query($data);
	}

	public function getSemester2()
	{
		$data = "SELECT 
				jadwal.id_jadwal,
				jadwal.semester,
				jadwal.hari,
				jadwal.jam,
				jadwal.ruangan,
				jadwal.tgl_insert,
				jadwal.tgl_update,
				jurusan.jurusan,
				matakuliah.matakuliah,
				dosen.nama_dosen
				FROM
				jadwal
				INNER JOIN jurusan ON jurusan.kd_jurusan = jadwal.kd_jurusan
				INNER JOIN dosen ON dosen.id_dosen = jadwal.id_dosen
				INNER JOIN matakuliah ON matakuliah.kd_mk = jadwal.kd_mk
				WHERE jadwal.semester = 2";
		return $this->db->query($data);
	}

	public function getSemester3()
	{
		$data = "SELECT 
				jadwal.id_jadwal,
				jadwal.semester,
				jadwal.hari,
				jadwal.jam,
				jadwal.ruangan,
				jadwal.tgl_insert,
				jadwal.tgl_update,
				jurusan.jurusan,
				matakuliah.matakuliah,
				dosen.nama_dosen
				FROM
				jadwal
				INNER JOIN jurusan ON jurusan.kd_jurusan = jadwal.kd_jurusan
				INNER JOIN dosen ON dosen.id_dosen = jadwal.id_dosen
				INNER JOIN matakuliah ON matakuliah.kd_mk = jadwal.kd_mk
				WHERE jadwal.semester = 3";
		return $this->db->query($data);
	}


	// tampil jadwal dihalaman mahasiswa
	public function viewJadwal($id_mahasiswa, $id_ta)
	{
		$this->db->select('*');
		$this->db->from('jadwal');
		$this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen', 'left');
		$this->db->join('matakuliah', 'matakuliah.kd_mk = jadwal.kd_mk', 'left');
		$this->db->join('ta', 'ta.id_ta = krs.id_ta', 'left');
		//$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa', 'left');
		$this->db->where('id_mahasiswa', $id_mahasiswa);
		$this->db->where('krs.id_ta', $id_ta);
			$this->db->order_by('smt', 'ASC');
		$query = $this->db->get()->result();
		return $query;
	}
		public function getMatkul_KRS2($kd_jurusan)
	{
		$this->db->select('*');
		$this->db->from('jadwal');
		$this->db->join('matakuliah', 'matakuliah.kd_mk = jadwal.kd_mk', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = jadwal.kd_jurusan', 'left');
		//$this->db->where('id_ta', $id_ta);
		$this->db->where('jadwal.kd_jurusan', $kd_jurusan);
// 		$this->db->order_by('smt', 'ASC');
		$this->db->order_by('tgl_uas', 'ASC');
		$query = $this->db->get()->result();
		return $query;
	}
	
		public function getMatkul_KRS($kd_jurusan)
	{
		$this->db->select('*');
	    $this->db->from('jadwal');
		$this->db->join('dosen', 'dosen.id_dosen = jadwal.id_dosen', 'left');
		$this->db->join('matakuliah', 'matakuliah.kd_mk = jadwal.kd_mk', 'left');
		$this->db->join('ta', 'ta.id_ta = jadwal.id_ta', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = jadwal.kd_jurusan', 'left');
		$this->db->where('jadwal.kd_jurusan', $kd_jurusan);
		$query = $this->db->get()->result();
		return $query;
	}
	
	public function getJadwalPDF($kd_jurusan)
	{
		$this->db->select('*');
	    $this->db->from('jadwal_pdf');
		$this->db->join('ta', 'ta.id_ta = jadwal_pdf.id_ta', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = jadwal_pdf.kd_jurusan', 'left');
		$this->db->where('jadwal_pdf.kd_jurusan', $kd_jurusan);
		$query = $this->db->get()->result();
		return $query;
	}
}
