
<div class="container-fluid">
<?php echo $this->session->flashdata('pesan'); ?>
<div class="menu-animate-list shadow-reset mg-b-15 menu-list-wrap">
    <div class="alert-title">
        <h2>Profil User</h2>
    </div>
    <ul class="nav nav-tabs custom-menu-wrap custom-menu-wrap-st">
        <li class="active"><a data-toggle="tab" href="#Home2"><i class="fa fa-user"></i> Profil</a>
        </li>
        <li>
            <a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl"><i class="fa fa-server"></i> Update</a>
        </li>
        <li>
            <a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#password"><i class="fa fa-eye"></i> Update Password</a>
        </li>
        <li><a href="<?php echo base_url('bauk/User'); ?>"><i class="fa fa-backward"></i> Kembali</a>
        </li>
    </ul>
    <div class="tab-content custom-menu-content">
        <div id="Home2" class="tab-pane in active animated zoomIn">
            <div class="">
            	<?php $this->load->view('admin/user/profil_user'); ?>
            </div>
        </div>
    </div>
</div>
</div>







<!-- modal update username & email-->
<div id="PrimaryModalhdbgcl" class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade bounceInDown animated in" role="dialog" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Update username & email</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="all-form-element-inner">
                            <form action="<?php echo base_url('bauk/User/update/'.$users['id']);?>" method="post">
                            
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="login2 pull-left pull-left-pro">Username</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" name="username" placeholder="example" value="<?php echo $users['username']; ?>" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="login2 pull-left pull-left-pro">Email</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" name="email" value="<?php echo $users['email']; ?>" placeholder="example@gmail.com" required="">
                                        </div>
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
            </div>

                
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-4">
                        <a href="#" data-dismiss="modal" class="btn btn-warning"><i class="fa fa-backward"></i> Batal</a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                    <div class="col-lg-4">
                    </div>
                </div>
                <br><br>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- modal update password-->
<div id="password" class="modal modal-adminpro-general fullwidth-popup-InformationproModal fade bounceInDown animated in" role="dialog" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Update Password</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="all-form-element-inner">
                            <form action="<?php echo base_url('bauk/User/updatePass/'.$users['id']);?>" method="post">
                            
                                <div class="form-group-inner">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <label class="login2 pull-left pull-left-pro">New Password</label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="password" class="form-control" name="password" placeholder="Masukan Password Baru"  required="">
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

                
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-4">
                        <a href="#" data-dismiss="modal" class="btn btn-warning"><i class="fa fa-backward"></i> Batal</a>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                    <div class="col-lg-4">
                    </div>
                </div>
                <br><br>
            </div>
            </form>
        </div>
    </div>
</div>

