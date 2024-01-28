<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('mhs/dist/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Jadwal Kuliah</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Jadwak Perkuliahan</a></div>
                <div class="breadcrumb-item">Jadwal UAS</div>
            </div>
        </div>
        <div class="section-body">
            <!-- <h2 class="section-title">Jadwal Kuliah - STIKES BOGOR HUSADA</h2> -->
            <!-- <p class="section-lead">Example of some Bootstrap table components.</p> -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4><?php if ($mhs['kelas_mhs'] == 1) { ?>
                                <a href="<?php echo base_url('mhs/Jadwaluts/print_uts_kelas_karyawan/' . $mhs['id_mahasiswa']); ?>"
                                    target="_blank" class="btn btn-sm btn-primary "><i class="icofont-print"></i> Cetak
                                    Kartu
                                    UTS</a>
                                <?php } else { ?>
                                <a href="<?php echo base_url('mhs/Jadwaluts/print_uts_kelas_pagi/' . $mhs['id_mahasiswa']); ?>"
                                    target="_blank" class="btn btn-sm btn-primary "><i class="icofont-print"></i> Cetak
                                    Kartu
                                    UTS</a>
                                <?php } ?>
                            </h4>
                            <div class="card-header-action">
                                <form>
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
                            <?php if ($mhs['kelas_mhs'] == 1) { ?>
                            <div class="table-responsive">
                                <table class="table table-striped" id="sortable-table">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Kode MK</td>
                                            <td>Matakuliah</td>
                                            <td>SKS</td>
                                            <td>Tanggal</td>
                                            <td>Waktu</td>
                                            <td>Ruang</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
									$i = 1;
									$sksk = 0;
									foreach ($getUts as $row) { ?>
                                        <?php if ($row->semester == $tahun['semester']) { ?>

                                        <?php if ($row->status == $mhs['status']) { ?>
                                        <?php $sksk = $sksk + $row->sks; ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row->kd_mk; ?></td>
                                            <td><?php echo $row->matakuliah; ?></td>
                                            <td><?php echo $row->sks; ?></td>
                                            <td><?php echo format_indo($row->tgl_uts, date('d-m-y')); ?></td>
                                            <td><?php echo $row->jam; ?></td>
                                            <td><?php echo $row->ruang_uts; ?></td>
                                        </tr>
                                        <?php } ?>

                                        <?php } ?>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <?php } else { ?>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped" id="sortable-table">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Kode MK</td>
                                            <td>Matakuliah</td>
                                            <td>SKS</td>
                                            <td>Tanggal</td>
                                            <td>Waktu</td>
                                            <td>Ruang</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
											$i = 1;
											$sksk = 0;
											foreach ($getUts as $row) { ?>
                                        <?php if ($row->semester == $tahun['semester']) { ?>
                                        <?php if ($row->smt == $mhs['semester']) { ?>

                                        <?php $sksk = $sksk + $row->sks; ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row->kd_mk; ?></td>
                                            <td><?php echo $row->matakuliah; ?></td>
                                            <td><?php echo $row->sks; ?></td>
                                            <td><?php echo format_indo($row->tgl_uts, date('d-m-y')); ?></td>
                                            <td><?php echo $row->jam; ?></td>
                                            <td><?php echo $row->ruang_uts; ?></td>
                                        </tr>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php } ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
<?php $this->load->view('mhs/dist/footer'); ?>