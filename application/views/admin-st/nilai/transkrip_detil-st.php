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
            <h1>Transkrip Nilai Mahasiswa <?php echo $tahun['ta']; ?> / <?php echo $tahun['semester']; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
                <div class="breadcrumb-item"><a href="#">Data Program Studi</a></div>
                <!-- <div class="breadcrumb-item">Data Kurikulum</div> -->
            </div>
        </div>
        <div class="section-body">

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <?php if($mhs['photo'] == 'default.jpg'){ ?>
                            <img alt="image" src="<?php echo base_url('assets/images/default.jpg'); ?>"
                                class="rounded-circle profile-widget-picture">
                            <?php }else{ ?>
                            <img alt="image" src="<?php echo base_url('assets/images/uploads/'.$mhs['photo']); ?>"
                                class="rounded-circle profile-widget-picture">
                            <?php } ?>
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">STATUS</div>
                                    <div class="profile-widget-item-value">nan</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">JUMLAH SKS</div>
                                    <div class="profile-widget-item-value">nan</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">JUMLAH MATAKULIAH</div>
                                    <div class="profile-widget-item-value">nan</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="card-header section-title">
                                    Profile Mahasiswa
                                </div>
                                <table class="table medium xs">
                                    <tbody>
                                        <tr>
                                            <td style="width: 90px;">
                                                <strong>Nama</strong>
                                            </td>

                                            <td style="width: 70px; text-align: left;">
                                                <strong>: <?php echo $mhs['nama_mhs']; ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 90px;">
                                                <strong>JK</strong>
                                            </td>

                                            <td style="width: 70px; text-align: left;">
                                                <strong>: <?php echo $mhs['jk']; ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 90px;">
                                                <strong>TTL</strong>
                                            </td>

                                            <td style="width: 90px; text-align: left;">
                                                <strong>:
                                                    <?php echo $mhs['tempat_lahir'] . ', ' . $mhs['tgl_lahir']; ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 90px;">
                                                <strong>Kota</strong>
                                            </td>

                                            <td style="width: 10px; text-align: left;">
                                                <strong>: <?php echo $mhs['hp']; ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 90px;">
                                                <strong>Kota</strong>
                                            </td>

                                            <td style="width: 70px; text-align: left;">
                                                <strong>: <?php echo $mhs['email']; ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 90px;">
                                                <strong>Kota</strong>
                                            </td>

                                            <td style="width: 70px; text-align: left;">
                                                <strong>: <?php echo $mhs['kota']; ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 90px;">
                                                <strong>Alamat</strong>
                                            </td>

                                            <td style="width: 300px; text-align: left;">
                                                <strong>: <?php echo $mhs['alamat']; ?></strong>
                                            </td>

                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="card-header section-title">
                                    Profile Orang Tua
                                </div>
                                <table class="table medium xs">
                                    <tbody>
                                        <tr>
                                            <td style="width: 90px;">
                                                <strong>Nama Ayah</strong>
                                            </td>

                                            <td style="width: 110px; text-align: left;">
                                                <strong><?php echo $mhs['nama_ayah']; ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 90px;">
                                                <strong>Nama Ibu</strong>
                                            </td>

                                            <td style="width: 110px; text-align: left;">
                                                <strong><?php echo $mhs['nama_ibu']; ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 90px;">
                                                <strong>No. Telepon</strong>
                                            </td>

                                            <td style="width: 10px; text-align: left;">
                                                <strong><?php echo $mhs['hp_ortu']; ?></strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 90px;">
                                                <strong>Alamat</strong>
                                            </td>

                                            <td style="width: 300px; text-align: left;">
                                                <strong><?php echo $mhs['alamat_ortu']; ?></strong>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="card-header section-title">
                                    Trankrip Nilai Mahasiswa
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Matakuliah</th>
                                            <th>Nama Matakuliah</th>
                                            <th>SKS</td>
                                            <th>HM</th>
                                            <th>AM</th>
                                            <th rowspan=" 2"> SKS X AM </th>
                                        </tr>
                                        <tbody>
                                            <?php
												$sks = 0;
												$totalBobot2 = 0;
												$i = 1;
												foreach ($viewKrs as $row) {
													$sks += $row->sks;
													$bobot = 0;
													if ($row->nilai == 'A') {
														$bobot = 4.00;
													} elseif ($row->nilai == 'AB') {
														$bobot = 3.75;
													} elseif ($row->nilai == 'BA') {
														$bobot = 3.50;
													} elseif ($row->nilai == 'B') {
														$bobot = 3.00;
													} elseif ($row->nilai == 'BC') {
														$bobot = 2.75;
													} elseif ($row->nilai == 'C') {
														$bobot = 2.00;
													} elseif ($row->nilai == 'D') {
														$bobot = 1.00;
													} elseif ($row->nilai == 'E') {
														$bobot = 0;
													}

													$bobot2 = $bobot * $row->sks;
													$totalBobot2 += $bobot2;
													?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $row->kd_mk; ?></td>
                                                <td><?php echo $row->matakuliah; ?></td>
                                                <td><?php echo $row->sks; ?></td>
                                                <td><?php echo $row->nilai; ?></td>
                                                <td><?php echo $bobot; ?></td>
                                                <td><?php echo $bobot2; ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>

                                        <tr>
                                            <th colspan="6" align="center">Jumlah SKS</th>
                                            <th><strong><?php echo $sks; ?></strong></th>
                                        </tr>

                                        <tr>
                                            <th colspan="6" align="center">Jumlah SKS x AM </th>
                                            <th><strong><?php echo $totalBobot2; ?></strong></th>
                                        </tr>
                                        <tr>
                                            <th colspan="6" align="center">IPK (Indeks Prestasi Kumulatif) </th>
                                            <th><strong>
                                                    <?php echo number_format($hasil = $totalBobot2 / $sks, 2); ?></strong>
                                            </th>

                                        </tr>


                                        <tr>
                                            <th colspan="6" align="center">Predikat</th>
                                            <th><strong><?php
											if ($hasil >= 3.51 && $hasil <= 4.00) {
												echo "Dengan Pujian";
											} elseif ($hasil >= 3.01 && $hasil <= 3.50) {
												echo "Sangat Memuaskan";
											} elseif ($hasil >= 2.76 && $hasil <= 3.00) {
												echo "Memuaskan";
											} elseif ($hasil >= 2.00 && $hasil <= 2.75) {
												echo "Kurang Memuaskan";
											} elseif ($hasil >= 1 && $hasil <= 1.99) {
												echo "Gagal";
											} else {
												echo "Null";
											}
											?></strong>
                                            </th>

                                        </tr>
                                        <tr>
                                            <th colspan="6"></th>
                                        </tr>
                                    </table>

                                </div>

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
