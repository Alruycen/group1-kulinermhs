<title>Artikel</title>
<style>
    body {
        background: #777;
        overflow-x: clip;
    }

    .row {
        padding-left: 5%;
        margin-bottom: 5%;
    }

    .col-m-8 {
        padding-left: 5%;
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
        padding-left: 5%;
        margin-left: 10%;
        position: relative;
        padding-top: 1%;
    }

    .scrolling {
        height: 16rem;
        overflow-y: scroll;
    }

    .card-img-top {
        height: 12rem;
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
        <div class="col-m-8">
            <?php
            include '../process/proses_artikel.php';
            while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) :
                $nama = $data['nama'];
                $deskripsi = $data['deskripsi'];
                $foto;
                if (file_exists($data['foto'])) {
                    $foto = $data['foto'];
                } else {
                    $foto = '../images/placeholder.png';
                }
            ?>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h5><?= $nama; ?></h5>
                            </div>
                        </div>
                        <img class="card-img-top" src="<?= $foto; ?>">
                    </div>
                    <div class="col-4">
                        <div class="card">
                            <div class="scrolling">
                                <p><em><?= $deskripsi; ?></em></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>

        </div>
        <div class="col-m-4">
            <?php 
            include '../process/proses_artikel.php';
            include '../assets/sidebar.php'; ?>
        </div>
    </div>
</body>
