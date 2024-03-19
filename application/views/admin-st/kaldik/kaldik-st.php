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
            <h1>Data Kalender Akademik</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
                <div class="breadcrumb-item"><a href="#">Data Prog. Studi</a></div>
                <div class="breadcrumb-item">Data Kaldik</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="#" target="_blank" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#tambahMatakuliah"><i class="fa fa-plus"></i>Tambah
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <!-- <th>Keterangan Berkas</th> -->
                                            <th>Prog. Studi</th>
                                            <th>Tahun Akademik</th>
                                            <th>Download</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
								foreach ($kaldik as $row) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $i++; ?></td>
                                            </td>
                                            <td><?php echo $row->jenjang ?>
                                                <strong><?php echo $row->jurusan ?></strong>
                                            </td>
                                            <td><?php echo $row->ta ?></td>
                                            <td> <a
                                                    href="<?php echo base_url('admin/kaldik/download_file/' . $row->id_kaldik); ?>">Download</a>
                                            </td>
                                            <td> <button type="button" class="btn btn-danger btn-sm btn-delete"
                                                    data-id="<?php echo $row->id_kaldik; ?>">
                                                    Delete
                                                </button>
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
<?php $kd_jurusan = $this->uri->segment(4); ?>
<div class="modal fade" tabindex="-1" role="dialog" id="tambahMatakuliah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Kaldik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="uploadForm" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="modal-body">

                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                            value="<?= $this->security->get_csrf_hash(); ?>">
                        <div class="form-group">
                            <label>Prog. Studi</label>
                            <select name="kd_jurusan" class="form-control">
                                <option> --Pilih Prodi-- </option>
                                <?php
												$kd = $this->MatkulModel->getJurusan()->result();
												foreach ($kd as $ds) : ?>
                                <option value="<?php echo $ds->kd_jurusan; ?>"><?php echo $ds->jurusan; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Upload File Kaldik disini</label>
                            <input type="file" class="form-control" name="pdf_file" accept=".pdf">
                            <div class="invalid-feedback">
                                Please provide a valid name File
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



<!-- Pastikan Anda sudah menyertakan SweetAlert library -->
<script src="<?php echo base_url(); ?>assets-new-look/modules/sweetalert/sweetalert.min.js"></script>

<script src="<?php echo base_url(); ?>assets-new-look/js/page/modules-sweetalert.js"></script>


<script>
$(document).ready(function() {
    $('#uploadForm').submit(function(e) {
        e.preventDefault();

        var formData = new FormData($(this)[0]);
        var csrfToken = $('input[name="csrf_token"]').val(); // Ambil token CSRF dari input hidden

        // Tambahkan token CSRF ke dalam data permintaan
        formData.append('<?php echo $this->security->get_csrf_token_name(); ?>', csrfToken);

        $.ajax({
            url: '<?php echo base_url('admin/kaldik/do_upload'); ?>',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                response = JSON.parse(response);
                if (response.success) {
                    // Berhasil diunggah, tampilkan pesan sukses
                    swal("Success", response.message, "success").then((value) => {
                        // Redirect atau lakukan tindakan lain
                        window.location.href =
                            '<?php echo base_url('admin/kaldik'); ?>';
                    });
                } else {
                    // Gagal unggah, tampilkan pesan error
                    swal("Error", response.message, "error");
                }
            },
            error: function(xhr, status, error) {
                // Tangani kesalahan AJAX
                swal("Error", "Terjadi kesalahan saat mengunggah file.", "error");
            }
        });
    });
});
</script>
<script>
// Fungsi untuk menampilkan nilai pada form modal saat tombol Delete diklik
$(document).on('click', '.btn-delete', function() {
    var id_kaldik = $(this).data('id');

    // Include CSRF token dalam data
    var formData = {
        id_kaldik: id_kaldik,
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
                url: '<?php echo base_url('admin/kaldik/delete'); ?>',
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
