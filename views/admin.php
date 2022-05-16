<?php
session_start();
if (isset($_GET['page']))  $page = $_GET['page'];
if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") : ?>
    <button class="btn btn-info" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Catatan Pengembang</button>

    <div class="offcanvas offcanvas-top" data-bs-scroll="true" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasTopLabel">Work In Progress</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            Di sini anda bisa mengubah data sesuai kebutuhan.
        </div>
        <?php if($page == 'artikel'): 
            if(isset($_GET['kategori'])) :?>
            <a href="index.php?page=editartikel&kategori=<?= $kategori = $_GET['kategori']; ?>&action=add" class="btn btn-primary"><span data-feather="plus-circle"></span> Tambah Artikel Baru</a>
            <?php else: ?>
            <a href="index.php?page=editartikel&action=add" class="btn btn-primary"><span data-feather="plus-circle"></span> Tambah Artikel Baru</a>
            <?php endif; ?>
        <?php elseif($page == 'rentangharga') :
            if(isset($_GET['kategori'])) :?>
            <a href="index.php?page=editharga&kategori=<?= $kategori = $_GET['kategori']; ?>&action=add" class="btn btn-primary"><span data-feather="plus-circle"></span> Tambah Merek Baru</a>
            <?php else : ?>
            <a href="index.php?page=editharga&action=add" class="btn btn-primary"><span data-feather="plus-circle"></span> Tambah Merek Baru</a>
            <?php endif; ?>
        <?php elseif($page == 'resep'):
            if(isset($_GET['kategori'])) :?>
            <a href="index.php?page=editresep&kategori=<?= $kategori = $_GET['kategori']; ?>&action=add" class="btn btn-primary"><span data-feather="plus-circle"></span> Tambah Resep Baru</a>
            <?php else : ?>
            <a href="index.php?page=editresep&action=add" class="btn btn-primary"><span data-feather="plus-circle"></span> Tambah Resep Baru</a>
            <?php endif; ?>
        <?php elseif($page == 'tempat') :
            if(isset($_GET['page'])) :?>
            <a href="index.php?page=edittempat&kategori=<?= $kategori = $_GET['page']; ?>&action=add" class="btn btn-primary"><span data-feather="plus-circle"></span> Tambah Tempat Baru</a>
            <?php else : ?>
            <a href="index.php?page=edittempat&action=add" class="btn btn-primary"><span data-feather="plus-circle"></span> Tambah Tempat Baru</a>
            <?php endif; ?>
        <?php elseif($page == 'oleholeh') :
            if(isset($_GET['page'])) :?>
            <a href="index.php?page=editoleh&kategori=<?= $kategori = $_GET['page']; ?>&page2=artikel&action=add" class="btn btn-primary"><span data-feather="plus-circle"></span> Tambah Oleh-Oleh Baru</a>
            <a href="index.php?page=editoleh&kategori=<?= $kategori = $_GET['page']; ?>&page2=rentangharga&action=add" class="btn btn-primary"><span data-feather="plus-circle"></span> Tambah Kios Jual Oleh-Oleh Baru</a>
            <?php else : ?>
            <a href="index.php?page=editoleh&page2=artikel&action=add" class="btn btn-primary"><span data-feather="plus-circle"></span> Tambah Oleh-Oleh Baru</a>
            <a href="index.php?page=editoleh&page2=rentangharga&action=add" class="btn btn-primary"><span data-feather="plus-circle"></span> Tambah Kios Jual Oleh-Oleh Baru</a>
            <?php endif; ?>
         <?php endif;?>
    </div>
<?php endif; ?>