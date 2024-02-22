<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('time_elapsed_string')) {
    function time_elapsed_string($datetime, $full = false) {
        date_default_timezone_set('Asia/Jakarta'); // Atur zona waktu sesuai kebutuhan

        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'tahun',
            'm' => 'bulan',
            'w' => 'minggu',
            'd' => 'hari',
            'h' => 'jam',
            'i' => 'menit',
            's' => 'detik',
        );

        foreach ($string as $key => &$value) {
            if ($diff->$key) {
                $value = $diff->$key . ' ' . $value . ($diff->$key > 1 ? '' : '');
            } else {
                unset($string[$key]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' yang lalu' : 'baru saja';
    }
}