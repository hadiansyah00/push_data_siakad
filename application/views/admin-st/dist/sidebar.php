<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
$users_sessions = $this->UserModel->getDataUser();
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
                    href="<?php echo base_url(); ?>admin/dashboard"><i class="fas fa-fire"></i><span>Dashboard
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
            <?php if ($users_sessions['role'] == 'admin' || $users_sessions['role'] == 'baak') { ?>
            <li class="menu-header">Data Master</li>
            <li
                class="dropdown <?php echo $this->uri->segment(2) == 'mahasiswa' || $this->uri->segment(2) == 'dosen' || $this->uri->segment(2) == 'jurusan' || $this->uri->segment(2) == 'matakuliah' || $this->uri->segment(2) == 'kurikulum'  ? 'active' : ''; ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Data Master</span></a>
                <ul class="dropdown-menu">
                    <li class="<?php echo $this->uri->segment(2) == 'mahasiswa' ? 'active' : ''; ?>"><a class="nav-link"
                            href="<?php echo base_url(); ?>admin/mahasiswa">Data Mahasiswa</a>
                    </li>
                    <li class="<?php echo $this->uri->segment(2) == 'dosen' ? 'active' : ''; ?>"><a class="nav-link"
                            href="<?php echo base_url(); ?>admin/dosen">Data Dosen</a>
                    </li>
                    <li class="<?php echo $this->uri->segment(2) == 'jurusan' ? 'active' : ''; ?>"><a class="nav-link"
                            href="<?php echo base_url(); ?>admin/jurusan">Data Prog. Studi</a>
                    </li>
                    <li class="<?php echo $this->uri->segment(2) == 'matakuliah' ? 'active' : ''; ?>"><a
                            class="nav-link" href="<?php echo base_url(); ?>admin/matakuliah">Data Kurikulum</a>
                    </li>
                    <li class="<?php echo $this->uri->segment(2) == 'kurikulum' ? 'active' : ''; ?>"><a class="nav-link"
                            href="<?php echo base_url(); ?>admin/kurikulum">Data Matakuliah</a>
                    </li>
                    <li class="<?php echo $this->uri->segment(2) == 'kaldik' ? 'active' : ''; ?>"><a class="nav-link"
                            href="<?php echo base_url(); ?>admin/kaldik">Data Kaldik</a>
                    </li>
            </li>
        </ul>
        </li>
        <?php } else  {  ?>

        <?php } ?>


        <li class="menu-header">Informasi Akademik</li>
        <?php if ($users_sessions['role'] == 'admin' || $users_sessions['role'] == 'upmi') { ?>
        <li
            class="dropdown <?php echo $this->uri->segment(2) == 'KusionerEdom' || $this->uri->segment(2) == 'evaluasi' || $this->uri->segment(3) == 'getEdom'  ? 'active' : ''; ?>">
            <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Data Evaluasi
                    Dosen</span></a>
            <ul class="dropdown-menu">
                <li class="<?php echo $this->uri->segment(2) == 'KusionerEdom' ? 'active' : ''; ?>"><a class="nav-link "
                        href="<?php echo base_url(); ?>admin/KusionerEdom"> Evaluasi Dosen</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'evaluasi' ? 'active' : ''; ?>"><a class="nav-link"
                        href="<?php echo base_url(); ?>admin/evaluasi">Pertanyaan Edom</a>
                </li>
                <li class="<?php echo $this->uri->segment(2) == 'evaluasi' ? 'active' : ''; ?>"><a class="nav-link"
                        href="<?php echo base_url(); ?>admin/Praktikum">Praktik EDOM</a>
                </li>
            </ul>
        </li>
        <?php } else  {  ?>

        <?php } ?>
        <?php if ($users_sessions['role'] == 'admin' || $users_sessions['role'] == 'baak') { ?>
        <li
            class="dropdown <?php echo $this->uri->segment(2) == 'jadwal' || $this->uri->segment(2) == 'jadwaluts' || $this->uri->segment(2) == 'jadwaluas'|| $this->uri->segment(2) == 'Jadwal_pra_uap'|| $this->uri->segment(2) == 'Jadwal_uap'|| $this->uri->segment(2) == 'nilai_akhir'  ? 'active' : ''; ?>">
            <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Data Jadwal</span></a>
            <ul class="dropdown-menu">

                <li class="<?php echo $this->uri->segment(2) == 'jadwal' ? 'active' : ''; ?>"><a class="nav-link"
                        href="<?php echo base_url(); ?>admin/jadwal"> Jadwal Kuliah</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'jadwaluts' ? 'active' : ''; ?>"><a class="nav-link"
                        href="<?php echo base_url(); ?>admin/jadwaluts"> Jadwal UTS</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'jadwaluas' ? 'active' : ''; ?>"><a class="nav-link"
                        href="<?php echo base_url(); ?>admin/jadwaluas"> Jadwal UAS</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'Jadwal_pra_uap' ? 'active' : ''; ?>"><a
                        class="nav-link" href="<?php echo base_url(); ?>admin/Jadwal_pra_uap"> Jadwal Pra UAP</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'Jadwal_uap' ? 'active' : ''; ?>"><a class="nav-link"
                        href="<?php echo base_url(); ?>admin/Jadwal_uap"> Jadwal UAP</a></li>
            </ul>
        </li>

        <li
            class="dropdown <?php echo $this->uri->segment(2) == 'Krs' || $this->uri->segment(2) == 'KrsView' || $this->uri->segment(2) == 'Khs'|| $this->uri->segment(2) == 'NilaiUts'|| $this->uri->segment(2) == 'NilaiUas'|| $this->uri->segment(2) == 'nilai_akhir' ? 'active' : ''; ?>">
            <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Data Nilai</span></a>
            <ul class="dropdown-menu">

                <li class="<?php echo $this->uri->segment(2) == 'nilai' ? 'active' : ''; ?>"><a class="nav-link"
                        href="<?php echo base_url(); ?>admin/nilai"> Input Nilai</a></li>
                <li class="<?php echo $this->uri->segment(2) == 'Khs' ? 'active' : ''; ?>"><a class="nav-link"
                        href="<?php echo base_url(); ?>admin/nilai/transkrip"> Transkrip Nilai</a></li>

            </ul>
        </li>
        <?php } else  {  ?>

        <?php } ?>
        <?php if ($users_sessions['role'] == 'admin' || $users_sessions['role'] == 'bauk') { ?>
        <li class="menu-header">Administrasi</li>
        <li class="<?php echo $this->uri->segment(2) == 'B1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>bauk/B1e4ae549321b0f7d75d8dcf4c2ecd7ed95b68ab"><i
                    class="fas fa-pencil-ruler"></i>
                <span>Aktivasi Mahasiswa</span></a>
        </li>
        <li class="<?php echo $this->uri->segment(2) == 'Aktivasi_uap' ? 'active' : ''; ?>">
            <a class="nav-link" href="<?php echo base_url(); ?>bauk/Aktivasi_uap"><i class="fas fa-pencil-ruler"></i>
                <span>Pra UAP/UAP</span></a>
        </li>
        <?php } else  {  ?>

        <?php } ?>
        <?php if ($users_sessions['role'] == 'admin')  { ?>
        <li class="menu-header">Admin</li>

        <li class="<?php echo $this->uri->segment(2) == 'settings' ? 'active' : ''; ?>"><a class="nav-link"
                href="<?php echo base_url(); ?>admin/settings"><i class="fas fa-pencil-ruler"></i>
                <span>Pengaturan</span></a></li>
        <li class="<?php echo $this->uri->segment(2) == 'aktivitas' ? 'active' : ''; ?>"><a class="nav-link"
                href="<?php echo base_url(); ?>admin/aktivitas"><i class="fas fa-pencil-ruler"></i>
                <span>Aktivitas</span></a></li>
        <?php } else  {  ?>

        <?php } ?>

        </ul>

        </ aside>
</div>