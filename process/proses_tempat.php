<?php
    include 'function.php';
    $conn = connDb();
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
                    header('Location: ../index.php?page='.$page);
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
                    header('Location: ../index.php?page='.$page);
                    break;
            }
        }
        elseif (isset($_GET['search'])) {
            $search = $_GET['search'];
            switch($_GET['tempat']) {
                case "1": 
                    $sql1 = "SELECT * FROM artikel WHERE id_kategori = 3 AND nama ='Pasar Malam'";
                    $sql2 = "SELECT * FROM artikel WHERE id_kategori = 3 AND nama =''";
                    $sql3 = "SELECT * FROM artikel WHERE id_kategori = 3 AND nama =''";
                    $sqlpasar = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.nama = 'Pasar Malam' AND (b.merek LIKE ? OR b.lokasi LIKE ?)";
                    $sqlratepasar = "SELECT a.id AS id_rating, a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.nama = 'Pasar Malam' AND (b.merek LIKE ? OR b.lokasi LIKE ?)";
                    
                    $sqlkafe = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.nama = '' AND (b.merek LIKE ? OR b.lokasi LIKE ?)";
                    $sqlratekafe = "SELECT a.id AS id_rating, a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.nama = '' AND (b.merek LIKE ? OR b.lokasi LIKE ?)";

                    $sqlresto = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.nama = '' AND (b.merek LIKE ? OR b.lokasi LIKE ?)";
                    $sqlrateresto = "SELECT a.id AS id_rating, a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.nama = '' AND (b.merek LIKE ? OR b.lokasi LIKE ?)";
                    break;
                case "2": 
                    $sql1 = "SELECT * FROM artikel WHERE id_kategori = 3 AND nama =''";
                    $sql2 = "SELECT * FROM artikel WHERE id_kategori = 3 AND nama ='Kafe'";
                    $sql3 = "SELECT * FROM artikel WHERE id_kategori = 3 AND nama =''";
                    $sqlpasar = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.nama = '' AND (b.merek LIKE ? OR b.lokasi LIKE ?)";
                    $sqlratepasar = "SELECT a.id AS id_rating, a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.nama = '' AND (b.merek LIKE ? OR b.lokasi LIKE ?)";

                    $sqlkafe = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.nama = 'Kafe' AND (b.merek LIKE ? OR b.lokasi LIKE ?)";
                    $sqlratekafe = "SELECT a.id AS id_rating, a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.nama = 'Kafe' AND (b.merek LIKE ? OR b.lokasi LIKE ?)";

                    $sqlresto = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.nama = '' AND (b.merek LIKE ? OR b.lokasi LIKE ?)";
                    $sqlrateresto = "SELECT a.id AS id_rating, a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.nama = '' AND (b.merek LIKE ? OR b.lokasi LIKE ?)";
                    break;
                case "3": 
                    $sql1 = "SELECT * FROM artikel WHERE id_kategori = 3 AND nama =''";
                    $sql2 = "SELECT * FROM artikel WHERE id_kategori = 3 AND nama =''";
                    $sql3 = "SELECT * FROM artikel WHERE id_kategori = 3 AND nama ='Restoran'";
                    $sqlpasar = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.nama = '' AND (b.merek LIKE ? OR b.lokasi LIKE ?)";
                    $sqlratepasar = "SELECT a.id AS id_rating, a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.nama = '' AND (b.merek LIKE ? OR b.lokasi LIKE ?)";

                    $sqlkafe = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.nama = '' AND (b.merek LIKE ? OR b.lokasi LIKE ?)";
                    $sqlratekafe = "SELECT a.id AS id_rating, a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.nama = '' AND (b.merek LIKE ? OR b.lokasi LIKE ?)";

                    $sqlresto = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.nama = 'Restoran' AND (b.merek LIKE ? OR b.lokasi LIKE ?)";
                    $sqlrateresto = "SELECT a.id AS id_rating, a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.nama = 'Restoran' AND (b.merek LIKE ? OR b.lokasi LIKE ?)";
                    break;
                default: 
                    $sql1 = "SELECT * FROM artikel WHERE id_kategori = 3 AND nama ='Pasar Malam'";
                    $sql2 = "SELECT * FROM artikel WHERE id_kategori = 3 AND nama ='Kafe'";
                    $sql3 = "SELECT * FROM artikel WHERE id_kategori = 3 AND nama ='Restoran'";
                    $sqlpasar = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.nama = 'Pasar Malam' AND (b.merek LIKE ? OR b.lokasi LIKE ?)";
                    $sqlratepasar = "SELECT a.id AS id_rating, a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.nama = 'Pasar Malam' AND (b.merek LIKE ? OR b.lokasi LIKE ?)";

                    $sqlkafe = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.nama = 'Kafe' AND (b.merek LIKE ? OR b.lokasi LIKE ?)";
                    $sqlratekafe = "SELECT a.id AS id_rating, a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.nama = 'Kafe' AND (b.merek LIKE ? OR b.lokasi LIKE ?)";

                    $sqlresto = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.nama = 'Restoran' AND (b.merek LIKE ? OR b.lokasi LIKE ?)";
                    $sqlrateresto = "SELECT a.id AS id_rating, a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.nama = 'Restoran' AND (b.merek LIKE ? OR b.lokasi LIKE ?)";
                    break;
            }
            $stmt1 = $conn->query($sql1);
            $stmt2 = $conn->query($sql2);
            $stmt3 = $conn->query($sql3);

            $stmtpasar = $conn->prepare($sqlpasar);
            $stmtkafe = $conn->prepare($sqlkafe);
            $stmtresto = $conn->prepare($sqlresto);

            $stmtratepasar = $conn->prepare($sqlratepasar);
            $stmtratekafe = $conn->prepare($sqlratekafe);
            $stmtrateresto = $conn->prepare($sqlrateresto);

            $stmtpasar->execute(["%$search%", "%$search%"]);
            $stmtkafe->execute(["%$search%", "%$search%"]);
            $stmtresto->execute(["%$search%", "%$search%"]);

            $stmtratepasar->execute(["%$search%", "%$search%"]);
            $stmtratekafe->execute(["%$search%", "%$search%"]);
            $stmtrateresto->execute(["%$search%", "%$search%"]);
        }
        else {
            $sql1 = "SELECT * FROM artikel WHERE id_kategori = 3 AND nama ='Pasar Malam'";
            $sql2 = "SELECT * FROM artikel WHERE id_kategori = 3 AND nama ='Kafe'";
            $sql3 = "SELECT * FROM artikel WHERE id_kategori = 3 AND nama ='Restoran'";

            $stmt1 = $conn->query($sql1);
            $stmt2 = $conn->query($sql2);
            $stmt3 = $conn->query($sql3);

            $sqlpasar = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.nama = 'Pasar Malam'";
            $sqlkafe = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.nama = 'Kafe'";
            $sqlresto = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.nama = 'Restoran'";

            $stmtpasar = $conn->query($sqlpasar);
            $stmtkafe = $conn->query($sqlkafe);
            $stmtresto = $conn->query($sqlresto);

            $sqlratepasar = "SELECT a.id AS id_rating, a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.nama = 'Pasar Malam'";
            $sqlratekafe = "SELECT a.id AS id_rating, a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.nama = 'Kafe'";
            $sqlrateresto = "SELECT a.id AS id_rating, a.rating AS rating, a.ulasan AS ulasan, a.tanggalditulis AS tanggalditulis, a.penulis AS penulis, b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.id AS id_artikel, c.nama AS nama, c.deskripsi AS deskripsi, c.foto AS foto FROM ratingulasan a, rentangharga b, artikel c WHERE a.id_artikel = b.id AND b.id_artikel = c.id AND c.nama = 'Restoran'";

            $stmtratepasar = $conn->query($sqlratepasar);
            $stmtratekafe = $conn->query($sqlratekafe);
            $stmtrateresto = $conn->query($sqlrateresto);
        }

    }
    catch (Exception $e) {
        echo "<pre>";
        var_dump($e);
    }
?>