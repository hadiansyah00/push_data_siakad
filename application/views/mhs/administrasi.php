<!-- End Breadcrumbs -->

<!-- ======= About Section ======= -->
<div class="container">

	<div class="row">

		<div class="col-lg-9 pt-4 pt-lg-0 content" data-aos="fade-left">
                               
			<h3>Tahun Akademik - <?php echo $tahun['ta']; ?> (<?php echo $tahun['semester']; ?>)</h3>

			<div class="row">

				<div class="col-lg-9">
					<table class="table table-sm">
						<tr>
							<th><i class="icofont-rounded-right"></i> Nama </th>
							<td>:</td>
							<td><?php echo $mhs['nama_mhs']; ?></td>
						</tr>
				
				    	<tr>
							<th><i class="icofont-rounded-right"></i> Program Studi </th>
							<td>:</td>
							<td><?php echo $mhs['jenjang']; ?> - <?php echo $mhs['jurusan']; ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<br>
		<?php echo $this->session->flashdata('pesan'); ?>
	</p>
	<div class="row">
		<div class="col-md-8" data-aos="">
			<table class="table table-bordered table-striped ">
				<thead class="table-dark">
									<tr>
										<th data-field="no">No</th>
										<th data-field="tgl_bayar">Tanggal Pembayaran</th>
								        <th data-field="smt_pmb">Semester</th>
								        <th data-field="angsuran">Pembayaran</th>
									</tr>
								</thead>
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
								  <td colspan="3"  align="center"><strong>Total Tagihan Pembayaran </strong></td>
							      <td colspan="3"> <strong>Rp. <?php echo number_format($total_cicilan,0,',','.'); ?>,-</strong></td>
								</tr>
									<tr>
								  <td colspan="3"  align="center"><strong>Total Tagihan Pembayaran </strong></td>
							      <td colspan="3"> <strong>Rp. <?php echo number_format($jumlah_total,0,',','.'); ?>,-</strong></td>
								</tr>
								

							    <tr>
								  <td colspan="3"  align="center"><strong>Sisa Pembayaran</strong></td>
							      <td colspan="3"> <strong>Rp. <?php echo number_format($sisa ,0,',','.'); ?>,-</strong></td>
							  
								</tr>

								</tbody>
		                    	</table>
		                   </div>
		                       <div class="col-md-4" data-aos="">
			    <table class="table table-bordered table-striped ">
			    	<thead class="table-dark">
									<tr>
									  <td colspan="4"  align="center"><strong>Form Tagihan Semester</strong></td>
			
									</tr>
								<tbody>
								<tr>
								  <td colspan="3"  align="center"><strong>Tagihan Semester 1</strong></td>
							      <td colspan="3"> <strong>Rp. <?php  echo number_format($row->smt_1,0,',','.'); ?>,-</strong></td>
								</tr>
																<tr>
								  <td colspan="3"  align="center"><strong>Tagihan Semester 2</strong></td>
							      <td colspan="3"> <strong>Rp. <?php  echo number_format($row->smt_2,0,',','.'); ?>,-</strong></td>
								</tr>
																<tr>
								  <td colspan="3"  align="center"><strong>Tagihan Semester 3</strong></td>
							      <td colspan="3"> <strong>Rp. <?php  echo number_format($row->smt_3,0,',','.'); ?>,-</strong></td>
								</tr>
																<tr>
								  <td colspan="3"  align="center"><strong>Tagihan Semester 4</strong></td>
							      <td colspan="3"> <strong>Rp. <?php  echo number_format($row->smt_4,0,',','.'); ?>,-</strong></td>
								</tr>
																<tr>
								  <td colspan="3"  align="center"><strong>Tagihan Semester 5</strong></td>
							      <td colspan="3"> <strong>Rp. <?php  echo number_format($row->smt_5,0,',','.'); ?>,-</strong></td>
								</tr>
																<tr>
								  <td colspan="3"  align="center"><strong>Tagihan Semester 6</strong></td>
							      <td colspan="3"> <strong>Rp. <?php  echo number_format($row->smt_6,0,',','.'); ?>,-</strong></td>
								</tr>
																<tr>
								  <td colspan="3"  align="center"><strong>Tagihan Semester 7</strong></td>
							      <td colspan="3"> <strong>Rp. <?php  echo number_format($row->smt_7,0,',','.'); ?>,-</strong></td>
								</tr>
									</tr>
																<tr>
								  <td colspan="3"  align="center"><strong>Tagihan Semester 8</strong></td>
							      <td colspan="3"> <strong>Rp. <?php  echo number_format($row->smt_8,0,',','.'); ?>,-</strong></td>
								</tr>

								</tbody>
								
							</table>
		                   </div>
	                </div>
	                </div>
         
	</div><!-- End About Section -->

<section>
    
	<div class="container">

	</div>
</section>



<script src="<?php echo base_url(); ?>assets/assets-mhs/js/modal.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->


</div><!-- End About Section -->

<section>
	<div class="container">

	</div>
</section>






<script src="<?php echo base_url(); ?>assets/assets-mhs/js/modal.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->
