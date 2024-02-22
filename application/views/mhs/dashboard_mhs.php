<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('mhs/dist/header');
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
                    <h1>Selamat Datang, <?php echo $mhs['nama_mhs']?></h1>
                    <h4> Tahun Akademik <?php echo $tahun['ta'] ?> /
                        <?php echo$tahun['semester']?></h4>
                    <p class="lead"><strong>SISTEM INFORMASI AKADEMIK | STIKES BOGOR HUSADA</strong></p></br>



                    <div class="mt-4">
                        <a href="<?php echo base_url(); ?>mhs/profil"
                            class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i>
                            Pengaturan Profile</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="card-header">
                    <h2 class="text-center">Informasi <i>SIAKAD SBH</i> </h2>
                    <h5>List Pembaharuan</h5>
                    <ul>
                        <li>Tampilan UI</li>
                        <li>Input KRS (Centang Matakuliah yang dipilih kemudian disimpan)</li>
                        <li>Pengisian EDOM Mahasiswa</li>
                    </ul>
                    <h5>Masih Dalam Proses Pengembangan</h5>
                    <ul>
                        <li>Menu Dashboard</li>
                        <li>Cetak / Lihat KHS</li>
                        <li>Transkrip Nilai</li>

                    </ul>
                    <h4>Catatan</h4>
                    <p><strong><i>Untuk Mengganti Semester yang sedang di tempuh berada di Menu Pengaturan Profile /
                                Setting kemudian Pilih tab Informasi Akademik</i></strong></p>
                </div>
            </div>
        </div>

</div>

</section>




</div>

</div>

<?php $this->load->view('mhs/dist/footer'); ?>

<!-- Page Specific JS File -->

<script src="http://localhost/stisla-codeigniter-master/assets/js/page/bootstrap-modal.js"></script>
