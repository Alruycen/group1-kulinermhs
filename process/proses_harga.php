<?php 
    include 'function.php';
    $conn = connDb();

    $kategori = $_GET['kategori'];
    switch($kategori) {
        case "makanan": $kategori = 1; break;
        case "minuman": $kategori = 2; break;
        case "tempat": $kategori = 3; break;
        case "oleholeh": $kategori =4; break;
        default: $kategori =""; break;
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
                    $sql = "INSERT INTO rentangharga (merek, lokasi, foto, hargaminimal, hargamaksimal, id_artikel)
                            VALUES (?, ?, ?, ?, ?, ?)";
                    $atrb = [$_POST['merek'], $_POST['lokasi'], $foto['name'], $_POST['hargaminimal'], $_POST['hargamaksimal'], $_POST['artikel']];
                    $stmtinput = $conn->prepare($sql);
                    $stmtinput->execute($atrb);
                    header('Location: ../index.php?page=rentangharga&kategori='.$page);
                    break;
                case "edit":
                    if(empty($_FILES['foto']['name']) || !is_uploaded_file($_FILES['foto']['tmp_name'])) {
                        $sql = "UPDATE rentangharga
                            SET merek = ?, lokasi = ?, hargaminimal = ?, hargamaksimal = ?
                            WHERE id = ?";
                        $atrb = [$_POST['merek'], $_POST['lokasi'], $_POST['hargaminimal'], $_POST['hargamaksimal'], $_POST['id']];

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
                        $sql = "UPDATE rentangharga
                            SET merek = ?, lokasi = ?, foto = ?, hargaminimal = ?, hargamaksimal = ?
                            WHERE id = ?";
                        $atrb = [$_POST['merek'], $_POST['lokasi'], $foto['name'], $_POST['hargaminimal'], $_POST['hargamaksimal'], $_POST['id']];
                    }
                    $stmtinput = $conn->prepare($sql);
                    $stmtinput->execute($atrb);
                    header('Location: ../index.php?page=rentangharga&kategori='.$page);
                    break;
            }
        }
        elseif(isset($_GET['search'])) {
            switch($_GET['harga']) {
                case "1": $harga = 50000;
                    $sql = "SELECT a.id AS id_rating, a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.foto AS foto FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.id_kategori = ? AND b.hargaminimal < ? AND (b.merek LIKE ? OR b.lokasi LIKE ? OR c.nama LIKE ?)";
                    $sql2 = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, b.foto AS foto_rentangharga, c.id AS id_artikel, c.nama AS nama, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.id_kategori = ? AND b.hargaminimal < ? AND (b.merek LIKE ? OR b.lokasi LIKE ? OR c.nama LIKE ?)";
                    break;
                case "2": $harga = 100000;
                    $sql = "SELECT a.id AS id_rating, a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.foto AS foto FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.id_kategori = ? AND b.hargaminimal <= ? AND (b.merek LIKE ? OR b.lokasi LIKE ? OR c.nama LIKE ?)";
                    $sql2 = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, b.foto AS foto_rentangharga, c.id AS id_artikel, c.nama AS nama, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.id_kategori = ? AND b.hargaminimal <= ? AND (b.merek LIKE ? OR b.lokasi LIKE ? OR c.nama LIKE ?)";
                    break;
                case "3": $harga = 100000;
                    $sql = "SELECT a.id AS id_rating, a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.foto AS foto FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.id_kategori = ? AND b.hargaminimal >= ? AND (b.merek LIKE ? OR b.lokasi LIKE ? OR c.nama LIKE ?)";
                    $sql2 = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, b.foto AS foto_rentangharga, c.id AS id_artikel, c.nama AS nama, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.id_kategori = ? AND b.hargaminimal > ? AND (b.merek LIKE ? OR b.lokasi LIKE ? OR c.nama LIKE ?)";
                    break;
                default: $harga = 0;
                    $sql = "SELECT a.id AS id_rating, a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.foto AS foto FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.id_kategori = ? AND b.hargaminimal >= ? AND (b.merek LIKE ? OR b.lokasi LIKE ? OR c.nama LIKE ?)";
                    $sql2 = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, b.foto AS foto_rentangharga, c.id AS id_artikel, c.nama AS nama, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.id_kategori = ? AND b.hargaminimal > ? AND (b.merek LIKE ? OR b.lokasi LIKE ? OR c.nama LIKE ?)";
                    break;
            }       
            
            $search = $_GET['search'];

            $stmt = $conn->prepare($sql);
            $stmt->execute([$kategori, $harga, "%$search%", "%$search%", "%$search%"]);
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute([$kategori, $harga, "%$search%", "%$search%", "%$search%"]);
        }
        else {
            $sql = "SELECT a.id AS id_rating, a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.foto AS foto FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.id_kategori = ?";
            $sql2 = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, b.foto AS foto_rentangharga, c.id AS id_artikel, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.id_kategori = ?";

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
?>