<?php
session_start();
session_destroy();
header('Location: http://localhost/profileweb/index.php?hal=login');
exit;
?>