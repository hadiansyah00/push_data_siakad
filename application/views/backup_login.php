<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Login - Siakad - STMIK Dharma Negara</title>

	<meta name="description" content="User login page" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<link href="<?php echo base_url(); ?>assets/img/logo.png" rel="icon">

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/font-awesome/4.5.0/css/font-awesome.min.css" />


	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/fonts.googleapis.com.css" />

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/ace.min.css" />

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/ace-rtl.min.css" />

</head>

<body class="login-layout">
	<div class="main-container">
		<div class="main-content">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="login-container">
						<div class="center">
							<h1>
								<img style="width: 150px;" src="<?php echo base_url('assets/images/logo.png') ?>"><br>
								<span class="red">Login</span>
								<span class="white" id="id-text2">SIAKAD</span>
							</h1>
							<a href="https://stmikdharmanegara.ac.id">
								<h4 class="blue" id="id-company-text">&copy; STMIK Dharma Negara</h4>
							</a>
						</div>

						<div class="space-6"></div>

						<div class="position-relative">
							<div id="login-box" class="login-box visible widget-box no-border">
								<div class="widget-body">
									<div class="widget-main">
										<h4 class="header blue lighter bigger">
											<i class="ace-icon fa fa-coffee green"></i>
											Please Enter Your Information
										</h4>

										<div class="space-6"></div>
										<?= $this->session->flashdata('pesan'); ?>
										<form method="post" action="<?php echo base_url(); ?>auth/getLogin" onsubmit="return cekform();">
											<fieldset>
												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="text" name="username" id="username" class="form-control" placeholder="Username" />
														<i class="ace-icon fa fa-user"></i>
													</span>
													<?= form_error('username', '<div class="text-danger small ml-3">', '</div>') ?>
												</label>

												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<input type="password" name="password" id="password" class="form-control" placeholder="Password" />
														<i class="ace-icon fa fa-lock"></i>
													</span>
													<?= form_error('password', '<div class="text-danger small ml-3">', '</div>') ?>
												</label>

												<label class="block clearfix">
													<span class="block input-icon input-icon-right">
														<select name="level" class="form-control">
															<option value=""> --Pilih Akses-- </option>
															<option value="admin">Admin</option>
															<option value="mahasiswa">Mahasiswa</option>
															<option value="dosen">Dosen</option>
														</select>
														<i class=""></i>
													</span>
													<?= form_error('level', '<div class="text-danger small ml-3">', '</div>') ?>
												</label>

												<div class="space"></div>

												<div class="clearfix">
													<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
														<i class="ace-icon fa fa-key"></i>
														<span class="bigger-110">Login</span>
													</button>
												</div>

												<div class="space-4"></div>
											</fieldset>
										</form>

									</div>
								</div>



								<div id="signup-box" class="signup-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<i class="ace-icon fa fa-users blue"></i>
												New User Registration
											</h4>

											<div class="space-6"></div>
											<p> Enter your details to begin: </p>

											<form>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" placeholder="Username" />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Password" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" placeholder="Repeat password" />
															<i class="ace-icon fa fa-retweet"></i>
														</span>
													</label>

													<label class="block">
														<input type="checkbox" class="ace" />
														<span class="lbl">
															I accept the
															<a href="#">User Agreement</a>
														</span>
													</label>

													<div class="space-24"></div>

													<div class="clearfix">
														<button type="reset" class="width-30 pull-left btn btn-sm">
															<i class="ace-icon fa fa-refresh"></i>
															<span class="bigger-110">Reset</span>
														</button>

														<button type="button" class="width-65 pull-right btn btn-sm btn-success">
															<span class="bigger-110">Register</span>

															<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
														</button>
													</div>
												</fieldset>
											</form>
										</div>


									</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->
							</div><!-- /.position-relative -->


						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<script type="text/javascript">
			function cekform() {
				if (!$("#username").val()) {
					alert('maaf username tidak boleh kosong!');
					$("#username").focus();
					return false;
				}

				if (!$("#password").val()) {
					alert('maaf password tidak boleh kosong!');
					$("#password").focus();
					return false;
				}
			}
		</script>

		<!--[if !IE]> -->



		<script src="<?php echo base_url(); ?>assets/login/js/jquery-2.1.4.min.js"></script>





		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if ('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url(); ?>assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				$(document).on('click', '.toolbar a[data-target]', function(e) {
					e.preventDefault();
					var target = $(this).data('target');
					$('.widget-box.visible').removeClass('visible'); //hide others
					$(target).addClass('visible'); //show target
				});
			});



			//you don't need this, just used for changing background
			jQuery(function($) {
				$('#btn-login-dark').on('click', function(e) {
					$('body').attr('class', 'login-layout');
					$('#id-text2').attr('class', 'white');
					$('#id-company-text').attr('class', 'blue');

					e.preventDefault();
				});
				$('#btn-login-light').on('click', function(e) {
					$('body').attr('class', 'login-layout light-login');
					$('#id-text2').attr('class', 'grey');
					$('#id-company-text').attr('class', 'blue');

					e.preventDefault();
				});
				$('#btn-login-blur').on('click', function(e) {
					$('body').attr('class', 'login-layout blur-login');
					$('#id-text2').attr('class', 'white');
					$('#id-company-text').attr('class', 'light-blue');

					e.preventDefault();
				});

			});
		</script>
</body>

</html>
