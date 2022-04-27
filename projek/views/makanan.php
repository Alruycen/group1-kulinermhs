<?php
if($_GET['page'] =='makanan') {
require '../assets/head.php';
require '../assets/footer.php';
require '../assets/makanan.php';
}
else {
    header('../index.php');
}
?>
