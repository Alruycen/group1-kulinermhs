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
                $deskripsi = "";
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
                $penulis = "";
                break;
            case "edit":
                $sql = "SELECT * FROM artikel
                            WHERE id = ?";

                $stmt = $conn->prepare($sql);
                $stmt->execute([$_GET['id']]);

                if (isset($stmt)) {
                    $data = $stmt->fetch();
                    $id = $data['id'];
                    $nama = $data['nama'];
                    $deskripsi = $data['deskripsi'];
                    if (file_exists('images/' . $data['foto'])) $foto = 'images/' . $data['foto'];
                    else $foto = "";
                    $kategori = $data['id_kategori'];
                    $penulis = $data['penulis'];
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
                    <h5><?= $nama ?></h5>
                </div>
                <div class="card-body card-body-cascade">
                    <img src="<?= $foto; ?>" class="card-img-top">
                    <p><?= $deskripsi; ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
<?php

function resize_image ($file, $ext, $max_resolution) {
    if(file_exists($file)) {
        switch($ext) {
            case "jpg":
            case "jpeg":
                $original_image = imagecreatefromjpeg($file);
                break;
            case "png":
                $original_image = imagecreatefrompng($file);
                break;
            default:
                die("Jenis foto ini tidak didukung.");
        }
        $original_width = imagesx($original_image);
        $original_height = imagesy($original_image);

        $ratio = $max_resolution / $original_width;
        $new_width = $max_resolution;
        $new_height = $original_height * $ratio;

        if($new_height > $max_resolution) {
            $ratio = $max_resolution / $original_height;
            $new_height = $max_resolution;
            $new_width = $original_width * $ratio;
        }

        if($original_image) {
            $new_image = imagecreatetruecolor($new_width, $new_height);
            imagecopyresampled($new_image, $original_image, 0, 0, 0, 0, $new_width, $new_height, $original_width, $original_height);
            $ext == "png" ? imagepng($new_image, $file, 90) : imagejpeg($new_image, $file, 90);
        }
    }
}
if($_SERVER['REQUEST_ METHOD'] == "POST") {
    if(isset($_FILES['foto'])) {
        $foto = $_FILES['foto'];
        $ext = explode('.', $foto['name']);
        $ext = end($ext);
        $ext = strtolower($ext);
        //echo $ext;
        $extboleh = ['jpg', 'png', 'jpeg'];
        if(in_array($ext, $extboleh)) {
            $sumber = $foto['tmp_name'];
            $tujuan = 'images/'.$foto['name'];
            if(!file_exists('images/')) {
                mkdir('images/');
            }
            move_uploaded_file($sumber, $tujuan);

            resize_image($tujuan, $ext, "500");
        }
    }
}
?>
        <form class="form" action="process/proses_artikel.php?page=<?= $page = $_GET['kategori']; ?>&action=<?= $action; ?>" method="post" enctype="multipart/form-data">
            <div class="form-control">
                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" placeholder="e.g, Sate Bandeng" value="<?= $nama; ?>" required>
            </div>
            <div class="form-control">
                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi" required><?= $deskripsi; ?></textarea>
            </div>
            <div class="form-control">
                <label for="formFile" class="form-label">Foto</label>
                <input class="form-control" type="file" id="formFile" name="foto" <?php if ($foto == "") echo "required"; ?>>
            </div>
            <div class="form-control">
                <label for="exampleFormControlInput2" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="exampleFormControlInput2" name="penulis" placeholder="e.g, Richard Faustine" value="<?= $penulis; ?>" required>
            </div>
            <input type="hidden" name="id" class="form-control" value="<?= $id; ?>" />
            <input type="hidden" name="tanggalditulis" class="form-control" value="<?= date('Y-m-d'); ?> " />
            <?php if ($kategori != "") : ?>
                <input type="hidden" name="kategori" class="form-control" value="<?= $kategori; ?> " />
            <?php else : ?>
                <div class="form-control">
                    <label for="validationCustom04" class="form-label">Kategori</label>
                    <select class="form-select" id="validationCustom04" name="kategori" required>
                        <option selected disabled value="" label="Pilih" />
                        <option value="1" label="Makanan" />
                        <option value="2" label="Minuman" />
                        <option value="3" label="Tempat" />
                        <option value="4" label="Oleh-Oleh" />
                    </select>
                </div>
            <?php endif; ?>
            <button type="submit" name="submit-editartikel" class="btn btn-success w-100">Simpan</button>
        </form>
    </div>
</div>
<br /><br /><br />