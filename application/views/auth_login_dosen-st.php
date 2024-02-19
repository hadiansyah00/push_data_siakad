<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; SIAKAD SBH</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets-new-look/modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <!-- Include SweetAlert CSS and JS -->

    <!-- Include SweetAlert library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">


    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="<?php echo base_url(); ?>assets/img/logo_sbh.png" alt="logo" width="120" class="">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="<?php echo base_url(); ?>auth/getLoginDosen"
                                    class="needs-validation" novalidate="">
                                    <div class="form-group">
                                        <label for="username">Kode Dosen</label>
                                        <input name="username" id="username" class="form-control" type="text"
                                            tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your Kode Dosen
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="float-right">
                                                <a href="<?php echo base_url(); ?>dist/auth_forgot_password"
                                                    class="text-small">
                                                    Forgot Password?
                                                </a>
                                            </div>
                                        </div>
                                        <input name="password" id="password" type="password" class="form-control"
                                            name="password" tabindex="2" required>
                                        <div class="invalid-feedback">
                                            Please fill in your password
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input"
                                                tabindex="3" id="remember-me">
                                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>

                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                                        value="<?= $this->security->get_csrf_hash(); ?>">

                                </form>

                            </div>


                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="<?php echo base_url(); ?>assets-new-look/modules/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets-new-look/modules/popper.js"></script>
    <script src="<?php echo base_url(); ?>assets-new-look/modules/tooltip.js"></script>
    <script src="<?php echo base_url(); ?>assets-new-look/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets-new-look/modules/nicescroll/jquery.nicescroll.min.js">
    </script>
    <script src="<?php echo base_url(); ?>assets-new-look/modules/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets-new-look/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?php echo base_url(); ?>assets-new-look/js/scripts.js"></script>
    <script src="<?php echo base_url(); ?>assets-new-look/js/custom.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    $(document).ready(function() {
        // Form submit event
        $('form').submit(function(e) {
            e.preventDefault();

            // Get form data
            var formData = $(this).serialize();

            // Send AJAX request
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('auth/getLoginDosen'); ?>',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        // Redirect to the specified URL
                        window.location.href = response.redirect;
                    } else {
                        // Display SweetAlert error message
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: response.message,
                        });
                    }
                },
                error: function(error) {
                    console.log('AJAX Error:', error);
                }
            });
        });
    });
    </script>






    <!-- jQuery -->

</body>



</html>
