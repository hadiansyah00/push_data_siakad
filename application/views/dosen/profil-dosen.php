<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('dosen/dist/header');
?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="col-12 col-sm-2 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pengaturan Profile Dosen</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-4">
                            <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab"
                                        aria-controls="home" aria-selected="true">Akun Dosen</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile2-tab4" data-toggle="tab" href="#profile24"
                                        role="tab" aria-controls="profile2" aria-selected="false">Password Dosen</a>
                                </li>


                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab"
                                        aria-controls="profile" aria-selected="false">Informasi Dosen</a>
                                </li>

                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-8">
                            <div class="tab-content no-padding" id="myTab2Content">
                                <div class="tab-pane fade show active" id="home4" role="tabpanel"
                                    aria-labelledby="home-tab4">
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <div class="card">
                                            <h3 class="card-header"> Profile Dosen</h3>
                                            <form id="updateProfileForm" class="needs-validation" method="post"
                                                action="<?php echo base_url('dosen/profil/updateAksiProfilDosen') ?>"
                                                enctype="multipart/form-data" novalidate>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-6 col-12">
                                                            <label>Kode Dosen</label>
                                                            <input type="hidden" name="id_dosen"
                                                                value="<?php echo $dsn['id_dosen']; ?>">
                                                            <input type="hidden"
                                                                name="<?= $this->security->get_csrf_token_name(); ?>"
                                                                value="<?= $this->security->get_csrf_hash(); ?>">
                                                            <input type="text" class="form-control"
                                                                value="<?php echo $dsn['kd_dosen'] ?>" required=""
                                                                disabled>
                                                            <div class="invalid-feedback">Please fill in the first
                                                                name</div>
                                                        </div>
                                                        <div class="form-group col-md-6 col-12">
                                                            <label>Nama Lengkap</label>
                                                            <input name="nama_dosen" type="text" class="form-control"
                                                                value="<?php echo $dsn['nama_dosen'] ?>" required=""
                                                                readonly>
                                                            <div class="invalid-feedback">Please fill in the last
                                                                name</div>
                                                        </div>
                                                    </div>



                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <?php if ($dsn['photo'] == NULL) { ?>
                                                        <img src="<?php echo base_url('assets/images/default.jpg'); ?>"
                                                            id="prevAvatar" class="rounded-circle" width="200"
                                                            height="200">
                                                        <?php } else { ?>
                                                        <img src="<?php echo base_url('assets/images/uploads/' . $dsn['photo']); ?>"
                                                            id="prevAvatar" class="rounded-circle" width="200"
                                                            height="200">
                                                        <?php } ?>

                                                    </div>
                                                    <div class="form-group col-md-8">
                                                        <input type="file" class="form-control" id="photo" name="photo"
                                                            value="<?php echo base_url('assets/images/uploads/' . $dsn['photo']); ?>">
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
                                            <h5 class="card-header"> Password Dosen</h5>
                                            <form id="updatePass" class="needs-validation" method="post"
                                                action="<?php echo base_url('dosen/profil/updatePassword') ?>"
                                                novalidate>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-6 col-12">
                                                            <input type="hidden" name="id_dosen"
                                                                value="<?php echo $dosen['id_dosen']; ?>">
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
                                <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                                    <div class="card-body">
                                        <h3 class="card-header"> Informasi Akademik</h3>
                                        <div class="row">
                                            <div class="col-12 col-md-12">
                                                <div class="card">
                                                    <form class="form-horizontal form" method="post"
                                                        action="<?php echo base_url('dosen/profil/updateProfileDosen') ?>">
                                                        <input type="hidden" name="id_dosen"
                                                            value="<?php echo $dsn['id_dosen']; ?>">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-6 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>Kode Dosen/label>
                                                                            <input type="text" class="form-control"
                                                                                value="<?php echo $dsn['kd_dosen'] ?>"
                                                                                required="" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>Nama Dosen</label>
                                                                        <input type="text" class="form-control"
                                                                            value="<?php echo $dsn['nama_dosen'] ?>"
                                                                            required="" disabled>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">

                                                                <div class="form-group col-md-6 col-12">
                                                                    <label>Tanggal Lahir</label>
                                                                    <input type="date" name="tgl"
                                                                        value="<?php echo $dsn['tgl']; ?>"
                                                                        class="form-control">
                                                                </div>


                                                                <div class="form-group col-md-6 col-12">
                                                                    <label>Tempat Lahir</label>
                                                                    <input type="text" name="tempat"
                                                                        value="<?php echo $dsn['tempat']; ?>"
                                                                        class="form-control">
                                                                </div>

                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group col-md-7 col-12">
                                                                    <label>Email</label>
                                                                    <input type="email" name="email_ds"
                                                                        class="form-control"
                                                                        value="<?php echo $dsn['email_ds'] ?>"
                                                                        required="">
                                                                    <div class="invalid-feedback">Please fill in the
                                                                        email
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-5 col-12">
                                                                    <label>No Hp / WA</label>
                                                                    <input name="hp_ds" type="tel" class="form-control"
                                                                        value="<?php echo $dsn['hp_ds'] ?>">
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group col-12">
                                                                    <label>Alamat</label>
                                                                    <textarea name="alamat_dosen"
                                                                        class="form-control"><?php echo $dsn['alamat_dosen']; ?></textarea>
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <div class="col-md-6 col-lg-12">
                                                            <div class="form-group">
                                                                <label>Program Studi</label>
                                                                <input type="text" class="form-control"
                                                                    value="<?php echo $dsn['jurusan'] ?>" required=""
                                                                    disabled>
                                                            </div>

                                                        </div>

                                                        <div class="card-footer text-right">
                                                            <button type="submit"
                                                                class="btn btn-primary">Simpan</button>
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
        </div>

    </section>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php $this->load->view('dosen/dist/footer');
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
        var id_dosen = $('input[name="id_dosen"]').val();
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
            id_dosen: id_dosen,
            [csrf_name]: csrf_hash
        };

        // Kirim permintaan AJAX
        $.ajax({
            url: '<?php echo base_url('dosen/profil/updatePassword') ?>',
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