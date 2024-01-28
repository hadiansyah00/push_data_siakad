<!-- Data table area Start-->
<div class="admin-dashone-data-table-area">
	<div class="container-fluid">

		<?php echo $this->session->flashdata('pesan'); ?>
		<div class="row">
			<div class="col-lg-12">
				<div class="sparkline8-outline-icon">

					<span title="Tambah Data"><a href="<?php echo base_url('dosen/uploadfile/create'); ?>" class="btn-sm btn-success"><i class=" fa fa-plus"></i> Tambah Data</a>
					</span>


				</div>
				<div class="sparkline8-graph">
					<div class="datatable-dashv2-list custom-datatable-overright">
						<table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-toolbar="#toolbar">
							<thead>
								<tr>
									<th class="text-center" data-field="no">No</th>
									<th data-field="nama_dosen">Dosen Pengampuh</th>
									<th  data-field="keterangan">Matakuliah</th>
									<th class="text-center" data-field="jurusan">Prog. Studi</th>
									<th class="text-center" data-field="nama_berkas">Download</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1;
								foreach ($rps as $row) { ?>
									<tr>
										<td class="text-center"><?php echo $i++; ?></td>
										<td class="text-center"><?php echo $row->nama_dosen; ?></td>
										<td class="text-center"><?php echo $row->keterangan_berkas; ?> - Semester - <?php echo $row->smt ?></td>
										<!-- <td> <//?//php echo $row->matakuliah; ?> - SMT- <//?php// echo $row->smt ?></td> -->
										<td class="text-center"><?php echo $row->jenjang ?> - <?php echo $row->jurusan ?></td>
										<td> <a href="<?php echo base_url('dosen/Uploadfile/download/' . $row->kd_berkas); ?>">Download</a></td>
										<td><a class="btn-sm btn-danger" href="<?php echo base_url('dosen/Uploadfile/deleteRps/' . $row->kd_berkas); ?>" onclick="return confirm('Yakin Akan Di Hapus??');"><i class="fa fa-trash"></i></a></td>
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

<!-- 



<div id="PrimaryModalhdbgcl" class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade bounceInDown animated in" role="dialog" style="display: none;">

	<div class="modal-dialog">
		<div class="modal-content">



			<div class="modal-header header-color-modal bg-color-1">
				<h4 class="modal-title">Form Tambah RPS</h4>
				<div class="modal-close-area modal-close">
					<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
				</div>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="all-form-element-inner">

							<form action="<?php echo base_url('dosen/Rps/TambahData');
											?>" method="post">
								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Nama Dosen</label>
										</div>
										<div class="col-lg-8">
											<input type="text" class="form-control" name="id_dosen" value="<?php echo $dsn['id_dosen'] ?>" readonly="disabled">
										</div>
									</div>
								</div>
								</br>
								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Prog. Studi</label>
										</div>
										<div class="col-lg-8">
											<input type="text" class="form-control" name="kd_jurusan" value="<?php echo $dsn['kd_jurusan'] ?>" readonly="disabled">
										</div>
									</div>
								</div>

								</br>

								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Matakuliah</label>
										</div>
										<div class="col-lg-8">
											<select name="matakuliah" class="form-control">
												<option> --Matakuliah-- </option>
												<?php
												$mk = $this->MatkulModel->getMatkul()->result();
												foreach ($mk as $ds) : ?>
													<option value="<?php echo $ds->kd_mk; ?>"><?php echo $ds->matakuliah; ?> - SMT <?php echo $ds->smt ?> </option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>

								</br>
								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Upload RPS <strong>PDF</strong></label>
										</div>
										<div class="col-lg-8">
											<input type="file" name="berkas" class="form-control">
										</div>
									</div>
								</div>

								</br>
								<div class="container">
									<div class="row">
										<div class="col-lg-8">
											<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->
