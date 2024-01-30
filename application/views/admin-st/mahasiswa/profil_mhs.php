<div class="user-profile-wrap shadow-reset">
	<div class="row">
		<div class="col-lg-6">
			<div class="row">
				<div class="col-lg-3">
					<div class="user-profile-img">
						<?php if ($mhs['photo'] == 'default.jpg') { ?>
							<img style="width: 100px;" src="<?php echo base_url('assets/images/default.jpg'); ?>">
						<?php } else { ?>
							<img style="width: 100px;" src="<?php echo base_url('assets/images/uploads/' . $mhs['photo']); ?>">
						<?php } ?>
					</div>
				</div>
				<div class="col-lg-9">
					<div class="user-profile-content">
						<h2><?php echo $mhs['nama_mhs']; ?> </h2>
						<p class="profile-founder"><strong>NIM : <?php echo $mhs['nim']; ?> - <?php echo $mhs['jurusan']; ?></strong>
						</p>
						<table class="table small m-b-xs">
							<tbody>
							    	<tr>
									<td style="width: 130px;">
										<strong>NISN</strong>
									</td>
									<td style="width: 3px;"><strong>:</strong></td>
									<td style="width: 110px; text-align: left;">
										<strong><?php echo $mhs['nisn']; ?></strong>
									</td>
								</tr>
								<tr>
									<td style="width: 130px;">
										<strong>Jenis Kelamin</strong>
									</td>
									<td style="width: 3px;"><strong>:</strong></td>
									<td style="width: 110px; text-align: left;">
										<strong><?php echo $mhs['jk']; ?></strong>
									</td>
								</tr>
								<tr>
									<td style="width: 130px;">
										<strong>Tempat, Tgl Lahir</strong>
									</td>
									<td style="width: 3px;"><strong>:</strong></td>
									<td style="width: 110px; text-align: left;">
										<strong><?php echo $mhs['tempat_lahir'] . ', ' . $mhs['tgl_lahir']; ?></strong>
									</td>
								</tr>
								<tr>
									<td style="width: 130px;">
										<strong>No HP</strong>
									</td>
									<td style="width: 3px;"><strong>:</strong></td>
									<td style="width: 10px; text-align: left;">
										<strong><?php echo $mhs['hp']; ?></strong>
									</td>
								</tr>
								<tr>
									<td style="width: 130px;">
										<strong>email</strong>
									</td>
									<td style="width: 3px;"><strong>:</strong></td>
									<td style="width: 110px; text-align: left;">
										<strong><?php echo $mhs['email']; ?></strong>
									</td>
								</tr>
							
								<tr>
									<td style="width: 130px;">
										<strong>Alamat</strong>
									</td>
									<td style="width: 3px;"><strong>:</strong></td>
									<td style="width: 300px; text-align: left;">
										<strong><?php echo $mhs['alamat']; ?></strong>
									</td>

								</tr>
									<tr>
									<td style="width: 130px;">
										<strong>Kota / Kab. </strong>
									</td>
									<td style="width: 3px;"><strong>:</strong></td>
									<td style="width: 110px; text-align: left;">
										<strong><?php echo $mhs['kota']; ?></strong>
									</td>
								</tr>
								 <tr>
									<td style="width: 130px;">
										<strong>Dosen Pembimbing</strong>
									</td>
									<td style="width: 3px;"><strong>:</strong></td>
									<td style="width: 300px; text-align: left;">
										<strong><?php echo $mhs['nama_dosen']; ?></strong>
									</td>

								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
