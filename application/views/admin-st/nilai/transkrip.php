
<!-- Data table area Start-->
<div class="admin-dashone-data-table-area">
    <div class="container-fluid">

    	<?php echo $this->session->flashdata('pesan'); ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline8-list shadow-reset">
                    <div class="sparkline8-hd">
                        <div class="main-sparkline8-hd">
                            <h1>Transkrip Nilai Mahasiswa</h1>
                            <div class="sparkline8-outline-icon">
                                <span title="Refresh"><a href="<?php echo base_url('admin/nilai/transkrip'); ?>" class="btn-sm btn-warning" ><i class="fa fa-refresh"></i></a>
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
                                        <th data-field="nik">NIM</th>
                                        <th data-field="nama">Nama</th>
                                        <th data-field="jurusan">Jurusan</th>
                                        <th data-field="semester">Semester</th>
                                        <th data-field="tahun_masuk">Tahun Masuk</th>
                                        <th data-field="status_mhs">Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                               		<?php $i=1;
									foreach($mahasiswa as $row) { ?>
									<tr>
										<td><?php echo $i++; ?></td>
                                        <td><?php echo $row->nim; ?></td>
										<td><?php echo $row->nama_mhs.'  '.$row->nama_kepanjangan; ?></td>
										<td><?php echo $row->jurusan; ?></td>
										<td>Semester <?php echo $row->semester; ?></td>
										<td><?php echo $row->tahun_masuk; ?></td>
											<td><?php if ($row->status_mhs == 'tidak') {
													echo "<span class='label label-default'>
                                                            <i class='ace-icon fa fa-exclamation-triangle bigger-120'></i>
                                                            Tidak-Aktif
                                                     </span>";
												} elseif ($row->status_mhs == 'aktif'){
													echo "<span class='label label-success'>
                                                        <i class='ace-icon fa fa-check bigger-120'></i>
                                                                            Aktif 
                                                     </span>";
												} ?></td>
                                        <td>
                                        	<a title="Lihat Transkrip" class="btn-sm btn-primary" href="<?php echo base_url('admin/nilai/detil_transkrip/'.$row->id_mahasiswa); ?>"><i class="fa fa-list"></i></a>

                                            <a title="Print" class="btn-sm btn-warning" target="_blank" href="<?php echo base_url('admin/nilai/print/'.$row->id_mahasiswa); ?>"><i class="fa fa-print"></i></a>
                                        </td>
                                    </tr>
                               	 	<?php } ?>
                                </tbody>
                            </table>

                            <div class="sparkline8-hd">
		                        <div class="main-sparkline8-hd">
		                            
		                            <div class="sparkline8-outline-icon">
		                                <span>Total Mahasiswa : </span><?php echo $this->db->get('mahasiswa')->num_rows(); ?>
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


