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
            <h1>Data Kurikulum</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
                <div class="breadcrumb-item"><a href="#">Data Prog. Studi</a></div>
                <div class="breadcrumb-item">Data Kurikulum</div>
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
                                            <th>Kode Matkul</th>

                                            <th>Matakuliah</th>
                                            <th>SKS</th>
                                            <th>Semester</th>
                                            <th>MK Pilihan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
							foreach ($matkul as $row) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row->kd_mk; ?></td>

                                            <td><?php echo $row->matakuliah; ?></td>
                                            <td><?php echo $row->sks; ?></td>
                                            <td><?php echo $row->semester; ?></td>
                                            <td>
                                                <a class="link" href="#">
                                                    <?php if ($row->mk_pilihan == 0) {
													echo "<span class='badge badge-pill badge-danger mb-1 float-right'>
                                                            
                                                            Tidak
                                                     </span>";
												}elseif ($row->mk_pilihan == 1){
													echo "<span class='badge badge-pill badge-success mb-1 float-right'>
                                                       
                                                                            Ya 
                                                     </span>";
												} ?>
                                                </a>
                                            </td>
                                            <td>
                                                <!-- Tambahkan data-nilai pada tombol Edit -->
                                                <button type="button" class="btn btn-primary btn-sm btn-edit"
                                                    data-kd-mk="<?php echo $row->kd_mk; ?>"
                                                    data-jurusan="<?php echo $row->jurusan; ?>"
                                                    data-matakuliah="<?php echo $row->matakuliah; ?>"
                                                    data-sks="<?php echo $row->sks; ?>"
                                                    data-smt="<?php echo $row->semester; ?>"
                                                    data-mkpilihan="<?php echo $row->mk_pilihan; ?>" data-toggle="modal"
                                                    data-target="#editMatakuliahModal">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm btn-delete"
                                                    data-id="<?php echo $row->kd_jurusan; ?>">
                                                    Delete
                                                </button>
                            </div>

                            <div class="hidden-md hidden-lg">
                                <div class="inline pos-rel">
                                    <ul
                                        class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                        <li>
                                            <a href="#" class="tooltip-info" data-rel="tooltip" title=""
                                                data-original-title="View">
                                                <span class="blue">
                                                    <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="tooltip-success" data-rel="tooltip" title=""
                                                data-original-title="Edit">
                                                <span class="green">
                                                    <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="tooltip-error" data-rel="tooltip" title=""
                                                data-original-title="Delete">
                                                <span class="red">
                                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
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
<div class="modal fade" tabindex="-1" role="dialog" id="tambahMatakuliah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Kurikulum</h5>
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
                                    <label>Kode Matakuliah</label>
                                    <input type="text" class="form-control" placeholder="Kode Matakuliah" name="kd_mk">
                                    <div class="invalid-feedback">
                                        Please provide a valid Kode Matakuliah.
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nama Matakuliah</label>
                                    <input type="text" class="form-control" placeholder="Input Nama Matakuliah"
                                        name="matakuliah" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Program Studi.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="sks">SKS</label>
                                <input type="text" class="form-control" name="sks" placeholder="Sks" required>
                                <div class="invalid-feedback">
                                    Please provide a valid name SKS
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="semester">Semester</label>
                                <select id="semester" name="semester" class="form-control" required>
                                    <option> --Pilih Semester-- </option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="mk_pilihan">Matakuliah</label>
                            <select id="mk_pilihan" name="mk_pilihan" class="form-control" required>
                                <option value="0">Tidak</option>
                                <option value="1">Ya</option>
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
<!-- Modal Edit data Program Studi -->
<div class="modal fade" id="editMatakuliahModal" tabindex="-1" role="dialog" aria-labelledby="editMatakuliahModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMatakuliahModalLabel">Edit Data Kurikulum</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editMatakuliahForm" method="POST" action="<?php echo base_url('admin/matakuliah/update'); ?>"
                class="needs-validation" novalidate>
                <div class="modal-body">
                    <!-- Add your form fields here -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="kd_mk">Kode Matakuliah</label>
                            <input type="text" class="form-control" id="kd_jurusan" name="kd_mk" disabled required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="editJurs">Nama Matakuliah</label>
                            <input type="text" class="form-control" id="matakuliah" name="matakuliah" required>
                        </div>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="editJenjang">Semester</label>
                            <select id="editJenjang" name="jenjang" class="form-control" required>
                                <?php foreach ($jenjangList as $value => $label) : ?>
                                <option value="<?php echo $value; ?>"
                                    <?php echo ($value == $selectedJenjang) ? 'selected' : ''; ?>>
                                    <?php echo $label; ?>
                                </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sks">SKS</label>
                            <input type="text" class="form-control" name="sks" placeholder="Sks" required>
                            <div class="invalid-feedback">
                                Please provide a valid name SKS
                            </div>
                        </div>
                    </div>
                    <!-- For Dosen -->
                    <div class="form-group">
                        <label for="mk_pilihan">Matakuliah Pilihan</label>
                        <select id="editJenjang" name="jenjang" class="form-control" required>
                            <?php foreach ($jenjangList as $value => $label) : ?>
                            <option value="<?php echo $value; ?>"
                                <?php echo ($value == $selectedJenjang) ? 'selected' : ''; ?>>
                                <?php echo $label; ?>
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


<!-- Pastikan Anda sudah menyertakan SweetAlert library -->
<script src="<?php echo base_url(); ?>assets-new-look/modules/sweetalert/sweetalert.min.js"></script>

<script src="<?php echo base_url(); ?>assets-new-look/js/page/modules-sweetalert.js"></script>
<script>
$(document).ready(function() {
    // Form submit event
    $('#tambahMatakuliah').submit(function(e) {
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
                            $('#tambahMatakuliah').modal('hide');
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

    $('#editMatakuliahForm').submit(function(e) {
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
