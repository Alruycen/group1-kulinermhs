<?php
    include 'function.php';
    try {
        $submenu = "";
        $conn->setAttribute(PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION);
        if (isset($_POST['submit-search'])) {
            $search = $_POST['search'];
            $menu = [1, 2, 3, 4];
            if (isset($_POST['page']) && in_array($_POST['page'], $menu)) {
                $submenu = $_POST['page'];
                $sql = "SELECT * FROM artikel WHERE id_kategori = ? AND (nama LIKE ? OR deskripsi LIKE ? OR penulis LIKE ?)";
                $atrb = [$submenu, "%$search%", "%$search%", "%$search%"];
            }
            else {
                $sql = "SELECT * FROM artikel WHERE nama LIKE ? OR deskripsi LIKE ? OR penulis LIKE ?";
                $atrb = ["%$search%", "%$search%", "%$search%"];
            }   
            $stmt = $conn->prepare($sql);
            $stmt->execute($atrb);

            switch($submenu) {
                case "1": $submenu = "makanan"; break;
                case "2": $submenu = "minuman"; break;
                case "3": $submenu = "tempat"; break;
                case "4": $submenu = "oleholeh"; break;
                default: $submenu = "";
                    break;
            }
        }
        else {
            switch($_GET['page']) {
                case "makanan":
                    $sql = "SELECT * FROM artikel WHERE id_kategori = 1";
                    $submenu = "makanan";
                    break;
                case "minuman":
                    $sql = "SELECT * FROM artikel WHERE id_kategori = 2";
                    $submenu = "minuman";
                    break;
                case "tempat":
                    $sql = "SELECT * FROM artikel WHERE id_kategori = 3";
                    $submenu = "tempat";
                    break;
                case "oleholeh":
                    $sql = "SELECT * FROM artikel WHERE id_kategori = 4";
                    $submenu = "oleholeh";
                    break;
                default:
                    header('Location: ../index.php');
                    break;
            }
            $stmt = $conn->query($sql);
        }
    }
    catch (Exception $e) {
        echo "<pre>";
        var_dump($e);
    }
?>
