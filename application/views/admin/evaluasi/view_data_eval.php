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
				Pilih List Evaluasi Dosen Untuk Aktivasi Mahasiswa!
			</strong>
		</div>

		<?php echo $this->session->flashdata('pesan'); ?>

		<div class="row">
			<div class="col-lg-12">
				<div class="sparkline8-list shadow-reset">
					<div class="sparkline8-hd">
						<div class="main-sparkline8-hd">
							<h1>EDOM Berdasarkan Prog. Study</h1>
							<div class="sparkline8-outline-icon">
							    <span title="Tambah Data EDOM"><a class="btn-sm btn-primary" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl"><i class="fa fa-plus"></i></a>
								</span>
								<span title="Refresh"><a href="<?php echo base_url('admin/Evaluasi'); ?>" class="btn-sm btn-warning"><i class="fa fa-backward"></i></a>
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
										<th data-field="tahun akademik">Tahun Akademik</th>

										<th data-field="smt">smt</th>
						                <th data-field="link">Link</th>
										<?php $btn = $this->db->get('set_krs')->row_array();
										if ($btn['hide_btn_del'] == 0) {
										} else { ?>
											<th>Aksi</th>
										<?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									foreach ($evaluasi as $row) { ?>
									
											<tr>
												<td><?php echo $i++; ?></td>
											    <td><?php echo $row->ta; ?></td>
											    <td>SMT - <?php echo $row->smt; ?> </td>
											
												<td>
											   	<p><?php echo $row->link; ?>
										
												</td>
										    	<td>
														<a class="btn-sm btn-danger" href="<?php echo base_url('admin/Evaluasi/delete/' . $row->id_eval); ?>" onclick="return confirm('Yakin Akan Di Hapus??');"><i class="fa fa-trash"></i></a>
												</td>
											</tr>
									<?php } ?>
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

<div id="PrimaryModalhdbgcl" class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade bounceInDown animated in" role="dialog" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header header-color-modal bg-color-1">
				<h4 class="modal-title">Form Tambah Link EDOM</h4>
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
				</div>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="all-form-element-inner">
							<?php foreach ($detil as $row) { ?>
								<form action="<?php echo base_url('admin/Evaluasi/insert/' . $row->kd_jurusan . '/'); ?>" method="post">
								<?php } ?>
									<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Matakuliah</label>
										</div>
										<div class="col-lg-8">
											<select name="smt" id="smt" class="form-control">
												<option> --Pilih Semester-- </option>
											    <option value="1"> 1 </option>
											    <option value="2"> 2 </option>
											    <option value="3"> 3 </option>
											    <option value="4"> 4 </option>
											    <option value="5"> 5 </option>
											    <option value="6"> 6 </option>
											    <option value="7"> 7 </option>
											    <option value="8"> 8 </option>
											</select>
										</div>
									</div>
								</div>

								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Link</label>
										</div>
										<div class="col-lg-8">
										<input type="text" class="form-control" name="link" placeholder="Masukkan Link Google Form">
										</div>
									</div>
								</div>

						</div>
					</div>
				</div>
			</div>


			<div class="container">
				<div class="row">
					<div class="col-lg-4">
					</div>
					<div class="col-lg-4">
						<a href="#" data-dismiss="modal" class="btn btn-warning"><i class="fa fa-refresh"></i> Batal</a>
						<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
					</div>
					<div class="col-lg-4">
					</div>
				</div>
				<br><br>
			</div>
			</form>
		</div>
	</div>
</div>
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