<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('mhs/dist/header');
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
            <h1>Evaluasi Dosen Mahasiswa Praktik Dosen 1</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Edom Praktik</a></div>
                <div class="breadcrumb-item">Mengisi EDOM</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Pengisian Evaluasi Dosen Mahasiswa</h2>
            <p class="section-lead">Tahun Akademik <?php echo $tahun['ta'] ?> / <?php echo $tahun['semester'] ?></p>
            <div class="row">
                <div class="box-body col-md-8">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Nama Dosen</th>
                                <td>:</td>
                                <td><?php echo $dosen->nama_dosen; ?></td>
                            </tr>
                            <tr>
                                <th>Matakuliah</th>
                                <td>:</td>
                                <td><?php echo $kd_mk; ?> / <?php echo $nama_matakuliah; ?></td>
                            </tr>

                        </tbody>
                    </table>
                    <div id="notification" style="display:none;">Form submitted successfully!</div>
                    <div id="error-container" style="display:none;"></div>
                </div>
                <form id="evaluasiForm" method="post" action="<?php echo site_url('mhs/Evaluasi_prak/simpan'); ?>">
                    <input type="hidden" name="id_dosen" value="<?php echo $dosen->id_dosen; ?>">
                    <input type="hidden" name="id_krs_prak" value="<?php echo $krs->id_krs_prak; ?>">
                    <input type="hidden" name="kd_mk" value="<?php echo $kd_mk; ?>">
                    <input type="hidden" name="id_mahasiswa" value="<?php echo $mhs['id_mahasiswa']; ?>">
                    <input type="hidden" name="id_ta" value="<?php echo $tahun['id_ta']; ?>">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                        value="<?= $this->security->get_csrf_hash(); ?>">

                    <div class="table-responsive transparan">
                        <div class="pertanyaan-jawaban">
                            <?php
                    $i = 1;
                    if (!empty($pertanyaan)) {
                        foreach ($pertanyaan as $row) {
                            echo '<div class="pertanyaan-row">';
                            echo '<div class="pertanyaan-number">' . $i . '</div>';
                            echo '<div class="pertanyaan-text">' . $row->pertanyaan . '</div>';
                            echo '<div class="jawaban-options">';
                            echo '<label><input type="radio" name="jawaban[' . $row->id_eval . ']" value="5" required> Sangat Baik</label>';
                            echo '<label><input type="radio" name="jawaban[' . $row->id_eval . ']" value="4" required> Baik</label>';
                            echo '<label><input type="radio" name="jawaban[' . $row->id_eval . ']" value="3" required> Cukup</label>';
                            echo '<label><input type="radio" name="jawaban[' . $row->id_eval . ']" value="2" required> Kurang Baik</label>';
                            echo '<label><input type="radio" name="jawaban[' . $row->id_eval . ']" value="1" required> Sangat Kurang Baik</label>';
                            echo '</div>';
                            echo '</div>';
                            $i++;
                        }
                    } else {
                        echo '<div class="no-pertanyaan">Tidak ada pertanyaan yang tersedia saat ini.</div>';
                    }
                    ?>
                        </div>
                    </div>

                    <div class="form-floating mt-4">
                        <label for="floatingTextarea2">Kritik dan Saran</label>
                        <textarea class="form-control" name="saran" id="floatingTextarea2" required></textarea>

                    </div>

                    <div id="error-container"></div>
                    <br>
                    <div style="display: flex; justify-content: center;">
                        <input class="btn btn-success btn-sm" type="submit" value="Kirim Evaluasi Dosen">
                    </div>
                </form>

                <!-- Elemen untuk menampilkan notifikasi -->
                <!-- <div id="notification" style="display:none; color: green; text-align: center;">Terimakasih telah
                    menggisi EDOM</div> -->
            </div>
        </div>

        <style>
        .pertanyaan-jawaban {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .pertanyaan-row {
            display: flex;
            flex-direction: column;
            gap: 10px;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .pertanyaan-number {
            font-weight: bold;
        }

        .pertanyaan-text {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .jawaban-options {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .jawaban-options label {
            margin: 0;
        }
        </style>


</div>

</div>
</section>
</div>
<?php $this->load->view('mhs/dist/footer'); ?>
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
function validateForm() {
    var radios = document.querySelectorAll('input[type="radio"]');
    var isAnyRadioChecked = false;

    radios.forEach(function(radio) {
        if (radio.checked) {
            isAnyRadioChecked = true;
        }
    });

    if (!isAnyRadioChecked) {
        // Menggunakan SweetAlert untuk menampilkan pesan kesalahan
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Harap isi semua pertanyaan sebelum mengirimkan evaluasi.'
        });
        return false;
    }

    // Menggunakan SweetAlert untuk menampilkan pesan sukses setelah mengirim formulir
    Swal.fire({
        icon: 'success',
        title: 'Sukses!',
        text: 'Data berhasil dikirim.'
    });

    return true;
}
$(document).ready(function() {
    $('#evaluasiForm').on('submit', function(event) {
        event.preventDefault(); // Mencegah form dikirim secara normal

        // Tampilkan SweetAlert konfirmasi
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak bisa mengubah data setelah disubmit.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Submit!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna mengkonfirmasi, kirim form melalui AJAX
                $.ajax({
                    url: $('#evaluasiForm').attr('action'),
                    method: 'POST',
                    data: $('#evaluasiForm').serialize(),
                    success: function(response) {
                        // Tampilkan SweetAlert sukses
                        Swal.fire({
                            title: 'Success!',
                            text: 'Form submitted successfully!',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000
                        }).then(function() {
                            // Alihkan pengguna ke halaman baru setelah beberapa detik
                            window.location.href =
                                '<?php echo site_url('mhs/khs'); ?>';
                        });
                    },
                    error: function(xhr, status, error) {
                        // Tampilkan pesan kesalahan jika ada
                        Swal.fire({
                            title: 'Error!',
                            text: 'Terjadi kesalahan. Silakan coba lagi.',
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }
                });
            }
        });
    });
});
</script>