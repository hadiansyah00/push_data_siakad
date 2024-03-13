<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('mhs/dist/header');
?>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Setting Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Setting Profile</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card">

                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                        aria-controls="home" aria-selected="true">Profile Mahasiswa</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                        aria-controls="contact" aria-selected="false">Informasi Akademik</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="email-tab" data-toggle="tab" href="#email" role="tab"
                                        aria-controls="email" aria-selected="false">Verfikasi Email</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <!-- Start Ini Tab untuk Setting Akun -->
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <div class="card">
                                            <form id="updateProfileForm" class="needs-validation" method="post"
                                                action="<?php echo base_url('mhs/profil/updateAksiProfilMhs') ?>"
                                                enctype="multipart/form-data" novalidate>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-6 col-12">
                                                            <label>NIM</label>
                                                            <input type="hidden" name="id_mahasiswa"
                                                                value="<?php echo $mhs['id_mahasiswa']; ?>">
                                                            <input type="hidden"
                                                                name="<?= $this->security->get_csrf_token_name(); ?>"
                                                                value="<?= $this->security->get_csrf_hash(); ?>">
                                                            <input type="text" class="form-control"
                                                                value="<?php echo $mhs['nim'] ?>" required="" disabled>
                                                            <div class="invalid-feedback">Please fill in the first
                                                                name</div>
                                                        </div>
                                                        <div class="form-group col-md-6 col-12">
                                                            <label>Nama Lengkap</label>
                                                            <input name="nama_mhs" type="text" class="form-control"
                                                                value="<?php echo $mhs['nama_mhs'] ?>" required="">
                                                            <div class="invalid-feedback">Please fill in the last
                                                                name</div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-md-6 col-12">
                                                            <label>Agama</label>
                                                            <?php $ag = $mhs['agama']; ?>
                                                            <select name="agama" class="form-control">
                                                                <option value=""></option>
                                                                <option value="Islam"
                                                                    <?php echo ($ag == 'Islam') ? 'selected' : ''; ?>>
                                                                    Islam
                                                                </option>
                                                                <option value="Kristen"
                                                                    <?php echo ($ag == 'Kristen') ? 'selected' : ''; ?>>
                                                                    Kristen
                                                                </option>
                                                                <option value="Katolik"
                                                                    <?php echo ($ag == 'Katolik' ) ? 'selected' : ''; ?>>
                                                                    Katolik
                                                                </option>
                                                                <option value="Konghucu"
                                                                    <?php echo ($ag == 'Konghucu') ? 'selected' : ''; ?>>
                                                                    Konghucu
                                                                </option>
                                                                <option value="Budha"
                                                                    <?php echo ($ag == 'Budha') ? 'selected' : ''; ?>>
                                                                    Budha
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6 col-12">
                                                            <label>Jenis Kelamin</label>
                                                            <?php $jk = $mhs['jk']; ?>
                                                            <select name="jk" class="form-control">
                                                                <option value=""></option>
                                                                <option value="Laki-Laki"
                                                                    <?php echo ($jk == 'Laki-Laki') ? 'selected' : ''; ?>>
                                                                    Laki-Laki
                                                                </option>
                                                                <option value="Perempuan"
                                                                    <?php echo ($jk == 'Perempuan') ? 'selected' : ''; ?>>
                                                                    Perempuan
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <div class="form-group col-md-6 col-12">
                                                            <label>Tanggal Lahir</label>
                                                            <input type="date" name="tgl_lahir"
                                                                value="<?php echo $mhs['tgl_lahir']; ?>"
                                                                class="form-control">
                                                        </div>


                                                        <div class="form-group col-md-6 col-12">
                                                            <label>Tempat Lahir</label>
                                                            <input type="text" name="tempat_lahir"
                                                                value="<?php echo $mhs['tempat_lahir']; ?>"
                                                                class="form-control">
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-md-7 col-12">
                                                            <label>Email</label>
                                                            <input type="email" name="email" class="form-control"
                                                                value="<?php echo $mhs['email'] ?>" required="">
                                                            <div class="invalid-feedback">Please fill in the email
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-5 col-12">
                                                            <label>No Hp / WA</label>
                                                            <input name="hp" type="tel" class="form-control"
                                                                value="<?php echo $mhs['hp'] ?>">
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-12">
                                                            <label>Alamat</label>
                                                            <textarea name="alamat"
                                                                class="form-control"><?php echo $mhs['alamat']; ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group col-12">
                                                            <label>Kota</label>
                                                            <input type="text" name="kota"
                                                                value="<?php echo $mhs['kota']; ?>" class="form-control"
                                                                required="">
                                                        </div>
                                                    </div>

                                                    <!-- Form field for password -->
                                                    <div class="form-group">
                                                        <label for="password">Password Baru</label>
                                                        <input type="password" class="form-control" id="password"
                                                            name="password" minlength="5">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="confirm_password">Konfirmasi
                                                            Password</label>
                                                        <input type="password" class="form-control"
                                                            id="confirm_password" name="confirm_password" minlength="5">
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-3">
                                                        <?php if ($mhs['photo'] == NULL) { ?>
                                                        <img src="<?php echo base_url('assets/images/default.jpg'); ?>"
                                                            id="prevAvatar" class="rounded-circle" width="200"
                                                            height="200">
                                                        <?php } else { ?>
                                                        <img src="<?php echo base_url('assets/images/uploads/' . $mhs['photo']); ?>"
                                                            id="prevAvatar" class="rounded-circle" width="200"
                                                            height="200">
                                                        <?php } ?>

                                                    </div>
                                                    <div class="form-group col-9">

                                                        <input type="file" class="form-control" id="photo" name="photo">

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
                                <!-- End Untuk tab panel Setting Akun -->
                                <!-- Tab informasi Akademik -->


                                <!-- EndTab informasi Akademik -->
                                <!-- Tab Identitas Sekolah -->
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="card-body">
                                        <h3 class="card-header"> Informasi Akademik</h3>
                                        <div class="row">
                                            <div class="col-12 col-md-12">
                                                <div class="card">
                                                    <form class="form-horizontal form" method="post"
                                                        action="<?php echo base_url('mhs/profil/updateAksiSemester') ?>">
                                                        <input type="hidden" name="id_mahasiswa"
                                                            value="<?php echo $mhs['id_mahasiswa']; ?>">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-6 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>NIM</label>
                                                                        <input type="text" class="form-control"
                                                                            value="<?php echo $mhs['nim'] ?>"
                                                                            required="" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>Nama Mahasiswa</label>
                                                                        <input type="text" class="form-control"
                                                                            value="<?php echo $mhs['nama_mhs'] ?>"
                                                                            required="" disabled>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>Tahun Masuk</label>
                                                                        <input type="text" class="form-control"
                                                                            value="<?php echo $mhs['tahun_masuk'] ?>"
                                                                            required="" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>Kelas</label>
                                                                        <input type="text" class="form-control"
                                                                            value="<?php echo ($mhs['kelas_mhs'] == '0') ? 'Kelas Pagi' : 'Kelas Sore'; ?>"
                                                                            required="" disabled>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>Program Studi</label>
                                                                        <input type="text" class="form-control"
                                                                            value="<?php echo $mhs['jurusan'] ?>"
                                                                            required="" disabled>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>Semester</label>
                                                                        <?php $p = $mhs['semester'] ?>
                                                                        <select class="custom-select" name="semester"
                                                                            class="form-control">
                                                                            <option
                                                                                <?php echo ($p == '1') ? "selected" : "" ?>>
                                                                                1</option>
                                                                            <option
                                                                                <?php echo ($p == '2') ? "selected" : "" ?>>
                                                                                2</option>
                                                                            <option
                                                                                <?php echo ($p == '3') ? "selected" : "" ?>>
                                                                                3</option>
                                                                            <option
                                                                                <?php echo ($p == '4') ? "selected" : "" ?>>
                                                                                4</option>
                                                                            <option
                                                                                <?php echo ($p == '5') ? "selected" : "" ?>>
                                                                                5</option>
                                                                            <option
                                                                                <?php echo ($p == '6') ? "selected" : "" ?>>
                                                                                6</option>
                                                                            <option
                                                                                <?php echo ($p == '7') ? "selected" : "" ?>>
                                                                                7</option>
                                                                            <option
                                                                                <?php echo ($p == '8') ? "selected" : "" ?>>
                                                                                8</option>
                                                                            <option
                                                                                <?php echo ($p == '7') ? "selected" : "" ?>>
                                                                                7</option>
                                                                            <option
                                                                                <?php echo ($p == '8') ? "selected" : "" ?>>
                                                                                8</option>
                                                                            <option
                                                                                <?php echo ($p == '7') ? "selected" : "" ?>>
                                                                                9</option>
                                                                            <option
                                                                                <?php echo ($p == '8') ? "selected" : "" ?>>
                                                                                10</option>
                                                                            <option
                                                                                <?php echo ($p == '7') ? "selected" : "" ?>>
                                                                                11</option>
                                                                            <option
                                                                                <?php echo ($p == '8') ? "selected" : "" ?>>
                                                                                12</option>
                                                                            <option
                                                                                <?php echo ($p == '7') ? "selected" : "" ?>>
                                                                                13</option>
                                                                            <option
                                                                                <?php echo ($p == '8') ? "selected" : "" ?>>
                                                                                14</option>


                                                                        </select>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Dosen Pembimbing</label>
                                                                <input type="text" class="form-control"
                                                                    value="<?php echo $mhs['nama_dosen'] ?>" required=""
                                                                    disabled>

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

                                <!-- EndTab informasi Akademik -->
                                <!-- Tab Identitas Sekolah -->
                                <div class="tab-pane fade" id="email" role="tabpanel" aria-labelledby="email-tab">
                                    <div class="card-body">
                                        <h3 class="card-header"> Verfikasi Email</h3>
                                        <div class="row">
                                            <div class="col-12 col-md-12">
                                                <div class="card">
                                                    <form class="form-horizontal form" method="post"
                                                        action="<?php echo base_url('mhs/profil/updateAksiSemester') ?>">
                                                        <input type="hidden" name="id_mahasiswa"
                                                            value="<?php echo $mhs['id_mahasiswa']; ?>">
                                                        <div class="row">

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Email</label>
                                                            <input type="text" class="form-control"
                                                                value="<?php echo $mhs['email'] ?>" required="">

                                                        </div>

                                                        <div class="card-footer text-right">
                                                            <button type="submit" class="btn btn-primary">Verfikasi
                                                                email</button>
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
</div>
</div>
</div>
</section>

</div>


















<script src="path/to/jquery.min.js"></script>
<script src="path/to/bootstrap.min.js"></script>
<script src="path/to/bootstrap-password-strength-meter.min.js"></script>
<script>
$(document).ready(function() {
    $('.pwstrength').pwstrength();
});
</script>
<?php $this->load->view('mhs/dist/footer'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
</script>
