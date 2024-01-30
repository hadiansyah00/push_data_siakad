
<div class="basic-form-area mg-b-15">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="sparkline12-list shadow-reset mg-t-30">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Update info Mahasiswa</h1>
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
                                        <form class="form-horizontal form" action="<?php echo base_url('admin/Post/updatePostAksi');?>" method="post">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Judul</label>

                                                <div class="col-sm-8">
                                                    <input type="hidden" name="id_post" value="<?php echo $post['id_post']; ?>" class="form-control">
                                                    <input type="text" name="judul" value="<?php echo $post['judul']; ?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label no-padding-right" for="form-field-1"> Deskripsi</label>

                                                <div class="col-sm-8">
                                                    <textarea name="deskripsi" class="form-control" style="height: 130px;"><?php echo $post['deskripsi']; ?></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <a href="<?php echo base_url('admin/post'); ?>" class="btn btn-warning"><i class="fa fa-refresh"></i> Batal</a>
                                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                                    </div>
                                                    <div class="col-lg-4">
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
            </div>
        </div>
    </div>
</div>
<br><br><br>