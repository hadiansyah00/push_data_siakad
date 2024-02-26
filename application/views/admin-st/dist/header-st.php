<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?php echo $title; ?> &mdash;SIAKAD-SBH</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/logo_sbh.png">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <?php
if ($this->uri->segment(2) == "" || $this->uri->segment(2) == "index") { ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets-new-look/modules/owlcarousel2/dist/assets-new-look/owl.carousel.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets-new-look/modules/owlcarousel2/dist/assets-new-look/owl.theme.default.min.css">
    <?php
}elseif ($this->uri->segment(2) == "index_0") { ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets-new-look/modules/weather-icon/css/weather-icons.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets-new-look/modules/weather-icon/css/weather-icons-wind.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/summernote/summernote-bs4.css">
    <?php
}elseif ($this->uri->segment(2) == "bootstrap_card") { ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/chocolat/dist/css/chocolat.css">
    <?php
}elseif ($this->uri->segment(2) == "bootstrap_modal") { ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/prism/prism.css">
    <?php
}elseif ($this->uri->segment(2) == "components_gallery") { ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/chocolat/dist/css/chocolat.css">
    <?php
}elseif ($this->uri->segment(2) == "components_multiple_upload") { ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/dropzonejs/dropzone.css">
    <?php
}elseif ($this->uri->segment(2) == "components_statistic") { ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/flag-icon-css/css/flag-icon.min.css">
    <?php
}elseif ($this->uri->segment(2) == "components_user") { ?>
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets-new-look/modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets-new-look/modules/owlcarousel2/dist/assets-new-look/owl.carousel.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets-new-look/modules/owlcarousel2/dist/assets-new-look/owl.theme.default.min.css">
    <?php
}elseif ($this->uri->segment(2) == "forms_advanced_form") { ?>
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets-new-look/modules/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets-new-look/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/jquery-selectric/selectric.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets-new-look/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets-new-look/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <?php
}elseif ($this->uri->segment(2) == "forms_editor") { ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/codemirror/theme/duotone-dark.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/jquery-selectric/selectric.css">
    <?php
}elseif ($this->uri->segment(2) == "modules_calendar") { ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/fullcalendar/fullcalendar.min.css">
    <?php
}elseif ($this->uri->segment(2) == "modules_datatables") { ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/datatables/datatables.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets-new-look/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets-new-look/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
    <?php
}elseif ($this->uri->segment(2) == "modules_ion_icons") { ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/ionicons/css/ionicons.min.css">
    <?php
}elseif ($this->uri->segment(2) == "modules_owl_carousel") { ?>
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets-new-look/modules/owlcarousel2/dist/assets-new-look/owl.carousel.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets-new-look/modules/owlcarousel2/dist/assets-new-look/owl.theme.default.min.css">
    <?php
}elseif ($this->uri->segment(2) == "modules_toastr") { ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/izitoast/css/iziToast.min.css">
    <?php
}elseif ($this->uri->segment(2) == "modules_vector_map") { ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/izitoast/css/iziToast.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/flag-icon-css/css/flag-icon.min.css">
    <?php
}elseif ($this->uri->segment(2) == "modules_weather_icon") { ?>
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets-new-look/modules/weather-icon/css/weather-icons.min.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets-new-look/modules/weather-icon/css/weather-icons-wind.min.css">
    <?php
}elseif ($this->uri->segment(2) == "auth_login") { ?>
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets-new-look/modules/bootstrap-social/bootstrap-social.css">
    <?php
}elseif ($this->uri->segment(2) == "auth_register") { ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/jquery-selectric/selectric.css">
    <?php
}elseif ($this->uri->segment(2) == "features_post_create") { ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/jquery-selectric/selectric.css">
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets-new-look/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <?php
}elseif ($this->uri->segment(2) == "features_posts") { ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/jquery-selectric/selectric.css">
    <?php
}elseif ($this->uri->segment(2) == "features_profile") { ?>
    <link rel="stylesheet"
        href="<?php echo base_url(); ?>assets-new-look/modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/summernote/summernote-bs4.css">
    <?php
}elseif ($this->uri->segment(2) == "features_setting_detail") { ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/codemirror/theme/duotone-dark.css">
    <?php
}elseif ($this->uri->segment(2) == "features_tickets") { ?>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/modules/chocolat/dist/css/chocolat.css">
    <?php
} ?>

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets-new-look/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<?php


  $this->load->view('admin-st/dist/layout-3');
  $this->load->view('admin-st/dist/navbar');

?>
