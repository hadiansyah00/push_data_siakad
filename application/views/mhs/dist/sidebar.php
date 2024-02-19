<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#"> <img class="img-circle" src="<?php echo base_url() ?>assets/img/logo_sbh.png" alt=""
                    style="width: 50px; height: 40px;" />
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">SBH</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="<?php echo $this->uri->segment(2) == 'index' ? 'active' : ''; ?>"><a class="nav-link"
                    href="<?php echo base_url(); ?>mhs/home"><i class="fas fa-fire"></i><span>Dashboard
                    </span></a>
            </li>
            <!-- <li
                class="dropdown <?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'index' || $this->uri->segment(2) == 'index_0' ? 'active' : ''; ?>">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class="<?php echo $this->uri->segment(2) == 'index_0' ? 'active' : ''; ?>"><a class="nav-link"
                            href="<?php echo base_url(); ?>mhs/dist/index_0">General Dashboard</a></li>
                    <li
                        class="<?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'index' ? 'active' : ''; ?>">
                        <a class="nav-link" href="<?php echo base_url(); ?>dist/index">Ecommerce Dashboard</a>
                    </li>
                </ul>
            </li> -->
            <li class="menu-header">Informasi Akademik</li>
            <li
                class="dropdown <?php echo $this->uri->segment(2) == 'jadwal' || $this->uri->segment(2) == 'jadwaluts' || $this->uri->segment(2) == 'Jadwalprauap' || $this->uri->segment(2) == 'Jadwaluap' || $this->uri->segment(2) == 'Jadwaluap' || $this->uri->segment(2) == 'jadwaluas' ? 'active' : ''; ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Jadwal Perkuliahan</span></a>
                <ul class="dropdown-menu">
                    <li class="<?php echo $this->uri->segment(2) == 'jadwal' ? 'active' : ''; ?>"><a class="nav-link"
                            href="<?php echo base_url(); ?>mhs/jadwal">Jadwal Kuliah</a>
                    </li>
                    <?php if ($mhs['status_uts'] == 0 ) { ?>
                    <li class="<?php echo $this->uri->segment(2) == 'jadwaluts' ? 'active' : ''; ?>"> <a href="#"
                            class="nav-link" data-toggle="modal" data-target="#ModalVerfikasiBauk"> Jadwal UTS</a>

                        <?php } else { ?>
                    <li class="<?php echo $this->uri->segment(2) == 'jadwaluts' ? 'active' : ''; ?>"><a class="nav-link"
                            href="<?php echo base_url(); ?>mhs/jadwaluts">Jadwal UTS</a></li>
            </li>
            <?php } ?>
            <?php if ($mhs['status_uas'] == 0 ) { ?>
            <li class="<?php echo $this->uri->segment(2) == 'jadwaluas' ? 'active' : ''; ?>"> <a href="#"
                    class="nav-link" data-toggle="modal" data-target="#ModalVerfikasiBauk"> Jadwal UAS</a>

                <?php } else { ?>
            <li class="<?php echo $this->uri->segment(2) == 'jadwaluas' ? 'active' : ''; ?>"><a class="nav-link"
                    href="<?php echo base_url(); ?>mhs/jadwaluas">Jadwal UAS</a></li>
            </li>
            <?php } ?>


            <?php if ($mhs['kd_jurusan'] == 15401) { ?>
            <?php if ($mhs['status_pra_uap'] == 0 ) { ?>
            <li class="<?php echo $this->uri->segment(2) == 'Jadwalprauap' ? 'active' : ''; ?>">
                <a href="#" class="nav-link" data-toggle="modal" data-target="#ModalVerfikasiBauk"> Jadwal Pra UAP</a>
            </li>
            <?php } else { ?>
            <li class="<?php echo $this->uri->segment(2) == 'Jadwalprauap' ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>mhs/Jadwalprauap">Jadwal Pra UAP</a>
            </li>
            <?php } ?>

            <?php if ($mhs['status_uap'] == 0 ) { ?>
            <li class="<?php echo $this->uri->segment(2) == 'Jadwaluap' ? 'active' : ''; ?>">
                <a href="#" class="nav-link" data-toggle="modal" data-target="#ModalVerfikasiBauk"> Jadwal UAP</a>
            </li>
            <?php } else { ?>
            <li class="<?php echo $this->uri->segment(2) == 'Jadwaluap' ? 'active' : ''; ?>">
                <a class="nav-link" href="<?php echo base_url(); ?>mhs/Jadwaluap">Jadwal UAP</a>
            </li>
            <?php } ?>
            <?php } ?>



        </ul>
        </li>


        <li class="menu-header">Akademik</li>

        <li
            class="dropdown <?php echo $this->uri->segment(2) == 'Krs' || $this->uri->segment(2) == 'KrsView' || $this->uri->segment(2) == 'Khs'|| $this->uri->segment(2) == 'NilaiUts'|| $this->uri->segment(2) == 'NilaiUas'|| $this->uri->segment(2) == 'nilai_akhir' ? 'active' : ''; ?>">
            <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Akademik</span></a>
            <ul class="dropdown-menu">
                <?php if ($mhs['status'] == 0 ) { ?>

                <li class="<?php echo $this->uri->segment(2) == 'Krs' ? 'active' : ''; ?>"> <a href="#" class="nav-link"
                        data-toggle="modal" data-target="#ModalVerfikasiBauk">Isi KRS</a>
                </li>
        </li>
        <?php } else { ?>

        <li class="<?php echo $this->uri->segment(2) == 'Krs' ? 'active' : ''; ?>"><a class="nav-link"
                href="<?php echo base_url(); ?>mhs/Krs">Input KRS</a>
        </li>
        <?php } ?>

        <?php if ($mhs['status'] == 0 ) { ?>
        <li class="<?php echo $this->uri->segment(2) == 'KrsView' ? 'active' : ''; ?>"> <a href="#" class="nav-link"
                data-toggle="modal" data-target="#ModalVerfikasiBauk"> Lihat KRS</a>

            <?php } else { ?>
        <li class="<?php echo $this->uri->segment(2) == 'KrsView' ? 'active' : ''; ?>"><a class="nav-link"
                href="<?php echo base_url(); ?>mhs/KrsView">Lihat KRS</a></li>
        </li>
        <?php } ?>


        <?php if ($mhs['status_nilai_uts'] == 0 ) { ?>
        <li class="<?php echo $this->uri->segment(2) == 'NilaiUts' ? 'active' : ''; ?>"> <a href="#" class="nav-link"
                data-toggle="modal" data-target="#ModalVerfikasiBauk"> Nilai UTS</a>

            <?php } else { ?>
        <li class="<?php echo $this->uri->segment(2) == 'NilaiUts' ? 'active' : ''; ?>"><a class="nav-link"
                href="<?php echo base_url(); ?>mhs/NilaiUts">Nilai UTS</a></li>
        </li>
        <?php } ?>


        <?php if ($mhs['status_nilai_uas'] == 0 ) { ?>
        <li class="<?php echo $this->uri->segment(2) == 'NilaiUas' ? 'active' : ''; ?>"> <a href="#" class="nav-link"
                data-toggle="modal" data-target="#ModalVerfikasiBauk"> Nilai UAS</a>

            <?php } else { ?>
        <li class="<?php echo $this->uri->segment(2) == 'NilaiUas' ? 'active' : ''; ?>"><a class="nav-link"
                href="<?php echo base_url(); ?>mhs/NilaiUas">Nilai UAS</a></li>
        </li>
        <?php } ?>

        <li class="<?php echo $this->uri->segment(2) == 'nilai_akhir' ? 'active' : ''; ?>"><a class="nav-link"
                href="<?php echo base_url(); ?>mhs/nilai_akhir">Nilai Akhir</a></li>
        </li>
        <?php if ($mhs['status_nilai_khs'] == 0 ) { ?>
        <li class="<?php echo $this->uri->segment(2) == 'Khs' ? 'active' : ''; ?>"> <a href="#" class="nav-link"
                data-toggle="modal" data-target="#ModalVerfikasiBauk">Lihat KHS</a>
        </li>
        <?php } else { ?>
        <li class="<?php echo $this->uri->segment(2) == 'Khs' ? 'active' : ''; ?>"><a class="nav-link"
                href="<?php echo base_url(); ?>mhs/Khs"> Lihat KHS</a></li>

        <?php } ?>

        </ul>
        </li>


        <li class="<?php echo $this->uri->segment(2) == 'transkrip' ? 'active' : ''; ?>"><a class="nav-link"
                href="<?php echo base_url(); ?>mhs/transkrip"><i class="far fa-file-alt"></i>
                <span>Transkrip Nilai</span></a></li>
        <li class="menu-header">Administrasi</li>

        <li class="<?php echo $this->uri->segment(2) == 'administrasi' ? 'active' : ''; ?>"><a class="nav-link"
                href="<?php echo base_url(); ?>mhs/administrasi"><i class="fas fa-pencil-ruler"></i>
                <span>Administrasi</span></a></li>
        </ul>


    </aside>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="ModalVerfikasiBauk">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Verfikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Cek Administrasi / Verfikasi Pembayaran ke <font color="red"> BAUK!</font>
                    </h2>
                </p>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
