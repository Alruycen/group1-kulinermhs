<?php
require 'process/proses_rating.php';
?>
<style>
    .form {
        margin-top: 10%;
    }
    .card-body-cascade {
        position: relative;
    }

    .card-body-cascade div {
        position: absolute;
        bottom: 0;
        left: 0;
        opacity:0;
        visibility: hidden;
    }

    .card-body-cascade:hover div {
        margin-bottom: 1%;
        visibility: visible;
        opacity: 0.9;
    }
</style>
<div class="row">
    <?php
    if (isset($stmt)) :
        while ($data = $stmt->fetch()) :
            if (file_exists('images/' . $data['foto'])) {
                $foto = 'images/' . $data['foto'];
            } else {
                $foto = '';
            } ?>
            <div class="col">
                <div class="container mt-5">
                    <div class="card text-center">
                        <div class="card-header">
                            <h5><?= $data['merek']; ?></h5>
                        </div>
                        <div class="card-body card-body-cascade">
                            <img src="<?= $foto; ?>" class="card-img-top">
                            <div class="btn btn-dark">
                                <p class="card-text"><?= isset($_GET['idterbaru']) ? $data['deskripsi'] : $data['lokasi']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <form class="form" action="process/proses_rating.php?page2=<?= $page2 = $_GET['page2']; ?>&kategori=<?= $kategori = $_GET['kategori']; ?>&action=add" method="post">
                    <div class="form-control">
                        <label for="customRange2" class="form-label">Rating</label>
                        <input type="range" class="form-range" min="1" max="5" id="customRange2" name="rating" required>
                    </div>
                    <div class="form-control">
                        <label for="exampleFormControlTextarea1" class="form-label">Ulasan</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="ulasan" required></textarea>
                    </div>
                    <div class="form-control">
                        <label for="exampleFormControlInput1" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="penulis" placeholder="e.g, Richard Faustine" required>
                    </div>
                    <input type="hidden" name="tanggalditulis" class="form-control" value="<?= date('Y-m-d'); ?> " />
                    <input type="hidden" name="idartikel" class="form-control" value="<?= $data['id_rentangharga']; ?> " />
                    <button type="submit" class="btn btn-success w-100">Simpan</button>
                </form>
            </div>
    <?php endwhile;
    endif; ?>
</div>
<br /><br /><br />