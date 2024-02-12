<!-- setting krs-->
<div class="admin-dashone-data-table-area">
    <div class="container-fluid">
        <?php echo $this->session->flashdata('pesan'); ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline8-list shadow-reset">
                    <div class="sparkline8-hd">
                        <div class="main-sparkline8-hd">
                            <h1>Setting KRS</h1>
                            <div class="sparkline8-outline-icon">
                                <span title="Refresh"><a href="<?php echo base_url('admin/settings'); ?>"
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
                            <table id="table" data-toggle="table">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th data-field="ta">Tahun Akademik</th>
                                        <th data-field="semester">Semester</th>
                                        <th data-field="status">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php if ($status['status'] == 0) {
												echo "<span class='label label-danger'>
                                                            <i class='ace-icon fa fa-close bigger-120'></i> Tidak-Aktif
                                                     </span>";
											} else {
												echo "<span class='label label-success'>
                                                        <i class='ace-icon fa fa-check bigger-150'></i> Aktif
                                                     </span>";
											} ?>
                                        </td>
                                        <td>Kartu Rencana Studi (KRS) - <?php echo $tahun['ta']; ?></td>
                                        <td><?php echo $tahun['semester']; ?></td>
                                        <td>
                                            <?php if ($status['status'] == 0) { ?>
                                            <a href="<?php echo base_url('admin/settings/setKrs/' . $status['id_setkrs']); ?>"
                                                class='btn-success btn-sm'>
                                                <i class='ace-icon fa fa-check bigger-120'></i>
                                                Aktifkan
                                            </a>
                                            <?php } else {  ?>
                                            <a href='<?php echo base_url('admin/settings/setKrsN/' . $status['id_setkrs']); ?>'
                                                class='btn-warning btn-sm'>
                                                <i class='ace-icon fa fa-exclamation-triangle bigger-120'></i>
                                                Tidak-Aktif
                                            </a>
                                            <?php } ?>
                                        </td>
                                    </tr>
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
<!-- Setting tahun akademik-->
<div class="admin-dashone-data-table-area">
    <div class="container-fluid">

        <?php echo $this->session->flashdata('pesan1'); ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline8-list shadow-reset">
                    <div class="sparkline8-hd">
                        <div class="main-sparkline8-hd">
                            <h1>Setting Tahun Akademik</h1>
                            <div class="sparkline8-outline-icon">
                                <span title="Tambah Data Tahun Akademik"><a class="btn-sm btn-primary"
                                        class="Primary mg-b-10" href="#" data-toggle="modal"
                                        data-target="#PrimaryModalhdbgcl"><i class="fa fa-plus"></i></a>
                                </span>
                                <span title="Refresh"><a href="<?php echo base_url('admin/settings'); ?>"
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
                                        <th data-field="status">Status</th>
                                        <th data-field="ta">Tahun Akademik</th>
                                        <th data-field="semester">Semester</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									foreach ($ta as $row) : ?>
                                    <tr>
                                        <td>
                                            <?php if ($row->status == 0) {
													echo "<span class='label label-default'>
                                                            <i class='ace-icon fa fa-exclamation-triangle bigger-120'></i>
                                                            Tidak-Aktif
                                                     </span>";
												} else {
													echo "<span class='label label-success'>
                                                        <i class='ace-icon fa fa-check bigger-120'></i>
                                                                            Aktif
                                                     </span>";
												} ?>
                                        </td>
                                        <td><?php echo $row->ta; ?></td>
                                        <td><?php echo $row->semester; ?></td>
                                        <td>
                                            <?php if ($row->status == 0) { ?>
                                            <a class="btn-sm btn-success"
                                                href="<?php echo base_url('admin/settings/setTa/' . $row->id_ta); ?>"><i
                                                    class="fa fa-check"></i> Aktifkan</a>
                                            <?php if ($status['hide_btn_del'] == 0) {
													} else { ?>
                                            <a class="btn-sm btn-danger"
                                                href="<?php echo base_url('admin/settings/delete/' . $row->id_ta); ?>"
                                                onclick="return confirm('Yakin Akan Di Hapus??');"><i
                                                    class="fa fa-trash"></i></a>
                                            <?php } ?>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">

                                    <div class="sparkline8-outline-icon">
                                        <span>Total Tahun Akademik :
                                        </span><?php echo $this->db->get('ta')->num_rows(); ?>
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

<!-- hide/unhide button delete-->
<div class="admin-dashone-data-table-area">
    <div class="container-fluid">

        <?php echo $this->session->flashdata('pesan2'); ?>

        <div class="row">
            <div class="col-lg-6">
                <div class="sparkline8-list shadow-reset">
                    <div class="sparkline8-hd">
                        <div class="main-sparkline8-hd">
                            <h1>Hide/Undide Button Delete</h1>
                            <div class="sparkline8-outline-icon">
                                <span title="Refresh"><a href="<?php echo base_url('admin/settings'); ?>"
                                        class="btn-sm btn-warning"><i class="fa fa-refresh"></i></a>
                                </span>
                                <span title="Hide Button" class="sparkline8-collapse-link"><i
                                        class="fa fa-chevron-up"></i></span>
                                <span title="Close Table" class="sparkline8-collapse-close"><i
                                        class="fa fa-times"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="sparkline8-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <table id="table" data-toggle="table">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th data-field="status">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php if ($status['hide_btn_del'] == 0) {
												echo "<span class='label label-danger'>
                                                            <i class='ace-icon fa fa-close bigger-120'></i> Tidak-Aktif
                                                     </span>";
											} else {
												echo "<span class='label label-success'>
                                                        <i class='ace-icon fa fa-check bigger-150'></i> Aktif
                                                     </span>";
											} ?>
                                        </td>
                                        <td>
                                            <?php if ($status['hide_btn_del'] == 0) { ?>
                                            <a href="<?php echo base_url('admin/settings/setUnhide/' . $status['id_setkrs']); ?>"
                                                class='btn-success btn-sm'>
                                                <i class='ace-icon fa fa-check bigger-120'></i>
                                                Aktifkan
                                            </a>
                                            <?php } else {  ?>
                                            <a href='<?php echo base_url('admin/settings/setHide/' . $status['id_setkrs']); ?>'
                                                class='btn-warning btn-sm'>
                                                <i class='ace-icon fa fa-exclamation-triangle bigger-120'></i>
                                                Tidak-Aktif
                                            </a>
                                            <?php } ?>
                                        </td>
                                    </tr>
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










<!-- Modal form tambah tahun akademik -->
<div id="PrimaryModalhdbgcl"
    class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade bounceInDown animated in" role="dialog"
    style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Form Tambah Tahun Akademik</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="all-form-element-inner">
                            <form action="<?php echo base_url(); ?>admin/settings/insert" method="post">
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="login2 pull-left pull-left-pro">Tahun Akademik</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="ta" placeholder="2030/2031"
                                                required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="login2 pull-left pull-left-pro">Semester</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <select name="semester" class="form-control">
                                                <option> --Pilih Semester-- </option>
                                                <option value="Ganjil"> Ganjil </option>
                                                <option value="Genap"> Genap </option>
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
