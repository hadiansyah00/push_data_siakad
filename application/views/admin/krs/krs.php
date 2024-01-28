
	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
<!-- 
			<h4 class="pink">
				<i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>
				<a href="#modal-table" role="button" class="green" data-toggle="modal"> Tambah User </a>
			</h4>
			
			<div class="hr hr-18 dotted hr-double"></div> -->

			<?php echo $this->session->flashdata('pesan'); ?>

			<div class="row">
				<div class="col-xs-12">

					<div class="clearfix">
						<a href="#modal-table" role="button" data-toggle="modal" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Data KRS </a>
						<a href="<?php echo base_url('admin/krs'); ?>" class="btn btn-sm btn-warning"><i class="fa fa-refresh"></i> Refresh</a>
						<!-- print dll -->
						<div class="pull-right tableTools-container"><div class="dt-buttons btn-overlap btn-group"></div></div>
					</div>
					<div class="table-header">
						<?php foreach($tahun as $th) : ?>
                    		Kartu Rencana Studi (KRS) - <?php echo $th->ta; ?> - <?php echo $th->semester; ?>
                		<?php endforeach; ?>
					</div>

					<!-- div.table-responsive -->

					<!-- div.dataTables_borderWrap -->
					<div>

						<table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
							<thead>
								<tr role="row">
                                    <th>NO</th>
                                    <th>Tahun Akademik</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Jurusan</th>
                                    <th>WhatsApp</th>
                                    <th>Alamat</th>
                                    <th>Action</th>
                                </tr>
							</thead>

							<tbody>
							
							<tr role="row" class="odd">
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
                                <td></td>
                                <td></td>
								<td>
									<div class="hidden-sm hidden-xs action-buttons">
										<a title="Detil" class="blue" href="<?php echo base_url(''); ?>">
											<i class="ace-icon fa fa-search-plus bigger-130"></i>
										</a>

										<a title="Edit" class="green" href="<?php echo base_url(''); ?>">
											<i class="ace-icon fa fa-pencil bigger-130"></i>
										</a>

										<a title="Delete" class="red" href="<?php echo base_url(''); ?>" onclick="return confirm('Yakin Akan Dihapus?')">
											<i class="ace-icon fa fa-trash-o bigger-130"></i>
										</a>
									</div>

									<div class="hidden-md hidden-lg">
										<div class="inline pos-rel">
											<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
												<i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
											</button>

											<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
												<li>
													<a href="<?php echo base_url(''); ?>" class="tooltip-info" data-rel="tooltip" title="" data-original-title="View">
														<span class="blue">
															<i class="ace-icon fa fa-search-plus bigger-120"></i>
														</span>
													</a>
												</li>

												<li>
													<a href="<?php echo base_url(''); ?>" class="tooltip-success" data-rel="tooltip" title="" data-original-title="Edit">
														<span class="green">
															<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
														</span>
													</a>
												</li>

												<li>
													<a href="<?php echo base_url(''); ?>" class="tooltip-error" data-rel="tooltip" title="" data-original-title="Delete">
														<span class="red">
															<i class="ace-icon fa fa-trash-o bigger-120"></i>
														</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</td>
                            </tr>
                        	
							</tbody>


						</table>

                        
					</div>
				</div>


<!-- MODAL -->

<div id="modal-table" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header no-padding">
				<div class="table-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<span class="white">×</span>
					</button>
					Form Tambah Dosen
				</div>
			</div>

			<div class="modal-body no-padding">
				<div class="row">
                    <form class="form-horizontal form" method="post" action="<?php echo base_url('admin/Dosen/insertDosen');?>">
                    	<br>
                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1" > NIK </label>

                            <div class="col-sm-9">
                                <input type="text" id="" name="nik" placeholder="Input NIK" class="col-xs-10 col-sm-5" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nama </label>

                            <div class="col-sm-9">
                                <input type="text" id="" name="nama_dosen" placeholder="Input Nama" class="col-xs-10 col-sm-5" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tempat Lahir </label>

                            <div class="col-sm-9">
                                <input type="text" id="" name="tempat_lahir" placeholder="Kota" class="col-xs-10 col-sm-5" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tanggal Lahir </label>

                            <div class="col-sm-9">
                                <input type="date" id="" name="tgl_lahir" class="col-xs-10 col-sm-5" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Jenis Kelamin </label>

                            <div class="col-sm-9">	
                            	<p></p>
                                <label><input type="radio" name="jenis_kelamin" value="L"> Laki-Laki</label> || 
                                <label><input type="radio" name="jenis_kelamin" value="P"> Perempuan</label>
                    		</div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Alamat </label>

                            <div class="col-sm-9">
                                <textarea name="alamat" class="col-xs-10 col-sm-5"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> WhatsApp </label>

                            <div class="col-sm-9">
                                <input type="text" id="" name="hp" placeholder="085xxxxx" class="col-xs-10 col-sm-5" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email </label>

                            <div class="col-sm-9">
                                <input type="email" id="" name="email" placeholder="contoh@gmail.com" class="col-xs-10 col-sm-5" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Pendidikan </label>

                            <div class="col-sm-9">
                            	<select name="pendidikan" class="col-xs-10 col-sm-5">
                                	<option> --Pilih-- </option>
                                	<option>S1</option>
                                	<option>S2</option>
                                	<option>S3</option>
                            	</select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Prodi </label>

                            <div class="col-sm-9">
                                <input type="text" id="" name="prodi" placeholder="Program Studi" class="col-xs-10 col-sm-5" required="">
                            </div>
                        </div>

			         
						
                        </div>
						<div class="modal-footer no-margin-top">
							<button type="submit" class="btn btn-sm btn-primary pull-right"><i class="ace-icon fa fa-save"></i> Simpan</button>
							<button class="btn btn-sm btn-danger pull-left" data-dismiss="modal">
								<i class="ace-icon fa fa-times"></i>
								Close
							</button>
						</div>
					
					</form>
					<!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div>

			<!-- PAGE CONTENT ENDS -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>


<script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		

		<!-- page specific plugin scripts -->
		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
		
		<script src="<?php echo base_url();?>assets/js/dataTables.buttons.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/buttons.flash.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/buttons.html5.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/buttons.print.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/buttons.colVis.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/dataTables.select.min.js"></script>


		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null, null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],
					
					
					//"bProcessing": true,
			        //"bServerSide": true,
			        //"sAjaxSource": "http://127.0.0.1/table.php"	,
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			
			
					select: {
						style: 'multi'
					}
			    } );
			
				
				
				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
				
				new $.fn.dataTable.Buttons( myTable, {
					buttons: [
					  {
						"extend": "colvis",
						"text": "<i class='fa fa-search bigger-110 blue'></i> <span class='hidden'>Show/hide columns</span>",
						"className": "btn btn-white btn-primary btn-bold",
						columns: ':not(:first):not(:last)'
					  },
					  {
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "csv",
						"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "excel",
						"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "pdf",
						"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "print",
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: 'This print was produced using the Print button for DataTables'
					  }		  
					]
				} );
				myTable.buttons().container().appendTo( $('.tableTools-container') );
				
				//style the message box
				var defaultCopyAction = myTable.button(1).action();
				myTable.button(1).action(function (e, dt, button, config) {
					defaultCopyAction(e, dt, button, config);
					$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
				});
				
				
				var defaultColvisAction = myTable.button(0).action();
				myTable.button(0).action(function (e, dt, button, config) {
					
					defaultColvisAction(e, dt, button, config);
					
					
					if($('.dt-button-collection > .dropdown-menu').length == 0) {
						$('.dt-button-collection')
						.wrapInner('<ul class="dropdown-menu dropdown-light dropdown-caret dropdown-caret" />')
						.find('a').attr('href', '#').wrap("<li />")
					}
					$('.dt-button-collection').appendTo('.tableTools-container .dt-buttons')
				});
			
				////
			
				setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
						else $(this).tooltip({container: 'body', title: $(this).text()});
					});
				}, 500);
				


			
				$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});
				
			
				
			
				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				
				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
				
				
				
				
				/***************/
				$('.show-details-btn').on('click', function(e) {
					e.preventDefault();
					$(this).closest('tr').next().toggleClass('open');
					$(this).find(ace.vars['.icon']).toggleClass('fa-angle-double-down').toggleClass('fa-angle-double-up');
				});
				/***************/
				
				
				
				
				
				/**
				//add horizontal scrollbars to a simple table
				$('#simple-table').css({'width':'2000px', 'max-width': 'none'}).wrap('<div style="width: 1000px;" />').parent().ace_scroll(
				  {
					horizontal: true,
					styleClass: 'scroll-top scroll-dark scroll-visible',//show the scrollbars on top(default is bottom)
					size: 2000,
					mouseWheelLock: true
				  }
				).css('padding-top', '12px');
				*/
			
			
			})
		</script>