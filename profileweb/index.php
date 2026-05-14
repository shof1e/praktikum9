<?php
session_start(); // ✅ Session dimulai PERTAMA sebelum apapun
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Portfolio</title>
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
  <?php
    include_once 'koneksi.php';
    include_once 'models/User.php';
    include_once 'models/Level.php';
    include_once 'models/Studies.php';
  ?>

  <div class="container-fluid">

    <div class="row">
      <div class="col-md-12">
        <?php include_once 'header.php'; ?>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <?php include_once 'menu.php'; ?>
      </div>
    </div>

    <br />

    <div class="row">
      <div class="col-md-8 order-md-2">
        <?php
          if (isset($_GET['hal'])) {
            $req  = $_GET['hal'];
            $file = $req . '.php';

            if (file_exists($file)) {
              include_once $file;
            } else {
              echo "<div class='alert alert-warning'>Halaman tidak ditemukan</div>";
            }
          } else {
            include_once 'home.php';
          }
        ?>
      </div>

      <div class="col-md-4 order-md-1">
        <?php include_once 'sidebar.php'; ?>
      </div>
    </div>

    <br />

    <div class="row">
      <div class="col-md-12">
        <?php include_once 'footer.php'; ?>
      </div>
    </div>

  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>