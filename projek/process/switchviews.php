<?php
require '../assets/startertemplate.php';
require '../assets/footer.php';

switch($_GET['page']) {
    case 'makanan':
        require '../assets/makanan.php';
        break;
    case 'minuman':
        require '../assets/minuman.php';
        break;
    case 'tempat':
        require '../assets/tempat.php';
        break;
    case 'oleholeh':
        require '../assets/oleholeh.php';
        break;
    case 'tentangkami':
        require '../assets/tentangkami.php';
        break;
    default: 
        $page = 'home';
        header('Location: ../index.php');
        break;
}
?>
