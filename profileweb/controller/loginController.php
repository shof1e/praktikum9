<?php
session_start();

// Setelah validasi user & password berhasil:
$_SESSION['user'] = $data['username'];
$_SESSION['idlevel'] = $data['idlevel'];
$_SESSION['login'] = true;

header("Location: ../index.php");
exit;