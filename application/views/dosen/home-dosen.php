<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dosen/dist/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="col-12 mb-4">
            <div class="hero text-white hero-bg-image hero-bg-parallax"
                style="background-image: url('<?php echo base_url(); ?>assets-new-look/img/bag-hero-1.jpg');">
                <div class="hero-inner">
                    <h1>Selamat Datang, <?php echo $dsn['nama_dosen']?></h1>
                    <h4> Tahun Akademik <?php echo $tahun['ta'] ?> /
                        <?php echo$tahun['semester']?></h4>
                    <p class="lead"><strong>SISTEM INFORMASI AKADEMIK | STIKES BOGOR HUSADA</strong></p></br>



                    <div class="mt-4">
                        <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i>
                            Pengaturan Profile</a>
                    </div>
                </div>
            </div>

        </div>

</div>

</section>




</div>

</div>

<?php $this->load->view('dosen/dist/footer'); ?>

<!-- Page Specific JS File -->

<script src="http://localhost/stisla-codeigniter-master/assets/js/page/bootstrap-modal.js"></script>