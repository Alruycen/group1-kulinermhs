<title>Tentang Kami</title>
<?php
session_start();
include 'process/proses_tentangkami.php';
?>
<style>
    .col-6 {
        margin-right: 5%;
        margin-bottom: 5%;
    }

    .card-header {
        background: #4e545c;
        color: #e5e8e8;
    }

    .col-6 .card {
        background: #e5e8e8;
    }

    .col-6 .card .card {
        background: #4e545c;
        color: #e5e8e8;
        margin: 5%;
        padding: 2% 7% 5% 7%;
    }

    .col-5 .card {
        background: #e5e8e8;
    }

    .card-img-top {
        height: 8rem;
    }

    .row {
        margin-top: 5%;
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
                    <form action="index.php?page=tentangkami" method="post">
                        <label for="tanggapan">
                            <h3>Form: Kritik dan Saran</h3>
                        </label>
                        <textarea class="form-control" name="tanggapan" id="tanggapan" rows="5"></textarea>
                        <br />
                        <div class="d-grid gap-2">
                            <button type="submit" name="submit-tanggapan" class="btn btn-outline-info"><i data-feather="clipboard"></i> Kirim</button>
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
                <?php
                if (isset($stmtusers)) :
                    $i = 0;
                    while ($data = $stmtusers->fetch()) :
                        $i++;
                        if (file_exists('images/' . $data['foto'])) {
                            $foto = 'images/' . $data['foto'];
                        } else {
                            $foto = '';
                        }
                        if ($i % 2 == 1) echo "<div class='row row-cols-2'>"; ?>
                        <div class="col text-center">
                            <div class="card">
                                <img class="card-img-top" src="<?= $foto; ?>">
                                <a class="btn-outline-dark stretched-link p-3" data-bs-toggle="modal" data-bs-target="#profil<?= $data['id']; ?>"><br />
                                    <h4>Profil <?= $i; ?></h4>
                                </a>
                            </div>
                        </div>
                        <?php if ($i % 2 == 0) echo "</div>"; ?>
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
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <form method="post" action="index.php?page=tentangkami" class="row g-3">
                                            <div class="modal-body mx-3">
                                                <div class="form-control mb-5">
                                                    <input type="text" id="loginForm-name" class="form-control validate" name="loginname" readonly value="<?= $data['username']; ?>">
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
                endif;
                if ($i % 2 == 1) echo "</div>"; ?>
            </div>
        </div>
    </div>
</div>
</div>