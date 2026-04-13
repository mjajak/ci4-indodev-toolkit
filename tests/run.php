<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

$tests = [];

$tests[] = ['IndoDate full', indo_date_lengkap('2026-01-14'), 'Rabu, 14 Januari 2026'];
$tests[] = ['IndoDate simple', indo_date_ringkas('2026-01-14'), '14 Januari 2026'];
$tests[] = ['IndoDate invalid stays original', indo_date_ringkas('invalid'), 'invalid'];
$tests[] = ['IndoNumber rupiah', indo_number_rupiah(1500000), 'Rp1.500.000'];
$tests[] = ['IndoNumber sanitize', indo_number_sanitize('Rp 1.500.000'), 1500000];
$tests[] = ['IndoNumber terbilang', indo_number_terbilang(1250), 'Seribu Dua Ratus Lima Puluh'];
$tests[] = ['IndoValidation NIP', is_nip('199501012020011001'), true];
$tests[] = ['IndoValidation date indo', is_date_indo('14-01-2026'), true];
$tests[] = ['IndoValidation phone', is_phone('081234567890'), true];
$tests[] = ['IndoSecurity mask', indo_security_mask('3201011234560001', 6, 4), '320101******0001'];
$tests[] = ['IndoSecurity empty mask', indo_security_mask('', 4, 4), ''];

$failures = [];

foreach ($tests as [$label, $actual, $expected]) {
    if ($actual !== $expected) {
        $failures[] = sprintf(
            "[FAIL] %s\n  Expected: %s\n  Actual:   %s",
            $label,
            var_export($expected, true),
            var_export($actual, true)
        );
        continue;
    }

    echo sprintf("[PASS] %s", $label) . PHP_EOL;
}

if ($failures !== []) {
    echo PHP_EOL . implode(PHP_EOL . PHP_EOL, $failures) . PHP_EOL;
    exit(1);
}

echo PHP_EOL . sprintf('All %d tests passed.', count($tests)) . PHP_EOL;
