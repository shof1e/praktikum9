<?php
$id = $_GET['id'] ?? null;

$obj = new Level();
$row = $obj->getLevel($id);
?>

<div class="container mt-4">
    <h3>Detail Level</h3>

    <table class="table">
        <tr>
            <th>ID</th>
            <td><?= $row['id'] ?></td>
        </tr>
        <tr>
            <th>Nama</th>
            <td><?= $row['nama'] ?></td>
        </tr>
    </table>

    <a href="index.php?hal=level_list" class="btn btn-secondary">Kembali</a>
</div>