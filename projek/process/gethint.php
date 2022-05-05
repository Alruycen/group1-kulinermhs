<?php
    include 'function.php';

    if(isset($_GET['submenu'])) {
        switch($_GET['submenu']) {
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

                if(!isset($hint)) {
                    echo "<option value=''>No Suggestions</option>";
                }
                else { 
                    for($i=0; $i<count($hint); $i++) {
                        echo "<option value='$hint[$i]'>$hint[$i]</option>";
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

        if(!isset($hint)) {
            echo "<option value=''>No Suggestions</option>";
        }
        else { 
            for($i=0; $i<count($hint); $i++) {
                echo "<option value='$hint[$i]'>$hint[$i]</option>";
            }
        }
    }
?>
