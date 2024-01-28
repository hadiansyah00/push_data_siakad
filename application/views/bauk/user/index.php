<div class="basic-form-area mg-b-15">
	<div class="container-fluid">

		<div class="row">
			<div class="col-lg-12">
				<div class="sparkline12-list shadow-reset mg-t-30">
				    	<?php echo $this->session->flashdata('pesan'); ?>
					<div class="sparkline12-hd">
						<div class="main-sparkline12-hd">
							<h1>Edit Password BAUK</h1>
							<div class="sparkline12-outline-icon">
								<span class="sparkline12-collapse-link"><i class="fa fa-chevron-up"></i></span>
								<span class="sparkline12-collapse-close"><i class="fa fa-times"></i></span>
							</div>
						</div>
					</div>
				
					<div class="sparkline12-graph">
						<div class="basic-login-form-ad">
							<div class="row">
								<div class="col-lg-12">
									<div class="all-form-element-inner">
								
										<form class="form-horizontal form" method="post" action="<?php echo base_url('bauk/user/updatePassAksi'); ?>">
                                            <input type="hidden" name="id" value="<?php echo $users['id']; ?>" class="form-control" >
											<div class="form-group">
												<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Username</label>

												<div class="col-sm-8">
										
													<input type="text" name="username" value="<?php echo $users['username']; ?>" class="form-control" >
												</div>
											</div>
									
											<div class="form-group-inner">

												<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Password</label>

												<div class="col-sm-8">
													<input type="password" name="password" class="form-control">
												</div>
											</div>



											<button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-save"></i> Update</button>
										</form>

									</div>
								</div>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>
</div>
<br><br><br>
