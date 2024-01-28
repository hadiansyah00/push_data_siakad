<!-- Data table area Start-->
<div class="admin-dashone-data-table-area">
	<div class="container-fluid">

		<?php echo $this->session->flashdata('pesan'); ?>

		<div class="row">
			<div class="col-lg-12">
				<div class="sparkline8-list shadow-reset">
					<div class="sparkline8-hd">
						<div class="main-sparkline8-hd">
							<h1>Input Pembayaran Berdasarkan Mahasiswa</h1>
							<div class="sparkline8-outline-icon">
								<span title="Refresh"><a href="<?php echo base_url('bauk/Pembayaran'); ?>" class="btn-sm btn-warning"><i class="fa fa-refresh"></i></a>
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
										<th data-field="nim">NIM</th>
										<th data-field="nama_mhs">Nama Mahasiswa</th>
										<th data-field="tahun_masuk">Tahun Masuk</th>
										<th data-field="jurusan">Jurusan</th>
										<th data-field="status_mhs">Status Mahasiswa</th>
										<th data-field="total">Total Pembayaran</th>
										<th data-field="sisa">Sisa Pembayaran</th>
										<th data-field="jadwal">Input</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									    error_reporting(0);
									foreach ($mhs as $row) : 
									$total = $row->smt_1 + $row->smt_2 + $row->smt_3 + $row->smt_4 + $row->smt_5 + $row->smt_6 + $row->smt_7 + $row->smt_8;
									?>
										<tr>
											<td><?php echo $i++; ?></td>
											<td><?php echo $row->nim; ?></td>
											<td><?php echo $row->nama_mhs; ?></td>
											<td><?php echo $row->tahun_masuk; ?></td>
											<td><?php echo $row->jenjang; ?><?php echo $row->jurusan; ?></td>
											<td><?php if ($row->status_mhs == 'tidak') {
													echo "<span class='label label-default'>
                                                            <i class='ace-icon fa fa-exclamation-triangle bigger-120'></i>
                                                            Tidak-Aktif
                                                     </span>";
												} elseif ($row->status_mhs == 'aktif'){
													echo "<span class='label label-success'>
                                                        <i class='ace-icon fa fa-check bigger-120'></i>
                                                                            Aktif 
                                                     </span>";
												} ?></td>
												
	                                        <td>Rp. <?php  echo number_format($total,0,',','.'); ?>,-</td>
	                                        <td>Rp. <?php  echo number_format($row->sisa,0,',','.'); ?>,-</td>
											<td>
								            <a class="btn-sm btn-primary" href="<?php echo base_url('bauk/Pembayaran/index_pembayaran/' . $row->id_mahasiswa . '/'); ?>"><i class="fa fa-edit"></i></a>
											</td>
										</tr>
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
