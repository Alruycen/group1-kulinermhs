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
                    $sql = "INSERT INTO resep (id_artikel, bahan, prosedur)
                            VALUES (?, ?, ?)";
                    $atrb = [$_POST['artikel'], $_POST['bahan'], $_POST['prosedur']];
                    $stmtinput = $conn->prepare($sql);
                    $stmtinput->execute($atrb);
                    header('Location: ../index.php?page=resep&kategori='.$page);
                    break;
                case "edit":
                    $sql = "UPDATE resep
                            SET bahan = ?, prosedur = ?
                            WHERE id = ?";
                    $atrb = [$_POST['bahan'], $_POST['prosedur'], $_POST['id']];
                    $stmtinput = $conn->prepare($sql);
                    $stmtinput->execute($atrb);
                    header('Location: ../index.php?page=resep&kategori='.$page);
                    break;  
            }
        }
        if(isset($_GET['search'])) {
            $search = $_GET['search'];
            $sql = "SELECT a.id AS id_artikel, a.nama AS nama, a.foto AS foto, a.id_kategori AS id_kategori, b.id AS id_resep, b.bahan AS bahan, b.prosedur AS prosedur FROM artikel a, resep b WHERE a.id = b.id_artikel AND (a.nama LIKE ? OR a.deskripsi LIKE ? OR a.penulis LIKE ?)";
            $atrb = ["%$search%", "%$search%", "%$search%"];

            $sqlterbaru = "SELECT * FROM artikel a, resep b WHERE a.id = b.id_artikel AND (a.nama LIKE ? OR a.deskripsi LIKE ? OR a.penulis LIKE ?) AND a.tanggalditulis >= (SELECT MAX(tanggalditulis) FROM artikel a, resep b WHERE a.id = b.id_artikel AND (a.nama LIKE ? OR a.deskripsi LIKE ? OR a.penulis LIKE ?))";
            $atrbterbaru = ["%$search%", "%$search%", "%$search%", "%$search%", "%$search%", "%$search%"];

            $sqldiminati = "SELECT * FROM rentangharga a, resep b, artikel c WHERE a.id_artikel = c.id AND b.id_artikel = c.id AND a.id IN (SELECT id_artikel FROM ratingulasan GROUP BY id_artikel HAVING AVG(rating) >= (SELECT AVG(rating) FROM ratingulasan d, rentangharga a, artikel c WHERE d.id_artikel = a.id AND a.id_artikel = c.id AND b.id_artikel = c.id AND (c.nama LIKE ? OR c.deskripsi LIKE ? OR c.penulis LIKE ?))) AND (c.nama LIKE ? OR c.deskripsi LIKE ? OR c.penulis LIKE ?)";
            $atrbdiminati = ["%$search%", "%$search%", "%$search%", "%$search%", "%$search%", "%$search%"];
            
            
            $stmt = $conn->prepare($sql);
            $stmt->execute($atrb);
            $stmtterbaru = $conn->prepare($sqlterbaru);
            $stmtterbaru->execute($atrbterbaru);
            $stmtdiminati = $conn->prepare($sqldiminati);
            $stmtdiminati->execute($atrbdiminati);
        }
        else {
            if (isset($_GET['kategori'])) {
                $kategori = $_GET['kategori'];
                switch($kategori) {
                    case "makanan":
                        $sql = "SELECT a.id AS id_artikel, a.nama AS nama, a.foto AS foto, a.id_kategori AS id_kategori, b.id AS id_resep, b.bahan AS bahan, b.prosedur AS prosedur FROM artikel a, resep b WHERE a.id = b.id_artikel AND id_kategori = 1";
                        $sqlterbaru = "SELECT * FROM artikel a, resep b WHERE a.id = b.id_artikel AND id_kategori = 1 AND a.tanggalditulis >= (SELECT MAX(tanggalditulis) FROM artikel a, resep b WHERE a.id = b.id_artikel AND id_kategori = 1)";
                        $sqldiminati = "SELECT * FROM rentangharga a, resep b, artikel c WHERE a.id_artikel = c.id AND b.id_artikel = c.id AND a.id IN (SELECT id_artikel FROM ratingulasan GROUP BY id_artikel HAVING AVG(rating) >= (SELECT AVG(rating) FROM ratingulasan d, resep b, rentangharga a, artikel c WHERE d.id_artikel = a.id AND a.id_artikel = c.id AND b.id_artikel = c.id AND c.id_kategori = 1)) AND c.id_kategori = 1";
                        break;
                    case "minuman":
                        $sql = "SELECT a.id AS id_artikel, a.nama AS nama, a.foto AS foto, a.id_kategori AS id_kategori, b.id AS id_resep, b.bahan AS bahan, b.prosedur AS prosedur FROM artikel a, resep b WHERE a.id = b.id_artikel AND a.id_kategori = 2";
                        $sqlterbaru = "SELECT * FROM artikel a, resep b WHERE a.id = b.id_artikel AND id_kategori = 2 AND a.tanggalditulis >= (SELECT MAX(tanggalditulis) FROM artikel a, resep b WHERE a.id = b.id_artikel AND id_kategori = 2)";
                        $sqldiminati = "SELECT * FROM rentangharga a, resep b, artikel c WHERE a.id_artikel = c.id AND b.id_artikel = c.id AND a.id IN (SELECT id_artikel FROM ratingulasan GROUP BY id_artikel HAVING AVG(rating) >= (SELECT AVG(rating) FROM ratingulasan d, resep b, rentangharga a, artikel c WHERE d.id_artikel = a.id AND a.id_artikel = c.id AND b.id_artikel = c.id AND c.id_kategori = 2)) AND c.id_kategori = 2";
                        break;
                    case "tempat":
                        $sql = "SELECT a.id AS id_artikel, a.nama AS nama, a.foto AS foto, a.id_kategori AS id_kategori, b.id AS id_resep, b.bahan AS bahan, b.prosedur AS prosedur FROM artikel a, resep b WHERE a.id = b.id_artikel AND id_kategori = 3";
                        $sqlterbaru = "SELECT * FROM artikel a, resep b WHERE a.id = b.id_artikel AND id_kategori = 3 AND a.tanggalditulis >= (SELECT MAX(tanggalditulis) FROM artikel a, resep b WHERE a.id = b.id_artikel AND id_kategori = 3)";
                        $sqldiminati = "SELECT * FROM rentangharga a, resep b, artikel c WHERE a.id_artikel = c.id AND b.id_artikel = c.id AND a.id IN (SELECT id_artikel FROM ratingulasan GROUP BY id_artikel HAVING AVG(rating) >= (SELECT AVG(rating) FROM ratingulasan d, resep b, rentangharga a, artikel c WHERE d.id_artikel = a.id AND a.id_artikel = c.id AND b.id_artikel = c.id AND c.id_kategori = 3)) AND c.id_kategori = 3";
                        break;
                    case "oleholeh":
                        $sql = "SELECT a.id AS id_artikel, a.nama AS nama, a.foto AS foto, a.id_kategori AS id_kategori, b.id AS id_resep, b.bahan AS bahan, b.prosedur AS prosedur FROM artikel a, resep b WHERE a.id = b.id_artikel AND id_kategori = 4";
                        $sqlterbaru = "SELECT * FROM artikel a, resep b WHERE a.id = b.id_artikel AND id_kategori = 4 AND a.tanggalditulis >= (SELECT MAX(tanggalditulis) FROM artikel a, resep b WHERE a.id = b.id_artikel AND id_kategori = 4)";
                        $sqldiminati = "SELECT * FROM rentangharga a, resep b, artikel c WHERE a.id_artikel = c.id AND b.id_artikel = c.id AND a.id IN (SELECT id_artikel FROM ratingulasan GROUP BY id_artikel HAVING AVG(rating) >= (SELECT AVG(rating) FROM ratingulasan d, resep b, rentangharga a, artikel c WHERE d.id_artikel = a.id AND a.id_artikel = c.id AND b.id_artikel = c.id AND c.id_kategori = 4)) AND c.id_kategori = 4";
                        break;
                }
                $stmt = $conn->query($sql);
                $stmtterbaru = $conn->query($sqlterbaru);
                $stmtdiminati = $conn->query($sqldiminati);
            }
        }
        
    }   
    catch (Exception $e) {
        echo "<pre>";
        var_dump($e);
    }
?>