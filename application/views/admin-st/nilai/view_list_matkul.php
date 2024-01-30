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
							<th>Semester</th>
							<td> : </td>
							<td><?php echo $tahun['semester']; ?></td>
						</tr>

						<tr>
							<th>Jurusan</th>
							<td> : </td>
							<td><?php echo $detil['jenjang']; ?> - <?php echo $detil['jurusan']; ?></td>
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
							<h1>Daftar Matakuliah</h1>
							<div class="sparkline8-outline-icon">
								<span title="Refresh"><a href="<?php echo base_url('admin/Nilai'); ?>" class="btn-sm btn-warning"><i class="fa fa-backward"></i></a>
								</span>
								<span title="Hide Table" class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
								<span title="Close Table" class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
							</div>
						</div>
					</div>
					<div class="sparkline8-graph">
						<div class="datatable-dashv1-list custom-datatable-overright">
							<table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-toolbar="#toolbar">
								<thead>
									<tr>
										<th data-field="no">No</th>
										<th data-field="kode">Kode</th>
										<th data-field="matkul">Matakuliah</th>
										<th data-field="semester">Semester</th>
										<th data-field="sks">SKS</th>
										<th data-field="dosen">Dosen</th>
										<th data-field="input">Input Nilai</th>
									


									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									foreach ($jadwal as $row) : ?>
										<?php if ($row->semester == $tahun['semester']) { ?>
											<tr>
												<td><?php echo $i++; ?></td>
												<td><?php echo $row->kd_mk; ?></td>
												<td><?php echo $row->matakuliah; ?></td>
												<td><?php echo $row->smt; ?></td>
												<td><?php echo $row->sks; ?></td>
												<td><?php echo $row->nama_dosen; ?></td>
												<td>
													<a title="Input Nilai KHS" class="btn-sm btn-primary" href="<?php echo base_url('admin/Nilai/input/' . $row->kd_mk . '/'); ?>"><i class="fa fa-edit bigger-150"></i> KHS</a>
												    <a title="Input Nilai Akhir" class="btn-sm btn-primary" href="<?php echo base_url('admin/Nilai/inputAkhir/' . $row->kd_mk . '/'); ?>"><i class="fa fa-edit bigger-150">Akhir</i></a>
												    <a title="Input Nilai UTS" class="btn-sm btn-primary" href="<?php echo base_url('admin/Nilai/inputUts/' . $row->kd_mk . '/'); ?>"><i class="fa fa-edit bigger-150">UTS</i></a>
												   <a title="Input Nilai UAS" class="btn-sm btn-primary" href="<?php echo base_url('admin/Nilai/inputUas/' . $row->kd_mk . '/'); ?>"><i class="fa fa-edit bigger-150">UAS</i></a></td>


											</tr>
										<?php } ?>
									<?php endforeach; ?>
								</tbody>
							</table>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Data table area End-->
