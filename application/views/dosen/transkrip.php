<div class="container">
	<a href="<?php echo base_url('mhs/Transkrip/print/' . $mhs['id_mahasiswa']); ?>" target="_blank" class="btn btn-sm btn-success"><i class="icofont-print"></i> Print Transkrip</a>
	<p>
		<?php echo $this->session->flashdata('pesan'); ?>
	</p>
	<?php error_reporting(0); ?>
	<div class="row">
		<div class="col-md-6">
			<b>Semester 1</b>
			<table class="table table-bordered table-striped table-responsive">
				<thead class="table-dark">
					<tr>
						<td>No</td>
						<td>Kode</td>
						<td>Matakuliah</td>
						<td>SKS</td>
						<td>Nilai</td>
						<td>Bobot</td>
					</tr>
				</thead>
				<?php
				$i = 1;
				foreach ($viewKrs as $vi) {
					$sks = $sks + $vi->sks; ?>
					<?php if ($vi->smt == 1) { ?>
						<tbody>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $vi->kd_mk; ?></td>
								<td><?php echo $vi->matakuliah; ?></td>
								<td><?php echo $vi->sks; ?></td>
								<td><?php echo $vi->nilai; ?></td>
								<td>
									<?php
									if ($vi->nilai == 'A') {
										echo $bobot = 4;
									} elseif ($vi->nilai == 'B') {
										echo $bobot = 3;
									} elseif ($vi->nilai == 'C') {
										echo $bobot = 2;
									} elseif ($vi->nilai == 'D') {
										echo $bobot = 1;
									} else {
										echo $bobot = 0;
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
			<!-- <?php
						$tot_bobot = $row->sks * $bobot;
						$grand_tot = $grand_tot + $tot_bobot;
						?> -->
		</div>
		<div class="col-md-6">
			<b>Semester 2</b>
			<table class="table table-bordered table-striped table-responsive">
				<thead class="table-dark">
					<tr>
						<td>No</td>
						<td>Kode</td>
						<td>Matakuliah</td>
						<td>SKS</td>
						<td>Nilai</td>
						<td>Bobot</td>
					</tr>
				</thead>
				<?php
				$i = 1;
				foreach ($viewKrs as $vi) { ?>
					<?php if ($vi->smt == 2) { ?>
						<tbody>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $vi->kd_mk; ?></td>
								<td><?php echo $vi->matakuliah; ?></td>
								<td><?php echo $vi->sks; ?></td>
								<td><?php echo $vi->nilai; ?></td>
								<td>
									<?php
									if ($vi->nilai == 'A') {
										echo $bobot = 4;
									} elseif ($vi->nilai == 'B') {
										echo $bobot = 3;
									} elseif ($vi->nilai == 'C') {
										echo $bobot = 2;
									} elseif ($vi->nilai == 'D') {
										echo $bobot = 1;
									} else {
										echo $bobot = 0;
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
			<!-- <?php
						$tot_bobot = $row->sks * $bobot;
						$grand_tot = $grand_tot + $tot_bobot;
						?> -->
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<b>Semester 3</b>
			<table class="table table-bordered table-striped table-responsive">
				<thead class="table-dark">
					<tr>
						<td>No</td>
						<td>Kode</td>
						<td>Matakuliah</td>
						<td>SKS</td>
						<td>Nilai</td>
						<td>Bobot</td>
					</tr>
				</thead>
				<?php
				$i = 1;
				foreach ($viewKrs as $vi) { ?>
					<?php if ($vi->smt == 3) { ?>
						<tbody>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $vi->kd_mk; ?></td>
								<td><?php echo $vi->matakuliah; ?></td>
								<td><?php echo $vi->sks; ?></td>
								<td><?php echo $vi->nilai; ?></td>
								<td>
									<?php
									if ($vi->nilai == 'A') {
										echo $bobot = 4;
									} elseif ($vi->nilai == 'B') {
										echo $bobot = 3;
									} elseif ($vi->nilai == 'C') {
										echo $bobot = 2;
									} elseif ($vi->nilai == 'D') {
										echo $bobot = 1;
									} else {
										echo $bobot = 0;
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
			<!-- <?php
						$tot_bobot = $row->sks * $bobot;
						$grand_tot = $grand_tot + $tot_bobot;
						?> -->
		</div>
		<div class="col-md-6">
			<b>Semester 4</b>
			<table class="table table-bordered table-striped table-responsive">
				<thead class="table-dark">
					<tr>
						<td>No</td>
						<td>Kode</td>
						<td>Matakuliah</td>
						<td>SKS</td>
						<td>Nilai</td>
						<td>Bobot</td>
					</tr>
				</thead>
				<?php
				$i = 1;
				foreach ($viewKrs as $vi) { ?>
					<?php if ($vi->smt == 4) { ?>
						<tbody>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $vi->kd_mk; ?></td>
								<td><?php echo $vi->matakuliah; ?></td>
								<td><?php echo $vi->sks; ?></td>
								<td><?php echo $vi->nilai; ?></td>
								<td>
									<?php
									if ($vi->nilai == 'A') {
										echo $bobot = 4;
									} elseif ($vi->nilai == 'B') {
										echo $bobot = 3;
									} elseif ($vi->nilai == 'C') {
										echo $bobot = 2;
									} elseif ($vi->nilai == 'D') {
										echo $bobot = 1;
									} else {
										echo $bobot = 0;
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
			<!-- <?php
						$tot_bobot = $row->sks * $bobot;
						$grand_tot = $grand_tot + $tot_bobot;
						?> -->
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<b>Semester 5</b>
			<table class="table table-bordered table-striped table-responsive">
				<thead class="table-dark">
					<tr>
						<td>No</td>
						<td>Kode</td>
						<td>Matakuliah</td>
						<td>SKS</td>
						<td>Nilai</td>
						<td>Bobot</td>
					</tr>
				</thead>
				<?php
				$i = 1;
				foreach ($viewKrs as $vi) { ?>
					<?php if ($vi->smt == 5) { ?>
						<tbody>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $vi->kd_mk; ?></td>
								<td><?php echo $vi->matakuliah; ?></td>
								<td><?php echo $vi->sks; ?></td>
								<td><?php echo $vi->nilai; ?></td>
								<td>
									<?php
									if ($vi->nilai == 'A') {
										echo $bobot = 4;
									} elseif ($vi->nilai == 'B') {
										echo $bobot = 3;
									} elseif ($vi->nilai == 'C') {
										echo $bobot = 2;
									} elseif ($vi->nilai == 'D') {
										echo $bobot = 1;
									} else {
										echo $bobot = 0;
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
			<!-- <?php
						$tot_bobot = $row->sks * $bobot;
						$grand_tot = $grand_tot + $tot_bobot;
						?> -->
		</div>
		<div class="col-md-6">
			<b>Semester 6</b>
			<table class="table table-bordered table-striped table-responsive">
				<thead class="table-dark">
					<tr>
						<td>No</td>
						<td>Kode</td>
						<td>Matakuliah</td>
						<td>SKS</td>
						<td>Nilai</td>
						<td>Bobot</td>
					</tr>
				</thead>
				<?php
				$i = 1;
				foreach ($viewKrs as $vi) { ?>
					<?php if ($vi->smt == 6) { ?>
						<tbody>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $vi->kd_mk; ?></td>
								<td><?php echo $vi->matakuliah; ?></td>
								<td><?php echo $vi->sks; ?></td>
								<td><?php echo $vi->nilai; ?></td>
								<td>
									<?php
									if ($vi->nilai == 'A') {
										echo $bobot = 4;
									} elseif ($vi->nilai == 'B') {
										echo $bobot = 3;
									} elseif ($vi->nilai == 'C') {
										echo $bobot = 2;
									} elseif ($vi->nilai == 'D') {
										echo $bobot = 1;
									} else {
										echo $bobot = 0;
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
			<!-- <?php
						$tot_bobot = $row->sks * $bobot;
						$grand_tot = $grand_tot + $tot_bobot;
						?> -->
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<b>Semester 7</b>
			<table class="table table-bordered table-striped table-responsive">
				<thead class="table-dark">
					<tr>
						<td>No</td>
						<td>Kode</td>
						<td>Matakuliah</td>
						<td>SKS</td>
						<td>Nilai</td>
						<td>Bobot</td>
					</tr>
				</thead>
				<?php
				$i = 1;
				foreach ($viewKrs as $vi) { ?>
					<?php if ($vi->smt == 7) { ?>
						<tbody>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $vi->kd_mk; ?></td>
								<td><?php echo $vi->matakuliah; ?></td>
								<td><?php echo $vi->sks; ?></td>
								<td><?php echo $vi->nilai; ?></td>
								<td>
									<?php
									if ($vi->nilai == 'A') {
										echo $bobot = 4;
									} elseif ($vi->nilai == 'B') {
										echo $bobot = 3;
									} elseif ($vi->nilai == 'C') {
										echo $bobot = 2;
									} elseif ($vi->nilai == 'D') {
										echo $bobot = 1;
									} else {
										echo $bobot = 0;
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
			<!-- <?php
						$tot_bobot = $row->sks * $bobot;
						$grand_tot = $grand_tot + $tot_bobot;
						?> -->
		</div>
		<div class="col-md-6">
			<b>Semester 8</b>
			<table class="table table-bordered table-striped table-responsive">
				<thead class="table-dark">
					<tr>
						<td>No</td>
						<td>Kode</td>
						<td>Matakuliah</td>
						<td>SKS</td>
						<td>Nilai</td>
						<td>Bobot</td>
					</tr>
				</thead>
				<?php
				$i = 1;
				foreach ($viewKrs as $vi) { ?>
					<?php if ($vi->smt == 8) { ?>
						<tbody>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $vi->kd_mk; ?></td>
								<td><?php echo $vi->matakuliah; ?></td>
								<td><?php echo $vi->sks; ?></td>
								<td><?php echo $vi->nilai; ?></td>
								<td>
									<?php
									if ($vi->nilai == 'A') {
										echo $bobot = 3.80;
									} elseif ($vi->nilai == 'AB') {
										echo $bobot = 3.64;
									} elseif ($vi->nilai == 'B') {
										echo $bobot = 3.50;
									} elseif ($vi->nilai == 'BC') {
										echo $bobot = 3.15;
									} elseif ($vi->nilai == 'C') {
										echo $bobot = 2.80;
									} elseif ($vi->nilai == 'CD') {
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

	<p>
		<b>Total SKS : <?php echo $sks; ?></b>
	</p>
	<p>
		<b>IPK : <?php echo number_format($grand_tot / $sks, 2); ?></b>
	</p>
</div><!-- End About Section -->
</div>
<section>
	<div class="container">

	</div>
</section>



<script src="<?php echo base_url(); ?>assets/assets-mhs/js/modal.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->
