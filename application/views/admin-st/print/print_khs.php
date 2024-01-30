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
	<br>
	<div class="container">
		<div class="container-fluid">
			<div class="row">
				<div class="center"><img style="width: 170px;" src="<?php echo base_url('assets/img/logo_sbh.png'); ?>"></div>
				<!-- <h3 class="text-center">STIKES BOGOR HUSADA</h3> -->
				<h4 class="text-center">Kartu Hasil Studi (KHS) - <?php echo $tahun['ta']; ?> (<?php echo $tahun['semester']; ?>)</h4>
				<table class="table">
					<tbody>
						<!-- <tr>
							<td rowspan="6" style="width: 210px;">\
								<img style="width: 170px;" src="<?php echo base_url('assets/img/logo_sbh.png'); ?>">
							</td>
						</tr> -->
						<tr>
							<th style="width: 110px;">Nama</th>
							<td style="width: 10px;"> : </td>
							<td><?php echo $mhs['nama_mhs']; ?> <?php echo $mhs['nama_kepanjangan']; ?></td>
						</tr>
						<tr>
							<th style="width: 110px;">NIM</th>
							<td style="width: 10px;"> : </td>
							<td><?php echo $mhs['nim']; ?></td>
						</tr>
						<tr>
							<th style="width: 110px;">Jurusan</th>
							<td style="width: 10px;"> : </td>
							<td><?php echo $mhs['jurusan']; ?></td>
						</tr>
						<tr>
							<th style="width: 110px;">Semester</th>
							<td style="width: 10px;"> : </td>
							<td><?php echo $mhs['semester']; ?></td>
						</tr>
						<tr>
							<th style="width: 110px;">Tahun Akademik</th>
							<td style="width: 10px;"> : </td>
							<td><?php echo $tahun['ta']; ?> (<?php echo $tahun['semester']; ?></td>
						</tr>
					</tbody>
				</table>


			</div>
		</div>

		<div class="container-fluid">
			<div class="row">
				<table class="table table-bordered">
					<thead class="table-dark">
						<tr>
							<th align="center" rowspan="2" align="center">NO</th>
							<th rowspan="2">KODE</th>
							<th rowspan="2">MATAKULIAH</th>
							<th rowspan="2">SKS</th>
							<th colspan="2">NILAI</th>
							<th rowspan="2"> SKS X AM </th>
						</tr>
						<tr>
							<th>HM</th>
							<th>AM</th>
						</tr>
					</thead>
					<tbody>
						<?php
						error_reporting(0);
						$i = 1;
						$sks = 0;
						foreach ($viewKrs as $row) {
							$sks = $sks + $row->sks; ?>
							<?php if ($row->semester == $tahun['semester']) { ?>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $row->kd_mk; ?></td>
									<td><?php echo $row->matakuliah; ?></td>
									<td><?php echo $row->sks; ?></td>
									<td><?php echo $row->nilai; ?></td>
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

								</tr>
								<?php

								// $row->nilai = $bbt1 = $bobot2 + $bobot3;
								// $row->nilai = $bbt2 =  $bobot5 + $bobot6;
								// $row->nilai = $bbt3 =  $bobot4 + $bobot7;
								// $row->nilai = array($bobot2 + $bobot4 + $bobot5 + $bobot6 + $bobot7);
								// $tot_bobot2 = array_sum($row->nilai);
								$tot_bobot = $row->sks * $bobot;
								$grand_tot = $grand_tot + $tot_bobot;
								?>
							<?php } ?>
						<?php } ?>
					</tbody>
					<tr>

					<th colspan="6" align="center">Jumlah SKS x AM </th>
					<th><strong><?php echo $grand_tot; ?></strong></th>
				</tr>

				</table>

				<p>
					<b>Jumlah SKS : <?php echo $sks; ?></b>
				</p>
				<p>
					<b>IPS : <?php echo number_format($grand_tot / $sks, 2); ?></b>
				</p>
			</div>
		</div>
	</div>


</body>
<script type="text/javascript">
	window.print();
</script>

</html>