<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- <meta name="author" content="Kodinger"> -->
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Lupa Kata Sandi | SIAKAD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets-login/css/my-login.css">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <!-- Include SweetAlert CSS and JS -->

    <!-- Include SweetAlert library -->
	<script src="
		https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.all.min.js
		"></script>
		<link href="
		https://cdn.jsdelivr.net/npm/sweetalert2@11.10.6/dist/sweetalert2.min.css
		" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <style>
    /* CSS untuk menentukan ukuran halaman */
    html,
    body {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    /* CSS untuk membuat konten di tengah halaman */
    #particles-js {
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: #e9a810;
        background-size: cover;
        background-position: 50% 50%;
        background-repeat: no-repeat;
    }

    #content {
        position: relative;
        z-index: 1;
        text-align: center;
        color: #fff;
        padding: 20px;
    }
    </style>
</head>

<body class="my-login-page" id="">
    <div id="particles-js"></div>
    <div class="container h-100">
        <div class="row justify-content-md-center align-items-center h-100">
            <div class="card-wrapper">
                <div class="brand">
                    <img src="<?php echo base_url() ?>assets-login/img/logo_sbh_bulet.png" alt="logo">
                </div>
                <div class="card fat">
                    <div class="card-body">
                        <div class="card-tittle text-center mb-4">
				
                            <h5 class="text-center"> Masukan Password<strong><i> Baru</i></strong></h5>
                        </div>
						<form id="changePasswordForm" method="POST" class="my-login-validation" novalidate>
							<div class="form-group">
							<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
							<input type="hidden" value="<?php echo $test['token']?>" name="token" >
								<label for="new_password">New Password</label>
								<input id="new_password" type="password" class="form-control" name="new_password" required>
								<div class="invalid-feedback">Please enter a new password.</div>
							</div>

							<div class="form-group">
								<label for="confirmPassword">Confirm New Password</label>
								<input id="confirmPassword" type="password" class="form-control" name="confirm_password" required>
								<div class="invalid-feedback">Please confirm your new password.</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Change Password</button>
							</div>
						</form>


                    </div>
                </div>
                <div class="footer">
                    Copyright &copy; 2017 &mdash; Your Company
                </div>
            </div>
        </div>
    </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
    // Inisialisasi Particles.js dengan konfigurasi Anda
    particlesJS('particles-js', {
        "particles": {
            "number": {
                "value": 80,
                "density": {
                    "enable": true,
                    "value_area": 800
                }
            },
            "color": {
                "value": "#ffffff"
            },
            "shape": {
                "type": "circle",
                "stroke": {
                    "width": 0,
                    "color": "#000000"
                },
                "polygon": {
                    "nb_sides": 5
                }
            },
            "opacity": {
                "value": 0.5,
                "random": false,
                "anim": {
                    "enable": false,
                    "speed": 1,
                    "opacity_min": 0.1,
                    "sync": false
                }
            },
            "size": {
                "value": 3,
                "random": true,
                "anim": {
                    "enable": false,
                    "speed": 40,
                    "size_min": 0.1,
                    "sync": false
                }
            },
            "line_linked": {
                "enable": true,
                "distance": 150,
                "color": "#ffffff",
                "opacity": 0.4,
                "width": 1
            },
            "move": {
                "enable": true,
                "speed": 6,
                "direction": "none",
                "random": false,
                "straight": false,
                "out_mode": "out",
                "bounce": false,
                "attract": {
                    "enable": false,
                    "rotateX": 600,
                    "rotateY": 1200
                }
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": true,
                    "mode": "repulse"
                },
                "onclick": {
                    "enable": true,
                    "mode": "push"
                },
                "resize": true
            },
            "modes": {
                "repulse": {
                    "distance": 200,
                    "duration": 0.4
                },
                "push": {
                    "particles_nb": 4
                }
            }
        },
        "retina_detect": true
    });
    </script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    $(function() {

      
        // author badge :)
        var author =
            '<div style="position: fixed;bottom: 0;right: 20px;background-color: #fff;box-shadow: 0 4px 8px rgba(0,0,0,.05);border-radius: 3px 3px 0 0;font-size: 12px;padding: 5px 10px;">By <a href="https://hadi-portfolio-react-s5n8.vercel.app/">ICT Division</a> &nbsp;&bull;&nbsp; <a href="https://wa.me/qr/REIIRH4ZDRG4M1">WhatsApp (Report Error)</a></div>';
        $("body").append(author);


        $("input[type='password'][data-eye]").each(function(i) {
            var $this = $(this),
                id = 'eye-password-' + i,
                el = $('#' + id);

            $this.wrap($("<div/>", {
                style: 'position:relative',
                id: id
            }));

            $this.css({
                paddingRight: 60
            });
            $this.after($("<div/>", {
                html: 'Show',
                class: 'btn btn-warning btn-sm',
                id: 'passeye-toggle-' + i,
            }).css({
                position: 'absolute',
                right: 10,
                top: ($this.outerHeight() / 2) - 12,
                padding: '2px 7px',
                fontSize: 12,
                cursor: 'pointer',
            }));

            $this.after($("<input/>", {
                type: 'hidden',
                id: 'passeye-' + i
            }));

            var invalid_feedback = $this.parent().parent().find('.invalid-feedback');

            if (invalid_feedback.length) {
                $this.after(invalid_feedback.clone());
            }

            $this.on("keyup paste", function() {
                $("#passeye-" + i).val($(this).val());
            });
            $("#passeye-toggle-" + i).on("click", function() {
                if ($this.hasClass("show")) {
                    $this.attr('type', 'password');
                    $this.removeClass("show");
                    $(this).removeClass("btn-outline-warning");
                } else {
                    $this.attr('type', 'text');
                    $this.val($("#passeye-" + i).val());
                    $this.addClass("show");
                    $(this).addClass("btn-outline-warning");
                }
            });
        });

        $(".my-login-validation").submit(function() {
            var form = $(this);
            if (form[0].checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.addClass('was-validated');
        });
    });
    </script>
	<script>
			$(document).ready(function() {
			$('#changePasswordForm').submit(function(e) {
				e.preventDefault();

				var new_password = $('#new_password').val();
				var confirmPassword = $('#confirmPassword').val();

				// Validasi kata sandi baru
				if (new_password !== confirmPassword) {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'New password and confirm password do not match.'
					});
					return;
				}

				// Kirim permintaan Ajax
				

				$.ajax({
					type: 'POST',
					url: '<?php echo base_url('auth/update_password'); ?>',
					data: $(this).serialize(),
					dataType: 'json',
					headers: {
						'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
					},
					success: function(response) {
						if (response.status === 'success') {
							console.log(response);

							Swal.fire({
								icon: 'success',
								title: 'Success!',
								text: response.message
							}).then(function() {
								window.location.reload(); // Muat ulang halaman setelah pesan ditutup
							});
						} else {
							Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: response.message
							});
						}
					},
					
					error: function(xhr, status, error) {
						// Cetak pesan kesalahan rinci di konsol
						console.error(xhr.responseText);
						
						// Tampilkan pesan kesalahan umum kepada pengguna
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'An error occurred while processing your request. Please try again later.'
						});
}

				});
			});
		});

	</script>
</body>
</html>
