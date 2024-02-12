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
            <h1>Aktivasi Mahasiswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Administrasi</a></div>
                <div class="breadcrumb-item"><a href="#">Aktivasi Bauk</a></div>
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
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th> Isi KRS</th>
                                            <th> Jadwal UTS</th>
                                            <th> Jadwal UAS</th>
                                            <th> Nilai UTS</th>
                                            <th> Nilai UAS</th>
                                            <th> KHS </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
									foreach ($mhs as $row) :

									?>
                                        <tr>
                                            <!--Aktivasi KRS-->
                                            <td><?php echo $i++; ?></td>

                                            <td><?php echo $row->nim; ?></td>
                                            <td><?php echo $row->nama_mhs; ?></td>
                                            <td>
                                                <div class="custom-switches-stacked mt-2">
                                                    <label class="custom-switch">
                                                        <input type="checkbox" class="custom-switch-input toggle-switch"
                                                            data-id-mhs="<?php echo $row->id_mahasiswa; ?>"
                                                            <?php echo $row->status == 1 ? 'checked' : ''; ?>>
                                                        <span class="custom-switch-indicator"></span>
                                                        <span class="custom-switch-description">Aktifkan</span>
                                                    </label>
                                                </div>


                                            </td>
                                            <!--Status UTS-->
                                            <td>
                                                <div class="custom-switches-stacked mt-2">
                                                    <label class="custom-switch">
                                                        <input type="checkbox"
                                                            class="custom-switch-input toggle-switch-uts"
                                                            data-id-uts="<?php echo $row->id_mahasiswa; ?>"
                                                            <?php echo $row->status_uts == 1 ? 'checked' : ''; ?>>
                                                        <span class="custom-switch-indicator"></span>
                                                        <span class="custom-switch-description">Aktifkan</span>
                                                    </label>
                                                </div>
                                            </td>
                                            <!--Status UAS-->
                                            <td>
                                                <div class="custom-switches-stacked mt-2">
                                                    <label class="custom-switch">
                                                        <input type="checkbox"
                                                            class="custom-switch-input toggle-switch-uas"
                                                            data-id-uas="<?php echo $row->id_mahasiswa; ?>"
                                                            <?php echo $row->status_uas == 1 ? 'checked' : ''; ?>>
                                                        <span class="custom-switch-indicator"></span>
                                                        <span class="custom-switch-description">Aktifkan</span>
                                                    </label>
                                                </div>
                                            </td>
                                            <!--Status Nilai UtS-->
                                            <td>
                                                <div class="custom-switches-stacked mt-2">
                                                    <label class="custom-switch">
                                                        <input type="checkbox"
                                                            class="custom-switch-input toggle-switch-nilai-uts"
                                                            data-id-nilai-uts="<?php echo $row->id_mahasiswa; ?>"
                                                            <?php echo $row->status_nilai_uts == 1 ? 'checked' : ''; ?>>
                                                        <span class="custom-switch-indicator"></span>
                                                        <span class="custom-switch-description">Aktifkan</span>
                                                    </label>
                                                </div>

                                            </td>
                                            <!--Status Nilai UAS-->
                                            <td>
                                                <div class="custom-switches-stacked mt-2">
                                                    <label class="custom-switch">
                                                        <input type="checkbox"
                                                            class="custom-switch-input toggle-switch-nilai-uas"
                                                            data-id-nilai-uas="<?php echo $row->id_mahasiswa; ?>"
                                                            <?php echo $row->status_nilai_uas == 1 ? 'checked' : ''; ?>>
                                                        <span class="custom-switch-indicator"></span>
                                                        <span class="custom-switch-description">Aktifkan</span>
                                                    </label>
                                                </div>
                                            </td>
                                            <!--Status KHS-->
                                            <td>
                                                <div class="custom-switches-stacked mt-2">
                                                    <label class="custom-switch">
                                                        <input type="checkbox"
                                                            class="custom-switch-input toggle-switch-khs"
                                                            data-id-khs="<?php echo $row->id_mahasiswa; ?>"
                                                            <?php echo $row->status_nilai_khs == 1 ? 'checked' : ''; ?>>
                                                        <span class="custom-switch-indicator"></span>
                                                        <span class="custom-switch-description">Aktifkan</span>
                                                    </label>
                                                </div>
                                            </td>
                                            <!--Tes Switch -->


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


</div>
</section>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
//Toogle KRS
$('.toggle-switch').change(function() {
    var id_mahasiswa = $(this).data('id-mhs');
    var status = $(this).prop('checked') ? 1 : 0; // Periksa apakah checkbox di-check atau tidak
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    // Kirim AJAX request
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url("bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/updateStatusKrs"); ?>',
        data: {
            id_mahasiswa: id_mahasiswa,
            status: status, // Kirim status baru
            <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // Handle success response
                // alert('Status berhasil KRS diperbarui');
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

    // Jika checkbox tidak dicentang dan status sebelumnya adalah 1, set status menjadi 0
    if (!$(this).prop('checked') && status == 1) {
        $(this).prop('checked', true); // Tandai checkbox untuk mencegah perubahan
        // Kirim AJAX request untuk mengubah status menjadi 0
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/updateStatusKrs"); ?>',
            data: {
                id_mahasiswa: id_mahasiswa,
                status: 0, // Ubah status menjadi 0
                <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Handle success response
                    alert('Status KRS diubah menjadi tidak aktif');
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
    }
});
//Toogle UTS
$('.toggle-switch-uts').change(function() {
    var id_mahasiswa = $(this).data('id-uts');
    var status_uts = $(this).prop('checked') ? 1 : 0; // Periksa apakah checkbox di-check atau tidak
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    // Kirim AJAX request
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url("bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/updateStatusUts"); ?>',
        data: {
            id_mahasiswa: id_mahasiswa,
            status_uts: status_uts, // Kirim status baru
            <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // Handle success response
                // alert('Status berhasil KRS diperbarui');
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

    // Jika checkbox tidak dicentang dan status sebelumnya adalah 1, set status menjadi 0
    if (!$(this).prop('checked') && status_uts == 1) {
        $(this).prop('checked', true); // Tandai checkbox untuk mencegah perubahan
        // Kirim AJAX request untuk mengubah status menjadi 0
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/updateStatusUts"); ?>',
            data: {
                id_mahasiswa: id_mahasiswa,
                status_uts: 0, // Ubah status menjadi 0
                <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Handle success response
                    alert('Status KRS diubah menjadi tidak aktif');
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
    }
});
$('.toggle-switch-uas').change(function() {
    var id_mahasiswa = $(this).data('id-uas');
    var status_uas = $(this).prop('checked') ? 1 : 0; // Periksa apakah checkbox di-check atau tidak
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    // Kirim AJAX request
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url("bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/updateStatusUas"); ?>',
        data: {
            id_mahasiswa: id_mahasiswa,
            status_uas: status_uas, // Kirim status baru
            <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // Handle success response
                // alert('Status berhasil KRS diperbarui');
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

    // Jika checkbox tidak dicentang dan status sebelumnya adalah 1, set status menjadi 0
    if (!$(this).prop('checked') && status_uas == 1) {
        $(this).prop('checked', true); // Tandai checkbox untuk mencegah perubahan
        // Kirim AJAX request untuk mengubah status menjadi 0
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/updateStatusUas"); ?>',
            data: {
                id_mahasiswa: id_mahasiswa,
                status_uas: 0, // Ubah status menjadi 0
                <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Handle success response
                    alert('Status KRS diubah menjadi tidak aktif');
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
    }
});
$('.toggle-switch-nilai-uts').change(function() {
    var id_mahasiswa = $(this).data('id-nilai-uts');
    var status_nilai_uts = $(this).prop('checked') ? 1 : 0; // Periksa apakah checkbox di-check atau tidak
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    // Kirim AJAX request
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url("bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/updateStatusNilaiUts"); ?>',
        data: {
            id_mahasiswa: id_mahasiswa,
            status_nilai_uts: status_nilai_uts, // Kirim status baru
            <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // Handle success response
                // alert('Status berhasil KRS diperbarui');
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

    // Jika checkbox tidak dicentang dan status sebelumnya adalah 1, set status menjadi 0
    if (!$(this).prop('checked') && status_nilai_uts == 1) {
        $(this).prop('checked', true); // Tandai checkbox untuk mencegah perubahan
        // Kirim AJAX request untuk mengubah status menjadi 0
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/updateStatusNilaiUts"); ?>',
            data: {
                id_mahasiswa: id_mahasiswa,
                status_nilai_uts: 0, // Ubah status menjadi 0
                <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Handle success response
                    alert('Status KRS diubah menjadi tidak aktif');
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
    }
});
$('.toggle-switch-nilai-uas').change(function() {
    var id_mahasiswa = $(this).data('id-nilai-uas');
    var status_nilai_uas = $(this).prop('checked') ? 1 : 0; // Periksa apakah checkbox di-check atau tidak
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    // Kirim AJAX request
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url("bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/updateStatusNilaiUas"); ?>',
        data: {
            id_mahasiswa: id_mahasiswa,
            status_nilai_uas: status_nilai_uas, // Kirim status baru
            <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // Handle success response
                // alert('Status berhasil KRS diperbarui');
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

    // Jika checkbox tidak dicentang dan status sebelumnya adalah 1, set status menjadi 0
    if (!$(this).prop('checked') && status_nilai_uas == 1) {
        $(this).prop('checked', true); // Tandai checkbox untuk mencegah perubahan
        // Kirim AJAX request untuk mengubah status menjadi 0
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/updateStatusNilaiUas"); ?>',
            data: {
                id_mahasiswa: id_mahasiswa,
                status_nilai_uas: 0, // Ubah status menjadi 0
                <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Handle success response
                    alert('Status KRS diubah menjadi tidak aktif');
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
    }
});
$('.toggle-switch-khs').change(function() {
    var id_mahasiswa = $(this).data('id-khs');
    var status_nilai_khs = $(this).prop('checked') ? 1 : 0; // Periksa apakah checkbox di-check atau tidak
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    // Kirim AJAX request
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url("bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/updateStatusKhs"); ?>',
        data: {
            id_mahasiswa: id_mahasiswa,
            status_nilai_khs: status_nilai_khs, // Kirim status baru
            <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // Handle success response
                // alert('Status berhasil KRS diperbarui');
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

    // Jika checkbox tidak dicentang dan status sebelumnya adalah 1, set status menjadi 0
    if (!$(this).prop('checked') && status_nilai_khs == 1) {
        $(this).prop('checked', true); // Tandai checkbox untuk mencegah perubahan
        // Kirim AJAX request untuk mengubah status menjadi 0
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/updateStatusKhs"); ?>',
            data: {
                id_mahasiswa: id_mahasiswa,
                status_nilai_khs: 0, // Ubah status menjadi 0
                <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Handle success response
                    alert('Status KRS diubah menjadi tidak aktif');
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
    }
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

<script src="<?php echo base_url(); ?>assets-new-look/modules/sweetalert/sweetalert.min.js">
</script>


<script src="<?php echo base_url(); ?>assets-new-look/js/page/modules-sweetalert.js"></script>