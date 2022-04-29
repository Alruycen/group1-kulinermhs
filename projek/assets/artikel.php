<style>
    .col-m-8 {
        max-width:66%;
        padding-right:10%;
    }
    .row {
        padding-left: 5%;
        margin-bottom:5%;
    }
    .col-m-4 {
        padding-top:1%;
        max-width:30%;
    }
    .row .row {
        background:#777;
        padding:5%;
    }
    .col-6 {
        background:white;
        padding-right:5%;
    }
    .col-4 {
        padding-left:5%;
        margin-left:10%;
        position:relative;
        padding-top:1%;
        background:peachpuff;
        height:100%;
        overflow-y:scroll;
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
            <?php
                include '../process/searchbar.php';
            ?>
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
