<?php
    if(!$_GET['page']) {
        $page = 'home';
    }
    else
        $page = $_GET['page'];
?>
<li class="<?php 
    if($page =='makanan') 
        echo 'nav-item active'; 
    else echo 'nav-item';?>">
    <a class="nav-link" href="../views/makanan.php?page=makanan">Makanan</a>
</li>
<li class="<?php 
    if($page =='minuman') 
        echo 'nav-item active'; 
    else echo 'nav-item';?>">
    <a class="nav-link" href="../views/minuman.php?page=minuman">Minuman</a>
</li>
<li class="<?php 
    if($page =='tempat') 
        echo 'nav-item active'; 
    else echo 'nav-item';?>">
    <a class="nav-link" href="../views/tempat.php?page=tempat">Tempat</a>
</li>
<li class="<?php 
    if($page =='oleholeh') 
        echo 'nav-item active'; 
    else echo 'nav-item';?>">
    <a class="nav-link" href="../views/oleholeh.php?page=oleholeh">Oleh-Oleh</a>
</li>
<li class="<?php 
    if($page =='tentangkami') 
        echo 'nav-item active'; 
    else echo 'nav-item';?>">
    <a class="nav-link" href="../views/tentangkami.php?page=tentangkami">Tentang Kami</a>
</li>
