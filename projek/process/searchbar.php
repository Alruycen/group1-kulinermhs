<?php
    include 'function.php';

if (isset($_POST['submit-search'])) {
    try {
        $sql = "SELECT * FROM artikel WHERE nama LIKE ? OR deskripsi LIKE ? OR penulis LIKE ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute(["%$_POST[search]%", "%$_POST[search]%", "%$_POST[search]%"]);

        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $nama = $data['nama'];
            $deskripsi = $data['deskripsi'];
            $foto;
            if (file_exists($data['foto'])) {
                $foto = $data['foto'];
            }
            else {
                $foto = '../images/placeholder.png';
            }
            echo "<div class='row'>
                    <div class='col-6'>
                        <h5>".$nama."</h5>
                        <img class='img-fluid' src='".$foto."'>
                    </div>
                    <div class='col-4'>
                        <div class='scrolling'>
                            <p>".$deskripsi."</p>
                        </div>
                    </div>
                </div>";
        }

    }
    catch (Exception $e) {
        echo "<pre>";
        var_dump($e);
    }


}
else {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM artikel";

        $stmt = $conn->query($sql);

        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $nama = $data['nama'];
            $deskripsi = $data['deskripsi'];
            $foto;
            if (file_exists($data['foto'])) {
                $foto = $data['foto'];
            }
            else {
                $foto = '../images/placeholder.png';
            }
            echo "<div class='row'>
                    <div class='col-6'>
                        <h5>".$nama."</h5>
                        <img class='img-fluid' src='".$foto."'>
                    </div>
                    <div class='col-4'>
                        <div class='scrolling'>
                            <p>".$deskripsi."</p>
                        </div>
                    </div>
                </div>";
        }

    }
    catch (Exception $e) {
        echo "<pre>";
        var_dump($e);
    }
}
?>
