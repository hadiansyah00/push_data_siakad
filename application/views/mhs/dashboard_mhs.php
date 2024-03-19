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
                style="background-image: url('<?php echo base_url(); ?>assets/img/bg-orange-sbh.jpg');">
                <div class="hero-inner">
                    <h1>Selamat Datang, <?php echo $mhs['nama_mhs']?></h1>
                    <h4> Tahun Akademik <?php echo $tahun['ta'] ?>
                        <?php echo$tahun['semester']?></h4>
                    <p class="lead"><strong>SISTEM INFORMASI AKADEMIK | STIKES BOGOR HUSADA</strong></p></br>
                    <div class="mt-4">

                        <a href="<?php echo base_url(); ?>mhs/profil"
                            class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i>
                            Pengaturan Profile</a>
                        <div class="card-title text-center">
                            <h1>Kalender Akademik</h1>
                        </div>
                        <tbody>
                            <?php
							$i = 1;
								foreach ($getKaldik as $row) { ?>
                            <tr>
                                <td>
                                    <embed src="<?php echo base_url('./assets/images/uploads/' . $row->nama_berkas); ?>"
                                        width="900" height="800" type="application/pdf">
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="card-header">


                </div>
            </div>
            <div class="card-body">
                <div class="card-header">
                    <h2 class="text-center">Informasi <i>SIAKAD SBH</i> </h2>
                    <h5>List Pembaharuan</h5>
                    <ul>
                        <li>
                            <p>Link Untuk List Perbaikan SIAKAD </p> <a
                                href="<?php echo base_url('mhs/AktivitasMhs') ?>" class="btn btn-primary">Klik
                                Disini</a>
                        </li>
                    </ul>
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