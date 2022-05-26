<title>Tentang Kami</title>
<?php
session_start();
?>
<style>
    body {
        background: #d9e4ec;
        overflow-x: clip;
    }

    .col {
        background: blue;
    }

    .card-header {
        background: #385E72;
        color: white;
    }

    .col-6 {
        margin-right: 5%;

    }

    .col-6 .card {
        background: #6aabd2;
    }

    .col-6 .card .card {
        background: white;
        margin: 5%;
        padding: 2% 7% 5% 7%;
    }

    .col-5 .card {
        background: #6aabd2;
    }

    .img-fluid {
        height: 8rem;
    }

    .row {
        margin-top: 5%;
    }

    .active {
        border-bottom: 3px solid #fff;
    }

    .nav-link:hover {
        border-bottom: 1px solid #fff;
    }
</style>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h1>Tentang Kami</h1>
            </div>
            <div class="card-body">
                <div class="card">
                    <form action="process/proses_tentangkami.php" method="post">
                        <label for="tanggapan"><h3>Form: Kritik dan Saran</h3></label>
                        <textarea class="form-control" name="tanggapan" id="tanggapan" rows="5"></textarea>
                        <br />
                        <div class="d-grid gap-2">
                            <button type="submit" name="submit-tanggapan" class="btn btn-outline-dark">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-5">
        <div class="card text-center">
            <div class="card-header">
                <h5>Para Pengembang</h5>
            </div>
            <?php
            include 'views/register.php';
            ?>
            <div class="card-body">
                <div class="row">
                    <?php
                    include 'process/proses_tentangkami.php';
                    if (isset($stmtusers)) :
                        $i = 0;
                        while ($data = $stmtusers->fetch()) :
                            $i++;
                            if (file_exists('images/' . $data['foto'])) {
                                $foto = 'images/' . $data['foto'];
                            } else {
                                $foto = '';
                            }
                    ?>
                            <div class="col-5 text-center">
                                <a data-bs-toggle="modal" data-bs-target="#profil<?= $data['id']; ?>"><img class="img-fluid" src="<?= $foto; ?>"><br />Profil <?= $i; ?></a>
                            </div>
                            <div class="modal fade" id="profil<?= $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="loginlabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold" id="loginlabel">Profil <?= $i; ?></h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <?php
                                        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') :
                                            if ($_SESSION['username'] == $data['username']) : ?>
                                                <a class="btn btn-secondary btn-rounded mb-4" href="process/proses_tentangkami.php?action=logout">LOGOUT HERE</a>
                                            <?php else : ?>

                                            <?php endif; ?>
                                        <?php else : ?>
                                            <form method="post" action="process/proses_tentangkami.php" class="row g-3">
                                                <div class="modal-body mx-3">
                                                    <div class="form-control mb-5">
                                                        <input type="text" id="loginForm-name" class="form-control validate" name="uname" readonly value="<?= $data['username']; ?>">
                                                        <label for="loginForm-name">Username</label>
                                                    </div>

                                                    <div class="form-control mb-4">
                                                        <input type="password" id="loginForm-pass" class="form-control validate" name="upass" maxlength="11" required>
                                                        <label data-error="wrong" data-success="right" for="loginForm-pass">Password</label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="modal-footer d-flex">
                                                        <button type="submit" name="submit-login" class="btn btn-default">Login</button>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                    <?php endwhile;
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<br /><br /><br /><br /><br /><br />