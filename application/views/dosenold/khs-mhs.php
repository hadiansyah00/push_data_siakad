<!-- End Breadcrumbs -->

<!-- ======= About Section ======= -->
<div class="container">

	<div class="row">
		<div class="col-lg-3" data-aos="fade-right">
			<img style="width: 200px;" src="<?php echo base_url('assets/images/uploads/' . $mhs['photo']); ?>" class="image-fluid" alt="">

		</div>
		<div class="col-lg-9 pt-4 pt-lg-0 content" data-aos="fade-left">

			<h3>Kartu Hasil Studi (KHS) - <?php echo $tahun['ta']; ?> (<?php echo $tahun['semester']; ?>)</h3>

			<div class="row">

				<div class="col-lg-9">
					<table class="table table-sm">
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
							<th><i class="icofont-rounded-right"></i> Jurusan/Prodi </th>
							<td>:</td>
							<td><?php echo $mhs['jenjang']; ?> - <?php echo $mhs['jurusan']; ?></td>
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

	<a href="<?php echo base_url('mhs/Transkrip/printKHS/' . $mhs['id_mahasiswa']); ?>" target="_blank" class="btn btn-sm btn-success"><i class="icofont-print"></i> Print KHS</a>
	<p>
		<?php echo $this->session->flashdata('pesan'); ?>
	</p>
	<div class="row">
		<div class="col-md-12" data-aos="">

			<table class="table table-bordered table-striped table-responsive">
				<thead class="table-dark">
					<tr>

					<tr>
						<td rowspan="2">NO.</td>
						<td rowspan="2">Kode MK</th>
						<td rowspan="2">Mata Kuliah</th>
						<td rowspan="2">Bobot SKS</td>
						<td colspan="3">NILAI</td>
						<td rowspan="2">T. Nilai SKS x AM</td>
					</tr>
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
								<td><?php echo $row->kd_mk; ?></td>
								<td><?php echo $row->matakuliah; ?></td>
								<td><?php echo $row->sks; ?></td>
								<td><?php echo $row->nilai; ?>
									x
									<?php
									if ($row->nilai == 'A') {
										echo $bobot = 4;
									} elseif ($row->nilai == 'B') {
										echo $bobot = 3;
									} elseif ($row->nilai == 'C') {
										echo $bobot = 2;
									} elseif ($row->nilai == 'D') {
										echo $bobot = 1;
									} else {
										echo $bobot = 0;
									}
									?>
								</td>
							</tr>
							<?php
							$tot_bobot = $row->sks * $bobot;
							$grand_tot = $grand_tot + $tot_bobot;
							?>
						<?php } ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<p>
		<b>Jumlah SKS : <?php echo $sks; ?></b>
	</p>
	<p>
		<b>IP : <?php echo number_format($grand_tot / $sks, 2); ?></b>
	</p>
</div><!-- End About Section -->

<section>
	<div class="container">

	</div>
</section>



<script src="<?php echo base_url(); ?>assets/assets-mhs/js/modal.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->
