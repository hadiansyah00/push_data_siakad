<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Praktik extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//url security
		$this->ModelSecurity->getSecurity();
		$this->load->model('KurikulumModel');

	}

	  public function index()
    {
        $data['title'] = 'Modul Matakuliah Praktik SBH';
        $data['judul'] = 'Akademik';
        $data['subJudul'] = 'Matakuliah Praktik';
        $data['tahun'] = $this->TaModel->getAktif()->result();
        $data['jurusan'] = $this->JurusanModel->getData('jurusan')->result();
		$this->load->view('admin-st/kurikulum/kurikulum_praktik-st', $data);
      
    }
	  
	
    public function index_kurikulum_praktik($id)
    {
        $data['title'] = 'Modul Matakuliah Praktik SBH';
        $data['judul'] = 'Akademik';
        $data['subJudul'] = 'Matakuliah Praktik';
        $where = array('kd_jurusan' => $id);
        $data['tahun'] = $this->TaModel->getAktif()->row_array();
        $data['detil'] = $this->JurusanModel->detilData('jurusan', $where)->result();
        $data['matkul'] = $this->KurikulumModel->getMatkulPraktikum($id)->result();
        $data['kurikulum'] = $this->KurikulumModel->getAll_praktik($id)->result();
        $data['perdos'] = $this->DosenModel->getDataPerdos('peran_dosen')->result();
        $data['dosen_1'] = $this->DosenModel->getPerdos1('peran_dosen')->result();
        $data['dosen_2'] = $this->DosenModel->getPerdos2('perdos')->result();

		
        $this->load->view('admin-st/kurikulum/master_kurikulum_praktik-st', $data);
    }
	   public function getKurikulumById2($id) {
        if ($this->input->is_ajax_request()) {
            $kurikulum = $this->KurikulumModel->getKurikulumById($id);
            
            if ($kurikulum) {
                echo json_encode($kurikulum);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Data Kurikulum tidak ditemukan']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid Request']);
        }
    }
    public function insert()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            if ($this->input->post($this->security->get_csrf_token_name()) !== $this->security->get_csrf_hash()) {
                echo json_encode(['status' => 'error', 'message' => 'CSRF Token Mismatch']);
                return;
            }

            $kd_jurusan = $this->uri->segment(4);
            $ta = $this->TaModel->getAktif()->result();            
            foreach ($ta as $t) :
                $a = $t->id_ta;
            endforeach;
            
            $data = [    
                'kd_jurusan' => htmlspecialchars($this->input->post('kd_jurusan')),
                'id_ta' => $a,
                'kd_mk' => htmlspecialchars($this->input->post('matkul')),
                'id_perdos' => htmlspecialchars($this->input->post('perdos')),
                'id_peran' => htmlspecialchars($this->input->post('peran')),
				'kelas' => htmlspecialchars($this->input->post('kelas')),
                'tgl_insert' => date('Y-m-d')
            ];

            $this->KurikulumModel->insertData('praktik', $data);
            echo json_encode(['status' => 'success', 'message' => 'Data Matakuliah berhasil disimpan']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid Request Method']);
        }
    }

    public function update()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            if ($this->input->post($this->security->get_csrf_token_name()) !== $this->security->get_csrf_hash()) {
                echo json_encode(['status' => 'error', 'message' => 'CSRF Token Mismatch']);
                return;
            }

            $this->form_validation->set_rules('matkul', 'Mata Kuliah', 'required');
            $this->form_validation->set_rules('perdos', 'Peran Dosen', 'required');
            $this->form_validation->set_rules('peran', 'Nama Dosen', 'required');
            $this->form_validation->set_rules('kelas', 'Kelas', 'required');

            if ($this->form_validation->run() == FALSE) {
                echo json_encode(['status' => 'error', 'message' => validation_errors()]);
            } else {
                $id = htmlspecialchars($this->input->post('kurikulum_id'));

                $data = [
                    'kd_mk' => htmlspecialchars($this->input->post('matkul')),
                    'id_perdos' => htmlspecialchars($this->input->post('perdos')),
                    'id_peran' => htmlspecialchars($this->input->post('peran')),
                    'kelas' => htmlspecialchars($this->input->post('kelas')),
                    'tgl_update' => date('Y-m-d')
                ];

                $result = $this->KurikulumModel->updateKurikulum($id, $data);

                if ($result) {
                    echo json_encode(['status' => 'success', 'message' => 'Data Matakuliah berhasil diperbarui']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Gagal memperbarui data Matakuliah']);
                }
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid Request Method']);
        }
    }

	public function delete()
{
    $id = $this->input->post('id_praktik');
 
    $result = $this->MahasiswaModel->deleteData('praktik', array('id_praktik' => $id));
    if ($result) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'error'));
    }
}

}