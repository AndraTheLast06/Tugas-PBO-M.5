# Mini Project Advanced OOP – Pengelolaan Obat

## Masalah
Program stok obat dari minggu sebelumnya dikembangkan agar memiliki beberapa jenis item dengan cara peminjaman berbeda.

## Class yang digunakan
- `Obat`: abstract class untuk data umum.
- `ObatTablet`: obat fisik yang mengurangi stok saat dipinjam.
- `ObatDigital`: item digital yang tidak mengurangi stok fisik.
- `BisaDipinjam`: interface untuk method `pinjam()`.
- `DaftarPeminjaman`: menyimpan dan memproses objek pinjaman.

## Konsep OOP
- **Inheritance:** `ObatTablet` dan `ObatDigital` mewarisi `Obat`.
- **Overriding:** kedua subclass memiliki method `info()` dengan hasil berbeda.
- **Polymorphism:** daftar memproses objek melalui interface `BisaDipinjam`.
- **Abstraction:** `Obat` merupakan abstract class.
- **Interface:** `BisaDipinjam` menetapkan method `pinjam()`.
- **Composition:** `DaftarPeminjaman` menyimpan beberapa objek.

## Validasi dan pengujian
Nama tidak boleh kosong dan stok tidak boleh negatif. Program menguji peminjaman obat tablet dan item digital. Obat tablet mengurangi stok, sedangkan item digital tidak.

## Cara menjalankan
Jalankan di terminal:

```bash
php 20251020015_Andra_PBO_M5.php
```

## Kesimpulan
Konsep Advanced OOP membuat program lebih mudah dikembangkan ketika ada jenis obat baru dengan perilaku berbeda.
