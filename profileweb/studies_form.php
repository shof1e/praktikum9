<?php
// inisialisasi object Studies
$obj_studies = new Studies();

// ambil id dengan aman
$id = $_GET['id'] ?? null;
if (!empty($id)) {
    $row = $obj_studies->getStudies($id);
} else {
    $row = [];
}

// ambil data level untuk dropdown
$obj_level = new Level();
$rs_level = $obj_level->index();

// helper biar ga ribet isset
function val($row, $key)
{
    return isset($row[$key]) ? $row[$key] : '';
}
?>

<div class="container px-5 my-5">
    <h3>Form Studies</h3>
    <form method="POST" action="controller/studiesController.php">

        <div class="form-floating mb-3">
            <input class="form-control" name="nama"
                value="<?= val($row, 'nama') ?>"
                type="text" placeholder="Nama Studies" required>
            <label>Nama Studies</label>
        </div>

        <div class="form-floating mb-3">
            <select class="form-select" name="idlevel" required>
                <option value="">-- Pilih Level --</option>
                <?php foreach ($rs_level as $level) {
                    $sel = (val($row, 'idlevel') == $level['id']) ? "selected" : "";
                ?>
                    <option value="<?= $level['id'] ?>" <?= $sel ?>>
                        <?= $level['nama'] ?>
                    </option>
                <?php } ?>
            </select>
            <label>Level</label>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="keterangan"
                value="<?= val($row, 'keterangan') ?>"
                type="text" placeholder="Keterangan">
            <label>Keterangan</label>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="tahun_lulus"
                value="<?= val($row, 'tahun_lulus') ?>"
                type="number" placeholder="Tahun Lulus" required>
            <label>Tahun Lulus</label>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="foto_sekolah"
                value="<?= val($row, 'foto_sekolah') ?>"
                type="text" placeholder="Foto Sekolah">
            <label>Foto Sekolah</label>
        </div>

        <div class="text-center">
            <?php if (empty($id)) { ?>
                <button class="btn btn-primary" name="proses" value="simpan">
                    Simpan
                </button>
            <?php } else { ?>
                <button class="btn btn-success" name="proses" value="ubah">
                    Ubah
                </button>
                <input type="hidden" name="idx" value="<?= $id ?>">
            <?php } ?>

            <a href="index.php?hal=studies_list" class="btn btn-info">
                Kembali
            </a>
        </div>

    </form>
</div>