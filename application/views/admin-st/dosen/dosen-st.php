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
            <h1>Data Dosen</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
                <div class="breadcrumb-item"><a href="#">Data Dosen</a></div>
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
                                            <th data-field="no">No</th>
                                            <th data-field="nidn">NIDN</th>
                                            <th data-field="kd_dosen">Kode Dosen</th>
                                            <th data-field="nama">Nama</th>
                                            <th data-field="program_studi">Program Studi</th>
                                            <!-- <th data-field="status">Status</th> -->


                                            <th data-field="status_ds">Status</th>

                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
									foreach ($dosen as $row) : ?>

                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row->nidn; ?></td>
                                            <td><?php echo $row->kd_dosen; ?></td>
                                            <td><?php echo $row->nama_dosen; ?></td>

                                            <td><?php echo $row->jurusan; ?></td>

                                            <td><?php echo $row->status_ds; ?></td>
                                            <td>
                                                <!-- Tambahkan data-nilai pada tombol Edit -->
                                                <button type="button" class="btn btn-primary btn-sm btn-edit" nidn
                                                    data-id-ds="<?php echo $row->id_dosen; ?>"
                                                    data-nidn="<?php echo $row->nidn; ?>"
                                                    data-kode-dosen="<?php echo $row->kd_dosen; ?>"
                                                    data-nama-dosen="<?php echo $row->nama_dosen; ?>"
                                                    data-no-telp="<?php echo $row->hp_ds; ?>"
                                                    data-tempat-lahir="<?php echo $row->tempat; ?>"
                                                    data-tanggal-lahir="<?php echo $row->tgl; ?>"
                                                    data-jenis-kelamin="<?php echo $row->jenis_kelamin; ?>"
                                                    data-alamat-dosen="<?php echo $row->alamat_dosen; ?>"
                                                    data-email="<?php echo $row->email_ds; ?>"
                                                    data-status-dosen="<?php echo $row->status_ds; ?>"
                                                    data-jurusan-dosen="<?php echo $row->kd_jurusan; ?>"
                                                    data-toggle="modal" data-target="#editDosenModal">
                                                    Edit
                                                </button>

                                                <button type="button" class="btn btn-danger btn-sm btn-delete"
                                                    data-id-dosen="<?php echo $row->id_dosen; ?>">
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
                <h5 class="modal-title">Tambah Data Dosen</h5>
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
                                    <label>NIDN</label>
                                    <input type="number" class="form-control" placeholder="NIDN" name="nidn">
                                    <div class="invalid-feedback">
                                        Please provide a valid NIDN.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Kode Dosen</label>
                                    <input type="text" class="form-control" placeholder="Kode Dosen" name="kd_dosen"
                                        required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Kode Dosen.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="nama_lengkap">Nama Dosen</label>
                                <input type="text" class="form-control" name="nama_dosen" placeholder="Nama Dosen"
                                    required>
                                <div class="invalid-feedback">
                                    Please provide a valid name dosen
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="hp_ds">No Telp</label>
                                <input type="number" class="form-control" name="hd_ds" placeholder="Nomor Telp"
                                    required>
                                <div class="invalid-feedback">
                                    Please provide a valid No Telp.
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email_ds">Email</label>
                                <input type="email" name="email_ds" class="form-control" placeholder="Alamat Email"
                                    required>
                                <div class="invalid-feedback">
                                    Please provide a valid Email.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat"
                                    required>
                                <div class="invalid-feedback">
                                    Please provide a valid Was Born.
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tgl" required>
                                <div class="invalid-feedback">
                                    Please provide a valid Was Born.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat_dosen">Alamat Dosen</label>
                            <input type="textarea" class="form-control" name="alamat_dosen" placeholder="alamat"
                                required>
                            <div class="invalid-feedback">
                                Please provide a valid Address
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status_ds">Status Dosen</label>
                            <select id="status_ds" name="status_ds" class="form-control" required>
                                <option value="Dosen Tetap">Dosen Tetap</option>
                                <option value="Tidak Tetap">Tidak Tetap</option>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password">

                        </div> -->


                        <div class="form-group">
                            <label for="jurusan">Prog. Studi</label>
                            <select id="jurusan" name="jurusan" class="form-control" required>
                                <option value="">-- Jurusan --</option>
                                <?php
							$jurusanList = $this->JurusanModel->getData('jurusan')->result();
							foreach ($jurusanList as $jurusan) : ?>
                                <option value="<?php echo $jurusan->kd_jurusan; ?>">
                                    <?php echo $jurusan->jurusan; ?>
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
<!-- Modal Edit data Dosen -->
<div class="modal fade" id="editDosenModal" tabindex="-1" role="dialog" aria-labelledby="editDosenModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMahasiswaModalLabel">Edit Data Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editFormDosen" method="POST" action="<?php echo base_url('admin/dosen/updateDataDosen'); ?>"
                class="needs-validation" novalidate>
                <div class="modal-body">
                    <!-- Add your form fields here -->
                    <input type="hidden" id="id_dosen" name="id_dosen">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="editNidn">NIDN</label>
                            <input type="number" class="form-control" id="editNidn" name="nidn" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="editkd_dosen">Kode Dosen</label>
                            <input type="text" class="form-control" id="editkd_dosen" name="kd_dosen" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="editNama">Nama Dosen</label>
                        <input type="text" class="form-control" id="editNama" name="nama_dosen" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="editTelp">No Telp</label>
                            <input type="number" class="form-control" id="editTelp" name="hp_ds">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="editemail">Email</label>
                            <input type="email" class="form-control" id="editemail" name="email_ds" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="editTpLahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="editTpLahir" name="tempat" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="editTglLahir">Tanggal Lahir</label>
                            <input type="text" class="form-control" id="editTglLahir" name="tgl" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="editJenisKel">Jenis Kelamin</label>
                        <select id="editJenisKel" name="jenis_kelamin" class="form-control" required>
                            <?php foreach ($jenisKelamin as $value => $label) : ?>
                            <option value="<?php echo $value; ?>"
                                <?php echo ($value == $selectedJenis) ? 'selected' : ''; ?>>
                                <?php echo $label; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editAldos">Alamat Dosen</label>
                        <input type="textarea" class="form-control" id="editAldos" name="alamat_dosen" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="editStsDosen">Status Dosen</label>
                            <select id="editStsDosen" name="status_ds" class="form-control" required>
                                <?php foreach ($statusListDosen as $value => $label) : ?>
                                <option value="<?php echo $value; ?>"
                                    <?php echo ($value == $selectedStatus) ? 'selected' : ''; ?>>
                                    <?php echo $label; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="editPassword">Password</label>
                            <input type="password" class="form-control" name="password_ds">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="editJurdoss">Prog. Studi</label>
                        <select id="editJurdoss" name="jurusan" class="form-control" required>
                            <option value="">-- Jurusan --</option>
                            <?php foreach ($jurusanList as $jurusan) : ?>
                            <option value="<?php echo $jurusan->kd_jurusan; ?>"
                                <?php echo ($jurusan->kd_jurusan == $selectedJurusan) ? 'selected' : ''; ?>>
                                <?php echo $jurusan->jurusan; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
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
    $('#formTambahDosen').submit(function(e) {
        e.preventDefault();
        var csrfName = '<?= $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?= $this->security->get_csrf_hash(); ?>';

        // Get form data with CSRF token
        var formData = $(this).serialize() + '&' + csrfName + '=' + csrfHash;

        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('admin/dosen/insert'); ?>',
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
                            $('#tambahDosen').modal('hide');
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
        var id_ds = $(this).data('id-ds');
        var nidn = $(this).data('nidn');
        var kdDosen = $(this).data('kode-dosen');
        var namaDsn = $(this).data('nama-dosen');
        var noTelp = $(this).data('no-telp');
        var tpLahir = $(this).data('tempat-lahir');
        var tgLahir = $(this).data('tanggal-lahir');
        var JenisKel = $(this).data('jenis-kelamin');
        var alDos = $(this).data('alamat-dosen');
        var eml = $(this).data('email');
        var jurusan_dosen = $(this).data('jurusan-dosen');
        var StsDosen = $(this).data('status-dosen');


        // Isikan nilai ke dalam form modal
        $('#id_dosen').val(id_ds);
        $('#editNidn').val(nidn);
        $('#editkd_dosen').val(kdDosen);
        $('#editNama').val(namaDsn);
        $('#editTelp').val(noTelp);
        $('#editTpLahir').val(tpLahir);
        $('#editTglLahir').val(tgLahir);
        $('#editJenisKel').val(JenisKel);
        $('#editAldos').val(alDos);
        $('#editemail').val(eml);
        $('#editJurdoss').val(jurusan_dosen);
        $('#editStsDosen').val(StsDosen);
        // $('#editPassword').val(password);
    });

    $('#editFormDosen').submit(function(e) {
        e.preventDefault();

        // Get form data and append CSRF token
        var formData = $(this).serialize();
        formData +=
            '&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>';

        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('admin/dosen/updateDataDosen'); ?>',
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
    var idDosen = $(this).data('id-dosen');

    // Include CSRF token dalam data
    var formData = {
        id_dosen: idDosen,
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
                url: '<?php echo base_url('admin/dosen/deteletDosen'); ?>',
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