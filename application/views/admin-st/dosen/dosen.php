<!-- Data table area Start-->
<div class="admin-dashone-data-table-area">
	<div class="container-fluid">
		<?php echo $this->session->flashdata('pesan'); ?>
		<div class="row">
			<div class="col-lg-12">
				<div class="sparkline8-list shadow-reset">
					<div class="sparkline8-hd">
						<div class="main-sparkline8-hd">
							<h1>Data Dosen</h1>
							<div class="sparkline8-outline-icon">
								<span title="Tambah Data Dosen"><a class="btn-sm btn-primary" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl"><i class="fa fa-plus"></i></a>
								</span>
								<span title="Refresh"><a href="<?php echo base_url('admin/Dosen'); ?>" class="btn-sm btn-warning"><i class="fa fa-refresh"></i></a>
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
										<th data-field="nidn">NIDN</th>
										<th data-field="kd_dosen">Kode Dosen</th>
										<th data-field="nama">Nama</th>
										<th data-field="jk">JK</th>
										<!-- <th data-field="status">Status</th> -->
										<th data-field="status">Prog. Studi</th>
										<th data-field="no_telepon">No. Telepon</th>
										<th data-field="status_ds">Status</th>
										<th data-field="alamat">Alamat</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									foreach ($dosen as $row) : ?>

										<tr>
											<td><?php echo $i++; ?></td>
											<td><?php echo $row->nidn; ?></td>
											<td><?php echo $row->kd_dosen; ?></td>
											<td><?php echo $row->nama_dosen; ?></td>
											<td><?php echo $row->jenis_kelamin; ?></td>
											<td><?php echo $row->jurusan; ?></td>
											<!-- <td><?php echo $row->prodi; ?></td> -->
											<td><?php echo $row->hp_ds; ?></td>
											<td><?php echo $row->status_ds; ?></td>
											<td><?php echo $row->alamat_dosen; ?></td>
											<td>
												<a class="btn-sm btn-success" href="<?php echo base_url('admin/Dosen/view_dosen/' . $row->id_dosen); ?>"><i class="fa fa-eye"></i></a>
												<a class="btn-sm btn-primary" href="<?php echo base_url('admin/Dosen/update/' . $row->id_dosen); ?>"><i class="fa fa-edit"></i></a>
												<?php $btn = $this->db->get('set_krs')->row_array();
												if ($btn['hide_btn_del'] == 0) {
												} else { ?>
													<a class="btn-sm btn-danger" href="<?php echo base_url('admin/Dosen/delete/' . $row->id_dosen); ?>" onclick="return confirm('Yakin Akan Di Hapus??');"><i class="fa fa-trash"></i></a>
												<?php } ?>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
							<div class="sparkline8-hd">
								<div class="main-sparkline8-hd">
									<div class="sparkline8-outline-icon">
										<span>Total Dosen : </span><?php echo $this->db->get('dosen')->num_rows(); ?>
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
				<h4 class="modal-title">Form Tambah Dosen</h4>
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
				</div>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="all-form-element-inner">


							<form action="<?php echo base_url('admin/Dosen/insertDosen'); ?>" method="post">

								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">NIDN</label>
										</div>
										<div class="col-lg-8">
											<input type="text" class="form-control" name="nidn" required="">
										</div>
									</div>
								</div>
								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Kode Dosen</label>
										</div>
										<div class="col-lg-8">
											<input type="text" class="form-control" name="kd_dosen" required="">
										</div>
									</div>
								</div>

								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Nama</label>
										</div>
										<div class="col-lg-8">
											<input type="text" class="form-control" name="nama_dosen" placeholder="Input Nama" required="">
										</div>
									</div>
								</div>

								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Tempat Lahir</label>
										</div>
										<div class="col-lg-8">
											<input type="text" class="form-control" name="tempat" placeholder="Kota" required="">
										</div>
									</div>
								</div>

								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Tanggal Lahir</label>
										</div>
										<div class="col-lg-8">
											<input type="date" class="form-control" name="tgl" required="">
										</div>
									</div>
								</div>

								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Jenis Kelamin</label>
										</div>
										<div class="col-lg-8">
											<p></p>
											<label><input type="radio" name="jenis_kelamin" value="L"> Laki-Laki</label> ||
											<label><input type="radio" name="jenis_kelamin" value="P"> Perempuan</label>
										</div>
									</div>
								</div>

								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Alamat</label>
										</div>
										<div class="col-lg-8">
											<textarea name="alamat_dosen" class="form-control"></textarea>
										</div>
									</div>
								</div>

								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">No Telp</label>
										</div>
										<div class="col-lg-8">
											<input type="text" class="form-control" name="hp_ds" placeholder="085xxxxxx" required="">
										</div>
									</div>
								</div>

								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Email</label>
										</div>
										<div class="col-lg-8">
											<input type="email" class="form-control" name="email_ds" placeholder="example@gmail.com" required="">
										</div>
									</div>
								</div>

								<!-- <div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Jurusan</label>
										</div>
										<div class="col-lg-8">
											<select name="jurusan" id="jurusan" class="form-control">
												<option> --Pilih Jurusan-- </option>
												<?php
												$jurusan = $this->DosenModel->getJurusan()->result();
												foreach ($jurusan as $row) : ?>
													<option value="<?php echo $row->kd_jurusan; ?>"><?php echo $row->jurusan; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div> -->

								<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Prog. Study</label>
										</div>
										<div class="col-lg-8">
											<select name="jurusan" id="jurusan" class="form-control" required="">
												<option value="<?php echo $ds->jurusan; ?>"> </option>
												<option value="gabungan"> Gabungan </option>
												<?php
												$jurusan = $this->DosenModel->getJurusan()->result();
												foreach ($jurusan as $row) : ?>
													<option value="<?php echo $row->kd_jurusan; ?>"><?php echo $row->jurusan; ?></option>
												<?php endforeach;  ?>
											</select>
										</div>
									</div>
								</div>
									<div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Status</label>
										</div>
										<div class="col-lg-8">
											<p></p>
											<label><input type="radio" name="status_ds" value="Dosen Tetap"> Dosen Tetap</label> ||
											<label><input type="radio" name="status_ds)" value="Tidak Tetap"> Tidak Tetap</label>
										</div>
									</div>
								</div>

								<!-- <div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Prodi</label>
										</div>
										<div class="col-lg-8">
											<input type="text" class="form-control" name="prodi" placeholder="Program Studi" required="">
										</div>
									</div>
								</div>
								<div class="form-group-inner"> -->
								<div class="row">
									<div class="col-lg-4">
										<label class="login2 pull-left pull-left-pro">Password</label>
									</div>
									<div class="col-lg-8">
										<input type="password" class="form-control" name="password_ds" placeholder="Input Password" required="">
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
