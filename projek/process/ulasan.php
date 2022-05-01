<?php 
    include 'function.php';
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);
        if(isset($_POST['submit-search'])) {
            switch($_POST['harga']) {
                case "1": $harga = 50000;
                    $sql2 = "SELECT a.id AS id_rentangharga, a.merek AS merek, a.lokasi AS lokasi, a.hargaminimal AS hargaminimal, a.hargamaksimal AS hargamaksimal, b.id = id_artikel, b.nama AS nama, b.foto AS foto FROM rentangharga a, artikel b WHERE a.id_artikel = b.id AND b.id_kategori = ? AND a.hargaminimal < ? AND (a.merek LIKE ? OR a.lokasi LIKE ? OR b.nama LIKE ?)";
                    break;
                case "2": $harga = 100000;
                    $sql2 = "SELECT a.id AS id_rentangharga, a.merek AS merek, a.lokasi AS lokasi, a.hargaminimal AS hargaminimal, a.hargamaksimal AS hargamaksimal, b.id = id_artikel, b.nama AS nama, b.foto AS foto FROM rentangharga a, artikel b WHERE a.id_artikel = b.id AND b.id_kategori = ? AND a.hargaminimal <= ? AND (a.merek LIKE ? OR a.lokasi LIKE ? OR b.nama LIKE ?)";
                    break;
                case "3": $harga = 100000;
                    $sql2 = "SELECT a.id AS id_rentangharga, a.merek AS merek, a.lokasi AS lokasi, a.hargaminimal AS hargaminimal, a.hargamaksimal AS hargamaksimal, b.id = id_artikel, b.nama AS nama, b.foto AS foto FROM rentangharga a, artikel b WHERE a.id_artikel = b.id AND b.id_kategori = ? AND a.hargaminimal > ? AND (a.merek LIKE ? OR a.lokasi LIKE ? OR b.nama LIKE ?)";
                    break;
                default: $harga = 0;
                    $sql2 = "SELECT a.id AS id_rentangharga, a.merek AS merek, a.lokasi AS lokasi, a.hargaminimal AS hargaminimal, a.hargamaksimal AS hargamaksimal, b.id = id_artikel, b.nama AS nama, b.foto AS foto FROM rentangharga a, artikel b WHERE a.id_artikel = b.id AND b.id_kategori = ? AND a.hargaminimal >= ? AND (a.merek LIKE ? OR a.lokasi LIKE ? OR b.nama LIKE ?)";
                    break;
            }       
            $stmt2 = $conn->prepare($sql2);
            $kategori = $_POST['page'];
            switch($kategori) {
                case "makanan": $kategori = 1; break;
                case "minuman": $kategori = 2; break;
                case "tempat": $kategori = 3; break;
                case "oleholeh": $kategori =4; break;
                default: $kategori =""; break;
            }
            $search = $_POST['search'];
            $stmt2->execute([$kategori, $harga, "%$search%", "%$search%", "%$search%"]);

            $sql = "SELECT a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.merek AS merek FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.id_kategori = ? AND (b.merek LIKE ? OR b.lokasi LIKE ? OR c.nama LIKE ?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$kategori, "%$search%", "%$search%", "%$search%"]);
        }
        else {
            if($_GET['action'] == "add") {
                $sql = "INSERT INTO ratingulasan (rating, ulasan, tanggalditulis, penulis, id_artikel) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);   
                $stmt->execute([$_POST['rating'], $_POST['ulasan'], $_POST['tanggalditulis'], $_POST['penulis'], $_POST['idartikel']]);
                header('Location: ../index.php');
            }
            elseif($_GET['action']=="read") {
                $sql = "SELECT a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.merek AS merek FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.id_kategori = ?";
                $stmt = $conn->prepare($sql);
                $submenu = $_GET['page'];
                switch($submenu) {
                    case "makanan": $submenu = "1"; break;
                    case "minuman": $submenu = "2"; break;
                    case "tempat": $submenu = "3"; break;
                    case "oleholeh": $submenu = "4"; break;
                    default: $submenu =""; break;
                }
                $stmt->execute([$submenu]);

                $sql2 = "SELECT a.id AS id_rentangharga, a.merek AS merek, a.lokasi AS lokasi, a.hargaminimal AS hargaminimal, a.hargamaksimal AS hargamaksimal, b.id AS id_artikel, b.foto AS foto FROM rentangharga a, artikel b WHERE a.id_artikel = b.id AND b.id_kategori = ?";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->execute([$submenu]);
            }
        }
    }
    catch (Exception $e) {
        echo "<pre>";
        var_dump($e);
    }

?>
