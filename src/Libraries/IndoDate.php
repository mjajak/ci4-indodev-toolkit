<?php

namespace Mjajak\Ci4IndodevToolkit\Libraries;

class IndoDate
{
    private static $hari = [
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu'
    ];

    private static $bulan = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    ];

    private static function parseTimestamp($date): ?int
    {
        if (! is_scalar($date)) {
            return null;
        }

        $date = trim((string) $date);
        if ($date === '') {
            return null;
        }

        $timestamp = strtotime($date);

        return $timestamp === false ? null : $timestamp;
    }

    private static function originalOrEmpty($date): string
    {
        return is_scalar($date) ? trim((string) $date) : '';
    }



    public static function full($date): string
    {
        $ts = self::parseTimestamp($date);
        if ($ts === null) {
            return self::originalOrEmpty($date);
        }

        return self::$hari[date('l', $ts)] . ", " . date('j', $ts) . " " . self::$bulan[(int)date('n', $ts)] . " " . date('Y', $ts);
    }

    public static function simple($date): string
    {
        $ts = self::parseTimestamp($date);
        if ($ts === null) {
            return self::originalOrEmpty($date);
        }

        return date('j', $ts) . " " . self::$bulan[(int)date('n', $ts)] . " " . date('Y', $ts);
    }

    public static function withTime($date): string
    {
        $ts = self::parseTimestamp($date);
        if ($ts === null) {
            return self::originalOrEmpty($date);
        }

        return self::full($date) . " " . date('H:i', $ts);
    }

    public static function monthYear($date): string
    {
        $ts = self::parseTimestamp($date);
        if ($ts === null) {
            return self::originalOrEmpty($date);
        }

        return self::$bulan[(int)date('n', $ts)] . " " . date('Y', $ts);
    }

    public static function day($date): string
    {
        $ts = self::parseTimestamp($date);
        if ($ts === null) {
            return self::originalOrEmpty($date);
        }

        return self::$hari[date('l', $ts)];
    }
    public static function month($date): string
    {
        $ts = self::parseTimestamp($date);
        if ($ts === null) {
            return self::originalOrEmpty($date);
        }

        return self::$bulan[(int)date('n', $ts)];
    }
    public static function year($date): string
    {
        $ts = self::parseTimestamp($date);
        if ($ts === null) {
            return self::originalOrEmpty($date);
        }

        return date('Y', $ts);
    }
    public static function time($date): string
    {
        $ts = self::parseTimestamp($date);
        if ($ts === null) {
            return self::originalOrEmpty($date);
        }

        return date('H:i:s', $ts);
    }

    public static function relative($date): string
    {
        $ts = self::parseTimestamp($date);
        if ($ts === null) {
            return self::originalOrEmpty($date);
        }

        $diff = time() - $ts;

        if ($diff < 1) return 'Baru saja';

        $intervals = [
            31536000 => 'tahun',
            2592000  => 'bulan',
            604800   => 'minggu',
            86400    => 'hari',
            3600     => 'jam',
            60       => 'menit',
            1        => 'detik'
        ];

        foreach ($intervals as $sec => $label) {
            $div = $diff / $sec;
            if ($div >= 1) {
                $n = round($div);
                return $n . ' ' . $label . ' yang lalu';
            }
        }
        return $date;
    }
}
