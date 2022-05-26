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
    .card-img-top {
        height:8rem;
    }
</style>
<?php
    include 'process/function.php';

    $conn = connDb();

    $sql = "SELECT * FROM artikel";

    $stmt = $conn->query($sql);
?>

<body>
    <div id="banner" class="carousel carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
        <?php 
            $i = 0;
            if(isset($stmt)) :
            while($data = $stmt->fetch(PDO::FETCH_ASSOC)):
            $i++;
            $foto;
            if(file_exists('images/'.$data['foto'])) {
                $foto = 'images/'.$data['foto'];
            }else {
                $foto ='';
            }
            if ($i == 1):
        ?>
            <div class="carousel-item active" data-bs-interval="3000">
            <?php else: ?>
            <div class="carousel-item" data-bs-interval="3000">
            <?php endif; ?>
                <div class="overlay-image">
                    <img class="img-fluid" src="<?= $foto; ?>" alt="slide<?= $i; ?>">
                </div>
                <div class="container">
                    <h1 class="display-4">Welcome to Kuliner Mahasiswa</h1>
                </div>
            </div>
            <?php 
            if($i == 3) {
                break;
            }
            endwhile; else: ?>
            <div class="carousel-item active" data-bs-interval="3000">
                <div class="overlay-image">
                    <img class="img-fluid" src="" alt="slide1">
                </div>
                <div class="container">
                    <h1 class="display-1">Welcome to Kuliner Mahasiswa</h1>
                </div>
            </div>
            <?php endif; ?>
            <div class="carousel-indicators">
            <?php 
                $k = 0;
                for($j=0;$j<$i;$j++):
                $k++; ?>
                <button type="button" data-bs-target="#banner" data-bs-slide-to="<?= $j; ?>"
                <?php if ($j == 0) echo "class='active'  aria-current='true'"; ?> aria-label="Slide <?= $k; ?>"></button>
                <?php endfor; ?>
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
            <h2 class="ms-3">Cari Kuliner di Tangerang</h2>
        </div>
        <div class="col text-right">
            <form class="d-flex" action="index.php" method="get">
                <input type="hidden" name="page" value="artikel">
                <input type="hidden" name="kategori" value= "">
                <span class="input-group-text" id="basic-addon1"><i data-feather="search"></i></span>
                <input class="form-control me-2" list="livesearch" id="search" name="search" placeholder="Makanan khas Tangerang" aria-describedby="basic-addon1" onkeyup="showHint(this.value)">
                <datalist id="livesearch"></datalist>
                <button class="btn btn-outline-success" type="hidden"></button>
            </form>
        </div>
    </div>

    <div class="row text-center">
        <div class="col">
            <div class="card">
                <img class="card-img-top">
                <div class="card-body">
                    <a href="index.php?page=makanan" class="btn btn-outline-success stretched-link">Go to Makanan</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img class="card-img-top">
                <div class="card-body">
                    <a href="index.php?page=minuman" class="btn btn-outline-success stretched-link">Go to Minuman</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img class="card-img-top">
                <div class="card-body">
                    <a href="index.php?page=tempat" class="btn btn-outline-success stretched-link">Go to Tempat</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img class="card-img-top">
                <div class="card-body">
                    <a href="index.php?page=oleholeh" class="btn btn-outline-success stretched-link">Go to Oleh-Oleh</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img class="card-img-top">
                <div class="card-body">
                    <a href="index.php?page=tentangkami" class="btn btn-outline-success stretched-link">Go to Tentang Kami</a>
                </div>
            </div>
        </div>
    </div>

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
    </script>
</body>