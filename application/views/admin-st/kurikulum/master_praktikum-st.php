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
             <h1>Data Matakuliah Praktikum</h1>
             <div class="section-header-breadcrumb">
                 <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
                 <div class="breadcrumb-item"><a href="#">Data Prog.Studi</a></div>
                 <div class="breadcrumb-item"><a href="#">Data Matakuliah</a></div>
             </div>
         </div>

         <div class="section-body">

             <div class="box-body col-md-5">
                 <table class="table">
                     <tbody>
                         <?php foreach ($detil as $row) : ?>
                         <tr>
                             <th>Kode Jurusan</th>
                             <td> : </td>
                             <td><?php echo $row->kd_jurusan; ?> - <?php echo $row->singkat; ?></td>
                         </tr>
                         <tr>
                             <th>Jurusan</th>
                             <td> : </td>
                             <td><?php echo $row->jenjang; ?> - <?php echo $row->jurusan; ?></td>
                         </tr>
                         <?php endforeach; ?>
                         <tr>
                             <th>Tahun Akademik</th>
                             <td> : </td>
                             <td><?php echo $tahun['ta']; ?> / <?php echo $tahun['semester']; ?></td>
                         </tr>
                     </tbody>

                 </table>
             </div>
             <div class="row">
                 <div class="col-12">
                     <div class="card">
                         <div class="card-header">
                             <a href="#" target="_blank" class="btn btn-sm btn-primary" data-toggle="modal"
                                 data-target="#tambahKurikulum"><i class="fa fa-plus"></i>Tambah
                             </a>
                         </div>
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table table-striped" id="table-1">
                                     <thead>
                                         <tr>
                                             <th>#</th>
                                             <th>Tahun Akademik</th>
                                             <th>Kode MK</th>
                                             <th>Matakuliah</th>
                                             <th>Semester</th>
                                             <th>SKS</th>
                                             <th>Dosen</th>
                                             <th>Actions</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php $i = 1;
   										 foreach ($prak as $row) { ?>
                                         <?php if ($row->semester == $tahun['semester'] && $row->status == $tahun['status']) { ?>
                                         <tr>
                                             <td><?= $i++; ?></td>
                                             <td><?= $row->ta; ?></td>
                                             <td><?= $row->kd_mk; ?></td>
                                             <td><?= $row->matakuliah; ?></td>
                                             <td><?= $row->smt; ?></td>
                                             <td><?= $row->sks; ?></td>
                                             <td>
                                                 <?= $this->KurikulumModel->getDosenNameById_peran($row->id_perdos); ?><br>
                                                 <hr>
                                                 <?= $this->KurikulumModel->getDosenNameById($row->id_peran); ?>
                                             </td>
                                             <td>
                                                 <!-- <button type="button" class="btn btn-success btn-sm btn-edit"
                                                     data-id="<?= $row->id_kurikulum; ?>" data-toggle="modal"
                                                     data-target="#editModal">Edit</button> -->

                                                 <button type="button" class="btn btn-danger btn-sm btn-delete"
                                                     data-id="<?= $row->id_praktik; ?>">Delete</button>

                                             </td>
                                         </tr>
                                         <?php } ?>
                                         <?php } ?>
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
                 <h5 class="modal-title">Tambah Data Matakuliah Praktikum</h5>
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
                                     <input type="hidden" name="kd_jurusan" value="<?php echo $kd_jurusan; ?>">
                                     <select name="matkul" class="form-control">
                                         <option> --Pilih Matakuliah Praktikum-- </option>
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

 <!-- jQuery and Bootstrap JavaScript for handling modal -->

 <script>
$(document).ready(function() {
    $('#formTambahKurikulum').submit(function(e) {
        e.preventDefault();

        // Dapatkan data formulir
        var formData = $(this).serialize();

        // Kirim AJAX request
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('admin/praktikum/insert'); ?>',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Tampilkan modal SweetAlert dengan pesan sukses
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: response.message,
                        showCancelButton: false,
                        showConfirmButton: true,
                        confirmButtonText: 'OK'
                    }).then(function(result) {
                        window.location.reload();
                        // Close the modal
                        $('#tambahKurikulum').modal('hide');
                        // Redirect ke halaman lain jika diperlukan
                        // window.location.href = 'halaman_lain.php';

                    });
                } else {
                    // Tampilkan modal SweetAlert dengan pesan error
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message,
                        showCancelButton: false,
                        showConfirmButton: true,
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function(error) {
                // Tampilkan pesan error jika terjadi kesalahan
                console.log('AJAX Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred during the AJAX request.',
                    showCancelButton: false,
                    showConfirmButton: true,
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});
 </script>
 <script>
// Fungsi untuk menampilkan nilai pada form modal saat tombol Delete diklik
$(document).on('click', '.btn-delete', function() {
    var id_praktik = $(this).data('id');

    // Include CSRF token dalam data
    var formData = {
        id_praktik: id_praktik,
        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
    };

    // Gunakan SweetAlert untuk konfirmasi
    Swal.fire({
        title: 'Apakah Anda yakin untuk menghapus data?',
        text: 'Data yang dihapus tidak dapat dikembalikan!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Pengguna mengonfirmasi, kirim permintaan AJAX untuk menghapus
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('admin/kurikulum/delete'); ?>',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        // Berhasil dihapus, tampilkan pesan sukses
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        }).then(function() {
                            // Secara opsional reload halaman atau perbarui UI
                            location.reload();
                        });
                    } else {
                        // Gagal dihapus, tampilkan pesan kesalahan
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: response.message
                        });
                    }
                },
                error: function(error) {
                    console.log('AJAX Error:', error);
                }
            });
        }
    });
});
 </script>
 <!-- JS Libraies -->
 <!-- Pastikan Anda sudah menyertakan SweetAlert library -->
 <script src="<?php echo base_url(); ?>assets-new-look/modules/sweetalert/sweetalert.min.js"></script>

 <script src="<?php echo base_url(); ?>assets-new-look/js/page/modules-sweetalert.js"></script>
 <script src="<?php echo base_url(); ?>assets-new-look/modules/datatables/datatables.min.js"></script>
 <script
     src="<?php echo base_url(); ?>assets-new-look/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js">
 </script>

 <script src="<?php echo base_url(); ?>assets-new-look/modules/datatables/Select-1.2.4/js/dataTables.select.min.js">
 </script>


 <script src="<?php echo base_url(); ?>assets-new-look/modules/jquery-ui/jquery-ui.min.js"></script>
 <script src="<?php echo base_url(); ?>assets-new-look/js/page/modules-datatables.js"></script>

 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
