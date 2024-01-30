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
                                            <th data-field="nim">Nim</th>
                                            <th data-field="nama_mhs">Nama</th>

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
                                                        class="fa fa-edit"> &nbsp;
                                                    </i><?php echo $row->nama_dosen; ?></a></td>

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
