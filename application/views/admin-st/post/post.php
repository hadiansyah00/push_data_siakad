<div class="static-table-area mg-b-15">
  <div class="container-fluid">
      <div class="col-lg-12">
        <?php echo $this->session->flashdata('pesan'); ?>
        <div class="sparkline10-list shadow-reset mg-t-30">
            <div class="sparkline10-hd">
                <div class="main-sparkline10-hd">
                    <h1>Post Info Mahasiswa</h1>
                    <div class="sparkline10-outline-icon">
                        <span class="sparkline10-collapse-link"><i class="fa fa-chevron-up"></i></span>
                        <span class="sparkline10-collapse-close"><i class="fa fa-times"></i></span>
                    </div>
                </div>
            </div>
            <div class="sparkline10-graph">
                <div class="static-table-list">
                    <table class="table border-table">
                        <thead>
                            <tr>
                              <td>Judul</td>
                              <td>Deskripsi</td>
                              <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td><?php echo $post['judul']; ?></td>
                            <td><?php echo $post['deskripsi']; ?></td>
                            <td>
                                <span title="Update Info"><a class="btn-sm btn-primary" class="Primary mg-b-10" href="<?php echo base_url('admin/post/updatePost/'.$post['id_post']); ?>"><i class="fa fa-edit"></i></a>
                            </td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
  </div>
</div>

<div class="container-fluid">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="user-profile-wrap shadow-reset">
            <div class="row">
                <h3 class="text-center">Update Slider Dengan Ukuran 1210 x 698 px</h3>
                <?php foreach($img as $row) { ?>
                <div class="col-md-6">
                    <div class="card-body">
                        <img src="<?php echo base_url('assets/assets-mhs/img/'.$row->photo);?>">
                    </div>
                    <br>
                    <p class="text-center">
                        <span title="Update Slider"><a class="btn btn-primary" class="Primary mg-b-10" href="<?php echo base_url('admin/post/updateImg/'.$row->id_img); ?>"><i class="fa fa-cloud-upload"></i> Update Slider</a>
                    </p>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<br><br>






