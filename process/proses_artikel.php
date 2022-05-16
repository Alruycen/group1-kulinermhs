<?php
    include 'function.php'; 

    $conn = connDb();
    $kategori = "";
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
                    $sql = "INSERT INTO artikel (nama, deskripsi, foto, tanggalditulis, penulis, id_kategori)
                            VALUES (?, ?, ?, ?, ?, ?)";
                    $atrb = [$_POST['nama'], $_POST['deskripsi'], $foto['name'], $_POST['tanggalditulis'], $_POST['penulis'], $_POST['kategori']];
                    $stmtinput = $conn->prepare($sql);
                    $stmtinput->execute($atrb);
                    header('Location: ../index.php?page=artikel&kategori='.$page);
                    break;
                case "edit":
                    if(empty($_FILES['foto']['name']) || !is_uploaded_file($_FILES['foto']['tmp_name'])) {
                        $sql = "UPDATE artikel
                            SET nama = ?, deskripsi = ?, penulis = ?
                            WHERE id = ?";
                        $atrb = [$_POST['nama'], $_POST['deskripsi'], $_POST['penulis'], $_POST['id']];

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
                        $sql = "UPDATE artikel
                            SET nama = ?, deskripsi = ?, foto = ?, penulis = ?
                            WHERE id = ?";
                        $atrb = [$_POST['nama'], $_POST['deskripsi'], $foto['name'], $_POST['penulis'], $_POST['id']];
                    }
                    $stmtinput = $conn->prepare($sql);
                    $stmtinput->execute($atrb);
                    header('Location: ../index.php?page=artikel&kategori='.$page);
                    break;
            }
        }
        elseif(isset($_GET['search'])) {
            $search = $_GET['search'];
            if (isset($_GET['kategori'])) { //fitur search artikel
                switch($_GET['kategori']) {
                    case "makanan": $kategori = "1";
                        break;
                    case "minuman": $kategori = "2";
                        break;
                    case "tempat": $kategori = "3";
                        break;
                    case "oleholeh": $kategori = "4";
                        break;
                }
                if(in_array($kategori, [1, 2, 3, 4])) {
                    $sql = "SELECT * FROM artikel WHERE id_kategori = ? AND (nama LIKE ? OR deskripsi LIKE ? OR penulis LIKE ?)";
                    $atrb = [$kategori, "%$search%", "%$search%", "%$search%"];
                    
                }
                else {
                    $sql = "SELECT * FROM artikel WHERE nama LIKE ? OR deskripsi LIKE ? OR penulis LIKE ?";
                    $atrb = ["%$search%", "%$search%", "%$search%"];
                }
                $stmt = $conn->prepare($sql);
                $stmt->execute($atrb);
            }
        }
        else {
            if (isset($_GET['page'])) {
                $kategori = $_GET['page'];
                switch($kategori) {
                    case "makanan":
                        $sql = "SELECT * FROM artikel WHERE id_kategori = 1";
                        break;
                    case "minuman":
                        $sql = "SELECT * FROM artikel WHERE id_kategori = 2";
                        break;
                    case "tempat":
                        $sql = "SELECT * FROM artikel WHERE id_kategori = 3";
                        break;
                    case "oleholeh":
                        $sql = "SELECT * FROM artikel WHERE id_kategori = 4";
                        break;
                    default:
                        if (isset($_GET['kategori'])) {
                            $kategori = $_GET['kategori'];
                            switch($kategori) {
                                case "makanan":
                                    $sql = "SELECT * FROM artikel WHERE id_kategori = 1";
                                    break;
                                case "minuman":
                                    $sql = "SELECT * FROM artikel WHERE id_kategori = 2";
                                    break;
                                case "tempat":
                                    $sql = "SELECT * FROM artikel WHERE id_kategori = 3";
                                    break;
                                case "oleholeh":
                                    $sql = "SELECT * FROM artikel WHERE id_kategori = 4";
                                    break;
                                default:
                                    $sql = "SELECT * FROM artikel";
                                    break;
                            }
                        }
                        break;
                }
                $stmt = $conn->query($sql);
            }
        }
        
    }   
    catch (Exception $e) {
        echo "<pre>";
        var_dump($e);
    }
?>