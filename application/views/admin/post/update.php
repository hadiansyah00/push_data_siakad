
<div class="basic-form-area mg-b-15">
    <div class="container-fluid">

        <?php echo $this->session->flashdata('pesan'); ?>

        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline12-list shadow-reset mg-t-30">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Edit Slider</h1>
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
                                         <form class="form-horizontal form" method="post" action="<?php echo base_url('admin/post/updateAksi'); ?>" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-8">
                                                            <input type="hidden" name="id_img" value="<?php echo $img['id_img']; ?>" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <img src="<?php echo base_url('assets/assets-mhs/img/'.$img['photo']);?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <br><br><br><br><br><br><br>
                                                    <input type="file" name="photo" class="form-control" required="">
                                                    <br>
                                                    <a href="<?php echo base_url('admin/post'); ?>" class="btn btn-warning btn-sm"><i class="fa fa-backward"></i> kembali</a>
                                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Update</button>
                                                </div>
                                            </div>
                                            
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