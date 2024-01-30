<div class="basic-form-area mg-b-15">
	<div class="container-fluid">

		<?php echo $this->session->flashdata('pesan'); ?>

		<div class="row">
			<div class="col-lg-12">
				<div class="sparkline12-list shadow-reset mg-t-30">
					<div class="sparkline12-hd">
						<div class="main-sparkline12-hd">
							<h1>Form Edit Jurusan</h1>
							<div class="sparkline12-outline-icon">
								<span class="sparkline12-collapse-link"><i class="fa fa-chevron-up"></i></span>
								<span class="sparkline12-collapse-close"><i class="fa fa-times"></i></span>
							</div>
						</div>
					</div>
					<div class="sparkline12-graph">
						<div class="basic-login-form-ad">
							<div class="row">
								<div class="col-lg-12">
									<div class="all-form-element-inner">

										<?php foreach ($jurusan as $row) : ?>

											<form action="<?php echo base_url('admin/Jurusan/updateAksi'); ?>" method="post">

												<div class="form-group-inner">
													<div class="row">
														<div class="col-lg-2">
															<label class="login2 pull-right pull-right-pro">Kode</label>
														</div>
														<div class="col-lg-9">
															<input type="text" name="kd_jurusan" class="form-control" readonly="" value="<?php echo $row->kd_jurusan; ?>">
														</div>
													</div>
												</div>
												<div class="form-group-inner">
													<div class="row">
														<div class="col-lg-2">
															<label class="login2 pull-right pull-right-pro">Jurusan</label>
														</div>
														<div class="col-lg-9">
															<input type="text" name="jurusan" class="form-control" value="<?php echo $row->jurusan; ?>">
														</div>
													</div>
												</div>
												<div class="form-group-inner">
													<div class="row">
														<div class="col-lg-2">
															<label class="login2 pull-right pull-right-pro">Singkatan</label>
														</div>
														<div class="col-lg-9">
															<input type="text" name="singkat" class="form-control" value="<?php echo $row->singkat; ?>">
														</div>
													</div>
												</div>
												<div class="form-group-inner">
													<div class="row">
														<div class="col-lg-2">
															<label class="login2 pull-right pull-right-pro">Jenjang</label>
														</div>
														<?php $p = $row->jenjang; ?>
														<div class="col-lg-9">
															<select name="jenjang" class="form-control">
																<option <?php echo ($p == 'D3') ? "selected" : "" ?>> D3 </option>
																<option <?php echo ($p == 'S1') ? "selected" : "" ?>> S1 </option>


															</select>
														</div>
													</div>
												</div>
												 <div class="form-group-inner">
													<div class="row">
														<div class="col-lg-2">
															<label class="login2 pull-right pull-right-pro">Uplod TTD Prog Study</label>
														</div>
														<div class="col-lg-9">
														 <input type="file" name="ttd" class="form-control" required="">
														</div>
													</div>
												</div> 
												<a href="<?php echo base_url('admin/jurusan'); ?>" class="btn btn-primary"><i class="fa fa-refresh"></i> Kembali</a>
												<button class="btn btn-warning"><i class="fa fa-save"></i> Update</button>
											</form>

										<?php endforeach; ?>

									</div>
								</div>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>
</div>
<br><br><br>
