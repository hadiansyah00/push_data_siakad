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
						<?php foreach ($detil as $row) : ?>
							<tr>
								<th>Kode Jurusan</th>
								<td> : </td>
								<td><?php echo $row->kd_jurusan; ?> - <?php echo $row->singkat; ?></td>
							</tr>
							<tr>
								<th>Jurusan</th>
								<td> : </td>
								<td><?php echo $row->jenjang; ?> - <?php echo $row->jurusan; ?></td>
							</tr>
						<?php endforeach; ?>
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
							<h1>Tabel Kurikulum</h1>
							<div class="sparkline8-outline-icon">

								<span title="Tambah Data Matkul"><a class="btn-sm btn-primary" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl"><i class="fa fa-plus"></i></a>
								</span>
								<span title="Kembali"><a class="btn-sm btn-warning" class="Primary mg-b-10" href="<?php echo base_url('admin/Matakuliah/'); ?>"><i class="fa fa-backward"></i></a>
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
										<th data-field="kode_matkul">Kode Matkul</th>
										<th data-field="matakuliah">Matakuliah</th>
										<th data-field="sks">SKS</th>
										<th data-field="semester">Semester</th>
										<th data-field="mk_pilihan">MK Pilihan</th>
										<th>Update</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									foreach ($matkul as $row) : ?>
										<tr>
											<td><?php echo $i++; ?></td>
											<td><?php echo $row->kd_mk; ?></td>
											<td><?php echo $row->matakuliah; ?></td>
											<td><?php echo $row->sks; ?></td>
											<td><?php echo $row->smt; ?> - (<?php echo $row->semester; ?>)</td>
											<td>	<?php if ($row->mk_pilihan == '0') {
													echo "<span class='label label-danger'>
                                                            <i class='ace-icon fa fa-exclamation-triangle bigger-120'></i>
                                                            Tidak
                                                     </span>";
												}elseif ($row->mk_pilihan == '1'){
													echo "<span class='label label-success'>
                                                        <i class='ace-icon fa fa-check bigger-120'></i>
                                                                            Matkul Pilihan 
                                                     </span>";
												} ?>
											<td>
												<a class="btn-sm btn-primary" href="<?php echo base_url('admin/Matakuliah/update/' . $row->kd_mk); ?>"><i class="fa fa-edit"></i></a>
												<?php $btn = $this->db->get('set_krs')->row_array();
												if ($btn['hide_btn_del'] == 0) {
												} else { ?>
													<a class="btn-sm btn-danger" href="<?php echo base_url('admin/Matakuliah/delete/' . $row->kd_mk); ?>" onclick="return confirm('Yakin akan dihapus?')"><i class="fa fa-trash"></i></a>
											</td>
										<?php } ?>
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
				<h4 class="modal-title">Form Tambah Matakuliah</h4>
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
				</div>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="all-form-element-inner">

							<?php foreach ($detil as $row) { ?>
								<form action="<?php echo base_url('admin/Matakuliah/insertMatkul/' . $row->kd_jurusan); ?>" method="post">
								<?php } ?>
								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Kode Matkul</label>
										</div>
										<div class="col-lg-8">
											<input type="text" class="form-control" name="kd_mk" placeholder="Kode Matkul" required="">
										</div>
									</div>
								</div>

								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Jurusan</label>
										</div>
										<div class="col-lg-8">
											<select name="jurusan" id="jurusan" class="form-control">
												<option> --Pilih Jurusan-- </option>
												<?php
												$jurusan = $this->MatkulModel->getJurusan()->result();
												foreach ($jurusan as $row) : ?>
													<option value="<?php echo $row->kd_jurusan; ?>"><?php echo $row->jurusan; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>

								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Matakuliah</label>
										</div>
										<div class="col-lg-8">
											<input type="text" class="form-control" name="matakuliah" placeholder="Input Matakuliah" required="">
										</div>
									</div>
								</div>

								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">SKS</label>
										</div>
										<div class="col-lg-8">
											<input type="number" class="form-control" name="sks" placeholder="Input SKS" required="">
										</div>
									</div>
								</div>

								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Semester</label>
										</div>
										<div class="col-lg-8">
											<select name="smt" class="form-control">
												<option> --Pilih Semester-- </option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												<option value="6">6</option>
												<option value="7">7</option>
												<option value="8">8</option>
												<option value="9">9</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">MK Pilihan</label>
										</div>
										<div class="col-lg-8">
											 <label><input type="radio" name="mk_pilihan" value="1"> Ya</label> ||
            						         <label><input type="radio" name="mk_pilihan" value="0"> Tidak</label> ||
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
