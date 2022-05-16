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
                $merek = "";
                $lokasi = "";
                $hargaminimal = "";
                $hargamaksimal = "";
                $foto = "";
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
                $id_artikel = "";
                break;
            case "edit":
                $sql2 = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, b.foto as foto_rentangharga, c.id AS id_artikel, c.foto AS foto, c.id_kategori AS id_kategori FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND b.id = ?";

                $stmt2 = $conn->prepare($sql2);
                $stmt2->execute([$_GET['id']]);

                if (isset($stmt2)) {
                    $data = $stmt2->fetch();
                    $id = $data['id_rentangharga'];
                    $merek = $data['merek'];
                    $lokasi = $data['lokasi'];
                    $hargaminimal = $data['hargaminimal'];
                    $hargamaksimal = $data['hargamaksimal'];
                    if (file_exists('images/' . $data['foto_rentangharga']) && $data['foto_rentangharga'] != null) {
                        $foto = 'images/' . $data['foto_rentangharga'];
                    } elseif (file_exists('images/' . $data['foto'])) {
                        $foto = 'images/' . $data['foto'];
                    } else {
                        $foto = "";
                    }
                    $kategori = $data['id_kategori'];
                    $id_artikel = $data['id_artikel'];
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
</style>
<div class="row">
    <div class="col">
        <div class="container mt-5">
            <div class="card text-center">
                <div class="card-header">
                    <h5><?= $merek ?></h5>
                </div>
                <div class="card-body card-body-cascade">
                    <img src="<?= $foto; ?>" class="card-img-top">
                    <p><?= $lokasi; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <form class="form" action="process/proses_harga.php?page=<?= $page = $_GET['kategori']; ?>&action=<?= $action; ?>" method="post" enctype="multipart/form-data">
            <div class="form-control">
                <label for="exampleFormControlInput1" class="form-label">Merek</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="merek" placeholder="e.g, SABAJO Sate Bandeng" value="<?= $merek; ?>" required>
            </div>
            <div class="form-control">
                <label for="exampleFormControlTextarea1" class="form-label">Lokasi</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="lokasi" required><?= $lokasi; ?></textarea>
            </div>
            <div class="form-control">
                <label for="formFile" class="form-label">Foto</label>
                <input class="form-control" type="file" id="formFile" name="foto">
            </div>
            <div class="form-control">
                <label for="exampleFormControlInput2" class="form-label">Harga</label>
                <input type="text" class="form-control" id="exampleFormControlInput2" name="hargaminimal" placeholder="e.g, 50000" value="<?= $hargaminimal; ?>" onkeypress="return onlyNumberKey(event)" required>
                <input type="text" class="form-control" id="exampleFormControlInput2" name="hargamaksimal" placeholder="e.g, 1000000" value="<?= $hargamaksimal; ?>" onkeypress="return onlyNumberKey(event)" required>
            </div>
            <input type="hidden" name="id" class="form-control" value="<?= $id; ?>" />
            <?php if ($id_artikel != "") : ?>
                <input type="hidden" name="artikel" class="form-control" value="<?= $id_artikel; ?> " />
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
            <button type="submit" name="submit-editharga" class="btn btn-success w-100">Simpan</button>
        </form>
    </div>
</div>
<script>
    function onlyNumberKey(evt) {

        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>

<br /><br /><br />