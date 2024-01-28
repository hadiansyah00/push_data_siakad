<!-- Data table area Start-->
<div class="admin-dashone-data-table-area">
	<div class="container-fluid">

		<?php echo $this->session->flashdata('pesan'); ?>
		<div class="row">
			<div class="col-lg-12">
				<div class="sparkline8-hd">
						<div class="main-sparkline8-hd">
							<h1>Tabel Jadwal</h1>
							<div class="sparkline8-outline-icon">
								<span title="Tambah Data Jadwal"><a class="btn-sm btn-primary" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl"><i class="fa fa-plus"></i></a>
								</span>
								<span title="Hide Table" class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
								<span title="Close Table" class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
							</div>
						</div>
					</div>
				<div class="sparkline8-graph">
					<div class="datatable-dashv2-list custom-datatable-overright">
						<table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-toolbar="#toolbar">
							<thead>
								<tr>
									<th class="text-center" data-field="no">No</th>
	                                <th class="text-center" data-field="smt">SMT</th>
	                                <th class="text-center" data-field="tampil">Tampil</th>
									<th class="text-center" data-field="jurusan">Prog. Studi</th>
									<th class="text-center" data-field="nama_berkas">Download</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1;
								foreach ($pdf as $row) { ?>
									<tr>
										<td class="text-center"><?php echo $i++; ?></td>
											<td class="text-center"><?php echo $row->smt; ?></td>
											<td>
											    <embed src="<?php echo base_url('./assets/images/uploads/' . $row->nama_berkas); ?>" width="400" height="300" type="application/pdf">
											    
											</td>
										<td class="text-center"><?php echo $row->jenjang ?> <strong><?php echo $row->jurusan ?></strong> </td>
										<td> <a href="<?php echo base_url('admin/UploadJadwal/download_file/' . $row->id_jadwal_pdf); ?>">Download</a></td>
										<td><a class="btn-sm btn-danger" href="<?php echo base_url('admin/UploadJadwal/deleteJadwal/' . $row->id_jadwal_pdf); ?>" onclick="return confirm('Yakin Akan Di Hapus??');"><i class="fa fa-trash"></i></a></td>
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
<div id="PrimaryModalhdbgcl" class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade bounceInDown animated in" role="dialog" style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header header-color-modal bg-color-1">
				<h4 class="modal-title">Form Tambah Jadwal</h4>
				<div class="modal-close-area modal-close-df">
					<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
				</div>
			</div>
				<div class="modal-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="all-form-element-inner">
						<form enctype="multipart/form-data" action="<?php echo base_url('admin/UploadJadwal/do_upload'); ?>" method="post">
							</br>
				        <div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Dosen</label>
										</div>
										<div class="col-lg-8">
											<select name="kd_jurusan" class="form-control">
												<option> --Pilih Jurusan-- </option>
												<?php
												$dosen = $this->MatkulModel->getJurusan()->result();
												foreach ($dosen as $ds) : ?>
													<option value="<?php echo $ds->kd_jurusan; ?>"><?php echo $ds->jurusan; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>
								
						<div class="form-group-inner">
							<div class="row">
								<div class="col-lg-4">
									<label class="login2 pull-left pull-left-pro">Semester</label>
								</div>
								<div class="col-lg-8">
									<!-- <input type="select" class="form-control" name="smt"> -->
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
									</select>
								</div>
							</div>
						</div>

						<br>

						<div class="form-group-inner">
							<div class="row">
								<div class="col-lg-4">
									<label class="login2 pull-left pull-left-pro">Judul (Matakuliah)</label>
								</div>
								<div class="col-lg-8">
									<input type="text" class="form-control" name="keterangan_berkas">
								</div>
							</div>
						</div>
						<br>
						<div class=" form-group-inner">
							<div class="row">
								<div class="col-lg-4">
									<label class="login2 pull-left pull-left-pro">Uplod<span><strong>File Wajib PDF</strong></span></label>
								</div>
								<div class="col-lg-6">
									<input type="file" class="form-control" name="pdf_file" accept=".pdf">
							
							</div>
							</div>
							<br>
							<div class="container">
								<div class="row">
									<div class="col-lg-2">
										<label class="login2 pull-left pull-left-pro"></label>
									</div>
									<div class="col-lg-2">
										<button class="btn btn-warning"><i class="fa fa-save"></i> Simpan</button>
									</div>
								</div>
							</div>
						</div>
					</form>
		</div>
	</div>
</div>

