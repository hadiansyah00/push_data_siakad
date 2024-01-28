<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('mhs/dist/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Administrasi Kuliah</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Akademik</a></div>
                <div class="breadcrumb-item">Administrasi </div>
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

                                <a href="#" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i>
                                    Cetak</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th data-field="no">No</th>
                                        <th data-field="tgl_bayar">Tanggal Pembayaran</th>
                                        <th data-field="smt_pmb">Semester</th>
                                        <th data-field="angsuran">Pembayaran</th>
                                    </tr>
                                    <tbody>

                                        <?php $i = 1;
								    $sisa = 0;
	                                error_reporting(0);
									$total_cicilan = 0;
									foreach ($list as $row) { 
									    
								    	$total_cicilan = $total_cicilan + $row->angsuran;
								    	?>

                                        <tr>
                                            <td><?php echo $i++; ?></td>

                                            <td><?php echo format_indo($row->tgl_bayar, date('Y-m-d')); ?></td>
                                            <td><?php echo $row->smt_pmb ?></td>
                                            <td>Rp. <?php echo number_format($row->angsuran,0,',','.'); ?>,-</td>

                                            <?php 
												$jumlah_total = $row->smt_1 + $row->smt_2 + $row->smt_3 + $row->smt_4 + $row->smt_5 + $row->smt_6 + $row->smt_7 + $row->smt_8;
												$sisa = $total_cicilan - $jumlah_total
												?>


                                            <?php } ?>

                                        </tr>
                                        <tr>
                                            <td colspan="3" align="center"><strong>Total Tagihan Pembayaran </strong>
                                            </td>
                                            <td colspan="3"> <strong>Rp.
                                                    <?php echo number_format($total_cicilan,0,',','.'); ?>,-</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="center"><strong>Total Tagihan Pembayaran </strong>
                                            </td>
                                            <td colspan="3"> <strong>Rp.
                                                    <?php echo number_format($jumlah_total,0,',','.'); ?>,-</strong>
                                            </td>
                                        </tr>


                                        <tr>
                                            <td colspan="3" align="center"><strong>Sisa Pembayaran</strong></td>
                                            <td colspan="3"> <strong>Rp.
                                                    <?php echo number_format($sisa ,0,',','.'); ?>,-</strong></td>

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

</div>
</section>
</div>

<?php $this->load->view('mhs/dist/footer'); ?>