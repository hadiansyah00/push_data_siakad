<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
		$this->ModelSecurity->getCsrf();
	}

	public function index()
	{
		$data['title'] = 'Profil Mahasiswa STIKES BOGOR';
		$data['judul'] = 'Profil Mahasiswa';
		//setting krs
		$data['setting_krs'] = $this->db->get('set_krs')->row_array();
		$data['setting'] = $this->db->get('mahasiswa')->row_array();
		//get data dari session
		$data['mhs'] = $this->KrsModel->getDataMhs();
		// $this->load->view('mhs/templates/header', $data);
		$this->load->view('mhs/profil-mhs-st', $data);
		// $this->load->view('mhs/templates/footer');
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

	public function updatePass()
{
    // Form validation rules
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|matches[u_password]', [
        'matches' => 'Password tidak sama!',
        'min_length' => 'Password terlalu pendek!'
    ]);
    $this->form_validation->set_rules('u_password', 'Confirm Password', 'required|trim|matches[password]');

    if ($this->form_validation->run() == FALSE) {
        // Validation failed, reload the form or redirect as needed
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Validation error</div>');
        redirect('mhs/profil'); // Adjust the URL as needed
    } else {
        // Validation passed, update the password in the database
        $id = $this->input->post('id_mahasiswa');

        $data = array(
            'password' => password_hash($this->input->post('password')),
            'tgl_update' => date('Y-m-d') // Fixed date format
        );

        $where = array('id_mahasiswa' => $id);
        $this->db->update('mahasiswa', $data, $where);

        $this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success">
                <strong>Password</strong> Berhasil di Update!
            </div>'
        );

        redirect('mhs/profil'); // Adjust the URL as needed
    }
}

}