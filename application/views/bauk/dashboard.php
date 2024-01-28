<div class="income-order-visit-user-area">
	<div class="container-fluid">
		<div class="row">

			<div class="col-lg-4">
				<div class="income-dashone-total shadow-reset nt-mg-b-30">
					<div class="income-title">
						<div class="main-income-head">
							<h2>Tagihan Mahasiswa</h2>
							<div class="main-income-phara">

							</div>
						</div>
					</div>
					<div class="income-dashone-pro">
						<div class="income-rate-total">
							<div class="price-adminpro-rate">
								<h2>
										Rp. <?php echo number_format($mahasiswa,0,',','.'); ?>
								</h2>
							</div>
							<div class="price-graph">
								<span><i class="fa fa-file fa-4x"></i></span>
							</div>
							<div class="income-range order-cl">
								<p>Total Tagihan</p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="income-dashone-total shadow-reset nt-mg-b-30">
					<div class="income-title">
						<div class="main-income-head">
							<h2>Total Pembayaran Mahasiswa</h2>
							<div class="main-income-phara">

							</div>
						</div>
					</div>
					<div class="income-dashone-pro">
						<div class="income-rate-total">
							<div class="price-adminpro-rate">
								<h2>
										Rp. <?php echo number_format($keu,0,',','.'); ?>
									</h2>
							</div>
							<div class="price-graph">
								<span><i class="fa fa-file fa-4x"></i></span>
							</div>
							<div class="income-range order-cl">
								<p>Total Pembayaran </p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div>
			<?php $gran_tot = $mahasiswa - $keu?>

			<div class="col-lg-4">
				<div class="income-dashone-total shadow-reset nt-mg-b-30">
					<div class="income-title">
						<div class="main-income-head">
							<h2>Sisa Pembayaran</h2>
							<div class="main-income-phara">

							</div>
						</div>
					</div>
					<div class="income-dashone-pro">
						<div class="income-rate-total">
							<div class="price-adminpro-rate">
								<h2>
								    	Rp. <?php echo number_format($gran_tot,0,',','.'); ?>
								    	</h2>
							</div>
							
							<div class="price-graph">
								<span><i class="fa fa-file fa-4x"></i></span>
							</div>
							<div class="income-range order-cl">
								<p>Total Sisa</p>
							</div>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div>

		
	</div>
</div>

<script>
	// DATA DASHBOARD

	?
	>
</script>

<br><br><br><br><br><br><br><br><br>
<br><br><br><br><br>
