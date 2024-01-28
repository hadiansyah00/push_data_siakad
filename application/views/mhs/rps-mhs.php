<!-- End Breadcrumbs -->

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

	<?php echo $this->session->flashdata('pesan'); ?>
	<div class="row">
		<div class="col-lg-12">

			<div class="row">
				<div class="col-md-12" data-aos="">

					<table class="table table-bordered table-striped table-responsive">
						<thead class="table-dark">
							<thead>
								<tr>
									<th class="text-center" data-field="no">No</th>
									<th class="text-center" data-field="nama_dosen">Dosen Pengampuh</th>
									<th class="text-center" data-field="keterangan">Matakuliah</th>
									<th class="text-center" data-field="jurusan">Semester</th>
									<th class="text-center" data-field="jurusan">Prog. Studi</th>
									<th class="text-center" data-field="nama_berkas">Download</th>

								</tr>
							</thead>
						<tbody>
							<?php $i = 1;
							foreach ($getRps as $row) { ?>
								<?php if ($row->semester == $tahun['semester']) { ?>
									<tr>
										<td class="text-center"><?php echo $i++; ?></td>
										<td class="text-center"><?php echo $row->nama_dosen; ?></td>
										<td class="text-center"><?php echo $row->keterangan_berkas; ?></td>
										<td class="text-center"> <?php echo $row->smt ?></td>
										<!-- <td> <//?//php echo $row->matakuliah; ?> - SMT- <//?php// echo $row->smt ?></td> -->
										<td class="text-center"><?php echo $row->jenjang ?> - <?php echo $row->jurusan ?></td>
										<td> <a href="<?php echo base_url('dosen/Uploadfile/download/' . $row->kd_berkas); ?>">Download</a></td>

									</tr>
								<?php } ?>
							<?php } ?>
						</tbody>
					</table>


					<div class="sparkline8-hd">
						<div class="main-sparkline8-hd">

							<!--<div class="sparkline8-outline-icon">-->
							<!--	<span>Total Mahasiswa : </span><?php echo $this->db->get('mahasiswa')->num_rows(); ?>-->
							<!--</div>-->
							<br>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>
</div>
</div>



<script src="<?php echo base_url(); ?>assets/assets-mhs/js/modal.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->


</div><!-- End About Section -->

<section>
	<div class="container">

	</div>
</section>






<script src="<?php echo base_url(); ?>assets/assets-mhs/js/modal.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->
