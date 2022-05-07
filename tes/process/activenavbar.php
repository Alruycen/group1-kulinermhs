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
        <a class="<?php
            if($page =='makanan')
                echo 'nav-link active'; 
            else echo 'nav-link';?>" 
        href="<?php
            if($page =='makanan') 
                echo 'index.php'; 
            else echo 'index.php?page=makanan'; ?>">Makanan</a>
    </li>
</ul>
<ul class="navbar-nav flex-grow-1">
    <li class="nav-item">
        <a class="<?php
            if($page =='minuman')
                echo 'nav-link active'; 
            else echo 'nav-link';?>" 
        href="<?php
            if($page =='minuman') 
                echo 'index.php'; 
            else echo 'index.php?page=minuman'; ?>">Minuman</a>
    </li>
</ul>
<ul class="navbar-nav flex-grow-1">
    <li class="nav-item">
        <a class="<?php
            if($page =='tempat')
                echo 'nav-link active'; 
            else echo 'nav-link';?>" 
        href="<?php
            if($page =='tempat') 
                echo 'index.php'; 
            else echo 'index.php?page=tempat'; ?>">Tempat</a>
    </li>
</ul>
<ul class="navbar-nav flex-grow-1">
    <li class="nav-item">
        <a class="<?php
            if($page =='oleholeh')
                echo 'nav-link active'; 
            else echo 'nav-link';?>" 
        href="<?php
            if($page =='oleholeh') 
                echo 'index.php'; 
            else echo 'index.php?page=oleholeh'; ?>">Oleh-Oleh</a>
    </li>
</ul>
<ul class="navbar-nav flex-grow-1">
    <li class="nav-item">
        <a class="<?php
            if($page =='tentangkami')
                echo 'nav-link active'; 
            else echo 'nav-link';?>" 
        href="<?php
            if($page =='tentangkami') 
                echo 'index.php'; 
            else echo 'index.php?page=tentangkami'; ?>">Tentang Kami</a>
    </li>
</ul>