<div class="basic-form-area mg-b-15">
	<div class="container-fluid">

		<div class="row">
			<div class="col-lg-12">
				<div class="sparkline12-list shadow-reset mg-t-30">
					<div class="sparkline12-hd">
						<div class="main-sparkline12-hd">
							<h1>Edit  Status Mahasiswa</h1>
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
										<form class="form-horizontal form" method="post" action="<?php echo base_url('admin/Mahasiswa/updatePassAksi'); ?>">

											<div class="form-group">
												<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> NIM</label>

												<div class="col-sm-8">
													<input type="hidden" name="id_mahasiswa" value="<?php echo $mhs['id_mahasiswa']; ?>" class="form-control">
														<input type="hidden" name="nama_mhs" value="<?php echo $mhs['nama_mhs']; ?>" class="form-control">
															<input type="hidden" name="tahun_masuk" value="<?php echo $mhs['tahun_masuk']; ?>" class="form-control">
													<input type="text" name="nim" value="<?php echo $mhs['nim']; ?>" class="form-control" disabled="">
												</div>
											</div>

										
												<div class="form-group">
												<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Status</label>

												<div class="col-sm-6">
													<?php $pd = $mhs['status_mhs']; ?>
            							                <label><input type="radio" name="status_mhs" value="aktif" <?php echo ($pd == 'aktif') ? "checked" : ""  ?>> Aktif</label> ||
            						                	<label><input type="radio" name="status_mhs" value="tidak" <?php echo ($pd == 'tidak') ? "checked" : "" ?>> Non Aktif</label> ||
            						                	<label><input type="radio" name="status_mhs" value="cuti" <?php echo ($pd == 'cuti') ? "checked" : ""  ?>> Cuti</label> ||
            						                	<label><input type="radio" name="status_mhs" value="lulus" <?php echo ($pd == 'lulus') ? "checked" : "" ?>> Lulus</label> ||

												</div>
											</div>
											
											
						
												<button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-save"></i> Update</button>
										</form>

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
