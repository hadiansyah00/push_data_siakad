<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
		// $this->ModelSecurity->getCsrf();
	}

	public function index()
	{
		
		$user_id = $this->session->userdata('username');
		$data['login_history'] = $this->UserModel->get_login_history($user_id);
		//setting krs
		$data['setting_krs'] = $this->db->get('set_krs')->row_array();
		$data['setting'] = $this->db->get('mahasiswa')->row_array();
		
		//get data dari session
		$data['mhs'] = $this->KrsModel->getDataMhs();
		$this->load->view('mhs/setting-mhs-st', $data);
	}


	  public function updateAksiProfil() {
    
        $this->form_validation->set_rules('nama_mhs', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('hp', 'No Hp / WA', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('kota', 'Kota', 'required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
        // Add more validation rules as needed

        if ($this->form_validation->run() === FALSE) {
            // Form validation failed, reload the form with errors
            $this->load->view('mhs/profil-mhs-st'); // Adjust the view name
        } else {
            // Form validation passed, update user profile
            $data = array(
                'nama_mhs' => $this->input->post('nama_mhs'),
                'agama' => $this->input->post('agama'),
                'jk' => $this->input->post('jk'),
				'tgl_lahir' => $this->input->post('tgl_lahir'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'email' => $this->input->post('email'),
                'hp' => $this->input->post('hp'),
                'alamat' => $this->input->post('alamat'),
                'kota' => $this->input->post('kota')
                // Add more fields as needed
            );

            $id_mahasiswa = $this->input->post('id_mahasiswa');

            // Call the model method to update the user profile
            $this->MahasiswaModel->updateUserProfile($id_mahasiswa, $data);

            // Optionally, set a success flash message
            $this->session->set_flashdata('success', 'Profile updated successfully.');

            // Redirect to a success page or any desired page
            redirect('mhs/profil');
        }
    }
	 public function infoMhs() {
    
        $this->form_validation->set_rules('asal_sekolah', 'Asal Sekolah', 'required');
        $this->form_validation->set_rules('nisn', 'NISN', 'required');
		$this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required');
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
		$this->form_validation->set_rules('hp_ortu', 'No Telp Wali/Ortu', 'required');
		$this->form_validation->set_rules('alamat_ortu', 'Alamat Orang Tua', 'required');
		$this->form_validation->set_rules('pendapatan_ortu', 'Kisaran Pendapatan', 'required');
        
        // Add more validation rules as needed

        if ($this->form_validation->run() === FALSE) {
            // Form validation failed, reload the form with errors
            $this->load->view('mhs/profil-mhs-st'); // Adjust the view name
        } else {
            // Form validation passed, update user profile
            $data = array(
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'nisn' => $this->input->post('nisn'),
                'nama_ayah' => $this->input->post('nama_ayah'),
                'nama_ibu' => $this->input->post('nama_ibu'),
                'hp_ortu' => $this->input->post('hp_ortu'),
                'alamat_ortu' => $this->input->post('alamat_ortu'),
				'nama_wali' => $this->input->post('nama_wali'),
                'pendapatan_ortu' => $this->input->post('pendapatan_ortu'),
             
                // Add more fields as needed
            );

            $id_mahasiswa = $this->input->post('id_mahasiswa');

            // Call the model method to update the user profile
            $this->MahasiswaModel->updateUserProfile($id_mahasiswa, $data);

            // Optionally, set a success flash message
            $this->session->set_flashdata('success', 'Profile updated successfully.');

            // Redirect to a success page or any desired page
            redirect('mhs/profil');
        }
    }
	public function updateAksi()
	{
		$id 	= $this->input->post('id_mahasiswa');

		$data = array(
			'nama_mhs'			=> htmlspecialchars($this->input->post('nama_mhs')),
			'nama_kepanjangan'	=> htmlspecialchars($this->input->post('nama_kepanjangan')),
			'jk'				=> htmlspecialchars($this->input->post('jk')),
			'tempat_lahir'		=> htmlspecialchars($this->input->post('tempat_lahir')),
			'tgl_lahir'			=> htmlspecialchars($this->input->post('tgl_lahir')),
			'alamat'			=> htmlspecialchars($this->input->post('alamat')),
			'kota'				=> htmlspecialchars($this->input->post('kota')),
			'hp'				=> htmlspecialchars($this->input->post('hp')),
			'email'				=> htmlspecialchars($this->input->post('email')),
			'nama_ayah'			=> htmlspecialchars($this->input->post('nama_ayah')),
			'nama_ibu'			=> htmlspecialchars($this->input->post('nama_ibu')),
			'alamat_ortu'		=> htmlspecialchars($this->input->post('alamat_ortu')),
			'hp_ortu'			=> htmlspecialchars($this->input->post('hp_ortu')),
			'agama'			=> htmlspecialchars($this->input->post('agama')),
			'pendapatan_ortu'			=> htmlspecialchars($this->input->post('pendapatan_ortu')),
			'asal_sekolah'		=> htmlspecialchars($this->input->post('asal_sekolah')),
			'nisn'			=> htmlspecialchars($this->input->post('nisn')),
			'tahun_masuk'			=> htmlspecialchars($this->input->post('tahun_masuk')),

			// 'nama_dosen'			=> htmlspecialchars($this->input->post('hp_ortu')),
			//'status'			=> htmlspecialchars($this->input->post('status')),
			//'photo'				=> $photo,
			'tgl_update'		=> date('y-m-d')
		);

		$where = array('id_mahasiswa' => $id);
		//var_dump($data);
		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data 
				<strong class="green">
					Mahasiswa
				</strong>
				Berhasil di Update!
			</div>'
		);
		redirect('mhs/profil');
	}

public function updatePhoto()
    {
        $id = $this->input->post('id_mahasiswa');
        $config['upload_path'] = FCPATH . 'assets/images/uploads/';
        $config['allowed_types'] = 'jpeg|jpg|png|gif|tiff';
		$config['max_size'] = 2048; // Ukuran maksimum dalam kilobyte
   		$config['encrypt_name'] = TRUE;
   		$this->upload->initialize($config);
        // $this->load->library('upload', $config);

        // Cek apakah file diupload
      // Cek apakah file diupload
       // File berhasil diupload
    if ($this->upload->do_upload('photo')) {
        // Get the uploaded file data
        $photo = $this->upload->data('file_name');

        // Hapus file lama jika ada
        $item = $this->db->get_where('mahasiswa', array('id_mahasiswa' => $id))->row();
        if ($item->photo != null) {
            $target_file = './assets/images/uploads/' . $item->photo;
            if (file_exists($target_file)) {
                unlink($target_file);
            }
        }

        // Update database
        $data = array(
            'photo'      => $photo,
            'tgl_update' => date('y-m-d')
        );
        $this->db->where('id_mahasiswa', $id);
        $this->db->update('mahasiswa', $data);

        // Set success message
        $this->session->set_flashdata('success', 'Berhasil upload gambar.');

        // Redirect ke halaman profil
        redirect('mhs/profil');
    } else {
        // Gagal upload file
        $error = 'Gagal upload file. ' . $this->upload->display_errors();
        $this->session->set_flashdata('error', $error);
        $this->session->set_flashdata('upload_path', $config['upload_path']);

       
        // Redirect ke halaman profil
        redirect('mhs/profil');
    }
}
	public function updateAksiSemester()
	{
		$id 	= $this->input->post('id_mahasiswa');

		
		$data = array(
			'agama'        => $this->input->post('agama'),
			'jk'           => $this->input->post('jk'),
			'tgl_lahir'    => $this->input->post('tgl_lahir'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'email'        => $this->input->post('email'),
			'hp'           => $this->input->post('hp'),
			'alamat'       => $this->input->post('alamat'),
			'kota'         => $this->input->post('kota'),
			'semester'			=> htmlspecialchars($this->input->post('semester')),
			'tgl_update'		=> date('y-m-d')
		);

		$where = array('id_mahasiswa' => $id);
		//var_dump($data);
		$this->db->update('mahasiswa', $data, $where);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>

				<i class="ace-icon fa fa-check green"></i>

				Data 
				<strong class="green">
					Semester
				</strong>
				Berhasi di Update!
			</div>'
		);
		redirect('mhs/profil');
	}

		public function updatePassword() {
				$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
				$this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|min_length[5]|matches[password]');

				if ($this->form_validation->run() == FALSE) {
					$response['success'] = false;
					$response['message'] = validation_errors();
				} else {
					$id_mahasiswa = $this->input->post('id_mahasiswa');
					$password = $this->input->post('password');

					$data = array(
						'password' => password_hash($password, PASSWORD_DEFAULT)
					);

					$result = $this->MahasiswaModel->updatePassword($id_mahasiswa, $data);

					if ($result) {
						$response['success'] = true;
						$response['message'] = "Password berhasil diperbarui!";
					} else {
						$response['success'] = false;
						$response['message'] = "Gagal memperbarui password. Silakan coba lagi.";
					}
				}

				// Set header sebagai JSON dan mengembalikan respon
				$this->output->set_content_type('application/json')->set_output(json_encode($response));
			}		
						
						
			public function updateAksiProfilMhs()
			{
				// Lakukan validasi form
				if ($this->input->post($this->security->get_csrf_token_name()) !== $this->security->get_csrf_hash()) {
						// CSRF token tidak valid, handle sesuai kebutuhan
						echo "CSRF Token Mismatch";
						return;
					}

						$this->form_validation->set_rules('nama_mhs', 'Nama Lengkap', 'required');
						// $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
						// $this->form_validation->set_rules('email', 'Email', 'required');
						// $this->form_validation->set_rules('hp', 'No Hp / WA', 'required');
						// $this->form_validation->set_rules('alamat', 'Alamat', 'required');
						// $this->form_validation->set_rules('kota', 'Kota', 'required');
						// $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
						
						// Cek apakah ada perubahan password
						if (!empty($this->input->post('password'))) {
							$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
							$this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]');
						}

						// Cek apakah ada perubahan foto profil
						if (!empty($_FILES['photo']['name'])) {

							$config['upload_path'] = FCPATH . 'assets/images/uploads/';
							$config['allowed_types'] = 'jpg|jpeg|png|gif|png';
							$config['max_size']      = 2048; // 2MB
							$config['file_name']     = 'profile_' . time();
							$this->upload->initialize($config);
							$this->load->library('upload', $config);

							if (!$this->upload->do_upload('photo')) {
								// Jika gagal mengunggah foto
								$response['status'] = 'error';
								$response['message'] = $this->upload->display_errors();
								echo json_encode($response);
								return;
							} else {
								// Jika berhasil mengunggah foto, simpan nama file foto baru
								$data = $this->upload->data();
								$photo = $data['file_name'];
							}
						}
						
						// Validasi form
						if ($this->form_validation->run() == FALSE) {
							// Jika validasi form gagal
							$response['status'] = 'error';
							$response['message'] = validation_errors();
						} else {
							// Validasi berhasil, update data mahasiswa
							$id = $this->input->post('id_mahasiswa');

							// Buat array data baru
							$data = array(
								'nama_mhs'     => $this->input->post('nama_mhs'),
								'agama'        => $this->input->post('agama'),
								'jk'           => $this->input->post('jk'),
								'tgl_lahir'    => $this->input->post('tgl_lahir'),
								'tempat_lahir' => $this->input->post('tempat_lahir'),
								'email'        => $this->input->post('email'),
								'hp'           => $this->input->post('hp'),
								'alamat'       => $this->input->post('alamat'),
								'kota'         => $this->input->post('kota')
								// Tambahkan bidang lain jika diperlukan
							);

							// Perbarui password jika ada perubahan
							if (!empty($this->input->post('password'))) {
								$data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
							}

							// Perbarui foto profil jika ada perubahan
							if ($this->upload->do_upload('photo')) {
							// Get the uploaded file data
							$photo = $this->upload->data('file_name');
							// Hapus file lama jika ada
							$item = $this->db->get_where('mahasiswa', array('id_mahasiswa' => $id))->row();
							if ($item->photo != null) {
								$target_file = './assets/images/uploads/' . $item->photo;
								if (file_exists($target_file)) {
									unlink($target_file);
								}
							}
						}
							// Update database
							$data = array(
								'photo'      => $photo,
								'tgl_update' => date('y-m-d')
							);

							// Lakukan update data di database
							$this->db->where('id_mahasiswa', $id);
							if ($this->db->update('mahasiswa', $data)) {
								// Jika update berhasil
								$response['status'] = 'success';
								$response['message'] = 'Data mahasiswa berhasil diperbarui!';
							} else {
								// Jika update gagal
								$response['status'] = 'error';
								$response['message'] = 'Gagal memperbarui data mahasiswa.';
							}
						}

						// Kembalikan respons dalam bentuk JSON
						header('Content-Type: application/json');
						echo json_encode($response);
					}
					public function send_verification_email()
					{
						// Periksa apakah request merupakan AJAX dan CSRF token valid
						if (!$this->input->is_ajax_request() || !$this->input->post($this->security->get_csrf_token_name())) {
							show_404(); // Tampilkan halaman 404 jika bukan request AJAX atau token CSRF tidak valid
						}
						
						// Ambil data nim dan email dari input form
						$nim = $this->input->post('nim');
						$email = $this->input->post('email');
				
						// Generate unique token
						$emailVerified = bin2hex(random_bytes(16)); // Generate 16-byte token
				
						// Simpan token ke database
						$data = [
							'nim' => $nim,
							'email' => $email,
							'email_verified' => $emailVerified, // Simpan token di kolom email_verified
							'created_at' => date('Y-m-d H:i:s')
						];
						$this->db->insert('verification_tokens', $data);
				
						// Konfigurasi email
						$config = [
							'mailtype' => 'html',
							'charset' => 'utf-8',
							'protocol' => 'smtp',
							'smtp_host' => 'smtp.gmail.com', // atau smptp lainnya                
							'smtp_user' => 'pmb@sbh.ac.id',  // Email gmail admin aplikasi
							'smtp_pass' => 'oordqaidwyefpwyt',  // Password Gmail atau Sandi Aplikasi Gmail
							'smtp_crypto' => 'ssl',
							'smtp_port' => 465,
							'crlf' => "\r\n",
							'newline' => "\r\n"
						];
				
						// Inisialisasi library email dengan konfigurasi
						$this->load->library('email', $config);
				
						// Set pengirim email
						$this->email->from('pmb@sbh.ac.id', 'SIAKAD SBH');
				
						// Set penerima email
						$this->email->to($email);
				
						// Set subject email
						$this->email->subject('Email Verification');
						
						// Set isi pesan email
						
						$message = 'Klik link disini untuk Verfikasi alamat emailnya: ' . base_url('mhs/profil/verify_email?token=' . $emailVerified);
						$this->email->message($message);
				
						// Kirim email
						if ($this->email->send()) {
							// Email berhasil dikirim
							$response['status'] = 'success';
							$response['message'] = 'Verification email has been sent successfully.';
						} else {
							// Email gagal dikirim
							$response['status'] = 'error';
							$response['message'] = 'Failed to send verification email.';
						}
				
						// Kembalikan respons dalam format JSON
						header('Content-Type: application/json');
						echo json_encode($response);
					}
					public function verify_email() {
						$token = $this->input->get('token');
					
						$result = $this->MahasiswaModel->verify_email($token);
					
						if ($result === true) {
							// Verifikasi email berhasil
							echo json_encode(['status' => 'success', 'message' => 'Email berhasil diverifikasi']);
						} else {
							// Verifikasi gagal, kirim pesan error
							echo json_encode(['status' => 'error', 'message' => $result]);
						}
					}
					
					

}
