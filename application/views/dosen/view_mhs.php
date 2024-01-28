<div class="container-fluid">

	<div class="menu-animate-list shadow-reset mg-b-15 menu-list-wrap">
		<div class="alert-title">
			<h2>Profil Mahasiswa</h2>
		</div>
		<ul class="nav nav-tabs custom-menu-wrap custom-menu-wrap-st">
			<li class="active"><a data-toggle="tab" href="#Home2"><i class="fa fa-user"></i> Profil</a>
			</li>
			<li><a data-toggle="tab" href="#Interface2"><i class="fa fa-home"></i> Orang Tua</a>
			</li>
			<!-- <li><a data-toggle="tab" href="#Appviews2"><i class="fa fa-file"></i> Transkrip Nilai</a>
			</li> -->
			<li><a href="<?php echo base_url('dosen/mhskrs'); ?>"><i class="fa fa-backward"></i> Kembali</a>
			</li>
		</ul>
		<div class="tab-content custom-menu-content">
			<div id="Home2" class="tab-pane in active animated zoomIn">
				<div class="">
					<?php $this->load->view('admin/mahasiswa/profil_mhs'); ?>
				</div>
			</div>
			<div id="Interface2" class="tab-pane animated zoomIn">
				<div class="">
					<?php $this->load->view('admin/mahasiswa/mhs_ortu'); ?>
				</div>
			</div>
		
		</div>
	</div>
</div>
