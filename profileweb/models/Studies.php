<?php
class Studies
{
    //member1 variabel
    private $koneksi;
    //member2 konstruktor
    public function __construct()
    {
        global $dbh; //memanggil variabel di file lain
        $this->koneksi = $dbh;
    }
    //member3 fungsionalitas CRUD
    public function index()
    {
        $sql = "SELECT studies.*, level.nama AS level_name
                FROM studies INNER JOIN level
                ON level.id = studies.idlevel
                ORDER BY studies.id DESC";
        $rs = $this->koneksi->query($sql);
        return $rs;
    }

    public function simpan($data)
    {
        $sql = "INSERT INTO studies (nama,idlevel,keterangan,tahun_lulus,foto_sekolah)
                VALUES (?,?,?,?,?)";
        //PDO prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function getStudies($id)
    {
        $sql = "SELECT studies.*, level.nama AS level_name
                FROM studies INNER JOIN level
                ON level.id = studies.idlevel WHERE studies.id = ?";
        //PDO prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }

    public function ubah($data)
    {
        $sql = "UPDATE studies SET nama=?,idlevel=?,keterangan=?,tahun_lulus=?,foto_sekolah=? 
                WHERE id = ?";
        //PDO prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function hapus($id)
    {
        $sql = "DELETE FROM studies WHERE id = ?";
        //PDO prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
    }

    public function cari($keyword)
    {
        $sql = "SELECT studies.*, level.nama AS level_name
                FROM studies INNER JOIN level
                ON level.id = studies.idlevel
                WHERE studies.nama LIKE '%$keyword%' 
                OR level.nama LIKE '%$keyword%' 
                OR studies.keterangan LIKE '%$keyword%'";
        $rs = $this->koneksi->query($sql);
        return $rs;
    }
}