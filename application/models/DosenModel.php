<?php

class DosenModel extends CI_Model
{
	public function updateUserProfile($id_dosen, $data) {
        // Update user profile based on the provided data
        $this->db->where('id_dosen', $id_dosen);
        $this->db->update('dosen', $data);
    }
	
	public function getData()
	{

		$this->db->select('*');
		$this->db->from('dosen');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = dosen.kd_jurusan', 'left');
		$query = $this->db->get();
		return $query;
	}
 public function deleteData($table, $where)
    {
        // Delete data from the specified table based on the given conditions
        $this->db->where($where);
        $this->db->delete($table);

        // Check if the delete operation was successful
        return ($this->db->affected_rows() > 0);
    }

public function get_all_dosen() {
        $query = $this->db->get('dosen'); // Sesuaikan dengan nama tabel Anda
        return $query->result();
    }

	// 	public function getData($table)
	// 	{
	// 		$this->db->order_by('nama_dosen', 'ASC');

	// 		$query = $this->db->get($table);
	// 		return $query;
	// 	}
	public function getDataPerdos() {
       $this->db->select('*');
		$this->db->from('peran_dosen');
		$this->db->join('dosen', 'dosen.id_dosen = peran_dosen.id_dosen', 'left');
	
		$query = $this->db->get();
		return $query;

        return $query->result();
    }


	public function getDataPerdos_2() {
       $this->db->select('*');
		$this->db->from('perdos');
		$this->db->join('dosen', 'dosen.id_dosen = perdos.id_dosen', 'left');
	
		$query = $this->db->get();
		return $query;

        return $query->result();
    }


	public function getPerdos1() {
       $this->db->select('*');
		$this->db->from('peran_dosen');
		$this->db->join('dosen', 'dosen.id_dosen = peran_dosen.id_dosen', 'left');
		$query = $this->db->get();
		return $query;

        return $query->result();
    }
	public function getPerdos2() {
       $this->db->select('*');
		$this->db->from('perdos');
		$this->db->join('dosen', 'dosen.id_dosen = perdos.id_dosen', 'left');
		$query = $this->db->get();
		return $query;

        return $query->result();
    }

	public function getDosenId($where)
	{
		$this->db->select('*');
		$this->db->from('dosen');
		$this->db->join('jurusan', 'jurusan.kd_jurusan = mahasiswa.kd_jurusan', 'left');
		$this->db->join('mahasiswa', 'mahasiswa.id_dosen = dosen.id_dosen', 'left');
		$this->db->where('mahasiswa.kd_jurusan', $where);
		$query = $this->db->get();
		return $query;
	}

	public function dsnId($id_dosen)
	{
		$this->db->select('*');
		$this->db->from('dosen');
		$this->db->join('jurusan', 'mahasiswa.kd_jurusan = jurusan.kd_jurusan', 'left');
		$this->db->join('mahasiswa', 'mahasiswa.id_dosen = dosen.id_dosen', 'left');
		$this->db->where('dosen.id_dosen', $id_dosen);
		$query = $this->db->get();
		return $query;
	}



	public function getJurusan()
	{
		$this->db->order_by('jurusan', 'ASC');
		$query = $this->db->get('jurusan');
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
	

    public function getDosenById($id_dosen) {
        // Misalnya, tabel dosen Anda bernama "dosen" dalam database
        $this->db->where('id_dosen', $id_dosen);
        $query = $this->db->get('dosen');

        if ($query->num_rows() == 1) {
            // Mengembalikan data dosen dalam bentuk objek
            return $query->row();
        } else {
            // Mengembalikan NULL jika data tidak ditemukan
            return NULL;
        }
    }

}
