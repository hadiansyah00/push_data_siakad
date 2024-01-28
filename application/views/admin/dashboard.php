<script src="<?php echo base_url(); ?>assets/Chart.js"></script>


<div class="income-order-visit-user-area">
	<div class="container-fluid">
		<div class="sparkline8-list shadow-reset">
			<div class="sparkline8-hd">
				<div class="row">
					<div class="col-lg-12">
					    	<div class="container-fluid">
							    <h3>Mahasiswa STIKes Bogor Husada</h3>
							    <hr>
							</div>
							<div class="row">
						        <div class="col-lg-6">
						            <div class="container-fluid">
						                <canvas id="myChart"></canvas>
						            </div>
						        </div>
						        	<div class="col-lg-6">
								<div class="income-dashone-total shadow-reset nt-mg-b-30">
									<div class="income-title">
										<div class="main-income-head">
											<h2>Jumlah Mahasiswa</h2>
											<div class="main-income-phara">
											</div>
										</div>
									</div>
									<div class="income-dashone-pro">
										<div class="income-rate-total">
											<div class="price-adminpro-rate">
												<h2><span class="counter">
														<?php echo $this->db->get('mahasiswa')->num_rows(); ?>													</span></h2>
											</div>
											<div class="price-graph">
												<span><i class="fa fa-users fa-4x"></i></span>
											</div>
											<div class="income-range order-cl">
											    <a href="<?php echo base_url('admin/mahasiswa') ?>">
												<p>Total Mahasiswa</p>
											</div>
											<br>
											<h2><span class="counter">
													<?php echo $bidan; ?>
												</span></h2>
											<div class="price-graph">
												<span><i class="fa fa-users fa-4x"></i></span>
											</div>
											<div class="income-range order-cl">
												<p>Total Mahasiswa Bidan</p>
											</div>

											<br>
											<h2><span class="counter">
													<?php echo $farmasi; ?>
												</span></h2>
											<div class="price-graph">
												<span><i class="fa fa-users fa-4x"></i></span>
											</div>
											<div class="income-range order-cl">
												<p>Total Mahasiswa Farmasi</p>
											</div>

											<br>
											<h2><span class="counter">
													<?php echo $gizi; ?>
												</span></h2>
											<div class="price-graph">
												<span><i class="fa fa-users fa-4x"></i></span>
											</div>
											<div class="income-range order-cl">
												<p>Total Mahasiswa Gizi</p>
											</div>
											<div class="clear"></div>
										</div>
									</div>
								</div>
						    </div>
							</a>
					   <div class="row">
						    <div class="col-lg-12">
						        <div class="income-dashone-total shadow-reset nt-mg-b-30">
						          <br>
						            <h2 class="text-center">Status Mahasiswa Tahun Akademik 2022-2023</h2>
						        </br>
						        </div>
						    </div>
						</div>
                    <!--Status Mahasiswa	-->
                    
					<div class="row">
				    <div class="col-lg-6">
				        <div class-"income-dashone-total shadow-reset nt-mg-b-30">
				             <div class="container-fluid">
						                <canvas id="chartStatus"></canvas>
						            </div>
				        </div>
				    </div>
				        <div class="col-lg-6">
							<div class="income-dashone-total shadow-reset nt-mg-b-30">
								<div class="income-title">
									<div class="main-income-head">
										<h2> Status Mahasiswa</h2>
										<div class="main-income-phara">
										</div>
									</div>
								</div>
								<div class="income-dashone-pro">
									<div class="income-rate-total">
										<div class="income-range order-cl">
    										<h4>Mahasiswa Aktif = <strong>
											    <span class="counter">
												<?php echo $aktif; ?>
											</span> </strong></h4>
    											<hr>
											<h4>Mahasiswa Undur diri = <strong>
											    <span class="counter">
												<?php echo $tidak; ?>
											</span> </strong></h4>
											<hr>
												<h4>Mahasiswa Cuti = <strong>
											    <span class="counter">
												<?php echo $cuti; ?>
											</span> </strong></h4>
											<hr>
												<h4>Mahasiswa Lulus = <strong>
											    <span class="counter">
												<?php echo $lulus; ?>
											</span> </strong></h4>
										</div>
                                	</div>
                                <h2>
                                    
								<font color="white"><span class="counter"></font>
									</div>
								</div>
							</div>
					</div>
					</div>
					
			
            
			<!--ini Bawah End div -->
			
					<div class="row">
						<a href="<?php echo base_url('admin/dosen') ?>">
							<div class="col-lg-4">
								<div class="income-dashone-total shadow-reset nt-mg-b-30">
									<div class="income-title">
										<div class="main-income-head">
											<h2>Dosen</h2>
											<div class="main-income-phara">

											</div>
										</div>
									</div>
									<div class="income-dashone-pro">
										<div class="income-rate-total">
											<div class="price-adminpro-rate">
												<h2><span class="counter">
														<?php echo $this->db->get('dosen')->num_rows(); ?>
											</span></h2>
											</div>
											<div class="price-graph">
												<span><i class="fa fa-users fa-4x"></i></span>
											</div>
											<div class="income-range order-cl">
												<p>Total Dosen</p>
											</div>
											<div class="clear"></div>
										</div>
									</div>
								</div>
							</div>
						</a>
						<a href="<?php echo base_url('admin/matakuliah') ?>">
							<div class="col-lg-4">
								<div class="income-dashone-total shadow-reset nt-mg-b-30">
									<div class="income-title">
										<div class="main-income-head">
											<h2>Matakuliah</h2>
											<div class="main-income-phara">

											</div>
										</div>
									</div>
									<div class="income-dashone-pro">
										<div class="income-rate-total">
											<div class="price-adminpro-rate">
												<h2><span class="counter">
														<?php echo $this->db->get('matakuliah')->num_rows(); ?>
													</span></h2>
											</div>
											<div class="price-graph">
												<span><i class="fa fa-file fa-4x"></i></span>
											</div>
											<div class="income-range order-cl">
												<p>Total Matakuliah</p>
											</div>
											<div class="clear"></div>
										</div>
									</div>
								</div>
							</div>
						</a>
						<a href="<?php echo base_url('admin/jurusan') ?>">
							<div class="col-lg-4">
								<div class="income-dashone-total shadow-reset nt-mg-b-30">
									<div class="income-title">
										<div class="main-income-head">
											<h2>Jurusan</h2>
											<div class="main-income-phara">
											</div>
										</div>
									</div>
									<div class="income-dashone-pro">
										<div class="income-rate-total">
											<div class="price-adminpro-rate">
												<h2><span class="counter">
														<?php echo $this->db->get('jurusan')->num_rows(); ?>
													</span></h2>
											</div>
											<div class="price-graph">
												<span><i class="fa fa-university fa-4x"></i></span>
											</div>
											<div class="income-range order-cl">
												<p>Total Jurusan</p>
											</div>
											<div class="clear"></div>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
		
				</div>
	    	</div>
		</div>
	</div>
</div>
<script>
  var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: ["Farmasi", "Kebidanan", "GIzi"],
            datasets: [{
                label:'Data Jurusan Mahasiswa ',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $farmasi; ?>,<?php echo $bidan; ?>, <?php echo $gizi; ?>]
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>
<!--Berdasarkan Status Mahasiswa STIKES BOGOR HUSADA-->
<script>
  var ctx = document.getElementById('chartStatus').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: ["Aktif", "Cuti","Undur diri", "Lulus"],
            datasets: [{
                label:'Data Status Mahasiswa ',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $aktif; ?>,<?php echo $cuti; ?>, <?php echo $tidak; ?>, <?php echo $lulus; ?>]
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>
<!--Bidan 2019 s.d Now-->
<script>
  var ctx = document.getElementById('chartAngkatanBidan').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: ["2019", "2020","2021", "2022"],
            datasets: [{
                label:'Data Status Mahasiswa ',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $bd_2019; ?>,<?php echo $bd_2020; ?>, <?php echo $bd_2021; ?>, <?php echo $bd_2022; ?>]
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>
<script>
  var ctx = document.getElementById('chartFarmasi').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: ["2019", "2020","2021", "2022"],
            datasets: [{
                label:'Data Status Mahasiswa ',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: [<?php echo $frm_2019; ?>,<?php echo $frm_2020; ?>, <?php echo $frm_2021; ?>, <?php echo $frm_2022; ?>]
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>




