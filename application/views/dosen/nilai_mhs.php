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
			<div class="col-md-6">
				<a href="<?php echo base_url('admin/nilai/transkrip'); ?>" class="btn btn-sm btn-warning"><i class="fa fa-backward"></i> Kembali</a>
			</div>
		</div>
		<?php error_reporting(0); ?>
		<div class="row">
			<div class="col-lg-6">
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
							<table class="table border-table">
								<thead>
									<tr>
										<td>No</td>
										<td>Kode</td>
										<td>Matakuliah</td>
										<td>SKS</td>
										<td>Nilai</td>
										<td>Angka Mutu</td>
										<td>Bobot</td>
										
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									$sks = 0;
									foreach ($viewKrs as $vi) {
										$sks = $sks + $vi->sks; ?>
										<?php if ($vi->smt == 1) { ?>
												<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $vi->kd_mk; ?></td>
								<td><?php echo $vi->matakuliah; ?></td>
								<td><?php echo $vi->sks; ?></td>
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
											$tot_bobot = $vi->sks * $bobot;
											$grand_tot = $grand_tot + $tot_bobot;
								?>
							<?php } ?>
						<?php } ?>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
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
							<table class="table border-table">
								<thead>
									<tr>
											<td>No</td>
										<td>Kode</td>
										<td>Matakuliah</td>
										<td>SKS</td>
										<td>Nilai</td>
										<td>Angka Mutu</td>
										<td>Bobot</td>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									$sks = 0;
									foreach ($viewKrs as $vi) {
										$sks = $sks + $vi->sks; ?>
										<?php if ($vi->smt == 2) { ?>
											<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $vi->kd_mk; ?></td>
								<td><?php echo $vi->matakuliah; ?></td>
								<td><?php echo $vi->sks; ?></td>
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
											$tot_bobot = $vi->sks * $bobot;
											$grand_tot = $grand_tot + $tot_bobot;
								?>
							<?php } ?>
						<?php } ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6">
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
							<table class="table border-table">
								<thead>
									<tr>
											<td>No</td>
										<td>Kode</td>
										<td>Matakuliah</td>
										<td>SKS</td>
										<td>Nilai</td>
										<td>Angka Mutu</td>
										<td>Bobot</td>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									$sks = 0;
									foreach ($viewKrs as $vi) {
										$sks = $sks + $vi->sks; ?>
										<?php if ($vi->smt == 3) { ?>
											<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $vi->kd_mk; ?></td>
								<td><?php echo $vi->matakuliah; ?></td>
								<td><?php echo $vi->sks; ?></td>
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
											$tot_bobot = $vi->sks * $bobot;
											$grand_tot = $grand_tot + $tot_bobot;
								?>
							<?php } ?>
						<?php } ?>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
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
							<table class="table border-table">
								<thead>
									<tr>
										<td>No</td>
										<td>Kode</td>
										<td>Matakuliah</td>
										<td>SKS</td>
										<td>Nilai</td>
										<td>Angka Mutu</td>
										<td>Bobot</td>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									$sks = 0;
									foreach ($viewKrs as $vi) {
										$sks = $sks + $vi->sks; ?>
										<?php if ($vi->smt == 4) { ?>
											<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $vi->kd_mk; ?></td>
								<td><?php echo $vi->matakuliah; ?></td>
								<td><?php echo $vi->sks; ?></td>
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
											$tot_bobot = $vi->sks * $bobot;
											$grand_tot = $grand_tot + $tot_bobot;
								?>
							<?php } ?>
						<?php } ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6">
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
							<table class="table border-table">
								<thead>
									<tr>
										<td>No</td>
										<td>Kode</td>
										<td>Matakuliah</td>
										<td>SKS</td>
										<td>Nilai</td>
										<td>Bobot</td>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									$sks = 0;
									foreach ($viewKrs as $vi) {
										$sks = $sks + $vi->sks; ?>
										<?php if ($vi->smt == 5) { ?>
											<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $vi->kd_mk; ?></td>
								<td><?php echo $vi->matakuliah; ?></td>
								<td><?php echo $vi->sks; ?></td>
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
											$tot_bobot = $vi->sks * $bobot;
											$grand_tot = $grand_tot + $tot_bobot;
								?>
							<?php } ?>
						<?php } ?>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
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
							<table class="table border-table">
								<thead>
									<tr>
										<td>No</td>
										<td>Kode</td>
										<td>Matakuliah</td>
										<td>SKS</td>
										<td>Nilai</td>
										<td>Angka Mutu</td>
										<td>Bobot</td>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									$sks = 0;
									foreach ($viewKrs as $vi) {
										$sks = $sks + $vi->sks; ?>
										<?php if ($vi->smt == 6) { ?>
											<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $vi->kd_mk; ?></td>
								<td><?php echo $vi->matakuliah; ?></td>
								<td><?php echo $vi->sks; ?></td>
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
											$tot_bobot = $vi->sks * $bobot;
											$grand_tot = $grand_tot + $tot_bobot;
								?>
							<?php } ?>
						<?php } ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6">
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
							<table class="table border-table">
								<thead>
									<tr>
										<td>No</td>
										<td>Kode</td>
										<td>Matakuliah</td>
										<td>SKS</td>
										<td>Nilai</td>
										<td>Angka Mutu</td>
										<td>Bobot</td>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									$sks = 0;
									foreach ($viewKrs as $vi) {
										$sks = $sks + $vi->sks; ?>
										<?php if ($vi->smt == 7) { ?>
											<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $vi->kd_mk; ?></td>
								<td><?php echo $vi->matakuliah; ?></td>
								<td><?php echo $vi->sks; ?></td>
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
											$tot_bobot = $vi->sks * $bobot;
											$grand_tot = $grand_tot + $tot_bobot;
								?>
							<?php } ?>
						<?php } ?>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
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
							<table class="table border-table">
								<thead>
									<tr>
										<td>No</td>
										<td>Kode</td>
										<td>Matakuliah</td>
										<td>SKS</td>
										<td>Nilai</td>
										<td>Angka Mutu</td>
										<td>Bobot</td>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									$sks = 0;
									foreach ($viewKrs as $vi) {
										$sks = $sks + $vi->sks; ?>
										<?php if ($vi->smt == 8) { ?>
											<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $vi->kd_mk; ?></td>
								<td><?php echo $vi->matakuliah; ?></td>
								<td><?php echo $vi->sks; ?></td>
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
											$tot_bobot = $vi->sks * $bobot;
											$grand_tot = $grand_tot + $tot_bobot;
								?>
							<?php } ?>
						<?php } ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<br>
		<p>
			<b>Total SKS : <?php echo $sks; ?></b>
		</p>
		<p>
			<b>IPK : <?php echo number_format($grand_tot / $sks, 2); ?></b>
		</p>
	</div>
</div>
