<?php
$ar_judul = ['NO', 'NAMA', 'LEVEL', 'KETERANGAN', 'TAHUN LULUS', 'FOTO SEKOLAH'];
$obj_studies = new Studies();
$keyword = $_GET['keyword'];
$rs = $obj_studies->cari($keyword);
?>

<h3>Daftar Studies</h3>
<a href="index.php?hal=studies_form" class="btn btn-primary">Tambah</a>
<table class="table table-striped">
    <thead>
        <tr>
            <?php
            foreach ($ar_judul as $jdl) {
                echo '<th>' . $jdl . '</th>';
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($rs as $studies) {
        ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $studies['nama'] ?></td>
                <td><?= $studies['level_name'] ?></td>
                <td><?= $studies['keterangan'] ?></td>
                <td><?= $studies['tahun_lulus'] ?></td>
                <td width="15%">
                    <?php
                    if (!empty($studies['foto_sekolah'])) {
                    ?>
                        <img src="img/<?= $studies['foto_sekolah'] ?>" width="50%" />
                    <?php
                    } else {
                    ?>
                        <img src="img/nophoto.jpg" width="50%" />
                    <?php } ?>
                </td>
                <td>
                    <form method="POST" action="controller/studiesController.php">
                        <a href="index.php?hal=studies_detail&id=<?= $studies['id'] ?>"
                            title="Detail Studies" class="btn btn-info btn-sm">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="index.php?hal=studies_form&id=<?= $studies['id'] ?>"
                            title="Ubah Studies" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <button type="submit" title="Hapus Studies" class="btn btn-danger btn-sm"
                            name="proses" value="hapus" onclick="return confirm('Anda Yakin ingin di Hapus?')">
                            <i class="bi bi-trash"></i>
                        </button>
                        <input type="hidden" name="id" value="<?= $studies['id'] ?>" />
                    </form>
                </td>
            </tr>
        <?php
            $no++;
        }
        ?>
    </tbody>
</table>