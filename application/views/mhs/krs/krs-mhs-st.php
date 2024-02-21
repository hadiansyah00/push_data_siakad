<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('mhs/dist/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Input KRS</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Akademik</a></div>
                <div class="breadcrumb-item">Input Krs</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Kartu Rencana Studi Mahasiswa</h2>
            <p class="section-lead"> Tahun Akadedmik <?php echo $tahun['ta'] ?> /
                <?php echo$tahun['semester']?>
            </p>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tabel Pengisian Kartu Rencana Studi</h4>
                            <div class="card-header-form">
                                <form id="formKrs">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Aksi</th>
                                        <th>Kode MK</th>
                                        <th>Matakuliah</th>
                                        <th>Semester</th>
                                        <th>SKS</th>
                                        <th>TA</th>
                                    </tr>
                                    <tbody>
                                        <?php
										$i = 1;
										foreach ($getKrs as $krs) { ?>
                                        <?php if ($krs->smt == $mhs['semester']) { ?>
                                        <?php if ($krs->semester == $tahun['semester']) { ?>
                                        <?php if ($krs->status == $tahun['status']) { ?>
                                        <?php if ($krs->mk_pilihan == $mk_2['mk_pilihan']) { ?>
                                        <tr>
                                            <td>

                                                <?php if ($sks < 24) { ?>
                                                <input type="checkbox" name="krs[]"
                                                    value="<?php echo $krs->id_kurikulum; ?>">
                                                <?php } ?>
                                            </td>
                                            <td><?php echo $krs->kd_mk; ?></td>
                                            <td><?php echo $krs->matakuliah; ?></td>
                                            <td><?php echo $krs->smt; ?></td>
                                            <td><?php echo $krs->sks; ?></td>
                                            <td><?php echo $krs->status; ?></td>
                                        </tr>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php } ?>

                                    </tbody>
                                </table>
                                <h4 style="text-center ">Matakuliah Pilihan</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped">
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

                                            <?php if ($krs->mk_pilihan == $mk['mk_pilihan']) { ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td>
                                                    <?php if ($sks < 24) { ?>
                                                    <input type="checkbox" name="krs[]"
                                                        value="<?php echo $krs->id_kurikulum; ?>">
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
                                        </tbody>
                                    </table>

                                    <!-- Tombol Simpan KRS -->
                                    <button type="button" id="simpanKrs" class="btn btn-primary">Simpan KRS</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
</section>
</div>
<?php $this->load->view('mhs/dist/footer'); ?>
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