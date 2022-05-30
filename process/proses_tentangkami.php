<title>Form Tentang Kami</title>
<?php
    include 'function.php';

    $conn = connDb();
    
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE,
                        PDO::ERRMODE_EXCEPTION);

        if(isset($_POST['submit-register'])) {
            if (isset($_POST['registername'])) {
                $sql = "SELECT * FROM users WHERE username = ?";

                $stmt = $conn->prepare($sql);
                $stmt->execute([$_POST['registername']]);
                if(isset($stmt)) : ?>
                    <script>
                        window.alert('Username sudah digunakan');
                        window.location='index.php?page=tentangkami';
                    </script>
                <?php 
                else :
                    $sql = "INSERT INTO users (username, password, foto) VALUES (?, ?, ?)";

                    $stmt = $conn->prepare($sql);
                    $username = $_POST['registername'];
                    $password = password_hash($_POST['upass'], PASSWORD_BCRYPT);
                    $foto = $_FILES['ufoto'];
                    $ext = explode('.', $foto['name']);
                    $ext = end($ext);
                    $ext = strtolower($ext);
                    //echo $ext;
                    $extboleh = ['jpg', 'png', 'jpeg'];
                    if (in_array($ext, $extboleh)) {
                        $sumber = $foto['tmp_name'];
                        $tujuan = '../images/'.$foto['name'];
                        if(!file_exists('../images/')) {
                            mkdir('../images/');
                        }
                        move_uploaded_file($sumber, $tujuan);
                        resize_image($tujuan, $ext, "500");
                    }
                    $stmt->execute([$username, $password, $foto['name']]);?>
                    <script>
                        window.alert('Permintaanmu akan diproses... mohon tunggu minimal 24 jam sebelum login.');
                        window.location='index.php?page=tentangkami';
                    </script>
                    <?php
            endif;
            }
        }   
        elseif (isset($_POST['submit-login'])) {
            session_start();

            $sql = "SELECT * FROM users WHERE username = ?";
        
            $stmt = $conn->prepare($sql);
            $stmt->execute([$_POST['loginname']]);
        
            if(isset($stmt)) {
                while($data = $stmt->fetch()) {
                    if(password_verify($_POST['upass'], $data['password'])) {
                        $_SESSION['role'] = $data['role'];
                        $_SESSION['username'] = $data['username'];?>
                        <script>
                        window.alert("Selamat datang, <?= $data['username']; ?>");
                        window.location='index.php';
                        </script>
                        <?php
                    }
                    else { ?>
                    <script>
                        window.alert('Password salah... mohon kembali.');
                        window.location='index.php?page=tentangkami';
                    </script>
                    <?php
                    }
                }
            }
        }
        elseif (isset($_POST['submit-tanggapan'])) {

            $sql = "INSERT INTO kritiksaran (tanggapan) VALUES (?)";

            $stmt = $conn->prepare($sql);
            $stmt->execute([$_POST['tanggapan']]); ?>

            <script>
                window.alert('Tanggapanmu sudah terkirim. ');
                window.location='index.php?page=tentangkami';
            </script>
            <?php
        }
        elseif(isset($_GET['action'])) {
            if($_GET['action'] == "logout") {
                session_start();

                session_unset();

                session_destroy();
                header('Location: ../index.php?page=tentangkami');
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