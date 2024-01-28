<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title><?php echo $title; ?></title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="<?php echo base_url(); ?>assets/img/logo_sbh.png" rel="icon">
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
	<!-- Bootstrap CSS
		============================================ -->
	<!--<link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/bootstrap.min.css">-->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
	<!-- Bootstrap CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
	<!-- adminpro icon CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/adminpro-custon-icon.css">
	<!-- meanmenu icon CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/meanmenu.min.css">
	<!-- mCustomScrollbar CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.mCustomScrollbar.min.css">
	<!-- animate CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/data-table/bootstrap-table.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/data-table/bootstrap-editable.css">
	<!-- normalize CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/normalize.css">
	<!-- charts C3 CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/c3.min.css">
	<!-- forms CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/form/all-type-forms.css">

	<link href="<?php echo base_url(); ?>assets/assets-mhs/css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css">
	<script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
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
				<?php if ($dsn['photoo'] == NULL) { ?>
					<img src="<?php echo base_url('assets/images/default.jpg'); ?>" alt="" class="img-fluid rounded-circle">
				<?php } else { ?>
					<img src="<?php echo base_url('assets/images/uploads/' . $dsn['photoo']); ?>" alt="" class="img-fluid rounded-circle">
				<?php } ?>
				<h1 class="text-light"><a href="<?php echo base_url('dosen/profil') ?>">
						<?php echo $dsn['nama_dosen']; ?>
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
					<li><a href="<?php echo base_url('dosen/home'); ?>"><i class="bx bx-home"></i> <span>Home</span></a></li>
					<li><a href="<?php echo base_url('dosen/profil'); ?>"><i class="bx bx-user"></i> <span>Profil</span></a></li>
					<!-- <li>
						<?php // if ($setting['status'] == 0) { 
						?>
							<a href="" data-toggle="modal" data-target="#exampleModalKRS"><i class="bx bx-file-blank"></i> <span>Isi Rencana Studi</span></a>
						<?php //} else { 
						?>
							<a href="<?php //echo base_url('mhs/krs'); 
										?>"><i class="bx bx-file-blank"></i> <span>Isi Rencana Studi</span></a>
						<?php // } 
						?>
					</li> -->
					<!--<li><a href="<?php echo base_url('#'); ?>"><i class="bx bx-book-content"></i> KRS Mahasiswa Didik</a></li>-->
					<li><a href="<?php echo base_url('dosen/mhskrs'); ?>"><i class="bx bx-book-content"></i> Mahasiswa Didik</a></li>

					<!--<li><a href="<?//php echo base_url('dosen/uploadfile'); ?>"><i class="bx bx-book-content"></i> RPS  Mahasiswa</a></li>-->
					<!-- <li><a href="<?php //echo base_url('dosen/transkrip'); 
										?>"><i class="bx bx-edit"></i> Transkip</a></li> -->
					<!-- <li><a href="#contact"><i class="bx bx-credit-card"></i> Administrasi</a></li> -->
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
										<h1>Sorry, <?php echo $dsn['nama_dosen']; ?></h1>
									</b>
								</th>
							</tr>
						</table>
						<h5 style="text-align: center;">KRS Belum bisa diakses, Harap Hubungi pihak <b>Akademik!</b></h5>
					</div>
				</div>
			</div>
		</div>
