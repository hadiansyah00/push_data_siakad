<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Cetak Kartu Rencana Studi</title>

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
				<div class="center"><img style="width: 800px;" src="<?php echo base_url('assets/images/uploads/' . $mhs['header_dospem']); ?>"></div>
				<h2 class="text-center"> <strong>Kartu Rencana Studi</strong></h2>
				<h6 class="text-center padding-20">Tahun Ajaran - <?php echo $tahun['ta']; ?> (<?php echo $tahun['semester']; ?>)</h6>
				<br>

				<table class="table table-borderless
				    <thead class=" table-light">
					<tbody>
						
						<tr>
							<th style="width: 110px;">Nama</th>
							<td style="width: 10px;"> &nbsp; </td>
							<td><?php echo $mhs['nama_mhs']; ?> <?php echo $mhs['nama_kepanjangan']; ?></td>
							<th style="width: 110px;">Jurusan</th>
							<td style="width: 10px;"> : </td>
							<td><?php echo $mhs['jurusan']; ?></td>
						</tr>
						<tr>
							<th style="width: 110px;">NIM</th>
							<td style="width: 10px;"> : </td>
							<td><?php echo $mhs['nim']; ?></td>
							<th style="width: 110px;">TK / Semester</th>
							<td style="width: 10px;"> : </td>
							<td><?php echo $mhs['semester']; ?></td>
						</tr>

					</tbody>
					</thead>

				</table>


			</div>
		</div>

		<div class="container-fluid">
			<div class="row">
				<table class="table table-bordered">

					<tr>
						<th width="5"><center>No</center></th>
						<th width="10"><center>Kode</center></th>
						<th width="20"><center>Matakuliah</center></th>
						<th width="5"><center>SKS</center></th>
					</tr>
					
					<tbody>
						<?php
						error_reporting(0);
						$i = 1;
						$sks = 0;
						foreach ($viewKrs as $row) {
							$sks = $sks + $row->sks; ?>
							<?php if ($row->semester == $tahun['semester']) { ?>
								<tr>
									<td align="center"><?php echo $i++; ?></td>
									<td align="center"><?php echo $row->kd_mk; ?></td>
									<td align="center"><?php echo $row->matakuliah; ?></td>
									<td align="center"><?php echo $row->sks; ?></td>
							
								</tr>
								<?php
								$tot_bobot = $row->sks * $bobot;
								$grand_tot = $grand_tot + $tot_bobot;
								?>
							<?php } ?>
						<?php } ?>
					</tbody>

				</table>

				<p>
					<b>Jumlah SKS : <?php echo $sks; ?></b>
				</p>
				<div class="row">
					<table class="table">
						<thead class="table-light">
							<tr>
								<th align="center">Mahasiswa Didik </th>
								<th><br></th>


								<th align="center">Dosen Pembimbing Akademik</th>
								<th><br></th>


								<th align="center">Ketua Program Studi</th>
								<th><br></th>




							</tr>
						<tbody>
							<div class="text-center">
								<tr>
									<td><br></br><br><?php echo $mhs['nama_mhs']; ?> </td>
									<td style="width: 50px;"> </td>
									<td><br></br><br><?php echo $mhs['nama_dosen']; ?> </td>
									<td style="width: 75px;"> </td>
									<td><br></br><br><?php echo $mhs['kaprod']; ?> </td>
								</tr>
							</div>

						</tbody>
						</thead>


					</table>
				</div>
			</div>

		</div>





	</div>
	</div>
	</div>


</body>

<script type="text/javascript">
	window.print();
</script>

</html>
