<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function cekLogin() {
    if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
        $base = "/profileweb"; // sesuaikan nama folder
        header("Location: $base/index.php?hal=home ");
        exit;
    }
}