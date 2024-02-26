<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin-st/dist/header');
?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="col-12 col-sm-2 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pengaturan Profile Admin</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-4">
                            <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab"
                                        aria-controls="home" aria-selected="true">Akun Admin</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile2-tab4" data-toggle="tab" href="#profile24"
                                        role="tab" aria-controls="profile2" aria-selected="false">Password Admin</a>
                                </li>

                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-8">
                            <div class="tab-content no-padding" id="myTab2Content">
                                <div class="tab-pane fade show active" id="home4" role="tabpanel"
                                    aria-labelledby="home-tab4">
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <div class="card">
                                            <h3 class="card-header"> Profile Admin</h3>
                                            <form id="updateProfileForm" class="needs-validation" method="post"
                                                action="<?php echo base_url('admin/Settings/updateAksiProfilAdmin') ?>"
                                                enctype="multipart/form-data" novalidate>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-6 col-12">
                                                            <label>Username</label>
                                                            <input type="hidden" name="id"
                                                                value="<?php echo $admin['id']; ?>">
                                                            <input type="hidden"
                                                                name="<?= $this->security->get_csrf_token_name(); ?>"
                                                                value="<?= $this->security->get_csrf_hash(); ?>">
                                                            <input type="text" class="form-control"
                                                                value="<?php echo $admin['username'] ?>" name="username"
                                                                required="" disabled>
                                                            <div class="invalid-feedback">Please fill in the first
                                                                name</div>
                                                        </div>
                                                        <div class="form-group col-md-6 col-12">
                                                            <label>Email</label>
                                                            <input name="nama_admin" type="text" class="form-control"
                                                                value="<?php echo $admin['email'] ?>" required=""
                                                                readonly>
                                                            <div class="invalid-feedback">Please fill in the last
                                                                Email</div>
                                                        </div>
                                                    </div>



                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <?php if ($admin['photo'] == NULL) { ?>
                                                        <img src="<?php echo base_url('assets/images/default.jpg'); ?>"
                                                            id="prevAvatar" class="rounded-circle" width="200"
                                                            height="200">
                                                        <?php } else { ?>
                                                        <img src="<?php echo base_url('assets/images/uploads/' . $admin['photo']); ?>"
                                                            id="prevAvatar" class="rounded-circle" width="200"
                                                            height="200">
                                                        <?php } ?>

                                                    </div>
                                                    <div class="form-group col-md-8">
                                                        <input type="file" class="form-control" id="photo" name="photo"
                                                            value="<?php echo base_url('assets/images/uploads/' . $admin['photo']); ?>">
                                                    </div>

                                                </div>
                                                <div class="card-footer">
                                                    <button type="button" id="saveChangesBtn"
                                                        class="btn btn-primary">Save Changes</button>

                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show active" id="profile24" role="tabpanel"
                                    aria-labelledby="profile2-tab4">
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <div class="card">
                                            <h5 class="card-header"> Password Admin</h5>
                                            <form id="updatePass" class="needs-validation" method="post"
                                                action="<?php echo base_url('admin/Settings/updatePassword') ?>"
                                                novalidate>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-6 col-12">
                                                            <input type="text" name="id"
                                                                value="<?php echo $admin['id']; ?>">
                                                            <input type="hidden"
                                                                name="<?= $this->security->get_csrf_token_name(); ?>"
                                                                value="<?= $this->security->get_csrf_hash(); ?>">
                                                        </div>
                                                    </div>
                                                    <!-- Form field for password -->
                                                    <div class="form-group">
                                                        <label for="password">Password Baru</label>
                                                        <input type="password" class="form-control" id="password"
                                                            name="password" minlength="5">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="confirm_password">Konfirmasi Password</label>
                                                        <input type="password" class="form-control"
                                                            id="confirm_password" name="confirm_password" minlength="5">
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" id="updatePass" class="btn btn-primary">Save
                                                        Changes</button>
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

    </section>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php $this->load->view('admin-st/dist/footer');
 ?>

<script src="<?php echo base_url(); ?>assets-new-look/modules/sweetalert/sweetalert.min.js">
</script>
<script src="<?php echo base_url(); ?>assets-new-look/js/page/modules-sweetalert.js"></script>
<script>
$(document).ready(function() {
    $('#saveChangesBtn').click(function() {
        var formData = new FormData($('#updateProfileForm')[
            0]); // Menggunakan FormData untuk mengirim data form dan file

        $.ajax({
            type: "POST",
            url: $('#updateProfileForm').attr('action'),
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            success: function(response) {
                console.log('Response:', response);
                if (response.status == 'success') {
                    console.log('Success message:', 'Data berhasil diperbarui!');
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Data berhasil diperbarui!'
                    }).then(function() {
                        window.location.reload();
                    });
                } else {
                    console.log('Error message:', 'Gagal memperbarui data:', response
                        .message);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Gagal memperbarui data: ' + response.message
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('Upload failed:',
                    error); // Tampilkan pesan error jika upload gagal
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Gagal mengunggah foto: ' + error
                });
            }
        });
    });
});

$(document).ready(function() {
    // Function to display preview of selected photo
    $('#photo').change(function() {
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#prevAvatar').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    });

    $('#updateProfileForm').submit(function(e) {
        // Your existing Ajax code goes here...
    });


});

$(document).ready(function() {
    $('#updatePass').submit(function(e) {
        e.preventDefault(); // Menghentikan pengiriman formulir secara sinkron

        var password = $('#password').val();
        var confirm_password = $('#confirm_password').val();
        var id = $('input[name="id"]').val();
        var csrf_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csrf_hash = '<?php echo $this->security->get_csrf_hash(); ?>';

        // Validasi password
        if (password !== confirm_password) {
            swal("Error!", "Konfirmasi password tidak cocok!", "error");
            return;
        }

        // Buat objek data yang akan dikirim melalui AJAX
        var data = {
            password: password,
            confirm_password: confirm_password,
            id: id,
            [csrf_name]: csrf_hash
        };

        // Kirim permintaan AJAX
        $.ajax({
            url: '<?php echo base_url('admin/Settings/updatePassword') ?>',
            type: 'POST',
            data: data,
            success: function(response) {
                // Tampilkan pesan Sweet Alert berdasarkan respons dari server
                if (response.success) {
                    swal("Success!", response.message, "success");
                } else {
                    swal("Error!", response.message, "error");
                }

            },
            error: function() {
                swal("Error!", "Terjadi kesalahan saat memproses permintaan!", "error");
            }
        });
    });
});
</script>
