<!-- ======= Home Details Section ======= -->
<div class="container">

	<div class="portfolio-details-container">

		<div class="owl-carousel portfolio-details-carousel">
			<?php foreach ($slider as $row) { ?>
				<img src="<?php echo base_url('assets/assets-mhs/img/' . $row->photo); ?>" class="img-fluid" alt="">
			<?php } ?>
		</div>

	</div>

	<div class="portfolio-description">
		<h2><?php echo $post['judul']; ?></h2>
		<p>
			<?php echo $post['deskripsi']; ?>
		</p>
	</div>

</div>


<section id="contact" class="contact">
	<div class="container">
		<?php if ($mhs['nama_kepanjangan'] == NULL || $mhs['jk'] == NULL || $mhs['tempat_lahir'] == NULL || $mhs['nama_ayah'] == NULL) { ?>
			<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icofont-user"></i> Mohon Untuk Mengisi Survey Kepuasan Mahasiswa 	<a href="<?php echo base_url('mhs/informasi'); ?>">Klik Disini</a> </h4>
			</div>
				<!--<a href="<?php echo base_url('mhs/informasi'); ?>">Klik Disini</a> </h4>-->
		<?php } ?>
		<div class="row aos-init aos-animate" data-aos="fade-in">

			<div class="col-lg-4 d-flex align-items-stretch">
				<div class="info">
					<a href="<?php echo base_url('mhs/profil'); ?>">
						<div class="address">
							<i class="icofont-user"></i>
							<h4>Profil</h4>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-4 d-flex align-items-stretch">
				<div class="info">
					<a href="<?php echo base_url('mhs/krs'); ?>">
						<div class="address">
							<i class="bx bx-file-blank"></i>
							<h4>Isi Rencana Study</h4>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-4 d-flex align-items-stretch">
				<div class="info">
					<a href="<?php echo base_url('mhs/kurikulum'); ?>">
						<div class="address">
							<i class="bx bx-book-content"></i>
							<h4>Rencana Study</h4>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-4 d-flex align-items-stretch">
				<div class="info">
					<a href="<?php echo base_url('mhs/Khs'); ?>">
						<div class="address">
							<i class="bx bx-book-content"></i>
							<h4>KHS</h4>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-4 d-flex align-items-stretch">
				<div class="info">
					<a href="<?php echo base_url('mhs/Jadwal'); ?>">
						<div class="address">
							<i class="bx bx-book-content"></i>
							<h4>Jadwal</h4>
						</div>
					</a>
				</div>
			</div>


		</div>

	</div>
</section>
