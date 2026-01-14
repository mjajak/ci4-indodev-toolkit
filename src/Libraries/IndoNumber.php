<?php

namespace Mjajak\Ci4IndodevToolkit\Libraries;

class IndoNumber
{

    /**
     * Contoh: Rp 1.500.000 => 1500000
     */
    public static function sanitize($string): int
    {
        return (int) preg_replace('/[^0-9]/', '', $string);
    }


    public static function number_only($angka): string
    {
        return number_format($angka, 0, ',', '.');
    }

    public static function rupiah($angka): string
    {
        return "Rp" . number_format($angka, 0, ',', '.');
    }

    public static function terbilang($n): string
    {
        $n = abs((float)$n);

        // Validasi batas angka: 1.000 Triliun ke atas
        if ($n >= 1000000000000000) {
            return "Angka Terlalu Besar";
        }

        $h = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];
        $temp = "";

        if ($n < 12) {
            $temp = " " . $h[$n];
        } else if ($n < 20) {
            $temp = self::terbilang($n - 10) . " Belas";
        } else if ($n < 100) {
            $temp = self::terbilang((int)($n / 10)) . " Puluh " . self::terbilang($n % 10);
        } else if ($n < 200) {
            $temp = " Seratus " . self::terbilang($n - 100);
        } else if ($n < 1000) {
            $temp = self::terbilang((int)($n / 100)) . " Ratus " . self::terbilang($n % 100);
        } else if ($n < 2000) {
            $temp = " Seribu " . self::terbilang($n - 1000);
        } else if ($n < 1000000) {
            $temp = self::terbilang((int)($n / 1000)) . " Ribu " . self::terbilang($n % 1000);
        } else if ($n < 1000000000) {
            $temp = self::terbilang((int)($n / 1000000)) . " Juta " . self::terbilang($n % 1000000);
        } else if ($n < 1000000000000) {
            $temp = self::terbilang((int)($n / 1000000000)) . " Miliar " . self::terbilang($n % 1000000000);
        } else if ($n < 1000000000000000) {
            $temp = self::terbilang((int)($n / 1000000000000)) . " Triliun " . self::terbilang(fmod($n, 1000000000000));
        }

        return trim(preg_replace('/\s+/', ' ', $temp));
    }
}
