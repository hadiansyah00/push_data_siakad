<div class="basic-form-area mg-b-15">
    <div class="container-fluid">

        <?php echo $this->session->flashdata('pesan'); ?>
        <div class="col-lg-12">
            <div class="sparkline8-outline-icon">
                <span title="Kembali"><a href="<?php echo base_url('admin/Jadwaluas/index'); ?>" class="btn-sm btn-warning"><i class="fa fa-backward"></i></a>
                </span>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline12-list shadow-reset mg-t-30">
                        <div class="sparkline12-hd">
                            <div class="main-sparkline12-hd">
                                <h1>Form Edit Jadwal UAS</h1>
                                <div class="sparkline12-outline-icon">
                                    <span class="sparkline12-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                    <span class="sparkline12-collapse-close"><i class="fa fa-times"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="sparkline12-graph">
                            <div class="basic-login-form-ad">
                                <div class="row">

                                    <div class="all-form-element-inner">

                                        <?php foreach ($jadwal as $row) : ?>
                                            <form action="<?php echo base_url('admin/Jadwaluas/updateAksi'); ?>" method="post">

                                                <!--Pages-->
                                             
												
												<div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <label class="login2 pull-right pull-right-pro">Tgl uas</label>
                                                        </div>
                                
                                                            <input type="hidden" name="id_jadwal" class="form-control" readonly="" value="<?php echo $row->id_jadwal; ?>">
    
                                                                <div class="col-lg-4">
                                                                    <input type="date" name="tgl_uas" class="form-control" value="<?php echo $row->tgl_uas; ?>">
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <label class="login2 pull-right pull-right-pro">Jam</label>
                                                        </div>
                                                      

                                                                <div class="col-lg-4">
                                                                    <input type="text" name="jam_uas" class="form-control" value="<?php echo $row->jam_uas; ?>">
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                              


                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <label class="login2 pull-right pull-right-pro">Ruangan</label>
                                                        </div>
                                                        <?php $r = $row->ruang_uas; ?>
                                                        <div class="col-lg-4">
                                                            <select name="ruang_uas" class="form-control">
                                                                <option <?php echo ($r == '1.1') ? "selected" : "" ?>>1.1</option>
                                                                <option <?php echo ($r == '1.2') ? "selected" : "" ?>>1.2</option>
                                                                <option <?php echo ($r == '1.3') ? "selected" : "" ?>>1.3</option>
                                                                <option <?php echo ($r == '1.4') ? "selected" : "" ?>>1.4</option>
                                                                <option <?php echo ($r == '1.5') ? "selected" : "" ?>>1.5</option>
                                                                <option <?php echo ($r == '1.6') ? "selected" : "" ?>>1.6</option>
                                                                <option <?php echo ($r == '1.1/1.2') ? "selected" : "" ?>>1.1/1.2</option>
                                                                <option <?php echo ($r == '1.1/1.4') ? "selected" : "" ?>>1.1/1.4</option>
                                                                <option <?php echo ($r == '2.2') ? "selected" : "" ?>>2.2</option>
                                                                <option <?php echo ($r == '2.6') ? "selected" : "" ?>>2.6</option>
                                                                <option <?php echo ($r == 'Daring') ? "selected" : "" ?>>Daring</option>
                                                                <option <?php echo ($r == 'Caregiver') ? "selected" : "" ?>>Caregiver</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <label class="login2 pull-right pull-right-pro">Kelas</label>
                                                        </div>
                                                    
                                                    <?php $r = $row->kelas; ?>
                                                    <div class="col-lg-6">
                                                        <select name="kelas" class="form-control">
                                                            <option <?php echo ($r == '1') ? "selected" : "" ?>> Pagi </option>
                                                            <option <?php echo ($r == '2') ? "selected" : "" ?>> Karyawan </option>
                                                           
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
												 <button class="btn btn-warning"><i class="fa fa-save"></i> Update</button>
		  									 <?php endforeach; ?>
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        </form>

 

    </div>
</div>
</div>
</div>
</div>

</div>
<br><br><br>