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
            <h1>Data Jadwal Pra UAP </h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
                <!-- <div class="breadcrumb-item"><a href="#">Data Prog. Studi</a></div> -->
                <div class="breadcrumb-item">Data Jadwal Pra UAP</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="#" target="_blank" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#tambahUap"><i class="fa fa-plus"></i>Tambah
                            </a>
                            &nbsp;


                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Program Studi</th>
                                            <th>Jam UAP</th>
                                            <th>Tanggal UAP</th>
                                            <th>Aksi</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
									foreach ($jadwal as $row) { ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row->nama_pra_uap; ?></td>
                                            <td><?php echo $row->jurusan; ?></td>
                                            <td><?php echo $row->jam_pra_uap; ?></td>
                                            <td><?php echo format_indo($row->tanggal_pra_uap); ?></td>
                                            <td>
                                                <!-- Tambahkan data-nilai pada tombol Edit -->
                                                <!-- <button type="button" class="btn btn-primary btn-sm btn-edit"
                                                    data-id-jadwal="<?php echo $row->id_jadwal;; ?>"
                                                    data-kdMk="<?php echo $row->kd_mk; ?>"
                                                    data-jurusan="<?php echo $row->kd_jurusan; ?>"
                                                    data-kelas="<?php echo $row->kelas; ?>"
                                                    data-tgluts="<?php echo $row->tgl_uts; ?>"
                                                    data-jam="<?php echo $row->jam; ?>"
                                                    data-ruang="<?php echo $row->ruang_uts; ?>" data-toggle="modal"
                                                    data-target="#editUtsModal">
                                                    Edit
                                                </button> -->


                                                <button type="button" class="btn btn-danger btn-sm btn-delete"
                                                    data-id="<?php echo $row->id; ?>">
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
<div class="modal fade" tabindex="-1" role="dialog" id="tambahUap">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Jadwal Pra UAP </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formTambahUap" class="needs-validation" novalidate>
                <div class="modal-body">
                    <div class="modal-body">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                            value="<?= $this->security->get_csrf_hash(); ?>">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Nama Ujian</label>
                                <select name="nama_pra_uap" class="form-control">
                                    <option valued isabled> --Nama Ujian-- </option>
                                    <option value="Ujian Akhir Program (PRA UAP) Tulis">Ujian Akhir Program (PRA UAP)
                                        Tulis
                                    </option>
                                    <option value="Ujian Akhir Program (PRA UAP) Praktik">Ujian Akhir Program (PRA UAP)
                                        Praktik
                                    </option>
                                </select>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Jam Pra UAP</label>
                                <input type="text" name="jam_pra_uap" class="form-control" placeholder="Masukan Jam"
                                    required="">
                                <div class="invalid-feedback">
                                    Please provide a valid name File
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Tanggal Pra UAP</label>
                                <input type="date" name="tanggal_pra_uap" class="form-control" required="">
                                <div class="invalid-feedback">
                                    Please provide a valid name File
                                </div>
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


<div class="modal fade" id="editUtsModal" tabindex="-1" role="dialog" aria-labelledby="editUtsModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUtsModalLabel">Edit Data Jadwal UTS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editUtsForm" method="POST" action="<?php echo base_url('admin/jadwaluap/update'); ?>"
                class="needs-validation" novalidate>
                <div class="modal-body">
                    <!-- Add your form fields here -->
                    <input type="hidden" id="idUts" name="id_jadwal">

                    <div class="form-group">
                        <label for="editMk">Matakuliah</label>
                        <input type="text" class="form-control" id="editMk" name="nim" required>
                    </div>
                    <div class="form-group">
                        <label for="kelas_mhs_edit">Kelas Mahasiswa</label>
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
                        <label for="editRuang">Ruang Mahasiswa</label>
                        <select id="editRuang" name="ruang_uts" class="form-control" required>
                            <?php foreach ($kelasList as $value => $label) : ?>
                            <option value="<?php echo $value; ?>"
                                <?php echo ($value == $selectedKelas) ? 'selected' : ''; ?>>
                                <?php echo $label; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- For Jurusan -->
                    <div class="form-group">
                        <label for="editJurs">Prog. Studi</label>
                        <select id="editJurs" name="jurusan" class="form-control" required>
                            <option value="">-- Jurusan --</option>
                            <?php foreach ($jurusanListJadwal as $jadwal) : ?>
                            <option value="<?php echo $jadwal->kd_jurusan; ?>"
                                <?php echo ($jadwal->kd_jurusan == $selectedJadwalProdi) ? 'selected' : ''; ?>>
                                <?php echo $jadwal->jurusan; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="editJam">Jam</label>
                            <input type="text" class="form-control" id="editJam" name="jam" required>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="editTgl">Tanggal</label>
                            <input type="date" class="form-control" id="editMk" name="tgl_uts" required>

                        </div>

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
    $('#formTambahUap').submit(function(e) {
        e.preventDefault();
        var csrfName = '<?= $this->security->get_csrf_token_name(); ?>';
        var csrfHash = '<?= $this->security->get_csrf_hash(); ?>';

        // Get form data with CSRF token
        var formData = $(this).serialize() + '&' + csrfName + '=' + csrfHash;

        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('admin/Jadwal_pra_uap/insert'); ?>',
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
                            $('#tambahUap').modal('hide');
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
    // Fungsi untuk menampilkan nilai pada form modal saat tombol Edit diklik
    $(document).on('click', '.btn-edit', function() {
        var idUts = $(this).data('id-jadwal');
        var kodeMK = $(this).data('kdMk');
        var jurs = $(this).data('jurusan');
        var kelas = $(this).data('kelas');
        var tgl = $(this).data('tgluts');
        var jam = $(this).data('jam');
        var ruang = $(this).data('ruang');


        // Isikan nilai ke dalam form modal
        $('#idUts').val(idUts);
        $('#editMk').val(kodeMK);
        $('#editJurs').val(jurs);
        $('#editKelas').val(kelas);
        $('#editTgl').val(tgl);
        $('#editJam').val(jam);
        $('#editRuang').val(ruang);
    });

    $('#editUtsForm').submit(function(e) {
        e.preventDefault();

        // Get form data and append CSRF token
        var formData = $(this).serialize();
        formData +=
            '&<?php echo $this->security->get_csrf_token_name(); ?>=<?php echo $this->security->get_csrf_hash(); ?>';

        // Send AJAX request
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('admin/Jadwal_pra_uap/update'); ?>',
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
    var id = $(this).data('id');

    // Include CSRF token dalam data
    var formData = {
        id: id,
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
                url: '<?php echo base_url('admin/jadwal_pra_uap/delete'); ?>',
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
                error: function(xhr, status, error) {
                    console.log('AJAX Error:', error);
                    // Tangani kesalahan dengan menampilkan pesan kesalahan
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Terjadi kesalahan saat menghapus data.'
                    });
                }
            });

        }
    });

});
</script>
