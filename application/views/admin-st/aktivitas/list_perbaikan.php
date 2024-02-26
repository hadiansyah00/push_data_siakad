<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('admin-st/dist/header-st');
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/datatables/datatables.min.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>assets-new-look/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet"
    href="<?php echo base_url(); ?>assets-new-look/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>List Perbaikan Website SIAKAD</h1>
            <div class="section-header-breadcrumb">
                <!-- <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
                <div class="breadcrumb-item"><a href="#">Update Website</a></div> -->
                <!-- <div class="breadcrumb-item">Data Kurikulum</div> -->
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="activities">
                                        <?php foreach ($list as $row) : ?>
                                        <div class="activity">
                                            <div class="activity-icon bg-primary text-white shadow-primary">
                                                <i class="fas fa-comment-alt"></i>
                                            </div>
                                            <div class="activity-detail">
                                                <div class="mb-2">
                                                    <span
                                                        class="text-job text-primary"><?php echo time_elapsed_string($row->tgl_insert); ?></span>
                                                    <span class="bullet"></span>
                                                    <span class="text-job"><?php echo format_indo($row->tgl); ?></span>
                                                </div>
                                                <p><?php echo $row->list_perbaikan; ?></p>

                                            </div>
                                        </div>
                                        <?php endforeach; ?>
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
<?php $this->load->view('admin-st/dist/footer'); ?>