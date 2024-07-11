<?php

class KrsModel extends CI_Model
{

	//Get Data Mahasiswa
	public function getDataMhs()
	{
		$this->db->select('mahasiswa.verfikasi,mahasiswa.id_mahasiswa, mahasiswa.kd_jurusan, mahasiswa.nisn, mahasiswa.nim, mahasiswa.nama_ibu, mahasiswa.nama_mhs, mahasiswa.nama_kepanjangan, mahasiswa.jk, mahasiswa.tempat_lahir, mahasiswa.tgl_lahir, mahasiswa.agama, mahasiswa.alamat, mahasiswa.kota, mahasiswa.hp, mahasiswa.email, mahasiswa.nama_ayah, mahasiswa.alamat_ortu, mahasiswa.hp_ortu, mahasiswa.photo, mahasiswa.status_mhs, mahasiswa.semester, mahasiswa.password, mahasiswa.asal_sekolah, mahasiswa.kelas, mahasiswa.kelas_mhs, mahasiswa.tahun_masuk, mahasiswa.pendapatan_ortu, mahasiswa.u_password, mahasiswa.id_dosen, mahasiswa.status, mahasiswa.status_uts, mahasiswa.status_uas, mahasiswa.status_nilai_uts, mahasiswa.status_nilai_uas, mahasiswa.status_nilai_khs, mahasiswa.status_uap, mahasiswa.status_pra_uap, mahasiswa.tgl_insert, mahasiswa.tgl_update, mahasiswa.total, mahasiswa.sisa, mahasiswa.smt_1, mahasiswa.smt_2, mahasiswa.smt_3, mahasiswa.smt_4, mahasiswa.smt_5, mahasiswa.smt_6, mahasiswa.smt_7, mahasiswa.smt_8, mahasiswa.status_edom, mahasiswa.password_hash, mahasiswa.login_time, mahasiswa.ip_address, jurusan.jurusan, dosen.nama_dosen,jurusan.singkat,jurusan.jenjang,jurusan.jenjang,jurusan.kaprod,jurusan.ttd,jurusan.header_baak,jurusan.header_kapro,jurusan.header_dospem');
		$this->db->from('mahasiswa');
		$this->db->join('dosen', 'dosen.id_dosen = mahasiswa.id_dosen', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = mahasiswa.kd_jurusan', 'left');
		$this->db->where('mahasiswa.nim', $this->session->userdata('username'));
		$query = $this->db->get()->row_array();
		return $query;
	}
	//get data dosen
	public function getDataDosen()
	{
		$this->db->select('*');
		$this->db->from('dosen');
		// $this->db->join('mahasiswa', 'mahasiswa.id_dosen = dosen.id_dosen', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = dosen.kd_jurusan', 'left');
		$this->db->where('dosen.kd_dosen', $this->session->userdata('username'));
		$query = $this->db->get()->row_array();
		return $query;
	}
	public function getDataMhs2()
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->join('dosen', 'dosen.id_dosen = mahasiswa.id_dosen', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = mahasiswa.kd_jurusan', 'left');
		$this->db->where('mahasiswa.nim', $this->session->userdata('username'));
		$query = $this->db->get();
		return $query;
	}

	public function getPerdos()

	{
		$this->db->select('*');
		$this->db->from('perdos');

		$this->db->join('jurusan', 'jurusan.kd_jurusan = mahasiswa.kd_jurusan', 'left');
		$this->db->where('id_dosen', $this->session->userdata('username'));
		$query = $this->db->get()->row_array();
		return $query;
	}
	public function getDosen()
	{

		$this->db->select('*');
		$this->db->from('dosen');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = dosen.kode_jurusan', 'left');
		$this->db->where('dosen.id_dosen', $this->session->userdata('username'));
		$query = $this->db->get()->row_array();
		return $query;
	}

	public function getMhs()

	{
		$this->db->select('*');
		$this->db->from('mahasiswa');

		$this->db->join('jurusan', 'jurusan.kd_jurusan = mahasiswa.kd_jurusan', 'left');
		$this->db->where('id_dosen', $this->session->userdata('username'));
		$query = $this->db->get()->row_array();
		return $query;
	}



			//Get Data KRS for Mahasiswa from table matakuliah
			public function getMatkul_KRS($kd_jurusan)
		{
			$this->db->select('*');
			$this->db->from('kurikulum');
			$this->db->join('ta', 'ta.id_ta = kurikulum.id_ta', 'left');
			$this->db->join('peran_dosen', 'peran_dosen.id_peran = kurikulum.id_peran', 'left');
			$this->db->join('perdos', 'perdos.id_perdos = kurikulum.id_perdos', 'left');
			$this->db->join('matakuliah', 'matakuliah.kd_mk = kurikulum.kd_mk', 'left');
			$this->db->join('jurusan', 'jurusan.kd_jurusan = kurikulum.kd_jurusan', 'left');
			$this->db->where('kurikulum.kd_jurusan', $kd_jurusan);
			$this->db->order_by('id_kurikulum', 'DESC');
			$this->db->order_by('smt', 'ASC');
			$query = $this->db->get()->result();
			return $query;
		}
			public function getMatkul_PRAK($kd_jurusan)
		{
			$this->db->select('*');
			$this->db->from('praktik');
			$this->db->join('ta', 'ta.id_ta = praktik.id_ta', 'left');
			$this->db->join('peran_dosen', 'peran_dosen.id_peran = praktik.id_peran', 'left');
			$this->db->join('perdos', 'perdos.id_perdos = praktik.id_perdos', 'left');
			$this->db->join('matakuliah', 'matakuliah.kd_mk = praktik.kd_mk', 'left');
			$this->db->join('jurusan', 'jurusan.kd_jurusan = praktik.kd_jurusan', 'left');
			$this->db->where('praktik.kd_jurusan', $kd_jurusan);
			$this->db->order_by('id_praktik', 'DESC');
			$this->db->order_by('smt', 'ASC');
			$query = $this->db->get()->result();
			return $query;
		}
		
		 public function getMatkul_KRS_mk_pilihan($kd_jurusan)
			{
				$this->db->select('*');
				$this->db->from('kurikulum');
				$this->db->join('matakuliah', 'matakuliah.kd_mk = kurikulum.kd_mk', 'left');
				$this->db->where('kurikulum.kd_jurusan', $kd_jurusan);
				$this->db->where('matakuliah.mk_pilihan', 1);
				$this->db->order_by('id_kurikulum', 'DESC');
				$this->db->order_by('smt', 'ASC');
				$query = $this->db->get();
				return $query->result(); // Mengembalikan hasil dalam bentuk array
			}


		
	public function getAll($kd_jurusan)
	{
		$this->db->select('perdos.id_perdos,peran_dosen.id_peran, ta.status, jurusan.jurusan, jurusan.jurusan, matakuliah.matakuliah, matakuliah.kd_mk, matakuliah.smt, matakuliah.sks, matakuliah.semester, ta.ta');
		$this->db->from('kurikulum');
		$this->db->join('ta', 'ta.id_ta = kurikulum.id_ta', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = kurikulum.kd_jurusan', 'left');
		$this->db->join('peran_dosen', 'peran_dosen.id_peran = kurikulum.id_peran');
		$this->db->join('perdos', 'perdos.id_perdos = kurikulum.id_perdos');	
		$this->db->join('matakuliah', 'matakuliah.kd_mk = kurikulum.kd_mk', 'left');
		$this->db->where('kurikulum.kd_jurusan', $kd_jurusan);
		$this->db->order_by('smt', 'ASC');
		$this->db->order_by('id_kurikulum', 'DESC');
		$query = $this->db->get();
		return $query;
	}

		public function getEdom($kd_jurusan)
	{
	   $this->db->select('*');
		$this->db->from('evaluasi');
		$this->db->join('ta', 'ta.id_ta = evaluasi.id_ta', 'left');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = evaluasi.kd_jurusan', 'left');
		$this->db->where('evaluasi.kd_jurusan', $kd_jurusan);
		$this->db->order_by('id_eval', 'DSC');
		$query = $this->db->get()->result();
		return $query;
	}

    public function simpanDataKrs($data)
    {
       try {
            // Validasi atau proses lain sesuai kebutuhan

            // Contoh implementasi penyimpanan KRS dengan validasi
            // Pastikan untuk menyesuaikan nama tabel dan kolom sesuai dengan struktur Anda
            $this->db->insert('krs', $data);

            // Return nilai atau pesan sukses jika diperlukan
            return array('status' => 'success', 'message' => 'KRS berhasil disimpan');
        } catch (Exception $e) {
            // Tangkap kesalahan dan kembalikan pesan kesalahan
            return array('status' => 'error', 'message' => 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

	public function simpanDataPraktik($data)
    {
       try {
            
            $this->db->insert('krs_praktik', $data);

         
            return array('status' => 'success', 'message' => 'Praktik berhasil disimpan');
        } catch (Exception $e) {
           
            return array('status' => 'error', 'message' => 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

public function addKrs($data)
{
    $this->db->trans_start();

    // Lakukan operasi-insert di sini
    $this->db->insert('krs', $data);

    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE) {
        // Jika terdapat kesalahan, tampilkan pesan kesalahan
        echo $this->db->error()['message'];
        log_message('debug', 'Data yang akan dimasukkan: ' . print_r($data, true));
    } else {
        // Jika transaksi selesai tanpa kesalahan, tambahkan logika atau tindakan lain sesuai kebutuhan
        log_message('debug', 'Data berhasil dimasukkan: ' . print_r($data, true));
        // ... tambahkan tindakan lain jika diperlukan
    }


	}
		public function addEdom($data)
	{
		$this->db->insert('edom_mhs', $data);
	}


	//view KRS yang sudah dipilih mahasiswa
	public function viewKrs($id_mahasiswa, $id_ta)
	{
		$this->db->select('*');
		$this->db->from('krs');
		$this->db->join('kurikulum', 'kurikulum.id_kurikulum = krs.id_kurikulum', 'left');
		$this->db->join('matakuliah', 'matakuliah.kd_mk = kurikulum.kd_mk', 'left');
// 		$this->db->join('perdos', 'perdos.id_perdos = kurikulum.id_perdos', 'left');
// 		$this->db->join('peran_dosen', 'peran_dosen.id_peran = kurikulum.id_perdos', 'left');
		// $this->db->join('dosen', 'dosen.kd_dosen = kurikulum.kd_dosen', 'left');
		$this->db->join('ta', 'ta.id_ta = krs.id_ta', 'left');
		//$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa', 'left');
		$this->db->where('id_mahasiswa', $id_mahasiswa);
		$this->db->where('krs.id_ta', $id_ta);
		$this->db->order_by('sks', 'DESC');
		$query = $this->db->get()->result();
		return $query;
	}
	public function viewPraktik($id_mahasiswa, $id_ta)
		{
			$this->db->select('*');
			$this->db->from('krs_praktik');
			$this->db->join('praktik', 'praktik.id_praktik = krs_praktik.id_praktik', 'left');
			$this->db->join('matakuliah', 'matakuliah.kd_mk = praktik.kd_mk', 'left');
			$this->db->join('ta', 'ta.id_ta = krs_praktik.id_ta', 'left');
			
			$this->db->where('id_mahasiswa', $id_mahasiswa);
			$this->db->where('krs_praktik.id_ta', $id_ta);
			$this->db->order_by('sks', 'DESC');
			$query = $this->db->get()->result();
			return $query;
		}

		public function viewEdom($id_mahasiswa, $id_ta)
	{
		$this->db->select('*');
		$this->db->from('edom_mhs');
		$this->db->join('evaluasi', 'evaluasi.id_eval = edom_mhs.id_eval', 'left');
		$this->db->join('ta', 'ta.id_ta = edom_mhs.id_ta', 'left');
		$this->db->where('id_mahasiswa', $id_mahasiswa);
		$this->db->where('edom_mhs.id_ta', $id_ta);
		$query = $this->db->get()->result();
		return $query;
	}
	public function viewMhs($id_dosen)
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->join('krs', 'krs.id_mahasiswa = krs.id_mahasiswa', 'left');
		// $this->db->join('dosen', 'dosen.id_dosen = kurikulum.id_dosen', 'left');
		//$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa', 'left');
		$this->db->where('id_dosen', $id_dosen);
		$this->db->order_by('sks', 'DESC');
		$query = $this->db->get()->result();
		return $query;
	}
	public function verDsn($id_dosen)
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = mahasiswa.kd_jurusan', 'left');
		//$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa', 'left');
		$this->db->where('id_dosen', $id_dosen);
	
		$query = $this->db->get()->result();
		return $query;
	}

	public function viewAll($id_mahasiswa)
{
    $this->db->select('*');
    $this->db->from('krs');
    $this->db->join('kurikulum', 'kurikulum.id_kurikulum = krs.id_kurikulum', 'left');
    $this->db->join('matakuliah', 'matakuliah.kd_mk = kurikulum.kd_mk', 'left');
    $this->db->join('ta', 'ta.id_ta = krs.id_ta', 'left');
    //$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa', 'left');
    $this->db->where('id_mahasiswa', $id_mahasiswa);
	$this->db->where_not_in('nilai', array(''));
    $this->db->order_by('smt', 'ASC');
    //$this->db->where('krs.id_ta', $id_ta);
    $query = $this->db->get()->result();
    return $query;
}
public function viewAllDosen($id_mahasiswa)
{
    $this->db->select('*');
    $this->db->from('krs');
    $this->db->join('kurikulum', 'kurikulum.id_kurikulum = krs.id_kurikulum', 'left');
    $this->db->join('matakuliah', 'matakuliah.kd_mk = kurikulum.kd_mk', 'left');
    $this->db->join('ta', 'ta.id_ta = krs.id_ta', 'left');
    //$this->db->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa', 'left');
    $this->db->where('id_mahasiswa', $id_mahasiswa);
	$this->db->where_not_in('nilai', array(''));
    $this->db->order_by('smt', 'ASC');
    //$this->db->where('krs.id_ta', $id_ta);
    $query = $this->db->get()->result();
    return $query;
}


	// SELECT nim, nama_mhs, status_verfikasi,id_kurikulum from mahasiswa INNER JOIN krs ON 
	// mahasiswa.id_mahasiswa=krs.id_mahasiswa WHERE id_dosen=2 AND status_verfikasi="Belum Verfikasi"
	//get datadosen
	// public function getDataDosen()
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('mahasiswa');
	// 	$this->db->join('jurusan', 'jurusan.kd_jurusan = mahasiswa.kd_jurusan', 'left');
	// 	$this->db->where('mahasiswa.id_dosen', $this->session->userdata('username'));
	// 	$query = $this->db->get()->row_array();
	// 	return $query;
	// }



	// public function getKrs()
	// {
	// 	$data = "SELECT *FROM krs WHERE id_krs = 97";
	// 	return $this->db->query($data);
	// }


	//view data krs berdasarkan sesi login
	// public function sesiKRS()
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('mahasiswa');
	// 	$this->db->where('nim',  $this->session->userdata('username'));
	// 	$query = $this->db->get()->row_array();
	// 	return $query;
	// }

  
	public function getByIdKRS($id_krs)
	{
		  $this->db->select('*');
		// Implementasikan logika untuk mengambil data KRS berdasarkan $id_krs di sini
		$this->db->where('id_krs', $id_krs);
		// Kemudian ambil data dari tabel KRS

		$query = $this->db->get('krs');
		return $query->row(); // Mengembalikan satu baris data KRS
	}

	public function getByIdKrsprak($id_krs_prak)
	{
		  $this->db->select('*');
		// Implementasikan logika untuk mengambil data KRS berdasarkan $id_krs di sini
		$this->db->where('id_krs_prak', $id_krs_prak);
		// Kemudian ambil data dari tabel KRS

		$query = $this->db->get('krs_praktik');
		return $query->row(); // Mengembalikan satu baris data KRS
	}
	public function getByIdDsn($id_dosen)
	{
		// Implementasikan logika untuk mengambil data KRS berdasarkan $id_krs di sini
		$this->db->where('id_dosen', $id_dosen);
		// Kemudian ambil data dari tabel KRS

		$query = $this->db->get('dosen');
		return $query->row(); // Mengembalikan satu baris data KRS
	}
	public function getKdMkById($id_kurikulum) {
            $this->db->select('kurikulum.kd_mk, matakuliah.matakuliah');
            $this->db->join('matakuliah', 'matakuliah.kd_mk = kurikulum.kd_mk');
            $this->db->from('kurikulum');
            $this->db->where('kurikulum.id_kurikulum', $id_kurikulum);
            $query = $this->db->get();
            
            if ($query->num_rows() > 0) {
                $result = $query->row();
                return $result->kd_mk;
            }
            
            return false;

    }
	public function getKdPrakById($id_praktik) {
            $this->db->select('praktik.kd_mk, matakuliah.matakuliah');
            $this->db->join('matakuliah', 'matakuliah.kd_mk = praktik.kd_mk');
            $this->db->from('praktik');
            $this->db->where('praktik.id_praktik', $id_praktik);
            $query = $this->db->get();
            
            if ($query->num_rows() > 0) {
                $result = $query->row();
                return $result->kd_mk;
            }
            
            return false;

    }
    
   public function getNamaMataKuliah($kd_mk)
{
    $this->db->select('matakuliah');
    $this->db->from('matakuliah');
    $this->db->where('kd_mk', $kd_mk);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->row()->matakuliah;
    } else {
        return false;
    }
}
	

}
