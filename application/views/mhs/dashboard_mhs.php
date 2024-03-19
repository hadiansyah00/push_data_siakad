<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('mhs/dist/header');
?>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/datatables/datatables.min.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>assets-new-look/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>assets-new-look/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
<!-- Main Content -->
<style>
.pdf-container {
    position: relative;
    width: 100%;
    padding-top: 56.25%;
    /* Rasio lebar-tinggi untuk ukuran responsif (misalnya 16:9) */
    overflow: hidden;
    max-width: 800px;
    /* Lebar maksimum kontainer */
    margin: 0 auto;
    /* Pusatkan kontainer */
}

.pdf-container embed {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

/* Atur ukuran kontainer untuk perangkat seluler */
@media screen and (max-width: 600px) {
    .pdf-container {
        padding-top: 75%;
        /* Rasio lebar-tinggi untuk perangkat seluler */
    }
}
</style>
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
                        <div class="mt-3">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>

                                            <th class="text-white">
                                                <i class="far fa-calendar-alt"></i>
                                                <h2>Kalender Akademik</h2>
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
									
									foreach ($getKaldik as $row) {	?>
                                        <tr>

                                            <td>
                                                <a class="btn btn-outline-white btn-lg btn-icon icon-left"
                                                    href="<?php echo base_url('admin/kaldik/download_file/' . $row->id_kaldik); ?>"><i
                                                        class="far fa-file"></i>Download
                                                    KALDIK</a>
                                                <hr>
                                                <div class="pdf-container">
                                                    <embed
                                                        src="<?php echo base_url('./assets/images/uploads/' . $row->nama_berkas); ?>"
                                                        type="application/pdf" width="100%" height="600px" />
                                                </div>

                                            </td>

                                        </tr>
                                        <?php } ?>
                                    </tbody>

                                </table>

                            </div>
                        </div>

                    </div>
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

<script src="<?php echo base_url(); ?>assets-new-look/modules/datatables/datatables.min.js"></script>
<script
    src="<?php echo base_url(); ?>assets-new-look/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js">
</script>

<script src="<?php echo base_url(); ?>assets-new-look/modules/datatables/Select-1.2.4/js/dataTables.select.min.js">
</script>

<sc src="<?php echo base_url(); ?>assets-new-look/modules/jquery-ui/jquery-ui.min.js"></sc rip t>
<script src="<?php echo base_url(); ?>assets-new-look/js/page/modules-datatables.js"></script>