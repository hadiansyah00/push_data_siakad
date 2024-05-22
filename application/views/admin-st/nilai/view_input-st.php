 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin-st/dist/header');
?>
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/datatables/datatables.min.css">
 <link rel="stylesheet"
     href="<?php echo base_url(); ?>assets-new-look/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">

 <!-- Main Content -->
 <div class="main-content">
     <section class="section">
         <div class="section-header">
             <h1>Data Matakuliah</h1>
             <div class="section-header-breadcrumb">
                 <div class="breadcrumb-item"><a href="<?php echo base_url ('admin/nilai') ?>">Data Prog.Studi</a></div>
                 <div class="breadcrumb-item"><a
                         href="<?php echo base_url ('admin/nilai/getMatkul/'. $kd_jurusan . '/') ?>"> Data
                         Matakuliah (Input Nilai) </a></div>
                 <div class="breadcrumb-item"><a href="#">Input Nilai</a></div>
             </div>
         </div>

         <div class="section-body">

             <div class="box-body col-md-5">

             </div>
             <div class="row">
                 <div class="col-12">
                     <div class="card">
                         <div class="card-header">
                             <table class="table">
                                 <tbody>
                                     <tr>
                                         <th>Matakuliah</th>
                                         <td> : </td>
                                         <td><?php echo $matkul['matakuliah']; ?></td>
                                     </tr>
                                     <tr>
                                         <th>Semester</th>
                                         <td> : </td>
                                         <td><?php echo $matkul['smt']; ?></td>
                                     </tr>
                                     <tr>
                                         <th>Tahun Akademik</th>
                                         <td> : </td>
                                         <td><?php echo $tahun['ta']; ?> / <?php echo $tahun['semester']; ?></td>
                                     </tr>
                                 </tbody>

                             </table>
                         </div>
                         <div class="card-body">

                             <?php echo $this->session->flashdata('pesan'); ?>
                             <div class="table-responsive">
                                 <form method="post"
                                     action="<?php echo base_url('admin/nilai/input_nilai_aksi/' . $matkul['kd_mk']); ?>">

                                     <table class="table table-striped">
                                         <thead>
                                             <tr>
                                                 <th data-field="no">No</th>
                                                 <th data-field="nim">NIM</th>
                                                 <th data-field="nama">Nama</th>
                                                 <th data-field="nilai">KHS</th>
                                                 <th data-field="nilai">Nilai AKhir</th>
                                                 <th data-field="nilai">UTS</th>
                                                 <th data-field="nilai">UAS</th>
                                         </thead>
                                         <tbody>
                                             <?php $i = 1;
											foreach ($mahasiswa as $row) { ?>
                                             <tr>
                                                 <td><?php echo $i++; ?></td>
                                                 <td><?php echo $row->nim; ?></td>
                                                 <td><?php echo $row->nama_mhs . ' ' . $row->nama_kepanjangan; ?></td>

                                                 <input type="hidden" name="id_krs[]"
                                                     value="<?php echo $row->id_krs; ?>">
                                                 <input type="hidden"
                                                     name="<?php echo $this->security->get_csrf_token_name(); ?>"
                                                     value="<?php echo $this->security->get_csrf_hash(); ?>">
                                                 <td>
                                                     <input class="form-control" style="width: 50px;" type="text"
                                                         name="nilai[]" onkeydown="upperCaseF(this)" maxlength="2"
                                                         value="<?php echo $row->nilai; ?>">
                                                 </td>
                                                 <td>
                                                     <input class="form-control" style="width: 50px;" type="text"
                                                         name="nilai_akhir[]" onkeydown="upperCaseF(this)" maxlength="2"
                                                         value="<?php echo $row->nilai_akhir; ?>">

                                                 </td>
                                                 <td>
                                                     <input class="form-control text-center" style="width: 70px;"
                                                         type="text" name="nilai_uts[]" onkeydown="upperCaseF(this)"
                                                         maxlength="5" value="<?php echo $row->nilai_uts; ?>">
                                                 </td>

                                                 <td>
                                                     <!-- Input untuk nilai UAS -->
                                                     <input class="form-control text-center" style="width: 70px;"
                                                         type="text	" name="nilai_uas[]" onkeydown="upperCaseF(this)"
                                                         maxlength="5" value="<?php echo $row->nilai_uas; ?>">
                                                 </td>



                                             </tr>
                                             <?php } ?>
                                         </tbody>
                                     </table>


                                     <br>
                                     <button style="width: 300px;" type="submit" class="btn btn-primary">Simpan</button>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

         </div>
     </section>
 </div>
 <?php $this->load->view('admin-st/dist/footer'); ?>
 <script>
function upperCaseF(a) {
    setTimeout(function() {
        a.value = a.value.toUpperCase();
    }, 1);
}
 </script>

 <!-- JS Libraies -->
 <!-- Pastikan Anda sudah menyertakan SweetAlert library -->
 <script src="<?php echo base_url(); ?>assets-new-look/modules/sweetalert/sweetalert.min.js"></script>

 <script src="<?php echo base_url(); ?>assets-new-look/js/page/modules-sweetalert.js"></script>
 <script src="<?php echo base_url(); ?>assets-new-look/modules/datatables/datatables.min.js"></script>
 <script src="<?php echo base_url(); ?>assets-new-look/modules/datatable
s/DataTables-1.10.16/js/dataTables.bootstrap4.min.js">
 </script>

 <script src="<?php echo base_url(); ?>assets-new-look/modules/datatables/Select-1.2.4/js/dataTables.select.min.js">
 </script>


 <script src="<?php echo base_url(); ?>assets-new-look/modules/jquery-ui/jquery-ui.min.js"></script>
 <script src="<?php echo base_url(); ?>assets-new-look/js/page/modul
es-datatables.js"></script>

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>