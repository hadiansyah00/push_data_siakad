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
            <h1>Data Matakuliah</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
                <div class="breadcrumb-item"><a href="#">Data Prog.Studi</a></div>
                <div class="breadcrumb-item"><a href="#">Data Matakuliah</a></div>
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
                                            <th data-field="tahun akademik">Tahun Akademik</th>
                                            <th data-field="kd_mk">Kode MK</th>
                                            <th data-field="matakuliah">Matakuliah</th>
                                            <th data-field="semester">Semester</th>
                                            <th data-field="sks">SKS</th>
                                            <th data-field="">Dosen Pengampuh</th>

                                            <?php $btn = $this->db->get('set_krs')->row_array();
										if ($btn['hide_btn_del'] == 0) {
										} else { ?>
                                            <th>Aksi</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
									foreach ($kurikulum as $row) { ?>
                                        <?php if ($row->semester == $tahun['semester']) { ?>
                                        <?php if ($row->status == $tahun['status']) { ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>

                                            <td><?php echo $row->ta; ?></td>
                                            <td><?php echo $row->kd_mk; ?></td>
                                            <td><?php echo $row->matakuliah; ?></td>
                                            <td><?php echo $row->smt; ?></td>
                                            <td><?php echo $row->id_kurikulum; ?></td>



                                            <td>
                                                <?php
                     								   // Di sini kita dapat menambahkan kode untuk mengambil nama dosen berdasarkan $row->id_dosen
														$dosen = $this->KurikulumModel->getDosenNameById_peran($row->id_perdos);
														echo $dosen;
														?>
                                                <br>
                                                <hr>
                                                <?php
                     								   // Di sini kita dapat menambahkan kode untuk mengambil nama dosen berdasarkan $row->id_dosen
														$dosen = $this->KurikulumModel->getDosenNameById($row->id_peran);
														echo $dosen;
														?>

                                            </td>

                                            <?php $btn = $this->db->get('set_krs')->row_array();
												if ($btn['hide_btn_del'] == 0) {
												} else { ?>
                                            <td>
                                                <a class="btn-sm btn-danger"
                                                    href="<?php echo base_url('admin/Kurikulum/delete/' . $row->id_kurikulum); ?>"
                                                    onclick="return confirm('Yakin Akan Di Hapus??');"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                            <?php } ?>
                                        </tr>
                                        <?php } ?>
                                        <?php } ?>


                                        <?php } ?>
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
