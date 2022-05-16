<?php
    include 'views/admin.php';
?>
<style>
    .row {
        margin-bottom: 5%;
    }

    .col-m-8 {
        padding-top: 5%;
        max-width: 66%;
    }

    .col-m-4 {
        padding-top: 5%;
        padding-left: 10%;
        max-width: 33%;
    }

    .row .row {
        background: peachpuff;
        padding: 5%;
    }

    .col-6 {
        padding-right: 5%;
    }

    .col-4 {
        position: relative;
        padding-top: 1%;
    }

    .scrolling {
        height: 12rem;
    }

    .card-img-top {
        height: 12rem;
    }
</style>


<div class="row">
    <div class="col-m-8">
        <?php
        include 'process/proses_resep.php';
        if(isset($stmt)) :
            while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) :
                if (file_exists('images/'.$data['foto'])) {
                    $foto = 'images/'.$data['foto'];
                } else {
                    $foto = 'images/placeholder.png';
                }
                $bahan = explode(',', $data['bahan']);
                $prosedur = explode('.', $data['prosedur']);?>     
        <div class="row row-cols-2">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h5><?= $data['nama']; ?></h5>
                    </div>
                </div>
                <img class="card-img-top" src="<?= $foto; ?>" loading="lazy">
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="scrolling">
                        <?php foreach ($bahan as $object) : ?>
                            <h6><?= $object; ?><br /></h6>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="scrolling">
                        <?php foreach ($prosedur as $object) : ?>
                            <h6><?= $object; ?><br /></h6>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div> 
            <div class="col-12">    
                <?php
                    if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") : ?>
                        <a href="index.php?page=editresep&kategori=<?= $kategori = $_GET['kategori']; ?>&action=edit&id=<?= $data['id_resep']; ?>" class="btn btn-warning w-100">
                        <span data-feather="edit"></span>Ubah Data <em><?= $data['nama']; ?></em></a>
                    <?php endif; ?>
            </div>
        </div>
        <?php endwhile; 
        endif; ?>
    </div>
    <div class="col-m-4">
        <div class="card">
            <div class="card-body">
                <?php
                require 'formresep.php';
                ?>
                <ul>
                    <li>
                        <h5 class="card-title">Artikel Terbaru</h5>
                    </li>
                    <?php
                    if (isset($stmtterbaru)) :
                        while ($data = $stmtterbaru->fetch()) :
                            if (file_exists('images/'.$data['foto'])) {
                                $foto = 'images/'.$data['foto'];
                            } else {
                                $foto = 'images/placeholder.png';
                            }
                    ?>
                            <a class="card-link" href="#"><img class="card-img mb-2" src="<?= $foto; ?>" alt="artikel terbaru"></a>
                    <?php endwhile;
                    endif; ?>
                    <li>
                        <h5 class="card-title">Yang Paling Diminati</h5>
                    </li>

                    <?php
                    if (isset($stmtdiminati)) :
                        while ($data = $stmtdiminati->fetch()) :
                            if (file_exists('images/'.$data['foto'])) {
                                $foto = 'images/'.$data['foto'];
                            } else {
                                $foto = 'images/placeholder.png';
                            }
                    ?>
                            <a class="card-link" href="#"><img class="card-img mb-2" src="<?= $foto; ?>" alt="yang paling diminati"></a>
                    <?php endwhile;
                    endif; ?>
                </ul>
                <h6 class="card-subtitle">Resep khas</h6>
                <ul>
                    <?php
                    include 'process/proses_resep.php';
                    if (isset($stmt)) :
                        while ($data = $stmt->fetch()) : ?>
                            <li>
                                <p><?= $data['nama']; ?></p>
                            </li>
                    <?php endwhile;
                    endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>