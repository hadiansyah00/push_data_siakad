<?php

class UserModel extends CI_Model
{

	 public function getUserById($userId) {
        // Query ke database untuk mendapatkan informasi pengguna berdasarkan ID
        $query = $this->db->get_where('mahasiswa', array('id_mahasiswa' => $userId));
        return $query->row();
    }
	public function updatePasswordHash($userId) {
    $data = array(
        'password' => password_hash($this->input->post('new_password'), PASSWORD_DEFAULT)
    );
    $this->db->where('id_mahasiswa', $userId);
    return $this->db->update('mahasiswa', $data);
}

	//Cek username dan password admin
	public function loginUser($username, $pass)
	{
		// $this->db->select('*');
		// $this->db->from('users');
		// $this->db->where(['username' => $username, 'password' => $pass]);
		// $query = $this->db->get()->result();
		// return $query;
		$username	= set_value('username');
		$password	= set_value('password');

		$result		= $this->db->where('username', $username)
			->where('password', $pass)
			->limit(1)
			->get('users');

		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return array();
		}
	}
	public function getUserByUsername($username) {
    // Lakukan query ke database untuk mengambil data pengguna berdasarkan username
    $this->db->where('kd_dosen', $username);
    $query = $this->db->get('dosen');

    // Jika data pengguna ditemukan, kembalikan data dalam bentuk objek
    if ($query->num_rows() == 1) {
        return $query->row();
    }

    // Jika data pengguna tidak ditemukan, kembalikan null
    return null;
}


	//cek nim dan password mahasiswa
	public function loginMhs($username, $pass)
	{
		$username	= set_value('username');
		$password	= set_value('password');

		$result		= $this->db->where('nim', $username)
			->where('password', $pass)
			->limit(1)
			->get('mahasiswa');

		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return array();
		}
	}
	public function loginDosen($username, $pass)
	{
		$username	= set_value('username');
		$password	= set_value('password_ds');

		$result		= $this->db->where('kd_dosen', $username)
			->where('password_ds', $pass)
			->limit(1)
			->get('dosen');

		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return array();
		}
	}

	public function tampilData($table)
	{
		return $this->db->get($table);
	}

	public function insertData($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function loginSuper($username, $pass)
	{
		$username	= set_value('username');
		$password	= set_value('password');

		$result		= $this->db->where('username', $username)
			->where('password', $pass)
			->limit(1)
			->get('users');

		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return array();
		}
	}
	public function loginBauk($username, $pass)
	{
		$username	= set_value('username');
		$password	= set_value('password');

		$result		= $this->db->where('username', $username)
			->where('password', $pass)
			->limit(1)
			->get('a');

		if ($result->num_rows() > 0) {
			return $result->row();
		} else {
			return array();
		}
	}
	 public function get_users() {
        $query = $this->db->get('users');
        return $query->result_array();
    }
}
