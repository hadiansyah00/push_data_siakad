<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Transkrip</title>

	<meta name="description" content="User login page" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<link href="<?php echo base_url(); ?>assets/img/logo.png" rel="icon">
	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/font-awesome/4.5.0/css/font-awesome.min.css" />

	<!-- text fonts -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/fonts.googleapis.com.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/ace.min.css" />

	<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" />
		<![endif]-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/ace-rtl.min.css" />

	<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

	<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

	<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body>
	<?php error_reporting(0); ?>
	<br><br>
	<div class="container-fluid">
		<div class="row">
			<h4 class="text-center"> STIKES BOGOR HUSADA</h4>
			<table class="table">
				<tbody>
					<tr>
						<td rowspan="4" style="width: 110px;">\
							<img style="width: 70px;" src="<?php echo base_url('assets/img/logo_sbh.png'); ?>">
						</td>
					</tr>
					<tr>
						<th style="width: 110px;">NIM</th>
						<td style="width: 10px;"> : </td>
						<td><?php echo $mhs['nim']; ?></td>
					</tr>
					<tr>
						<th style="width: 110px;">Nama</th>
						<td style="width: 10px;"> : </td>
						<td><?php echo $mhs['nama_mhs']; ?> <?php echo $mhs['nama_kepanjangan']; ?></td>
					</tr>
					<tr>
						<th style="width: 110px;">Jurusan</th>
						<td style="width: 10px;"> : </td>
						<td><?php echo $mhs['jurusan']; ?></td>
					</tr>
				</tbody>
			</table>


		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<h4>Semester 1</h4>
				<table class="table table-bordered">
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
							<?php if ($vi->smt == 1) { ?>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $vi->kd_mk; ?></td>
									<td><?php echo $vi->matakuliah; ?></td>
									<td><?php echo $vi->sks; ?></td>
									<td><?php echo $vi->nilai; ?></td>
									<td>
										<?php
										if ($row->nilai == 'A') {
											echo $bobot = 3.75;
										} elseif ($row->nilai == 'AB') {
											echo $bobot = 3.20;
										} elseif ($row->nilai == 'B') {
											echo $bobot = 2.50;
										} elseif ($row->nilai == 'C') {
											echo $bobot = 2.25;
										} elseif ($row->nilai == 'D') {
											echo $bobot = 2;
										} else {
											echo $bobot = 0;
										}
										?>
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
			<div class="col-md-6">
				<h4>Semester 2</h4>
				<table class="table table-bordered">
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
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<h4>Semester 3</h4>
				<table class="table table-bordered">
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
			</div>
			<div class="col-md-6">
				<h4>Semester 4</h4>
				<table class="table table-bordered">
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
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<h4>Semester 5</h4>
				<table class="table table-bordered">
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
			</div>
			<div class="col-md-6">
				<h4>Semester 6</h4>
				<table class="table table-bordered">
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
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<h4>Semester 7</h4>
				<table class="table table-bordered">
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
			</div>
			<div class="col-md-6">
				<h4>Semester 8</h4>
				<table class="table table-bordered">
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



</body>
<script type="text/javascript">
	window.print();
</script>

</html>
