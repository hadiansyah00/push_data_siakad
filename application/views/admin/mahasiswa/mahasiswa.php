<!-- Data table area Start-->

<div class="admin-dashone-data-table-area">
    <div class="container-fluid">

        <?php echo $this->session->flashdata('pesan'); ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline8-list shadow-reset">
                    <div class="sparkline8-hd">
                        <div class="main-sparkline8-hd">
                            <h1>Data Mahasiswa</h1>
                            <div class="sparkline8-outline-icon">
                                <span title="Tambah Data Mahasiswa"><a class="btn-sm btn-primary"
                                        class="Primary mg-b-10" href="#" data-toggle="modal"
                                        data-target="#PrimaryModalhdbgcl"><i class="fa fa-plus"></i></a>
                                </span>
                                <span title="Refresh"><a href="<?php echo base_url('admin/Mahasiswa'); ?>"
                                        class="btn-sm btn-warning"><i class="fa fa-refresh"></i></a>
                                </span>
                                <span title="Hide Table" class="sparkline8-collapse-link"><i
                                        class="fa fa-chevron-up"></i></span>
                                <span title="Close Table" class="sparkline8-collapse-close"><i
                                        class="fa fa-times"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="sparkline8-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true"
                                data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true"
                                data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="no">No</th>
                                        <th data-field="nim">Nim</th>
                                        <th data-field="nama_mhs">Nama</th>
                                        <th data-field="nisn">NISN</th>
                                        <th data-field="jurusan">Prog. Studi</th>
                                        <th data-field="kelas">Kelas</th>
                                        <th data-field="status">Status</th>
                                        <th data-field="tahun_masuk">Tahun Masuk</th>
                                        <th data-field="nama_dosen">Dospem</th>

                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
									foreach ($mahasiswa as $row) { ?>

                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row->nim; ?></td>
                                        <td><?php echo $row->nama_mhs; ?></td>
                                        <td><?php echo $row->nisn;?></td>
                                        <td><?php echo $row->jenjang; ?> <?php echo $row->jurusan; ?></td>
                                        <td><?php echo $row->kelas; ?></td>
                                        <td> <a class="link"
                                                href="<?php echo base_url('admin/Mahasiswa/upStatus/' . $row->id_mahasiswa); ?>">
                                                <?php if ($row->status_mhs == 'tidak') {
													echo "<span class='label label-danger'>
                                                            <i class='ace-icon fa fa-exclamation-triangle bigger-120'></i>
                                                            Non Aktif
                                                     </span>";
												}elseif ($row->status_mhs == 'aktif'){
													echo "<span class='label label-success'>
                                                        <i class='ace-icon fa fa-check bigger-120'></i>
                                                                            Aktif 
                                                     </span>";
												}elseif ($row->status_mhs == 'cuti'){
													echo "<span class='label label-default'>
                                                            <i class='ace-icon fa fa-exclamation-triangle bigger-120'></i>
                                                                            Cuti 
                                                     </span>";
												}elseif ($row->status_mhs == 'lulus'){
													echo "<span class='label label-info'>
                                                        <i class='ace-icon fa fa-check bigger-120'></i>
                                                                            Lulus 
                                                     </span>";
												} ?></a></a>


                                        </td>
                                        <td><?php echo $row->tahun_masuk; ?></td>
                                        <td> <a class="btn-sm btn-primary"
                                                href="<?php echo base_url('admin/Mahasiswa/updateDospem/' . $row->id_mahasiswa); ?>"><i
                                                    class="fa fa-edit"> &nbsp; </i><?php echo $row->nama_dosen; ?></a>
                                        </td>

                                        <td>
                                            <a title="Detil Mahasiswa" class="btn-sm btn-success"
                                                href="<?php echo base_url('admin/Mahasiswa/view_mhs/' . $row->id_mahasiswa); ?>"><i
                                                    class="fa fa-eye"></i></a>

                                            <a title="Update Mahasiswa" class="btn-sm btn-warning"
                                                href="<?php echo base_url('admin/Mahasiswa/updatePass/' . $row->id_mahasiswa); ?>"><i
                                                    class="fa fa-edit"></i></a>
                                            <?php $btn = $this->db->get('set_krs')->row_array();
												if ($btn['hide_btn_del'] == 0) {
												} else { ?>
                                            <a title="Hapus Data" class="btn-sm btn-danger"
                                                href="<?php echo base_url('admin/Mahasiswa/delete/' . $row->id_mahasiswa); ?>"
                                                onclick="return confirm('Yakin Akan Di Hapus??');"><i
                                                    class="fa fa-trash"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>


                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">

                                    <div class="sparkline8-outline-icon">
                                        <span>Total Mahasiswa :
                                        </span><?php echo $this->db->get('mahasiswa')->num_rows(); ?>
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










<div id="PrimaryModalhdbgcl"
    class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade bounceInDown animated in" role="dialog"
    style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Form Tambah Mahasiswa</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="all-form-element-inner">


                            <form action="<?php echo base_url('admin/Mahasiswa/insert'); ?>" method="post">

                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="login2 pull-left pull-left-pro">NIM</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="number" class="form-control" name="nim" placeholder="Input NIM"
                                                required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="login2 pull-left pull-left-pro">Nama Depan</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="nama_mhs"
                                                placeholder="Input Nama" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="login2 pull-left pull-left-pro">Tahun Masuk</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="number" class="form-control" name="tahun_masuk"
                                                placeholder="Tahun Masuk" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="login2 pull-left pull-left-pro">Kelas</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <select name="kelas" class="form-control">
                                                <option></option>
                                                <option value="Pagi"> Pagi </option>
                                                <option value="Karyawan"> Karyawan </option>

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="form-group-inner">
									<div class="row">
										<div class="col-lg-4">
											<label class="login2 pull-left pull-left-pro">Kelas</label>
										</div>
										<div class="col-lg-8">
											<input type="select" class="form-control" name="kelas" placeholder="Kelas" required="">
											<option value="">Pagi</option>
											<option value="">Reguler</option>
										</div>
									</div>
								</div> -->

                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="login2 pull-left pull-left-pro">Jurusan</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <select name="jurusan" class="form-control">
                                                <option> -- Jurusan -- </option>
                                                <?php
												$mahasiswa = $this->JurusanModel->getData('jurusan')->result();
												foreach ($mahasiswa as $mhs) : ?>
                                                <option value="<?php echo $mhs->kd_jurusan; ?>">
                                                    <?php echo $mhs->jurusan; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="login2 pull-left pull-left-pro">Dosen</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <select name="nama_dosen" class="form-control">
                                                <option> -- Dospem -- </option>
                                                <?php
												$mahasiswa = $this->DosenModel->getData('dosen')->result();
												foreach ($mahasiswa as $mhs) : ?>
                                                <option value="<?php echo $mhs->id_dosen; ?>">
                                                    <?php echo $mhs->nama_dosen; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="login2 pull-left pull-left-pro">Password</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="password" class="form-control" name="password"
                                                placeholder="Input Password" required="">
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