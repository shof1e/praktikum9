<?php  
session_start(); 
//memulai session
//hapus session
// session_destroy();
unset($_SESSION['USER']);
// arahkan ke landing page
header('Location:http://localhost/profileweb/index.php?hal=home');