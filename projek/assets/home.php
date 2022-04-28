<link rel="stylesheet" href="carousel/carousel.css">
<style>
    body {
        background:#fff;
    }
    .carousel-item {
        height:24rem;
        background:#777;
        color:white;
    }
    .overlay-image {
        opacity:0.5;
    }
    .img-fluid {
        width:100%;
        height:24rem;
        object-fit:cover;
    }
    .container {
        position:absolute;
        top:0;
        left:0;
        padding-top:5%;
        padding-bottom:5%;
    }
    .row {
        padding-top:5%;
        padding-bottom:5%;
    }
    .col2 {
        width:20%;
        display:table-cell;
    }
</style>

<body>
    <div id="banner" class="carousel carousel-fade" data-ride="carousel" data-interval="3000">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="overlay-image">
                    <img class="img-fluid" src="images/bir-pletok.jpg" alt="slide1">
                </div>
                    <div class="container">
                        <h1>Kuliner Mahasiswa</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="overlay-image">
                        <img class="img-fluid" src="images/sate-bandeng.jpg" alt="slide2">
                    </div>
                    <div class="container">
                        <h1>Kuliner Mahasiswa</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="overlay-image">
                        <img class="img-fluid" src="" alt="slide3">
                    </div>
                    <div class="container">
                        <h1>Kuliner Mahasiswa</h1>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="overlay-image">
                        <img class="img-fluid" src="" alt="slide4">
                    </div>
                    <div class="container">
                        <h1>Kuliner Mahasiswa</h1>
                    </div>
                </div>
            </div>

            <a href="#banner" class="carousel-control-prev" role="button" data-slide="prev">
                <span class="sr-only"></span>
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a href="#banner" class="carousel-control-next" role="button" data-slide="next">
                <span class="sr-only"></span>
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>

            <ol class="carousel-indicators">
                <li data-target="#banner"
                    data-slide-to="0" class="active"></li>
                <li data-target="#banner"
                    data-slide-to="1"></li>
                <li data-target="#banner"
                    data-slide-to="2"></li>
                <li data-target="#banner"
                    data-slide-to="3"></li>
            </ol>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <h2 class="ml-1">Cari Kuliner di Tangerang</h2>
        </div>
        <div class="col text-right">
            <form class="d-flex" action="views/artikel.php" method="post">
                <input class="form-control me-2" type="text" name="search" placeholder="Makanan khas Tangerang" aria-label="Search">
                <button class="btn btn-outline-success" type="submit" name="submit-search">Cari</button>
            </form>
        </div>
    </div>

    <div class="card-deck text-center">
        <div class="card">
            <img class="card-img-top" src="images/placeholder.png" alt="Makanan">
            <div class="card-body">
                <h5 class="card-title">Makanan</h5>
                <a href="views/makanan.php?page=makanan" class="btn btn-outline-success stretched-link">Go to Makanan</a>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="images/placeholder.png" alt="Minuman">
            <div class="card-body">
                <h5 class="card-title">Minuman</h5>
                <a href="views/minuman.php?page=minuman" class="btn btn-outline-success stretched-link">Go to Minuman</a>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="images/placeholder.png" alt="Tempat">
            <div class="card-body">
                <h5 class="card-title">Tempat</h5>
                <a href="views/tempat.php?page=tempat" class="btn btn-outline-success stretched-link">Go to Tempat</a>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="images/placeholder.png" alt="Oleh-Oleh">
            <div class="card-body">
                <h5 class="card-title">Oleh-Oleh</h5>
                <a href="views/oleholeh.php?page=oleholeh" class="btn btn-outline-success stretched-link">Go to Oleh-Oleh</a>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="images/placeholder.png" alt="Tentang Kami">
            <div class="card-body">
                <h5 class="card-title">Tentang Kami</h5>
                <a href="views/tentangkami.php?page=tentangkami" class="btn btn-outline-success stretched-link">Go to Oleh-Oleh</a>
            </div>
        </div>
    </div>
    <br/><br/><br/><br/><br/>
</body>

<nav class="navbar navbar-expand-md navbar-dark fixed-bottom bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Kuliner Mahasiswa</a>
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
                <a class="nav-link" href="views/makanan.php?page=makanan">Makanan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="views/minuman.php?page=minuman">Minuman</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="views/tempat.php?page=tempat">Tempat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="views/oleholeh.php?page=oleholeh">Oleh-Oleh</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="views/tentangkami.php?page=tentangkami">Tentang Kami</a>
            </li>
        </ul>
    </div>
</nav>
