<?php
    include 'function.php';

    $conn = connDb();

    if(isset($_GET['page'])) {
        switch($_GET['page']) {
            case "resep":
                $sql = "SELECT nama, bahan, prosedur FROM artikel a, resep b WHERE a.id = b.id_artikel";
                $stmt = $conn->query($sql);

                while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $a[] = $data['nama'];
                }

                $q = $_GET['q'];
                $j=0;
                if($q != "") {
                    for($i=0; $i<count($a); $i++) {
                        if(stristr($a[$i], $q)) {
                            $hint[$j] = $a[$i];
                            $j++;
                        }
                    }
                }
                else {
                    foreach($a as $obj) {
                        $hint[] = $obj;
                    }
                }

                if(!isset($hint)) {
                    echo "<option value='No Suggestions' />";
                }
                else { 
                    for($i=0; $i<count($hint); $i++) {
                        echo "<option value='$hint[$i]' />";
                    }
                }
                break;
            case "oleholeh":
                $sql = "SELECT id, nama FROM artikel WHERE id_kategori = 4";
                $stmt = $conn->query($sql);

                while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $a[] = $data['nama'];
                }

                $q = $_GET['q'];
                $j=0;
                if($q != "") {
                    for($i=0; $i<count($a); $i++) {
                        if(stristr($a[$i], $q)) {
                            $hint[$j] = $a[$i];
                            $j++;
                        }
                    }
                }
                else {
                    foreach($a as $obj) {
                        $hint[] = $obj;
                    }
                }

                if(!isset($hint)) {
                    echo "<option value='No Suggestions' />";
                }
                else { 
                    for($i=0; $i<count($hint); $i++) {
                        echo "<option value='$hint[$i]' />";
                    }
                }
                break;

        }
    }
    else {
        $sql = "SELECT id, nama, id_kategori FROM artikel";
        $stmt = $conn->query($sql);

        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $a[] = $data['nama'];
        }

        $q = $_GET['q'];
        $j=0;
        if($q != "") {
            for($i=0; $i<count($a); $i++) {
                if(stristr($a[$i], $q)) {
                    $hint[$j] = $a[$i];
                    $j++;
                }
            }
        }
        else {
            foreach($a AS $obj) {
                $hint[] = $obj;
            }
        }

        if(!isset($hint)) {
            echo "<option value='No Suggestions'>";
        }
        else { 
            for($i=0; $i<count($hint); $i++) {
                echo "<option value='$hint[$i]' />";
            }
        }
    }
?>
