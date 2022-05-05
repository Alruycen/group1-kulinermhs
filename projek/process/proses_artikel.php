<?php
    include 'function.php';
    $kategori = "";
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION);
        if(isset($_POST['submit-search'])) {
            $search = $_POST['search'];
            if (isset($_POST['page'])) { //fitur search artikel
                if(in_array($_POST['page'], [1, 2, 3, 4])) {
                    $kategori = $_POST['page'];
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
                        header('Location: ../index.php');
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
