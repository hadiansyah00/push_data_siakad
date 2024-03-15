<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('mhs/dist/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Cetak KRS</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Akademik</a></div>
                <div class="breadcrumb-item">Cetak KRS</div>
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

                                <!-- <a href="<?php echo base_url('mhs/Transkrip/printKHS/' . $mhs['id_mahasiswa']); ?>"
                                    target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i>
                                    Cetak
                                    KHS</a> -->
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th align="center" rowspan="2" align="center">NO</th>
                                        <!--<th rowspan="2">KODE</th>-->
                                        <th rowspan="2">MATAKULIAH</th>
                                        <th rowspan="2">SKS</th>
                                        <th>HM</th>
                                        <th>AM</th>
                                        <th rowspan=" 2"> SKS X AM </th>
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

                                            <td><?php echo $row->matakuliah; ?></td>
                                            <td><?php echo $row->sks; ?></td>

                                            <td>
                                                <p><strong>
                                                        <?php echo $row->status_edom_2 == 1 ? '&nbsp;' . $row->$nilai : '' ?>
                                                    </strong></p>
                                                <?php if ($row->status_edom_2 == 0 || $row->status_edom_2 == null): ?>
                                                <i class="fas fa-times-circle text-danger data-toggle=" tooltip
                                                    title="Belum Mengisi EDOM"></i>
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <?php
										if ($row->nilai == 'A') {
											echo $bobot = 4.00;
										} elseif ($row->nilai == 'AB') {
											echo $bobot = 3.75;
										} elseif ($row->nilai == 'BA') {
											echo $bobot = 3.50;
										} elseif ($row->nilai == 'B') {
											echo $bobot = 3.00;
										} elseif ($row->nilai == 'BC') {
											echo $bobot = 2.75;
										} elseif ($row->nilai == 'C') {
											echo $bobot = 2.00;
										} elseif ($row->nilai == 'D') {
											echo $bobot = 1.00;
										} elseif ($row->nilai == 'E') {
											echo $bobot = 0;
										} else {
											echo $bobot = 0;
										}
										?>
                                            </td>
                                            <td>
                                                <?php

										if ($row->nilai == 'A') {
											echo $bobot2 = $row->sks * 4.00;
										} elseif ($row->nilai == 'AB') {
											echo $bobot2 = $row->sks * 3.75;
										} elseif ($row->nilai == 'BA') {
											echo $bobot2 = $row->sks * 3.50;
										} elseif ($row->nilai == 'B') {
											echo $bobot2 = $row->sks * 3.00;
										} elseif ($row->nilai == 'BC') {
											echo $bobot2 = $row->sks * 2.75;
										} elseif ($row->nilai == 'C') {
											echo $bobot2 = $row->sks * 2.00;
										} elseif ($row->nilai == 'D') {
											echo $bobot2 = $row->sks * 1.00;
										} elseif ($row->nilai == 'E') {
											echo $bobot2 = $row->sks * 0;
										} else {
											echo $bobot2 = 0;
										}
										?>
                                            </td>
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


                                    <tr>
                                        <th colspan="9" align="center">Jumlah SKS</th>
                                        <th><strong><?php echo $sks; ?></strong></th>
                                    </tr>

                                    <tr>
                                        <th colspan="9" align="center">Jumlah SKS x AM </th>
                                        <th><strong><?php echo $grand_tot; ?></strong></th>
                                    </tr>
                                    <tr>
                                        <th colspan="9" align="center">IPS (Indeks Per Semester) </th>
                                        <th><strong>
                                                <?php echo number_format($hasil = $grand_tot / $sks, 2); ?></strong>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="9" align="center">Predikat</th>
                                        <th><strong><?php
										if ($hasil >= 3.51 && $hasil <= 4.00) {
											echo "Dengan Pujian";
										} elseif ($hasil >= 3.01 && $hasil <= 3.50) {
											echo "Sangat Memuaskan";
										} elseif ($hasil >= 2.76 && $hasil <= 3.00) {
											echo "Memuaskan";
										} elseif ($hasil >= 2.00 && $hasil <= 2.75) {
											echo "Kurang Memuaskan";
										} elseif ($hasil >= 1 && $hasil <= 1.99) {
											echo "Gagal";
										} else {
											echo "Null";
										}
								?></strong></th>
                                    </tr>
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