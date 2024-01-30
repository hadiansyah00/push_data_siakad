<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin-st/dist/header');
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/datatables/datatables.min.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>assets-new-look/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>assets-new-look/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Dosen</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
                <div class="breadcrumb-item"><a href="#">Data Dosen</a></div>
                <!-- <div class="breadcrumb-item">DataTables</div> -->
            </div>
        </div>

        <div class="section-body">


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn-sm btn-primary" href="#" data-toggle="modal"
                                data-target="#PrimaryModalhdbgcl"><i class="fa fa-plus"></i>
                                Tambah Data</a>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th data-field="no">No</th>
                                            <th data-field="nidn">NIDN</th>
                                            <th data-field="kd_dosen">Kode Dosen</th>
                                            <th data-field="nama">Nama</th>
                                            <th data-field="program_studi">Program Studi</th>
                                            <!-- <th data-field="status">Status</th> -->


                                            <th data-field="status_ds">Status</th>

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

                                            <td><?php echo $row->jurusan; ?></td>

                                            <td><?php echo $row->status_ds; ?></td>
                                            <td>
                                                <a class="btn-sm btn-success"
                                                    href="<?php echo base_url('admin/Dosen/view_dosen/' . $row->id_dosen); ?>"><i
                                                        class="fa fa-eye"></i></a>
                                                <a class="btn-sm btn-primary"
                                                    href="<?php echo base_url('admin/Dosen/update/' . $row->id_dosen); ?>"><i
                                                        class="fa fa-edit"></i></a>
                                                <?php $btn = $this->db->get('set_krs')->row_array();
												if ($btn['hide_btn_del'] == 0) {
												} else { ?>
                                                <a class="btn-sm btn-danger"
                                                    href="<?php echo base_url('admin/Dosen/delete/' . $row->id_dosen); ?>"
                                                    onclick="return confirm('Yakin Akan Di Hapus??');"><i
                                                        class="fa fa-trash"></i></a>
                                                <?php } ?>
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
    </section>
</div>
<?php $this->load->view('admin-st/dist/footer'); ?>
<!-- JS Libraies -->
<script src="<?php echo base_url(); ?>assets-new-look/modules/datatables/datatables.min.js"></script>
<script
    src="<?php echo base_url(); ?>assets-new-look/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js">
</script>
<script src="<?php echo base_url(); ?>assets-new-look/modules/datatables/Select-1.2.4/js/dataTables.select.min.js">
</script>

<script src="<?php echo base_url(); ?>assets-new-look/modules/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets-new-look/js/page/modules-datatables.js"></script>