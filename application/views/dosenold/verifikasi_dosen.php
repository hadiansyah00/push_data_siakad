<div class="admin-dashone-data-table-area">
	<div class="container-fluid">

		<?php echo $this->session->flashdata('pesan'); ?>

		<div class="row">
			<div class="col-lg-12">
				<div class="sparkline8-list shadow-reset">
					<div class="sparkline8-hd">
						<div class="main-sparkline8-hd">

							<h1>Data KRS Mahasiswa</h1>
							<!-- <div class="sparkline8-outline-icon">
								<span title="Tambah Data Mahasiswa"><a class="btn-sm btn-primary" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl"><i class="fa fa-plus"></i></a>
								</span>
								<span title="Refresh"><a href="<?php echo base_url('dosen/Mahasiswa'); ?>" class="btn-sm btn-warning"><i class="fa fa-refresh"></i></a>
								</span>
								<span title="Hide Table" class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
								<span title="Close Table" class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
							</div> -->
						</div>
					</div>
					<div class="sparkline8-graph">
						<div class="datatable-dashv1-list custom-datatable-overright">
							<table class="table table-bordered table-striped table-responsive">
								<thead class="table-dark">
									<tr>
										<th data-field="no">No</th>
										<th data-field="nik">NIM</th>
										<th data-field="nama">Nama</th>
										<th data-field="jk">JK</th>
										<th data-field="jurusan">Jurusan</th>
										<th data-field="semester">Semester</th>
										<th data-field="nama_dosen">Dospem</th>
										<th data-field="status_verfikasi">Status</th>
										<th>Aksi</th>

									</tr>
								</thead>

								<tbody>

									<?php $i = 1;
									foreach ($mhsds as $row) { ?>
										<tr>
											<td><?php echo $i++; ?></td>
											<td><?php echo $row->nim; ?></td>
											<td><?php echo $row->nama_mhs . '  ' . $row->nama_kepanjangan; ?></td>
											<td><?php echo $row->jk; ?></td>
											<td><?php echo $row->jurusan; ?></td>
											<td><?php echo $row->semester; ?></td>
											<td><?php echo $row->nama_dosen; ?></td>
											<td><?php echo $row->status_verfikasi; ?></td>
											<td>
											<?php } ?>

								</tbody>
							</table>

							<div class="sparkline8-hd">
								<div class="main-sparkline8-hd">

									<div class="sparkline8-outline-icon">
										<!-- <span>Total Mahasiswa : </span><?php echo $this->db->get('mahasiswa')->num_rows(); ?> -->
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
