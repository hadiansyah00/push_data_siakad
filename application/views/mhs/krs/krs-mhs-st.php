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
                                <table class="table table-striped" id="table-1">
                                    <tr>
                                        <th>#</th>
                                        <th>Aksi</th>
                                        <th>Kode MK</th>
                                        <th>Matakuliah</th>
                                        <th>SKS</th>
                                        <th>Dosen 1</th>
                                        <th>Dosen 2</th>
                                    </tr>
                                    <tbody>
                                        <?php
											
										$i = 1;
										$sks1 = 0;
										foreach ($getKrs as $krs) { 
											?>
                                        <?php if ($krs->smt == $mhs['semester'] && $krs->semester == $tahun['semester'] && $krs->status == $tahun['status'] && $krs->mk_pilihan == $mk_2['mk_pilihan']) { 
												// Tambahkan nilai SKS dari setiap mata kuliah ke dalam variabel $sks2
														$sks1 += $krs->sks;
														?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td>
                                                <input type="checkbox" name="krs[]"
                                                    value="<?php echo $krs->id_kurikulum; ?>">
                                            </td>
                                            <td><?php echo $krs->kd_mk; ?></td>
                                            <td><?php echo $krs->matakuliah; ?></td>
                                            <td><?php echo $krs->sks; ?></td>
                                            <?php echo 
											$dosen1 = $this->KurikulumModel->getDosenNameById_peran($row->id_perdos);
											// Di sini kita dapat menambahkan kode untuk mengambil nama dosen berdasarkan $row->id_peran
											$dosen2 = $this->KurikulumModel->getDosenNameById($row->id_peran);
											?>
                                            <td><?php echo $dosen1 ?></td>
                                            <td><?php echo $dosen2 ?></td>
                                        </tr>
                                        <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                    <tr>
                                        <th class="text-center" colspan="4">Jumlah SKS </th>

                                        <th><?php echo $sks1; ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-center">
                                            <h3>Matakuliah Pilihan</h3>
                                        </th>
                                    </tr>
                                    <tbody>
                                        <?php
											$i = 1;
											$sks2 = 0;
											foreach ($getKrs as $krs) {
												if ($krs->smt == $mhs['semester'] && 
													$krs->semester == $tahun['semester'] && 
													$krs->status == $tahun['status'] && 
													$krs->mk_pilihan == $mk['mk_pilihan']) { 
														
														// Tambahkan nilai SKS dari setiap mata kuliah ke dalam variabel $sks2
														$sks2 += $krs->sks;
											?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td>
                                                <input type="checkbox" name="krs[]"
                                                    value="<?php echo $krs->id_kurikulum; ?>">
                                            </td>
                                            <td><?php echo $krs->kd_mk; ?></td>
                                            <td><?php echo $krs->matakuliah; ?></td>
                                            <td><?php echo $krs->sks; ?></td>
                                        </tr>
                                        <?php 
									}
								} 
								?>
                                    </tbody>

                                    <tr>
                                        <th class="text-center" colspan="4">Jumlah SKS Matakuliah Pilihan</th>

                                        <th><?php echo $sks2; ?></th>
                                    </tr>

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