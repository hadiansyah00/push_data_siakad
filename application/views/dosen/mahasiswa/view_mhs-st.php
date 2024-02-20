 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dosen/dist/header');
?>



 <div class="main-content">
     <section class="section">
         <div class="section-header">
             <h1>Data Mahasiswa Didik</h1>
             <div class="section-header-breadcrumb">
                 <div class="breadcrumb-item"><a href="#">Dashboard</a></div>
                 <div class="breadcrumb-item"><a href="#">Mahasiswa Didik</a></div>
                 <div class="breadcrumb-item"><a href="#">Data Mahasiswa</a></div>
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


                     </div>
                 </div>

             </div>
         </div>
     </section>
 </div>

 <script src="path/to/jquery.min.js"></script>
 <script src="path/to/bootstrap.min.js"></script>
 <script src="path/to/bootstrap-password-strength-meter.min.js"></script>
 <script>
$(document).ready(function() {
    $('.pwstrength').pwstrength();
});
 </script>

 <?php $this->load->view('dosen/dist/footer'); ?>