<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin-st/dist/header');
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/datatables/datatables.min.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>assets-new-look/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>assets-new-look/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">


<!-- Include SweetAlert library -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11"> -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Mahasiswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
                <div class="breadcrumb-item"><a href="#">Data Mahasiswa</a></div>
                <!-- <div class="breadcrumb-item">DataTables</div> -->
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="#" target="_blank" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#tambahMahasiswa"><i class="fa fa-plus"></i>Tambah
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th data-field="no">No</th>
                                            <th data-field="nim">Nim</th>
                                            <th data-field="nama_mhs">Nama</th>
                                            <th data-field="jurusan">Prog. Studi</th>
                                            <th data-field="status">Status</th>
                                            <th data-field="nama_dosen">Dospem</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
									foreach ($mahasiswa as $row) { ?>

                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row->nim; ?></td>
                                            <td><?php echo $row->nama_mhs; ?></td>
                                            <td><?php echo $row->jenjang; ?> <?php echo $row->jurusan; ?></td>

                                            <td> <a class="link" href="#">
                                                    <?php if ($row->status_mhs == 'tidak') {
													echo "<span class='badge badge-pill badge-danger mb-1 float-right'>
                                                            
                                                            Non Aktif
                                                     </span>";
												}elseif ($row->status_mhs == 'aktif'){
													echo "<span class='badge badge-pill badge-success mb-1 float-right'>
                                                       
                                                                            Aktif 
                                                     </span>";
												}elseif ($row->status_mhs == 'cuti'){
													echo "<span class='badge badge-pill badge-warning mb-1 float-right'>
                                                          
                                                                            Cuti 
                                                     </span>";
												}elseif ($row->status_mhs == 'lulus'){
													echo "<span class='badge badge-pill badge-primary mb-1 float-right'>
                                                        
                                                                            Lulus 
                                                     </span>";
												} ?></a></a>


                                            </td>

                                            <td> <?php echo $row->nama_dosen; ?></td>
                                            <td>
                                                <!-- Tambahkan data-nilai pada tombol Edit -->
                                                <button type="button" class="btn btn-primary btn-sm btn-edit"
                                                    data-id-mahasiswa="<?php echo $row->id_mahasiswa; ?>"
                                                    data-nim="<?php echo $row->nim; ?>"
                                                    data-nama-mhs="<?php echo $row->nama_mhs; ?>"
                                                    data-tahun-masuk="<?php echo $row->tahun_masuk; ?>"
                                                    data-kelas-mhs="<?php echo $row->kelas_mhs; ?>"
                                                    data-status-mhs="<?php echo $row->status_mhs; ?>"
                                                    data-dosen-pemb="<?php echo $row->id_dosen; ?>"
                                                    data-jurusan-mhs="<?php echo $row->kd_jurusan; ?>"
                                                    data-toggle="modal" data-target="#editMahasiswaModal">
                                                    Edit
                                                </button>


                                                <button type="button" class="btn btn-danger btn-sm btn-delete"
                                                    data-id="<?php echo $row->id_mahasiswa; ?>">
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

<!-- Modal Tambah Data -->
<div class="modal fade" tabindex="-1" role="dialog" id="tambahMahasiswa">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambahMahasiswa" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="modal-body">
                        <div class="form-row">
                            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                                value="<?= $this->security->get_csrf_hash(); ?>">
                            <div class="form-group col-md-6">
                                <label>NIM</label>
                                <input type="number" class="form-control" placeholder="NIM" name="nim" required>
                                <div class="invalid-feedback">
                                    Please provide a valid NIM.
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_mhs" placeholder="Nama Lengkap"
                                    required>
                                <div class="invalid-feedback">
                                    Please provide a valid name.
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tahun_masuk">Tahun Masuk</label>
                                <input type="number" class="form-control" placeholder="Tahun Masuk" name="tahun_masuk"
                                    required>
                                <div class="invalid-feedback">
                                    Please provide a valid entry year.
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    required>
                                <div class="invalid-feedback">
                                    Please provide a valid password.
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kelas_mhs">Kelas</label>
                            <select id="kelas_mhs" name="kelas_mhs" class="form-control" required>
                                <option value="0">Pagi</option>
                                <option value="1">Karyawan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status_mhs">Status</label>
                            <select id="status_mhs" name="status_mhs" class="form-control" required>
                                <option value="aktif">Aktif</option>
                                <option value="tidak">Non Aktif</option>
                                <option value="lulus">Lulus</option>
                                <option value="cuti">Cuti</option>
                            </select>
                        </div>

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
                        <div class="form-group">
                            <label for="nama_dosen">Dosen Pembimbing</label>
                            <select id="nama_dosen" name="nama_dosen" class="form-control" required>
                                <option value="">-- Dospem --</option>
                                <?php
						$dosenList = $this->DosenModel->getData('dosen')->result();
						foreach ($dosenList as $dosen) : ?>
                                <option value="<?php echo $dosen->id_dosen; ?>">
                                    <?php echo $dosen->nama_dosen; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                            <div class="invalid-feedback">
                                Please select a supervisor.
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
<!-- Modal Edit data Mahasiswa -->
<div class="modal fade" id="editMahasiswaModal" tabindex="-1" role="dialog" aria-labelledby="editMahasiswaModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMahasiswaModalLabel">Edit Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editMahasiswaForm" method="POST"
                action="<?php echo base_url('admin/mahasiswa/updateMahasiswa'); ?>" class="needs-validation" novalidate>
                <div class="modal-body">
                    <!-- Add your form fields here -->
                    <input type="hidden" id="id_mahasiswa" name="id_mahasiswa">

                    <div class="form-group">
                        <label for="editNIM">NIM</label>
                        <input type="text" class="form-control" id="editNIM" name="nim" required>
                    </div>

                    <div class="form-group">
                        <label for="editNama">Nama Lengkap</label>
                        <input type="text" class="form-control" id="editNama" name="nama_mhs" required>
                    </div>

                    <div class="form-group">
                        <label for="editTahunMasuk">Tahun Masuk</label>
                        <input type="text" class="form-control" id="editTahunMasuk" name="tahun_masuk" required>
                    </div>
                    <div class="form-group">
                        <label for="kelas_mhs_edit">Kelas</label>
                        <select id="kelas_mhs_edit" name="kelas_mhs" class="form-control" required>
                            <?php foreach ($kelasList as $value => $label) : ?>
                            <option value="<?php echo $value; ?>"
                                <?php echo ($value == $selectedKelas) ? 'selected' : ''; ?>>
                                <?php echo $label; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="editStatusMhs">Status</label>
                        <select id="editStatusMhs" name="status_mhs" class="form-control" required>
                            <?php foreach ($statusList as $value => $label) : ?>
                            <option value="<?php echo $value; ?>"
                                <?php echo ($value == $selectedStatus) ? 'selected' : ''; ?>>
                                <?php echo $label; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- For Jurusan -->
                    <div class="form-group">
                        <label for="editJurusan">Prog. Studi</label>
                        <select id="editJurusan" name="jurusan" class="form-control" required>
                            <option value="">-- Jurusan --</option>
                            <?php foreach ($jurusanList as $jurusan) : ?>
                            <option value="<?php echo $jurusan->kd_jurusan; ?>"
                                <?php echo ($jurusan->kd_jurusan == $selectedJurusan) ? 'selected' : ''; ?>>
                                <?php echo $jurusan->jurusan; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- For Dosen -->
                    <div class="form-group">
                        <label for="editDospem">Dosen Pembimbing</label>
                        <select id="editDospem" name="nama_dosen" class="form-control" required>
                            <option value="">-- Dospem --</option>
                            <?php foreach ($dosenList as $dosen) : ?>
                            <option value="<?php echo $dosen->id_dosen; ?>"
                                <?php echo ($dosen->id_dosen == $selectedDosen) ? 'selected' : ''; ?>>
                                <?php echo $dosen->nama_dosen; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="editPassword">Password</label>
                        <input type="password" class="form-control" name="password">
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
    $('#formTambahMahasiswa').submit(function(e) {
        e.preventDefault();
        var csrfName = '<?= $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?= $this->security->get_csrf_hash(); ?>';

        // Get form data with CSRF token
        var formData = $(this).serialize() + '&' + csrfName + '=' + csrfHash;

        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('admin/mahasiswa/insert'); ?>',
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
                            $('#tambahMahasiswa').modal('hide');
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
        var idMahasiswa = $(this).data('id-mahasiswa');
        var nim = $(this).data('nim');
        var namaMhs = $(this).data('nama-mhs');
        var tahunMasuk = $(this).data('tahun-masuk');
        var kelasMhs = $(this).data('kelas-mhs');
        var statusMhs = $(this).data('status-mhs');
        var dospem = $(this).data('dosen-pemb');
        var jursMhs = $(this).data('jurusan-mhs');

        // Isikan nilai ke dalam form modal
        $('#id_mahasiswa').val(idMahasiswa);
        $('#editNIM').val(nim);
        $('#editNama').val(namaMhs);
        $('#editTahunMasuk').val(tahunMasuk);
        $('#kelas_mhs_edit').val(kelasMhs);
        $('#editStatusMhs').val(statusMhs);
        $('#editDospem').val(dospem);
        $('#editJurusan').val(jursMhs);

        // $('#editPassword').val(password);
    });

    $('#editMahasiswaForm').submit(function(e) {
        e.preventDefault();

        // Get form data and append CSRF token
        var formData = $(this).serialize();
        formData +=
            '&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>';

        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('admin/mahasiswa/updateMahasiswa'); ?>',
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
    var idMahasiswa = $(this).data('id');

    // Include CSRF token dalam data
    var formData = {
        id_mahasiswa: idMahasiswa,
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
                url: '<?php echo base_url('admin/mahasiswa/deleteMahasiswa'); ?>',
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
