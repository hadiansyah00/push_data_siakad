<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin-st/dist/header');
?>
<script src="<?php echo base_url(); ?>assets/Chart.js"></script>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jumlah Mahasiswa</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $this->db->get('mahasiswa')->num_rows(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Matakuliah</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $this->db->get('matakuliah')->num_rows(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jumlah Dosen</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $this->db->get('dosen')->num_rows(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Program Studi</h4>
                        </div>
                        <div class="card-body">
                            <?php echo $this->db->get('jurusan')->num_rows(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </section>
</div>
<?php $this->load->view('admin-st/dist/footer'); ?>