<?php
    include 'views/admin.php';
?>
<style>
    body{
        overflow-y:scroll;
    }
    @media only screen and (min-width: 600px) {
        /* For tablets: */
        body { overflow-y: scroll; }
    }
    @media only screen and (min-width: 992px) {
        /* For desktop: */
        body { overflow-y: clip; }
    }
    .d-flex {
        padding: 5% 2.5% 0 2.5%;
    }

    .col-6 {
        padding: 5%;
    }

    .col-6 .card-header {
        background: #4e545c;
        color: #e5e8e8;
    }

    .col-6 .card .card {
        background: #4e545c;
        color: #e5e8e8;
        padding-left: 5%;
        padding-right: 5%;
    }

    .col-6 .card-body {
        background: #e5e8e8;
        overflow-y: scroll;
        max-height: 20rem;
    }

    .card-header {
        max-height: 4rem;
    }

    .card-img-top {
        max-height: 12rem;
    }

    .scrolling {
        max-height: 8rem;
    }
    .scrolling::-webkit-scrollbar {
        display: none;
    }
</style>

<?php
require 'formoleh.php';
?>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h5>Oleh-Oleh Khas Tangerang</h5>
            </div>
            <div class="card-body">
                <?php
                include 'process/proses_oleh.php';
                $i = 0;
                if (isset($stmt)) :
                    while ($data = $stmt->fetch()) :
                        if (File_exists('images/' . $data['foto'])) {
                            $foto = 'images/' . $data['foto'];
                        } else {
                            $foto = 'images/placeholder.png';
                        }
                        $i++;
                        if ($i % 2 == 1) echo "<div class='row row-cols-2'>"; ?>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h6><?= $data['nama']; ?></h6>
                                </div>
                                <img class="card-img-top" src="<?= $foto; ?>" loading="lazy">
                                <div class="scrolling">
                                    <p><em><?= $data['deskripsi']; ?></em></p>
                                </div>
                                <?php
                                if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") : ?>
                                <a href="index.php?page=editoleh&kategori=<?= $kategori = $_GET['page']; ?>&action=edit&id=<?= $data['id']; ?>" class="btn btn-warning btn-sm">
                                <span data-feather="edit"></span>Ubah Data <em><?= $data['nama']; ?></em></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ($i % 2 == 0) echo "</div>"; 
                    endwhile;
                endif; ?>
                <?php if ($i % 2 == 1) echo "</div>"; ?>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h5>Kios Jual Oleh-Oleh</h5>
            </div>
            <div class="card-body">
                <?php $i = 0;
                if (isset($stmt2)) :
                    while ($data = $stmt2->fetch()) :
                        if (file_exists('images/' . $data['foto_rentangharga']) && $data['foto_rentangharga'] != null) {
                            $foto = 'images/' . $data['foto_rentangharga'];
                        } elseif (file_exists('images/'.$data['foto'])) {
                            $foto = 'images/'.$data['foto'];
                        } else {
                            $foto = '';
                        }
                        $i++;
                        if ($i % 2 == 1) echo "<div class='row row-cols-2'>"; ?>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h6><?= $data['merek']; ?></h6>
                                </div>
                                <img src="<?= $foto; ?>" class="card-img-top"
                                loading="lazy">
                                <div class="scrolling">
                                    <dl class="row row-cols-1">
                                        <dt class="col">
                                            <p><strong>Harga</strong></p>
                                        </dt>
                                        <dd class="col">
                                            <p>Rp <em><?= $data['hargaminimal']; ?></em>-<em><?= $data['hargamaksimal']; ?></em></p>
                                        </dd>
                                    </dl>
                                    <dl class="row">
                                        <dt class="col">
                                            <p><strong>Lokasi</strong></p>
                                        </dt>
                                        <dd class="col">
                                            <p><?= $data['lokasi']; ?></p>
                                        </dd>
                                    </dl>
                                </div>
                                <?php
                                    if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") : ?>
                                    <a href="index.php?page=editoleh&kategori=<?= $kategori; ?>&id=<?= $data['id_rentangharga']; ?>&id2=<?= $id2 = $data['id_artikel']; ?>&action=edit" class="btn btn-warning btn-sm">
                                    <span data-feather="edit"></span>Ubah Data <em><?= $data['merek']; ?></em></a>
                                    <?php endif; ?>
                            </div>
                        </div>
                        <?php if ($i % 2 == 0) echo "</div>" ?>
                <?php endwhile;
                endif; ?>
                <?php if ($i % 2 == 1) echo "</div>"; ?>
            </div>
        </div>
    </div>
</div>