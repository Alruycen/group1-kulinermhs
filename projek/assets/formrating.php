<?php
    include '../process/function.php';

    $sql = "SELECT a.id AS id_rentangharga, a.merek AS merek, a.lokasi AS lokasi, a.hargaminimal AS hargaminimal, a.hargamaksimal AS hargamaksimal, b.id = id_artikel, b.nama AS nama, b.foto AS foto FROM rentangharga a, artikel b WHERE a.id_artikel = b.id AND a.id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_GET['id']]);
?>
<style>
    .form {
        margin-top:10%;
    }
    .active {
        border-bottom: 3px solid #fff;
    }
    .nav-link:hover {
        border-bottom: 1px solid #fff;
    }
</style>
<body>
    <div class="row">
        <div class="col">
            <?php 
            if ($data = $stmt->fetch()):
                if(file_exists($data['foto'])) {
                    $foto = $data['foto'];
                }
                else {
                    $foto = '../images/placeholder.png';
                }?>
            <div class="container mt-5">
                <div class="card text-center">
                    <div class="card-header">
                        <h5><?= $data['nama']; ?></h5>
                    </div>
                    <div class="card-body card-body-cascade">
                        <img src="<?= $foto; ?>" class="card-img-top">
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <div class="col">
            <form class="form" action="../process/ulasan.php?action=add" method="post">
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
    </div>
    <br/><br/><br/>
</body>
