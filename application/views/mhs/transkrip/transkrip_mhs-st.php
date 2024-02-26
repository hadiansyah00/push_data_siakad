 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('mhs/dist/header');
?>
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/datatables/datatables.min.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>assets-new-look/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>assets-new-look/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

 <div class="main-content">
     <section class="section">
         <div class="section-header">
             <h1>Riwuayat Hasil Studi Mahasiswa</h1>
             <div class="section-header-breadcrumb">
                 <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                 <div class="breadcrumb-item"><a href="#">Transkrip</a></div>
             </div>
         </div>
         <div class="section-body">
             <!-- <h2 class="section-title">Nama Mahasiswa - <?php echo $mhs['nama_mhs']; ?></h2>
             <p class="section-lead">
                 <strong><?php echo $mhs['nim']; ?> - <?php echo $mhs['jurusan']; ?>
             </p> -->

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
                                     <div class="profile-widget-item-label">SEMESTER</div>
                                     <div class="profile-widget-item-value"><?php echo $mhs['semester'] ?></div>
                                 </div>
                                 <div class="profile-widget-item">
                                     <div class="profile-widget-item-label">JUMLAH SKS</div>
                                     <div class="profile-widget-item-value"> <?php echo $sks ?></div>
                                 </div>
                                 <div class="profile-widget-item">
                                     <div class="profile-widget-item-label">IPK MAHASISWA</div>
                                     <div class="profile-widget-item-value">nan</div>
                                 </div>
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




 <?php $this->load->view('mhs/dist/footer'); ?>
 <!-- JS Libraies -->
