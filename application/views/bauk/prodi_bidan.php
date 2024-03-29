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
                            <h4 class="text-center">Setting Aktivasi UAP / Pra UAP Kebidanan</h4>
                            <!-- <button type="button" class="btn btn-danger" id="btnResetStatus">Set Semua Status 0</button> -->


                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>    
											<th> Pra UAP</th>
                                            <th> UAP </th>

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
                                        
                                            <!--Tes Switch -->
											<td>
                                                <div class="custom-switches-stacked mt-2">
                                                    <label class="custom-switch">
                                                        <input type="checkbox"
                                                            class="custom-switch-input toggle-switch-pra-uap"
                                                            data-id-pra-uap="<?php echo $row->id_mahasiswa; ?>"
                                                            <?php echo $row->status_pra_uap == 1 ? 'checked' : ''; ?>>
                                                        <span class="custom-switch-indicator"></span>
                                                        <span class="custom-switch-description">Aktifkan</span>
                                                    </label>
                                                </div>
                                            </td>
											<td>
                                                <div class="custom-switches-stacked mt-2">
                                                    <label class="custom-switch">
                                                        <input type="checkbox"
                                                            class="custom-switch-input toggle-switch-uap"
                                                            data-id-uap="<?php echo $row->id_mahasiswa; ?>"
                                                            <?php echo $row->status_uap == 1 ? 'checked' : ''; ?>>
                                                        <span class="custom-switch-indicator"></span>
                                                        <span class="custom-switch-description">Aktifkan</span>
                                                    </label>
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
                alert('Status berhasil diperbarui ');
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
                alert('Status berhasil diperbarui ');
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
                alert('Status berhasil diperbarui ');
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
                alert('Status berhasil diperbarui ');
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
                alert('Status berhasil diperbarui ');
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
                alert('Status berhasil diperbarui ');
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

$('.toggle-switch-pra-uap').change(function() {
    var id_mahasiswa = $(this).data('id-pra-uap');
    var status_pra_uap = $(this).prop('checked') ? 1 : 0; // Periksa apakah checkbox di-check atau tidak
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    // Kirim AJAX request
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url("bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/updateStatusPraUap"); ?>',
        data: {
            id_mahasiswa: id_mahasiswa,
            status_pra_uap: status_pra_uap, // Kirim status baru
            <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // Handle success response
                // alert('Status berhasil KRS diperbarui');
                alert('Status berhasil diperbarui ');
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
    if (!$(this).prop('checked') && status_pra_uap == 1) {
        $(this).prop('checked', true); // Tandai checkbox untuk mencegah perubahan
        // Kirim AJAX request untuk mengubah status menjadi 0
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/updateStatusPraUap"); ?>',
            data: {
                id_mahasiswa: id_mahasiswa,
                status_pra_uap: 0, // Ubah status menjadi 0
                <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Handle success response
                    alert('Status Pra UAP diubah menjadi tidak aktif');
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

$('.toggle-switch-uap').change(function() {
    var id_mahasiswa = $(this).data('id-uap');
    var status_uap = $(this).prop('checked') ? 1 : 0; // Periksa apakah checkbox di-check atau tidak
    var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

    // Kirim AJAX request
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url("bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/updateStatusUap"); ?>',
        data: {
            id_mahasiswa: id_mahasiswa,
            status_uap: status_uap, // Kirim status baru
            <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
        },
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                // Handle success response
                // alert('Status berhasil KRS diperbarui');
                alert('Status UAP berhasil diperbarui ');
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
    if (!$(this).prop('checked') && status_uap == 1) {
        $(this).prop('checked', true); // Tandai checkbox untuk mencegah perubahan
        // Kirim AJAX request untuk mengubah status menjadi 0
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url("bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/updateStatusUap"); ?>',
            data: {
                id_mahasiswa: id_mahasiswa,
                status_uap: 0, // Ubah status menjadi 0
                <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    // Handle success response
                    alert('Status UAP diubah menjadi tidak aktif');
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
<script>
$(document).ready(function() {
    $('#btnResetStatus').click(function() {
        // Tampilkan konfirmasi menggunakan SweetAlert
        Swal.fire({
            title: 'Apakah Anda yakin akan mereset semua status verifikasi mahasiswa?',
            text: 'Tindakan ini tidak dapat dibatalkan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Reset!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna mengonfirmasi, lakukan panggilan AJAX untuk mengatur semua status menjadi 0
                $.ajax({
                    url: '<?php echo base_url('admin/settings/set_all_status_zero'); ?>',
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            // Jika sukses, tampilkan pesan sukses
                            Swal.fire(
                                'Sukses!',
                                'Semua status berhasil direset. Silahkan Refresh Browser',
                                'success'
                            );

                        } else {
                            // Jika terjadi kesalahan, tampilkan pesan kesalahan secara eksplisit
                            Swal.fire(
                                'Gagal!',
                                'Terjadi kesalahan saat mereset status.',
                                'error'
                            );
                        }
                    },
                    error: function(xhr, status, error) {
                        // Jika terjadi kesalahan AJAX, tampilkan pesan kesalahan secara eksplisit
                        Swal.fire(
                            'Error!',
                            'Terjadi kesalahan saat melakukan permintaan.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});
</script>
