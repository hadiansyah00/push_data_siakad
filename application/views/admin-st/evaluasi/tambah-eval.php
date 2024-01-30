<!-- Data table area Start-->
<div class="admin-dashone-data-table-area">
	<div class="container-fluid">
		<?php echo $this->session->flashdata('pesan'); ?>
		<div class="row">
			<div class="col-lg-12">
				<div class="sparkline8-list shadow-reset">
					<div class="sparkline8-hd">
						<div class="main-sparkline8-hd">
							<h1>Kusioner</h1>
							<div class="sparkline8-outline-icon">
								<span title="Tambah Data Kusioner"><a class="btn-sm btn-primary" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl"><i class="fa fa-plus"></i></a>
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
										<th data-field="kode">Pertanyaan</th>
											<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									foreach ($list_kus as $row) : ?>
										<tr>
											<td><?php echo $i++; ?></td>
											<td><?php echo $row->pertanyaan; ?></td>
											<td>	<a class="btn-sm btn-danger" href="<?php echo base_url('admin/Evaluasi/delete/' . $row->id_eval); ?>" onclick="return confirm('Yakin Akan Di Hapus??');"><i class="fa fa-trash"></i></a></td>
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

<div id="PrimaryModalhdbgcl" class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade bounceInDown animated in" role="dialog" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header header-color-modal bg-color-1">
				<h4 class="modal-title">Tambah Kusioner</h4>
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
				</div>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="all-form-element-inner">
						
							<form action="<?php echo base_url(); ?>admin/Evaluasi/Insert" method="post">
							<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-6">
											<label class="login2 pull-left pull-left-pro">Pertanyaan</label>
										</div>
										<div class="col-lg-12">
										<input type="textarea" class="form-control" name="pertanyaan" placeholder="Masukkan Link Google Form">
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
