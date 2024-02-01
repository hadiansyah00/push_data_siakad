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
            <h1>Data Mahasiswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
                <div class="breadcrumb-item"><a href="#">Data Mahasiswa</a></div>
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
                                            <th data-field="nik" data-editable="true">Kode</th>
                                            <th data-field="nama" data-editable="true">Jurusan</th>

                                            <th data-field="pendidikan" data-editable="true">Jenjang</th>
                                            <!-- <th data-field="no_telepon" data-editable="true">Akreditasi</th> -->
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
									foreach ($jurusan as $row) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row->kd_jurusan; ?></td>
                                            <td><?php echo $row->jurusan; ?>

                                            </td>

                                            <td><?php echo $row->jenjang; ?></td>

                                            <td>
                                                <a class="btn-sm btn-primary"
                                                    href="<?php echo base_url('admin/Jurusan/updateJurusan/' . $row->kd_jurusan); ?>"><i
                                                        class="fa fa-edit"></i></a>
                                                <?php $btn = $this->db->get('set_krs')->row_array();
												if ($btn['hide_btn_del'] == 0) {
												} else { ?>
                                                <a class="btn-sm btn-danger"
                                                    href="<?php echo base_url('admin/Jurusan/deleteJurusan/' . $row->kd_jurusan); ?>"
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