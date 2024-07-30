<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GetPraktikum extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //url security
        $this->ModelSecurity->getSecurity();
        $this->load->model('EdomModel');
        $this->load->model('KurikulumModel');
    }

   
    public function index()
    {
        $data['title'] = 'Modul Matakuliah Praktikum SBH';
        $data['judul'] = 'Akademik';
        $data['subJudul'] = 'Matakuliah Praktikum';

        $ta = $this->input->post('ta');
        $jurusan = $this->input->post('jurusan');
        $matakuliah = $this->input->post('matakuliah');
        $dosen = $this->input->post('dosen');

        // Proses data
        if ($ta && $jurusan && $matakuliah && $dosen) {
            $data['result'] = $this->EdomModel->get_data($ta, $jurusan, $matakuliah, $dosen);
        }

        $this->load->view('admin-st/kurikulum/praktikum-st', $data);
    }
	 public function lama()
    {
        $data['title'] = 'Modul Matakuliah Praktikum SBH';
        $data['judul'] = 'Akademik';
        $data['subJudul'] = 'Matakuliah Praktikum';

        $ta = $this->input->post('ta');
        $jurusan = $this->input->post('jurusan');
        $matakuliah = $this->input->post('matakuliah');
        $dosen = $this->input->post('dosen');

        // Proses data
        if ($ta && $jurusan && $matakuliah && $dosen) {
            $data['result'] = $this->EdomModel->get_data($ta, $jurusan, $matakuliah, $dosen);
        }

        $this->load->view('admin-st/kurikulum/praktikum-st', $data);
    }

    public function get_dropdown_data() {
        // Ambil data untuk dropdown (misalnya, dari database)
        $data['ta'] = $this->EdomModel->get_tahun_ajaran();
        $data['jurusan'] = $this->EdomModel->get_jurusan();
        $data['matakuliah'] = $this->EdomModel->get_matakuliah();
        $data['dosen'] = $this->EdomModel->get_dosen();

        // Kirim hasil dalam bentuk JSON
        echo json_encode($data);
    }
}