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
            <h1>Data Evaluasi Dosen</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
                <div class="breadcrumb-item"><a href="#">Data Pertanyaan</a></div>
                <!-- <div class="breadcrumb-item">DataTables</div> -->
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="#" target="_blank" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#tambahDosen"><i class="fa fa-plus"></i>Tambah
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pertanyaan</th>
                                            <th>_</th>
											<th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
									foreach ($list_kus as $row) : ?>

                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row->pertanyaan; ?></td>
                                          
                                               
										<td>
											_
										</td>
                                        <td>
											 <!-- Tambahkan data-nilai pada tombol Edit -->
											 <button type="button" class="btn btn-primary btn-sm btn-edit"
                                                    data-id-eval="<?php echo $row->id_eval; ?>"
                                                    data-quest="<?php echo $row->pertanyaan; ?>"
                                                  
                                                    data-toggle="modal" data-target="#editEvalDosen">
                                                    Edit
                                                </button>
										<button type="button" class="btn btn-danger btn-sm btn-delete"
                                                    data-id-eval="<?php echo $row->id_eval; ?>">
                                                    Delete
										</button>
										</td>   
										
                                           
                                        </tr>
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

<!-- Modal Tambah Data -->
<div class="modal fade" tabindex="-1" role="dialog" id="tambahDosen">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Evaluasi Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="formTambahEval" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-row">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                                value="<?= $this->security->get_csrf_hash(); ?>">              
                        </div>
                        <div class="form-group">
                            <label for="pertanyaan">Pertanyaan Evaluasi</label>
                            <textarea type="textarea" class="form-control" name="pertanyaan" placeholder="Pertanyaan Evaluasi Dosen"
                                required></textarea>
                            <div class="invalid-feedback">
                                Please provide a valid Text Area
                            </div>
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
<!-- Modal Edit data Dosen -->
<div class="modal fade" id="editEvalDosen" tabindex="-1" role="dialog" aria-labelledby="editEvalDosenlLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEvalDosenlLabel">Edit Data Pertanyaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editFormEval" method="POST" action="<?php echo base_url('admin/evaluasi/update'); ?>"
                class="needs-validation" novalidate>
                <div class="modal-body">
                    <!-- Add your form fields here -->
                    <input type="hidden" id="id_eval" name="id_eval">
                    
                    <div class="form-group">
                        <label for="editQuest">Evaluasi Pertanyaan</label>
						
                        <textarea class="form-control" id="editQuest" name="pertanyaan" required></textarea>
                    </div>
              
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
            </form>
        </div>
    </div>
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

<!-- Pastikan Anda sudah menyertakan SweetAlert library -->
<script src="<?php echo base_url(); ?>assets-new-look/modules/sweetalert/sweetalert.min.js"></script>

<script src="<?php echo base_url(); ?>assets-new-look/js/page/modules-sweetalert.js"></script>

<script>
$(document).ready(function() {
    // Form submit event
    $('#formTambahEval').submit(function(e) {
        e.preventDefault();
        var csrfName = '<?= $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?= $this->security->get_csrf_hash(); ?>';

        // Get form data with CSRF token
        var formData = $(this).serialize() + '&' + csrfName + '=' + csrfHash;

        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('admin/evaluasi/insert'); ?>',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Use SweetAlert for success
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Data berhasil disimpan',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Optionally update UI here (e.g., append a new row to a table)
                            // ...
                            window.location.reload();
                            // Close the modal
                            $('#tambahEval').modal('hide');
                        }
                    });
                } else {
                    // Use SweetAlert for error
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function(error) {
                console.log('AJAX Error:', error);

                // Use SweetAlert for AJAX error
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred during the AJAX request.',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});
</script>
<script>
$(document).ready(function() {
    // Fungsi untuk menampilkan nilai pada form modal saat tombol Edit diklik
    $(document).on('click', '.btn-edit', function() {
        var id_eval = $(this).data('id-eval');
        var quest = $(this).data('quest');
     


        // Isikan nilai ke dalam form modal
        $('#id_eval').val(id_eval);
        $('#editQuest').val(quest);
 
        // $('#editPassword').val(password);
    });

    $('#editFormEval').submit(function(e) {
        e.preventDefault();

        // Get form data and append CSRF token
        var formData = $(this).serialize();
        formData +=
            '&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>';

        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('admin/evaluasi/update'); ?>',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Display success message using SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 2000
                    }).then(function() {
                        // Reload the page after the delay
                        window.location.reload();
                    });
                } else {
                    // Display error message using SweetAlert
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
    });
});
</script>

<script>
// Fungsi untuk menampilkan nilai pada form modal saat tombol Delete diklik
$(document).on('click', '.btn-delete', function() {
    var idEval = $(this).data('id-eval');

    // Include CSRF token dalam data
    var formData = {
        id_eval: idEval,
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
                url: '<?php echo base_url('admin/evaluasi/deleteeval'); ?>',
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
