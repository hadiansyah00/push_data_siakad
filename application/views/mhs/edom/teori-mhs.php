<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('mhs/dist/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>EDOM Teori</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Akademik</a></div>
                <div class="breadcrumb-item">Edom Teori</div>
            </div>
        </div>



        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tahun Akadedmik <?php echo $tahun['ta'] ?> /
                                <?php echo$tahun['semester']?></h4>

                            <div class="card-header-form">
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th align="center" rowspan="2" align="center">NO</th>
                                        <th rowspan="2">Kode MK</th>
                                        <th rowspan="2">Matakuliah</th>
                                        <th rowspan="2">SKS</th>
                                        <th>Nama Dosen 1</th>
                                        <th>Nama Dosen 2</th>
                                    </tr>
                                    <tbody align="text-center">
                                        <?php
									error_reporting(0);
									$i = 1;
									$sks = 0;
									foreach ($viewKrs as $row) {
										$sks = $sks + $row->sks; ?>
                                        <?php if ($row->semester == $tahun['semester']) { ?>
                                        <?php if ($row->smt == $mhs['semester']) { ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row->kd_mk; ?></td>
                                            <td><?php echo $row->matakuliah; ?></td>
                                            <td><?php echo $row->sks; ?></td>
                                            <?php
										$pengajar_1 = $this->KurikulumModel->getIdDosenById($row->id_peran);
										$pengajar_2 = $this->KurikulumModel->getIdDosenById_peran($row->id_perdos);
										?>
                                            <?php
										$link_kuesioner = site_url('mhs/Evaluasi_mhs/mulai/' . $row->id_krs . '/' . $pengajar_2);
										$link_kuesioner_2 = site_url('mhs/Evaluasi_mhs/mulai_2/' . $row->id_krs . '/' . $pengajar_1);
										?>
                                            <?php
										// Di sini kita dapat menambahkan kode untuk mengambil nama dosen berdasarkan $row->id_perdos
										$dosen1 = $this->KurikulumModel->getDosenNameById_peran($row->id_perdos);
								
										?>
                                            <?php
										// Di sini kita dapat menambahkan kode untuk mengambil nama dosen berdasarkan $row->id_peran
										$dosen2 = $this->KurikulumModel->getDosenNameById($row->id_peran);
										
										?>
                                            <?php
                                 	   // Misalnya, jika $row->id_perdos == 0, maka link akan dinonaktifkan
											$link_kuesioner = ($row->id_perdos == 0) ? 'javascript:void(0);' : $link_kuesioner;
											$link_kuesioner_2 = ($row->id_peran == 0) ? 'javascript:void(0);' : $link_kuesioner_2;
                             			   ?>

                                            <td>
                                                <p>
                                                    <strong>
                                                        <?= $row->status_edom_1 == 1 ? '<i class="fas fa-check-circle text-success"> </i>' . '&nbsp;'. $dosen1 : '' .$dosen1 ?>
                                                    </strong>
                                                </p>
                                                <?= ($row->status_edom_1 == 1 && $row->id_perdos != 0 && $row->id_peran != 0) ? '' : '' ?>
                                                <?php if ($row->status_edom_1 == 0 || $row->status_edom_1 === null): ?>
                                                <a class="btn btn-sm btn-success <?php echo ($row->id_perdos == 0) ? 'disabled' : ''; ?>"
                                                    href="<?php echo $link_kuesioner; ?>">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <p>
                                                    <strong>
                                                        <?= $row->status_edom_2 == 1 ? '<i class="fas fa-check-circle text-success"> </i>' . '&nbsp;'. $dosen2 : '' .$dosen2 ?>
                                                    </strong>
                                                </p>
                                                <?= ($row->status_edom_2 == 1 && $row->id_perdos != 0 && $row->id_peran != 0) ? '' : '' ?>
                                                <?php if ($row->status_edom_2 == 0 || $row->status_edom_2 === null ): ?>
                                                <a class="btn btn-sm btn-success <?php echo ($row->id_peran == 0) ? 'disabled' : ''; ?>"
                                                    href="<?php echo $link_kuesioner_2; ?>">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>

                                        <?php
										$tot_bobot = $row->sks * $bobot;
										$grand_tot = $grand_tot + $tot_bobot;
										?>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>

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