<title>Oleh-Oleh</title>
<style>
    body {
        background: #777;
        overflow-x: clip;
    }

    .d-flex {
        padding: 5% 2.5% 0 2.5%;
    }

    .col-6 {
        padding: 5%;
    }

    .card-header {
        height: 4rem;
    }

    .scrolling {
        height: 8rem;
        overflow-y: scroll;
        overflow-x: clip;
    }

    .active {
        border-bottom: 3px solid #fff;
    }

    .nav-link:hover {
        border-bottom: 1px solid #fff;
    }
</style>

<body>
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
                    include '../process/proses_oleh.php';
                    $i = 0;
                    while ($data = $stmt->fetch()) :
                        if (File_exists($data['foto'])) {
                            $foto = $data['foto'];
                        } else {
                            $foto = '../images/placeholder.png';
                        }
                        $i++;
                        if ($i % 2 == 1) echo "<div class='row row-cols-2'>"; ?>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h6><?= $data['nama']; ?></h6>
                                </div>
                                <img src="<?= $foto; ?>" class="card-img-top">
                                <div class="scrolling">
                                    <p><em><?= $data['deskripsi']; ?></em></p>
                                </div>
                            </div>
                        </div>
                        <?php if ($i % 2 == 0 && $i % 2 != 1) echo "</div>"; ?>
                    <?php endwhile; ?>
                    <?php if ($i == 1) echo "</div>"; ?>
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
                    while ($data = $stmt2->fetch()) :
                        if (File_exists($data['foto'])) {
                            $foto = $data['foto'];
                        } else {
                            $foto = '../images/placeholder.png';
                        }
                        $i++;
                        if ($i % 2 == 1) echo "<div class='row row-cols-2'>"; ?>
                        <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h6><?= $data['merek']; ?></h6>
                                </div>
                                <img src="<?= $foto; ?>" class="card-img-top">
                                <div class="scrolling">
                                    <dl class="row">
                                        <dt class="col-4">
                                            <p><strong>Harga</strong></p>
                                        </dt>
                                        <dd class="col-8">
                                            <p>Rp <em><?= $data['hargaminimal']; ?></em>-<em><?= $data['hargamaksimal']; ?></em></p>
                                        </dd>
                                    </dl>
                                    <dl class="row">
                                        <dt class="col-4">
                                            <p><strong>Lokasi</strong></p>
                                        </dt>
                                        <dd class="col-8">
                                            <p><?= $data['lokasi']; ?></p>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                        <?php if ($i % 2 == 0 && $i % 2 != 1) echo "</div>"; ?>
                    <?php endwhile; ?>
                    <?php if ($i == 1) echo "</div>"; ?>
                </div>
            </div>
        </div>
    </div>
</body>
