<!-- ======= Home Details Section ======= -->
<div class="container">

	<div class="portfolio-details-container">

		<div class="owl-carousel portfolio-details-carousel">
			<?php foreach ($slider as $row) { ?>
				<img src="<?php echo base_url('assets/assets-mhs/img/' . $row->photo); ?>" class="img-fluid" alt="">
			<?php } ?>
		</div>

	</div>

	<!-- <div class="portfolio-description">
		<h2><?php // echo $post['judul']; 
			?></h2>
		<p>
			<?php //echo $post['deskripsi']; 
			?>
		</p>
	</div> -->

</div>


<section id="contact" class="contact">
	<div class="container">
		<?php if ($dsn['nama_dosen'] == NULL || $dsn['nidn'] == NULL || $dsn['kd_dosen'] == NULL || $dsn['jurusan'] == NULL) { ?>
			<div class="alert alert-info alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4><i class="icofont-user"></i> Selamat datang di SIAKAD <strong>SBH</strong>!</h4>
			</div>
		<?php } ?>
		<div class="row aos-init aos-animate" data-aos="fade-in">

			<div class="col-lg-4 d-flex align-items-stretch">
				<div class="info">
					<a href="<?php echo base_url('dosen/profil'); ?>">
						<div class="address">
							<i class="icofont-user"></i>
							<h4>Profil</h4>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-4 d-flex align-items-stretch">
				<div class="info">
					<a href="<?php echo base_url('dosen/mhskrs'); ?>">
						<div class="address">
							<i class="bx bx-file-blank"></i>
							<h4>Mahasiswa Didik </h4>
						</div>
					</a>
				</div>
			</div>
			<div class="col-lg-4 d-flex align-items-stretch">
				<div class="info">
					<a href="<?php echo base_url('dosen/uploadfile'); ?>">
						<div class="address">
							<i class="bx bx-book-content"></i>
							<h4>Rencana Pembelajaran Mahasiswa</h4>
						</div>
					</a>
				</div>
			</div>
			<!--<div class="col-lg-4 d-flex align-items-stretch">-->
			<!--	<div class="info">-->
			<!--		<a href="<?php echo base_url('mhs/Khs'); ?>">-->
			<!--			<div class="address">-->
			<!--				<i class="bx bx-book-content"></i>-->
			<!--				<h4>KHS MAHASISWA</h4>-->
			<!--			</div>-->
			<!--		</a>-->
			<!--	</div>-->
			<!--</div>-->
			<!--<div class="col-lg-4 d-flex align-items-stretch">-->
			<!--	<div class="info">-->
			<!--		<a href="<?php echo base_url('mhs/Jadwal'); ?>">-->
			<!--			<div class="address">-->
			<!--				<i class="bx bx-book-content"></i>-->
			<!--				<h4>Jadwal Mengajar</h4>-->
			<!--			</div>-->
			<!--		</a>-->
			<!--	</div>-->
			<!--</div>-->


		</div>

	</div>
</section>
