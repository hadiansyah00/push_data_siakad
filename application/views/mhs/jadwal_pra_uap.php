<?php
if ($mhs['semester'] == 6) { ?>

<!-- ======= About Section ======= -->
<div class="container">

	<div class="row">
		<div class="col-lg-3" data-aos="fade-right">
			<img style="width: 200px;" src="<?php echo base_url('assets/images/uploads/' . $mhs['photo']); ?>" class="image-fluid" alt="">

		</div>
		<div class="col-lg-9 pt-4 pt-lg-0 content" data-aos="fade-left">

			<h3>Tahun Akademik - <?php echo $tahun['ta']; ?> (<?php echo $tahun['semester']; ?>)</h3>

			<div class="row">

				<div class="col-lg-9">
					<table class="table table-sm">
						<tr>
							<th><i class="icofont-rounded-right"></i> Nama </th>
							<td>:</td>
							<td><?php echo $mhs['nama_mhs']; ?></td>
						</tr>
						<tr>
							<th><i class="icofont-rounded-right"></i> Program Studi </th>
							<td>:</td>
							<td><?php echo $mhs['jenjang']; ?> - <?php echo $mhs['jurusan']; ?></td>
						</tr>
						<tr>
							<th><i class="icofont-rounded-right"></i> Semester </th>
							<td>:</td>
							<td><?php echo $mhs['semester']; ?></td>
						</tr>
						<tr>
							<th><i class="icofont-rounded-right"></i> Nama Dospem </th>
							<td>:</td>
							<td><?php echo $mhs['nama_dosen']; ?></td>
						</tr>
						<tr>
							<th width="180px"><i class="icofont-rounded-right"></i> Tahun Akademik </th>
							<td>:</td>
							<td>
								<?php echo $tahun['ta']; ?> (<?php echo $tahun['semester']; ?>)
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<br>
	<p> <a href="<?php echo base_url('mhs/Jadwalprauap/print_pra_uap/' . $mhs['id_mahasiswa']); ?>" target="_blank" class="btn btn-sm btn-success"><i class="icofont-print"></i> Print UAP</a>
	</p>
	<?php echo $this->session->flashdata('pesan'); ?>
	</p>
	<div class="row">
		<div class="col-md-12" data-aos="">
			<table class="table table-bordered table-striped table-responsive">
				<thead class="table-dark">
					<tr>
						<td>No</td>
						<td>Nama Ujian</td>
						<td>Jam PRA UAP</td>
						<td>Tanggal PRA UAP</td>
					</tr>
				</thead>

				<tbody>
					<?php
					$i = 1;
					foreach ($jadwal as $row) { ?>

								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php echo $row->nama_pra_uap; ?></td>
                                    <td><?php echo $row->jam_pra_uap; ?></td>
									<td><?php echo format_indo($row->tanggal_pra_uap, date('d-m-y')); ?></td>
								</tr>
							<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<br>
	<hr>


</div><!-- End About Section -->
<?php } else { ?>

                    <div class="card-body">
                        
						<table>
							<tr>
								<th style="width: 50px;"></th>
								<th style="width: 50px;">
									<span class="btn btn-danger"><i class="icofont-ui-close"></i></span>
								</th>
								<th> </th>
								<th>
								    
									<b>
										<h3 style="text-align: center;">Mohon Maaf Saat ini Jadwal UAP Belum bisa di Buka</h3>
									</b>
									
								</th>
							</tr>
						</table>
						<h5 style="text-align: center;">Untuk info lebih lanjut hubungi silahkan hubungi <b>
								<font color="red"> BAAK</font>
								</font>
							</b></h5>
					</div>

<?php } ?>
<section>
	<div class="container">

	</div>
</section>



<script src="<?php echo base_url(); ?>assets/assets-mhs/js/modal.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->


</div><!-- End About Section -->

<section>
	<div class="container">

	</div>
</section>






<script src="<?php echo base_url(); ?>assets/assets-mhs/js/modal.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->
