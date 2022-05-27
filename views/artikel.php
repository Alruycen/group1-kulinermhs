<?php
    include 'views/admin.php';
?>
<style>
    .row {
        padding-left: 5%;
        margin-bottom: 5%;
    }

    #body1 {
        padding: 5% 5% 0 5%;
    }

    #body2 {
        padding-top: 5%;
    }

    .row .row {
        background: #6aabd2;
        padding: 5%;
    }

    .col-6 {
        margin-right: 10%;
    }

    .col-4 {
        position: relative;

    }
    .scrolling::-webkit-scrollbar {
        display: none;
    }

    .scrolling {
        max-height: 12rem;
        background: #d9e4ec;
    }

    .card-img-top {
        max-height: 12rem;
    }

    form select {
        margin-right: 1%;
    }

</style>
<div class="row">
    <div class="col-8 col-s-12" id="body1">
        <?php
        include 'process/proses_artikel.php';
        if (isset($stmt)) :
            while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) :
                $nama = $data['nama'];
                $deskripsi = $data['deskripsi'];
                $foto;
                if (file_exists('images/' . $data['foto'])) {
                    $foto = 'images/' . $data['foto'];
                } else {
                    $foto = '';
                }
                $kategori = $data['id_kategori'];
                switch($kategori) {
                    case "1": $kategori = 'makanan'; break;
                    case "2": $kategori = 'minuman'; break;
                    case "3": $kategori = 'tempat'; break;
                    case "4": $kategori = 'oleholeh';
                }
        ?>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h3><?= $nama; ?></h3>
                            </div>
                        </div>
                        <img class="card-img-top" src="<?= $foto; ?>" loading="lazy">
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="scrolling">
                                <p><em><?= $deskripsi; ?></em></p>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") : ?>
                        <a href="index.php?page=editartikel&kategori=<?= $kategori; ?>&action=edit&id=<?= $data['id']; ?>" class="btn btn-warning btn-sm">
                        <span data-feather="edit"></span>Ubah Data <em><?= $data['nama']; ?></em></a>
                    <?php endif; ?>
                </div>
        <?php endwhile;
        endif; ?>

    </div>
    <div class="col-4" id="body2">
        <?php
        include 'process/proses_artikel.php';
        include 'views/sidebar.php'; ?>
    </div>
</div>