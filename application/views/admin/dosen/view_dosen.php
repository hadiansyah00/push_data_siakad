<div class="container-fluid">

	<div class="menu-animate-list shadow-reset mg-b-15 menu-list-wrap">
		<div class="alert-title">
			<h2>Profil Dosen</h2>
		</div>
		<ul class="nav nav-tabs custom-menu-wrap custom-menu-wrap-st">
			<li class="active"><a data-toggle="tab" href="#Home2"><i class="fa fa-user"></i> Profil</a>
			</li>
			<!-- <li><a data-toggle="tab" href="#Appviews2"><i class="fa fa-list"></i> Matakuliah</a>
			</li> -->
		</ul>
		<div class="tab-content custom-menu-content">
			<div id="Home2" class="tab-pane in active animated zoomIn">
				<div class="">
					<?php $this->load->view('admin/dosen/profil_dosen'); ?>
				</div>
			</div>
			<div id="Appviews2" class="tab-pane animated zoomIn">
				<div class="">
					<h1>Belum Tampil</h1>
				</div>
			</div>
		</div>
	</div>
</div>
