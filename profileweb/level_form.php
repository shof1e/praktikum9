<?php
$id = $_GET['id'] ?? null;
$obj = new Level();

if ($id) {
    $row = $obj->getLevel($id);
} else {
    $row = [];
}

function val($r, $k)
{
    return isset($r[$k]) ? $r[$k] : '';
}
?>

<div class="container mt-4">
    <h3>Form Level</h3>

    <form method="POST" action="controller/levelController.php">

        <div class="mb-3">
            <label>Nama Level</label>
            <input type="text" name="nama" class="form-control"
                value="<?= val($row, 'nama') ?>" required>
        </div>

        <?php if (empty($id)) { ?>
            <button class="btn btn-primary" name="proses" value="simpan">Simpan</button>
        <?php } else { ?>
            <button class="btn btn-success" name="proses" value="ubah">Ubah</button>
            <input type="hidden" name="idx" value="<?= $id ?>">
        <?php } ?>

        <a href="index.php?hal=level_list" class="btn btn-secondary">Kembali</a>
    </form>
</div>