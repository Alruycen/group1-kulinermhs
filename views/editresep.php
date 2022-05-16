<?php
include 'process/function.php';
$conn = connDb();
try {
    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
    if (isset($_GET['action'])) {
        switch ($action = $_GET['action']) {
            case "add":
                $id = "";
                $nama = "";
                $foto = "";
                $bahan = "";
                $prosedur = "";
                $artikel = "";
                if (isset($_GET['kategori'])) {
                    $kategori = $_GET['kategori'];
                    switch ($kategori) {
                        case "makanan":
                            $kategori = "1";
                            break;
                        case "minuman":
                            $kategori = "2";
                            break;
                        case "tempat":
                            $kategori = "3";
                            break;
                        case "oleholeh":
                            $kategori = "4";
                            break;
                    }
                } else {
                    $kategori = "";
                }
                break;
            case "edit":
                $sql = "SELECT a.id AS id_resep, a.bahan AS bahan, a.prosedur AS prosedur, b.id AS id_artikel, b.nama AS nama, b.foto AS foto FROM resep a, artikel b
                        WHERE a.id_artikel = b.id AND a.id = ?";

                $stmt = $conn->prepare($sql);
                $stmt->execute([$_GET['id']]);

                if (isset($stmt)) {
                    $data = $stmt->fetch();
                    $id = $data['id_resep'];
                    $nama = $data['nama'];
                    if (file_exists('images/' . $data['foto'])) $foto = 'images/' . $data['foto'];
                    else $foto = "";
                    $bahan = $data['bahan'];
                    $prosedur = $data['prosedur'];
                    $artikel = $data['id_artikel'];
                }
                break;
        }
    }
} catch (PDOException $e) {
    echo "<pre>";
    var_dump($e);
}
?>
<style>
    .form {
        margin-top: 10%;
    }

    .card-img-top {
        height:24rem;
    }

    .scrolling {
        height: 12rem;
    }
</style>
<div class="row">
    <div class="col">
        <div class="container mt-5">
            <div class="card">
                <div class="card-header text-center">
                    <h5><?= $nama ?></h5>
                </div>
                <div class="card-body card-body-cascade">
                    <img src="<?= $foto; ?>" class="card-img-top">
                    <?php if (isset($stmt)): ?>
                    <div class ="scrolling">
                    <?php
                        $showbahan = explode(',', $bahan);
                        foreach ($showbahan as $object) : ?>
                            <h6><?= $object; ?><br /></h6>
                        <?php endforeach; ?>
                    </div>
                    <br/>
                    <div class="scrolling">
                        <?php 
                            $showprosedur = explode('.', $data['prosedur']);
                            foreach ($showprosedur as $object) : ?>
                                <h6><?= $object; ?><br /></h6>
                    <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <form class="form" action="process/proses_resep.php?page=<?= $page = $_GET['kategori']; ?>&action=<?= $action; ?>" method="post">
            <?php if ($artikel != "") : ?>
                <input type="hidden" name="artikel" class="form-control" value="<?= $artikel; ?> " />
            <?php else : ?>
                <div class="form-control">
                    <label for="validationCustom04" class="form-label">Artikel</label>
                    <select class="form-select" id="validationCustom04" name="artikel" required>
                        <option selected disabled value="" label="Pilih" />
                        <?php
                        if(isset($_GET['kategori'])) $sql = "SELECT * FROM artikel WHERE id_kategori = ?";
                        else  $sql = "SELECT * FROM artikel";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute([$kategori]);
                        if (isset($stmt)) :
                            while ($artikel = $stmt->fetch()) : ?>
                                <option value="<?= $artikel['id']; ?>" label="<?= $artikel['nama']; ?>" />
                        <?php endwhile;
                        endif; ?>
                    </select>
                </div>
            <?php endif; ?>
            <div class="form-control">
                <label for="exampleFormControlTextarea1" class="form-label">Bahan</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" name="bahan" required><?= $bahan; ?></textarea>
            </div>
            <div class="form-control">
                <label for="exampleFormControlTextarea2" class="form-label">Prosedur</label>
                <textarea class="form-control" id="exampleFormControlTextarea2" rows="8" name="prosedur" required><?= $prosedur; ?></textarea>
            </div>
            <input type="hidden" name="id" class="form-control" value="<?= $id; ?>" />
            <button type="submit" name="submit-editresep" class="btn btn-success w-100">Simpan</button>
        </form>
    </div>
</div>
<br /><br /><br />