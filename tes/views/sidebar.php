<?php

    include 'process/function.php';

    $sqlterbaru = "SELECT nama, foto FROM artikel WHERE id_kategori = ? AND tanggalditulis >= (SELECT MAX(tanggalditulis) FROM artikel WHERE id_kategori = ?)";

    $sqldiminati = "SELECT merek, foto FROM rentangharga a, artikel b WHERE a.id_artikel = b.id AND a.id IN (SELECT id_artikel FROM ratingulasan GROUP BY id_artikel HAVING AVG(rating) >= (SELECT AVG(rating) FROM ratingulasan c, rentangharga a, artikel b WHERE c.id_artikel = a.id AND a.id_artikel = b.id AND b.id_kategori = ?)) AND b.id_kategori = ?";

?>
<link rel="stylesheet" href="sidebar/sidebars.css">
<div class="card">
    <div class="card-body">
        <?php require 'formartikel.php'; ?>
        <ul>
            <li><h5 class="card-title">Artikel Terbaru</h5></li>
<?php
    if(isset($_GET['page'])) :
        switch($_GET['page']) :
            case "makanan": 
                $i = 1;
                $stmtterbaru = $conn->prepare($sqlterbaru);
                $stmtterbaru->execute([$i, $i]);
                $stmtdiminati = $conn->prepare($sqldiminati);
                $stmtdiminati->execute([$i, $i]);
                if(isset($stmtterbaru)):
                while ($data = $stmtterbaru->fetch(PDO::FETCH_ASSOC)): 
                    if(file_exists('images/'.$data['foto'])) {
                        $foto = 'images/'.$data['foto'];
                    }else {
                        $foto = 'images/placeholder.png';
                    }?>
                    <a class="card-link" href=""><img class="card-img mb-2" src="<?= $foto; ?>" alt="artikel terbaru"></a>
                <?php endwhile; endif; ?>
                <li><h5 class="card-title">Yang Paling Diminati</h5></li>
                <?php 
                if(isset($stmtdiminati)):
                while($data = $stmtdiminati->fetch(PDO::FETCH_ASSOC)): 
                    if(file_exists('images/'.$data['foto'])) {
                        $foto = 'images/'.$data['foto'];
                    }else {
                        $foto = 'images/placeholder.png';
                    }?>
                    <a class="card-link" href="#"><img class="card-img mb-2" src="<?= $foto; ?>" alt="yang paling diminati"><a>
                <?php endwhile; endif;?>
                </ul>
                <h6 class="card-subtitle">Makanan khas</h6>
                <ul>
                    <?php 
                    if(isset($stmt)):
                    while($data = $stmt->fetch()):?>
                    <li><p><?= $data['nama']; ?></p></li>
                    <?php endwhile; endif; ?>
                </ul>
                    <h6 class="card-subtitle">Cari Jajanan?</h6>
                    
                <ul>
                    <li><a class ="card-link" href="index.php?page=oleholeh">Cek di oleh-oleh khas</a></li>
                    <li><a class ="card-link" href="index.php?page=tempat">Cek di tempat pasar malam</a></li>
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
                if(isset($stmtterbaru)):
                while ($data = $stmtterbaru->fetch(PDO::FETCH_ASSOC)): 
                    if(file_exists('images/'.$data['foto'])) {
                        $foto = 'images/'.$data['foto'];
                    }else {
                        $foto = 'images/placeholder.png';
                    }?>
                    <a class="card-link"><img class="card-img mb-2" src="<?= $foto; ?>" alt="artikel terbaru"></a>
                <?php endwhile; endif; ?>
                <li><h5 class="card-title">Yang Paling Diminati</h5></li>
                <?php 
                if(isset($stmtdiminati)):
                while($data = $stmtdiminati->fetch(PDO::FETCH_ASSOC)): 
                    if(file_exists('images/'.$data['foto'])) {
                        $foto = 'images/'.$data['foto'];
                    }else {
                        $foto = 'images/placeholder.png';
                    }?>
                    <a class="card-link" href="#"><img class="card-img mb-2" src="<?= $foto; ?>" alt="yang paling diminati"><a>
                <?php endwhile; endif; ?>
                </ul>
                    <h6 class="card-subtitle">Minuman khas</h6>
                    
                    <ul>
                        <?php 
                        if(isset($stmt)):
                        while($data = $stmt->fetch()):?>
                        <li><p><?= $data['nama']; ?></p></li>
                        <?php endwhile; endif; ?>
                    </ul>
                    <h6 class="card-subtitle">Cari tempat nongkrong?</h6>
                    
                    <ul>
                        <li><a class ="card-link" href="index.php?page=tempat">Cek di tempat kafe</a></li>
                    </ul>
                </div>
            </div>
            <?php
                break;
            default:
                if(isset($_GET['kategori'])):
                    switch($_GET['kategori']) :
                        case "makanan": 
                            $i = 1;
                            $stmtterbaru = $conn->prepare($sqlterbaru);
                            $stmtterbaru->execute([$i, $i]);
                            $stmtdiminati = $conn->prepare($sqldiminati);
                            $stmtdiminati->execute([$i, $i]);
                            if(isset($stmtterbaru)):
                            while ($data = $stmtterbaru->fetch(PDO::FETCH_ASSOC)): 
                                if(file_exists('images/'.$data['foto'])) {
                                    $foto = 'images/'.$data['foto'];
                                }else {
                                    $foto = 'images/placeholder.png';
                                }?>
                                <a class="card-link" href=""><img class="card-img mb-2" src="<?= $foto; ?>" alt="artikel terbaru"></a>
                            <?php endwhile; endif; ?>
                            <li><h5 class="card-title">Yang Paling Diminati</h5></li>
                            <?php 
                            if(isset($stmtdiminati)):
                            while($data = $stmtdiminati->fetch(PDO::FETCH_ASSOC)): 
                                if(file_exists('images/'.$data['foto'])) {
                                    $foto = 'images/'.$data['foto'];
                                }else {
                                    $foto = 'images/placeholder.png';
                                }?>
                                <a class="card-link" href="#"><img class="card-img mb-2" src="<?= $foto; ?>" alt="yang paling diminati"><a>
                            <?php endwhile; endif;?>
                            </ul>
                            <h6 class="card-subtitle">Makanan khas</h6>
                            <ul>
                                <?php 
                                if(isset($stmt)):
                                while($data = $stmt->fetch()):?>
                                <li><p><?= $data['nama']; ?></p></li>
                                <?php endwhile; endif; ?>
                            </ul>
                                <h6 class="card-subtitle">Cari Jajanan?</h6>

                            <ul>
                                <li><a class ="card-link" href="index.php?page=oleholeh">Cek di oleh-oleh khas</a></li>
                                <li><a class ="card-link" href="index.php?page=tempat">Cek di tempat pasar malam</a></li>
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
                            if(isset($stmtterbaru)):
                            while ($data = $stmtterbaru->fetch(PDO::FETCH_ASSOC)): 
                                if(file_exists('images/'.$data['foto'])) {
                                    $foto = 'images/'.$data['foto'];
                                }else {
                                    $foto = 'images/placeholder.png';
                                }?>
                                <a class="card-link"><img class="card-img mb-2" src="<?= $foto; ?>" alt="artikel terbaru"></a>
                            <?php endwhile; endif; ?>
                            <li><h5 class="card-title">Yang Paling Diminati</h5></li>
                            <?php 
                            if(isset($stmtdiminati)):
                            while($data = $stmtdiminati->fetch(PDO::FETCH_ASSOC)): 
                                if(file_exists('images/'.$data['foto'])) {
                                    $foto = 'images/'.$data['foto'];
                                }else {
                                    $foto = 'images/placeholder.png';
                                }?>
                                <a class="card-link" href="#"><img class="card-img mb-2" src="<?= $foto; ?>" alt="yang paling diminati"><a>
                            <?php endwhile; endif; ?>
                            </ul>
                                <h6 class="card-subtitle">Minuman khas</h6>

                                <ul>
                                    <?php 
                                    if(isset($stmt)):
                                    while($data = $stmt->fetch()):?>
                                    <li><p><?= $data['nama']; ?></p></li>
                                    <?php endwhile; endif; ?>
                                </ul>
                                <h6 class="card-subtitle">Cari tempat nongkrong?</h6>

                                <ul>
                                    <li><a class ="card-link" href="index.php?page=tempat">Cek di tempat kafe</a></li>
                                </ul>
                            </div>
                        </div>
                        <?php
                            break;
                    endswitch;
                    elseif(!isset($_GET['kategori'])):
                        $sqlterbaru = "SELECT nama, foto FROM artikel WHERE tanggalditulis >= (SELECT MAX(tanggalditulis) FROM artikel)";

                        $sqldiminati = "SELECT merek, foto FROM rentangharga a, artikel b WHERE a.id_artikel = b.id AND a.id IN (SELECT id_artikel FROM ratingulasan GROUP BY id_artikel HAVING AVG(rating) >= (SELECT AVG(rating) FROM ratingulasan c, rentangharga a, artikel b WHERE c.id_artikel = a.id AND a.id_artikel = b.id))";
                        $stmtterbaru = $conn->query($sqlterbaru);
                        $stmtdiminati = $conn->query($sqldiminati);
                        if(isset($stmtterbaru)):
                        while ($data = $stmtterbaru->fetch(PDO::FETCH_ASSOC)): 
                            if(file_exists('images/'.$data['foto'])) {
                                $foto = 'images/'.$data['foto'];
                            }else {
                                $foto = 'images/placeholder.png';
                            }?>
                        <a class="card-link"><img class="card-img mb-2" src="<?= $foto; ?>" alt="artikel terbaru"></a>
                    <?php endwhile; endif; ?>
                        <li><h5 class="card-title">Yang Paling Diminati</h5></li>
                        <?php 
                        if(isset($stmtdiminati)):
                        while($data = $stmtdiminati->fetch(PDO::FETCH_ASSOC)): 
                            if(file_exists('images/'.$data['foto'])) {
                                $foto = 'images/'.$data['foto'];
                            }else {
                                $foto = 'images/placeholder.png';
                            }?>
                            <a class="card-link" href="#"><img class="card-img mb-2" src="<?= $foto; ?>" alt="yang paling diminati"><a>
                        <?php endwhile; endif; ?>
                    </ul>
                    <h6 class="card-subtitle">Lainnya</h6
                    <ul>
                        <li><a class ="card-link" href="index.php?page=oleholeh">Cek juga oleh-oleh khas</a></li>
                        <li><a class ="card-link" href="index.php?page=tempat">Cek juga tempat nongkrong</a></li>
                    </ul>   
                </div>
            </div>  
            <?php
                endif;
                break;
        endswitch;
    endif;
?>