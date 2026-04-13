<?php

namespace Mjajak\Ci4IndodevToolkit\Libraries;

class IndoSecurity
{
    /**
     * Sanitize user input
     */
    public function sanitize(string $data): string
    {
        return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    }

    /**
     * Sensor otomatis bagian tengah string.
     * Contoh NIK: 320101******0001 (Sisa 6 depan, 4 belakang)
     * Contoh HP: 0812****90 (Sisa 4 depan, 2 belakang)
     */
    public static function mask(string $string, int $keepFirst = 4, int $keepLast = 4): string
    {
        $keepFirst = max(0, $keepFirst);
        $keepLast = max(0, $keepLast);
        $len = strlen($string);

        if ($len === 0) {
            return '';
        }

        // Jika string terlalu pendek, sensor saja semuanya kecuali karakter pertama
        if ($len <= ($keepFirst + $keepLast)) {
            return substr($string, 0, 1) . str_repeat('*', $len - 1);
        }

        $midLen = $len - $keepFirst - $keepLast;
        $firstPart = substr($string, 0, $keepFirst);
        $lastPart = substr($string, -$keepLast);

        return $firstPart . str_repeat('*', $midLen) . $lastPart;
    }
}
