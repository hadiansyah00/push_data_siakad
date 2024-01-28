<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('mhs/dist/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Nilai UTS</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Akademik</a></div>
                <div class="breadcrumb-item">Nilai UTS</div>
            </div>
        </div>



        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tahun Akadedmik <?php echo $tahun['ta'] ?> /
                                <?php echo$tahun['semester']?></h4>

                            <div class="card-header-form">

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
                                <table class="table table-striped">
                                    <tr>
                                        <th align="center" rowspan="2" align="center">NO</th>
                                        <th rowspan="2">KODE</th>
                                        <th rowspan="2">MATAKULIAH</th>
                                        <th rowspan="2">SKS</th>
                                        <th rowspan="2">Nilai</th>
                                    </tr>
                                    <tbody>
                                        <?php
					error_reporting(0);
					$i = 1;
					$sks = 0;
					foreach ($viewKrs as $row) {
						$sks = $sks + $row->sks; ?>
                                        <?php if ($row->semester == $tahun['semester']) { ?>
                                        <?php if ($row->smt == $mhs['semester']) { ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $row->kd_mk; ?></td>
                                            <td><?php echo $row->matakuliah; ?></td>
                                            <td><?php echo $row->sks; ?></td>
                                            <td><?php echo $row->nilai_uts; ?></td>
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
</div>

</div>
</section>
</div>
<?php $this->load->view('mhs/dist/footer'); ?>
