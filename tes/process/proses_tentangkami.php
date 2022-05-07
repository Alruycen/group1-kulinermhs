<title>Form Tentang Kami</title>
<?php
    include 'function.php';
    
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE,
                        PDO::ERRMODE_EXCEPTION);

        if(isset($_POST['submit-register'])) {
            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

            $stmt = $conn->prepare($sql);
            $username = $_POST['uname'];
            $password = password_hash($_POST['upass'], PASSWORD_BCRYPT);
            $stmt->execute([$username, $password]);

            echo "Permintaanmu akan diproses... mohon tunggu minimal 24 jam sebelum login. <br/>";
            echo "<a href='../index.php?page=tentangkami'>Redirecting you back to tentangkami.php...</a>";
        }   
        elseif (isset($_POST['submit-login'])) {
            session_start();

            $sql = "SELECT * FROM users WHERE username = ?";
        
            $stmt = $conn->prepare($sql);
            $stmt->execute([$_POST['uname']]);
        
            if(isset($stmt)) {
                while($data = $stmt->fetch()) {
                    if(password_verify($_POST['upass'], $data['password'])) {
                        $_SESSION['role'] = $data['role'];
                        header('Location: ../index.php');
                    }
                    else {
                         echo "Password salah... mohon kembali. <br/>";
                         echo "<a href='../index.php?page=tentangkami'>Redirecting you back to tentangkami.php...</a>";
                    }
                }
            }
        }
        elseif (isset($_POST['submit-tanggapan'])) {

            $sql = "INSERT INTO kritiksaran (tanggapan) VALUES (?)";

            $stmt = $conn->prepare($sql);
            $stmt->execute([$_POST['tanggapan']]);

            echo "Tanggapanmu sudah terkirim. <br/>";
            echo "<a href='../index.php?page=tentangkami'>Redirecting you back to tentangkami.php...</a>";
        }
        elseif(isset($_GET['action'])) {
            if($_GET['action'] == "logout") {
                session_start();

                session_unset();

                session_destroy();
                header('Location: ../index.php');
            }
        }
        else {
            $sqlusers = "SELECT * from users WHERE role IS NOT NULL";
            
            $stmtusers = $conn->query($sqlusers);
        }

    }catch (Exception $e) {
        echo "<pre>";
        var_dump($e);
    }
    
?>