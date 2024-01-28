<!-- Header top area start-->
<div class="wrapper-pro">
	<div class="left-sidebar-pro">
		<nav id="sidebar">
			<div class="sidebar-header">
				<!-- <a href="#"><img src="<?php echo base_url() ?>assets/img/logo_sbh.png" alt="" /> -->
				</a>
				<h5>SBH </h5>
				<h6> STIKES BOGOR HUSADA</h6> 
				<p>
				<div class="header">
				    <span stayle="width: 120px" class="adminpro-icon adminpro-user-rounded header-riht-inf"></span>
					<span class="admin-name"><?php echo $this->session->userdata('username');  ?></span>
					
				</div>
					
				</p>
				<strong>SBH</strong>
			</div>
			<div class="left-custom-menu-adp-wrap">
				<ul class="nav navbar-nav left-sidebar-menu-pro">
					<li class="nav-item">
						<a href="<?php echo base_url(); ?>bauk/db988b75ef9e581094b3793d4e5da08db6f8df2a/index"><i class="fa big-icon fa-home"></i> <span class="mini-dn">Dashboard</span> <span class="indicator-right-menu mini-dn"></span></a>
					</li>

					<!--<li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-server"></i> <span class="mini-dn">Pembayaran</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>-->
					<!--	<div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">-->
					<!--		<a href="bauk/pembayaran" class="dropdown-item">Input Pembayaran</a>-->
						
						
					<!--	</div>-->
					<!--</li>-->

					<!--<li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-edit"></i> <span class="mini-dn">Aktivasi Mahasiswa</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>-->
					<!--	<div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">-->
					
							<!-- <a href="<?php echo base_url('admin/ta'); ?>" class="dropdown-item">Tahun Akademik</a> -->
					<!--				<a href="<?php echo base_url('bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab'); ?>" class="dropdown-item">Aktivasi Mahasiswa</a>-->
					<!--				<a href="<?php echo base_url('bauk/pembayaran'); ?>" class="dropdown-item">Input Pembayaran</a>-->
								
						
					<!--	</div>-->
					<!--</li>-->

					<!--  <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="fa big-icon fa-pie-chart"></i> <span class="mini-dn">PMB</span> <span class="indicator-right-menu mini-dn"><i class="fa indicator-mn fa-angle-left"></i></span></a>
                <div role="menu" class="dropdown-menu left-menu-dropdown animated flipInX">
                    <a href="" class="dropdown-item">Beranda</a>
                    <a href="" class="dropdown-item">Tentang</a>
                    <a href="" class="dropdown-item">Info PMB</a>
                    <a href="" class="dropdown-item">Pendaftaran</a>
                    <a href="" class="dropdown-item">Kontak</a>
                </div>
            </li> -->
					<!--<li class="nav-item"><a href="<?php echo base_url('admin/post'); ?>" class="nav-link"><i class="fa fa-send"></i> Post</a>-->
					<!--</li>-->
					
						<li class="nav-item">
						<a href="<?php echo base_url('bauk/pembayaran'); ?>"><i class="fa big-icon fa-edit"></i> <span class="mini-dn">Input Pembayaran</span> <span class="indicator-right-menu mini-dn"></span></a>
					</li>
						<li class="nav-item">
						<a href="<?php echo base_url('bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab'); ?>"><i class="fa big-icon fa-server"></i> <span class="mini-dn">Aktivasi Mahasiswa</span> <span class="indicator-right-menu mini-dn"></span></a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url('bauk/Aktivasi_uap'); ?>"><i class="fa big-icon fa-server"></i> <span class="mini-dn">Aktivasi KEBIDANAN UAP </span> <span class="indicator-right-menu mini-dn"></span></a>
					</li>
					<li class="nav-item">
					    <?php
					        $id = $this->session->userdata('id_users');
					    ?>
						<a href="<?php echo base_url('bauk/user/index/'. $id);?>"><i class="fa big-icon fa-user"></i> <span class="mini-dn">Users</span> <span class="indicator-right-menu mini-dn"></span></a>
					</li>


					<!--<li class="nav-item">-->
					<!--	<a href="<?php echo base_url('bauk/settings'); ?>"><i class="fa big-icon fa-cog"></i> <span class="mini-dn">Settings</span> <span class="indicator-right-menu mini-dn"></span></a>-->
					<!--</li>-->





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
											<span class="admin-name"><?php echo $this->session->userdata('username');  ?></span>
											<span class="author-project-icon adminpro-icon adminpro-down-arrow"></span>
										</a>
										<ul role="menu" class="dropdown-header-top author-log dropdown-menu animated flipInX">
											<li><a href="<?php echo base_url('bauk/user/index/'. $id);?>"><span class="adminpro-icon adminpro-user-rounded author-log-ic"></span>Ganti Password</a>
											</li>
											<li><a href="<?php echo base_url('bauk/settings'); ?>"><span class="adminpro-icon adminpro-settings author-log-ic"></span>Settings</a>
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
									<li><a href="<?php echo base_url('bauk/dashboard'); ?>">Dashboard <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
									</li>
									<li><a data-toggle="collapse" data-target="#demo" href="#">Pembayaran <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
										<ul id="demo" class="collapse dropdown-header-top">
											<li><a href="<?php echo base_url('bauk/us'); ?>">Dosen</a>
											</li>
											<li><a href="#">Input Pembayaran</a>
												<li><a href="#">Info Pembayaran</a>
											</li>
	
										</ul>
									</li>
									<li><a data-toggle="collapse" data-target="#others" href="#">Aktivasi Mahasiswa <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
										<ul id="others" class="collapse dropdown-header-top">
											<li><a href="<?php echo base_url('bauk/mahasiswa'); ?>">Aktivasi Isi KRS</a>
											</li>
											<li><a href="<?php echo base_url('bauk/ak_uts'); ?>">Aktivasi Kartu UTS</a>
											</li>
											<li><a href="<?php echo base_url('bauk/ak_uas'); ?>">Aktvasi Kartu UAS</a>
											</li>
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

								<li><a href="<?php echo base_url('admin/User'); ?>">User <span class="admin-project-icon adminpro-icon adminpro-down-arrow"></span></a>
								</li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Mobile Menu end -->
