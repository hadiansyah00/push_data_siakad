<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
	}

	public function index()
	{
		$data['title'] = 'Profil Dosen STIKES BOGOR';
		$data['judul'] = 'Profil Dosen';
		//setting krs
		// $data['setting'] = $this->db->get('set_krs')->row_array();
		//get data dari session
		$data['dsn'] = $this->KrsModel->getDataDosen();
		// $this->load->view('dosen/templates/header', $data);
		$this->load->view('dosen/profil-dosen', $data);
		// $this->load->view('dosen/templates/footer');
	}

	public function updateProfileDosen()
	{
		$id 	= $this->input->post('id_dosen');

		
		$data = array(
				'jenis_kelamin'           => $this->input->post('jenis_kelamin'),
				'tgl'    => $this->input->post('tgl'),
				'tempat' => $this->input->post('tempat'),
				'email_ds'        => $this->input->post('email_ds'),
				'hp_ds'           => $this->input->post('hp_ds'),
				'alamat_dosen'       => $this->input->post('alamat_dosen'),
				'tgl_update'		=> date('y-m-d')
		);

		$where = array('id_dosen' => $id);
		//var_dump($data);
		$this->db->update('dosen', $data, $where);
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
		redirect('dosen/profil');
	}

	public function updatePassword() {
				$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
				$this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|min_length[5]|matches[password]');

				if ($this->form_validation->run() == FALSE) {
					$response['success'] = false;
					$response['message'] = validation_errors();
				} else {
					$id_dosen = $this->input->post('id_dosen');
					$password = $this->input->post('password');

					$data = array(
						'password' => password_hash($password, PASSWORD_DEFAULT)
					);

					$result = $this->DosenModel->updatePassword($id_dosen, $data);

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
						
public function updateAksiProfilDosen()
{
    // Lakukan validasi form
	if ($this->input->post($this->security->get_csrf_token_name()) !== $this->security->get_csrf_hash()) {
            // CSRF token tidak valid, handle sesuai kebutuhan
            echo "CSRF Token Mismatch";
            return;
        }

			$this->form_validation->set_rules('nama_dosen', 'Nama Dosen', 'required');
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
				$id = $this->input->post('id_dosen');

				// Buat array data baru
				$data = array(
					'nama_dosen'     => $this->input->post('nama_dosen'),
					// 'agama'        => $this->input->post('agama'),
					// 'jk'           => $this->input->post('jk'),
					// 'tgl_lahir'    => $this->input->post('tgl_lahir'),
					// 'tempat_lahir' => $this->input->post('tempat_lahir'),
					// 'email'        => $this->input->post('email'),
					// 'hp'           => $this->input->post('hp'),
					// 'alamat'       => $this->input->post('alamat'),
					// 'kota'         => $this->input->post('kota')
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
				$item = $this->db->get_where('dosen', array('id_dosen' => $id))->row();
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
				$this->db->where('id_dosen', $id);
				if ($this->db->update('dosen', $data)) {
					// Jika update berhasil
					$response['status'] = 'success';
					$response['message'] = 'Data Dosen berhasil diperbarui!';
				} else {
					// Jika update gagal
					$response['status'] = 'error';
					$response['message'] = 'Gagal memperbarui data Dosen.';
				}
			}

			// Kembalikan respons dalam bentuk JSON
			header('Content-Type: application/json');
			echo json_encode($response);
		}

		
}
