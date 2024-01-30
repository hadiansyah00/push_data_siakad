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
						<tr>
							<th>Tahun Akademik</th>
							<td> : </td>
							<td><?php echo $tahun['ta']; ?> / <?php echo $tahun['semester']; ?></td>
						</tr>
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
							<h1>Tabel Jadwal UTS (Ujian Tengah Semester) </h1>
							<div class="sparkline8-outline-icon">
								<span title="Tambah Data Jadwal"><a class="btn-sm btn-primary" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl"><i class="fa fa-plus"></i></a>
								</span>
								<span title="Refresh"><a href="<?php echo base_url('admin/Jadwaluts'); ?>" class="btn-sm btn-warning"><i class="fa fa-backward"></i></a>
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
										<th data-field="kode matakuliah">Kode MK</th>
									    <th data-field="kelas">Kelas</th>
										<th data-field="matakuliah">Matakuliah</th>
										<th data-field="semester">Semester</th>
										<th data-field="sks">SKS</th>
										<!-- <th data-field="dosen">Dosen</th> -->
										<th data-field="tgl_uts">Tanggal UTS</th>
										<th data-filed="ruang_uts"> Ruangan UTS</th>
										<?php $btn = $this->db->get('set_krs')->row_array();
										if ($btn['hide_btn_del'] == 0) {
										} else { ?>
											<th>Aksi</th>
										<?php } ?>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									foreach ($jadwal as $row) { ?>
										<?php if ($row->semester == $tahun['semester']) { ?>
											<?php if ($row->status == $tahun['status']) { ?>
											<tr>
												<td><?php echo $i++; ?></td>
												<td><?php echo $row->kd_mk; ?></td>
												<td><?php	
												    if ($row->kelas == 2) {
											            echo $tes = 'Karyawan';
                										} elseif  ($row->kelas == 1) {
                										echo $tes  = 'reguler';
                										}
                										elseif ($row->kelas = 0){
                										    echo $tes= 'Pagi';
                										}
                										?></td>
												<td><?php echo $row->matakuliah; ?></td>
												<td><?php echo $row->smt; ?></td>
												<td><?php echo $row->sks; ?></td>
												<td>
												<?php echo format_indo($row->tgl_uts); ?>
												<?php echo $row->jam; ?><hr>
												</td>
												<td><?php echo $row->ruang_uts; ?> </td>
												<?php $btn = $this->db->get('set_krs')->row_array();
												if ($btn['hide_btn_del'] == 0) {
												} else { ?>
													<td>
													    <div class="hidden-sm hidden-xs action-buttons">
														<a class="btn-sm btn-primary" href="<?php echo base_url('admin/Jadwaluts/update/' . $row->id_jadwal); ?>">
													    <i class="ace-icon fa fa-pencil">  </i>
														</a>
														<a class="btn-sm btn-danger" href="<?php echo base_url('admin/Jadwaluts/delete/' . $row->id_jadwal); ?>" onclick="return confirm('Yakin Akan Di Hapus??');"><i class="fa fa-trash"></i></a>
													</td>
												<?php } ?>
											</tr>
										<?php } ?>
									<?php } ?>
								<?php } ?>
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
				<h4 class="modal-title">Form Tambah Jadwal Uts SBH</h4>
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
				</div>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="all-form-element-inner">

							<?php foreach ($detil as $row) { ?>
								<form action="<?php echo base_url('admin/Jadwaluts/insert/' . $row->kd_jurusan . '/'); ?>" method="post">
								<?php } ?>

								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Matakuliah</label>
										</div>
										<div class="col-lg-8">
											<select name="matkul" id="matkul" class="form-control">
												<option> --Pilih Matakuliah-- </option>
												<?php
												foreach ($matkul as $row) { ?>
													<?php if ($row->semester == $tahun['semester']) { ?>
														<option value="<?php echo $row->kd_mk; ?>">SMT <?php echo $row->smt; ?> - <?php echo $row->kd_mk; ?> - <?php echo $row->matakuliah ?> - SKS <?php echo $row->sks; ?></option>
													<?php } ?>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>


								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Jam UTS</label>
										</div>
										<div class="col-lg-8">

											<input type="text" name="jam" class="form-control" placeholder="Masukan Jam" required="">

										</div>
									</div>
								</div>

								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Tanggal UTS</label>
										</div>
										<div class="col-lg-8">
											<input type="date" name="tgl_uts" class="form-control" required="">
										</div>
									</div>

								</div>
								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Ruangan UTS</label>
										</div>
										<div class="col-lg-8">
											<select name="ruang_uts" class="form-control">
											<option> --Ruangan-- </option>
												<option value="1.1">1.1</option>
												<option value="1.2">1.2</option>
												<option value="1.3">1.3</option>
												<option value="1.4 ">1.4</option>
												<!--<option value="1.5 ">1.5</option>-->
												<option value="2.6">2.6</option>
												<option value="1.1 & 1.2">1.1 & 1.2</option>
												<option value="1.1 & 1.4">1.1 & 1.4</option>
												<option value="2.2"> 2.2</option>
												<option value="Caregiver">Caregiver</option>
												<option value="Daring"> Daring</option>
											</select>
										</div>
									</div>
								</div>
                            <div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Kelas </label>
										</div>
										<div class="col-lg-8">
											<select name="kelas" class="form-control">
											<option> --Ruangan-- </option>
												<option value="1">Pagi</option>
												<option value="2">Karyawan</option>
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
			</form>
		</div>
	</div>
</div>
