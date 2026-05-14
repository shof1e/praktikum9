<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="img/sttnf.png" alt="Logo" width="40">
      My Profile
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link active" href="index.php?hal=home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?hal=about">About Me</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?hal=contact">Contact Me</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
            My Studies
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php?hal=level_list">Level</a></li>
            <li><a class="dropdown-item" href="index.php?hal=studies_list">Studies</a></li>
          </ul>
        </li>

        <?php if (empty($_SESSION['USER'])): ?>
          <!-- Belum login -->
          <li class="nav-item">
            <a class="nav-link" href="index.php?hal=login">
              <i class="bi bi-box-arrow-in-right"></i> Login
            </a>
          </li>

        <?php else: ?>
          <!-- Sudah login -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
              <i class="bi bi-person-circle"></i>
              <!-- ✅ Ganti 'username' sesuai kolom di tabel user kamu -->
              <?= htmlspecialchars($_SESSION['USER']['username']) ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <span class="dropdown-item-text text-muted small">
                  <i class="bi bi-person"></i>
                  Login sebagai <strong><?= htmlspecialchars($_SESSION['USER']['username']) ?></strong>
                </span>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item text-danger" href="controller/logoutController.php">
                  <i class="bi bi-box-arrow-right"></i> Logout
                </a>
              </li>
            </ul>
          </li>

        <?php endif; ?>

      </ul>

      <!-- Search Form -->
      <form class="d-flex" role="search" method="GET" action="index.php">
        <input class="form-control me-2" type="text" name="keyword" 
               placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">
          <i class="bi bi-search"></i> Search
        </button>
        <input type="hidden" name="hal" value="studies_cari" />
      </form>

    </div>
  </div>
</nav>