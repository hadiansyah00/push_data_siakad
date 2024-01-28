<!-- End Breadcrumbs -->

<div class="container">

	<div class="row">
		<div class="col-lg-3" data-aos="fade-right">
			<img style="width: 200px;" src="<?php echo base_url('assets/images/uploads/' . $mhs['photo']); ?>" class="image-fluid" alt="">

		</div>
		<div class="col-lg-9 pt-4 pt-lg-0 content" data-aos="fade-left">

			<h3>Kartu Rencana Studi (KRS) - <?php echo $tahun['ta']; ?> (<?php echo $tahun['semester']; ?>)</h3>

			<div class="row">

				<div class="col-lg-9">
					<table class="table table-sm">
						<tr>
							<th><i class="icofont-rounded-right"></i> Jurusan/Prodi </th>
							<td>:</td>
							<td><?php echo $mhs['jenjang']; ?> - <?php echo $mhs['jurusan']; ?></td>
						</tr>
						<tr>
							<th> <i class="icofont-rounded-right"></i> Nama </th>
							<td>:</td>
							<td><?php echo $mhs['nama_mhs']; ?></td>
						</tr>
						<tr>
							<th><i class="icofont-rounded-right"></i> NIM </th>
							<td>:</td>
							<td><?php echo $mhs['nim']; ?></td>
						</tr>
						<tr>
							<th><i class="icofont-rounded-right"></i> Semester </th>
							<td>:</td>
							<td><?php echo $mhs['semester']; ?></td>
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
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModal">
		<i class="icofont-plus"></i> KRS
	</button>
	<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#kurikulum">
		<i class="icofont-eye"></i> Lihat Kurikulum
	</button>
	<p>
		<?php echo $this->session->flashdata('pesan'); ?>
	</p>
	<div class="row">
		<div class="col-md-12" data-aos="">

			<table class="table table-bordered table-striped table-responsive">
				<thead class="table-dark">
					<tr>
						<td>No</td>
						<td>Aksi</td>
						<td>Kode</td>
						<td>Matakuliah</td>
						<td>SKS</td>

					</tr>
				</thead>

				<tbody>
					<?php
					error_reporting(0);
					$i = 1;
					$sks = 0;
					foreach ($viewKrs as $row) {
						$sks = $sks + $row->sks; ?>
						<?php if ($row->semester == $tahun['semester']) { ?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><a href="<?php echo base_url('mhs/krs/delete/' . $row->id_krs); ?>" class="btn btn-sm btn-sm btn-danger" onclick="return confirm('Yakin akan dihapus?')"><i class="icofont-trash"></i></a></td>
								<td><?php echo $row->kd_mk; ?></td>
								<td><?php echo $row->matakuliah; ?></td>
								<td><?php echo $row->sks; ?></td>

							</tr>
						<?php } ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<p>
		<b>Jumlah SKS : <?php echo $sks; ?></b>
	</p>
</div>

<section>
	<div class="container">

	</div>
</section>




<!-- Modal KRS-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Daftar Matakuliah <?php echo $tahun['ta']; ?> (<?php echo $tahun['semester']; ?>)</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<table class="table table-bordered table-striped table-responsive">
					<thead class="table-dark">
						<tr>
							<td>No</td>
							<td>Aksi</td>
							<td>Kode</td>
							<td>Matakuliah</td>
							<td>Semester</td>
							<td>SKS</td>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						foreach ($getKrs as $krs) { ?>
							<?php if ($krs->semester == $tahun['semester']) { ?>
								<tr>
									<td><?php echo $i++; ?></td>
									<td>
										<?php if ($sks < 20) { ?>
											<a href="<?php echo base_url('mhs/krs/add/' . $krs->id_kurikulum); ?>" class="btn btn-success btn-sm"><i class="icofont-plus"></i></a>
										<?php } ?>
									</td>
									<td><?php echo $krs->kd_mk; ?></td>
									<td><?php echo $krs->matakuliah; ?></td>
									<td><?php echo $krs->smt; ?></td>
									<td><?php echo $krs->sks; ?></td>
								</tr>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table>
				<p>
					<b>Max SKS : 20</b>
				</p>
			</div>
			<div class="container">
				<div class="pull-left">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><br><br>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Kurikulum-->
<div class="modal fade" id="kurikulum" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Matakuliah Yang Wajib Diambil! <?php echo $tahun['ta']; ?> (<?php echo $tahun['semester']; ?>)</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<table class="table table-bordered table-striped table-responsive">
					<thead class="table-dark">
						<tr>
							<td>No</td>
							<td>Kode</td>
							<td>Matakuliah</td>
							<td>Semester</td>
							<td>SKS</td>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						$sksk = 0;
						foreach ($getKrs as $krs) { ?>
							<?php if ($krs->semester == $tahun['semester']) { ?>
								<?php if ($krs->smt == $mhs['semester']) {
									$sksk = $sksk + $krs->sks; ?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td><?php echo $krs->kd_mk; ?></td>
										<td><?php echo $krs->matakuliah; ?></td>
										<td><?php echo $krs->smt; ?></td>
										<td><?php echo $krs->sks; ?></td>
									</tr>
								<?php } ?>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table>
				<p>
					<b>Jumlah SKS : <?php echo $sksk; ?></b>
				</p>
			</div>
			<div class="container">
				<div class="pull-left">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><br><br>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url(); ?>assets/assets-mhs/js/modal.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->
