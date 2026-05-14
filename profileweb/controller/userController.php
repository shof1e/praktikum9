<?php
session_start();
include_once '../koneksi.php';
include_once '../models/User.php';

// ✅ Validasi input dulu sebelum dipakai
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../login.php');
    exit;
}

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if (empty($username) || empty($password)) {
    echo '<script>alert("Username dan Password wajib diisi!");history.go(-1);</script>';
    exit;
}

$obj_user = new User();
$rs = $obj_user->cekLogin([$username, $password]);

if ($rs !== false && !empty($rs)) {
    // ✅ Set session dengan key yang konsisten
    $_SESSION['login']   = true;
    $_SESSION['user']    = $rs['username'];
    $_SESSION['idlevel'] = $rs['idlevel'];
    $_SESSION['USER']  = $rs; // Simpan seluruh data user jika diperlukan
    header('Location: /profileweb/index.php?hal=studies_list');
    exit;
} else {
    echo '<script>alert("Username/Password Anda Salah!!!");history.go(-1);</script>';
}
?>