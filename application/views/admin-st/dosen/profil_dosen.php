<div class="user-profile-wrap shadow-reset">
	<div class="row">
		<div class="col-lg-6">
			<div class="row">
				<?php foreach ($dosen as $row) { ?>
					<div class="col-lg-3">
						<div class="user-profile-img">
							<img src="<?php echo base_url('assets/img/notification/5.jpg'); ?>" alt="">
						</div>
					</div>
					<div class="col-lg-9">
						<div class="user-profile-content">
							<h2><?php echo $row->nama_dosen; ?></h2>
							<!-- <p class="profile-founder"><strong>
									<h6>NIDN</h6><?php echo $row->nidn; ?>
								</strong>
							<p class="profile-founder"><strong>
									<h6>Kode Dosen</h6><?php echo $row->kd_dosen; ?>
								</strong> -->
							</p>
							<table class="table small m-b-xs">
								<tbody>
									<tr>
										<td style="width: 130px;">
											<strong>NIDN</strong>
										</td>
										<td style="width: 3px;"><strong>:</strong></td>
										<td style="width: 110px; text-align: left;">
											<strong><?php echo $row->nidn; ?></strong>
										</td>
									</tr>
									<tr>
										<td style="width: 130px;">
											<strong>Kode Dosen</strong>
										</td>
										<td style="width: 3px;"><strong>:</strong></td>
										<td style="width: 110px; text-align: left;">
											<strong><?php echo $row->kd_dosen; ?></strong>
										</td>
									</tr>
									<tr>
										<td style="width: 130px;">
											<strong>Jenis Kelamin</strong>
										</td>
										<td style="width: 3px;"><strong>:</strong></td>
										<td style="width: 110px; text-align: left;">
											<strong><?php echo $row->jenis_kelamin; ?></strong>
										</td>
									</tr>
									<tr>
										<td style="width: 130px;">
											<strong>Tempat, Tgl Lahir</strong>
										</td>
										<td style="width: 3px;"><strong>:</strong></td>
										<td style="width: 110px; text-align: left;">
											<strong><?php echo $row->tempat . ', ' . $row->tgl; ?></strong>
										</td>
									</tr>
									<tr>
										<td style="width: 130px;">
											<strong>Status</strong>
										</td>
										<td style="width: 3px;"><strong>:</strong></td>
										<td style="width: 10px; text-align: left;">
											<strong><?php echo $row->status_ds; ?></strong>
										</td>
									</tr>
									<!-- <tr>
										<td style="width: 130px;">
											<strong>Prodi</strong>
										</td>
										<td style="width: 3px;"><strong>:</strong></td>
										<td style="width: 110px; text-align: left;">
											<strong><?php echo $row->prodi; ?></strong>
										</td>
									</tr>
									<tr> -->
									<td style="width: 130px;">
										<strong>No Telp</strong>
									</td>
									<td style="width: 3px;"><strong>:</strong></td>
									<td style="width: 300px; text-align: left;">
										<strong><?php echo $row->hp_ds; ?></strong>
									</td>

									</tr>
									<tr>
										<td style="width: 130px;">
											<strong>Email</strong>
										</td>
										<td style="width: 3px;"><strong>:</strong></td>
										<td style="width: 110px; text-align: left;">
											<strong><?php echo $row->email_ds; ?></strong>
										</td>
									</tr>
									<tr>
										<!--<td style="width: 130px;">-->
										<!--	<strong>Prog. Studi</strong>-->
										<!--</td>-->
										<!--<td style="width: 3px;"><strong>:</strong></td>-->
										<!--<td style="width: 110px; text-align: left;">-->
										<!--	<strong><?php echo $row->jurusan; ?></strong>-->
										<!--</td>-->
									</tr>
								</tbody>
							</table>
						</div>
					</div>
			</div>
		</div>
	<?php } ?>
	</div>
</div>
