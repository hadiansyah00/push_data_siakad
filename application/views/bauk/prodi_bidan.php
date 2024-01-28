<!-- setting krs-->

<div class="admin-dashone-data-table-area">
	<div class="container-fluid">

		<?php echo $this->session->flashdata('pesan1'); ?>
		<div class="row">
			<div class="col-lg-12">
				<div class="sparkline8-list shadow-reset">
					<div class="sparkline8-hd">
						<div class="main-sparkline8-hd">
							<h1>Aktivasi Mahasiswa</h1>
							<div class="sparkline8-outline-icon">
								<span title="Tambah Data Tahun Akademik"><a class="btn-sm btn-primary" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl"><i class="fa fa-plus"></i></a>
								</span>
								<span title="Refresh"><a href="<?php echo base_url('bauk/mahasiswa'); ?>" class="btn-sm btn-warning"><i class="fa fa-refresh"></i></a>
								</span>
								<span title="Hide Table" class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
								<span title="Close Table" class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
							</div>
						</div>
					</div>
					<div class="sparkline8-graph">
						<div class="datatable-dashv1-list custom-datatable-overright">
							<table id="table" data-toggle="table" data-pagination="false" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-toolbar="#toolbar">
								<thead>
									<tr>
										<th>No</th>
										<th data-field="nim">NIM</th>
										<th data-field="nama_mhs">Nama Mahasiswa</th>
											<th data-field="tahun_masuk">Tahun Masuk</th>
									    <th> PRA UAP </th>
										<th> UAP </th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									foreach ($mhs as $row) :
									?>
										<tr>
											<!--Aktivasi KRS-->
											<td><?php echo $i++; ?></td>
											<td><?php echo $row->nim; ?></td>
											<td><?php echo $row->nama_mhs; ?></td>
											<td><?php echo $row->tahun_masuk;?></td>
										    <td>
												<?php if ($row->status_pra_uap == 0) { ?>
													<a data-toggle="tooltip" data-placement="top" title="Klik Untuk Mengaktifkan" class="btn-sm btn-danger" href="<?php echo base_url('bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/setpraUap/' . $row->id_mahasiswa); ?>"><i class="ace-icon fa fa-exclamation-circle bigger-120"> Blok</i></a>
													</a>
													</a>
												<?php } else {  ?>
													<a data-toggle="tooltip" data-placement="top" title="Klik Untuk Blokir" href='<?php echo base_url('bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/setpraUapN/' . $row->id_mahasiswa); ?>' class='btn-success btn-sm'>
														<i class='fa fa-check'>Aktif</i>
													</a>
												<?php } ?>

											</td>
											<td>
												<?php if ($row->status_uap == 0) { ?>
													<a data-toggle="tooltip" data-placement="top" title="Klik Untuk Mengaktifkan" class="btn-sm btn-danger" href="<?php echo base_url('bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/setUap/' . $row->id_mahasiswa); ?>"><i class="ace-icon fa fa-exclamation-circle bigger-120"> Blok</i></a>
													</a>
													</a>
												<?php } else {  ?>
													<a data-toggle="tooltip" data-placement="top" title="Klik Untuk Blokir" href='<?php echo base_url('bauk/b1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab/setUapN/' . $row->id_mahasiswa); ?>' class='btn-success btn-sm'>
														<i class='fa fa-check'>Aktif</i>
													</a>
												<?php } ?>

											</td>
											<!--Status UTS-->
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
							<div class="sparkline8-hd">
								<div class="main-sparkline8-hd">
									<div class="sparkline8-outline-icon">
										<span>Total Tahun Akademik : </span><?php echo $this->db->get('mahasiswa')->num_rows(); ?>
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
</div>
