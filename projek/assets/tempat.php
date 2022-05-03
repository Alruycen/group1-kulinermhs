<title>Tempat</title>
<style>
    .img-fluid {
        width: 100%;
        margin-bottom: 5%;
        height: 10rem;
        object-fit: cover;
    }

    body {
        padding: 2.5% 5% 0 5%;
        background: #777;
        overflow-x: clip;
    }

    .list-group {
        position: sticky;
        top: 2%;
    }

    .col-sm-8 {
        margin-right: 3%;
        max-width: 66%;
        position: relative;
        max-height: 20rem;
        overflow-y: scroll;
    }

    .col-sm-4 {
        max-width: 30%;
        max-height: 20rem;
        overflow-y: scroll;
    }

    .d-flex {
        position: sticky;
        top: 0;
        z-index: 1;
    }

    .card-img-top {
        height: 8rem;
    }

    .dropdown-header {
        margin-bottom: 5%;
    }

    .active {
        border-bottom: 3px solid #fff;
    }

    .nav-link:hover {
        border-bottom: 1px solid #fff;
    }
</style>

<body>
    <img class="img-fluid" src="../images/sate-bandeng.jpg" alt="slide1">
    <div class="row row-cols-2">
        <div class="col-sm-8" data-bs-spy="scroll" data-bs-offset="10" data-bs-target="#myScrollspy">
            <div class="row">
                <div class="col-md-4 bg-info" id="myScrollspy">
                    <btn class="btn d-block bg-white">Pilih</btn>
                    <div class="list-group">
                        <a class="list-group-item list-group-item-action active" href="#section1">Pasar Malam</a>
                        <a class="list-group-item list-group-item-action" href="#section2">Kafe</a>
                        <a class="list-group-item list-group-item-action" href="#section3">Restoran</a>
                    </div>
                </div>
                <div class="col-md-8 bg-info">
                    <div class="card">
                        <div class="card-body">
                            <div id="section1">
                                <?php
                                include '../process/proses_tempat.php';
                                $i = 0;
                                if ($i == 0 && $data2 = $stmt1->fetch(PDO::FETCH_ASSOC)) : ?>
                                    <div class="row">
                                        <h5><?= $data2['nama']; ?></h5>
                                        <p><?= $data2['deskripsi']; ?></p>
                                    </div>
                                <?php endif; 
                                while ($data = $stmtpasar->fetch(PDO::FETCH_ASSOC)) :
                                    $i++;
                                    $nama = $data['nama'];
                                    $deskripsi = $data['deskripsi'];
                                    $foto;
                                    if (file_exists($data['foto'])) {
                                        $foto = $data['foto'];
                                    } else {
                                        $foto = '../images/placeholder.png';
                                    }
                                    if ($i == 1) : ?>
                                    <h6>Pasar Malam di Tangerang</h6>
                                    <?php endif; ?>
                                    <div class="card">
                                        <div class="card-header">
                                            <dl class="row">
                                                <dt class="col">
                                                    <h6><?= $data['merek']; ?></h6>
                                                </dt>
                                                <dd class="col">
                                                    <a class="btn btn-outline-info" href="../views/formrating.php?page=<?= $kategori = $_GET['page']; ?>&id=<?= $id = $data['id_rentangharga']; ?>&action=read"><i data-feather="clipboard"></i>Berikan ulasan</a>
                                                </dd>
                                            </dl>
                                        </div>
                                        <img src="<?= $foto; ?>" class="card-img-top">
                                        <dl class="row">
                                            <dt class="col-3">
                                                <p><strong>Harga</strong></p>
                                            </dt>
                                            <dd class="col-9">
                                                <p>Rp <em><?= $data['hargaminimal']; ?></em>-<em><?= $data['hargamaksimal']; ?></em></p>
                                            </dd>
                                        </dl>
                                        <dl class="row">
                                            <dt class="col-3">
                                                <p><strong>Lokasi</strong></p>
                                            </dt>
                                            <dd class="col-9">
                                                <p><?= $data['lokasi']; ?></p>
                                            </dd>
                                        </dl>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                            <div id="section2">
                                <?php $i = 0;
                                if ($i == 0 && $data2 = $stmt2->fetch(PDO::FETCH_ASSOC)) : ?>
                                    <div class="row">
                                        <h5><?= $data2['nama']; ?></h5>
                                        <p><?= $data2['deskripsi']; ?></p>
                                    </div>
                                <?php endif; 
                                while ($data = $stmtkafe->fetch(PDO::FETCH_ASSOC)) :
                                    $i++;
                                    $nama = $data['nama'];
                                    $deskripsi = $data['deskripsi'];
                                    $foto;
                                    if (file_exists($data['foto'])) {
                                        $foto = $data['foto'];
                                    } else {
                                        $foto = '../images/placeholder.png';
                                    }
                                    if ($i == 1) : ?>
                                    <h6>Kafe di Tangerang</h6>
                                    <?php endif; ?>
                                    <div class="card">
                                        <div class="card-header">
                                            <dl class="row">
                                                <dt class="col">
                                                    <h6><?= $data['merek']; ?></h6>
                                                </dt>
                                                <dd class="col">
                                                    <a class="btn btn-outline-info" href="../views/formrating.php?page=<?= $kategori = $_GET['page']; ?>&id=<?= $id = $data['id_rentangharga']; ?>&action=read"><i data-feather="clipboard"></i>Berikan ulasan</a>
                                                </dd>
                                            </dl>
                                        </div>
                                        <img src="<?= $foto; ?>" class="card-img-top">
                                        <dl class="row">
                                            <dt class="col-3">
                                                <p><strong>Harga</strong></p>
                                            </dt>
                                            <dd class="col-9">
                                                <p>Rp <em><?= $data['hargaminimal']; ?></em>-<em><?= $data['hargamaksimal']; ?></em></p>
                                            </dd>
                                        </dl>
                                        <dl class="row">
                                            <dt class="col-3">
                                                <p><strong>Lokasi</strong></p>
                                            </dt>
                                            <dd class="col-9">
                                                <p><?= $data['lokasi']; ?></p>
                                            </dd>
                                        </dl>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                            <div id="section3">
                                <?php $i = 0;
                                if ($i == 0 && $data2 = $stmt3->fetch(PDO::FETCH_ASSOC)) : ?>
                                    <div class="row">
                                        <h5><?= $data2['nama']; ?></h5>
                                        <p><?= $data2['deskripsi']; ?></p>
                                    </div>
                                <?php endif; 
                                while ($data = $stmtresto->fetch(PDO::FETCH_ASSOC)) :
                                    $i++;
                                    $nama = $data['nama'];
                                    $deskripsi = $data['deskripsi'];
                                    $foto;
                                    if (file_exists($data['foto'])) {
                                        $foto = $data['foto'];
                                    } else {
                                        $foto = '../images/placeholder.png';
                                    }
                                    if ($i == 1) : ?>
                                    <h6>Restoran di Tangerang</h6>
                                    <?php endif; ?>
                                    <div class="card">
                                        <div class="card-header">
                                            <dl class="row">
                                                <dt class="col">
                                                    <h6><?= $data['merek']; ?></h6>
                                                </dt>
                                                <dd class="col">
                                                    <a class="btn btn-outline-info" href="../views/formrating.php?page=<?= $kategori = $_GET['page']; ?>&id=<?= $id = $data['id_rentangharga']; ?>&action=read"><i data-feather="clipboard"></i>Berikan ulasan</a>
                                                </dd>
                                            </dl>
                                        </div>
                                        <img src="<?= $foto; ?>" class="card-img-top">
                                        <dl class="row">
                                            <dt class="col-3">
                                                <p><strong>Harga</strong></p>
                                            </dt>
                                            <dd class="col-9">
                                                <p>Rp <em><?= $data['hargaminimal']; ?></em>-<em><?= $data['hargamaksimal']; ?></em></p>
                                            </dd>
                                        </dl>
                                        <dl class="row">
                                            <dt class="col-3">
                                                <p><strong>Lokasi</strong></p>
                                            </dt>
                                            <dd class="col-9">
                                                <p><?= $data['lokasi']; ?></p>
                                            </dd>
                                        </dl>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 bg-black">
            <?php
            require 'formtempat.php';
            ?>
            <div class="card">
                <div class="card-header">
                    <h6>Rating dan Ulasan</h6>
                </div>
                <div class="card-body">
                    <div id="section1">
                        <?php while ($data = $stmtratepasar->fetch()) : ?>
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
                        <?php endwhile; ?>
                    </div>
                    <div id="section2">
                        <?php while ($data = $stmtratekafe->fetch()) : ?>
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
                        <?php endwhile; ?>
                    </div>
                    <div id="section3">
                        <?php while ($data = $stmtrateresto->fetch()) : ?>
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
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        feather.replace()
    </script>
</body>
