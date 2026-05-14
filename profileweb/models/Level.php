<?php
class Level
{
    private $koneksi;
    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function index()
    {
        $rs = $this->koneksi->query("SELECT * FROM level ORDER BY id DESC");
        return $rs->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLevel($id)
    {
        $sql = "SELECT * FROM level WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        return $ps->fetch(PDO::FETCH_ASSOC);
    }

    public function simpan($data)
    {
        $sql = "INSERT INTO level (nama) VALUES (?)";
        $ps = $this->koneksi->prepare($sql);
        return $ps->execute($data);
    }

    public function ubah($data)
    {
        $sql = "UPDATE level SET nama=? WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        return $ps->execute($data);
    }

    public function hapus($id)
{
    try {
        $sql = "DELETE FROM level WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        return $ps->execute([$id]);
    } catch (PDOException $e) {
        if ($e->getCode() === '23000') {
            return false; // level masih dipakai di tabel studies
        }
        throw $e;
    }
}   
}