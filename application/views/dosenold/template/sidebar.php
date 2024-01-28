<!-- Header top area start-->
<div class="wrapper-pro">
	<div class="left-sidebar-pro">
		<nav id="sidebar">
			<div class="sidebar-header">
				<!-- <a href="#"><img src="<?php echo base_url() ?>assets/img/logo.png" alt="" /> -->
				</a>
				<h5>Stikes Bogor Husada</h5>
				<p>
					<?php
					//GET SESSION USER
					echo $this->session->userdata('sess_nama');
					?>
				</p>
				<strong>SBH</strong>
			</div>
			<div class="left-custom-menu-adp-wrap">
				<ul class="nav navbar-nav left-sidebar-menu-pro">
					<li class="nav-item">
						<a href="<?php echo base_url(); ?>admin/dashboard/index"><i class="fa big-icon fa-home"></i> <span class="mini-dn">Dashboard</span> <span class="indicator-right-menu mini-dn"></span></a>
					</li>

					<li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-server"></i> <span class="mini-dn">Akademik</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
						<div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
							<a href="<?php echo base_url('dosen/Verifikasi'); ?>" class="dropdown-item">Verifikasi Dosen</a>
							<a href="<?php echo base_url(); ?>dosen/UplodRPS" class="dropdown-item">RPS</a>
							<!-- <a href="<?php echo base_url('admin/Matakuliah'); ?>" class="dropdown-item">Matakuliah</a>
							<a href="<?php echo base_url('admin/Mahasiswa'); ?>" class="dropdown-item">Mahasiswa</a> -->

						</div>
					</li>
					</li>
					<li><a href="<?php echo base_url(); ?>auth/logout" onclick="return confirm('Yakin akan keluar?')"><span class="adminpro-icon adminpro-locked author-log-ic"></span> Log Out</a>
					</li>



					<!--  <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-pie-chart"></i> <span class="mini-dn">PMB</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                    <a href="" class="dropdown-item">Beranda</a>
                    <a href="" class="dropdown-item">Tentang</a>
                    <a href="" class="dropdown-item">Info PMB</a>
                    <a href="" class="dropdown-item">Pendaftaran</a>
                    <a href="" class="dropdown-item">Kontak</a>
                </div>
            </li> -->
					<!-- <li class="nav-item"><a href="<?php echo base_url('admin/post'); ?>" class="nav-link"><i class="fa fa-send"></i> Post</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url(); ?>admin/user"><i class="fa big-icon fa-user"></i> <span class="mini-dn">Users</span> <span class="indicator-right-menu mini-dn"></span></a>
					</li>


					<li class="nav-item">
						<a href="<?php echo base_url('admin/settings'); ?>"><i class="fa big-icon fa-cog"></i> <span class="mini-dn">Settings</span> <span class="indicator-right-menu mini-dn"></span></a>
					</li> -->





				</ul>
			</div>
		</nav>
	</div>
	<!-- end sidebar -->




	<div class="content-inner-all">
		<div class="header-top-area">
			<div class="fixed-header-top">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-1 col-md-6 col-sm-6 col-xs-12">
							<button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
								<i class="fa fa-bars"></i>
							</button>
							<div class="admin-logo logo-wrap-pro">
								<a href="#"><img src="img/logo_sbh.png" alt="" />
								</a>
							</div>
						</div>
						<div class="col-lg-6 col-md-1 col-sm-1 col-xs-12">
							<div class="header-top-menu tabl-d-n">
								<ul class="nav navbar-nav mai-top-nav">
									<li class="nav-item"><a href="<?php echo base_url('admin/post'); ?>" class="nav-link"><i class=""></i> </a>
									</li>
									<!-- <li class="nav-item dropdown">
										<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"> <span class="angle-down-topmenu"><i class="fa fa-angle-down"></i></span></a>
										<div role="menu" class="dropdown-menu animated flipInX">

										</div>
									</li> -->
									<!--  -->
								</ul>
							</div>
						</div>

						<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
							<div class="header-right-info">
								<ul class="nav navbar-nav mai-top-nav header-right-menu">
									<li class="nav-item dropdown">
										<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span class=""></span><span class="indicator-ms"></span></a>
										<div role="menu" class="">

										</div>
									</li>
									<li class="nav-item">
										<a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
											<span class="adminpro-icon adminpro-user-rounded header-riht-inf"></span>
											<span class="admin-name"><?php echo $this->session->userdata('sess_nama');  ?></span>
											<span class="author-project-icon adminpro-icon adminpro-down-arrow"></span>
										</a>
										<ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX">
											<li><a href="#"><span class="adminpro-icon adminpro-user-rounded author-log-ic"></span>My Profile</a>
											</li>
											<li><a href="<?php echo base_url('dosen/profile'); ?>"><span class="adminpro-icon adminpro-settings author-log-ic"></span>Settings</a>
											</li>
											<li><a href="<?php echo base_url(); ?>auth/logout" onclick="return confirm('Yakin akan keluar?')"><span class="adminpro-icon adminpro-locked author-log-ic"></span>Log Out</a>
											</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header top area end-->
		<!-- Breadcome start-->
		<div class="breadcome-area mg-b-30 small-dn">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="breadcome-list map-mg-t-40-gl shadow-reset">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<div class="breadcome-heading">
										<form role="search" class="">
											<input type="text" placeholder="Search..." class="form-control">
											<a href=""><i class="fa fa-search"></i></a>
										</form>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<ul class="breadcome-menu">
										<li><a href="#"><?php echo $judul; ?></a> <span class="bread-slash">/</span>
										</li>
										<li><span class="bread-blod"><?php echo $subJudul; ?></span>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Breadcome End-->








		<!-- Mobile Menu start -->
		<div class="mobile-menu-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="mobile-menu">
							<nav id="dropdown">
								<ul class="mobile-menu-nav">
									<li><a href="<?php echo base_url('dosen/dashboard'); ?>">Dashboard <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
									</li>
									<li><a data-toggle="collapse" data-target="#demo" href="#">Akademik <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
										<ul id="demo" class="collapse dropdown-header-top">
											<li><a href="<?php echo base_url('admin/VerifikasiDosen'); ?>">Verifikasi KRS</a>
											</li>
											<li><a href="<?php echo base_url('admin/uplodRps'); ?>">Kalender Akademik</a>
											</li>

									</li>
								</ul>
								</li>
								<!-- <li><a data-toggle="collapse" data-target="#others" href="#">Akademik <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
									<ul id="others" class="collapse dropdown-header-top">
										<li><a href="<?php echo base_url('dosen/ta'); ?>">Tahun Akademik</a>
										</li>
										<li><a href="<?php echo base_url('dosen/Jadwal'); ?>">Jadwal Kuliah</a>
										</li>
										<li><a href="<?php echo base_url('dosen/Krs'); ?>">KRS</a>
										</li> -->
								<!-- <li><a href="#">KHS</a>
											</li>
											<li><a href="<?php echo base_url('dosen/Nilai'); ?>">Input Nilai</a>
											</li> -->
								<!-- <li><a href="#">Transkip Nilai</a> -->
								</li>
								</ul>
								</li>
								<!-- <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">PMB <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
									<ul id="Miscellaneousmob" class="collapse dropdown-header-top">
										<li><a href="#">Beranda</a>
										</li>
										<li><a href="#">Tentang</a>
										</li>
										<li><a href="#">Info PMB</a>
										</li>
										<li><a href="#">Pendaftaran</a>
										</li>
										<li><a href="#">Kontak</a>
										</li>
								</li> -->
								</ul>
								</li>

								<!-- <li><a href="<?php echo base_url('admin/User'); ?>">User <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
								</li>
								</ul> -->
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Mobile Menu end -->
