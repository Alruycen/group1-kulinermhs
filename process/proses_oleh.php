<?php
    include 'function.php';
    $conn = connDb();
    $kategori = $_GET['page'];
    switch ($kategori) {
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
        default:
            $kategori = "";
            break;
    }
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION);
        if(isset($_GET['action'])) {
            $page = $_GET['page'];
            switch($action = $_GET['action']) {
                case "add":
                    $foto = $_FILES['foto'];
                    $ext = explode('.', $foto['name']);
                    $ext = end($ext);
                    $ext = strtolower($ext);
                    //echo $ext;
                    $extboleh = ['jpg', 'png', 'jpeg'];

                    if(in_array($ext, $extboleh)) {
                        $sumber = $foto['tmp_name'];
                        $tujuan = '../images/'.$foto['name'];
                        if(!file_exists('../images/')) {
                            mkdir('../images/');
                        }
                        move_uploaded_file($sumber, $tujuan);
                        resize_image($tujuan, $ext, "500");
                    }
                    if(isset($_GET['page2']) && $_GET['page2'] == 'artikel') {
                        $sql = "INSERT INTO artikel (nama, deskripsi, foto, tanggalditulis, penulis, id_kategori)
                                VALUES (?, ?, ?, ?, ?, ?)";
                        $atrb = [$_POST['nama'], $_POST['deskripsi'], $foto['name'], $_POST['tanggalditulis'], $_POST['penulis'], $_POST['kategori']];
                    } elseif(isset($_GET['page2']) && $_GET['page2'] == 'rentangharga') {
                        $sql = "INSERT INTO rentangharga (merek, lokasi, foto, hargaminimal, hargamaksimal, id_artikel)
                            VALUES (?, ?, ?, ?, ?, ?)";
                        $atrb = [$_POST['merek'], $_POST['lokasi'], $foto['name'], $_POST['hargaminimal'], $_POST['hargamaksimal'], $_POST['artikel']];
                    }
                    $stmtinput = $conn->prepare($sql);
                    $stmtinput->execute($atrb);
                    header('Location: ../index.php?page='.$page);
                    break;
                case "edit":
                    if(empty($_FILES['foto']['name']) || !is_uploaded_file($_FILES['foto']['tmp_name'])) {
                        if(isset($_GET['page2']) && $_GET['page2'] == 'artikel') {
                            $sql = "UPDATE artikel
                                SET nama = ?, deskripsi = ?, penulis = ?
                                WHERE id = ?";
                            $atrb = [$_POST['nama'], $_POST['deskripsi'], $_POST['penulis'], $_POST['id']];
                        }elseif (isset($_GET['page2']) && $_GET['page2'] == 'rentangharga') {
                            $sql = "UPDATE rentangharga
                                SET merek = ?, lokasi = ?, hargaminimal = ?, hargamaksimal = ?
                                WHERE id = ?";
                            $atrb = [$_POST['merek'], $_POST['lokasi'], $_POST['hargaminimal'], $_POST['hargamaksimal'], $_POST['id']];
                        }

                    } else {
                        $foto = $_FILES['foto'];
                        $ext = explode('.', $foto['name']);
                        $ext = end($ext);
                        $ext = strtolower($ext);
                        //echo $ext;
                        $extboleh = ['jpg', 'png', 'jpeg'];
                    
                        if(in_array($ext, $extboleh)) {
                            $sumber = $foto['tmp_name'];
                            $tujuan = '../images/'.$foto['name'];
                            move_uploaded_file($sumber, $tujuan);
                            resize_image($tujuan, $ext, "500");
                        }
                        if(isset($_GET['page2']) && $_GET['page2'] == 'artikel') {
                            $sql = "UPDATE artikel
                                SET nama = ?, deskripsi = ?, foto = ?, penulis = ?
                                WHERE id = ?";
                            $atrb = [$_POST['nama'], $_POST['deskripsi'], $foto['name'], $_POST['penulis'], $_POST['id']];
                        }else if(isset($_GET['page2']) && $_GET['page2'] == 'rentangharga') {
                            $sql = "UPDATE rentangharga
                                SET merek = ?, lokasi = ?, foto = ?, hargaminimal = ?, hargamaksimal = ?
                                WHERE id = ?";
                            $atrb = [$_POST['merek'], $_POST['lokasi'], $foto['name'], $_POST['hargaminimal'], $_POST['hargamaksimal'], $_POST['id']];
                        }
                    }
                    $stmtinput = $conn->prepare($sql);
                    $stmtinput->execute($atrb);
                    header('Location: ../index.php?page='.$page);
                    break;
            }
        }
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $sql = "SELECT * FROM artikel WHERE id_kategori = ? AND (nama LIKE ? OR deskripsi LIKE ? OR id IN (SELECT id_artikel FROM rentangharga WHERE merek LIKE ? OR lokasi LIKE ?))";
            $sql2 = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.foto AS foto_rentangharga, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.id_kategori = ? AND (b.merek LIKE ? OR b.lokasi LIKE ? OR c.nama LIKE ? OR c.deskripsi LIKE ?)";

            $stmt = $conn->prepare($sql);
            $stmt->execute([$kategori, "%$search%", "%$search%", "%$search%", "%$search%"]);
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute([$kategori, "%$search%", "%$search%", "%$search%", "%$search%"]);

        } else {
            $sql = "SELECT * FROM artikel WHERE id_kategori = ?";
            $sql2 = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.foto AS foto_rentangharga, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.id_kategori = ?";

            $stmt = $conn->prepare($sql);
            $stmt->execute([$kategori]);
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute([$kategori]);
        }
    }
    catch (Exception $e) {
        echo "<pre>";
        var_dump($e);
    }
