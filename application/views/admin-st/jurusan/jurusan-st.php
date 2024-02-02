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
            <h1>Data Program Studi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
                <div class="breadcrumb-item"><a href="#">Data Program Studi</a></div>
                <!-- <div class="breadcrumb-item">DataTables</div> -->
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="#" target="_blank" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#tambahprodi"><i class="fa fa-plus"></i>Tambah
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Jurusan</th>
                                            <th>Jenjang</th>
                                            <th>Ketua Prog. Studi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
									foreach ($jurusan as $row) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row->kd_jurusan; ?></td>
                                            <td><?php echo $row->jurusan; ?>
                                            </td>
                                            <td><?php echo $row->jenjang; ?></td>
                                            <td><?php echo $row->kaprod; ?></td>
                                            <td>
                                                <!-- Tambahkan data-nilai pada tombol Edit -->
                                                <button type="button" class="btn btn-primary btn-sm btn-edit"
                                                    data-kd-jurusan="<?php echo $row->kd_jurusan; ?>"
                                                    data-jurusan="<?php echo $row->jurusan; ?>"
                                                    data-jenjang="<?php echo $row->jenjang; ?>"
                                                    data-id-dosen="<?php echo $row->kaprod; ?>" data-toggle="modal"
                                                    data-target="#editJurusanModal">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm btn-delete"
                                                    data-id="<?php echo $row->kd_jurusan; ?>">
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
<div class="modal fade" tabindex="-1" role="dialog" id="tambahprodi">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Prodi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambahDosen" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-row">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                                value="<?= $this->security->get_csrf_hash(); ?>">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Kode Prodi</label>
                                    <input type="text" class="form-control" placeholder="Kode Program Studi"
                                        name="nidn">
                                    <div class="invalid-feedback">
                                        Please provide a valid Kode Program Studi.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nama Prodi</label>
                                    <input type="text" class="form-control" placeholder="Input Nama Prodi"
                                        name="jurusan" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Program Studi.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="jenjang">Singkatan</label>
                                <input type="text" class="form-control" name="singkat" placeholder="Singkatan" required>
                                <div class="invalid-feedback">
                                    Please provide a valid name Singkatan
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jenjang">Jenjang</label>

                                <select id="jenjang" name="jenis_kelamin" class="form-control" required>
                                    <option value="D3">Diploma</option>
                                    <option value="S1">Sarjana</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="id_dosen">Ketua Prog. Studi</label>
                            <select id="id_dosen" name="id_dosen" class="form-control" required>
                                <option value="">-- KAPRODI --</option>
                                <?php				
									$dosenList = $this->DosenModel->getData('dosen')->result();
									foreach ($dosenList as $dosen) : ?>
                                <option value="<?php echo $dosen->id_dosen; ?>">
                                    <?php echo $dosen->nama_dosen; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Please select a program of study.
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
<!-- Modal Edit data Program Studi -->
<div class="modal fade" id="editJurusanModal" tabindex="-1" role="dialog" aria-labelledby="editJurusanModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editJurusanModalLabel">Edit Data Program Studi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editJurusanForm" method="POST" action="<?php echo base_url('admin/jurusan/updateJurusan'); ?>"
                class="needs-validation" novalidate>
                <div class="modal-body">
                    <!-- Add your form fields here -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="kd_jurusan">Kode Prodi</label>
                            <input type="text" class="form-control" id="kd_jurusan" name="kd_jurusan" disabled required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="editJurs">Nama Prodi</label>
                            <input type="text" class="form-control" id="editJurs" name="jurusan" required>
                        </div>
                    </div>


                    <div class="form-row">
                        <!-- <div class="form-group col-md-6">
                            <label for="jenjang">Singkatan</label>
                            <input type="text" class="form-control" name="singkat" required>
                        </div> -->
                        <div class="form-group col-md-12">
                            <label for="editJenjang">Jenjang</label>
                            <select id="editJenjang" name="jenjang" class="form-control" required>
                                <?php foreach ($jenjangList as $value => $label) : ?>
                                <option value="<?php echo $value; ?>"
                                    <?php echo ($value == $selectedJenjang) ? 'selected' : ''; ?>>
                                    <?php echo $label; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <!-- For Dosen -->
                    <div class="form-group">
                        <label for="editKapro">Kaprodi</label>
                        <input type="editKapro" class="form-control" id="editKapro" name="kapro" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
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
    // Form submit event
    $('#tambahprodi').submit(function(e) {
        e.preventDefault();
        var csrfName = '<?= $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?= $this->security->get_csrf_hash(); ?>';

        // Get form data with CSRF token
        var formData = $(this).serialize() + '&' + csrfName + '=' + csrfHash;

        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('admin/jurusan/insert'); ?>',
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
                            $('#tambahprodi').modal('hide');
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
        var kdJurs = $(this).data('kd-jurusan');
        var jurusan = $(this).data('jurusan');
        var jenjang = $(this).data('jenjang');
        var idDosen = $(this).data('id-dosen');


        // Isikan nilai ke dalam form modal
        $('#kd_jurusan').val(kdJurs);
        $('#editJurs').val(jurusan);
        $('#editJenjang').val(jenjang);
        $('#editKapro').val(idDosen);


        // $('#editPassword').val(password);
    });

    $('#editJurusanForm').submit(function(e) {
        e.preventDefault();

        // Get form data and append CSRF token
        var formData = $(this).serialize();
        formData +=
            '&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>';

        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('admin/jurusan/updateJurusan'); ?>',
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
    var kd_jurusan = $(this).data('id');

    // Include CSRF token dalam data
    var formData = {
        kd_jurusan: kdJurusan,
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
                url: '<?php echo base_url('admin/jurusan/deleteJurusan'); ?>',
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