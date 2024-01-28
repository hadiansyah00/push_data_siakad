<section class="">
	<div class="row">
		<div class="col-md-1">
			<img style="width: 70px;" src="<?php echo base_url('assets/img/logo_sbh.png'); ?>">
		</div>
		<div class="box-body col-md-5">
			<table class="table">
				<tbody>
					<tr>
						<th>NIM</th>
						<td> : </td>
						<td><?php echo $mhs['nim']; ?></td>
					</tr>
					<tr>
						<th>Nama</th>
						<td> : </td>
						<td><?php echo $mhs['nama_mhs']; ?> <?php echo $mhs['nama_kepanjangan']; ?></td>
					</tr>
					<tr>
						<th>Tahun Akademik</th>
						<td> : </td>
						<td><?php echo $tahun['ta']; ?> / <?php echo $tahun['semester']; ?></td>
					</tr>
				</tbody>

			</table>
		</div>
	</div>
</section>
<div class="hr hr32 hr-dotted"></div>

<div class="row">
	<div class="col">
		<div class="table">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode</th>
						<th>Matakuliah</th>
						<th>SKS</th>
						<th>Dosen</th>
						<th>Nilai</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					foreach ($jadwal as $row) { ?>
						<tr>
							<td><?php echo $i++; ?></td>
							<td><?php echo $row->kd_mk; ?></td>
							<td><?php echo $row->matakuliah; ?></td>
							<td><?php echo $row->sks; ?></td>
							<td><?php echo $row->dosen; ?></td>
							<td><input type="text" name=""></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
