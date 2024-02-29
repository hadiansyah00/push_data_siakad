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
            <h1>Transkrip Nilai Mahasiswa <?php echo $tahun['ta']; ?> / <?php echo $tahun['semester']; ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
                <div class="breadcrumb-item"><a href="#">Data Program Studi</a></div>
                <!-- <div class="breadcrumb-item">Data Kurikulum</div> -->
            </div>
        </div>
        <div class="section-body">


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th data-field="no">No</th>
                                            <th data-field="nik">NIM</th>
                                            <th data-field="nama">Nama</th>
                                            <th data-field="jurusan">Jurusan</th>
                                            <th data-field="semester">Semester</th>
                                            <th data-field="tahun_masuk">Tahun Masuk</th>

                                            <th>Aksi</th>
                                        </tr>
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
                                            <td>SMT - <?php echo $row->semester; ?></td>
                                            <td><?php echo $row->tahun_masuk; ?></td>

                                            <td>
                                                <a title="Lihat Transkrip" class="btn-sm btn-primary"
                                                    href="<?php echo base_url('admin/nilai/detil_transkrip/'.$row->id_mahasiswa); ?>"><i
                                                        class="fa fa-list"></i></a>

                                                <!-- <a title="Print" class="btn-sm btn-warning" target="_blank"
                                                    href="<?php echo base_url('admin/nilai/print/'.$row->id_mahasiswa); ?>"><i
                                                        class="fa fa-print"></i></a> -->
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
