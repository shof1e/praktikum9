<?php
if (session_status() === PHP_SESSION_NONE) session_start();

$obj = new Level();
$rs = $obj->index();
?>

<div class="container mt-4">
    <h3>Data Level</h3>

    <?php if (!empty($_SESSION['login'])): ?>
        <a href="index.php?hal=level_form" class="btn btn-primary mb-3">Tambah</a>
    <?php endif; ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Nama</th>
                <th width="25%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($rs)):
                $no = 1;
                foreach ($rs as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td>
                            <!-- DETAIL (semua orang bisa lihat) -->
                            <a href="index.php?hal=level_detail&id=<?= $row['id'] ?>"
                                class="btn btn-info btn-sm" title="Detail">
                                <i class="bi bi-eye"></i>
                            </a>

                            <?php if (!empty($_SESSION['login'])): ?>
                                <!-- EDIT -->
                                <a href="index.php?hal=level_form&id=<?= $row['id'] ?>"
                                    class="btn btn-warning btn-sm" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <!-- HAPUS -->
                                <form method="POST" action="controller/levelController.php"
                                    style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <button type="submit" name="proses" value="hapus"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin hapus data ini?')">
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
                    <td colspan="3" class="text-center">Data belum tersedia</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>