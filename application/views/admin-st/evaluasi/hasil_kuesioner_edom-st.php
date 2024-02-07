<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin-st/dist/header');
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/datatables/datatables.min.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>assets-new-look/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>assets-new-look/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Hasil Penilaian Evaluasi Dosen</h1>

        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">

                                    <tbody>
                                        <tr>
                                            <td style="width: 130px;">
                                                <strong>NIDN</strong>
                                            </td>
                                            <td style="width: 3px;"><strong>:</strong></td>
                                            <td style="width: 110px; text-align: left;">
                                                <strong><?php echo $dosen_info->nidn; ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 130px;">
                                                <strong>Nama Dosen</strong>
                                            </td>
                                            <td style="width: 3px;"><strong>:</strong></td>
                                            <td style="width: 110px; text-align: left;">
                                                <strong><?php echo $dosen_info->nama_dosen; ?></strong>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style="width: 130px;">
                                                <strong>Program Studi</strong>
                                            </td>
                                            <td style="width: 3px;"><strong>:</strong></td>
                                            <td style="width: 110px; text-align: left;">
                                                <strong><?php echo $info_dosen[0]->jurusan; ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 130px;">
                                                <strong>Nama Matakuliah</strong>
                                            </td>
                                            <td style="width: 3px;"><strong>:</strong></td>
                                            <td style="width: 10px; text-align: left;">
                                                <strong><?php echo $info_dosen[0]->matakuliah; ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 130px;">
                                                <strong>Jumlah Mahasiswa</strong>
                                            </td>
                                            <td style="width: 3px;"><strong>:</strong></td>
                                            <td style="width: 10px; text-align: left;">
                                                <strong><?php echo $list_mhs; ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 130px;">
                                                <strong>Jumlah Responden Mahasiswa</strong>
                                            </td>
                                            <td style="width: 3px;"><strong>:</strong></td>
                                            <td style="width: 10px; text-align: left;">
                                                <strong><?php echo $jumlah_mahasiswa; ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 130px;">
                                                <strong>Tahun Ajaran</strong>
                                            </td>
                                            <td style="width: 3px;"><strong>:</strong></td>
                                            <td><?php echo $tahun['ta']; ?> / <?php echo $tahun['semester']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">

                                        <tbody>
                                            <tr>
                                                <td style="width: 130px;">
                                                    <strong>NIDN</strong>
                                                </td>
                                                <td style="width: 3px;"><strong>:</strong></td>
                                                <td style="width: 110px; text-align: left;">
                                                    <strong><?php echo $dosen_info->nidn; ?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 130px;">
                                                    <strong>Nama Dosen</strong>
                                                </td>
                                                <td style="width: 3px;"><strong>:</strong></td>
                                                <td style="width: 110px; text-align: left;">
                                                    <strong><?php echo $dosen_info->nama_dosen; ?></strong>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td style="width: 130px;">
                                                    <strong>Program Studi</strong>
                                                </td>
                                                <td style="width: 3px;"><strong>:</strong></td>
                                                <td style="width: 110px; text-align: left;">
                                                    <strong><?php echo $info_dosen[0]->jurusan; ?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 130px;">
                                                    <strong>Nama Matakuliah</strong>
                                                </td>
                                                <td style="width: 3px;"><strong>:</strong></td>
                                                <td style="width: 10px; text-align: left;">
                                                    <strong><?php echo $info_dosen[0]->matakuliah; ?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 130px;">
                                                    <strong>Jumlah Mahasiswa</strong>
                                                </td>
                                                <td style="width: 3px;"><strong>:</strong></td>
                                                <td style="width: 10px; text-align: left;">
                                                    <strong><?php echo $list_mhs; ?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 130px;">
                                                    <strong>Jumlah Responden Mahasiswa</strong>
                                                </td>
                                                <td style="width: 3px;"><strong>:</strong></td>
                                                <td style="width: 10px; text-align: left;">
                                                    <strong><?php echo $jumlah_mahasiswa; ?></strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 130px;">
                                                    <strong>Tahun Ajaran</strong>
                                                </td>
                                                <td style="width: 3px;"><strong>:</strong></td>
                                                <td><?php echo $tahun['ta']; ?> / <?php echo $tahun['semester']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </section>
</div>
<?php $this->load->view('admin-st/dist/footer'); ?>
<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>assets-new-look/modules/datatables/datatables.min.js"></script>
<script
    src="<?php echo base_url(); ?>assets-new-look/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js">
</script>

<script src="<?php echo base_url(); ?>assets-new-look/modules/datatables/Select-1.2.4/js/dataTables.select.min.js">
</script>

<script src="<?php echo base_url(); ?>assets-new-look/modules/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets-new-look/js/page/modules-datatables.js"></script>
<script src="<?php echo base_url(); ?>assets-new-look/modules/sweetalert/sweetalert.min.js"></script>

<script src="<?php echo base_url(); ?>assets-new-look/js/page/modules-sweetalert.js"></script>