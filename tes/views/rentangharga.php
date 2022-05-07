<?php
    include 'views/admin.php';
    require 'process/proses_harga.php';
?>
<style>
    body {
        background: #777;
        overflow-x: clip;
    }

    .d-flex {
        padding: 5% 2.5% 5% 2.5%;
    }

    .col-md-8 {
        max-width: 66%;
        margin-right: 3%;
    }

    .col-md-4 {
        max-width: 30%;
    }

    .card-body {
        overflow-y: scroll;
        height: 24rem;
    }

    .card-img-top {
        object-fit: cover;
        height: 12rem;
    }

    .active {
        border-bottom: 3px solid #fff;
    }

    .nav-link:hover {
        border-bottom: 1px solid #fff;
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
                        if (File_exists('images/' . $data2['foto'])) {
                            $foto = 'images/' . $data2['foto'];
                        } else {
                            $foto = 'images/placeholder.png';
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
                                <img src="<?= $foto; ?>" class="card-img-top">
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
                            </div>
                        </div>
                        <?php if ($i % 2 == 0 && $i % 2 != 1) echo "</div>"; ?>
                <?php endwhile;
                endif; ?>
                <?php if ($i == 1) echo "</div>"; ?>
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
                            <h6><strong><?= $data['penulis']; ?></strong> memberikan ulasan <em><?= $data['merek']; ?></em></h6>
                            <dt class="col-4">
                                <h6>Rating</h6>
                            </dt>
                            <dd class="col-8">
                                <?php for ($i = 0; $i < intval($data['rating']); $i++) : ?>
                                    <i data-feather="star"></i>
                                <?php endfor; ?>
                            </dd>
                            <p><?= $data['ulasan']; ?></p>
                            <p><?= $data['tanggalditulis']; ?></em></p>
                        </dl>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
</div>