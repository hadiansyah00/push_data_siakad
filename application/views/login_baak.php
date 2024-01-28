<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>STIKES BOGOR HUSADA| Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="assets/img/logo_sbh.png" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lte/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/lte/dist/css/adminlte.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <!-- Import Tailwind CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login-mhs/css/login.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login-mhs/css/site.css" />

</head>


<body>
    <div class="container-fluid">
        <div class="row bg-login">
            <div class="col-md-7 col-lg-7 col-sm-5 image-wrapper bg-cover d-flex align-items-center justify-content-center"
                data-image-src="<?php echo base_url(); ?>assets/login-mhs/img/bg-login.png"
                style="background-image: url(<?php echo base_url(); ?>assets/login-mhs/img/bg-login.png)">
                <!-- <div class="container text-center ">
					<img src="assets/login-mhs/img/welcometext.png" class="" width="350">
				</div> -->
            </div>
            <div class="login-right col-md-6 col-lg-5 col-sm-5 d-flex align-items-center justify-content-center">


                <div class="space-6"></div>
                <div class="container">
                    <div class="login-form ">
                        <div class="row">

                            <div class="col-md-12 col-lg-10 col-xs-12">
                                <div align="center">

                                    <img style="width: 150px;" src="<?php echo base_url('assets/img/logo_sbh.png') ?>">
                                </div>
                                <hr>

                                <h1 class="font-32px font-weight-bold text-blue mb-5 text-center"> Login <br>SIAKAD |
                                    SBH</h1>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12 col-lg-10 col-xs-12">
                                <?php echo $this->session->flashdata('pesan'); ?>
                                <form method="post" action="<?php echo base_url(); ?>auth/baak"
                                    onsubmit="return cekform();">
                                    <input type="text" name="<?= $this->security->get_csrf_token_name(); ?>"
                                        value="<?= $this->security->get_csrf_hash(); ?>">
                                    <div class="controls">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-label-group mb-4">
                                                    <h6 class="mb-2 font-16px text-muted">Username </h6>
                                                    <input type="text" name="username" id="username"
                                                        class="form-control" placeholder="Username" />
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <!-- /column -->
                                            <div class="col-12">
                                                <div class="form-label-group mb-3">
                                                    <h6 class="mb-2 font-16px text-muted">Password</h6>
                                                    <div class="input-group">
                                                        <input type="password" name="password" id="password"
                                                            class="form-control" placeholder="Password" />
                                                    </div>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>

                                            <input type="hidden" name="level" value="admin_akademik">
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
                                    <input name="__RequestVerificationToken" type="hidden"
                                        value="CfDJ8JxL3hXKpJNLkAHLXBYoroesfKpOb3mBTohXWLSGNwMCiom26MDYFnWaSFrUvjlQGphDzpAAx6cwaUYyqkVe2ZxRe-3tlYPGoicEJctWK-yC76JG9RQn8W3y2c80jc1Z3ks2VV_wmFTso5DGs7JGLHM" /><input
                                        name="RememberMe" type="hidden" value="false">
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
    <script type="text/javascript">
    function cekform() {
        if (!$("#username").val()) {
            setTimeout(function() {
                Swal.fire({
                    icon: 'warning',
                    title: 'Gagal',
                    text: 'Mohon masukan Username / Password',
                    confirmButtonText: 'OK'
                });
            }, 10);
            $("#username").focus();

        }

        if (!$("#password").val()) {
            setTimeout(function() {
                Swal.fire({
                    icon: 'warning',
                    title: 'Gagal',
                    text: 'Mohon masukan Username / Password',
                    confirmButtonText: 'OK'
                });
            }, 10);
            $("#password").focus();
            return false;

        }

        // 	var flash = $('#flash').data('flash');
        // 		if(flash){
        // 			Swal.fire({
        // 				icon: 'warning',
        // 				title: 'Oopss...',
        // 				confirmButtonText:'OK'
        // 				text: flash
        // 			});

        // 		}
    }
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- jQuery -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="<?php echo base_url(); ?>assets/lte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/lte/dist/js/adminlte.min.js"></script>
</body>

</html>