<?php
    if(isset($_GET['page'])) {
        switch($_GET['page']) {
            case "makanan":
                $page = $_GET['page'];
                break;
            case "minuman":
                $page = $_GET['page'];
                break;
            case "tempat":
                $page = $_GET['page'];
                break;
            case "oleholeh":
                $page = $_GET['page'];
                break;
            case "tentangkami":
                $page = $_GET['page'];
                break;
            default: 
                $page = $_GET['kategori'];
                break;
        }
    }
        
?>
<ul class="navbar-nav flex-grow-1">
    <li class="nav-item">
        <a class="<?= $page == 'makanan' ? 'nav-link active' : 'nav-link';?>" 
        href="<?= $page ==  'makanan' ? 'index.php' : 'index.php?page=makanan'; ?>">Makanan</a>
    </li>
</ul>
<ul class="navbar-nav flex-grow-1">
    <li class="nav-item">
        <a class="<?= $page == 'minuman' ? 'nav-link active' : 'nav-link';?>" 
        href="<?= $page == 'minuman' ? 'index.php' : 'index.php?page=minuman'; ?>">Minuman</a>
    </li>
</ul>
<ul class="navbar-nav flex-grow-1">
    <li class="nav-item">
        <a class="<?= $page == 'tempat' ? 'nav-link active' : 'nav-link';?>" 
        href="<?= $page == 'tempat' ? 'index.php' : 'index.php?page=tempat'; ?>">Tempat</a>
    </li>
</ul>
<ul class="navbar-nav flex-grow-1">
    <li class="nav-item">
        <a class="<?= $page == 'oleholeh' ? 'nav-link active' : 'nav-link';?>" 
        href="<?= $page == 'oleholeh' ? 'index.php' : 'index.php?page=oleholeh'; ?>">Oleh-Oleh</a>
    </li>
</ul>
<ul class="navbar-nav flex-grow-1">
    <li class="nav-item">
        <a class="<?= $page == 'tentangkami' ? 'nav-link active' : 'nav-link';?>" 
        href="<?= $page == 'tentangkami' ? 'index.php' : 'index.php?page=tentangkami'; ?>">Tentang Kami</a>
    </li>
</ul>