<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Student Portal | Log in</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="assets/login-mhs/img/logo-ipb.png" />
	<!-- Font Awesome -->
	<link rel="stylesheet" href="assets/lte/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="assets/lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="assets/lte//dist/css/adminlte.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
	<!-- Import Tailwind CSS -->
	<link rel="stylesheet" href="assets/login-mhs/css/login.css" />
	<link rel="stylesheet" href="assets/login-mhs/css/site.css" />
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-PG5P6VYJ61"></script>
	<script> -->
	<!-- window.dataLayer = window.dataLayer || [];

	function gtag() {
	dataLayer.push(arguments);
	}
	gtag('js', new Date());

	gtag('config', 'G-PG5P6VYJ61');
	</script> -->
</head>

<body>
	<div class="container-fluid">
		<div class="row bg-login">
			<div class="col-md-7 col-lg-7 col-sm-5 image-wrapper bg-cover d-flex align-items-center justify-content-center" data-image-src="assets/login-mhs/img/bg-login.png" style="background-image: url(assets/login-mhs/img/bg-login.png)">
				<!-- <div class="container text-center ">
					<img src="assets/login-mhs/img/welcometext.png" class="" width="350">
				</div> -->
			</div>
			<div class="login-right col-md-6 col-lg-5 col-sm-5 d-flex align-items-center justify-content-center">


				<div class="space-6"></div>
				<?= $this->session->flashdata('pesan'); ?>
				<form method="post" action="<?php echo base_url(); ?>auth/getLogin" onsubmit="return cekform();">
					<div class="container">
						<div class="login-form ">
							<div class="row">
								<div class="col-md-12 col-lg-10 col-xs-12">
									<h1 class="font-32px font-weight-bold text-blue mb-5 text-center"> Login <br>SIAKAD | SBH</h1>

								</div>
							</div>
							<div class="row ">
								<div class="col-md-12 col-lg-10 col-xs-12">
									<?= $this->session->flashdata('pesan'); ?>
									<form method="post" action="<?php echo base_url(); ?>auth/getLogin" onsubmit="return cekform();">

										<div class="controls">
											<div class="row">
												<div class="col-12">
													<div class="form-label-group mb-4">
														<h6 class="mb-2 font-16px text-muted">NIM </h6>
														<input type="text" name="username" id="username" class="form-control" placeholder="Username" />
														<div class="help-block with-errors"></div>
													</div>
												</div>
												<!-- /column -->
												<div class="col-12">
													<div class="form-label-group mb-3">
														<h6 class="mb-2 font-16px text-muted">Password</h6>
														<div class="input-group" id="show_hide_password">
															<input type="password" name="password" id="password" class="form-control" placeholder="Password" />
														</div>
														<div class="help-block with-errors"></div>
													</div>
												</div>
												<div class="col-12">
													<div class="form-label-group mb-3">
														<h6 class="mb-2 font-16px text-muted">Akses</h6>
														<select name="level" class="form-control">
															<option value=""> --Pilih Akses-- </option>
															<option value="admin">Admin</option>
															<option value="mahasiswa">Mahasiswa</option>
															<option value="dosen">Dosen</option>
														</select>
														<div class="help-block with-errors"></div>
													</div>
												</div>


												<div class="col-12 text-center mb-2">
													<button type="submit" class="btn btn-lg btn-block btn-primary mb-6">
														Masuk
														<span class="circle-icon">
															<i class="uil uil-angle-right">
															</i>
														</span>
													</button>
												</div>

												<!-- /column -->
											</div>
											<!-- /.row -->
										</div>
										<!-- /.controls -->
										<input name="__RequestVerificationToken" type="hidden" value="CfDJ8JxL3hXKpJNLkAHLXBYoroesfKpOb3mBTohXWLSGNwMCiom26MDYFnWaSFrUvjlQGphDzpAAx6cwaUYyqkVe2ZxRe-3tlYPGoicEJctWK-yC76JG9RQn8W3y2c80jc1Z3ks2VV_wmFTso5DGs7JGLHM" /><input name="RememberMe" type="hidden" value="false">
									</form>
									<!-- /form -->
								</div>
								<!-- /column -->
							</div>
						</div>
					</div>
			</div>
		</div>
	</div>
	<!-- /.login-box -->
	<!-- jQuery -->
	<script src="assets/lte/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="assets/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="asetts/lte/dist/js/adminlte.min.js"></script>

</body>
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

</html>
