<!-- End Breadcrumbs -->

<!-- ======= About Section ======= -->
<div class="container">

    <div class="row">
        <div class="col-lg-3" data-aos="fade-right">
            <img style="width: 200px;" src="<?php echo base_url('assets/images/uploads/' . $mhs['photo']); ?>"
                class="image-fluid" alt="">

        </div>
        <div class="col-lg-9 pt-4 pt-lg-0 content" data-aos="fade-left">

            <h3>Kartu Hasil Studi (KHS) - <?php echo $tahun['ta']; ?> (<?php echo $tahun['semester']; ?>)</h3>

            <div class="row">

                <div class="col-lg-9">
                    <table class="table table-sm">
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
                            <th><i class="icofont-rounded-right"></i> Jurusan/Prodi </th>
                            <td>:</td>
                            <td><?php echo $mhs['jenjang']; ?> - <?php echo $mhs['jurusan']; ?></td>
                        </tr>
                        <tr>
                            <th><i class="icofont-rounded-right"></i> Semester </th>
                            <td>:</td>
                            <td><?php echo $mhs['semester']; ?></td>
                        </tr>
                        <tr>
                            <th><i class="icofont-rounded-right"></i> Nama Dospem </th>
                            <td>:</td>
                            <td><?php echo $mhs['nama_dosen']; ?></td>
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

    <a href="<?php echo base_url('mhs/Transkrip/printKHS/' . $mhs['id_mahasiswa']); ?>" target="_blank"
        class="btn btn-sm btn-success"><i class="icofont-print"></i> Print KHS</a>
    <p>
        
    </p>
  
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('success'); ?>
    </div>

    <div class="row">
        <div class="col-md-12" data-aos="">

            <table class="table table-bordered table-striped table-responsive">
                <thead class="table-dark text-center">
                    <tr>
                        <th align="center" rowspan="2" align="center">NO</th>
                        <!--<th rowspan="2">KODE</th>-->
                        <th rowspan="2">MATAKULIAH</th>
                        <th rowspan="2">SKS</th>
                        <th>HM</th>
                        <th>AM</th>
                        <th rowspan=" 2"> SKS X AM </th>
                        <th>Nama Dosen 1</th>
                        <th>Edom Dosen 1</th>
                        <th>Nama Dosen 2</th>
                        <th>Edom Dosen 2</th>
                  
                    </tr>
                </thead>

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

                                    <?= $row->status_verif == 'Y' ? '' . '&nbsp;'. $row->$nilai : '' ?>
                                </strong> </p>

                            <?php if ($row->status_verif == 'N' || $row->status_verif === null): ?>
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
                                    
                                </td>
                                <td>
                                     <?= ($row->status_edom_2 == 1 && $row->id_perdos != 0 && $row->id_peran != 0) ? '<i class="fas fa-check-circle text-success"></i>' : '' ?>


                            <?php if ($row->status_edom_1 == 0 || $row->status_edom_1 === null): ?>
                                <a class="btn btn-sm btn-success <?php echo ($row->id_perdos == 0) ? 'disabled' : ''; ?>" href="<?php echo $link_kuesioner; ?>">
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
                                 </td>
        
                            <td>
                              <?= ($row->status_edom_2 == 1 && $row->id_perdos != 0 && $row->id_peran != 0) ? '<i class="fas fa-check-circle text-success"></i>' : '' ?>

                              <?php if ($row->status_edom_1 == 0 || $row->status_edom_1 === null): ?>
                                <a class="btn btn-sm btn-success <?php echo ($row->id_peran == 0) ? 'disabled' : ''; ?>" href="<?php echo $link_kuesioner_2; ?>">
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
                    <th colspan="9" align="center">Jumlah SKS x HM </th>
                    <th><strong><?php echo $grand_tot; ?></strong></th>
                </tr>
                  <tr>
                    <th colspan="9" align="center">IPS (Indeks Per Semester) </th>
                    <th><strong> <?php echo number_format($hasil = $grand_tot / $sks, 2); ?></strong></th>
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
 
</div><!-- End About Section -->

<section>

</section>



<script src="<?php echo base_url(); ?>assets/assets-mhs/js/modal.js"></script>









<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->