<!-- Data table area Start-->
<div class="admin-dashone-data-table-area">
	<div class="container-fluid">

		<?php echo $this->session->flashdata('pesan'); ?>

		<div class="row">
			<div class="col-lg-12">
				<!--<div class="sparkline8-list shadow-reset">-->
				<!--	<div class="sparkline8-hd">-->
				<!--		<div class="main-sparkline8-hd">-->
				<!--			<h1>Data Mahasiswa</h1>-->
				<!--			<div class="sparkline8-outline-icon">-->
				<!--				<span title="Tambah Data Mahasiswa"><a class="btn-sm btn-primary" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl"><i class="fa fa-plus"></i></a>-->
				<!--				</span>-->
				<!--				<span title="Refresh"><a href="<?php echo base_url('dosen/Mhskrs'); ?>" class="btn-sm btn-warning"><i class="fa fa-refresh"></i></a>-->
				<!--				</span>-->
				<!--				<span title="Hide Table" class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>-->
				<!--				<span title="Close Table" class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>-->
				<!--			</div>-->
				<!--		</div>-->
				<!--	</div>-->
					<div class="sparkline8-graph">
						<div class="datatable-dashv1-list custom-datatable-overright">
							<table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-toolbar="#toolbar">
								<thead>
									<tr>
										<th class="text-center" data-field="no">No</th>
										<th class="text-center" data-field="nim">Nim</th>
										<th class="text-center" data-field="nama_mhs">Nama</th>
										<th class="text-center" data-field="semester">Semester</th>
										<th class="text-center" data-field="jurusan">Prog. Studi</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									foreach ($mhs as $row) { ?>

										<tr>
											<td class="text-center"><?php echo $i++; ?></td>
											<td class="text-center"><?php echo $row->nim; ?></td>
											<td ><?php echo $row->nama_mhs; ?></td>
											<td class="text-center"><?php echo $row->semester; ?></td>
											<td class="text-center"><?php echo $row->jenjang; ?> <?php echo $row->jurusan; ?></td>
											<td class="text-center">
												<a title="Detil Mahasiswa" class="btn-sm btn-success" href="<?php echo base_url('dosen/Mahasiswa/view_mhs/' . $row->id_mahasiswa); ?>"><i class="fa fa-eye"></i></a>
			                                    <a title="Lihat Transkrip" class="btn-sm btn-primary" href="<?php echo base_url('dosen/Mahasiswa/detil_transkrip/'.$row->id_mahasiswa); ?>"><i class="fa fa-list"></i></a>

	   										</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>


							<div class="sparkline8-hd">
								<div class="main-sparkline8-hd">

									<!--<div class="sparkline8-outline-icon">-->
									<!--	<span>Total Mahasiswa : </span><?php echo $this->db->get('mahasiswa')->num_rows(); ?>-->
									<!--</div>-->
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






		</div>
	</div>
</div>
