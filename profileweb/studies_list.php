<?php
if (session_status() === PHP_SESSION_NONE) session_start();

//buat array scalar judul kolom
$ar_judul = ['NO', 'NAMA', 'LEVEL', 'KETERANGAN', 'TAHUN LULUS', 'FOTO SEKOLAH'];
//ciptakan object dari class Studies
$obj_studies = new Studies();
//panggil fungsi menampilkan studies dari model
$rs = $obj_studies->index();
$data = $rs->fetchAll(PDO::FETCH_ASSOC);
?>

<h3>Daftar Studies</h3>

<?php if (!empty($_SESSION['login'])): ?>
    <a href="index.php?hal=studies_form" class="btn btn-primary mb-3">Tambah</a>
<?php endif; ?>

<table class="table table-striped">
    <thead>
        <tr>
            <?php foreach ($ar_judul as $jdl) {
                echo '<th>' . $jdl . '</th>';
            } ?>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data)):
            $no = 1;
            foreach ($data as $studies): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($studies['nama']) ?></td>
                    <td><?= htmlspecialchars($studies['level_name']) ?></td>
                    <td><?= htmlspecialchars($studies['keterangan']) ?></td>
                    <td><?= htmlspecialchars($studies['tahun_lulus']) ?></td>
                    <td width="15%">
                        <?php if (!empty($studies['foto_sekolah'])): ?>
                            <img src="img/<?= htmlspecialchars($studies['foto_sekolah']) ?>" width="50%" />
                        <?php else: ?>
                            <img src="img/nophoto.jpg" width="50%" />
                        <?php endif; ?>
                    </td>
                    <td>
                        <!-- DETAIL (semua orang bisa lihat) -->
                        <a href="index.php?hal=studies_detail&id=<?= $studies['id'] ?>"
                            title="Detail Studies" class="btn btn-info btn-sm">
                            <i class="bi bi-eye"></i>
                        </a>

                        <?php if (!empty($_SESSION['login'])): ?>
                            <!-- EDIT -->
                            <a href="index.php?hal=studies_form&id=<?= $studies['id'] ?>"
                                title="Ubah Studies" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <!-- HAPUS -->
                            <form method="POST" action="controller/studiesController.php"
                                style="display:inline;">
                                <input type="hidden" name="id" value="<?= $studies['id'] ?>">
                                <button type="submit" name="proses" value="hapus"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Anda yakin ingin menghapus?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php
            endforeach;
        else: ?>
            <tr>
                <td colspan="7" class="text-center">Data belum tersedia</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>