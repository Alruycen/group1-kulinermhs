<?php
    include 'process/function.php';
    $conn = connDb();
    $id;
    if(isset($_GET['idterbaru'])):
        $id = $_GET['idterbaru'];
        $sql2 = "SELECT id, nama, deskripsi, foto, id_kategori FROM artikel WHERE id = ?";
        
    elseif(isset($_GET['iddiminati'])):
        $id = $_GET['iddiminati'];
        $sql2 = "SELECT a.id AS id, merek, a.foto AS foto_rentangharga, b.foto AS foto, a.lokasi AS lokasi, b.id_kategori AS id_kategori FROM rentangharga a, artikel b WHERE a.id_artikel = b.id AND a.id = ?";
    endif;
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute([$id]);
?>
<style>

    .form {
        margin-top: 10%;
    }

    .card {
        background: #d9e4ec;
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

    .active {
        border-bottom: 3px solid #fff;
    }

    .nav-link:hover {
        border-bottom: 1px solid #fff;
    }
</style>
<div class="row">
    <?php
    if (isset($stmt2)) :
        while ($data = $stmt2->fetch()) :
            if (isset($data['foto_rentangharga']) && file_exists('images/' . $data['foto_rentangharga']) && $data['foto_rentangharga'] != null) {
                $foto = 'images/' . $data['foto_rentangharga'];
            } elseif (file_exists('images/'.$data['foto'])) {
                $foto = 'images/'.$data['foto'];
            } else {
                $foto = '';
            } ?>
    <div class="col-8">
        <div class="container mt-5">
            <div class="card text-center">
                <div class="card-header">
                    <h5><?= isset($_GET['idterbaru']) ? $data['nama'] : $data['merek']; ?></h5>
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
    <?php
        endwhile; endif;?>
    <div class="col-4">
        <?php
        include 'sidebar.php'; ?>
    </div>
</div>
<br/><br/><br/><br/>
