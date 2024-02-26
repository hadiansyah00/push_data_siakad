<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2024 <div
            class="bullet <?php echo $this->uri->segment(3) == 'AktivitasMhs' ? 'active' : ''; ?>"></div> Design By <a
            href="https://hadi-portfolio-react-s5n8.vercel.app/">ICT DIVISION</a> | <a
            href="<?php echo base_url('mhs/AktivitasMhs') ?>">List Pembaharuan Update
            SIAKAD 1.00</a>
    </div>
    <div class="footer-right">

    </div>
</footer>
</div>
</div>

<?php $this->load->view('mhs/dist/js'); ?>