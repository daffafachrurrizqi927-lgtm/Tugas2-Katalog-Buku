# Sistem Informasi Katalog Buku Perpustakaan

Proyek ini adalah aplikasi berbasis web *Create, Read, Update, Delete* (CRUD) untuk pengelolaan inventaris buku perpustakaan. Aplikasi ini dibangun untuk memenuhi Tugas 2 mata kuliah Aplikasi Teknologi Online (ATOL).

## Fitur Utama
- **Sistem Login Keamanan:** Menggunakan `$_SESSION` dan enkripsi *password* MD5 untuk membatasi akses hanya kepada administrator.
- **Manajemen Data (CRUD):** Tambah, lihat, ubah, dan hapus data buku secara terstruktur.
- **Pencarian Data:** Fitur pencarian buku berdasarkan judul, penulis, atau kode buku menggunakan metode GET.
- **Multi-Bahasa (ID/EN):** Antarmuka tersedia dalam Bahasa Indonesia dan Bahasa Inggris yang statusnya disimpan di dalam session.
- **Keamanan Form:** Implementasi `htmlspecialchars()` untuk mencegah serangan *Cross-Site Scripting* (XSS) dan validasi `empty()` untuk form.

## Teknologi yang Digunakan
- **Backend:** PHP Native (Murni)
- **Database:** MySQL / MariaDB
- **Frontend:** HTML5 & CSS3 Native

## Panduan Instalasi
1. Clone repositori ini atau unduh *source code* dalam bentuk ZIP.
2. Pindahkan folder proyek ke dalam direktori server lokal Anda (misalnya `htdocs` untuk XAMPP).
3. Nyalakan modul Apache dan MySQL pada XAMPP Control Panel.
4. Buka `http://localhost/phpmyadmin` di browser Anda.
5. Buat database baru dengan nama `db_perpustakaan`.
6. Lakukan proses *Import* file `db_perpustakaan.sql` yang terdapat di dalam folder proyek ini.
7. Buka aplikasi melalui browser dengan mengakses `http://localhost/nama_folder_proyek/`.

## 🔐 Kredensial Login
Untuk masuk ke dalam sistem, gunakan akun administrator bawaan berikut:
- **Username:** `admin`
- **Password:** `admin123`
