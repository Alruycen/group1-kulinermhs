<?php
    include 'function.php';
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION);    
        if(isset($_GET['page2'])) {
            $page = $_GET['page2'];
        }
        else {
            $page = 'home';
        }
        switch($_GET['action']) {
            case "add":
                $sqlins = "INSERT INTO ratingulasan (rating, ulasan, tanggalditulis, penulis, id_artikel) VALUES (?, ?, ?, ?, ?)";
                $stmtins = $conn->prepare($sqlins);   
                $stmtins->execute([$_POST['rating'], $_POST['ulasan'], $_POST['tanggalditulis'], $_POST['penulis'], $_POST['idartikel']]);
                
                header('Location: ../index.php/page='.$page);
                break;
            case "read":
                $sql = "SELECT a.id AS id_rentangharga, a.merek AS merek, a.lokasi AS lokasi, a.hargaminimal AS hargaminimal, a.hargamaksimal AS hargamaksimal, b.id = id_artikel, b.nama AS nama, b.foto AS foto FROM rentangharga a, artikel b WHERE a.id_artikel = b.id AND a.id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$_GET['id']]);
                break;
        }
    }
    catch (Exception $e) {
        echo "<pre>";
        var_dump($e);
    }
?>