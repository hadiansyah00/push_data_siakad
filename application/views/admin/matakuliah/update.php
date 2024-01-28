<div class="basic-form-area mg-b-15">
	<div class="container-fluid">

		<?php echo $this->session->flashdata('pesan'); ?>

		<div class="row">
			<div class="col-lg-12">
				<div class="sparkline12-list shadow-reset mg-t-30">
					<div class="sparkline12-hd">
						<div class="main-sparkline12-hd">
							<h1>Form Edit Matakuliah</h1>
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
										<?php foreach ($mk as $mk) : ?>
											<form class="form-horizontal form" method="post" action="<?php echo base_url('admin/Matakuliah/updateAksi/' . $mk->kd_jurusan); ?>">
											<div class="form-group">
													<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Kode Matkul</label>

													<div class="col-sm-8">
														<input type="text" name="kd_mk"  value="<?php echo $mk->kd_mk; ?>" class="form-control" readonly="disabled">
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Matakuliah </label>

													<div class="col-sm-8">
														<input type="text" name="matakuliah" value="<?php echo $mk->matakuliah ?>" class="form-control" required="">
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> SKS </label>

													<div class="col-sm-8">
														<input type="number" id="sks" name="sks" value="<?php echo $mk->sks ?>" class="form-control">
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Semester </label>
													<?php $semester = $mk->smt; ?>
													<div class="col-sm-8">
														<select name="smt" class="form-control">
															<option <?php echo ($semester == '1') ? "selected" : "" ?>>1</option>
															<option <?php echo ($semester == '2') ? "selected" : "" ?>>2</option>
															<option <?php echo ($semester == '3') ? "selected" : "" ?>>3</option>
															<option <?php echo ($semester == '4') ? "selected" : "" ?>>4</option>
															<option <?php echo ($semester == '5') ? "selected" : "" ?>>5</option>
															<option <?php echo ($semester == '6') ? "selected" : "" ?>>6</option>
															<option <?php echo ($semester == '7') ? "selected" : "" ?>>7</option>
															<option <?php echo ($semester == '8') ? "selected" : "" ?>>8</option>
																<option <?php echo ($semester == '9') ? "selected" : "" ?>>9</option>
														</select>
													</div>

												</div>
                                <div class="form-group-inner">
								    <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Mk Pilihan </label>
										<div class="col-lg-8">
											<?php $ps = $mk->mk_pilihan; ?>
            							      <label><input type="radio" name="mk_pilihan" value="1" <?php echo ($ps == '1') ? "checked" : ""  ?>> Ya</label> ||
            						          <label><input type="radio" name="mk_pilihan" value="0" <?php echo ($ps == '0') ? "checked" : "" ?>> Tidak</label> ||
										</div>
									</div>
								</div>
                      <hr>
                            <div class="col-lg-6">
                                <div class="col-sm-2 control-label no-padding-right">
                                    	<button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-save"></i> Update</button>
                                </div>
								
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
<br><br><br>
