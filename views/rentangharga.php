<?php
    include 'views/admin.php';
    require 'process/proses_harga.php';
?>
<style>

    .d-flex {
        padding: 5% 2.5% 5% 2.5%;
    }

    .col-md-8 {
        max-width: 66%;
        margin-right: 3%;
    }
    .col-md-8 .card {
        background: #d9e4ec;
    }

    .col-md-8 .card-body {
        background: #6aabd2;
    }

    .col-md-4 {
        max-width: 30%;
    }

    .col-md-8 .card .card {
        background: #d9e4ec;
    }

    .card-body {
        overflow-y: scroll;
        height: 24rem;
    }

    .card-img-top {
        height: 12rem;
    }
</style>

<div class="row">
    <div class="col-md-8">
        <?php include 'formharga.php'; ?>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>Rentang Harga</h5>
            </div>
            <div class="card-body">
                <?php
                $i = 0;
                if (isset($stmt2)) :
                    while ($data2 = $stmt2->fetch()) :
                        if (file_exists('images/' . $data2['foto_rentangharga']) && $data2['foto_rentangharga'] != null) {
                            $foto = 'images/' . $data2['foto_rentangharga'];
                        } elseif (file_exists('images/'.$data2['foto'])) {
                            $foto = 'images/'.$data2['foto'];
                        } else {
                            $foto = '';
                        }
                        $i++;
                        if ($i % 2 == 1) echo "<div class='row row-cols-2'>"; ?>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <dl class="row">
                                        <dt class="col">
                                            <h6><?= $data2['merek']; ?></h6>
                                        </dt>
                                        <dd class="col">
                                            <a class="btn btn-outline-info" href="index.php?page=formrating&page2=rentangharga&kategori=<?= $kategori = $_GET['kategori']; ?>&id=<?= $id = $data2['id_rentangharga']; ?>&action=read"><i data-feather="clipboard"></i>Berikan ulasan</a>
                                        </dd>
                                    </dl>
                                </div>
                                <img src="<?= $foto; ?>" class="card-img-top" loading="lazy">
                                <dl class="row">
                                    <dt class="col-3">
                                        <p><strong>Harga</strong></p>
                                    </dt>
                                    <dd class="col-9">
                                        <p>Rp <em><?= $data2['hargaminimal']; ?></em>-<em><?= $data2['hargamaksimal']; ?></em></p>
                                    </dd>
                                </dl>
                                <dl class="row">
                                    <dt class="col-3">
                                        <p><strong>Lokasi</strong></p>
                                    </dt>
                                    <dd class="col-9">
                                        <p><?= $data2['lokasi']; ?></p>
                                    </dd>
                                </dl>
                                <?php
                                if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") : ?>
                                    <a href="index.php?page=editharga&kategori=<?= $kategori; ?>&id=<?= $data2['id_rentangharga']; ?>&id2=<?= $id2 = $data2['id_artikel']; ?>&action=edit" class="btn btn-warning btn-sm">
                                    <span data-feather="edit"></span>Ubah Data <em><?= $data2['merek']; ?></em></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php if ($i % 2 == 0) echo "</div>"; ?>
                <?php endwhile;
                endif; ?>
                <?php if ($i % 2 == 1) echo "</div>"; ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>Rating & Review</h5>
            </div>
            <div class="card-body">
                <?php
                if (isset($stmt)) :
                    while ($data = $stmt->fetch()) : ?>
                        <dl class="row row-cols-1">
                            <div class="card-header">
                                <h6><strong><?= $data['penulis']; ?></strong> memberikan ulasan <em><?= $data['merek']; ?></em></h6>
                            </div>
                            <dt class="col-4">
                                <h6>Rating</h6>
                            </dt>
                            <dd class="col-8">
                                <?php for ($i = 0; $i < intval($data['rating']); $i++) : ?>
                                    <i data-feather="star"></i>
                                <?php endfor; ?>
                            </dd>
                            <blockquote class="blockquote">
                                <p>"<?= $data['ulasan']; ?>"</p>
                            </blockquote>
                            <div class="card-footer">
                                <p><?= $data['tanggalditulis']; ?></em></p>
                            </div>
                        </dl>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
</div>