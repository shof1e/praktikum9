<?php
class User {
    private $koneksi;

    public function __construct() {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function cekLogin($data) {
    $sql = "SELECT * FROM user WHERE username = ?";
    $ps  = $this->koneksi->prepare($sql);
    $ps->execute([$data[0]]);
    $rs  = $ps->fetch(PDO::FETCH_ASSOC);

    if (!$rs) return false;

    // Cek format password di database
    // Kalau bcrypt:
    if (password_verify($data[1], $rs['password'])) return $rs;
    
    // Kalau MD5 (sementara untuk testing):
    // if (md5($data[1]) === $rs['password']) return $rs;
    
    // Kalau plain text (sementara untuk testing):
    // if ($data[1] === $rs['password']) return $rs;

    return false;
}

    public function getUser($id) {
        $sql = "SELECT * FROM user WHERE id = ?";
        $ps  = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        return $ps->fetch(PDO::FETCH_ASSOC);
    }
}