<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin-st/dist/header');
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/datatables/datatables.min.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>assets-new-look/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>assets-new-look/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
<!-- setting krs-->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Pengaturan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Pengaturan</a></div>
                <!-- <div class="breadcrumb-item"><a href="#">Data Mahasiswa</a></div> -->
                <!-- <div class="breadcrumb-item">DataTables</div> -->
            </div>
        </div>
        <!-- Tabel Setting Kartu Rencana Studi -->
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">Setting Pembukan / Pengisian KRS</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Tahun Akademik</th>
                                            <th>Semester</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <?php if ($status['status'] == 0) {
												echo "<span class='badge badge-pill badge-danger mb-1 float-right''>
                                                            <i class='ace-icon fa fa-close bigger-120'></i> Tidak-Aktif
                                                     </span>";
											} else {
												echo "<span class='badge badge-pill badge-success mb-1 float-right''>
                                                        <i class='ace-icon fa fa-check bigger-150'></i> Aktif
                                                     </span>";
											} ?>
                                            </td>
                                            <td>Kartu Rencana Studi (KRS) - <?php echo $tahun['ta']; ?></td>
                                            <td><?php echo $tahun['semester']; ?></td>
                                            <td>
                                                <?php if ($status['status'] == 0) { ?>
                                                <a href="<?php echo base_url('admin/settings/setKrs/' . $status['id_setkrs']); ?>"
                                                    class='btn-success btn-sm'>
                                                    <i class='ace-icon fa fa-check bigger-120'></i>
                                                    Aktifkan
                                                </a>
                                                <?php } else {  ?>
                                                <a href='<?php echo base_url('admin/settings/setKrsN/' . $status['id_setkrs']); ?>'
                                                    class='btn-warning btn-sm'>
                                                    <i class='ace-icon fa fa-exclamation-triangle bigger-120'></i>
                                                    Tidak-Aktif
                                                </a>
                                                <?php } ?>
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
        <!-- Tabel Rencana Tahun Akademik -->
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <a href="#" target="_blank" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#tambahTa"><i class="fa fa-plus"></i>Tambah
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Tahun Akademik</th>
                                            <th>Semester</th>
                                            <th colspan="2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
									foreach ($ta as $row) : ?>
                                        <tr>
                                            <td>
                                                <?php if ($row->status == 0) {
													echo "<span class='badge badge-pill badge-danger mb-1 float-right'>
                                                            <i class='ace-icon fa fa-exclamation-triangle bigger-120'></i>
                                                            Tidak-Aktif
                                                     </span>";
												} else {
													echo "<span class='badge badge-pill badge-success mb-1 float-right'>
                                                        <i class='ace-icon fa fa-check bigger-120'></i>
                                                                            Aktif
                                                     </span>";
												} ?>
                                            </td>
                                            <td><?php echo $row->ta; ?></td>
                                            <td><?php echo $row->semester; ?></td>

                                            <td>
                                                <div class="custom-switches-stacked mt-2">
                                                    <label class="custom-switch">
                                                        <input type="checkbox" class="custom-switch-input toggle-switch"
                                                            data-id="<?php echo $row->id_ta; ?>"
                                                            <?php echo $row->status == 1 ? 'checked' : ''; ?>>
                                                        <span class="custom-switch-indicator"></span>
                                                        <span class="custom-switch-description">Aktifkan</span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm btn-delete"
                                                    data-id="<?php echo $row->id_ta; ?>">
                                                    Delete
                                                </button>
                                            </td>

                            </div>

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
<div class="modal fade" tabindex="-1" role="dialog" id="tambahTa">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambahTa" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-row">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                                value="<?= $this->security->get_csrf_hash(); ?>">
                            <div class="form-group col-md-6">
                                <label>Tahun Akademik</label>
                                <input type="text" class="form-control" name="ta" placeholder="2030/2031" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="semester">Semester</label>
                                <select name="semester" class="form-control">
                                    <option> --Pilih Semester-- </option>
                                    <option value="Ganjil"> Ganjil </option>
                                    <option value="Genap"> Genap </option>
                                </select>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Form submit event
    $('#formTambahTa').submit(function(e) {
        e.preventDefault();
        var csrfName = '<?= $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?= $this->security->get_csrf_hash(); ?>';

        // Get form data with CSRF token
        var formData = $(this).serialize();

        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('admin/settings/insert'); ?>',
            data: formData,
            dataType: 'json',
            beforeSend: function(xhr) {
                // Set CSRF token header
                xhr.setRequestHeader(csrfName, csrfHash);
            },
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
                            $('#tambahTa').modal('hide');
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

$(document).ready(function() {
    $('.toggle-switch').change(function() {
        var id_ta = $(this).data('id');
        var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

        // Kirim AJAX request
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("admin/settings/updateStatus"); ?>',
            data: {
                id_ta: id_ta,
                <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Handle success response
                    alert('Status berhasil diperbarui');
                    location.reload();
                } else {
                    // Handle error response
                    alert('Gagal memperbarui status');
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX error
                console.error('AJAX Error:', error);
            }
        });
    });
});
$(document).on('click', '.btn-delete', function() {
    var idTa = $(this).data('id');

    // Include CSRF token dalam data
    var formData = {
        id_ta: idTa,
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
                url: '<?php echo base_url('admin/settings/delete'); ?>',
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


</script>
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

<script>
src = "<?php echo base_url(); ?>assets-new-look/modules/sweetalert/sweetalert.min.js" > < / sc
ript >
</script>

<script src="<?php echo base_url(); ?>assets-new-look/js/page/modules-sweetalert.js"></script>