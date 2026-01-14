# CI4 Indodev Toolkit 🇮🇩

CI4 Indodev Toolkit adalah library CodeIgniter 4 yang dirancang khusus untuk mempermudah developer Indonesia dalam menangani format data lokal, seperti tanggal, mata uang, angka terbilang, dan validasi identitas resmi (NIP/NIK/NPWP).

## Fitur Utama

- **📅 IndoDate**: Konversi tanggal ke format Indonesia (Lengkap, Ringkas, Hari, Bulan, Tahun) dan Waktu Relatif
- **💰 IndoNumber/Currency**: Format Rupiah, Pemisah Ribuan, Sanitasi Angka, dan Terbilang (hingga Triliun)
- **✅ IndoValidation**: Validasi cerdas untuk NIP, NIK, NPWP, Nomor HP, dan Kode Pos
- **🔒 IndoSecurity**: Masking data sensitif dengan menyensor bagian tengah

## Instalasi

```bash
composer require mjajak/ci4-indodev-toolkit
```

Library akan otomatis memuat (auto-load) helper sehingga bisa langsung digunakan di Controller dan View.

## Penggunaan

### 1. Fungsi Tanggal (IndoDate)

```php
echo indo_date_lengkap('2026-01-14');      // Rabu, 14 Januari 2026
echo indo_date_ringkas('2026-01-14');      // 14 Januari 2026
echo indo_date_hari('2026-01-14');         // Rabu
echo indo_date_relative('2026-01-14 10:00:00'); // 3 jam yang lalu
```

### 2. Fungsi Angka & Rupiah (IndoNumber)

```php
echo indo_number_rupiah(1500000);          // Rp1.500.000
echo indo_number_terbilang(1250);          // Seribu Dua Ratus Lima Puluh
echo indo_number_sanitize('Rp 1.500.000'); // 1500000
```

### 3. Fungsi Validasi (IndoValidation)

```php
is_nip('199501012020011001');   // Validasi 18 digit & kalender
is_nik('320101...');             // Validasi 16 digit & logika
is_phone('081234567890');        // Format HP Indonesia
is_date_indo('14-01-2026');      // Validasi tanggal format lokal
```

### 4. Fungsi Keamanan (IndoSecurity)

```php
echo indo_security_mask('3201011234560001', 6, 4); // 320101****0001
echo indo_security_mask('081234567890', 4, 2);     // 0812****90
```

## Kontribusi

Kontribusi terbuka untuk semua! Jika Anda menemukan bug atau ingin menambahkan fitur baru, silakan buat Pull Request atau Issue di GitHub.

## Lisensi

Dirilis di bawah Lisensi MIT.

Dibuat dengan ❤️ untuk Developer Indonesia.
