<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('mhs/dist/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Transkrip Nilai Mahasiswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Akademik</a></div>
                <div class="breadcrumb-item">Trasnkrip </div>
            </div>
        </div>



        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Semester 1

                                <div class="card-header-form">

                                    <!-- <a href="#" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i>
                                    Transkrip</a> -->
                                </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Kode</td>
                                            <td>Matakuliah</td>
                                            <td>SKS</td>
                                            <td>Nilai UTS</td>
                                            <td>Nilai UAS</td>
                                            <td>Nilai KHS</td>
                                            <td>Angka Mutu</td>
                                            <td>Bobot</td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
									$i = 1;
									$sks = 0;
									$sks2 = 0;
									foreach ($viewKrs as $vi) {
									    if ($vi->smt == 1)
										$sks = $sks + $vi->sks;
										$sks2 =$sks2 + $vi->sks; ?>
                                        <?php if ($vi->smt == 1) { ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $vi->kd_mk; ?></td>
                                            <td><?php echo $vi->matakuliah; ?></td>
                                            <td><?php echo $vi->sks; ?></td>
                                            <td><?php echo $vi->nilai_uts; ?></td>
                                            <td><?php echo $vi->nilai_uas; ?></td>
                                            <td><?php echo $vi->nilai; ?></td>
                                            <td>
                                                <?php
													if ($vi->nilai == 'A') {
														echo $bobot = 4.00;
													} elseif ($vi->nilai == 'AB') {
														echo $bobot = 3.75;
													} elseif ($vi->nilai == 'BA') {
														echo $bobot = 3.5;
													} elseif ($vi->nilai == 'B') {
														echo $bobot = 3.00;
													} elseif ($vi->nilai == 'BC') {
														echo $bobot = 2.75;
													} elseif ($vi->nilai == 'C') {
														echo $bobot = 2.00;
													} elseif ($vi->nilai == 'D') {
														echo $bobot = 1.00;
													} elseif ($vi->nilai == 'E') {
														echo $bobot = 0;
													} else {
														echo $bobot = 0;
													}
													?>
                                            </td>
                                            <td>
                                                <?php

													if ($vi->nilai == 'A') {
														echo $bobot2 = $vi->sks * 4.00;
													} elseif ($vi->nilai == 'AB') {
														echo $bobot2 = $vi->sks * 3.75;
													} elseif ($vi->nilai == 'BA') {
														echo $bobot2 = $vi->sks * 3.5;
													} elseif ($vi->nilai == 'B') {
														echo $bobot2 = $vi->sks * 3.00;
													} elseif ($vi->nilai == 'BC') {
														echo $bobot2 = $vi->sks * 2.75;
													} elseif ($vi->nilai == 'C') {
														echo $bobot2 = $vi->sks * 2.00;
													} elseif ($vi->nilai == 'D') {
														echo $bobot2 = $vi->sks * 1.00;
													} elseif ($vi->nilai == 'E') {
														echo $bobot2 = $vi->sks * 0;
													} else {
														echo $bobot2 = 0;
													}
													?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php
											$tot_bobot1 = $vi->sks * $bobot;
											$grand_tot1 = $grand_tot1 + $tot_bobot1;
								?>
                                    <?php } ?>
                                    <?php } ?>
                                    <tr>

                                        <th colspan="8" align="center">Jumlah SKS x AM </th>
                                        <th><strong><?php echo $grand_tot1; ?></strong></th>
                                    </tr>
                                    <tr>

                                        <th colspan="8" align="center">Jumlah SKS </th>
                                        <th><strong><?php echo $sks; ?></strong></th>
                                    </tr>
                                    <tr>

                                        <th colspan="8" align="center"> IPS </th>
                                        <th><strong> <?php echo number_format($hasil=$grand_tot1 / $sks, 2); ?></strong>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="8" align="center"> Dengan Predikat </th>
                                        <th><strong> <?php  
								 if ($hasil >= 3.51 && $hasil <= 4.00) {
                                        echo "Dengan Pujian";
                                    }
                                    elseif ($hasil >= 3.01 && $hasil <= 3.50) {
                                        echo "Sangat Memuaskan";
                                    }
                                    elseif ($hasil >= 2.76 && $hasil <= 3.00) {
                                        echo "Memuaskan";
                                    }
                                    elseif ($hasil >= 2.00 && $hasil <= 2.75) {
                                        echo "Kurang Memuaskan";
                                    }
                                     elseif ($hasil >= 1 && $hasil <= 1.99) {
                                        echo "Gagal";
                                    }
                                    else {
                                        echo "Null";
                                    }
								
								?></strong></th>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Semester 2

                                <div class="card-header-form">

                                    <!-- <a href="#" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i>
                                    Transkrip</a> -->
                                </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Kode</td>
                                            <td>Matakuliah</td>
                                            <td>SKS</td>
                                            <td>Nilai UTS</td>
                                            <td>Nilai UAS</td>
                                            <td>Nilai KHS</td>
                                            <td>Angka Mutu</td>
                                            <td>Bobot</td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
									$i = 1;
									$sks = 0;
									$sks2 = 0;
									foreach ($viewKrs as $vi) {
									    if ($vi->smt == 2)
										$sks = $sks + $vi->sks;
										$sks2 =$sks2 + $vi->sks; ?>
                                        <?php if ($vi->smt == 2) { ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $vi->kd_mk; ?></td>
                                            <td><?php echo $vi->matakuliah; ?></td>
                                            <td><?php echo $vi->sks; ?></td>
                                            <td><?php echo $vi->nilai_uts; ?></td>
                                            <td><?php echo $vi->nilai_uas; ?></td>
                                            <td><?php echo $vi->nilai; ?></td>
                                            <td>
                                                <?php
													if ($vi->nilai == 'A') {
														echo $bobot = 4.00;
													} elseif ($vi->nilai == 'AB') {
														echo $bobot = 3.75;
													} elseif ($vi->nilai == 'BA') {
														echo $bobot = 3.5;
													} elseif ($vi->nilai == 'B') {
														echo $bobot = 3.00;
													} elseif ($vi->nilai == 'BC') {
														echo $bobot = 2.75;
													} elseif ($vi->nilai == 'C') {
														echo $bobot = 2.00;
													} elseif ($vi->nilai == 'D') {
														echo $bobot = 1.00;
													} elseif ($vi->nilai == 'E') {
														echo $bobot = 0;
													} else {
														echo $bobot = 0;
													}
													?>
                                            </td>
                                            <td>
                                                <?php

													if ($vi->nilai == 'A') {
														echo $bobot2 = $vi->sks * 4.00;
													} elseif ($vi->nilai == 'AB') {
														echo $bobot2 = $vi->sks * 3.75;
													} elseif ($vi->nilai == 'BA') {
														echo $bobot2 = $vi->sks * 3.5;
													} elseif ($vi->nilai == 'B') {
														echo $bobot2 = $vi->sks * 3.00;
													} elseif ($vi->nilai == 'BC') {
														echo $bobot2 = $vi->sks * 2.75;
													} elseif ($vi->nilai == 'C') {
														echo $bobot2 = $vi->sks * 2.00;
													} elseif ($vi->nilai == 'D') {
														echo $bobot2 = $vi->sks * 1.00;
													} elseif ($vi->nilai == 'E') {
														echo $bobot2 = $vi->sks * 0;
													} else {
														echo $bobot2 = 0;
													}
													?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php
											$tot_bobot1 = $vi->sks * $bobot;
											$grand_tot1 = $grand_tot1 + $tot_bobot1;
								?>
                                    <?php } ?>
                                    <?php } ?>
                                    <tr>

                                        <th colspan="8" align="center">Jumlah SKS x AM </th>
                                        <th><strong><?php echo $grand_tot1; ?></strong></th>
                                    </tr>
                                    <tr>

                                        <th colspan="8" align="center">Jumlah SKS </th>
                                        <th><strong><?php echo $sks; ?></strong></th>
                                    </tr>
                                    <tr>

                                        <th colspan="8" align="center"> IPS </th>
                                        <th><strong> <?php echo number_format($hasil=$grand_tot1 / $sks, 2); ?></strong>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="8" align="center"> Dengan Predikat </th>
                                        <th><strong> <?php  
								 if ($hasil >= 3.51 && $hasil <= 4.00) {
                                        echo "Dengan Pujian";
                                    }
                                    elseif ($hasil >= 3.01 && $hasil <= 3.50) {
                                        echo "Sangat Memuaskan";
                                    }
                                    elseif ($hasil >= 2.76 && $hasil <= 3.00) {
                                        echo "Memuaskan";
                                    }
                                    elseif ($hasil >= 2.00 && $hasil <= 2.75) {
                                        echo "Kurang Memuaskan";
                                    }
                                     elseif ($hasil >= 1 && $hasil <= 1.99) {
                                        echo "Gagal";
                                    }
                                    else {
                                        echo "Null";
                                    }
								
								?></strong></th>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Semester 3

                                <div class="card-header-form">

                                    <!-- <a href="#" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i>
                                    Transkrip</a> -->
                                </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Kode</td>
                                            <td>Matakuliah</td>
                                            <td>SKS</td>
                                            <td>Nilai UTS</td>
                                            <td>Nilai UAS</td>
                                            <td>Nilai KHS</td>
                                            <td>Angka Mutu</td>
                                            <td>Bobot</td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
									$i = 1;
									$sks = 0;
									$sks2 = 0;
									foreach ($viewKrs as $vi) {
									    if ($vi->smt == 3)
										$sks = $sks + $vi->sks;
										$sks2 =$sks2 + $vi->sks; ?>
                                        <?php if ($vi->smt == 3) { ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $vi->kd_mk; ?></td>
                                            <td><?php echo $vi->matakuliah; ?></td>
                                            <td><?php echo $vi->sks; ?></td>
                                            <td><?php echo $vi->nilai_uts; ?></td>
                                            <td><?php echo $vi->nilai_uas; ?></td>
                                            <td><?php echo $vi->nilai; ?></td>
                                            <td>
                                                <?php
													if ($vi->nilai == 'A') {
														echo $bobot = 4.00;
													} elseif ($vi->nilai == 'AB') {
														echo $bobot = 3.75;
													} elseif ($vi->nilai == 'BA') {
														echo $bobot = 3.5;
													} elseif ($vi->nilai == 'B') {
														echo $bobot = 3.00;
													} elseif ($vi->nilai == 'BC') {
														echo $bobot = 2.75;
													} elseif ($vi->nilai == 'C') {
														echo $bobot = 2.00;
													} elseif ($vi->nilai == 'D') {
														echo $bobot = 1.00;
													} elseif ($vi->nilai == 'E') {
														echo $bobot = 0;
													} else {
														echo $bobot = 0;
													}
													?>
                                            </td>
                                            <td>
                                                <?php

													if ($vi->nilai == 'A') {
														echo $bobot2 = $vi->sks * 4.00;
													} elseif ($vi->nilai == 'AB') {
														echo $bobot2 = $vi->sks * 3.75;
													} elseif ($vi->nilai == 'BA') {
														echo $bobot2 = $vi->sks * 3.5;
													} elseif ($vi->nilai == 'B') {
														echo $bobot2 = $vi->sks * 3.00;
													} elseif ($vi->nilai == 'BC') {
														echo $bobot2 = $vi->sks * 2.75;
													} elseif ($vi->nilai == 'C') {
														echo $bobot2 = $vi->sks * 2.00;
													} elseif ($vi->nilai == 'D') {
														echo $bobot2 = $vi->sks * 1.00;
													} elseif ($vi->nilai == 'E') {
														echo $bobot2 = $vi->sks * 0;
													} else {
														echo $bobot2 = 0;
													}
													?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php
											$tot_bobot1 = $vi->sks * $bobot;
											$grand_tot1 = $grand_tot1 + $tot_bobot1;
								?>
                                    <?php } ?>
                                    <?php } ?>
                                    <tr>

                                        <th colspan="8" align="center">Jumlah SKS x AM </th>
                                        <th><strong><?php echo $grand_tot1; ?></strong></th>
                                    </tr>
                                    <tr>

                                        <th colspan="8" align="center">Jumlah SKS </th>
                                        <th><strong><?php echo $sks; ?></strong></th>
                                    </tr>
                                    <tr>

                                        <th colspan="8" align="center"> IPS </th>
                                        <th><strong> <?php echo number_format($hasil=$grand_tot1 / $sks, 2); ?></strong>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="8" align="center"> Dengan Predikat </th>
                                        <th><strong> <?php  
								 if ($hasil >= 3.51 && $hasil <= 4.00) {
                                        echo "Dengan Pujian";
                                    }
                                    elseif ($hasil >= 3.01 && $hasil <= 3.50) {
                                        echo "Sangat Memuaskan";
                                    }
                                    elseif ($hasil >= 2.76 && $hasil <= 3.00) {
                                        echo "Memuaskan";
                                    }
                                    elseif ($hasil >= 2.00 && $hasil <= 2.75) {
                                        echo "Kurang Memuaskan";
                                    }
                                     elseif ($hasil >= 1 && $hasil <= 1.99) {
                                        echo "Gagal";
                                    }
                                    else {
                                        echo "Null";
                                    }
								
								?></strong></th>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Semester 4

                                <div class="card-header-form">

                                    <!-- <a href="#" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i>
                                    Transkrip</a> -->
                                </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Kode</td>
                                            <td>Matakuliah</td>
                                            <td>SKS</td>
                                            <td>Nilai UTS</td>
                                            <td>Nilai UAS</td>
                                            <td>Nilai KHS</td>
                                            <td>Angka Mutu</td>
                                            <td>Bobot</td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
									$i = 1;
									$sks = 0;
									$sks2 = 0;
									foreach ($viewKrs as $vi) {
									    if ($vi->smt == 4)
										$sks = $sks + $vi->sks;
										$sks2 =$sks2 + $vi->sks; ?>
                                        <?php if ($vi->smt == 4) { ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $vi->kd_mk; ?></td>
                                            <td><?php echo $vi->matakuliah; ?></td>
                                            <td><?php echo $vi->sks; ?></td>
                                            <td><?php echo $vi->nilai_uts; ?></td>
                                            <td><?php echo $vi->nilai_uas; ?></td>
                                            <td><?php echo $vi->nilai; ?></td>
                                            <td>
                                                <?php
													if ($vi->nilai == 'A') {
														echo $bobot = 4.00;
													} elseif ($vi->nilai == 'AB') {
														echo $bobot = 3.75;
													} elseif ($vi->nilai == 'BA') {
														echo $bobot = 3.5;
													} elseif ($vi->nilai == 'B') {
														echo $bobot = 3.00;
													} elseif ($vi->nilai == 'BC') {
														echo $bobot = 2.75;
													} elseif ($vi->nilai == 'C') {
														echo $bobot = 2.00;
													} elseif ($vi->nilai == 'D') {
														echo $bobot = 1.00;
													} elseif ($vi->nilai == 'E') {
														echo $bobot = 0;
													} else {
														echo $bobot = 0;
													}
													?>
                                            </td>
                                            <td>
                                                <?php

													if ($vi->nilai == 'A') {
														echo $bobot2 = $vi->sks * 4.00;
													} elseif ($vi->nilai == 'AB') {
														echo $bobot2 = $vi->sks * 3.75;
													} elseif ($vi->nilai == 'BA') {
														echo $bobot2 = $vi->sks * 3.5;
													} elseif ($vi->nilai == 'B') {
														echo $bobot2 = $vi->sks * 3.00;
													} elseif ($vi->nilai == 'BC') {
														echo $bobot2 = $vi->sks * 2.75;
													} elseif ($vi->nilai == 'C') {
														echo $bobot2 = $vi->sks * 2.00;
													} elseif ($vi->nilai == 'D') {
														echo $bobot2 = $vi->sks * 1.00;
													} elseif ($vi->nilai == 'E') {
														echo $bobot2 = $vi->sks * 0;
													} else {
														echo $bobot2 = 0;
													}
													?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php
											$tot_bobot1 = $vi->sks * $bobot;
											$grand_tot1 = $grand_tot1 + $tot_bobot1;
								?>
                                    <?php } ?>
                                    <?php } ?>
                                    <tr>

                                        <th colspan="8" align="center">Jumlah SKS x AM </th>
                                        <th><strong><?php echo $grand_tot1; ?></strong></th>
                                    </tr>
                                    <tr>

                                        <th colspan="8" align="center">Jumlah SKS </th>
                                        <th><strong><?php echo $sks; ?></strong></th>
                                    </tr>
                                    <tr>

                                        <th colspan="8" align="center"> IPS </th>
                                        <th><strong> <?php echo number_format($hasil=$grand_tot1 / $sks, 2); ?></strong>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="8" align="center"> Dengan Predikat </th>
                                        <th><strong> <?php  
								 if ($hasil >= 3.51 && $hasil <= 4.00) {
                                        echo "Dengan Pujian";
                                    }
                                    elseif ($hasil >= 3.01 && $hasil <= 3.50) {
                                        echo "Sangat Memuaskan";
                                    }
                                    elseif ($hasil >= 2.76 && $hasil <= 3.00) {
                                        echo "Memuaskan";
                                    }
                                    elseif ($hasil >= 2.00 && $hasil <= 2.75) {
                                        echo "Kurang Memuaskan";
                                    }
                                     elseif ($hasil >= 1 && $hasil <= 1.99) {
                                        echo "Gagal";
                                    }
                                    else {
                                        echo "Null";
                                    }
								
								?></strong></th>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Semester 5

                                <div class="card-header-form">

                                    <!-- <a href="#" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i>
                                    Transkrip</a> -->
                                </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Kode</td>
                                            <td>Matakuliah</td>
                                            <td>SKS</td>
                                            <td>Nilai UTS</td>
                                            <td>Nilai UAS</td>
                                            <td>Nilai KHS</td>
                                            <td>Angka Mutu</td>
                                            <td>Bobot</td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
									$i = 1;
									$sks = 0;
									$sks2 = 0;
									foreach ($viewKrs as $vi) {
									    if ($vi->smt == 5)
										$sks = $sks + $vi->sks;
										$sks2 =$sks2 + $vi->sks; ?>
                                        <?php if ($vi->smt == 5) { ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $vi->kd_mk; ?></td>
                                            <td><?php echo $vi->matakuliah; ?></td>
                                            <td><?php echo $vi->sks; ?></td>
                                            <td><?php echo $vi->nilai_uts; ?></td>
                                            <td><?php echo $vi->nilai_uas; ?></td>
                                            <td><?php echo $vi->nilai; ?></td>
                                            <td>
                                                <?php
													if ($vi->nilai == 'A') {
														echo $bobot = 4.00;
													} elseif ($vi->nilai == 'AB') {
														echo $bobot = 3.75;
													} elseif ($vi->nilai == 'BA') {
														echo $bobot = 3.5;
													} elseif ($vi->nilai == 'B') {
														echo $bobot = 3.00;
													} elseif ($vi->nilai == 'BC') {
														echo $bobot = 2.75;
													} elseif ($vi->nilai == 'C') {
														echo $bobot = 2.00;
													} elseif ($vi->nilai == 'D') {
														echo $bobot = 1.00;
													} elseif ($vi->nilai == 'E') {
														echo $bobot = 0;
													} else {
														echo $bobot = 0;
													}
													?>
                                            </td>
                                            <td>
                                                <?php

													if ($vi->nilai == 'A') {
														echo $bobot2 = $vi->sks * 4.00;
													} elseif ($vi->nilai == 'AB') {
														echo $bobot2 = $vi->sks * 3.75;
													} elseif ($vi->nilai == 'BA') {
														echo $bobot2 = $vi->sks * 3.5;
													} elseif ($vi->nilai == 'B') {
														echo $bobot2 = $vi->sks * 3.00;
													} elseif ($vi->nilai == 'BC') {
														echo $bobot2 = $vi->sks * 2.75;
													} elseif ($vi->nilai == 'C') {
														echo $bobot2 = $vi->sks * 2.00;
													} elseif ($vi->nilai == 'D') {
														echo $bobot2 = $vi->sks * 1.00;
													} elseif ($vi->nilai == 'E') {
														echo $bobot2 = $vi->sks * 0;
													} else {
														echo $bobot2 = 0;
													}
													?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php
											$tot_bobot1 = $vi->sks * $bobot;
											$grand_tot1 = $grand_tot1 + $tot_bobot1;
								?>
                                    <?php } ?>
                                    <?php } ?>
                                    <tr>

                                        <th colspan="8" align="center">Jumlah SKS x AM </th>
                                        <th><strong><?php echo $grand_tot1; ?></strong></th>
                                    </tr>
                                    <tr>

                                        <th colspan="8" align="center">Jumlah SKS </th>
                                        <th><strong><?php echo $sks; ?></strong></th>
                                    </tr>
                                    <tr>

                                        <th colspan="8" align="center"> IPS </th>
                                        <th><strong> <?php echo number_format($hasil=$grand_tot1 / $sks, 2); ?></strong>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="8" align="center"> Dengan Predikat </th>
                                        <th><strong> <?php  
								 if ($hasil >= 3.51 && $hasil <= 4.00) {
                                        echo "Dengan Pujian";
                                    }
                                    elseif ($hasil >= 3.01 && $hasil <= 3.50) {
                                        echo "Sangat Memuaskan";
                                    }
                                    elseif ($hasil >= 2.76 && $hasil <= 3.00) {
                                        echo "Memuaskan";
                                    }
                                    elseif ($hasil >= 2.00 && $hasil <= 2.75) {
                                        echo "Kurang Memuaskan";
                                    }
                                     elseif ($hasil >= 1 && $hasil <= 1.99) {
                                        echo "Gagal";
                                    }
                                    else {
                                        echo "Null";
                                    }
								
								?></strong></th>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Semester 6

                                <div class="card-header-form">

                                    <!-- <a href="#" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i>
                                    Transkrip</a> -->
                                </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Kode</td>
                                            <td>Matakuliah</td>
                                            <td>SKS</td>
                                            <td>Nilai UTS</td>
                                            <td>Nilai UAS</td>
                                            <td>Nilai KHS</td>
                                            <td>Angka Mutu</td>
                                            <td>Bobot</td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
									$i = 1;
									$sks = 0;
									$sks2 = 0;
									foreach ($viewKrs as $vi) {
									    if ($vi->smt == 6)
										$sks = $sks + $vi->sks;
										$sks2 =$sks2 + $vi->sks; ?>
                                        <?php if ($vi->smt == 6) { ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $vi->kd_mk; ?></td>
                                            <td><?php echo $vi->matakuliah; ?></td>
                                            <td><?php echo $vi->sks; ?></td>
                                            <td><?php echo $vi->nilai_uts; ?></td>
                                            <td><?php echo $vi->nilai_uas; ?></td>
                                            <td><?php echo $vi->nilai; ?></td>
                                            <td>
                                                <?php
													if ($vi->nilai == 'A') {
														echo $bobot = 4.00;
													} elseif ($vi->nilai == 'AB') {
														echo $bobot = 3.75;
													} elseif ($vi->nilai == 'BA') {
														echo $bobot = 3.5;
													} elseif ($vi->nilai == 'B') {
														echo $bobot = 3.00;
													} elseif ($vi->nilai == 'BC') {
														echo $bobot = 2.75;
													} elseif ($vi->nilai == 'C') {
														echo $bobot = 2.00;
													} elseif ($vi->nilai == 'D') {
														echo $bobot = 1.00;
													} elseif ($vi->nilai == 'E') {
														echo $bobot = 0;
													} else {
														echo $bobot = 0;
													}
													?>
                                            </td>
                                            <td>
                                                <?php

													if ($vi->nilai == 'A') {
														echo $bobot2 = $vi->sks * 4.00;
													} elseif ($vi->nilai == 'AB') {
														echo $bobot2 = $vi->sks * 3.75;
													} elseif ($vi->nilai == 'BA') {
														echo $bobot2 = $vi->sks * 3.5;
													} elseif ($vi->nilai == 'B') {
														echo $bobot2 = $vi->sks * 3.00;
													} elseif ($vi->nilai == 'BC') {
														echo $bobot2 = $vi->sks * 2.75;
													} elseif ($vi->nilai == 'C') {
														echo $bobot2 = $vi->sks * 2.00;
													} elseif ($vi->nilai == 'D') {
														echo $bobot2 = $vi->sks * 1.00;
													} elseif ($vi->nilai == 'E') {
														echo $bobot2 = $vi->sks * 0;
													} else {
														echo $bobot2 = 0;
													}
													?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php
											$tot_bobot1 = $vi->sks * $bobot;
											$grand_tot1 = $grand_tot1 + $tot_bobot1;
								?>
                                    <?php } ?>
                                    <?php } ?>
                                    <tr>

                                        <th colspan="8" align="center">Jumlah SKS x AM </th>
                                        <th><strong><?php echo $grand_tot1; ?></strong></th>
                                    </tr>
                                    <tr>

                                        <th colspan="8" align="center">Jumlah SKS </th>
                                        <th><strong><?php echo $sks; ?></strong></th>
                                    </tr>
                                    <tr>

                                        <th colspan="8" align="center"> IPS </th>
                                        <th><strong> <?php echo number_format($hasil=$grand_tot1 / $sks, 2); ?></strong>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="8" align="center"> Dengan Predikat </th>
                                        <th><strong> <?php  
								 if ($hasil >= 3.51 && $hasil <= 4.00) {
                                        echo "Dengan Pujian";
                                    }
                                    elseif ($hasil >= 3.01 && $hasil <= 3.50) {
                                        echo "Sangat Memuaskan";
                                    }
                                    elseif ($hasil >= 2.76 && $hasil <= 3.00) {
                                        echo "Memuaskan";
                                    }
                                    elseif ($hasil >= 2.00 && $hasil <= 2.75) {
                                        echo "Kurang Memuaskan";
                                    }
                                     elseif ($hasil >= 1 && $hasil <= 1.99) {
                                        echo "Gagal";
                                    }
                                    else {
                                        echo "Null";
                                    }
								
								?></strong></th>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Semester 7
                                <div class="card-header-form">

                                    <!-- <a href="#" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i>
                                    Transkrip</a> -->
                                </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Kode</td>
                                            <td>Matakuliah</td>
                                            <td>SKS</td>
                                            <td>Nilai UTS</td>
                                            <td>Nilai UAS</td>
                                            <td>Nilai KHS</td>
                                            <td>Angka Mutu</td>
                                            <td>Bobot</td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
									$i = 1;
									$sks = 0;
									$sks2 = 0;
									foreach ($viewKrs as $vi) {
									    if ($vi->smt == 7)
										$sks = $sks + $vi->sks;
										$sks2 =$sks2 + $vi->sks; ?>
                                        <?php if ($vi->smt == 7) { ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $vi->kd_mk; ?></td>
                                            <td><?php echo $vi->matakuliah; ?></td>
                                            <td><?php echo $vi->sks; ?></td>
                                            <td><?php echo $vi->nilai_uts; ?></td>
                                            <td><?php echo $vi->nilai_uas; ?></td>
                                            <td><?php echo $vi->nilai; ?></td>
                                            <td>
                                                <?php
													if ($vi->nilai == 'A') {
														echo $bobot = 4.00;
													} elseif ($vi->nilai == 'AB') {
														echo $bobot = 3.75;
													} elseif ($vi->nilai == 'BA') {
														echo $bobot = 3.5;
													} elseif ($vi->nilai == 'B') {
														echo $bobot = 3.00;
													} elseif ($vi->nilai == 'BC') {
														echo $bobot = 2.75;
													} elseif ($vi->nilai == 'C') {
														echo $bobot = 2.00;
													} elseif ($vi->nilai == 'D') {
														echo $bobot = 1.00;
													} elseif ($vi->nilai == 'E') {
														echo $bobot = 0;
													} else {
														echo $bobot = 0;
													}
													?>
                                            </td>
                                            <td>
                                                <?php

													if ($vi->nilai == 'A') {
														echo $bobot2 = $vi->sks * 4.00;
													} elseif ($vi->nilai == 'AB') {
														echo $bobot2 = $vi->sks * 3.75;
													} elseif ($vi->nilai == 'BA') {
														echo $bobot2 = $vi->sks * 3.5;
													} elseif ($vi->nilai == 'B') {
														echo $bobot2 = $vi->sks * 3.00;
													} elseif ($vi->nilai == 'BC') {
														echo $bobot2 = $vi->sks * 2.75;
													} elseif ($vi->nilai == 'C') {
														echo $bobot2 = $vi->sks * 2.00;
													} elseif ($vi->nilai == 'D') {
														echo $bobot2 = $vi->sks * 1.00;
													} elseif ($vi->nilai == 'E') {
														echo $bobot2 = $vi->sks * 0;
													} else {
														echo $bobot2 = 0;
													}
													?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php
											$tot_bobot1 = $vi->sks * $bobot;
											$grand_tot1 = $grand_tot1 + $tot_bobot1;
								?>
                                    <?php } ?>
                                    <?php } ?>
                                    <tr>

                                        <th colspan="8" align="center">Jumlah SKS x AM </th>
                                        <th><strong><?php echo $grand_tot1; ?></strong></th>
                                    </tr>
                                    <tr>

                                        <th colspan="8" align="center">Jumlah SKS </th>
                                        <th><strong><?php echo $sks; ?></strong></th>
                                    </tr>
                                    <tr>

                                        <th colspan="8" align="center"> IPS </th>
                                        <th><strong> <?php echo number_format($hasil=$grand_tot1 / $sks, 2); ?></strong>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="8" align="center"> Dengan Predikat </th>
                                        <th><strong> <?php  
								 if ($hasil >= 3.51 && $hasil <= 4.00) {
                                        echo "Dengan Pujian";
                                    }
                                    elseif ($hasil >= 3.01 && $hasil <= 3.50) {
                                        echo "Sangat Memuaskan";
                                    }
                                    elseif ($hasil >= 2.76 && $hasil <= 3.00) {
                                        echo "Memuaskan";
                                    }
                                    elseif ($hasil >= 2.00 && $hasil <= 2.75) {
                                        echo "Kurang Memuaskan";
                                    }
                                     elseif ($hasil >= 1 && $hasil <= 1.99) {
                                        echo "Gagal";
                                    }
                                    else {
                                        echo "Null";
                                    }
								
								?></strong></th>
                                    </tr>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Semester 8

                                <div class="card-header-form">

                                    <!-- <a href="#" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i>
                                    Transkrip</a> -->
                                </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Kode</td>
                                            <td>Matakuliah</td>
                                            <td>SKS</td>
                                            <td>Nilai UTS</td>
                                            <td>Nilai UAS</td>
                                            <td>Nilai KHS</td>
                                            <td>Angka Mutu</td>
                                            <td>Bobot</td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
									$i = 1;
									$sks = 0;
									$sks2 = 0;
									foreach ($viewKrs as $vi) {
									    if ($vi->smt == 8)
										$sks = $sks + $vi->sks;
										$sks2 =$sks2 + $vi->sks; ?>
                                        <?php if ($vi->smt == 8) { ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $vi->kd_mk; ?></td>
                                            <td><?php echo $vi->matakuliah; ?></td>
                                            <td><?php echo $vi->sks; ?></td>
                                            <td><?php echo $vi->nilai_uts; ?></td>
                                            <td><?php echo $vi->nilai_uas; ?></td>
                                            <td><?php echo $vi->nilai; ?></td>
                                            <td>
                                                <?php
													if ($vi->nilai == 'A') {
														echo $bobot = 4.00;
													} elseif ($vi->nilai == 'AB') {
														echo $bobot = 3.75;
													} elseif ($vi->nilai == 'BA') {
														echo $bobot = 3.5;
													} elseif ($vi->nilai == 'B') {
														echo $bobot = 3.00;
													} elseif ($vi->nilai == 'BC') {
														echo $bobot = 2.75;
													} elseif ($vi->nilai == 'C') {
														echo $bobot = 2.00;
													} elseif ($vi->nilai == 'D') {
														echo $bobot = 1.00;
													} elseif ($vi->nilai == 'E') {
														echo $bobot = 0;
													} else {
														echo $bobot = 0;
													}
													?>
                                            </td>
                                            <td>
                                                <?php

													if ($vi->nilai == 'A') {
														echo $bobot2 = $vi->sks * 4.00;
													} elseif ($vi->nilai == 'AB') {
														echo $bobot2 = $vi->sks * 3.75;
													} elseif ($vi->nilai == 'BA') {
														echo $bobot2 = $vi->sks * 3.5;
													} elseif ($vi->nilai == 'B') {
														echo $bobot2 = $vi->sks * 3.00;
													} elseif ($vi->nilai == 'BC') {
														echo $bobot2 = $vi->sks * 2.75;
													} elseif ($vi->nilai == 'C') {
														echo $bobot2 = $vi->sks * 2.00;
													} elseif ($vi->nilai == 'D') {
														echo $bobot2 = $vi->sks * 1.00;
													} elseif ($vi->nilai == 'E') {
														echo $bobot2 = $vi->sks * 0;
													} else {
														echo $bobot2 = 0;
													}
													?>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php
											$tot_bobot1 = $vi->sks * $bobot;
											$grand_tot1 = $grand_tot1 + $tot_bobot1;
								?>
                                    <?php } ?>
                                    <?php } ?>
                                    <tr>

                                        <th colspan="8" align="center">Jumlah SKS x AM </th>
                                        <th><strong><?php echo $grand_tot1; ?></strong></th>
                                    </tr>
                                    <tr>

                                        <th colspan="8" align="center">Jumlah SKS </th>
                                        <th><strong><?php echo $sks; ?></strong></th>
                                    </tr>
                                    <tr>

                                        <th colspan="8" align="center"> IPS </th>
                                        <th><strong> <?php echo number_format($hasil=$grand_tot1 / $sks, 2); ?></strong>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="8" align="center"> Dengan Predikat </th>
                                        <th><strong> <?php  
								 if ($hasil >= 3.51 && $hasil <= 4.00) {
                                        echo "Dengan Pujian";
                                    }
                                    elseif ($hasil >= 3.01 && $hasil <= 3.50) {
                                        echo "Sangat Memuaskan";
                                    }
                                    elseif ($hasil >= 2.76 && $hasil <= 3.00) {
                                        echo "Memuaskan";
                                    }
                                    elseif ($hasil >= 2.00 && $hasil <= 2.75) {
                                        echo "Kurang Memuaskan";
                                    }
                                     elseif ($hasil >= 1 && $hasil <= 1.99) {
                                        echo "Gagal";
                                    }
                                    else {
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
