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
                    href="<?php echo base_url(); ?>dosen/home"><i class="fas fa-fire"></i><span>Dashboard
                    </span></a>
            </li>

            <li class="menu-header">Informasi Akademik</li>
            <li
                class="dropdown <?php echo $this->uri->segment(2) == 'mhskrs' || $this->uri->segment(2) == 'jadwaluts' || $this->uri->segment(2) == 'Jadwalprauap' || $this->uri->segment(2) == 'Jadwaluap' || $this->uri->segment(2) == 'Jadwaluap' || $this->uri->segment(2) == 'jadwaluas' ? 'active' : ''; ?>">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Mahasiswa Didik</span></a>
                <ul class="dropdown-menu">

                    <li class="<?php echo $this->uri->segment(2) == '#' ? 'active' : ''; ?>"><a class="nav-link"
                            href="#">Verfikasi Mahasiswa </a>
                    </li>

                    <li class="<?php echo $this->uri->segment(2) == 'mhskrs' ? 'active' : ''; ?>"><a class="nav-link"
                            href="<?php echo base_url(); ?>dosen/mhskrs">Mahsiswa Didik</a>
                    </li>
                </ul>
            </li>


            <li class="menu-header">EDOM</li>

            <li
                class="dropdown <?php echo $this->uri->segment(2) == 'Krs' || $this->uri->segment(2) == 'KrsView' || $this->uri->segment(2) == 'Khs'|| $this->uri->segment(2) == 'NilaiUts'|| $this->uri->segment(2) == 'NilaiUas'|| $this->uri->segment(2) == 'nilai_akhir' ? 'active' : ''; ?>">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>EDOM</span></a>
                <ul class="dropdown-menu">

            </li>
            <li class="<?php echo $this->uri->segment(2) == 'Krs' ? 'active' : ''; ?>"><a class="nav-link"
                    href="<?php echo base_url(); ?>mhs/Krs">Hasil EDOM</a>
            </li>

        </ul>
        </li>
        </ul>

    </aside>
</div>

</div>