<!-- Data table area Start-->
<div class="admin-dashone-data-table-area">
	<div class="container-fluid">
		<!-- ALERRRTTTT -->
		<div class="alert alert-block alert-warning">
			<button type="button" class="close" data-dismiss="alert">
				<i class="ace-icon fa fa-times"></i>
			</button>

			<i class="ace-icon fa fa-check red"></i>
			<strong class="red">
				Pilih Jurusan Untuk Menambah Data Matakuliah!
			</strong>
		</div>

		<?php echo $this->session->flashdata('pesan'); ?>

		<div class="row">
			<div class="col-lg-12">
				<div class="sparkline8-list shadow-reset">
					<div class="sparkline8-hd">
						<div class="main-sparkline8-hd">
							<h1>Matakuliah Berdasarkan Jurusan</h1>
							<div class="sparkline8-outline-icon">
								<span title="Refresh"><a href="<?php echo base_url('admin/Matakuliah'); ?>" class="btn-sm btn-warning"><i class="fa fa-refresh"></i></a>
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
										<th data-field="jurusan">Jurusan</th>
										<th data-field="singkatan">Singkatan</th>
										<th data-field="jenjang">Jenjang</th>
											<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									foreach ($jurusan as $row) : ?>
										<tr>
											<td><?php echo $i++; ?></td>
											<td><?php echo $row->kd_jurusan; ?></td>
											<td><?php echo $row->jurusan; ?></td>
											<td><?php echo $row->singkat; ?></td>
											<td><?php echo $row->jenjang; ?></td>

											<td>
												<a class="btn-sm btn-primary" href="<?php echo base_url('admin/matakuliah/detil/' . $row->kd_jurusan . '/'); ?>"><i class="fa fa-list"></i></a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>

							<div class="sparkline8-hd">
								<div class="main-sparkline8-hd">

									<div class="sparkline8-outline-icon">
										<span>Total Jurusan : </span><?php echo $this->db->get('jurusan')->num_rows(); ?>
									</div>
									<br>
								</div>
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Data table area End-->
