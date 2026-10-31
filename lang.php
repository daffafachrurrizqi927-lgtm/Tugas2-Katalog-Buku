<?php
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
$lang = isset($_SESSION['lang']) ? $_SESSION['lang'] : 'id';

$kamus = [
    'id' => [
        'title' => 'Sistem Katalog Buku',
        'login_title' => 'Masuk ke Sistem',
        'login_btn' => 'Masuk',
        'logout' => 'Keluar',
        'add' => 'Tambah Buku Baru',
        'kode' => 'Kode Buku',
        'judul' => 'Judul Buku',
        'penulis' => 'Penulis',
        'action' => 'Aksi',
        'save' => 'Simpan Data',
        'edit' => 'Ubah',
        'delete' => 'Hapus',
        'cancel' => 'Batal',
        'search_placeholder' => 'Cari judul, penulis, kode...',
        'search_btn' => 'Cari',
        'reset_btn' => 'Reset'
    ],
    'en' => [
        'title' => 'Book Catalog System',
        'login_title' => 'Login to System',
        'login_btn' => 'Login',
        'logout' => 'Logout',
        'add' => 'Add New Book',
        'kode' => 'Book Code',
        'judul' => 'Book Title',
        'penulis' => 'Author',
        'action' => 'Action',
        'save' => 'Save Data',
        'edit' => 'Edit',
        'delete' => 'Delete',
        'cancel' => 'Cancel',
        'search_placeholder' => 'Search title, author, code...',
        'search_btn' => 'Search',
        'reset_btn' => 'Reset'
    ]
];

function t($key) {
    global $kamus, $lang;
    return $kamus[$lang][$key];
}
?>