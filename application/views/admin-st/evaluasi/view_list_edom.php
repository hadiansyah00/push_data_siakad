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
                        <tr>
                            <th>Semester</th>
                            <td> : </td>
                            <td><?php echo $tahun['semester']; ?></td>
                        </tr>

                        <tr>
                            <th>Jurusan</th>
                            <td> : </td>
                            <td><?php echo $detil['jenjang']; ?> - <?php echo $detil['jurusan']; ?></td>
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
                            <h1>Daftar Matakuliah</h1>
                            <div class="sparkline8-outline-icon">
                                <span title="Refresh"><a href="<?php echo base_url('admin/Nilai'); ?>"
                                        class="btn-sm btn-warning"><i class="fa fa-backward"></i></a>
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
                                        <th data-field="kode">Kode</th>
                                        <th data-field="matkul">Matakuliah</th>
                                        <th data-field="semester">Semester</th>
                                        <th data-field="sks">SKS</th>
                                        <th data-field="">Nama Pengajar</th>




                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
									foreach ($krs_get as $row) : ?>
                                    <?php if ($row->semester == $tahun['semester']) { ?>
                                    <?php if ($row->status == $tahun['status']) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row->kd_mk; ?></td>
                                        <td><?php echo $row->max_matakuliah; ?></td>
                                        <td><?php echo $row->max_smt; ?></td>
                                        <td><?php echo $row->max_sks; ?></td>

                                        <?php
												$pengajar_1 = $this->KurikulumModel->getIdDosenById($row->max_peran);
												$pengajar_2 = $this->KurikulumModel->getIdDosenById_peran($row->max_perdos);

											
                                        
												$link_kuesioner = site_url('admin/KusionerEdom/lihat/' . $row->kd_mk . '/' . $pengajar_2);
												$link_kuesioner_2 = site_url('admin/KusionerEdom/lihat/' . $row->kd_mk . '/' . $pengajar_1);
												$link_cetak_1 =site_url('admin/kusioneredom/cetak/' . $row->kd_mk . '/' . $pengajar_2);
												$link_cetak_2 =site_url('admin/kusioneredom/cetak/' . $row->kd_mk . '/' . $pengajar_1);
												
                                        ?>
                                        <td>
                                            <?php
										 // Di sini kita dapat menambahkan kode untuk mengambil nama dosen berdasarkan $row->id_perdos
											$dosen = $this->KurikulumModel->getDosenNameById_peran($row->max_perdos);
											echo $dosen;
											?>
                                            <br>
                                            <a title="Detil" class="btn btn-sm btn-primary "
                                                href="<?php echo $link_kuesioner; ?>"><i class="fa fa-eye"></i></a>
                                            <a title="Cetak" class="btn btn-sm btn-primary "
                                                href="<?php echo $link_cetak_1; ?>"><i class="fa fa-print"></i></a>
                                            <hr>
                                            <?php 
											// Di sini kita dapat menambahkan kode untuk mengambil nama dosen berdasarkan $row->id_peran
											$dosen1 = $this->KurikulumModel->getDosenNameById($row->max_peran);
											echo $dosen1;
											?>
                                            <br>
                                            <a title="Detil" class="btn btn-sm btn-primary"
                                                href="<?php echo $link_kuesioner_2; ?>"><i class="fa fa-eye"></i> </a>
                                            <a title="Cetak" class="btn btn-sm btn-primary "
                                                href="<?php echo $link_cetak_2; ?>"><i class="fa fa-print"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php } ?>
                                    <?php endforeach; ?>`
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
