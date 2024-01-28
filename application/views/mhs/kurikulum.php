<!-- End Breadcrumbs -->

<!-- ======= About Section ======= -->
<div class="container">

	<div class="row">
		<!-- <div class="col-lg-3" data-aos="fade-right">
        <img style="width: 200px;" src="<?php echo base_url('assets/images/uploads/' . $mhs['photo']); ?>" class="image-fluid" alt="">
                
      </div> -->
		<div class="col-lg-9 pt-4 pt-lg-0 content" data-aos="fade-left">

			<h3>Rencana Study - <?php echo $tahun['ta']; ?> (<?php echo $tahun['semester']; ?>)</h3>

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


	<p>
		<?php echo $this->session->flashdata('pesan'); ?>
	</p>

	<div class="row">

		<div class="col-md-12" data-aos="">


			<h6><strong> Catatan:</strong><br>
			    
			    - Cetak KRS menggunakan kertas ukuran A4.<br>
			    - KRS di TTD oleh Mahasiswa,Dosen PA & Kaprodi ,<br>
                - KRS di Print sesuai dengan tombol yang ada di Bawah ini untuk : Kaprodi, Dosen PA & BAAK ,(masing-masing satu lembar)<br>
                
                
                <!-- DI ini diedit sama rival ya -->
				<!--- Cetak KRS menggunakan kertas ukuran A4.<br>-->
    <!--            - KAPRODI KEBIDANAN Biru ,<br>-->
    <!--            - KAPRODI FARMASI  Ungu,<br>-->
    <!--            - KAPRODI GIZI Kuning <br>-->
    <!--            - Dosen Pembimbing Hijau,<br>-->
    <!--            - Baak Warna Oranye<br>-->
    <!--            - Setelah KRS ditanda tangan di  <i>Photo Copy</i>-->
                <hr>
			</h6>
			<a href="<?php echo base_url('mhs/Transkrip/printKRS/' . $mhs['id_mahasiswa']); ?>" target="_blank" class="btn btn-sm btn-success"><i class="icofont-print"></i> CETAK KRS BAAK</a>
				<a href="<?php echo base_url('mhs/Transkrip/printKRS_kapro/' . $mhs['id_mahasiswa']); ?>" target="_blank" class="btn btn-sm btn-success"><i class="icofont-print"></i> CETAK KRS KAPRODI</a>
				<a href="<?php echo base_url('mhs/Transkrip/printKRS_dospem/' . $mhs['id_mahasiswa']); ?>" target="_blank" class="btn btn-sm btn-success"><i class="icofont-print"></i> CETAK KRS DOSPEM</a>
	
			<hr>
			<div class="row">
				<div class="col-md-12" data-aos="col-lg-8">
					<table class="table table-bordered table-striped table-responsive">
						<thead class="table-dark">
							<tr>
								<td>No</td>
								<td>Kode</td>
								<td>Matakuliah</td>
								<!-- <td>Semester</td> -->
								<td>SKS</td>
								<!-- DI ini diedit sama rival ya -->
								<!--<td>Dosen Pengajar</td>-->
							</tr>
						</thead>

						<tbody>
							<?php
							$i = 1;

							foreach ($viewKrs as $row) { ?>
								<?php if ($row->semester == $tahun['semester']) { ?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td><?php echo $row->kd_mk; ?></td>
										<td><?php echo $row->matakuliah; ?></td>
										<td><?php echo $row->sks; ?></td>
									</tr>

						</tbody>
							<?php } ?>
							<?php } ?>
					</table>
				</div>
			</div>
		</div>
		
	</div>
	
	<!-- <?php if ($row->status_verfikasi == "Belum Verfikasi") { ?>
<?php }
			if ($row->status_verfikasi == "Sudah Verfikasi") { ?>
	<a href="<?php echo base_url('mhs/Transkrip/printKRS/' . $mhs['id_mahasiswa']); ?>" target="_blank" class="btn btn-sm btn-success"><i class="icofont-print"></i> Print KRS</a>
<?php } ?> -->


</div>
</div><!-- End About Section -->
<section>

</section>






<script src="<?php echo base_url(); ?>assets/assets-mhs/js/modal.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->
