<?php 
    include 'function.php';
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);
        if(isset($_POST['submit-search'])) {
            switch($_POST['harga']) {
                case "1": $harga = 50000;
                    $sql = "SELECT a.id AS id_rating, a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.foto AS foto FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.id_kategori = ? AND b.hargaminimal < ? AND (b.merek LIKE ? OR b.lokasi LIKE ? OR c.nama LIKE ?)";
                    $sql2 = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.id_kategori = ? AND b.hargaminimal < ? AND (b.merek LIKE ? OR b.lokasi LIKE ? OR c.nama LIKE ?)";
                    break;
                case "2": $harga = 100000;
                    $sql = "SELECT a.id AS id_rating, a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.foto AS foto FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.id_kategori = ? AND b.hargaminimal <= ? AND (b.merek LIKE ? OR b.lokasi LIKE ? OR c.nama LIKE ?)";
                    $sql2 = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.id_kategori = ? AND b.hargaminimal <= ? AND (b.merek LIKE ? OR b.lokasi LIKE ? OR c.nama LIKE ?)";
                    break;
                case "3": $harga = 100000;
                    $sql = "SELECT a.id AS id_rating, a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.foto AS foto FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.id_kategori = ? AND b.hargaminimal >= ? AND (b.merek LIKE ? OR b.lokasi LIKE ? OR c.nama LIKE ?)";
                    $sql2 = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.id_kategori = ? AND b.hargaminimal > ? AND (b.merek LIKE ? OR b.lokasi LIKE ? OR c.nama LIKE ?)";
                    break;
                default: $harga = 0;
                    $sql = "SELECT a.id AS id_rating, a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.foto AS foto FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.id_kategori = ? AND b.hargaminimal >= ? AND (b.merek LIKE ? OR b.lokasi LIKE ? OR c.nama LIKE ?)";
                    $sql2 = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.id_kategori = ? AND b.hargaminimal > ? AND (b.merek LIKE ? OR b.lokasi LIKE ? OR c.nama LIKE ?)";
                    break;
            }       
            $kategori = $_POST['page'];
            switch($kategori) {
                case "makanan": $kategori = 1; break;
                case "minuman": $kategori = 2; break;
                case "tempat": $kategori = 3; break;
                case "oleholeh": $kategori =4; break;
                default: $kategori =""; break;
            }
            $search = $_POST['search'];

            $stmt = $conn->prepare($sql);
            $stmt->execute([$kategori, $harga, "%$search%", "%$search%", "%$search%"]);
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute([$kategori, $harga, "%$search%", "%$search%", "%$search%"]);
        }
        else {
            $sql = "SELECT a.id AS id_rating, a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.foto AS foto FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.id_kategori = ?";
            $sql2 = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.id_kategori = ?";

            $kategori = $_GET['page'];
            switch($kategori) {
                case "makanan": $kategori = "1"; break;
                case "minuman": $kategori = "2"; break;
                case "tempat": $kategori = "3"; break;
                case "oleholeh": $kategori = "4"; break;
                default: $kategori =""; break;
            }
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
