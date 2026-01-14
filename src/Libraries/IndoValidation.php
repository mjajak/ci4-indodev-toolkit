<?php

namespace Mjajak\Ci4IndodevToolkit\Libraries;

class IndoValidation
{
    /**
     * Validasi NIP (18 Digit angka)
     */
    public static function nip(string $nip): bool
    {
        $nip = str_replace([' ', '-'], '', $nip);
        return preg_match('/^[0-9]{18}$/', $nip) === 1;
    }

    /**
     * Validasi NIK / KTP (16 Digit angka)
     */
    public static function nik(string $nik): bool
    {
        $nik = str_replace([' ', '-'], '', $nik);
        return preg_match('/^[0-9]{16}$/', $nik) === 1;
    }

    /**
     * Validasi Nomor Telepon Indonesia (08xxx atau +628xxx)
     */
    public static function phone(string $phone): bool
    {
        $phone = str_replace([' ', '-', '.'], '', $phone);
        // Mendukung format 08... atau +628... minimal 10 digit, maksimal 15 digit
        return preg_match('/^(\+62|0)8[1-9][0-9]{7,11}$/', $phone) === 1;
    }

    public static function date($date): bool
    {
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) return false;

        $parts = explode('-', $date);
        return checkdate((int)$parts[1], (int)$parts[2], (int)$parts[0]);
    }

    /**
     * Validasi Tanggal Format Indonesia (DD-MM-YYYY atau DD/MM/YYYY)
     * Cocok untuk validasi form input user
     */
    public static function date_indo($date): bool
    {
        // Mendukung pemisah strip (-) atau garis miring (/)
        $sep = strpos($date, '/') !== false ? '/' : '-';
        $parts = explode($sep, $date);

        if (count($parts) !== 3) return false;

        // checkdate(bulan, tanggal, tahun)
        return checkdate((int)$parts[1], (int)$parts[0], (int)$parts[2]);
    }

    /** Validasi NPWP (15 Digit angka) */
    public static function npwp(string $npwp): bool
    {
        $npwp = preg_replace('/[^0-9]/', '', $npwp);
        return strlen($npwp) === 15;
    }

    /** Validasi Kode Pos (5 Digit) */
    public static function kodePos(string $pos): bool
    {
        return preg_match('/^[0-9]{5}$/', $pos) === 1;
    }
}
