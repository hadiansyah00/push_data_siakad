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
                                        aria-controls="home" aria-selected="true">Akun</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                        aria-controls="profile" aria-selected="false">Informasi Mahasiswa</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                        aria-controls="contact" aria-selected="false">Informasi Akademik</a>
                                </li>

                            </ul>


                            <div class="tab-content" id="myTabContent">
                                <!-- Start Ini Tab untuk Setting Akun -->
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <?php echo $this->session->flashdata('pesan'); ?>
                                    <div class="row mt-sm-4">
                                        <div class="col-12 col-md-12 col-lg-5">
                                            <div class="card profile-widget">
                                                <?php if ($this->session->flashdata('error')): ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <strong>Error:</strong>
                                                    <?php echo $this->session->flashdata('error'); ?>
                                                </div>
                                                <?php endif; ?>
                                                <div class="profile-widget-header">
                                                    <?php if ($mhs['photo'] == NULL) { ?>
                                                    <img src="<?php echo base_url('assets/images/default.jpg'); ?>"
                                                        alt="" class="rounded-circle profile-widget-picture">
                                                    <?php } else { ?>
                                                    <img src="<?php echo base_url('assets/images/uploads/' . $mhs['photo']); ?>"
                                                        alt="" class="rounded-circle profile-widget-picture">
                                                    <?php } ?>
                                                </div>
                                                <form class="form-horizontal" method="post"
                                                    action="<?= site_url('mhs/profil/updatePhoto'); ?>"
                                                    enctype="multipart/form-data">
                                                    <div class="card-default custom-file">
                                                        <input type="hidden" name="id_mahasiswa"
                                                            value="<?= $mhs['id_mahasiswa']; ?>">
                                                        <input type="hidden"
                                                            name="<?= $this->security->get_csrf_token_name(); ?>"
                                                            value="<?= $this->security->get_csrf_hash(); ?>">
                                                        <input type="file" class="custom-file-input" id="upload_file"
                                                            name="photo" required="">
                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                    </div>
                                                    <div class="card-footer text-left">
                                                        <button type="submit" class="btn btn-primary">Upload
                                                            Foto</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h4>Reset Password</h4>

                                                </div>
                                                <!-- Flash Messages -->


                                                <!-- User Profile Form -->
                                                <form method="POST"
                                                    action="<?php echo base_url('mhs/profil/updatePass'); ?>">
                                                    <input type="hidden" name="id_mahasiswa"
                                                        value="<?= $mhs['id_mahasiswa']; ?>">
                                                    <input type="hidden"
                                                        name="<?= $this->security->get_csrf_token_name(); ?>"
                                                        value="<?= $this->security->get_csrf_hash(); ?>">
                                                    <div class="form-group">
                                                        <label for="password">New Password</label>
                                                        <input id="password" type="password"
                                                            class="form-control pwstrength" data-indicator="pwindicator"
                                                            name="password" tabindex="2" required>
                                                        <div id="pwindicator" class="pwindicator">
                                                            <div class="bar"></div>
                                                            <div class="label"></div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="password-confirm">Confirm Password</label>
                                                        <input id="password-confirm" type="password"
                                                            class="form-control" name="u_password" tabindex="2"
                                                            required>
                                                    </div>

                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary btn-lg btn-block"
                                                            tabindex="4">
                                                            Reset Password
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>

                                        <div class="col-12 col-md-12 col-lg-7">
                                            <div class="card">
                                                <?php if ($this->session->flashdata('success')): ?>
                                                <div class="alert alert-success" role="alert">
                                                    <?php echo $this->session->flashdata('success'); ?>
                                                </div>
                                                <?php endif; ?>

                                                <form class="needs-validation" method="post"
                                                    action="<?php echo base_url('mhs/profil/updateAksiProfil') ?>"
                                                    novalidate>

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
                                                                    value="<?php echo $mhs['nim'] ?>" required=""
                                                                    disabled>
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
                                                                    value="<?php echo $mhs['kota']; ?>"
                                                                    class="form-control" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary">Save
                                                            Changes</button>
                                                    </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Untuk tab panel Setting Akun -->
                                <!-- Tab informasi Akademik -->
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="card-body">
                                        <h3 class="card-header"> Informasi Mahasiswa</h3>
                                        <div class="row">
                                            <div class="col-12 col-md-12">
                                                <div class="card">
                                                    <form class="needs-validation" method="post"
                                                        action="<?= base_url('mhs/profil/infoMhs') ?>" novalidate>
                                                        <input type="hidden" name="id_mahasiswa"
                                                            value="<?= $mhs['id_mahasiswa']; ?>">
                                                        <input type="hidden"
                                                            name="<?= $this->security->get_csrf_token_name(); ?>"
                                                            value="<?= $this->security->get_csrf_hash(); ?>">

                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-6 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>Asala Sekolah</label>
                                                                        <input type="text" name="asal_sekolah"
                                                                            class="form-control"
                                                                            value="<?php echo $mhs['asal_sekolah'] ?>"
                                                                            required="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>NISN</label>
                                                                        <input type="text" name="nisn"
                                                                            class="form-control"
                                                                            value="<?php echo $mhs['nisn'] ?>"
                                                                            required="">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>Nama Ayah</label>
                                                                        <input type="text" name="nama_ayah"
                                                                            class="form-control"
                                                                            value="<?php echo $mhs['nama_ayah'] ?>">

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>Nama Ibu</label>
                                                                        <input type="text" name="nama_ibu"
                                                                            class="form-control"
                                                                            value="<?php echo $mhs['nama_ibu'] ?>">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>Nama Wali</label>
                                                                        <input type="text" name="nama_wali"
                                                                            class="form-control"
                                                                            value="<?php echo $mhs['nama_wali'] ?>">

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label>No Telp Wali/Ortu</label>
                                                                        <input type="number" name="hp_ortu"
                                                                            class="form-control"
                                                                            value="<?php echo $mhs['hp_ortu'] ?>"
                                                                            required="">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Alamat Ortu</label>
                                                                <input type="textarea" name="alamat_ortu"
                                                                    class="form-control"
                                                                    value="<?php echo $mhs['alamat_ortu'] ?>"
                                                                    required=""></input>

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Kisaran Pendapatan</label> <br>
                                                                <?php $pd = $mhs['pendapatan_ortu']; ?>
                                                                <label><input type="radio" name="pendapatan_ortu"
                                                                        value="Rp 500.000,00 - Rp 1.000.000,00"
                                                                        <?php echo ($pd == 'Rp 500.000,00 - Rp 1.000.000,00') ? "checked" : ""  ?>>
                                                                    >Rp
                                                                    500.000,00 - Rp 1.000.000,00</label> ||
                                                                <label><input type="radio" name="pendapatan_ortu"
                                                                        value="Rp 1.000.000,00 - Rp 2.000.000,00"
                                                                        <?php echo ($pd == 'Rp 1.000.000,00 - Rp 2.000.000,00') ? "checked" : "" ?>>
                                                                    >Rp
                                                                    1.000.000,00 - Rp 2.000.000,00</label> ||
                                                                <label><input type="radio" name="pendapatan_ortu"
                                                                        value="Rp 2.000.000,00 - Rp 3.500.000,00"
                                                                        <?php echo ($pd == 'Rp 2.000.000,00 - Rp 3.500.000,00') ? "checked" : ""  ?>>
                                                                    >Rp
                                                                    2.000.000,00 - Rp 3.500.000,00</label> ||
                                                                <label><input type="radio" name="pendapatan_ortu"
                                                                        value="Rp 3.500.000,00"
                                                                        <?php echo ($pd == 'Rp 3.500.000,00') ? "checked" : ""  ?>>
                                                                    > Rp
                                                                    3.500.000,00</label> ||

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
                                                                        value="<?php echo $mhs['nim'] ?>" required=""
                                                                        disabled>
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