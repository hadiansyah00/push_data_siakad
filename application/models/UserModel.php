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

	public function get_login_history($user_id) {
			$user_id =  $this->session->userdata('username');
			$this->db->select('login_time, ip_address');
			$this->db->from('mahasiswa');
			$this->db->where('id_mahasiswa', $user_id);
			$query = $this->db->get();
			return $query->result_array(); // Mengembalikan hasil dalam bentuk array
		}
	// Contoh kode untuk update login_time dan ip_address pada model atau controller

		public function updateLoginInfo($user_id, $ip_address) {
    // Set zona waktu menjadi GMT+7 (Waktu Indonesia Barat)
    date_default_timezone_set('Asia/Jakarta');

    // Hitung offset waktu dari UTC (GMT)
    $offset_in_seconds = 7 * 60 * 60; // 7 jam * 60 menit * 60 detik

    // Tambahkan offset waktu ke tanggal dan waktu saat ini
    $current_time_gmt7 = gmdate('Y-m-d H:i:s', time() + $offset_in_seconds);

    // Update login_time dan ip_address dalam tabel pengguna
    $data = array(
        'login_time' => $current_time_gmt7,
        'ip_address' => $ip_address
    );

    $this->db->where('id_mahasiswa', $user_id);
    $this->db->update('mahasiswa', $data);
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
	public function getUserByUsernameAdmin($username) {
    // Lakukan query ke database untuk mengambil data pengguna berdasarkan username
    $this->db->where('username', $username);
    $query = $this->db->get('users');

    // Jika data pengguna ditemukan, kembalikan data dalam bentuk objek
    if ($query->num_rows() == 1) {
        return $query->row();
    }

    // Jika data pengguna tidak ditemukan, kembalikan null
    return null;
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
public function getUserByUsernameMahasiswa($username) {
    // Lakukan query ke database untuk mengambil data pengguna berdasarkan username
    $this->db->where('nim', $username);
    $query = $this->db->get('mahasiswa');

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
