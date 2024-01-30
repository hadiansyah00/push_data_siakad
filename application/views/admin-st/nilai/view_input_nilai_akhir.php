<!-- Data table area Start-->
<div class="admin-dashone-data-table-area">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1">
				<img style="width: 70px;" src="<?php echo base_url('assets/img/logo_sbh.png'); ?>">
			</div>
			<div class="box-body col-md-5">
				<table class="table">
					<tbody>
						<tr>
							<th>Matakuliah</th>
							<td> : </td>
							<td><?php echo $matkul['matakuliah']; ?></td>
						</tr>
						<tr>
							<th>Semester</th>
							<td> : </td>
							<td><?php echo $matkul['smt']; ?></td>
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

		<?php echo $this->session->flashdata('pesan'); ?>

		<div class="row">
			<div class="col-lg-12">
				<div class="sparkline8-list shadow-reset">
					<div class="sparkline8-hd">
						<div class="main-sparkline8-hd">
							<h1>Data Input Nilai Mahasiswa</h1>
							<div class="sparkline8-outline-icon">
								<span title="Hide Table" class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
								<span title="Close Table" class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
							</div>
						</div>
					</div>
					<div class="sparkline8-graph">
						<div class="datatable-dashv1-list custom-datatable-overright">

							<form method="post" action="<?php echo base_url('admin/nilai/input_nilai_aksi_akhir/' . $matkul['kd_mk']); ?>">
								<table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-toolbar="#toolbar">
									<thead>
										<tr>
											<th data-field="no">No</th>
											<th data-field="nim">NIM</th>
											<th data-field="nama">Nama</th>
											<th data-field="nilai">Nilai</th>
										</tr>
									</thead>

									<tbody>
										<?php $i = 1;
										foreach ($mahasiswa as $row) { ?>
											<tr>
												<td><?php echo $i++; ?></td>
												<td><?php echo $row->nim; ?></td>
												<td><?php echo $row->nama_mhs . ' ' . $row->nama_kepanjangan; ?></td>
												<td>
								
														<input type="hidden" name="id_krs[]" value="<?php echo $row->id_krs; ?>">
												
														<input style="width: 40px;" type="text" name="nilai_akhir[]" onkeydown="upperCaseF(this)"  maxlength="2"  value="<?php echo $row->nilai_akhir; ?>">
													
									
												
												</td>
											</tr>
										<?php } ?>
									</tbody>
									
								</table>
									<h4><strong>Catatan</strong></h4>
								<h5>Sebelum pindah ke page / row selanjutnya nilai harus disimpan (Save) terlebih agar nilai tidak hilang </h5>
								
								<br>
					    	<button style="width: 300px;" type="submit" class="btn btn-primary" \ >Simpan</button>
							</form>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Data table area End-->
<script src="<?php echo base_url('assets\lte\plugins\jquery\jquery.min.js'); ?>"></script>
<script>

function upperCaseF(a){
    setTimeout(function(){
        a.value = a.value.toUpperCase();
    }, 1);
}
</script>
