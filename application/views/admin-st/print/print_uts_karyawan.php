<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Kartu UTS Mahasiswa</title>

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
				<div class="center"><img style="width: 150px;" src="<?php echo base_url('assets/img/logo_sbh.png'); ?>"></div>
				<!-- <h3 class="text-center">STIKES BOGOR HUSADA</h3> -->
				<h4 class="text-center">Kartu Ujian Tengah Semester  - <?php echo $tahun['ta']; ?> (<?php echo $tahun['semester']; ?>)</h4>
				<table class="table">
					<tbody>
					
						<table class="table table-borderless
				    <thead class=" table-light">
					<tbody>
						 
						<tr>
							<th style="width: 110px;">Nama </th>
							<td style="width: 10px;"> : </td>
							<td><?php echo $mhs['nama_mhs']; ?></td>
							<th style="width: 110px;">Jurusan</th>
							<td style="width: 10px;"> : </td>
							<td><?php echo $mhs['jurusan']; ?></td>
						</tr>
						<tr>
							<th style="width: 110px;">NIM</th>
							<td style="width: 10px;"> : </td>
							<td><?php echo $mhs['nim']; ?></td>
							<th style="width: 110px;">Semester</th>
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
					<thead class="table-dark">
						<tr>
							<th class="text-center"rowspan="2">No</th>
				
							<th class="text-center" rowspan="2">Matakuliah</th>
							<th class="text-center"rowspan="2">SKS</th>
							<th style="width: 10px;"rowspan="2">Ruangan</th>
							<th class="text-center"rowspan="2">Tanggal / Waktu</th>
							<th class="text-center" rowspan="4">Pengawas &nbsp;&nbsp;</th>
							<th class="text-center"rowspan="2">Paraf</th>

						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						$sksk = 0;
						foreach ($getUts_karyawan as $row) { ?>
							<?php if ($row->semester == $tahun['semester']) { ?>
								<?php if ($row->smt == $mhs['semester']) {
									$sksk = $sksk + $row->sks; ?>
									<tr>
										<td align="center"><?php echo $i++; ?></td>
									
								    	<td class="align :center width:110px"><?php echo $row->matakuliah; ?></td>
										<td align="center"> <?php echo $row->sks; ?></td>
										<td><?php echo $row->ruang_uts; ?></td>
										<td><?php echo format_indo($row->tgl_uts); ?> <?php echo $row->jam; ?>
										<td> &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;
										</td>
										<td>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</td>

									</tr>
								<?php } ?>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table>
				<p>
					<b>Jumlah SKS : <?php echo $sksk; ?></b>
				</p>
				<div>
				
	                <div style="width:200px;float:right">
		
	                	</br><p>KAPRODI <?php echo $mhs['jurusan'];?><p>
	        
		                <img src="<?php echo base_url('assets/images/uploads/' . $mhs['ttd']); ?>" alt="" class="width:100px:center">
		                <p><?php echo $mhs['kaprod']; ?> </p>
                    	</div>
                	<div style="clear:both"></div>
                </div>
			
</div>
</div>
</div>
<div style="containter-fluid">

<p></br><strong>Perhatian :</strong></p>

<p>1. Peserta Ujian wajib menggunakan atribut lengkap : </br>
- Untuk PRODI Kebidanan menggunakan  Seragam dan Name Tag</br>
- Untuk PRODI Farmasi & Gizi Menggunakan Almamater dan Name Tag</br>
2. Membawa alat tulis sendiri.</br>
3. Kartu Ujian ini <strong>wajib</strong> dibawa setiap pelaksanaan ujian. </p>
</div>


</body>
<script type="text/javascript">
	window.print();
</script>

</html>
