<title>Makanan</title>
<style>
    body {
        background: #777;
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
        padding: 0 5% 0 0;
    }
    .card-img-top {
        width:20rem;
        height:12rem;
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
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <div class="col col-sm-6">
                    <div class="card">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Makanan khas</h4>
                        </div>
                        <div class="card-body">
                           <a href="../views/artikel.php?page=makanan" class="stretched-link"><img class="card-img-top" src="../images/placeholder.png" alt="makanan khas"></a>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-6">
                    <div class="card">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Rating & Review</h4>
                        </div>
                        <div class="card-body">
                            <a href="#" class="stretched-link"><img class="card-img-top" src="../images/placeholder.png" alt="rating ulasan"></a>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-6">
                    <div class="card">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Cari Restoran</h4>
                        </div>
                        <div class="card-body">
                            <a href="#" class="stretched-link"><img class="card-img-top" src="../images/placeholder.png" alt="cari restoran"></a>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-6">
                    <div class="card">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Rentang Harga</h4>
                        </div>
                        <div class="card-body">
                            <a href="#" class="stretched-link"><img class="card-img-top" src="../images/placeholder.png" alt="rentang harga"></a>
                        </div>
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
                    <h6 class="card-subtitle">Makanan khas</h6>
                    <ul>
                        <li><a class ="card-link" href="#">Soto Betawi</a></li>
                        <li><a class ="card-link" href="#">Sate</a></li>
                    </ul>
                    <h6 class="card-subtitle">Cari Jajanan?</h6>
                    
                    <ul>
                        <li><a class ="card-link" href="#">Cek di oleh-oleh khas</a></li>
                        <li><a class ="card-link" href="#">Cek di tempat pasar malam</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>

<br/><br/><br/><br/>
