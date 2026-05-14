<?php
$id = $_REQUEST['id']; // tangkap request studies id di URL
$model = new Studies(); // ciptakan obj dari class Studies
$rs = $model->getStudies($id); // panggil fungsi u/ mendetailkan studies
?>
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4">
            <?php
            if (!empty($rs['foto_sekolah'])) {
            ?>
                <img src="img/<?= $rs['foto_sekolah'] ?>" class="img-fluid rounded-start" alt="..." />
            <?php
            } else {
            ?>
                <img src="img/nophoto.jpg" class="img-fluid rounded-start" alt="..." />
            <?php } ?>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= $rs['nama'] ?></h5>
                <p class="card-text">
                    Level: <?= $rs['level_name'] ?> <br />
                    Keterangan: <?= $rs['keterangan'] ?> <br />
                    Tahun Lulus: <?= $rs['tahun_lulus'] ?> <br />
                </p>
                <p class="card-text">
                    <a href="index.php?hal=studies_list" class="btn btn-primary">Kembali</a>
                </p>
            </div>
        </div>
    </div>
</div>