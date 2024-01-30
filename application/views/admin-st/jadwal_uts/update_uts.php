<div class="basic-form-area mg-b-15">
    <div class="container-fluid">

        <?php echo $this->session->flashdata('pesan'); ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline12-list shadow-reset mg-t-30">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Form Edit Jadwal UTS</h1>
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

                                        <?php foreach ($jadwal as $row) : ?>

                                            <form action="<?php echo base_url('admin/Jadwaluts/updateAksi'); ?>" method="post">

                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <label class="login2 pull-right pull-right-pro">Tgl Uts</label>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <input type="hidden" name="id_jadwal" class="form-control" readonly="" value="<?php echo $row->id_jadwal; ?>">
                                                            <div class="form-group-inner">

                                                                <div class="col-lg-9">
                                                                    <input type="date" name="tgl_uts" class="form-control" value="<?php echo $row->tgl_uts; ?>">
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
                                                        <div class="col-lg-9">
        
                                                            <div class="form-group-inner">

                                                                <div class="col-lg-9">
                                                                    <input type="text" name="jam" class="form-control" value="<?php echo $row->jam; ?>">
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <label class="login2 pull-right pull-right-pro">Ruangan</label>
                                                        </div>
                                                    
                                                    <?php $r = $row->ruang_uts; ?>
                                                    <div class="col-lg-6">
                                                        <select name="ruang_uts" class="form-control">
                                                            <option <?php echo ($r == '1.1') ? "selected" : "" ?>> 1.1 </option>
                                                            <option <?php echo ($r == '1.2') ? "selected" : "" ?>> 1.2 </option>
                                                            <option <?php echo ($r == '1.3') ? "selected" : "" ?>> 1.3 </option>
                                                            <option <?php echo ($r == '1.4') ? "selected" : "" ?>> 1.4 </option>
                                                            <option <?php echo ($r == '2.6') ? "selected" : "" ?>> 2.6 </option>
                                                            <option <?php echo ($r == '1.1/1.2') ? "selected" : "" ?>> 1.1 / 1.2 </option>
                                                             <option <?php echo ($r == '1.1/1.4') ? "selected" : "" ?>> 1.1 / 1.4 </option>
                                                            <option <?php echo ($r == '2.2') ? "selected" : "" ?>> 2.2 </option>
                                                            <option <?php echo ($r == 'Caregiver') ? "selected" : "" ?>> Caregiver</option>
                                                            <option <?php echo ($r == 'Daring') ? "selected" : "" ?>> Daring </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group-inner">
                                                    <div class="row">
                                                        <div class="col-lg-2">
                                                            <label class="login2 pull-right pull-right-pro">Ruangan</label>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-warning"><i class="fa fa-save"></i> Update</button>
                        </form>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<br><br><br>