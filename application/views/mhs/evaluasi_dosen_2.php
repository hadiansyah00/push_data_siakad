<!DOCTYPE html>
<html lang="en">

<head>
    <title>Formulir Evaluasi Dosen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-size: 16px;
        }

        .container-center {
            margin: auto;
        }

        table {
            font-size: 14px;
            width: 100%;
            border-collapse: collapse;
            border: 0; /* Tambahkan ini untuk menghilangkan garis di sekitar tabel */
        }

        th,
        td {
            border: 0; /* Tambahkan ini untuk menghilangkan garis di sekitar sel header dan sel data */
            padding: 10px;
        }

        thead {
            background-color: #333;
            color: #fff;
        }

        th {
            background-color: #555;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .transparan {
            background-color: rgba(255, 255, 255, 0.7); /* Warna putih dengan tingkat kejernihan 0.7 */
        }

        .text-center {
            text-align: center;
        }

        .table-row {
            display: flex;
            justify-content: space-between;
        }

        /* Tambahkan ini untuk menghilangkan efek hover pada th dan td */
        th:hover,
        td:hover {
            background-color: initial;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.0/dist/sweetalert2.all.min.js"></script>
</head>

<body>
    <div class="container-fluid mt-6">
        <div class="container container-center">
            <div class="card">
                <div class="card-body">
                    <figure class="text-center">
                        <blockquote class="blockquote">
                            <p>Formulir Evaluasi Dosen Mahasiswa</p>
                        </blockquote>
                        
                        <figcaption class="blockquote-footer">
                            DOSEN PENGAJAR 1<cite title="Source Title"></cite>
                        </figcaption>
                    </figure>
                        <div class="box-body col-md-5">
                				<table class="table">
                				    <tbody>
                				        <tr>
            								<th>Nama Dosen</th>
            								<td> : </td>
            								<td><?php echo $dosen->nama_dosen; ?></td>
            							</tr>
            							<tr>
            								<th>Kode MK</th>
            								<td> : </td>
            								<td><?php echo $kd_mk; ?></td>
            							</tr>
							            
                				    </tbody>
                				</table>
            			</div>
                    <form method="post" action="<?php echo site_url('mhs/Evaluasi_mhs/simpan_dosen_2'); ?>" onsubmit="return validateForm()">
                     <input type="hidden" name="id_dosen" value="<?php echo $dosen->id_dosen; ?>">
                    <input type="hidden" name="id_krs" value="<?php echo $krs->id_krs; ?>">
                     <input type="hidden" name="kd_mk" value="<?php echo $kd_mk; ?>">
                    <input type="hidden" name="id_mahasiswa" value="<?php echo $mhs['id_mahasiswa']; ?>">
                    <input type="hidden" name="id_ta" value="<?php echo $tahun['id_ta']; ?>">

                        <div class="table-responsive transparan">
                            <table class="table table-striped mx-auto"> <!-- Tambahkan mx-auto untuk center tabel -->
                                <tbody>
                                    <?php
                                    $i = 1;
                                    if (!empty($pertanyaan)) {
                                        foreach ($pertanyaan as $row) {
                                            echo '<tr>';
                                            echo '<td>' . $i . '</td>';
                                            echo '<td class="d-flex flex-column">' . $row->pertanyaan . '</td>';
                                            echo '<td class="d-flex flex-column">';
                                            echo '<label><input type="radio" name="jawaban[' . $row->id_eval . ']" value="5" required> Sangat Baik</label>';
                                            echo '<label><input type="radio" name="jawaban[' . $row->id_eval . ']" value="4" required> Baik</label>';
                                            echo '<label><input type="radio" name="jawaban[' . $row->id_eval . ']" value="3" required> Cukup</label>';
                                            echo '<label><input type="radio" name="jawaban[' . $row->id_eval . ']" value="2" required> Kurang Baik</label>';
                                            echo '<label><input type="radio" name="jawaban[' . $row->id_eval . ']" value="1" required> Sangat Kurang Baik</label>';
                                            echo '</td>';
                                            echo '</tr>';
                                            $i++;
                                        }
                                    } else {
                                        echo '<tr><td colspan="3">Tidak ada pertanyaan yang tersedia saat ini.</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                     <div class="form-floating">
                        <textarea class="form-control" name="saran" id="floatingTextarea2" required></textarea>
                        <label for="floatingTextarea2">Kritik dan Saran</label>
                    </div>

                        <!-- Menambahkan elemen untuk menampilkan pesan kesalahan -->
                        <div id="error-container"></div>

                        <br>
                     <div style="display: flex; justify-content: center;">
                          <input class="btn btn-success btn-sm" type="submit" value="Kirim Evaluasi Dosen" onclick="return confirm('Pastikan keputusan Anda, tindakan ini tidak dapat dibatalkan.')">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script>
        function validateForm() {
            var radios = document.querySelectorAll('input[type="radio"]');
            var isAnyRadioChecked = false;

            radios.forEach(function (radio) {
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
    </script>
</body>

</html>
