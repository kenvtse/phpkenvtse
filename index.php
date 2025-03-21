<?php
// Mulai session jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include file konfigurasi database
include_once __DIR__ . '/config/db.php';

// Daftar halaman yang diizinkan
$allowedPages = [
    'home' => 'file_/home.php',
    'login' => 'file_/login.php',
    'signup' => 'file_/signup.php',
    'logout' => 'file_/logout.php',
    'admin_dashboard' => 'file_/admin_dashboard.php',
];

// Ambil halaman dari query parameter, default ke 'home'
$page = isset($_GET['page']) && array_key_exists($_GET['page'], $allowedPages) ? $_GET['page'] : 'home';

// Fungsi untuk memuat halaman
function loadPage($page, $conn) {
    global $allowedPages;

    // Periksa akses untuk halaman admin
    if ($page === 'admin_dashboard' && (!isset($_SESSION['role_id']) || $_SESSION['role_id'] != 1)) {
        include 'file_/admin_dashboard.php';
        return;
    }

    // Muat halaman yang diizinkan
    if (array_key_exists($page, $allowedPages)) {
        include $allowedPages[$page];
    } else {
        include 'file_/admin_dashboard.php';
    }
}

// Include header
include '_partials/_template/header.php';

// Muat halaman
loadPage($page, $conn);
?> 