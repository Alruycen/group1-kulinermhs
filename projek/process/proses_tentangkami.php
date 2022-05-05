<title>Form Tentang Kami</title>
<?php
    include 'function.php';
    
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE,
                    PDO::ERRMODE_EXCEPTION);
                    
        $sql = "INSERT INTO kritiksaran (tanggapan) VALUES (?)";
    
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_POST['tanggapan']]);

    }catch (Exception $e) {
        echo "<pre>";
        var_dump($e);
    }finally {
        echo "<a href='../views/menu.php?page=tentangkami'>Redirecting you back to tentangkami.php...</a>";
    }
    
?>
