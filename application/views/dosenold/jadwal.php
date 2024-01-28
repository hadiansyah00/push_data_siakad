<!-- End Breadcrumbs -->

<!-- ======= About Section ======= -->
<div class="container">

	<div class="row">
		<!-- <div class="col-lg-3" data-aos="fade-right">
        <img style="width: 200px;" src="<?php echo base_url('assets/images/uploads/' . $mhs['photo']); ?>" class="image-fluid" alt="">
                
      </div> -->
		<div class="col-lg-9 pt-4 pt-lg-0 content" data-aos="fade-left">

			<h3>Jadwal Kuliah - <?php echo $tahun['ta']; ?> (<?php echo $tahun['semester']; ?>)</h3>

			<div class="row">

				<div class="col-lg-9">
					<table class="table table-sm">
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

	<a href="#" target="_blank" class="btn btn-sm btn-success"><i class="icofont-print"></i> Print Jadwal</a>
	<p>
		<?php echo $this->session->flashdata('pesan'); ?>
	</p>
	<div class="row">
		<div class="col-md-12" data-aos="">

			<table class="table table-bordered table-striped table-responsive">
				<thead class="table-dark">
					<tr>
						<td>No</td>
						<td>Kode</td>
						<td>Matakuliah</td>
						<td>SKS</td>
						<td>Dosen</td>
						<td>Hari</td>
						<td>Jam</td>
						<td>Ruangan</td>
					</tr>
				</thead>

				<tbody>
					<?php
					$i = 1;

					foreach ($viewJd as $row) { ?>
						<?php if ($row->semester == $tahun['semester']) { ?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><?php echo $row->kd_mk; ?></td>
								<td><?php echo $row->matakuliah; ?></td>
								<td><?php echo $row->sks; ?></td>
								<td><?php echo $row->nama_dosen; ?></td>
								<td><?php echo $row->hari; ?></td>
								<td><?php echo $row->jam; ?></td>
								<td><?php echo $row->ruangan; ?></td>
							</tr>
						<?php } ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
	<p>Jumlah SKS : </p>
</div><!-- End About Section -->

<section>
	<div class="container">

	</div>
</section>






<script src="<?php echo base_url(); ?>assets/assets-mhs/js/modal.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->
