<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('mhs/dist/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Jadwal Kuliah Pra UAP</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Jadwak Perkuliahan</a></div>
                <div class="breadcrumb-item">Jadwal Pra UAP</div>
            </div>
        </div>
        <div class="section-body">
            <!-- <h2 class="section-title">Jadwal Kuliah - STIKES BOGOR HUSADA</h2> -->
            <!-- <p class="section-lead">Example of some Bootstrap table components.</p> -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>

                                <a href="<?php echo base_url('mhs/Jadwalprauap/print_pra_uap/' . $mhs['id_mahasiswa']); ?>"
                                    target="_blank" class="btn btn-sm btn-primary "><i class="icofont-print"></i> Cetak
                                    Kartu
                                    UAP</a>


                            </h4>
                            <div class="card-header-action">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-btn">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped" id="sortable-table">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Nama Ujian</td>
                                            <td>Jam Pra UAP</td>
                                            <td>Tanggal Pra UAP</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
										$i = 1;
										foreach ($jadwal as $row) { ?>

                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row->nama_pra_uap; ?></td>
                                            <td><?php echo $row->jam_pra_uap; ?></td>
                                            <td><?php echo format_indo($row->tanggal_pra_uap, date('d-m-y')); ?></td>
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
<?php $this->load->view('mhs/dist/footer'); ?>
