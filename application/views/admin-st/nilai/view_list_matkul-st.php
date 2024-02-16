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
                 <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
                 <div class="breadcrumb-item"><a href="#">Data Prog.Studi</a></div>
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
                             <!-- <a href="#" target="_blank" class="btn btn-sm btn-primary" data-toggle="modal"
                                 data-target="#tambahKurikulum"><i class="fa fa-plus"></i>Tambah
                             </a> -->
                         </div>
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table table-striped" id="table-1">
                                     <thead>
                                         <tr>
                                             <th>No</th>
                                             <th>Kode MK</th>
                                             <th>Matakuliah</th>
                                             <th>Semester</th>
                                             <th>SKS</th>



                                             <th>Aksi</th>

                                     </thead>
                                     <tbody>
                                         <?php $i = 1;
									foreach ($jadwal as $row) : ?>
                                         <?php if ($row->semester == $tahun['semester']) { ?>
                                         <tr>
                                             <td><?php echo $i++; ?></td>
                                             <td><?php echo $row->kd_mk; ?></td>
                                             <td><?php echo $row->matakuliah; ?></td>
                                             <td><?php echo $row->smt; ?></td>
                                             <td><?php echo $row->sks; ?></td>

                                             <td>
                                                 <a title="Input Nilai KHS" class="btn-sm btn-primary"
                                                     href="<?php echo base_url('admin/Nilai/input/' . $row->kd_mk . '/'); ?>"><i
                                                         class="fa fa-edit bigger-150"></i> KHS</a>
                                                 <a title="Input Nilai Akhir" class="btn-sm btn-primary"
                                                     href="<?php echo base_url('admin/Nilai/inputAkhir/' . $row->kd_mk . '/'); ?>"><i
                                                         class="fa fa-edit bigger-150">Akhir</i></a>
                                                 <a title="Input Nilai UTS" class="btn-sm btn-primary"
                                                     href="<?php echo base_url('admin/Nilai/inputUts/' . $row->kd_mk . '/'); ?>"><i
                                                         class="fa fa-edit bigger-150">UTS</i></a>
                                                 <a title="Input Nilai UAS" class="btn-sm btn-primary"
                                                     href="<?php echo base_url('admin/Nilai/inputUas/' . $row->kd_mk . '/'); ?>"><i
                                                         class="fa fa-edit bigger-150">UAS</i></a>
                                             </td>

                                         </tr>
                                         <?php } ?>
                                         <?php endforeach; ?>
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

 <div class="modal fade" tabindex="-1" role="dialog" id="tambahKurikulum">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Tambah Data Matakuliah</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form id="formTambahKurikulum">
                 <div class="modal-body">
                     <div class="modal-body">
                         <div class="form-row">
                             <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                                 value="<?= $this->security->get_csrf_hash(); ?>">
                             <div class="row">
                                 <div class="form-group col-md-12">
                                     <label>Kurikulum</label>
                                     <?php $kd_jurusan = $this->uri->segment(4); ?>
                                     <input type="text" name="kd_jurusan" value="<?php echo $kd_jurusan; ?>">
                                     <select name="matkul" class="form-control">
                                         <option> --Pilih Matakuliah-- </option>
                                         <?php foreach ($matkul as $row) { ?>
                                         <?php if ($row->semester == $tahun['semester']) { ?>
                                         <option value="<?php echo $row->kd_mk; ?>">SMT <?php echo $row->smt; ?> -
                                             <?php echo $row->kd_mk; ?> - <?php echo $row->matakuliah; ?> - SKS
                                             <?php echo $row->sks; ?></option>
                                         <?php } ?>
                                         <?php } ?>
                                     </select>
                                 </div>
                             </div>
                             <div class="form-group col-md-12">
                                 <label>Nama Dosen Pengajar 1</label>
                                 <select name="peran" class="form-control">
                                     <option value="0"> --Dosen Pengajar 1-- </option>
                                     <?php foreach ($dosen_1 as $ds) : ?>
                                     <option value="<?php echo $ds->id_peran; ?>">
                                         <?php echo $ds->nama_dosen; ?></option>
                                     <?php endforeach; ?>
                                 </select>
                             </div>
                             <div class="form-group col-md-12">
                                 <label>Nama Dosen Pengajar 2</label>
                                 <select name="perdos" class="form-control">
                                     <option value="0"> --Dosen Pengajar 2-- </option>
                                     <?php foreach ($dosen_2 as $sd) : ?>
                                     <option value="<?php echo $sd->id_perdos; ?>">
                                         <?php echo $sd->nama_dosen; ?></option>
                                     <?php endforeach; ?>
                                 </select>
                             </div>

                         </div>
                     </div>
                     <div class="modal-footer bg-whitesmoke br">
                         <button type="submit" class="btn btn-primary">Simpan</button>
                     </div>
             </form>
         </div>
     </div>
 </div>

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
 <script src="<?php echo base_url(); ?>assets-new-look/js/page/modules-datatables.js"></script>

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
