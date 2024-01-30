<!-- Data table area Start-->
<link rel="stylesheet" href="https://gitcdn.link/repo/ghislainfourny/bootstrap-toggle/master/css/bootstrap-toggle.min.css">
<style>
	.edom-toggle {
		margin-top: 5px;
	}
	.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
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
							<h1>Tabel Evaluasi Link Soal Evaluasi Dosen</h1>
							<div class="sparkline8-outline-icon">
								<span title="Tambah Data Kurikulum"><a class="btn-sm btn-primary" class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl"><i class="fa fa-plus"></i></a>
								</span>
								<span title="Refresh"><a href="<?php echo base_url('admin/Kurikulum'); ?>" class="btn-sm btn-warning"><i class="fa fa-backward"></i></a>
								</span>
								<span title="Hide Table" class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
								<span title="Close Table" class="sparkline8-collapse-close"><i class="fa fa-times"></i></span>
							</div>
						</div>
					</div>
					<div class="sparkline8-graph">
						<div class="datatable-dashv1-list custom-datatable-overright">
						   <form method="post" action="<?php echo base_url('admin/evaluasi/input_edom/' . $evaluasi_dosen['id_eval']); ?>">
							<table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-toolbar="#toolbar">
								<thead>
									<tr>
									    <th data-field="no">No</th>
										<th data-field="nim">NIM</th>
										<th data-field="nama">Nama</th>
										<th data-field="aksi">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									foreach ($mahasiswa as $row) { ?>
									
										<tr>
											<td><?php echo $i++; ?></td>
											<td><?php echo $row->nim; ?></td>
											<td><?php echo $row->nama_mhs . ' ' . $row->nama_kepanjangan; ?></td>
										<td>
									
														<input type="hidden" name="id_mahasiswa[]" value="<?php echo $row->id_mahasiswa; ?>">
												
														<input style="width: 40px;" type="text" name="status_edom[]" onkeydown="upperCaseF(this)"  maxlength="2"  value="<?php echo $row->status_edom; ?>">
													
										</td>
											<td>
								
			
													
									
												
												</td>
											</tr>
									<?php } ?>
								</tbody>
							   </table>
							   	<button style="width: 300px;" type="submit" class="btn btn-primary" \ >Simpan</button>
							</form>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('input[type="checkbox"]').change(function() {
            var mahasiswaId = $(this).data('mahasiswa-id');
            var statusEdom = $(this).prop('checked') ? 1 : 0;

            // Kirim permintaan AJAX ke server untuk memperbarui data
            $.ajax({
                url: '<?php echo site_url("admin/evaluasi/updateStatusEdom"); ?>',
                method: 'POST',
                data: {
                    id: mahasiswaId,
                    status_edom: statusEdom
                },
                success: function(response) {
                    // Tanggapan sukses, lakukan sesuatu jika perlu
                },
                error: function(xhr, status, error) {
                    // Tanggapan gagal, lakukan penanganan kesalahan jika perlu
                }
            });
        });
    });
</script>

