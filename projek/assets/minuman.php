<link rel="stylesheet" href="sidebar/sidebars.css">
<title>Minuman</title>
<style>
    body {
        background: #777;
        overflow-x:clip;
    }
    .col-m-8 {
        padding-left:5%;
        padding-top:5%;
        max-width:66%;
    }
    .col-m-4 {
        padding-top: 5%;
        padding-left: 10%;
        max-width:33%;
    }
    .col-sm-6 {
        padding: 0 5% 5% 0;
    }
    .active {
        border-bottom: 3px solid #fff;
    }
    .nav-link:hover {
        border-bottom: 1px solid #fff;
    }
</style>

<body>
    <div class="row">
        <div class="col-m-8">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Resep</h4>
                        </div>
                        <a href="#" class="stretched-link"><img class="card-img-top" src="../images/placeholder.png"></a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Minuman viral</h4>
                        </div>
                        <a href="../views/artikel.php?page=minuman" class="stretched-link"><img class="card-img-top" src="../images/placeholder.png"></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Minuman khas</h4>
                        </div>
                        <a href="../views/artikel.php?page=minuman" class="stretched-link"><img class="card-img-top" src="../images/placeholder.png"></a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Rentang harga</h4>
                        </div>
                        <a href="../views/rentangharga.php?page=minuman" class="stretched-link"><img class="card-img-top" src="../images/placeholder.png"></a>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Rating & Review</h4>
                        </div>
                        <a href="../views/rentangharga.php?page=minuman" class="stretched-link"><img class="card-img-top" src="../images/placeholder.png"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-m-4">
            <div class="card">
                <div class="card-body">
                    <?php
                        require 'formsearch.php';
                    ?>
                    <ul>
                        <li><h5 class="card-title">Artikel Terbaru</h5></li>
                        <a class="card-link" href="#"><img class="card-img mb-2" src="../images/placeholder.png" alt="artikel terbaru"></a>
                        <li><h5 class="card-title">Yang Paling Diminati</h5></li>
                        <a class="card-link" href="#"><img class="card-img mb-2" src="../images/placeholder.png" alt="yang paling diminati"></a>
                    </ul>
                    <h6 class="card-subtitle">Minuman khas</h6>
                    <ul>
                        <li><a class ="card-link" href="#">Es kuwut</a></li>
                        <li><a class ="card-link" href="#">Bir pletok</a></li>
                    </ul>
                    <h6 class="card-subtitle">Cari tempat nongkrong?</h6>
                    
                    <ul>
                        <li><a class ="card-link" href="#">Cek di tempat kafe</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

<br/><br/><br/><br/>
