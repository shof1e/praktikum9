<?php
include_once '../koneksi.php';
include_once '../models/Studies.php';
include_once '../auth.php';

cekLogin();

//1. tangkap request form (dari name2 element form)
$nama = $_POST['nama'];
$idlevel = $_POST['idlevel'];
$keterangan = $_POST['keterangan'];
$tahun_lulus = $_POST['tahun_lulus'];
$foto_sekolah = $_POST['foto_sekolah'];
$tombol = $_POST['proses']; // untuk keperluan eksekusi sebuah tombol di form
//2. simpan ke sebuah array
$data = [
    $nama, // ? 1
    $idlevel, // ? 2
    $keterangan, // ? 3
    $tahun_lulus, // ? 4
    $foto_sekolah, // ? 5
];
//3. eksekusi tombol
$obj_studies = new Studies();
switch ($tombol) {
    case 'simpan':
        $obj_studies->simpan($data);
        break;
    case 'ubah':
        $data[] = $_POST['idx'];; // tambah array ? ke-8 dari hidden field idx
        $obj_studies->ubah($data);
        break;
    case 'hapus':
        $obj_studies->hapus($_POST['id']);
        break; //$_POST['id'] dari hidden field di tombol hapus

    default:
        header('location:index.php?hal=studies_list');
        break;
}
//4. setelah selasai arahkan ke hal produk
    header('Location: ../index.php?hal=studies_list');
    exit;

//----------proses pencarian data---------------
$tombol_cari = $_GET['proses_cari']; // untuk keperluan eksekusi sebuah tombol di form
if (isset($tombol_cari)) {
    //print_r('###########################'.$_GET['keyword']);
    $obj_studies->cari($_GET['keyword']);
    header('location:../index.php?hal=studies_cari');
}
?>