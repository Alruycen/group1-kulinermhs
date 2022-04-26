<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Home</title>
</head>
<style>
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
        position=absolute;
        top=0;
        left=0;
        padding-top:50px;
        padding-bottom:50px;
    }
    .col2 {
        width:20%;
        display:table-cell;
    }
</style>

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
<div class="container ml-0">
    <div class="row">
        <div class="col">
            <h2 class="ml-1">Cari Kuliner di Tangerang</h2>
        </div>
        <div class="col text-right">
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Makanan khas Tangerang" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Cari</button>
            </form>
        </div>
    </div>
</div>
<div class="card-deck text-center">
    <div class="card">
        <img class="card-img-top" src="images/placeholder.png" alt="Makanan">
        <div class="card-body">
            <h5 class="card-title"><a href="views/makanan.php">Makanan</a></h5>
        </div>
    </div>
    <div class="card">
        <img class="card-img-top" src="images/placeholder.png" alt="Minuman">
        <div class="card-body">
            <h5 class="card-title"><a href="views/minuman.php">Minuman</a></h5>
        </div>
    </div>
    <div class="card">
        <img class="card-img-top" src="images/placeholder.png" alt="Tempat">
        <div class="card-body">
            <h5 class="card-title"><a href="views/tempat.php">Tempat</a></h5>
        </div>
    </div>
    <div class="card">
        <img class="card-img-top" src="images/placeholder.png" alt="Oleh-Oleh">
        <div class="card-body">
            <h5 class="card-title"><a href="views/oleholeh.php">Oleh-Oleh</a></h5>
        </div>
    </div>
    <div class="card">
        <img class="card-img-top" src="images/placeholder.png" alt="Tentang Kami">
        <div class="card-body">
            <h5 class="card-title"><a href="views/tentangkami.php">Tentang Kami</a></h5>
        </div>
    </div>
</div>
<br/><br/><br/><br/>

<nav class="navbar navbar-expand-md navbar-dark fixed-bottom bg-dark">
    <div class="container-fluid">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
                <a class="nav-link" href="views/makanan.php">Makanan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="views/minuman.php">Minuman</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="views/tempat.php">Tempat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="views/oleholeh.php">Oleh-Oleh</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="views/tentangkami.php">Tentang Kami</a>
            </li>
        </ul>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

