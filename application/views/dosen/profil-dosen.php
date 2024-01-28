<style type="text/css">
	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}

	body {
		background: #f6f6f6;
		color: #444;
		font-family: 'Roboto', sans-serif;
		font-size: 16px;
		line-height: 1;
	}

	.container {
		max-width: 1100px;
		padding: 0 20px;
		margin: 0 auto;
	}

	.panel {
		margin: 10px auto 10px;
		max-width: 500px;
		text-align: center;
	}

	.button_outer {
		background: #2F4F4F;
		border-radius: 30px;
		text-align: center;
		height: 50px;
		width: 200px;
		display: inline-block;
		transition: .2s;
		position: relative;
		overflow: hidden;
	}

	.button_save {
		background: #87CEFA;
		border-radius: 30px;
		text-align: center;
		height: 50px;
		width: 200px;
		display: inline-block;
		position: relative;
		overflow: hidden;
	}

	.btn_upload {
		padding: 17px 30px 12px;
		color: #fff;
		text-align: center;
		position: relative;
		display: inline-block;
		overflow: hidden;
		z-index: 3;
		white-space: nowrap;
	}

	.btn_upload input {
		position: absolute;
		width: 100%;
		left: 0;
		top: 0;
		width: 100%;
		height: 105%;
		cursor: pointer;
		opacity: 0;
	}

	.file_uploading {
		width: 100%;
		height: 10px;
		margin-top: 20px;
		background: #ccc;
	}

	.file_uploading .btn_upload {
		display: none;
	}
</style>
<!-- End Breadcrumbs -->

<!-- ======= About Section ======= -->

<div class="container">

	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #e3f2fd;">
		<a class="navbar-brand" href="#">Update</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<!-- <li class="nav-item">
					<a class="nav-link" href="" data-toggle="modal" data-target="#exampleModal">Identitas</a>
				</li> -->
				<!-- <li class="nav-item">
					<a class="nav-link" href="" data-toggle="modal" data-target="#semester">Semester</a>
				</li> -->

				<li class="nav-item">
					<a class="nav-link" href="" data-toggle="modal" data-target="#password">Password</a>
				</li>
			</ul>
		</div>
	</nav>
	<!-- end nav -->

	<div class="row">
		<div class="col-lg-3" data-aos="fade-right">
			<!-- Upload image -->
		
				    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
			<?php if ($dsn['photo'] == NULL) { ?>
			<img src="<?php echo base_url('assets/images/default.jpg'); ?>" alt="" class="img-fluid rounded-circle">
			<?php } else { ?>
			<img src="<?php echo base_url('assets/images/uploads' . $dsn['photoo']); ?>" alt="" class="img-fluid rounded-circle">
			<?php } ?>
		</div>
        <div class="col-lg-8" data-aos="fade-right">
            	<h3>Identitas Dosen SBH</h3>
			<div class="row">
				<div class="col-lg-12">
					<table class="table table-sm">
						<tr>
							<th><i class="icofont-rounded-right"></i> Nama Dosen </th>
							<td>:</td>
							<td><?php echo $dsn['nama_dosen']; ?> </td>
						</tr>
						<tr>
							<th><i class="icofont-rounded-right"></i> Program Studi </th>
							<td>:</td>
							<td><?php echo $dsn['jurusan']; ?> </td>
						</tr>
						<tr>
							<th><i class="icofont-rounded-right"></i> Kode Dosen </th>
							<td>:</td>
							<td><?php echo $dsn['kd_dosen']; ?> </td>
						</tr>
						<tr>
							<th><i class="icofont-rounded-right"></i> NIDN </th>
							<td>:</td>
							<td><?php echo $dsn['nidn']; ?> </td>
						</tr>

					</table>
				</div>
			
		    	<form class="form-horizontal" method="post" action="<?php echo base_url('dosen/profil/updatePhotoDosen'); ?>" enctype="multipart/form-data">
				<input type="hidden" name="id_dosen" value="<?php echo $dsn['id_dosen']; ?>">
				<main class="main_full">
					<div class="container">
						<div class="panel">
							<div class="button_outer">
								<div class="btn_upload">
									<input type="file" id="upload_file" name="photoo" required="">
									<i class="bx bx-upload"></i> Upload Image
								</div>
							</div>
						</div>
					</div>
				</main>
				<main class="main_full">
					<div class="container">
						<div class="panel">
							<button type="submit" class="button_save"><i class="bx bx-save"></i> Save</button>
						</div>
					</div>
				</main>
			</form>
			</div>
        </div>
		


			<?php echo $this->session->flashdata('pesan'); ?>

			<!-- Button trigger modal -->
			<!-- <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
              Update
            </button> -->

		</div>
	</div>

</div>




<!-- Modal identitas-->

<!-- END FORM -->






<!-- Modal Upload Photo-->
<div class="modal fade" id="upload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel"><?php echo $dsn['nama_dosen']; ?> <?php echo $dsn['kd_dosen']; ?></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="row">
					<div class="col-lg-3" data-aos="fade-right">
						<img src="<?php echo base_url('assets/images/uploads' . $dsn['photoo']); ?>" class="img-fluid" alt="">
						<!-- Upload image -->
						<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
						<form class="form-horizontal" method="post" action="<?php echo base_url('dosen/profil/updatePhotoDosen'); ?>" enctype="multipart/form-data">
							<input type="hidden" name="id_dosen" value="<?php echo $dsn['id_dosen']; ?>">
							<main class="main_full">
								<div class="container">
									<div class="panel">
										<div class="button_outer">
											<div class="btn_upload">
												<input type="file" id="upload_file" name="photoo" required="">
												Upload Image
											</div>
										</div>
									</div>
								</div>
							</main>
							<main class="main_full">
								<div class="container">
									<div class="panel">
										<button type="submit" class="button_save">Save</button>
									</div>
								</div>
							</main>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<!--  -->

<!-- Modal update password -->
<div class="modal fade" id="password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Update Password</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">


				<form class="form-horizontal form" method="post" action="<?php echo base_url('dosen/profil/updatePassDs'); ?>">

					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Kode Dosen</label>
						<div class="col-sm-12">
							<input type="hidden" name="id_dosen" value="<?php echo $dsn['id_dosen']; ?>">
							<input type="text" class="form-control" name="kd_dosen" disabled="" value="<?php echo $dsn['kd_dosen']; ?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pass Dosen</label>
						<div class="col-sm-12">

							<input type="password" class="form-control" name="password_ds" value="" placeholder="New Password">
						</div>
					</div>

					<!-- <div class="form-group">
						<label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Password</label>
						<div class="col-sm-12">
							<input type="password" class="form-control" id="password" name="password" placeholder="new password" required="">
							<?php //echo form_error('password', '<small class="text-danger">', '</small>'); 
							?>
						</div>
					</div> -->

			</div>
			<div class="container">
				<div class="pull-left">
					<button type="submit" class="btn btn-success">Save</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button><br><br>
				</div>
			</div>
			<!-- END FORM -->
			</form>

		</div>
	</div>
</div>

<script src="<?php echo base_url(); ?>assets/assets-dsn/js/modal.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->
