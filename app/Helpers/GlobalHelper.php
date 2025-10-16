<?php

if (!function_exists('salamWaktu')) {
    /**
     * Menghasilkan salam berdasarkan waktu saat ini.
     *
     * @return string
     */
    function salamWaktu()
    {
        $hour = date('H');

        if ($hour < 11) {
            return 'Selamat Pagi';
        } elseif ($hour < 15) {
            return 'Selamat Siang';
        } elseif ($hour < 18) {
            return 'Selamat Sore';
        } else {
            return 'Selamat Malam';
        }
    }
}
