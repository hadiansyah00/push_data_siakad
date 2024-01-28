<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title><?php echo $title; ?></title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="<?php echo base_url(); ?>assets/img/logo.png" rel="icon">
	<link href="<?php echo base_url(); ?>assets/assets-mhs/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="<?php echo base_url(); ?>assets/assets-mhs/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/assets-mhs/vendor/icofont/icofont.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/assets-mhs/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/assets-mhs/vendor/venobox/venobox.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/assets-mhs/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/assets-mhs/vendor/aos/aos.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="<?php echo base_url(); ?>assets/assets-mhs/css/style.css" rel="stylesheet">

	<!-- =======================================================
  * Template Name: iPortfolio - v1.5.1
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

	<!-- ======= Mobile nav toggle button ======= -->
	<button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

	<!-- ======= Header ======= -->
	<header id="header">
		<div class="d-flex flex-column">

			<div class="profile">
				<?php if ($mhs['photo'] == NULL) { ?>
					<img src="<?php echo base_url('assets/images/default.jpg'); ?>" alt="" class="img-fluid rounded-circle">
				<?php } else { ?>
					<img src="<?php echo base_url('assets/images/uploads/' . $mhs['photo']); ?>" alt="" class="img-fluid rounded-circle">
				<?php } ?>
				<h1 class="text-light"><a href="<?php echo base_url('mhs/profil') ?>">
						<?php echo $mhs['nama_mhs']; ?>
					</a></h1>
				<div class="social-links mt-3 text-center">
					<a href="https://twitter.com" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
					<a href="https://facebook.com" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
					<a href="https://instagram.com" target="_blank" class="instagram"><i class="bx bxl-instagram"></i></a>
					<a href="https://linkedin.com" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
				</div>
			</div>

			<nav class="nav-menu">
				<ul>
					<li><a href="<?php echo base_url('mhs/home'); ?>"><i class="bx bx-home"></i> <span>Home</span></a></li>
					<li><a href="<?php echo base_url('mhs/profil'); ?>"><i class="bx bx-user"></i> <span>Profil</span></a></li>
					<li>
					<li>
						<?php

						if ($setting_krs['status'] == 0) { ?>
							<a href="" data-toggle="modal" data-target="#exampleModalKRS"><i class="bx bx-file-blank"></i> <span>Isi Rencana Studi</span></a>
						<?php } else { ?>
							<a href="<?php echo base_url('mhs/krs'); ?>"><i class="bx bx-file-blank"></i> <span>Isi Rencana Studi</span></a>
						<?php } ?>
					</li>

					</li>

					<li><?php

						if ($mhs['status'] == 0) { ?>
							<a href="<?php echo base_url('mhs/Ver_bauk') ?>"><i class="bx bx-file-blank"></i> <span>Kartu Rencana Studi(KRS)</span></a>
						<?php } else { ?>
							<a href="<?php echo base_url('mhs/KrsView'); ?>"><i class="bx bx-file-blank"></i> <span>Kartu Rencana Studi(KRS)</span></a>
						<?php } ?>
					</li>
					<li><?php

						if ($mhs['status_nilai_khs'] == 0) { ?>
							<a href="<?php echo base_url('mhs/Ver_bauk') ?>"><i class="bx bx-file"></i> <span> Kartu Hasil Studi(KHS) </span></a>
						<?php } else { ?>
							<a href="<?php echo base_url('mhs/khs'); ?>"><i class="bx bx-file-blank"></i> <span> Kartu Hasil Studi(KHS) </span></a>
						<?php } ?>
					</li>
					<li><a href="<?php echo base_url('mhs/jadwal'); ?>"><i class="bx bx-file"></i> Jadwal Kuliah</a></li>

					<li>
						<?php

						if ($mhs['status_uts'] == 0) { ?>
							<a href="<?php echo base_url('mhs/Ver_bauk') ?>"><i class="bx bx-file-blank"></i> <span>Jadwal UTS</span></a>
						<?php } else { ?>
							<a href="<?php echo base_url('mhs/jadwaluts'); ?>"><i class="bx bx-file"></i> <span>Jadwal UTS</span></a>
						<?php } ?>
					</li>

					<li>
						<?php

						if ($mhs['status_uas'] == 0) { ?>
							<a href="<?php echo base_url('mhs/Ver_bauk') ?>"><i class="bx bx-file"></i> <span>Jadwal UAS </span></a>
						<?php } else { ?>
							<a href="<?php echo base_url('mhs/jadwaluas'); ?>"><i class="bx bx-file-blank"></i> <span>Jadwal UAS </span></a>
						<?php } ?>
					</li>
					<li>
						<?php

						if ($mhs['status_nilai_uts'] == 0) { ?>
							<a href="<?php echo base_url('mhs/Ver_bauk') ?>"><i class="bx bx-file-blank"></i> <span>Nilai UTS</span></a>
						<?php } else { ?>
							<a href="<?php echo base_url('mhs/NilaiUts'); ?>"><i class="bx bx-file"></i> <span> Nilai UTS </span></a>
						<?php } ?>
					</li>
					<li>
						<?php

						if ($mhs['status_nilai_uas'] == 0) { ?>
							<a href="" data-toggle="modal" data-target="#exampleModanilailUAS"><i class="bx bx-file"></i> <span> Nilai UAS </span></a>
						<?php } else { ?>
							<a href="<?php echo base_url('mhs/NilaiUas'); ?>"><i class="bx bx-file-blank"></i> <span> Nilai UAS </span></a>
						<?php } ?>
					</li>
					<li><?php

						if ($mhs['status_nilai_khs'] == 0) { ?>
							<a href="<?php echo base_url('mhs/Ver_bauk') ?>"><i class="bx bx-file"></i> <span> Transkrip Nilai</span></a>
						<?php } else { ?>
							<a href="<?php echo base_url('mhs/transkip'); ?>"><i class="bx bx-file-blank"></i> <span> Transkrip Nilai </span></a>
						<?php } ?>
					</li>
					<!-- <li><a href="<?php echo base_url('mhs/transkrip'); ?>"><i class="bx bx-edit"></i> Transkrip Nilai</a></li> -->
					<li><a href="<?php echo base_url('mhs/rpsmhs'); ?>"><i class="bx bx-credit-edit"></i> RPS Mahasiswa</a></li>
					<li><a href="<?php echo base_url('mhs/administrasi'); ?>"><i class="bx bx-credit-card"></i> Administrasi</a></li>
					<li><a href="<?php echo base_url('auth/logout'); ?>" onclick="return confirm('Yakin Akan Keluar?')"><i class="bx bx-share"></i> Logout</a></li>
					<br><br><br><br>
				</ul>
			</nav><!-- .nav-menu -->
			<button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

		</div>
	</header><!-- End Header -->

	<main id="main">

		<!-- ======= Breadcrumbs ======= -->
		<section class="breadcrumbs">
			<div class="container">

				<div class="d-flex justify-content-between align-items-center">
					<h2><?php echo $judul; ?></h2>
				</div>

			</div>
		</section>

		<div class="modal fade" id="exampleModalKRS" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<table>
							<tr>
								<th style="width: 50px;"></th>
								<th style="width: 50px;">
									<span class="btn btn-danger"><i class="icofont-ui-close"></i></span>
								</th>
								<th> </th>
								<th>
									<b>
										<h3>Mohon Maaf Saat ini Periode KRS masih belum dibuka></h3>
									</b>
								</th>
							</tr>
						</table>
						<h5 style="text-align: center;">Untuk info lebih lanjut hubungi silahkan hubungi <b>
								<font color="red"> BAAK</font>
								</font>
							</b></h5>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="exampleModalUTS" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<table>
							<tr>
								<th style="width: 50px;"></th>
								<th style="width: 50px;">
									<span class="btn btn-danger"><i class="icofont-ui-close"></i></span>
								</th>
								<th> </th>
								<th>
									<b>
										<h3>Maaf , <?php echo $mhs['nama_mhs']; ?></h3>
									</b>
								</th>
							</tr>
						</table>
						<h6 style="text-align: center;"> Kartu UTS Belum bisa diakses, Harap Hubungi pihak <b>
								<font color="red"> BAUK!</font>
								</font>
							</b></h6>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="exampleModalUAS" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<table>
							<tr>
								<th style="width: 50px;"></th>
								<th style="width: 50px;">
									<span class="btn btn-danger"><i class="icofont-ui-close"></i></span>
								</th>
								<th> </th>
								<th>
									<b>
										<h1>Maaf, <?php echo $mhs['nama_mhs']; ?></h1>
									</b>
								</th>
							</tr>
						</table>
						<h6 style="text-align: center;">Kartu UAS Belum bisa diakses, Harap Hubungi pihak <b>
								<font color="red"> BAUK!</font>
								</font>
							</b></h6>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="exampleModalnilaiUTS" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<table>
							<tr>
								<th style="width: 50px;"></th>
								<th style="width: 50px;">
									<span class="btn btn-danger"><i class="icofont-ui-close"></i></span>
								</th>
								<th> </th>
								<th>
									<b>
										<h1>Maaf, <?php echo $mhs['nama_mhs']; ?></h1>
									</b>
								</th>
							</tr>
						</table>
						<h6 style="text-align: center;">Nilai UTS Belum bisa diakses, Harap Hubungi pihak <b>
								<font color="red"> BAUK!</font>
								</font>
							</b></h6>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="exampleModalnilaiUAS" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"></h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<table>
							<tr>
								<th style="width: 50px;"></th>
								<th style="width: 50px;">
									<span class="btn btn-danger"><i class="icofont-ui-close"></i></span>
								</th>
								<th> </th>
								<th>
									<b>
										<h1>Maaf, <?php echo $mhs['nama_mhs']; ?></h1>
									</b>
								</th>
							</tr>
						</table>
						<h6 style="text-align: center;">Nilai UAS Belum bisa diakses, Harap Hubungi pihak <b>
								<font color="red"> BAUK!</font>
								</font>
							</b></h6>
					</div>
				</div>
			</div>
		</div>
