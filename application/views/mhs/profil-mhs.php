<style type="text/css">
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: #f6f6f6;
    color: #444;
    font-family: 'Roboto', sans-serif;
    font-size: 16px;
    line-height: 1;
}

.container {
    max-width: 1100px;
    padding: 0 20px;
    margin: 0 auto;
}

.panel {
    margin: 10px auto 10px;
    max-width: 500px;
    text-align: center;
}

.button_outer {
    background: #2F4F4F;
    border-radius: 30px;
    text-align: center;
    height: 50px;
    width: 200px;
    display: inline-block;
    transition: .2s;
    position: relative;
    overflow: hidden;
}

.button_save {
    background: #87CEFA;
    border-radius: 30px;
    text-align: center;
    height: 50px;
    width: 200px;
    display: inline-block;
    position: relative;
    overflow: hidden;
}

.btn_upload {
    padding: 17px 30px 12px;
    color: #fff;
    text-align: center;
    position: relative;
    display: inline-block;
    overflow: hidden;
    z-index: 3;
    white-space: nowrap;
}

.btn_upload input {
    position: absolute;
    width: 100%;
    left: 0;
    top: 0;
    width: 100%;
    height: 105%;
    cursor: pointer;
    opacity: 0;
}

.file_uploading {
    width: 100%;
    height: 10px;
    margin-top: 20px;
    background: #ccc;
}

.file_uploading .btn_upload {
    display: none;
}
</style>
<!-- End Breadcrumbs -->

<!-- ======= About Section ======= -->

<div class="container">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="#">Update</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="" data-toggle="modal" data-target="#exampleModal">Identitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" data-toggle="modal" data-target="#semester">Semester</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="" data-toggle="modal" data-target="#password">Password</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- end nav -->

    <div class="row">
        <div class="col-lg-3" data-aos="fade-right">
            <!-- Upload image -->
            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

            <?php if ($mhs['photo'] == NULL) { ?>
            <img src="<?php echo base_url('assets/images/default.jpg'); ?>" alt="" class="img-fluid rounded-circle">
            <?php } else { ?>
            <img src="<?php echo base_url('assets/images/uploads/' . $mhs['photo']); ?>" alt=""
                class="img-fluid rounded-circle">
            <?php } ?>
            <form class="form-horizontal" method="post" action="<?php echo base_url('mhs/profil/updatePhoto'); ?>"
                enctype="multipart/form-data">
                <input type="hidden" name="id_mahasiswa" value="<?php echo $mhs['id_mahasiswa']; ?>">
                <main class="main_full">
                    <div class="container">
                        <div class="panel">
                            <div class="button_outer">
                                <div class="btn_upload">
                                    <input type="file" id="upload_file" name="photo" required="">
                                    <i class="bx bx-upload"></i> Upload Image
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <main class="main_full">
                    <div class="container">
                        <div class="panel">
                            <button type="submit" class="button_save"><i class="bx bx-save"></i> Save</button>
                        </div>
                    </div>
                </main>
            </form>

            <!-- Button trigger modal -->
            <!--  <br><br>
            <p class="text-center">
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#upload">
              <i class="icofont-camera"></i> Upload
            </button>
            </p> -->
        </div>

        <div class="col-lg-9 pt-4 pt-lg-0 content" data-aos="fade-left">
            <h3>Informasi Akademik</h3>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-sm">
                        <tr>
                            <th><i class="icofont-rounded-right"></i> Prog. Studi </th>
                            <td>:</td>
                            <td><?php echo $mhs['jenjang']; ?> - <?php echo $mhs['jurusan']; ?></td>
                        </tr>
                        <tr>
                            <th><i class="icofont-rounded-right"></i> Nama Dospem </th>
                            <td>:</td>
                            <td><?php echo $mhs['nama_dosen']; ?></td>
                        </tr>
                        <tr>
                            <th><i class="icofont-rounded-right"></i> NIM </th>
                            <td>:</td>
                            <td><?php echo $mhs['nim']; ?></td>
                        </tr>
                        <tr>
                            <th> <i class="icofont-rounded-right"></i> Nama </th>
                            <td>:</td>
                            <td><?php echo $mhs['nama_mhs']; ?> <?php echo $mhs['nama_kepanjangan']; ?></td>
                        </tr>

                        <tr>
                            <th><i class="icofont-rounded-right"></i> Semester </th>
                            <td>:</td>
                            <td>
                                <?php echo $mhs['semester']; ?>
                            </td>
                        </tr>

                    </table>
                    <table class="table table-sm">

                    </table>
                </div>
                <!-- <div class="col-lg-6"> -->

                <!-- </div> -->
            </div>
            <h3>Identitas Mahasiswa</h3>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-sm">
                        <tr>
                            <th><i class="icofont-rounded-right"></i> No Hp/WhatsApp </th>
                            <td>:</td>
                            <td>
                                <?php echo $mhs['hp']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th><i class="icofont-rounded-right"></i> E-mail </th>
                            <td>:</td>
                            <td><?php echo $mhs['email']; ?></td>
                        </tr>
                        <tr>
                            <th><i class="icofont-rounded-right"></i> Agama </th>
                            <td>:</td>
                            <td><?php echo $mhs['agama']; ?></td>
                        </tr>
                        <tr>
                            <th> <i class="icofont-rounded-right"></i> Kota </th>
                            <td>:</td>
                            <td><?php echo $mhs['kota']; ?></td>
                        </tr>
                        <tr>
                            <th><i class="icofont-rounded-right"></i> Alamat </th>
                            <td>:</td>
                            <td><?php echo $mhs['alamat']; ?></td>
                        </tr>
                        <tr>
                            <th><i class="icofont-rounded-right"></i> Jenis Kelamin </th>
                            <td>:</td>
                            <td><?php echo $mhs['jk']; ?></td>
                        </tr>
                        <tr>
                            <th><i class="icofont-rounded-right"></i> TTL </th>
                            <td>:</td>
                            <td><?php echo $mhs['tempat_lahir']; ?>, <?php echo $mhs['tgl_lahir']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <h3>Indentitas Sekolah Asal</h3>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-sm">
                        <tr>
                            <th style="width: 180px;"><i class="icofont-rounded-right"></i> Asal Sekolah</th>
                            <td>:</td>
                            <td><?php echo $mhs['asal_sekolah']; ?></td>
                        </tr>
                        <tr>
                            <th> <i class="icofont-rounded-right"></i> NISN </th>
                            <td>:</td>
                            <td><?php echo $mhs['nisn']; ?></td>
                        </tr>

                    </table>
                </div>
            </div>
            <h3>Indentitas Orang Tua</h3>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-sm">
                        <tr>
                            <th style="width: 180px;"><i class="icofont-rounded-right"></i> Nama Ayah </th>
                            <td>:</td>
                            <td><?php echo $mhs['nama_ayah']; ?></td>
                        </tr>
                        <tr>
                            <th> <i class="icofont-rounded-right"></i> Nama Ibu </th>
                            <td>:</td>
                            <td><?php echo $mhs['nama_ibu']; ?></td>
                        </tr>
                        <tr>
                            <th><i class="icofont-rounded-right"></i> Alamat </th>
                            <td>:</td>
                            <td><?php echo $mhs['alamat_ortu']; ?></td>
                        </tr>
                        <tr>
                            <th><i class="icofont-rounded-right"></i> No Orantua / Kerabat </th>
                            <td>:</td>
                            <td><?php echo $mhs['hp_ortu']; ?></td>
                        </tr>
                        <tr>
                            <th><i class="icofont-rounded-right"></i> Kisaran Pendapatan </th>
                            <td>:</td>
                            <td><?php echo $mhs['pendapatan_ortu']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php echo $this->session->flashdata('pesan'); ?>

            <!-- Button trigger modal -->
            <!-- <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModal">
              Update
            </button> -->

        </div>
    </div>

</div>

<!-- Modal identitas-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Profil Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form class="form-horizontal form" method="post"
                    action="<?php echo base_url('mhs/profil/updateAksi') ?>">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> NIM</label>
                        <div class="col-sm-12">
                            <input type="hidden" name="id_mahasiswa" value="<?php echo $mhs['id_mahasiswa']; ?>">
                            <input type="hidden" name="tahun_masuk" value="<?php echo $mhs['tahun_masuk']; ?>">
                            <input type="text" class="form-control" name="nim" disabled=""
                                value="<?php echo $mhs['nim']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Nama Lengkap</label>
                        <div class="col-sm-12">
                            <input type="text" name="nama_mhs" value="<?php echo $mhs['nama_mhs']; ?>"
                                class="form-control" required="" readonly="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Agama </label>

                        <div class="col-sm-9">
                            <?php $ag = $mhs['agama']; ?>
                            <select name="agama" class="form-control">

                                <option name="agama" value="islam">Islam </option>
                                <option name="agama" value="Kristen"> Kristen </option>
                                <option name="agama" value="Konghucu"> Konghucu</option>
                                <option name="agama" value="Budha"> Budha </option>
                                <option name="agama" value="Hindu"> Hindu </option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Jenis Kelamin</label>

                        <div class="col-sm-9">
                            <?php $jk = $mhs['jk']; ?>
                            <label><input type="radio" name="jk" value="Laki-Laki"
                                    <?php echo ($jk == 'Laki-Laki') ? "checked" : ""  ?>> Laki-Laki</label> ||
                            <label><input type="radio" name="jk" value="Perempuan"
                                    <?php echo ($jk == 'Perempuan') ? "checked" : "" ?>> Perempuan</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Tempat, Tgl
                            Lahir</label>

                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" name="tempat_lahir" value="<?php echo $mhs['tempat_lahir']; ?>"
                                    class="form-control" required="">
                            </div>

                            <div class="col-sm-6">
                                <input type="date" name="tgl_lahir" value="<?php echo $mhs['tgl_lahir']; ?>"
                                    class="form-control" required="">
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Alamat</label>

                        <div class="col-sm-12">
                            <textarea name="alamat" class="form-control"
                                required=""><?php echo $mhs['alamat']; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Kota</label>

                        <div class="col-sm-12">
                            <input type="text" name="kota" value="<?php echo $mhs['kota']; ?>" class="form-control"
                                required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> WhatsApp</label>

                        <div class="col-sm-12">
                            <input type="number" name="hp" value="<?php echo $mhs['hp']; ?>" class="form-control"
                                required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Email</label>

                        <div class="col-sm-12">
                            <input type="email" name="email" value="<?php echo $mhs['email']; ?>" class="form-control">
                        </div>

                    </div>
                    <hr>
                    <h5>Identitas Sekolah Asal</h5>
                    <hr>
                    <div class="form-group">
                        <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Asal Sekolah </label>

                        <div class="col-sm-12">
                            <input type="text" name="asal_sekolah" value="<?php echo $mhs['asal_sekolah']; ?>"
                                class="form-control" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> NISN</label>

                        <div class="col-sm-12">
                            <input type="text" name="nisn" value="<?php echo $mhs['nisn']; ?>" class="form-control"
                                required="">
                        </div>
                    </div>

                    <hr>
                    <h5>Identitas Orang Tua</h5>
                    <hr>

                    <div class="form-group">
                        <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Nama Ayah</label>

                        <div class="col-sm-12">
                            <input type="text" name="nama_ayah" value="<?php echo $mhs['nama_ayah']; ?>"
                                class="form-control" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Nama Ibu</label>

                        <div class="col-sm-12">
                            <input type="text" name="nama_ibu" value="<?php echo $mhs['nama_ibu']; ?>"
                                class="form-control" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Alamat Ortu</label>

                        <div class="col-sm-12">
                            <textarea name="alamat_ortu" class="form-control"
                                required=""><?php echo $mhs['alamat_ortu']; ?></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Nomor Telp Orangtua /
                            Wali</label>

                        <div class="col-sm-12">
                            <input type="number" name="hp_ortu" value="<?php echo $mhs['hp_ortu']; ?>"
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Pendapatan
                            Orangtua</label>

                        <div class="col-sm-9">
                            <?php $pd = $mhs['pendapatan_ortu']; ?>
                            <label><input type="radio" name="pendapatan_ortu" value="Rp 500.000,00 - Rp 1.000.000,00"
                                    <?php echo ($pd == 'Rp 500.000,00 - Rp 1.000.000,00') ? "checked" : ""  ?>> >Rp
                                500.000,00 - Rp 1.000.000,00</label> ||
                            <label><input type="radio" name="pendapatan_ortu" value="Rp 1.000.000,00 - Rp 2.000.000,00"
                                    <?php echo ($pd == 'Rp 1.000.000,00 - Rp 2.000.000,00') ? "checked" : "" ?>> >Rp
                                1.000.000,00 - Rp 2.000.000,00</label> ||
                            <label><input type="radio" name="pendapatan_ortu" value="Rp 2.000.000,00 - Rp 3.500.000,00"
                                    <?php echo ($pd == 'Rp 2.000.000,00 - Rp 3.500.000,00') ? "checked" : ""  ?>> >Rp
                                2.000.000,00 - Rp 3.500.000,00</label> ||
                            <label><input type="radio" name="pendapatan_ortu" value="Rp 3.500.000,00"
                                    <?php echo ($pd == 'Rp 3.500.000,00') ? "checked" : ""  ?>> > Rp
                                3.500.000,00</label> ||

                        </div>
                    </div>



            </div>
            <div class="container">
                <div class="pull-left">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button><br><br>
                </div>
            </div>
            <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>"
                value="<?= $this->security->get_csrf_hash(); ?>">
            <!-- END FORM -->
            </form>

        </div>
    </div>
</div>




<!-- Modal Upload Photo-->
<div class="modal fade" id="upload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $mhs['nama_mhs']; ?>
                    <?php echo $mhs['nama_kepanjangan']; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-lg-3" data-aos="fade-right">
                        <img src="<?php echo base_url('assets/images/uploads/' . $mhs['photo']); ?>" class="img-fluid"
                            alt="">
                        <!-- Upload image -->
                        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                        <form class="form-horizontal" method="post"
                            action="<?php echo base_url('mhs/profil/updatePhoto'); ?>" enctype="multipart/form-data">
                            <input type="hidden" name="id_mahasiswa" value="<?php echo $mhs['id_mahasiswa']; ?>">
                            <main class="main_full">
                                <div class="container">
                                    <div class="panel">
                                        <div class="button_outer">
                                            <div class="btn_upload">
                                                <input type="file" id="upload_file" name="photo" required="">
                                                Upload Image
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </main>
                            <main class="main_full">
                                <div class="container">
                                    <div class="panel">
                                        <button type="submit" class="button_save">Save</button>
                                    </div>
                                </div>
                            </main>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal update semester -->
<div class="modal fade" id="semester" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Semester</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form class="form-horizontal form" method="post"
                    action="<?php echo base_url('mhs/profil/updateAksiSemester') ?>">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> NIM</label>
                        <div class="col-sm-12">
                            <input type="hidden" name="id_mahasiswa" value="<?php echo $mhs['id_mahasiswa']; ?>">
                            <input type="text" class="form-control" name="nim" disabled=""
                                value="<?php echo $mhs['nim']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Semester</label>
                        <?php $p = $mhs['semester'] ?>
                        <div class="col-sm-12">
                            <select name="semester" class="form-control">
                                <option <?php echo ($p == '1') ? "selected" : "" ?>>1</option>
                                <option <?php echo ($p == '2') ? "selected" : "" ?>>2</option>
                                <option <?php echo ($p == '3') ? "selected" : "" ?>>3</option>
                                <option <?php echo ($p == '4') ? "selected" : "" ?>>4</option>
                                <option <?php echo ($p == '5') ? "selected" : "" ?>>5</option>
                                <option <?php echo ($p == '6') ? "selected" : "" ?>>6</option>
                                <option <?php echo ($p == '7') ? "selected" : "" ?>>7</option>
                                <option <?php echo ($p == '8') ? "selected" : "" ?>>8</option>
                                <option <?php echo ($p == '7') ? "selected" : "" ?>>7</option>
                                <option <?php echo ($p == '8') ? "selected" : "" ?>>8</option>
                                <option <?php echo ($p == '7') ? "selected" : "" ?>>9</option>
                                <option <?php echo ($p == '8') ? "selected" : "" ?>>10</option>
                                <option <?php echo ($p == '7') ? "selected" : "" ?>>11</option>
                                <option <?php echo ($p == '8') ? "selected" : "" ?>>12</option>
                                <option <?php echo ($p == '7') ? "selected" : "" ?>>13</option>
                                <option <?php echo ($p == '8') ? "selected" : "" ?>>14</option>


                            </select>
                        </div>
                    </div>

            </div>
            <div class="container">
                <div class="pull-left">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button><br><br>
                </div>
            </div>
            <!-- END FORM -->
            </form>

        </div>
    </div>
</div>

<!-- Modal update password -->
<div class="modal fade" id="password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <form class="form-horizontal form" method="post"
                    action="<?php echo base_url('mhs/profil/updatePass'); ?>">

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> NIM</label>
                        <div class="col-sm-12">
                            <input type="hidden" name="id_mahasiswa" value="<?php echo $mhs['id_mahasiswa']; ?>">
                            <input type="text" class="form-control" name="nim" disabled=""
                                value="<?php echo $mhs['nim']; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-5 control-label no-padding-right" for="form-field-1"> Password</label>
                        <div class="col-sm-12">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="new password" required="">
                            <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

            </div>
            <div class="container">
                <div class="pull-left">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button><br><br>
                </div>
            </div>
            <!-- END FORM -->
            </form>

        </div>
    </div>
</div>

<script src="<?php echo base_url(); ?>assets/assets-mhs/js/modal.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> -->