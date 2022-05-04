<link rel="stylesheet" href="../assets/carousel/carousel.css">
<style>
    body {
        background:#fff;
        overflow-x:clip;
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
        padding-top:3%;
        padding-left:3%;
    }
    .row {
        padding: 2% 0 2% 2%;
    }
    .card {
        margin:5%;
    }
    .nav-link:hover {
        border-bottom: 1px solid #fff;
    }
</style>

<body>
    <div id="banner" class="carousel carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="3000">
                <div class="overlay-image">
                    <img class="img-fluid" src="images/bir-pletok.jpg" alt="slide1">
                </div>
                <div class="container">
                    <h1>Welcome to Kuliner Mahasiswa</h1>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <div class="overlay-image">
                    <img class="img-fluid" src="images/sate-bandeng.jpg" alt="slide2">
                </div>
                <div class="container">
                    <h1>Welcome to Kuliner Mahasiswa</h1>
                </div>
            </div>
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#banner" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#banner" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#banner" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#banner" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <h2 class="ml-1">Cari Kuliner di Tangerang</h2>
        </div>
        <div class="col text-right">
            <form class="d-flex" action="views/artikel.php?page=" method="post">
                <input class="form-control me-2" type="text" id="search" name="search" placeholder="Makanan khas Tangerang" aria-label="Search" onkeyup="showHint(this.value)">
                <input type="hidden" value="" name="page">
                <button class="btn btn-outline-success" type="submit" name="submit-search">Cari</button>
            </form>
            <select id="livesearch" onchange="chooseHint(this)"></select>
        </div>
    </div>

    <div class="row text-center">
        <div class="col">
            <div class="card">
                <img class="card-img-top" src="images/placeholder.png" alt="Makanan">
                <div class="card-body">
                    <a href="views/menu.php?page=makanan" class="btn btn-outline-success stretched-link">Go to Makanan</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img class="card-img-top" src="images/placeholder.png" alt="Minuman">
                <div class="card-body">
                    <a href="views/menu.php?page=minuman" class="btn btn-outline-success stretched-link">Go to Minuman</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img class="card-img-top" src="images/placeholder.png" alt="Tempat">
                <div class="card-body">
                    <a href="views/menu.php?page=tempat" class="btn btn-outline-success stretched-link">Go to Tempat</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img class="card-img-top" src="images/placeholder.png" alt="Oleh-Oleh">
                <div class="card-body">
                    <a href="views/menu.php?page=oleholeh" class="btn btn-outline-success stretched-link">Go to Oleh-Oleh</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img class="card-img-top" src="images/placeholder.png" alt="Tentang Kami">
                <div class="card-body">
                    <a href="views/menu.php?page=tentangkami" class="btn btn-outline-success stretched-link">Go to Tentang Kami</a>
                </div>
            </div>
        </div>
    </div>

    <br/><br/><br/><br/><br/><br/><br/>
    <script>
        function showHint(str) {
            var xhttp;
            if(str.length == 0) {
                document.getElementById("livesearch").InnerHTML = "";
                return;
            }
            else {
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        document.getElementById("livesearch").innerHTML = xhttp.responseText;
                        document.getElementById("livesearch").style.border="1px solid";
                    }
                };
                xhttp.open("GET", "process/gethint.php?q="+str, true);
                xhttp.send();
            }
        }

        function chooseHint(data) {
            document.getElementById("search").value = data.value;
        }

    </script>
</body>

<nav class="navbar navbar-expand-md navbar-dark fixed-bottom bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Kuliner Mahasiswa</a>
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
                <a class="nav-link" href="views/menu.php?page=makanan">Makanan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="views/menu.php?page=minuman">Minuman</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="views/menu.php?page=tempat">Tempat</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="views/menu.php?page=oleholeh">Oleh-Oleh</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="views/menu.php?page=tentangkami">Tentang Kami</a>
            </li>
        </ul>
    </div>
</nav>
