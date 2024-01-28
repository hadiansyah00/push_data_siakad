<!-- Data table area Start-->
<div class="admin-dashone-data-table-area">
    <div class="container-fluid">

        <?php echo $this->session->flashdata('pesan'); ?>

        <div class="col-lg-12">
            <div class="sparkline8-list shadow-reset">
                <div class="sparkline8-hd">
                    <div class="main-sparkline8-hd">
                        <h1>Tambah Matakuliah Berdasarkan Program Study</h1>
                        <div class="sparkline8-outline-icon">
                            <span title="Refresh"><a href="<?php echo base_url('admin/Kurikulum'); ?>"
                                    class="btn-sm btn-warning"><i class="fa fa-refresh"></i></a>
                            </span>
                            <span title="Hide Table" class="sparkline8-collapse-link"><i
                                    class="fa fa-chevron-up"></i></span>
                            <span title="Close Table" class="sparkline8-collapse-close"><i
                                    class="fa fa-times"></i></span>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                    value="<?= $this->security->get_csrf_hash(); ?>">
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
                                    <th data-field="jurusan">Jurusan</th>
                                    <th data-field="singkatan">Singkatan</th>
                                    <th data-field="jenjang">Jenjang</th>
                                    <th data-field="jadwal">Kurikulum</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
									foreach ($jurusan as $row) : ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row->kd_jurusan; ?></td>
                                    <td><?php echo $row->jurusan; ?></td>
                                    <td><?php echo $row->singkat; ?></td>
                                    <td><?php echo $row->jenjang; ?></td>
                                    <td>
                                        <a class="btn-sm btn-primary"
                                            href="<?php echo base_url('admin/Kurikulum/index_kurikulum/' . $row->kd_jurusan . '/'); ?>"><i
                                                class="fa fa-calendar"></i></a>
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
