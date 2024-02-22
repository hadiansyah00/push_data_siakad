<!-- End Breadcrumbs -->

<div class="container">

    <div class="row">
        <div class="col-lg-3" data-aos="fade-right">
            <img style="width: 200px;" src="<?php echo base_url('assets/images/uploads/' . $mhs['photo']); ?>"
                class="image-fluid" alt="">

        </div>
        <div class="col-lg-9 pt-4 pt-lg-0 content" data-aos="fade-left">

            <h3>Kartu Rencana Studi (KRS) - <?php echo $tahun['ta']; ?> (<?php echo $tahun['semester']; ?>)</h3>

            <div class="row">

                <div class="col-lg-9">
                    <table class="table table-sm">
                        <tr>
                            <th><i class="icofont-rounded-right"></i> Jurusan/Prodi </th>
                            <td>:</td>
                            <td><?php echo $mhs['jenjang']; ?> - <?php echo $mhs['jurusan']; ?></td>
                        </tr>
                        <tr>
                            <th> <i class="icofont-rounded-right"></i> Nama </th>
                            <td>:</td>
                            <td><?php echo $mhs['nama_mhs']; ?></td>
                        </tr>
                        <tr>
                            <th><i class="icofont-rounded-right"></i> NIM </th>
                            <td>:</td>
                            <td><?php echo $mhs['nim']; ?></td>
                        </tr>
                        <tr>
                            <th><i class="icofont-rounded-right"></i> Nama Dospem </th>
                            <td>:</td>
                            <td><?php echo $mhs['nama_dosen']; ?></td>
                        </tr>
                        <tr>
                            <th><i class="icofont-rounded-right"></i> Semester </th>
                            <td>:</td>
                            <td><?php echo $mhs['semester']; ?></td>
                        </tr>
                        <tr>
                            <th width="180px"><i class="icofont-rounded-right"></i> Tahun Akademik </th>
                            <td>:</td>
                            <td>
                                <?php echo $tahun['ta']; ?> (<?php echo $tahun['semester']; ?>)
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <p>
        <?php echo $this->session->flashdata('pesan'); ?>
    </p>
    <div class="row">
        <div class="col-md-12" data-aos="">
            <form id="formKrs">
                <table class="table table-bordered table-striped table-responsive">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Kode MK</th>
                            <th>Matakuliah</th>
                            <th>Semester</th>
                            <th>SKS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
            $i = 1;
            foreach ($getKrs as $krs) { ?>
                        <?php if ($krs->smt == $mhs['semester']) { ?>
                        <?php if ($krs->semester == $tahun['semester']) { ?>
                        <?php if ($krs->status == $tahun['status']) { ?>
                        <?php if ($krs->mk_pilihan == $mk_2['mk_pilihan']) { ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td>
                                <?php if ($sks < 24) { ?>
                                <input type="checkbox" name="krs[]" value="<?php echo $krs->id_kurikulum; ?>">
                                <?php } ?>
                            </td>
                            <td><?php echo $krs->kd_mk; ?></td>
                            <td><?php echo $krs->matakuliah; ?></td>
                            <td><?php echo $krs->smt; ?></td>
                            <td><?php echo $krs->sks; ?></td>
                        </tr>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>

                <h4 style="text-center ">Matakuliah Pilihan</h4>

                <table class="table table-bordered table-striped table-responsive">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Kode MK</th>
                            <th>Matakuliah</th>
                            <th>Semester</th>
                            <th>SKS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
					$i = 1;
					foreach ($getKrs as $krs) { ?>
                        <?php if ($krs->smt == $mhs['semester']) { ?>
                        <?php if ($krs->semester == $tahun['semester']) { ?>
                        <?php if ($krs->status == $tahun['status']) { ?>
                        <?php if ($krs->mk_pilihan == $mk['mk_pilihan']) { ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td>

                                <input type="checkbox" name="krs[]" value="<?php echo $krs->id_kurikulum; ?>">

                            </td>
                            <td><?php echo $krs->kd_mk; ?></td>
                            <td><?php echo $krs->matakuliah; ?></td>
                            <td><?php echo $krs->smt; ?></td>
                            <td><?php echo $krs->sks; ?></td>
                        </tr>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>

                <!-- Tombol Simpan KRS -->
                <button type="button" id="simpanKrs" class="btn btn-primary">Simpan KRS</button>
            </form>
        </div>


        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <!-- Script JavaScript -->
        <!-- Skrip JavaScript -->
        <script>
        $(document).ready(function() {
            $("#simpanKrs").click(function() {
                // Menampilkan konfirmasi sebelum mengirim formulir
                var confirmation = confirm("Cek Kembali Sebelum Memilih dengan Pilihan Anda? ");

                // Jika pengguna menekan OK, lanjutkan dengan mengirim formulir
                if (confirmation) {
                    var selectedKrs = [];
                    $.each($("input[name='krs[]']:checked"), function() {
                        selectedKrs.push($(this).val());
                    });

                    $.ajax({
                        url: "<?php echo base_url('mhs/krs/simpan_krs'); ?>",
                        method: "POST",
                        data: {
                            krs: selectedKrs
                        },
                        dataType: "json",
                        success: function(response) {
                            console.log(response);

                            // Tambahkan logika atau tindakan lain sesuai kebutuhan
                            alert(response.message);
                        },
                        error: function(error) {
                            console.log(error);

                            // Tambahkan logika atau tindakan lain sesuai kebutuhan
                            alert('Terjadi kesalahan saat menyimpan KRS.');
                        }
                    });
                }
            });
        });
        </script>