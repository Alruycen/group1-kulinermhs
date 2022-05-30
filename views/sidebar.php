<?php
include 'process/proses_sidebar.php';
require 'process/proses_artikel.php';
?>
<style>
    #sidebar {
        background: #4e545c;
        color: #e5e8e8;
    }
</style>

<div class="card" id="sidebar">
    <div class="card-body">
        <?php require 'formartikel.php'; ?>
        <ul>
            <li>
                <h5 class="card-title">Artikel Terbaru</h5>
            </li>
            <?php
            if (isset($_GET['page'])) :
                switch ($_GET['page']):
                    case "makanan":
                        $i = 1;
                        $stmtterbaru = $conn->prepare($sqlterbaru);
                        $stmtterbaru->execute([$i, $i]);
                        $stmtdiminati = $conn->prepare($sqldiminati);
                        $stmtdiminati->execute([$i, $i]);
                        if (isset($stmtterbaru)) :
                            while ($data = $stmtterbaru->fetch(PDO::FETCH_ASSOC)) :
                                if (file_exists('images/' . $data['foto'])) {
                                    $foto = 'images/' . $data['foto'];
                                } else {
                                    $foto = 'images/placeholder.png';
                                } ?>
                                <a class="card-link" href="index.php?page=zoomsidebar&kategori=<?= $kategori = $_GET['page']; ?>&idterbaru=<?= $data['id']; ?>"><img class="card-img mb-2" src="<?= $foto; ?>" alt="artikel terbaru"></a>
                        <?php endwhile;
                        endif; ?>
                        <li>
                            <h5 class="card-title">Yang Paling Diminati</h5>
                        </li>
                        <?php
                        if (isset($stmtdiminati)) :
                            while ($data = $stmtdiminati->fetch(PDO::FETCH_ASSOC)) :
                                if (file_exists('images/' . $data['foto_rentangharga']) && $data['foto_rentangharga'] != null) {
                                    $foto = 'images/' . $data['foto_rentangharga'];
                                } elseif (file_exists('images/' . $data['foto'])) {
                                    $foto = 'images/' . $data['foto'];
                                } else {
                                    $foto = "";
                                } ?>
                                <a class="card-link" href="index.php?page=zoomsidebar&kategori=<?= $kategori = $_GET['page']; ?>&iddiminati=<?= $data['id']; ?>"><img class="card-img mb-2" src="<?= $foto; ?>" alt="yang paling diminati"><a>
                                <?php endwhile;
                        endif; ?>
        </ul>
        <h6 class="card-subtitle">Makanan khas</h6>
        <ul>
            <?php
                        if (isset($stmt)) :
                            while ($data = $stmt->fetch()) : ?>
                    <li>
                        <p><?= $data['nama']; ?></p>
                    </li>
            <?php endwhile;
                        endif; ?>
        </ul>
        <h6 class="card-subtitle">Cari Jajanan?</h6>
        <ul>
            <li><a class="card-link link-light" href="index.php?page=oleholeh">Cek di oleh-oleh khas</a></li>
            <li><a class="card-link link-light" href="index.php?page=tempat">Cek di tempat pasar malam</a></li>
        </ul>
    </div>
</div>
<?php
                        break;
                    case "minuman":
                        $i = 2;
                        $stmtterbaru = $conn->prepare($sqlterbaru);
                        $stmtterbaru->execute([$i, $i]);
                        $stmtdiminati = $conn->prepare($sqldiminati);
                        $stmtdiminati->execute([$i, $i]);
                        if (isset($stmtterbaru)) :
                            while ($data = $stmtterbaru->fetch(PDO::FETCH_ASSOC)) :
                                if (file_exists('images/' . $data['foto'])) {
                                    $foto = 'images/' . $data['foto'];
                                } else {
                                    $foto = 'images/placeholder.png';
                                } ?>
        <a href="index.php?page=zoomsidebar&kategori=<?= $kategori = $_GET['page']; ?>&idterbaru=<?= $data['id']; ?>" class="card-link"><img class="card-img mb-2" src="<?= $foto; ?>" alt="artikel terbaru"></a>
<?php endwhile;
                        endif; ?>
<li>
    <h5 class="card-title">Yang Paling Diminati</h5>
</li>
<?php
                        if (isset($stmtdiminati)) :
                            while ($data = $stmtdiminati->fetch(PDO::FETCH_ASSOC)) :
                                if (file_exists('images/' . $data['foto_rentangharga']) && $data['foto_rentangharga'] != null) {
                                    $foto = 'images/' . $data['foto_rentangharga'];
                                } elseif (file_exists('images/' . $data['foto'])) {
                                    $foto = 'images/' . $data['foto'];
                                } else {
                                    $foto = "";
                                } ?>
        <a class="card-link" href="index.php?page=zoomsidebar&kategori=<?= $kategori = $_GET['page']; ?>&iddiminati=<?= $data['id']; ?>"><img class="card-img mb-2" src="<?= $foto; ?>" alt="yang paling diminati"><a>
        <?php endwhile;
                        endif; ?>
        </ul>
        <h6 class="card-subtitle">Minuman khas</h6>
        <ul>
            <?php
                        if (isset($stmt)) :
                            while ($data = $stmt->fetch()) : ?>
                    <li>
                        <p><?= $data['nama']; ?></p>
                    </li>
            <?php endwhile;
                        endif; ?>
        </ul>
        <h6 class="card-subtitle">Cari tempat nongkrong?</h6>
        <ul>
            <li><a class="card-link link-light" href="index.php?page=tempat">Cek di tempat kafe</a></li>
        </ul>
        </div>
        </div>
        <?php
                        break;
                    case "tempat":
                        $i = 3;
                        $stmtterbaru = $conn->prepare($sqlterbaru);
                        $stmtterbaru->execute([$i, $i]);
                        $stmtdiminati = $conn->prepare($sqldiminati);
                        $stmtdiminati->execute([$i, $i]);
                        if (isset($stmtterbaru)) :
                            while ($data = $stmtterbaru->fetch(PDO::FETCH_ASSOC)) :
                                if (file_exists('images/' . $data['foto'])) {
                                    $foto = 'images/' . $data['foto'];
                                } else {
                                    $foto = 'images/placeholder.png';
                                } ?>
                <a class="card-link" href="index.php?page=zoomsidebar&kategori=<?= $kategori = $_GET['page']; ?>&idterbaru=<?= $data['id']; ?>"><img class="card-img mb-2" src="<?= $foto; ?>" alt="artikel terbaru"></a>
        <?php endwhile;
                        endif; ?>
        <li>
            <h5 class="card-title">Yang Paling Diminati</h5>
        </li>
        <?php
                        if (isset($stmtdiminati)) :
                            while ($data = $stmtdiminati->fetch(PDO::FETCH_ASSOC)) :
                                if (file_exists('images/' . $data['foto_rentangharga']) && $data['foto_rentangharga'] != null) {
                                    $foto = 'images/' . $data['foto_rentangharga'];
                                } elseif (file_exists('images/' . $data['foto'])) {
                                    $foto = 'images/' . $data['foto'];
                                } else {
                                    $foto = "";
                                } ?>
                <a class="card-link" href="index.php?page=zoomsidebar&kategori=<?= $kategori = $_GET['page']; ?>&iddiminati=<?= $data['id']; ?>"><img class="card-img mb-2" src="<?= $foto; ?>" alt="yang paling diminati"><a>
                <?php endwhile;
                        endif; ?>
                </ul>
                <h6 class="card-subtitle">Tempat khas</h6>
                <ul>
                    <?php
                        if (isset($stmt)) :
                            while ($data = $stmt->fetch()) : ?>
                            <li>
                                <p><?= $data['nama']; ?></p>
                            </li>
                    <?php endwhile;
                        endif; ?>
                </ul>
                <h6 class="card-subtitle">Cari Lebih Banyak?</h6>
                <ul>
                    <li><a class="card-link link-light" href="index.php?page=tempat">Cek di tempat</a></li>
                </ul>
                </div>
                </div>
                <?php
                        break;
                    case "oleholeh":
                        $i = 4;
                        $stmtterbaru = $conn->prepare($sqlterbaru);
                        $stmtterbaru->execute([$i, $i]);
                        $stmtdiminati = $conn->prepare($sqldiminati);
                        $stmtdiminati->execute([$i, $i]);
                        if (isset($stmtterbaru)) :
                            while ($data = $stmtterbaru->fetch(PDO::FETCH_ASSOC)) :
                                if (file_exists('images/' . $data['foto'])) {
                                    $foto = 'images/' . $data['foto'];
                                } else {
                                    $foto = 'images/placeholder.png';
                                } ?>
                        <a class="card-link" href="index.php?page=zoomsidebar&kategori=<?= $kategori = $_GET['page']; ?>&idterbaru=<?= $data['id']; ?>"><img class="card-img mb-2" src="<?= $foto; ?>" alt="artikel terbaru"></a>
                <?php endwhile;
                        endif; ?>
                <li>
                    <h5 class="card-title">Yang Paling Diminati</h5>
                </li>
                <?php
                        if (isset($stmtdiminati)) :
                            while ($data = $stmtdiminati->fetch(PDO::FETCH_ASSOC)) :
                                if (file_exists('images/' . $data['foto_rentangharga']) && $data['foto_rentangharga'] != null) {
                                    $foto = 'images/' . $data['foto_rentangharga'];
                                } elseif (file_exists('images/' . $data['foto'])) {
                                    $foto = 'images/' . $data['foto'];
                                } else {
                                    $foto = "";
                                } ?>
                        <a class="card-link" href="index.php?page=zoomsidebar&kategori=<?= $kategori = $_GET['page']; ?>&iddiminati=<?= $data['id']; ?>"><img class="card-img mb-2" src="<?= $foto; ?>" alt="yang paling diminati"><a>
                        <?php endwhile;
                        endif; ?>
                        </ul>
                        <h6 class="card-subtitle">Oleh-Oleh khas</h6>
                        <ul>
                            <?php
                            if (isset($stmt)) :
                                while ($data = $stmt->fetch()) : ?>
                                    <li>
                                        <p><?= $data['nama']; ?></p>
                                    </li>
                            <?php endwhile;
                            endif; ?>
                        </ul>
                        <h6 class="card-subtitle">Cari Lebih Banyak?</h6>
                        <ul>
                            <li><a class="card-link link-light" href="index.php?page=oleholeh">Cek di oleh-oleh khas</a></li>
                        </ul>
                        </div>
                        </div>
                        <?php
                        break;
                    default:
                        if (isset($_GET['kategori'])) :
                            switch ($_GET['kategori']):
                                case "makanan":
                                    $i = 1;
                                    $stmtterbaru = $conn->prepare($sqlterbaru);
                                    $stmtterbaru->execute([$i, $i]);
                                    $stmtdiminati = $conn->prepare($sqldiminati);
                                    $stmtdiminati->execute([$i, $i]);
                                    if (isset($stmtterbaru)) :
                                        while ($data = $stmtterbaru->fetch(PDO::FETCH_ASSOC)) :
                                            if (file_exists('images/' . $data['foto'])) {
                                                $foto = 'images/' . $data['foto'];
                                            } else {
                                                $foto = 'images/placeholder.png';
                                            } ?>
                                            <a class="card-link" href="index.php?page=zoomsidebar&kategori=<?= $kategori = $_GET['kategori']; ?>&idterbaru=<?= $data['id']; ?>"><img class="card-img mb-2" src="<?= $foto; ?>" alt="artikel terbaru"></a>
                                    <?php endwhile;
                                    endif; ?>
                                    <li>
                                        <h5 class="card-title">Yang Paling Diminati</h5>
                                    </li>
                                    <?php
                                    if (isset($stmtdiminati)) :
                                        while ($data = $stmtdiminati->fetch(PDO::FETCH_ASSOC)) :
                                            if (file_exists('images/' . $data['foto_rentangharga']) && $data['foto_rentangharga'] != null) {
                                                $foto = 'images/' . $data['foto_rentangharga'];
                                            } elseif (file_exists('images/' . $data['foto'])) {
                                                $foto = 'images/' . $data['foto'];
                                            } else {
                                                $foto = "";
                                            } ?>
                                            <a class="card-link" href="index.php?page=zoomsidebar&kategori=<?= $kategori = $_GET['kategori']; ?>&iddiminati=<?= $data['id']; ?>"><img class="card-img mb-2" src="<?= $foto; ?>" alt="yang paling diminati"><a>
                                            <?php endwhile;
                                    endif; ?>
                                            </ul>
                                            <h6 class="card-subtitle">Makanan khas</h6>
                                            <ul>
                                                <?php
                                                if (isset($stmt)) :
                                                    while ($data = $stmt->fetch()) : ?>
                                                        <li>
                                                            <p><?= $data['nama']; ?></p>
                                                        </li>
                                                <?php endwhile;
                                                endif; ?>
                                            </ul>
                                            <h6 class="card-subtitle">Cari Jajanan?</h6>
                                            <ul>
                                                <li><a class="card-link link-light" href="index.php?page=oleholeh">Cek di oleh-oleh khas</a></li>
                                                <li><a class="card-link link-light" href="index.php?page=tempat">Cek di tempat pasar malam</a></li>
                                            </ul>
                                            </div>
                                            </div>
                                            <?php
                                            break;
                                        case "minuman":
                                            $i = 2;
                                            $stmtterbaru = $conn->prepare($sqlterbaru);
                                            $stmtterbaru->execute([$i, $i]);
                                            $stmtdiminati = $conn->prepare($sqldiminati);
                                            $stmtdiminati->execute([$i, $i]);
                                            if (isset($stmtterbaru)) :
                                                while ($data = $stmtterbaru->fetch(PDO::FETCH_ASSOC)) :
                                                    if (file_exists('images/' . $data['foto'])) {
                                                        $foto = 'images/' . $data['foto'];
                                                    } else {
                                                        $foto = 'images/placeholder.png';
                                                    } ?>
                                                    <a href="index.php?page=zoomsidebar&kategori=<?= $kategori = $_GET['kategori']; ?>&idterbaru=<?= $data['id']; ?>" class="card-link"><img class="card-img mb-2" src="<?= $foto; ?>" alt="artikel terbaru"></a>
                                            <?php endwhile;
                                            endif; ?>
                                            <li>
                                                <h5 class="card-title">Yang Paling Diminati</h5>
                                            </li>
                                            <?php
                                            if (isset($stmtdiminati)) :
                                                while ($data = $stmtdiminati->fetch(PDO::FETCH_ASSOC)) :
                                                    if (file_exists('images/' . $data['foto_rentangharga']) && $data['foto_rentangharga'] != null) {
                                                        $foto = 'images/' . $data['foto_rentangharga'];
                                                    } elseif (file_exists('images/' . $data['foto'])) {
                                                        $foto = 'images/' . $data['foto'];
                                                    } else {
                                                        $foto = "";
                                                    } ?>
                                                    <a class="card-link" href="index.php?page=zoomsidebar&kategori=<?= $kategori = $_GET['kategori']; ?>&iddiminati=<?= $data['id']; ?>"><img class="card-img mb-2" src="<?= $foto; ?>" alt="yang paling diminati"><a>
                                                    <?php endwhile;
                                            endif; ?>
                                                    </ul>
                                                    <h6 class="card-subtitle">Minuman khas
                                                        <ul>
                                                            <?php
                                                            if (isset($stmt)) :
                                                                while ($data = $stmt->fetch()) : ?>
                                                                    <li>
                                                                        <p><?= $data['nama']; ?></p>
                                                                    </li>
                                                            <?php endwhile;
                                                            endif; ?>
                                                        </ul>
                                                        <h6 class="card-subtitle">Cari tempat nongkrong
                                                            <ul>
                                                                <li><a class="card-link link-light" href="index.php?page=tempat">Cek di tempat kafe</a></li>
                                                            </ul>
                                                            </div>
                                                            </div>
                                                            <?php
                                                            break;
                                                        case "tempat":
                                                            $i = 3;
                                                            $stmtterbaru = $conn->prepare($sqlterbaru);
                                                            $stmtterbaru->execute([$i, $i]);
                                                            $stmtdiminati = $conn->prepare($sqldiminati);
                                                            $stmtdiminati->execute([$i, $i]);
                                                            if (isset($stmtterbaru)) :
                                                                while ($data = $stmtterbaru->fetch(PDO::FETCH_ASSOC)) :
                                                                    if (file_exists('images/' . $data['foto'])) {
                                                                        $foto = 'images/' . $data['foto'];
                                                                    } else {
                                                                        $foto = 'images/placeholder.png';
                                                                    } ?>
                                                                    <a class="card-link" href="index.php?page=zoomsidebar&kategori=<?= $kategori = $_GET['kategori']; ?>&idterbaru=<?= $data['id']; ?>"><img class="card-img mb-2" src="<?= $foto; ?>" alt="artikel terbaru"></a>
                                                            <?php endwhile;
                                                            endif; ?>
                                                            <li>
                                                                <h5 class="card-title">Yang Paling Diminati</h5>
                                                            </li>
                                                            <?php
                                                            if (isset($stmtdiminati)) :
                                                                while ($data = $stmtdiminati->fetch(PDO::FETCH_ASSOC)) :
                                                                    if (file_exists('images/' . $data['foto_rentangharga']) && $data['foto_rentangharga'] != null) {
                                                                        $foto = 'images/' . $data['foto_rentangharga'];
                                                                    } elseif (file_exists('images/' . $data['foto'])) {
                                                                        $foto = 'images/' . $data['foto'];
                                                                    } else {
                                                                        $foto = "";
                                                                    } ?>
                                                                    <a class="card-link" href="index.php?page=zoomsidebar&kategori=<?= $kategori = $_GET['kategori']; ?>&iddiminati=<?= $data['id']; ?>"><img class="card-img mb-2" src="<?= $foto; ?>" alt="yang paling diminati"><a>
                                                                    <?php endwhile;
                                                            endif; ?>
                                                                    </ul>
                                                                    <h6 class="card-subtitle">Tempat khas</h6>
                                                                    <ul>
                                                                        <?php
                                                                        if (isset($stmt)) :
                                                                            while ($data = $stmt->fetch()) : ?>
                                                                                <li>
                                                                                    <p><?= $data['nama']; ?></p>
                                                                                </li>
                                                                        <?php endwhile;
                                                                        endif; ?>
                                                                    </ul>
                                                                    <h6 class="card-subtitle">Cari Lebih Banyak?</h6>
                                                                    <ul>
                                                                        <li><a class="card-link link-light" href="index.php?page=tempat">Cek di tempat</a></li>
                                                                    </ul>
                                                                    </div>
                                                                    </div>
                                                                    <?php
                                                                    break;
                                                                case "oleholeh":
                                                                    $i = 4;
                                                                    $stmtterbaru = $conn->prepare($sqlterbaru);
                                                                    $stmtterbaru->execute([$i, $i]);
                                                                    $stmtdiminati = $conn->prepare($sqldiminati);
                                                                    $stmtdiminati->execute([$i, $i]);
                                                                    if (isset($stmtterbaru)) :
                                                                        while ($data = $stmtterbaru->fetch(PDO::FETCH_ASSOC)) :
                                                                            if (file_exists('images/' . $data['foto'])) {
                                                                                $foto = 'images/' . $data['foto'];
                                                                            } else {
                                                                                $foto = 'images/placeholder.png';
                                                                            } ?>
                                                                            <a class="card-link" href="index.php?page=zoomsidebar&kategori=<?= $kategori = $_GET['kategori']; ?>&idterbaru=<?= $data['id']; ?>"><img class="card-img mb-2" src="<?= $foto; ?>" alt="artikel terbaru"></a>
                                                                    <?php endwhile;
                                                                    endif; ?>
                                                                    <li>
                                                                        <h5 class="card-title">Yang Paling Diminati</h5>
                                                                    </li>
                                                                    <?php
                                                                    if (isset($stmtdiminati)) :
                                                                        while ($data = $stmtdiminati->fetch(PDO::FETCH_ASSOC)) :
                                                                            if (file_exists('images/' . $data['foto_rentangharga']) && $data['foto_rentangharga'] != null) {
                                                                                $foto = 'images/' . $data['foto_rentangharga'];
                                                                            } elseif (file_exists('images/' . $data['foto'])) {
                                                                                $foto = 'images/' . $data['foto'];
                                                                            } else {
                                                                                $foto = "";
                                                                            } ?>
                                                                            <a class="card-link" href="index.php?page=zoomsidebar&kategori=<?= $kategori = $_GET['kategori']; ?>&iddiminati=<?= $data['id']; ?>"><img class="card-img mb-2" src="<?= $foto; ?>" alt="yang paling diminati"><a>
                                                                            <?php endwhile;
                                                                    endif; ?>
                                                                            </ul>
                                                                            <h6 class="card-subtitle">Oleh-Oleh khas</h6>
                                                                            <ul>
                                                                                <?php
                                                                                if (isset($stmt)) :
                                                                                    while ($data = $stmt->fetch()) : ?>
                                                                                        <li>
                                                                                            <p><?= $data['nama']; ?></p>
                                                                                        </li>
                                                                                <?php endwhile;
                                                                                endif; ?>
                                                                            </ul>
                                                                            <h6 class="card-subtitle">Cari Lebih Banyak?</h6>
                                                                            <ul>
                                                                                <li><a class="card-link link-light" href="index.php?page=oleholeh">Cek di oleh-oleh khas</a></li>
                                                                            </ul>
                                                                            </div>
                                                                            </div>
                                                                            <?php
                                                                            break;
                                                                        default:
                                                                            switch ($kategori = $_GET['kategori']) {
                                                                                case "makanan":
                                                                                    $kategori = "1";
                                                                                    break;
                                                                                case "minuman":
                                                                                    $kategori = "2";
                                                                                    break;
                                                                                case "tempat":
                                                                                    $kategori = "3";
                                                                                    break;
                                                                                case "oleholeh":
                                                                                    $kategori = "4";
                                                                                    break;
                                                                            }
                                                                            if (in_array($kategori, [1, 2, 3, 4])) :

                                                                                $stmtterbaru = $conn->prepare($sqlterbaru);
                                                                                $stmtterbaru->execute([$kategori, $kategori]);
                                                                                $stmtdiminati = $conn->prepare($sqldiminati);
                                                                                $stmtdiminati->execute([$kategori, $kategori]);
                                                                                if (isset($stmtterbaru)) :
                                                                                    while ($data = $stmtterbaru->fetch(PDO::FETCH_ASSOC)) :
                                                                                        if (file_exists('images/' . $data['foto'])) {
                                                                                            $foto = 'images/' . $data['foto'];
                                                                                        } else {
                                                                                            $foto = '';
                                                                                        } ?>
                                                                                        <a href="index.php?page=zoomsidebar&kategori=<?= $_GET['kategori']; ?>&idterbaru=<?= $data['id']; ?>" class="card-link"><img class="card-img mb-2" src="<?= $foto; ?>" alt="artikel terbaru"></a>
                                                                                <?php endwhile;
                                                                                endif; ?>
                                                                                <li>
                                                                                    <h5 class="card-title">Yang Paling Diminati</h5>
                                                                                </li>
                                                                                <?php
                                                                                if (isset($stmtdiminati)) :
                                                                                    while ($data = $stmtdiminati->fetch(PDO::FETCH_ASSOC)) :
                                                                                        if (file_exists('images/' . $data['foto_rentangharga']) && $data['foto_rentangharga'] != null) {
                                                                                            $foto = 'images/' . $data['foto_rentangharga'];
                                                                                        } elseif (file_exists('images/' . $data['foto'])) {
                                                                                            $foto = 'images/' . $data['foto'];
                                                                                        } else {
                                                                                            $foto = "";
                                                                                        } ?>
                                                                                        <a class="card-link" href="index.php?page=zoomsidebar&kategori=<?= $_GET['kategori']; ?>&iddiminati=<?= $data['id']; ?>"><img class="card-img mb-2" src="<?= $foto; ?>" alt="yang paling diminati"><a>
                                                                                        <?php endwhile;
                                                                                endif; ?>
                                                                                        </ul>
                                                                                        <h6 class="card-subtitle">Lainnya</h6 <ul>
                                                                                        <li><a class="card-link link-light" href="index.php?page=oleholeh">Cek juga oleh-oleh khas</a></li>
                                                                                        <li><a class="card-link link-light" href="index.php?page=tempat">Cek juga tempat nongkrong</a></li>
                                                                                        </ul>
                                                                                        </div>
                                                                                        </div>
                                                                                        <?php
                                                                                    else :
                                                                                        $stmtterbaru = $conn->query($sqlterbarudef);
                                                                                        $stmtdiminati = $conn->query($sqldiminatidef);
                                                                                        if (isset($stmtterbaru)) :
                                                                                            while ($data = $stmtterbaru->fetch(PDO::FETCH_ASSOC)) :
                                                                                                switch ($kategori = $data['id_kategori']) {
                                                                                                    case "1":
                                                                                                        $kategori = "makanan";
                                                                                                        break;
                                                                                                    case "2":
                                                                                                        $kategori = "minuman";
                                                                                                        break;
                                                                                                    case "3":
                                                                                                        $kategori = "tempat";
                                                                                                        break;
                                                                                                    case "4":
                                                                                                        $kategori = "oleholeh";
                                                                                                        break;
                                                                                                }
                                                                                                if (file_exists('images/' . $data['foto'])) {
                                                                                                    $foto = 'images/' . $data['foto'];
                                                                                                } else {
                                                                                                    $foto = '';
                                                                                                } ?>
                                                                                                <a href="index.php?page=zoomsidebar&kategori=<?= $kategori; ?>&idterbaru=<?= $data['id']; ?>" class="card-link"><img class="card-img mb-2" src="<?= $foto; ?>" alt="artikel terbaru"></a>
                                                                                        <?php endwhile;
                                                                                        endif; ?>
                                                                                        <li>
                                                                                            <h5 class="card-title">Yang Paling Diminati</h5>
                                                                                        </li>
                                                                                        <?php
                                                                                        if (isset($stmtdiminati)) :
                                                                                            while ($data = $stmtdiminati->fetch(PDO::FETCH_ASSOC)) :
                                                                                                switch ($kategori = $data['id_kategori']) {
                                                                                                    case "1":
                                                                                                        $kategori = "makanan";
                                                                                                        break;
                                                                                                    case "2":
                                                                                                        $kategori = "minuman";
                                                                                                        break;
                                                                                                    case "3":
                                                                                                        $kategori = "tempat";
                                                                                                        break;
                                                                                                    case "4":
                                                                                                        $kategori = "oleholeh";
                                                                                                        break;
                                                                                                }
                                                                                                if (file_exists('images/' . $data['foto_rentangharga']) && $data['foto_rentangharga'] != null) {
                                                                                                    $foto = 'images/' . $data['foto_rentangharga'];
                                                                                                } elseif (file_exists('images/' . $data['foto'])) {
                                                                                                    $foto = 'images/' . $data['foto'];
                                                                                                } else {
                                                                                                    $foto = "";
                                                                                                } ?>
                                                                                                <a class="card-link" href="index.php?page=zoomsidebar&kategori=<?= $kategori; ?>&iddiminati=<?= $data['id']; ?>"><img class="card-img mb-2" src="<?= $foto; ?>" alt="yang paling diminati"><a>
                                                                                                <?php endwhile;
                                                                                        endif; ?>
                                                                                                </ul>
                                                                                                <h6 class="card-subtitle">Lainnya</h6>
                                                                                                <ul>
                                                                                                    <li><a class="card-link link-light" href="index.php?page=oleholeh">Cek juga oleh-oleh khas</a></li>
                                                                                                    <li><a class="card-link link-light" href="index.php?page=tempat">Cek juga tempat nongkrong</a></li>
                                                                                                </ul>
                                                                                                </div>
                                                                                                </div>
                                                                    <?php
                                                                                    endif;
                                                                                    break;
                                                                            endswitch;
                                                                        endif;
                                                                endswitch;
                                                            endif;
                                                                    ?>