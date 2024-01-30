<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('check_mahasiswa_level')) {
    function check_mahasiswa_level() {
        $CI = &get_instance();

        // Check if the user is logged in and has the 'level' session
        if ($CI->session->userdata('level')) {
            $level = $CI->session->userdata('level');

            // If the user is a mahasiswa, redirect them to the appropriate page
            if ($level === 'mahasiswa') {
                redirect('mhs/home');
            }
        }
    }
}