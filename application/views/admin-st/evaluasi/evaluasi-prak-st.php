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
            <h1>Pilih Program Studi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
                <div class="breadcrumb-item"><a href="#">Data Program Studi</a></div>

                <!-- <div class="breadcrumb-item">Data Kurikulum</div> -->
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- <button type="button" class="btn btn-danger" id="btnResetStatus">Set Cetak KHS
                                Mahasiswa</button> -->
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th data-field="no">No</th>
                                            <th data-field="kode">Kode</th>
                                            <th data-field="jurusan">Jurusan</th>
                                            <th data-field="singkatan">Singkatan</th>
                                            <th data-field="jenjang">Jenjang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
									foreach ($jurusan as $row) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row->kd_jurusan; ?></td>
                                            <td><?php echo $row->jurusan; ?></td>
                                            <td><?php echo $row->singkat; ?></td>
                                            <td><?php echo $row->jenjang; ?></td>
                                            <td>
                                                <a class="btn-sm btn-primary"
                                                    href="<?php echo base_url('admin/Praktikum/getEdom/' . $row->kd_jurusan . '/'); ?>"><i
                                                        class="fa fa-list"></i></a>
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

<script src="<?php echo base_url(); ?>assets-new-look/modules/sweetalert/sweetalert.min.js">
</script>


<script src="<?php echo base_url(); ?>assets-new-look/js/page/modules-sweetalert.js"></script>
<script>
$(document).ready(function() {
    $('#btnResetStatus').click(function() {
        // Tampilkan konfirmasi menggunakan SweetAlert
        Swal.fire({
            title: 'Apakah Anda yakin akan mereset semua status verifikasi EDOM mahasiswa?',
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
                    url: '<?php echo base_url('admin/settings/sett_edom_to_zero'); ?>',
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