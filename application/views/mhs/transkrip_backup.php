<div class="static-table-area mg-b-15">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<br>
				<img style="width: 70px;" src="<?php echo base_url('assets/img/logo_sbh.png'); ?>">
			</div>
			<div class="box-body col-md-5">
				<table class="table">
					<tbody>
						<tr>
							<th>NIM</th>
							<td> : </td>
							<td><?php echo $mhs['nim']; ?></td>
						</tr>
						<tr>
							<th>Nama</th>
							<td> : </td>
							<td><?php echo $mhs['nama_mhs']; ?></td>
						</tr>
						<tr>
							<th>Jurusan</th>
							<td> : </td>
							<td><?php echo $mhs['jurusan']; ?></td>
						</tr>
					</tbody>

				</table>
			</div>
			
		</div>
		<?php error_reporting(0); ?>
		<div class="row">
			<div class="col-lg-12">
				<div class="sparkline10-list shadow-reset mg-t-30">
					<div class="sparkline10-hd">
						<div class="main-sparkline10-hd">
							<h1>Semester 1</h1>
							<div class="sparkline10-outline-icon">
								<span class="sparkline10-collapse-link"><i class="fa fa-chevron-up"></i></span>
								<span class="sparkline10-collapse-close"><i class="fa fa-times"></i></span>
							</div>
						</div>
					</div>

					<div class="sparkline10-graph">
						<div class="static-table-list">
							<table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
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
								<th><strong> <?php echo number_format($hasil=$grand_tot1 / $sks, 2); ?></strong></th>
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
					<!-- Semester 2 -->
					<div class="sparkline10-list shadow-reset mg-t-30">
						<div class="sparkline10-hd">
							<div class="main-sparkline10-hd">
								<h1>Semester 2</h1>
								<div class="sparkline10-outline-icon">
									<span class="sparkline10-collapse-link"><i class="fa fa-chevron-up"></i></span>
									<span class="sparkline10-collapse-close"><i class="fa fa-times"></i></span>
								</div>
							</div>
						</div>
						<div class="sparkline10-graph">
							<div class="static-table-list">
								<table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
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
												$tot_bobot2 = $vi->sks * $bobot;
												$grand_tot2 = $grand_tot2 + $tot_bobot2;
									?>
								<?php } ?>
							<?php } ?>
								<tr>

								<th colspan="8" align="center">Jumlah SKS x AM </th>
								<th><strong><?php echo $grand_tot2; ?></strong></th>
							</tr>
							<tr>

								<th colspan="8" align="center">Jumlah SKS </th>
								<th><strong><?php echo $sks; ?></strong></th>
							</tr>
							<tr>

								<th colspan="8" align="center"> IPS </th>
								<th><strong> <?php echo number_format($grand_tot2 / $sks, 2); ?></strong></th>
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
						<!-- Semester 3 -->
						<div class="sparkline10-list shadow-reset mg-t-30">
							<div class="sparkline10-hd">
								<div class="main-sparkline10-hd">
									<h1>Semester 3</h1>
									<div class="sparkline10-outline-icon">
										<span class="sparkline10-collapse-link"><i class="fa fa-chevron-up"></i></span>
										<span class="sparkline10-collapse-close"><i class="fa fa-times"></i></span>
									</div>
								</div>
							</div>
							<div class="sparkline10-graph">
								<div class="static-table-list">
									<table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
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
											foreach ($viewKrs as $vi) {
											    if ($vi->smt == 3)
												$sks = $sks + $vi->sks; ?>
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
													$tot_bobot3 = $vi->sks * $bobot;
													$grand_tot3 = $grand_tot3 + $tot_bobot3;
										?>
									<?php } ?>
								<?php } ?>
									<tr>

								<th colspan="8" align="center">Jumlah SKS x AM </th>
								<th><strong><?php echo $grand_tot3; ?></strong></th>
							</tr>
							<tr>

								<th colspan="8" align="center">Jumlah SKS </th>
								<th><strong><?php echo $sks; ?></strong></th>
							</tr>
							<tr>

								<th colspan="8" align="center"> IPS </th>
								<th><strong> <?php echo number_format($hasil=$grand_tot3 / $sks, 2); ?></strong></th>
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
							<!-- Semester 4 -->
							<div class="sparkline10-list shadow-reset mg-t-30">
								<div class="sparkline10-hd">
									<div class="main-sparkline10-hd">
										<h1>Semester 4</h1>
										<div class="sparkline10-outline-icon">
											<span class="sparkline10-collapse-link"><i class="fa fa-chevron-up"></i></span>
											<span class="sparkline10-collapse-close"><i class="fa fa-times"></i></span>
										</div>
									</div>
								</div>
								<div class="sparkline10-graph">
									<div class="static-table-list">
										<table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
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
												foreach ($viewKrs as $vi) {
												    if ($vi->smt == 4)
													$sks = $sks + $vi->sks; ?>
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
														$tot_bobot4 = $vi->sks * $bobot;
														$grand_tot4 = $grand_tot4 + $tot_bobot4;
											?>
										<?php } ?>
									<?php } ?>
								<tr>

								<th colspan="8" align="center">Jumlah SKS x AM </th>
								<th><strong><?php echo $grand_tot4; ?></strong></th>
							</tr>
							<tr>

								<th colspan="8" align="center">Jumlah SKS </th>
								<th><strong><?php echo $sks; ?></strong></th>
							</tr>
							<tr>

								<th colspan="8" align="center"> IPS </th>
								<th><strong> <?php echo number_format($hasil=$grand_tot4 / $sks, 2); ?></strong></th>
							</tr>
							<tr>
							<th colspan="8" align="center"> Predikat IPS </th>
							<th>
                                  <?php  
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
                                        echo "Nilai Belum diInput";
                                    }
                                    ?>  
                                    
                                    
                            </th>
							 
							</tr>
										</table>
									</div>
								</div>
								<!-- Semester 5 -->
								<div class="sparkline10-list shadow-reset mg-t-30">
									<div class="sparkline10-hd">
										<div class="main-sparkline10-hd">
											<h1>Semester 5</h1>
											<div class="sparkline10-outline-icon">
												<span class="sparkline10-collapse-link"><i class="fa fa-chevron-up"></i></span>
												<span class="sparkline10-collapse-close"><i class="fa fa-times"></i></span>
											</div>
										</div>
									</div>
									<div class="sparkline10-graph">
										<div class="static-table-list">
											<table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
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
													foreach ($viewKrs as $vi) {
													    if ($vi->smt == 5)
														$sks = $sks + $vi->sks; ?>
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
															$tot_bobot5 = $vi->sks * $bobot;
															$grand_tot5 = $grand_tot5 + $tot_bobot5;
												?>
											<?php } ?>
										<?php } ?>
											<tr>

								<th colspan="8" align="center">Jumlah SKS x AM </th>
								<th><strong><?php echo $grand_tot5; ?></strong></th>
							</tr>
							<tr>

								<th colspan="8" align="center">Jumlah SKS </th>
								<th><strong><?php echo $sks; ?></strong></th>
							</tr>
							<tr>

								<th colspan="8" align="center"> IPS </th>
								<th><strong> <?php echo number_format($hasil=$grand_tot5 / $sks, 2); ?></strong></th>
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
									<!-- Semester 6 -->
									<div class="sparkline10-list shadow-reset mg-t-30">
										<div class="sparkline10-hd">
											<div class="main-sparkline10-hd">
												<h1>Semester 6</h1>
												<div class="sparkline10-outline-icon">
													<span class="sparkline10-collapse-link"><i class="fa fa-chevron-up"></i></span>
													<span class="sparkline10-collapse-close"><i class="fa fa-times"></i></span>
												</div>
											</div>
										</div>
										<div class="sparkline10-graph">
											<div class="static-table-list">
												<table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
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
														foreach ($viewKrs as $vi) {
														    if ($vi->smt == 6)
															$sks = $sks + $vi->sks; ?>
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
																$tot_bobot6 = $vi->sks * $bobot;
																$grand_tot6 = $grand_tot6 + $tot_bobot6;
													?>
												<?php } ?>
											<?php } ?>
												<tr>

								<th colspan="8" align="center">Jumlah SKS x AM </th>
								<th><strong><?php echo $grand_tot6; ?></strong></th>
							</tr>
							<tr>

								<th colspan="8" align="center">Jumlah SKS </th>
								<th><strong><?php echo $sks; ?></strong></th>
							</tr>
							<tr>

								<th colspan="8" align="center"> IPS </th>
								<th><strong> <?php echo number_format($hasil=$grand_tot6 / $sks, 2); ?></strong></th>
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

										<!-- Semester 7 -->
										<div class="sparkline10-list shadow-reset mg-t-30">
											<div class="sparkline10-hd">
												<div class="main-sparkline10-hd">
													<h1>Semester 7</h1>
													<div class="sparkline10-outline-icon">
														<span class="sparkline10-collapse-link"><i class="fa fa-chevron-up"></i></span>
														<span class="sparkline10-collapse-close"><i class="fa fa-times"></i></span>
													</div>
												</div>
											</div>
											<div class="sparkline10-graph">
												<div class="static-table-list">
													<table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
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
															foreach ($viewKrs as $vi) {
															    if ($vi->smt == 7)
																$sks = $sks + $vi->sks; ?>
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
																	$tot_bobot7 = $vi->sks * $bobot;
																	$grand_tot7 = $grand_tot7 + $tot_bobot7;
														?>
													<?php } ?>
												<?php } ?>
													<tr>

								<th colspan="8" align="center">Jumlah SKS x AM </th>
								<th><strong><?php echo $grand_tot7; ?></strong></th>
							</tr>
							<tr>

								<th colspan="8" align="center">Jumlah SKS </th>
								<th><strong><?php echo $sks; ?></strong></th>
							</tr>
							<tr>

								<th colspan="8" align="center"> IPS </th>
								<th><strong> <?php echo number_format($hasil=$grand_tot7 / $sks, 2); ?></strong></th>
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
											<!-- Semester 8 -->
											<div class="sparkline10-list shadow-reset mg-t-30">
												<div class="sparkline10-hd">
													<div class="main-sparkline10-hd">
														<h1>Semester 8</h1>
														<div class="sparkline10-outline-icon">
															<span class="sparkline10-collapse-link"><i class="fa fa-chevron-up"></i></span>
															<span class="sparkline10-collapse-close"><i class="fa fa-times"></i></span>
														</div>
													</div>
												</div>
												<div class="sparkline10-graph">
													<div class="static-table-list">
														<table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
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
																foreach ($viewKrs as $vi) {
																    if ($vi ->smt == 8)
																	$sks = $sks + $vi->sks; ?>
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
																		$tot_bobot8 = $vi->sks * $bobot;
																		$grand_tot8 = $grand_tot8 + $tot_bobot8;
															?>
														<?php } ?>
													<?php } ?>
														<tr>

								<th colspan="8" align="center">Jumlah SKS x AM </th>
								<th><strong><?php echo $grand_tot8; ?></strong></th>
							</tr>
							<tr>

								<th colspan="8" align="center">Jumlah SKS </th>
								<th><strong><?php echo $sks; ?></strong></th>
							</tr>
							<tr>

								<th colspan="8" align="center"> IPS </th>
								<th><strong> <?php echo number_format($hasil=$grand_tot8 / $sks, 2); ?></strong></th>
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

												<!-- Batas Suci Antar Semester  -->

											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br></br>
		<p>
			<b>&nbsp;&nbsp;Total SKS : <?php echo $sks2; ?></b>
		</p>
		<p>
		    
		    <b>
		        &nbsp;&nbsp;IPK : 	<?php echo number_format (($hasil_tot = 
		        $grand_tot1 + $grand_tot2 + $grand_tot3 + $grand_tot4 + $grand_tot5 + $grand_tot6 + $grand_tot7 + $grand_tot8) / $sks2, 2 ); ?>

		    </b>
<br>
<b>&nbsp;&nbsp;Dengan Predikat :

    	 <?php
    	
								 if ($hasil_tot >= 3.51 && $hasil_tot <= 4.00) {
                                        echo "Dengan Pujian";
                                    }
                                    elseif ($hasil_tot >= 3.01 && $hasil_tot <= 3.50) {
                                        echo "Sangat Memuaskan";
                                    }
                                    elseif ($hasil_tot >= 2.76 && $hasil_tot <= 3.00) {
                                        echo "Memuaskan";
                                    }
                                    elseif ($hasil_tot >= 2.00 && $hasil_tot <= 2.75) {
                                        echo "Kurang Memuaskan";
                                    }
                                     elseif ($hasil_tot >= 1.00 && $hasil_tot <= 1.99) {
                                        echo "Gagal";
                                    }
                                    else {
                                        echo "Null";
                                    }
								
								?>
							</tr>
</b>
			
		</p>
	</div>

</div>
