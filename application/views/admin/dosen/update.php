<div class="basic-form-area mg-b-15">
	<div class="container-fluid">

		<?php echo $this->session->flashdata('pesan'); ?>

		<div class="row">
			<div class="col-lg-12">
				<div class="sparkline12-list shadow-reset mg-t-30">
					<div class="sparkline12-hd">
						<div class="main-sparkline12-hd">
							<h1>Form Edit Dosen</h1>
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

										<?php foreach ($dosen as $ds) : ?>
											<form class="form-horizontal form" method="post" action="<?php echo base_url('admin/Dosen/updateAksi'); ?>">

												<div class="form-group">
													<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> NIDN</label>

													<div class="col-sm-8">
														<input type="hidden" name="id_dosen" value="<?php echo $ds->id_dosen; ?>" class="form-control">
														<input type="text" name="nidn" value="<?php echo $ds->nidn; ?>" class="form-control">
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Kode Dosen</label>

													<div class="col-sm-8">
														<input type="text" name="kd_dosen" value="<?php echo $ds->kd_dosen; ?>" class="form-control" required="">
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Nama</label>

													<div class="col-sm-8">
														<input type="text" name="nama_dosen" value="<?php echo $ds->nama_dosen; ?>" class="form-control" required="">
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Jenis Kelamin</label>
													<?php $jk = $ds->jenis_kelamin; ?>
													<div class="col-sm-3">
														<label><input type="radio" name="jenis_kelamin" value="L" <?php echo ($jk == 'L') ? "checked" : "" ?>> Laki-Laki</label> ||
														<label><input type="radio" name="jenis_kelamin" value="P" <?php echo ($jk == 'P') ? "checked" : "" ?>> Perempuan</label>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Tempat Lahir</label>

													<div class="col-sm-8">
														<input type="text" name="tempat" value="<?php echo $ds->tempat; ?>" class="form-control">
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Tgl Lahir</label>

													<div class="col-sm-8">
														<input type="date" name="tgl" value="<?php echo $ds->tgl; ?>" class="form-control">
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Alamat</label>

													<div class="col-sm-8">
														<textarea name="alamat_dosen" class="form-control"><?php echo $ds->alamat_dosen; ?></textarea>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Email</label>

													<div class="col-sm-8">
														<input type="email" name="email_ds" value="<?php echo $ds->email_ds; ?>" class="form-control">
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> WhatsApp</label>

													<div class="col-sm-8">
														<input type="text" name="hp_ds" value="<?php echo $ds->hp_ds; ?>" class="form-control" required="">
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Status Dosen</label>
													<?php $s = $ds->status_ds; ?>
													<div class="col-sm-3">
														<label><input type="radio" name="status_ds" value="Dosen Tetap" <?php echo ($s == 'Dosen Tetap') ? "checked" : "" ?>> Dosen Tetap</label> ||
														<label><input type="radio" name="status_ds" value="Tidak Tetap" <?php echo ($s == 'Tidak Tetap') ? "checked" : "" ?>> Tidak Tetap</label>
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Prodi</label>
													<?php $s = $ds->kd_jurusan; ?>
													<div class="col-sm-8">
														<select name="jurusan" id="jurusan" class="form-control">
															<option value="1"> --Pilih Jurusan-- </option>
												            <option value="gabungan"> Gabungan </option>
															<?php
															$jurusan = $this->DosenModel->getJurusan()->result();
															foreach ($jurusan as $row) : ?>
																<option value="<?php echo $row->kd_jurusan; ?>"><?php echo $row->jurusan; ?></option>
															<?php endforeach;  ?>
														</select>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Password</label>
													<div class="col-sm-8">
														<input type="password" name="password_ds" class="form-control">
													</div>
												</div>


												<button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-save"></i> Update</button>
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
