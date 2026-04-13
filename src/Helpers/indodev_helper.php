<?php

use Mjajak\Ci4IndodevToolkit\Libraries\IndoDate;
use Mjajak\Ci4IndodevToolkit\Libraries\IndoNumber;
use Mjajak\Ci4IndodevToolkit\Libraries\IndoValidation;
use Mjajak\Ci4IndodevToolkit\Libraries\IndoSecurity;


// Begin_Of_IndoDate_Functions
if (! function_exists('indo_date_lengkap')) {
    /** Format: Rabu, 14 Januari 2026 */
    function indo_date_lengkap($date)
    {
        return IndoDate::full($date);
    }
}

if (! function_exists('indo_date_ringkas')) {
    /** Format: 14 Januari 2026 */
    function indo_date_ringkas($date)
    {
        return IndoDate::simple($date);
    }
}

if (! function_exists('indo_date_bulan_tahun')) {
    /** Format: Januari 2026 */
    function indo_date_bulan_tahun($date)
    {
        return IndoDate::monthYear($date);
    }
}

if (! function_exists('indo_date_hari')) {
    /** Format: Rabu */
    function indo_date_hari($date)
    {
        return IndoDate::day($date);
    }
}

if (! function_exists('indo_date_bulan')) {
    /** Format: Januari */
    function indo_date_bulan($date)
    {
        return IndoDate::month($date);
    }
}

if (! function_exists('indo_date_tahun')) {
    /** Format: 2026 */
    function indo_date_tahun($date)
    {
        return IndoDate::year($date);
    }
}

if (! function_exists('indo_date_relative')) {
    /** Format: 2 hari yang lalu */
    function indo_date_relative($date)
    {
        return IndoDate::relative($date);
    }
}
// End_Of_IndoDate_Functions


// Begin_Of_IndoNumber_Functions
if (!function_exists('indo_number_sanitize')) {
    /** Contoh: Rp 1.500.000 => 1500000 */
    function indo_number_sanitize($string)
    {
        return IndoNumber::sanitize($string);
    }
}

if (!function_exists('indo_number_thousand_separator')) {
    function indo_number_thousand_separator($angka)
    {
        return IndoNumber::number_only($angka);
    }
}

if (!function_exists('indo_number_rupiah')) {
    function indo_number_rupiah($angka)
    {
        return IndoNumber::rupiah($angka);
    }
}

if (!function_exists('indo_number_terbilang')) {
    function indo_number_terbilang($angka)
    {
        return IndoNumber::terbilang($angka);
    }
}
// End_Of_IndoNumber_Functions

// Begin_Of_IndoValidation_Functions

if (! function_exists('is_nip')) {
    /** Validasi format NIP (18 digit) */
    function is_nip(string $nip): bool
    {
        return IndoValidation::nip($nip);
    }
}

if (! function_exists('is_nik')) {
    /** Validasi format NIK/KTP (16 digit) */
    function is_nik(string $nik): bool
    {
        return IndoValidation::nik($nik);
    }
}

if (! function_exists('is_phone')) {
    /** Validasi nomor HP Indonesia (08... atau +628...) */
    function is_phone(string $phone): bool
    {
        return IndoValidation::phone($phone);
    }
}

if (! function_exists('is_date')) {
    /** Validasi format tanggal (Y-m-d) */
    function is_date(string $date): bool
    {
        return IndoValidation::date($date);
    }
}

if (! function_exists('is_date_indo')) {
    /** Validasi format tanggal Indonesia (d-m-Y atau d/m/Y) */
    function is_date_indo(string $date): bool
    {
        return IndoValidation::date_indo($date);
    }
}

if (! function_exists('is_npwp')) {
    /** Validasi format NPWP (15 digit) */
    function is_npwp(string $npwp): bool
    {
        return IndoValidation::npwp($npwp);
    }
}

if (! function_exists('is_kode_pos')) {
    /** Validasi format Kode Pos Indonesia (5 digit) */
    function is_kode_pos(string $kodePos): bool
    {
        return IndoValidation::kodePos($kodePos);
    }
}
// End_Of_IndoValidation_Functions


// Begin_Of_IndoSecurity_Functions
if (! function_exists('indo_security_mask')) {
    /** * Sensor data sensitif (tengah otomatis). 
     * @param int $depan Jumlah karakter yang ditampilkan di depan
     * @param int $belakang Jumlah karakter yang ditampilkan di belakang
     */
    function indo_security_mask(string $string, int $depan = 4, int $belakang = 4): string
    {
        return IndoSecurity::mask($string, $depan, $belakang);
    }
}

// End_Of_IndoSecurity_Functions
