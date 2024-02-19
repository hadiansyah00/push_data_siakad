<?php

class KurikulumModel extends CI_Model
{

public function getKdJurusanByKdMk($kd_mk)
{
    // Lakukan kueri ke tabel matakuliah untuk mendapatkan kd_jurusan berdasarkan kd_mk
    $this->db->select('kd_jurusan');
    $this->db->where('kd_mk', $kd_mk);
    $query = $this->db->get('matakuliah');

    // Periksa apakah kueri berhasil
    if ($query->num_rows() > 0) {
        // Ambil hasil kueri dan kembalikan nilai kd_jurusan
        $row = $query->row();
        return $row->kd_jurusan;
    } else {
        // Jika kd_jurusan tidak ditemukan, kembalikan nilai kosong atau NULL
        return null;
    }
}

	public function listDosen($id, $id_ta)
	{
		$this->db->select('*');
		$this->db->from('krs');
		$this->db->join('kurikulum', 'kurikulum.id_kurikulum = krs.id_kurikulum', 'left');
		$this->db->join('matakuliah', 'matakuliah.kd_mk = kurikulum.kd_mk', 'left');
		//$this->db->join('dosen', 'dosen.id_dosen = kurikulum.id_dosen', 'left');
		$this->db->join('ta', 'ta.id_ta = krs.id_ta', 'left');
		$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa', 'left');
		$this->db->where('kurikulum.kd_mk', $id);
		$this->db->where('krs.id_ta', $id_ta);
		$this->db->order_by('nim', 'ASC');
		$query = $this->db->get()->result();
		return $query;
	}


	public function getAl2l($id)
	{
		$this->db->select('kurikulum.id_kurikulum, kurikulum.id_peran, kurikulum.kd_jurusan,kurikulum.id_perdos,kurikulum.id_ta, kurikulum.kd_mk, perdos.id_perdos,peran_dosen.id_peran, ta.status, jurusan.jurusan, jurusan.jurusan, matakuliah.matakuliah, matakuliah.kd_mk, matakuliah.smt, matakuliah.sks, matakuliah.semester, ta.ta, ta.semester, ta.status');
		$this->db->from('kurikulum');
		$this->db->join('ta', 'ta.id_ta = kurikulum.id_ta', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = kurikulum.kd_jurusan', 'left');
		$this->db->join('peran_dosen', 'peran_dosen.id_peran = kurikulum.id_peran');
		$this->db->join('perdos', 'perdos.id_perdos = kurikulum.id_perdos');
		$this->db->join('matakuliah', 'matakuliah.kd_mk = kurikulum.kd_mk', 'left');
		$this->db->where('kurikulum.kd_jurusan', $id);
		$this->db->order_by('smt', 'ASC');
		$this->db->order_by('id_kurikulum', 'DESC');
		$query = $this->db->get();
		return $query;
	}
		public function getAll($id)
	{
		$this->db->select('*');
		$this->db->from('kurikulum');
		$this->db->join('ta', 'ta.id_ta = kurikulum.id_ta', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = kurikulum.kd_jurusan', 'left');
		// $this->db->join('peran_dosen', 'peran_dosen.id_peran = kurikulum.id_peran');
		// $this->db->join('perdos', 'perdos.id_perdos = kurikulum.id_perdos');
		// $this->db->join('dosen', 'dosen.id_dosen = kurikulum.id_dosen', 'left');
		$this->db->join('matakuliah', 'matakuliah.kd_mk = kurikulum.kd_mk', 'left');
		$this->db->where('kurikulum.kd_jurusan', $id);
		$this->db->order_by('smt', 'ASC');
		$this->db->order_by('id_kurikulum', 'DESC');
		
		$query = $this->db->get();
		return $query;
	}
	

	public function getAll_krs($id)
	{
		$this->db->select('id_krs, perdos.id_perdos,peran_dosen.id_peran, ta.status, jurusan.jurusan, jurusan.jurusan, matakuliah.matakuliah, matakuliah.kd_mk, matakuliah.smt, matakuliah.sks, matakuliah.semester, ta.ta');
		$this->db->from('krs as k , kurikulum as km');
		$this->db->join('kurikulum','kurikulum.id_kurikulum = k.id_kurikulum','left');
		$this->db->join('ta', 'ta.id_ta = k.id_ta', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = kurikulum.kd_jurusan', 'left');
		$this->db->join('peran_dosen', 'peran_dosen.id_peran = kurikulum.id_peran');
		$this->db->join('perdos', 'perdos.id_perdos = kurikulum.id_perdos');
		$this->db->join('matakuliah', 'matakuliah.kd_mk = kurikulum.kd_mk', 'left');
		
		$this->db->where('kurikulum.kd_jurusan', $id);
	
		$this->db->group_by('km.kd_mk');
		$this->db->order_by('smt', 'ASC');
		
		$query = $this->db->get();
		return $query;
		
	}

	public function getKRSByMatakuliah($id) {
    $this->db->distinct();
    $this->db->select('matakuliah.kd_mk, MAX(krs.id_krs) AS max_id_krs, MAX(perdos.id_perdos) AS max_perdos, MAX(peran_dosen.id_peran) AS max_peran, MAX(ta.status) AS max_status, MAX(jurusan.jurusan) AS max_jurusan, MAX(matakuliah.matakuliah) AS max_matakuliah, MAX(matakuliah.smt) AS max_smt, MAX(matakuliah.sks) AS max_sks, MAX(matakuliah.semester) AS max_semester, MAX(ta.ta) AS max_ta');
    $this->db->from('krs');
    $this->db->join('kurikulum', 'kurikulum.id_kurikulum = krs.id_kurikulum', 'left');
    $this->db->join('ta', 'ta.id_ta = krs.id_ta', 'left');
    $this->db->join('jurusan', 'jurusan.kd_jurusan = kurikulum.kd_jurusan', 'left');
    $this->db->join('peran_dosen', 'peran_dosen.id_peran = kurikulum.id_peran', 'left');
    $this->db->join('perdos', 'perdos.id_perdos = kurikulum.id_perdos', 'left');
    $this->db->join('matakuliah', 'matakuliah.kd_mk = kurikulum.kd_mk', 'left');
    $this->db->where('kurikulum.kd_jurusan', $id);
	$this->db->where('ta.status', 1); // Kondisi ta = 1
    $this->db->group_by('matakuliah.kd_mk');

    $this->db->order_by('matakuliah.kd_mk', 'ASC');

    return $this->db->get()->result();
}
public function getKRSByMatakuliahNilai($id) {
    $this->db->distinct();
    $this->db->select('*');
    $this->db->from('krs');
    $this->db->join('kurikulum', 'kurikulum.id_kurikulum = krs.id_kurikulum', 'left');
    $this->db->join('ta', 'ta.id_ta = krs.id_ta', 'left');
    $this->db->join('jurusan', 'jurusan.kd_jurusan = kurikulum.kd_jurusan', 'left');
    $this->db->join('peran_dosen', 'peran_dosen.id_peran = kurikulum.id_peran', 'left');
    $this->db->join('perdos', 'perdos.id_perdos = kurikulum.id_perdos', 'left');
    $this->db->join('matakuliah', 'matakuliah.kd_mk = kurikulum.kd_mk', 'left');
    $this->db->where('kurikulum.kd_jurusan', $id);
	$this->db->where('ta.status', 1); // Kondisi ta = 1
    $this->db->group_by('matakuliah.kd_mk');

    $this->db->order_by('matakuliah.kd_mk', 'ASC');

    return $this->db->get()->result();
}




	public function getDosenById($id_dosen) {

		$this->db->join('dosen','dosen.id_dosen = peran_dosen.id_dosen');
        $this->db->where('peran_dosen.id_peran', $id_dosen);
		
        return $this->db->get('peran_dosen')->row();
    }

				// Mengambil nama dosen berdasarkan id_dosen
			public function getDosenNameById($id_dosen) {
                    if ($id_dosen <= 0) {
                        return 'Dosen tidak ditemukan';
                    } else {
                        $dosen = $this->getDosenById($id_dosen);
                        return $dosen ? $dosen->nama_dosen : 'Dosen tidak ditemukan';
                    }
                }

					public function getIdDosenById($id_dosen) {
						$dosen = $this->getDosenById($id_dosen);
						return $dosen ? $dosen->id_dosen : 'Dosen tidak ditemukan';
					}
				// batas
				
	public function getDosenById_peran($id_dosen) {

		$this->db->join('dosen','dosen.id_dosen = perdos.id_dosen');
		$this->db->where('perdos.id_perdos', $id_dosen);
						
		return $this->db->get('perdos')->row();
	}
    // Mengambil nama dosen berdasarkan id_peran
	public function getDosenNameById_peran($id_dosen) {
            if ($id_dosen <= 0) {
                return 'Dosen tidak ditemukan';
            } else {
                $dosen_peran = $this->getDosenById_peran($id_dosen);
                return $dosen_peran ? $dosen_peran->nama_dosen : 'Dosen tidak ditemukan';
            }
        }

	public function getIdDosenById_peran($id_dosen) {
        $dosen_peran = $this->getDosenById_peran($id_dosen);
        return $dosen_peran ? $dosen_peran->id_dosen : 'Dosen tidak ditemukan';
    }



	public function getDataEdom($id)
	{
		$this->db->select('*');
		$this->db->from('evaluasi');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = evaluasi.kd_jurusan', 'left');
		$this->db->join('ta', 'ta.id_ta = evaluasi.id_ta','left');
		$this->db->where('evaluasi.kd_jurusan', $id);
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

	//Insert Data
	public function insertData($table, $data)
	{
		$this->db->insert($table, $data);
	}

	//TAMPIL PER-SEMESTER
	public function getSemester1()
	{
		$data = "SELECT 
				kurikulum.id_kurikulum,
				kurikulum.semester,
				kurikulum.hari,
				kurikulum.jam,
				kurikulum.ruangan,
				kurikulum.tgl_insert,
				kurikulum.tgl_update,
				jurusan.jurusan,
				matakuliah.matakuliah,
				dosen.nama_dosen
				FROM
				kurikulum
				INNER JOIN jurusan ON jurusan.kd_jurusan = kurikulum.kd_jurusan
				INNER JOIN dosen ON dosen.id_dosen = kurikulum.id_dosen
				INNER JOIN matakuliah ON matakuliah.kd_mk = kurikulum.kd_mk
				WHERE kurikulum.semester = 1";
		return $this->db->query($data);
	}

	public function getSemester2()
	{
		$data = "SELECT 
				kurikulum.id_kurikulum,
				kurikulum.semester,
				kurikulum.hari,
				kurikulum.jam,
				kurikulum.ruangan,
				kurikulum.tgl_insert,
				kurikulum.tgl_update,
				jurusan.jurusan,
				matakuliah.matakuliah,
				dosen.nama_dosen
				FROM
				kurikulum
				INNER JOIN jurusan ON jurusan.kd_jurusan = kurikulum.kd_jurusan
				INNER JOIN dosen ON dosen.id_dosen = kurikulum.id_dosen
				INNER JOIN matakuliah ON matakuliah.kd_mk = kurikulum.kd_mk
				WHERE kurikulum.semester = 2";
		return $this->db->query($data);
	}

	public function getSemester3()
	{
		$data = "SELECT 
				kurikulum.id_kurikulum,
				kurikulum.semester,
				kurikulum.hari,
				kurikulum.jam,
				kurikulum.ruangan,
				kurikulum.tgl_insert,
				kurikulum.tgl_update,
				jurusan.jurusan,
				matakuliah.matakuliah,
				dosen.nama_dosen
				FROM
				kurikulum
				INNER JOIN jurusan ON jurusan.kd_jurusan = kurikulum.kd_jurusan
				INNER JOIN dosen ON dosen.id_dosen = kurikulum.id_dosen
				INNER JOIN matakuliah ON matakuliah.kd_mk = kurikulum.kd_mk
				WHERE kurikulum.semester = 3";
		return $this->db->query($data);
	}


	//tampil kurikulum dihalaman mahasiswa
	public function viewKurikulum($id_mahasiswa, $id_ta)
	{
		$this->db->select('*');
		$this->db->from('kurikulum');
		$this->db->join('dosen', 'dosen.id_dosen = kurikulum.id_dosen', 'left');
		$this->db->join('matakuliah', 'matakuliah.kd_mk = kurikulum.kd_mk', 'left');
		$this->db->join('ta', 'ta.id_ta = krs.id_ta', 'left');
		//$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa', 'left');
		$this->db->where('id_mahasiswa', $id_mahasiswa);
		$this->db->where('krs.id_ta', $id_ta);
		$query = $this->db->get()->result();
		return $query;
	}
	    public function getKurikulumById($id_kurikulum) {
        $this->db->select('*');
        $this->db->from('kurikulum'); 
        $this->db->where('id_kurikulum', $id_kurikulum);
        $query = $this->db->get();

        return $query->row_array();
    }

}