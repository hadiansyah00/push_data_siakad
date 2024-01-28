<div class="row-fluid">

	<form>
		<select name="nama" id="nama">
			<option>saya</option>
			<option>Kamu</option>
		</select>
	</form>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			$("#nama").on('change', function() {
				alert($(this).val());
			});
		});
	</script>
	<div class="tabbable">
		<ul class="nav nav-tabs padding-18" id="myTab">
			<li class="active">
				<a data-toggle="tab" href="#master">
					<i class="red fa fa-film bigger-110"></i>
					Master
				</a>
			</li>
			<li class="">
				<a data-toggle="tab" href="#semester1">
					<i class="green fa fa-file bigger-110"></i>
					Semester 1
				</a>
			</li>
			<li class="">
				<a data-toggle="tab" href="#semester2">
					<i class="green fa fa-file bigger-110"></i>
					Semester 2
				</a>
			</li>
			<li class="">
				<a data-toggle="tab" href="#semester3">
					<i class="green fa fa-file bigger-110"></i>
					Semester 3
				</a>
			</li>
			<li class="">
				<a data-toggle="tab" href="#semester4">
					<i class="green fa fa-file bigger-110"></i>
					Semester 4
				</a>
			</li>
			<li class="">
				<a data-toggle="tab" href="#semester5">
					<i class="green fa fa-file bigger-110"></i>
					Semester 5
				</a>
			</li>
			<li class="">
				<a data-toggle="tab" href="#semester6">
					<i class="green fa fa-file bigger-110"></i>
					Semester 6
				</a>
			</li>
			<li class="">
				<a data-toggle="tab" href="#semester7">
					<i class="green fa fa-file bigger-110"></i>
					Semester 7
				</a>
			</li>
			<li class="">
				<a data-toggle="tab" href="#semester8">
					<i class="green fa fa-file bigger-110"></i>
					Semester 8
				</a>
			</li>
		</ul>
	</div>

	<div class="tab-content">
		<div id="master" class="tab-pane in active">
			<?php $this->load->view('admin/jadwal/jadwal'); ?>
		</div>
		<div id="semester1" class="tab-pane">
			<?php $this->load->view('admin/jadwal/smt1'); ?>
		</div>
		<div id="semester2" class="tab-pane">
			<?php $this->load->view('admin/jadwal/smt2'); ?>
		</div>
		<div id="semester3" class="tab-pane">
			<?php $this->load->view('admin/jadwal/smt3'); ?>
		</div>
		<div id="semester4" class="tab-pane">

			<h1>Ini adalah halaman History mahasiswa</h1>
		</div>
		<div id="semester5" class="tab-pane">

			<h1>Ini adalah halaman History mahasiswa</h1>
		</div>
		<div id="semester6" class="tab-pane">

			<h1>Ini adalah halaman History mahasiswa</h1>
		</div>
		<div id="semester7" class="tab-pane">

			<h1>Ini adalah halaman History mahasiswa</h1>
		</div>
		<div id="semester8" class="tab-pane">

		</div>
	</div>
</div>
