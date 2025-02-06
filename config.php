<?php
session_start();
session_set_cookie_params([
  'lifetime' => 0,
  'path' => '/',
  'domain' => 'systemlogin.studio',
  'secure' => false, // Aktifkan jika menggunakan HTTPS
  'httponly' => true,
  'samesite' => 'Strict'
]);

$host = "localhost";
$user = "root";
$pass = "CDP17s1850913";
$db = "multi_role_auth";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

// Fungsi untuk membuat token CSRF
function generateCsrfToken()
{
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Fungsi untuk memverifikasi token CSRF
function verifyCsrfToken($token)
{
  return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Regenerasi CSRF token setelah tiap request sukses
function regenerateCsrfToken()
{
  unset($_SESSION['csrf_token']); // Hapus token lama
  generateCsrfToken(); // Buat token baru
}

// Panggil generateCsrfToken() di awal jika belum ada token
if (empty($_SESSION['csrf_token'])) {
  generateCsrfToken();
}
