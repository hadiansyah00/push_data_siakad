<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('mhs/dist/header');
?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="col-12 col-sm-2 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pengaturan Profile Mahasiswa</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-4">
                            <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab"
                                        aria-controls="home" aria-selected="true">Akun Mahasiswa</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile2-tab4" data-toggle="tab" href="#profile24"
                                        role="tab" aria-controls="profile2" aria-selected="false">Password Mahasiswa</a>
                                </li>


                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab"
                                        aria-controls="profile" aria-selected="false">Informasi Mahasiswa</a>
                                </li>

                            </ul>
                        </div>
                        <div class="col-12 col-sm-12 col-md-8">
                            <div class="tab-content no-padding" id="myTab2Content">
                                <div class="tab-pane fade show active" id="home4" role="tabpanel"
                                    aria-labelledby="home-tab4">
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <div class="card">
                                            <h3 class="card-header"> Profile Mahasiswa</h3>
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
                                                                value="<?php echo $mhs['nama_mhs'] ?>" required=""
                                                                readonly>
                                                            <div class="invalid-feedback">Please fill in the last
                                                                name</div>
                                                        </div>
                                                    </div>



                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
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
                                                    <div class="form-group col-md-8">
                                                        <input type="file" class="form-control" id="photo" name="photo"
                                                            value="<?php echo base_url('assets/images/uploads/' . $mhs['photo']); ?>">
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
                                            <h5 class="card-header"> Password Mahasiswa</h5>
                                            <form id="updatePass" class="needs-validation" method="post"
                                                action="<?php echo base_url('mhs/profil/updatePassword') ?>" novalidate>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-6 col-12">
                                                            <input type="hidden" name="id_mahasiswa"
                                                                value="<?php echo $mhs['id_mahasiswa']; ?>">
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
                                                                    <input type="email" name="email"
                                                                        class="form-control"
                                                                        value="<?php echo $mhs['email'] ?>" required="">
                                                                    <div class="invalid-feedback">Please fill in the
                                                                        email
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
                                                                        value="<?php echo $mhs['kota']; ?>"
                                                                        class="form-control" required="">
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

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<?php $this->load->view('mhs/dist/footer');
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
        var id_mahasiswa = $('input[name="id_mahasiswa"]').val();
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
            id_mahasiswa: id_mahasiswa,
            [csrf_name]: csrf_hash
        };

        // Kirim permintaan AJAX
        $.ajax({
            url: '<?php echo base_url('mhs/profil/updatePassword') ?>',
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
