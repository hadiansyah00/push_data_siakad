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
				Pilih Program Study Untuk Menambahkan Pertanyaan Pada EDOM!
			</strong>
		</div>

		<?php echo $this->session->flashdata('pesan'); ?>

		<div class="row">
			<div class="col-lg-12">
				<div class="sparkline8-list shadow-reset">
					<div class="sparkline8-hd">
						<div class="main-sparkline8-hd">
							<h1>EDOM KEBIDANAN</h1>
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
										<th data-field="nim">Nim</th>
										<th data-field="nama_mhs">Nama Mahasiswa</th>
										<th data-field="jurusan">Jurusan</th>
											<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									foreach ($mahasiswa as $row) : ?>
										<tr>
											<td><?php echo $i++; ?></td>

											<td><?php echo $row->nim; ?></td>
											<td><?php echo $row->nama_mhs; ?></td>
											<td><?php echo $row->kd_jurusan; ?></td>
											<td>
												<?php if ($row->status_edom == 0) { ?>
													<a data-toggle="tooltip" data-placement="top" title="Klik Untuk Mengaktifkan" class="btn-sm btn-danger" href="<?php echo base_url('admin/evaluasi/setEdomAktBd/' . $row->id_mahasiswa); ?>"><i class="ace-icon fa fa-exclamation-circle bigger-120"> Blok</i></a>
													</a>
													</a>
												<?php } else {  ?>
													<a data-toggle="tooltip" data-placement="top" title="Klik Untuk Blokir" href='<?php echo base_url('admin/evaluasi/setEdomOffBd/' . $row->id_mahasiswa); ?>' class='btn-success btn-sm'>
														<i class='fa fa-check'>Aktif</i>

													</a>
												<?php } ?>


											</td>
										</tr>
										
									<?php endforeach; ?>
								</tbody>
							</table>

							<div class="sparkline8-hd">
								<div class="main-sparkline8-hd">

								
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
<script src="<?= base_url('assets/'); ?>js/ckeditor/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(err => {
            console.error(err.stack);
        });
</script>