<!-- Tidak ada perubahan logis, tapi pastikan action-nya benar -->
<h3>Form Login</h3>
<form method="POST" action="controller/userController.php">
  <div class="mb-3">
    <label>Username</label>
    <input type="text" class="form-control" name="username" required>
  </div>
  <div class="mb-3">
    <label>Password</label>
    <input type="password" class="form-control" name="password" required>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>