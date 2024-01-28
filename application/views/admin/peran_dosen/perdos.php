<!-- Data table area Start-->
<div class="admin-dashone-data-table-area">
	<div class="container-fluid">
		<?php echo $this->session->flashdata('pesan'); ?>
		<div class="row">
			<div class="col-lg-6">
				<div class="sparkline8-list shadow-reset">
					<div class="sparkline8-hd">
						<div class="main-sparkline8-hd">
							<h1>Dosen Pengajar 1</h1>
							<div class="sparkline8-outline-icon">
								<span title="Tambah Data Dosen"><a class="btn-sm btn-primary" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl"><i class="fa fa-plus"></i></a>
								</span>
								<span title="Refresh"><a href="<?php echo base_url('admin/PeranDosen'); ?>" class="btn-sm btn-warning"><i class="fa fa-refresh"></i></a>
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
							
										<th data-field="nama_dosen">Nama Dosen</th>
						
										
									
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									foreach ($perdos as $row) : ?>

										<tr>
											<td><?php echo $i++; ?></td>
					
											<td><?php echo $row->nama_dosen; ?></td>
											
			
										
											<td>
												<!-- <a class="btn-sm btn-primary" data-id="<?php echo $row->id_peran; ?>" href=""><i class="fa fa-edit"></i></a> -->

												<?php $btn = $this->db->get('set_krs')->row_array();
												if ($btn['hide_btn_del'] == 0) {
												} else { ?>
													<a class="btn-sm btn-danger" href="<?php echo base_url('admin/PeranDosen/delete/' . $row->id_peran); ?>" onclick="return confirm('Yakin Akan Di Hapus??');"><i class="fa fa-trash"></i></a>
												<?php } ?>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
							

						</div>

					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="sparkline8-list shadow-reset">
					<div class="sparkline8-hd">
						<div class="main-sparkline8-hd">
							<h1>Dosen Pengajar 2</h1>
							<div class="sparkline8-outline-icon">
								<span title="Tambah Data Dosen"><a class="btn-sm btn-primary" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl_2"><i class="fa fa-plus"></i></a>
								</span>
								<span title="Refresh"><a href="<?php echo base_url('admin/PeranDosen'); ?>" class="btn-sm btn-warning"><i class="fa fa-refresh"></i></a>
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
							
										<th data-field="nama_dosen">Nama Dosen</th>
						
										
									
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									foreach ($perdos_2 as $row) : ?>

										<tr>
											<td><?php echo $i++; ?></td>
					
											<td><?php echo $row->nama_dosen; ?></td>
											
			
										
											<td>
												
												<?php $btn = $this->db->get('set_krs')->row_array();
												if ($btn['hide_btn_del'] == 0) {
												} else { ?>
													<a class="btn-sm btn-danger" href="<?php echo base_url('admin/PeranDosen/delete_perdos2/' . $row->id_perdos); ?>" onclick="return confirm('Yakin Akan Di Hapus??');"><i class="fa fa-trash"></i></a>
												<?php } ?>
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


<div id="PrimaryModalhdbgcl" class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade bounceInDown animated in" role="dialog" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header header-color-modal bg-color-1">
				<h4 class="modal-title">Form Tambah Dosen Pengajar 1</h4>
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
				</div>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="all-form-element-inner">
							<form action="<?php echo base_url('admin/PeranDosen/insertPeran'); ?>" method="post">
							<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-6">
											<label>Nama Dosen</label>
										</div>
										<div class="col-lg-12">
											<select name="id_dosen" id="dosen" class="login2 pull-left pull-right-pro form control select2" style="width: 70%" >
												<?php
												
												foreach ($ds as $row) : ?>
													<option value="<?php echo $row->id_dosen; ?>"><?php echo $row->nama_dosen; ?></option>
												<?php endforeach;  ?>
											</select>
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
				</div>

		</form>
	</div>
</div>
</div>

<!-- Modal Edit Data Peran Dosen -->

<div id="PrimaryModalhdbgcl_2" class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade bounceInDown animated in" role="dialog" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header header-color-modal bg-color-1">
				<h4 class="modal-title">Form Tambah Dosen Pengajar 2</h4>
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
				</div>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="all-form-element-inner">
							<form action="<?php echo base_url('admin/PeranDosen/insertPerdos_2'); ?>" method="post">
							<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-6">
											<label>Nama Dosen</label>
										</div>
										<div class="col-lg-12">
											<select name="id_dosen" id="peran" class="login2 pull-left pull-right-pro form control select2" style="width: 70%" >
												<?php
												
												foreach ($ds as $row) : ?>
													<option value="<?php echo $row->id_dosen; ?>"><?php echo $row->nama_dosen; ?></option>
												<?php endforeach;  ?>
											</select>
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
				</div>

		</form>
	</div>
</div>
</div>
<!-- Modal Edit Data Peran Dosen -->


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Inisialisasi Select2 pada elemen dengan ID 'dosen'
            $('#dosen').select2();
        });
    </script>

	 <script>
        $(document).ready(function() {
            // Inisialisasi Select2 pada elemen dengan ID 'dosen'
            $('#peran').select2();
        });
    </script>

