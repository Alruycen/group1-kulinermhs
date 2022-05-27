<?php
include 'views/admin.php';
require 'process/proses_tempat.php';
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
    .img-fluid {
        width: 100%;
        margin: 2% 0 5% 0;
        padding: 0 2% 0 2%;
        max-height: 10rem;
    }

    #body1 {
        margin: 0 3% 5% 3%;
        position: relative;
        max-height: 20rem;
        overflow-y: scroll;
        background: #6aabd2;
        
    }

    #body1 .col-4 {
        margin: 5% 0 0 0;
        overflow-y: clip;
    }

    .list-group {
        position: sticky;
        top: 2%;
    }

    #judulscroll {
        border-radius: 1rem;
        margin-bottom: 5%;
    }

    #isiscroll {
        border-radius: 1rem;
    }

    #body1 .card {
        background: #d9e4ec;
        margin-top: 5%;
        margin-bottom: 5%;
    }

    #body1 dt p {
        padding-left: 5%;
    }

    #body1 dd a {
        float: right;
    }

    #body2 {
        max-height: 20rem;
        overflow-y: scroll;
        background: #6aabd2;
        margin-bottom: 5%;
    }

    #body2 form {
        margin-top: 5%;
        margin-bottom: 5%;
        position: sticky;
        top: 0;
        z-index: 1;
    }

    #body2 a {
        float: right;
    }

    .card-img-top {
        max-height: 8rem;
    }

    .dropdown-header {
        margin-bottom: 5%;
    }

    form select {
        margin-right: 1%;
    }

    .btn-outline-success {
        background: #d9e4ec;
    }
</style>
<?php
$sqlbanner = "SELECT foto FROM artikel WHERE id_kategori = 3";

$stmtbanner = $conn->query($sqlbanner);
if (isset($stmtbanner)) {
    $banner = $stmtbanner->fetch();
}

?>
<img class="img-fluid" src="images/<?= $banner['foto']; ?>" alt="slide1">
<div class="row">
    <div class="col-7 col-s-12" id="body1" data-bs-spy="scroll" data-bs-offset="5" data-bs-target="#myScrollspy">
        <div class="row">
            <div class="col-4 col-s-6" id="myScrollspy">
                <btn class="btn d-block bg-white" id="judulscroll">Pilih</btn>
                <div class="list-group" id="isiscroll">
                    <a class="list-group-item list-group-item-action active" href="#section1">Pasar Malam</a>
                    <a class="list-group-item list-group-item-action" href="#section2">Kafe</a>
                    <a class="list-group-item list-group-item-action" href="#section3">Restoran</a>
                </div>
            </div>
            <div class="col-8 col-s-6">
                <div class="card">
                    <div class="card-body">
                        <div id="section1">
                            <?php
                            $i = 0;
                            if ($i == 0 && $data = $stmt1->fetch(PDO::FETCH_ASSOC)) : ?>
                                <div class="row">
                                    <h5><?= $data['nama']; ?></h5>
                                    <p><?= $data['deskripsi']; ?></p>
                                </div>
                                <?php endif;
                            if (isset($stmtpasar)) :
                                while ($data = $stmtpasar->fetch(PDO::FETCH_ASSOC)) :
                                    $i++;
                                    $nama = $data['nama'];
                                    $deskripsi = $data['deskripsi'];
                                    $foto;
                                    if (file_exists('images/' . $data['foto'])) {
                                        $foto = 'images/' . $data['foto'];
                                    } else {
                                        $foto = 'images/placeholder.png';
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
                                                    <a class="btn btn-outline-info" href="index.php?page=formrating&page2=tempat&kategori=<?= $kategori = $_GET['page']; ?>&id=<?= $id = $data['id_rentangharga']; ?>&action=read"><i data-feather="clipboard"></i>Berikan ulasan</a>
                                                </dd>
                                            </dl>
                                        </div>
                                        <img src="<?= $foto; ?>" class="card-img-top" loading="lazy">
                                        <dl class="row">
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
                                        <?php
                                        if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") : ?>
                                            <a href="index.php?page=edittempat&kategori=<?= $kategori; ?>&id=<?= $data['id_rentangharga']; ?>&id2=<?= $id2 = $data['id_artikel']; ?>&action=edit" class="btn btn-warning btn-sm">
                                                <span data-feather="edit"></span>Ubah Data <em><?= $data['merek']; ?></em></a>
                                        <?php endif; ?>
                                    </div>
                            <?php endwhile;
                            endif; ?>
                        </div>
                        <div id="section2">
                            <?php $i = 0;
                            if ($i == 0 && $data = $stmt2->fetch(PDO::FETCH_ASSOC)) : ?>
                                <div class="row">
                                    <h5><?= $data['nama']; ?></h5>
                                    <p><?= $data['deskripsi']; ?></p>
                                </div>
                                <?php endif;
                            if (isset($stmtkafe)) :
                                while ($data = $stmtkafe->fetch(PDO::FETCH_ASSOC)) :
                                    $i++;
                                    $nama = $data['nama'];
                                    $deskripsi = $data['deskripsi'];
                                    $foto;
                                    if (file_exists('images/' . $data['foto'])) {
                                        $foto = 'images/' . $data['foto'];
                                    } else {
                                        $foto = 'images/placeholder.png';
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
                                                    <a class="btn btn-outline-info" href="index.php?page=formrating&page2=tempat&kategori=<?= $kategori = $_GET['page']; ?>&id=<?= $id = $data['id_rentangharga']; ?>&action=read"><i data-feather="clipboard"></i>Berikan ulasan</a>
                                                </dd>
                                            </dl>
                                        </div>
                                        <img src="<?= $foto; ?>" class="card-img-top" loading="lazy">
                                        <dl class="row">
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
                                        <?php
                                        if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") : ?>
                                            <a href="index.php?page=edittempat&kategori=<?= $kategori; ?>&id=<?= $data['id_rentangharga']; ?>&id2=<?= $id2 = $data['id_artikel']; ?>&action=edit" class="btn btn-warning btn-sm">
                                                <span data-feather="edit"></span>Ubah Data <em><?= $data['merek']; ?></em></a>
                                        <?php endif; ?>
                                    </div>
                            <?php endwhile;
                            endif; ?>
                        </div>
                        <div id="section3">
                            <?php $i = 0;
                            if ($i == 0 && $data = $stmt3->fetch(PDO::FETCH_ASSOC)) : ?>
                                <div class="row">
                                    <h5><?= $data['nama']; ?></h5>
                                    <p><?= $data['deskripsi']; ?></p>
                                </div>
                                <?php endif;
                            if (isset($stmtresto)) :
                                while ($data = $stmtresto->fetch(PDO::FETCH_ASSOC)) :
                                    $i++;
                                    $nama = $data['nama'];
                                    $deskripsi = $data['deskripsi'];
                                    $foto;
                                    if (file_exists('images/' . $data['foto'])) {
                                        $foto = 'images/' . $data['foto'];
                                    } else {
                                        $foto = 'images/placeholder.png';
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
                                                <dd class="col ">
                                                    <a class="btn btn-outline-info" href="index.php?page=formrating&page2=tempat&kategori=<?= $kategori = $_GET['page']; ?>&id=<?= $id = $data['id_rentangharga']; ?>&action=read"><i data-feather="clipboard"></i>Berikan ulasan</a>
                                                </dd>
                                            </dl>
                                        </div>
                                        <img src="<?= $foto; ?>" class="card-img-top" loading="lazy">
                                        <dl class="row">
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
                                        <?php
                                        if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") : ?>
                                            <a href="index.php?page=edittempat&kategori=<?= $kategori; ?>&id=<?= $data['id_rentangharga']; ?>&id2=<?= $id2 = $data['id_artikel']; ?>&action=edit" class="btn btn-warning btn-sm">
                                                <span data-feather="edit"></span>Ubah Data <em><?= $data['merek']; ?></em></a>
                                        <?php endif; ?>
                                    </div>
                            <?php endwhile;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4 col-s-12" id="body2">
        <?php
        require 'formtempat.php';
        ?>
        <div class="card">
            <div class="card-header">
                <h6>Rating dan Ulasan</h6>
            </div>
            <div class="card-body">
                <div id="section1">
                    <?php if (isset($stmtratepasar)) : while ($data = $stmtratepasar->fetch()) : ?>
                            <dl class="row">
                                <div class="card-header">
                                    <h6><strong><?= $data['penulis']; ?></strong> memberikan ulasan <em><?= $data['merek']; ?></em></h6>
                                </div>
                                <dt class="col">
                                    <h6>Rating</h6>
                                </dt>
                                <dd class="col">
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
                                </dd>
                            </dl>
                    <?php endwhile;
                    endif; ?>
                </div>
                <div id="section2">
                    <?php if (isset($stmtratekafe)) : while ($data = $stmtratekafe->fetch()) : ?>
                            <dl class="row">
                                <div class="card-header">
                                    <h6><strong><?= $data['penulis']; ?></strong> memberikan ulasan <em><?= $data['merek']; ?></em></h6>
                                </div>
                                <dt class="col">
                                    <h6>Rating</h6>
                                </dt>
                                <dd class="col">
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
                <div id="section3">
                    <?php if (isset($stmtrateresto)) : while ($data = $stmtrateresto->fetch()) : ?>
                            <dl class="row">
                                <div class="card-header">
                                    <h6><strong><?= $data['penulis']; ?></strong> memberikan ulasan <em><?= $data['merek']; ?></em></h6>
                                </div>
                                <dt class="col">
                                    <h6>Rating</h6>
                                </dt>
                                <dd class="col">
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
</div>