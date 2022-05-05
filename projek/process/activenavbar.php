<?php
    if(!$_GET['page']) {
        $page = '';
    }
    else
        $page = $_GET['page'];
?>
<ul class="navbar-nav flex-grow-1">
    <li class="nav-item">
        <a class="<?php
            if($page =='makanan')
                echo 'nav-link active'; 
            else echo 'nav-link';?>" 
        href="<?php
            if($page =='makanan') 
                echo '../index.php'; 
            else echo '../views/menu.php?page=makanan'; ?>">Makanan</a>
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
                echo '../index.php'; 
            else echo '../views/menu.php?page=minuman'; ?>">Minuman</a>
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
                echo '../index.php'; 
            else echo '../views/menu.php?page=tempat'; ?>">Tempat</a>
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
                echo '../index.php'; 
            else echo '../views/menu.php?page=oleholeh'; ?>">Oleh-Oleh</a>
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
                echo '../index.php'; 
            else echo '../views/menu.php?page=tentangkami'; ?>">Tentang Kami</a>
    </li>
</ul>
