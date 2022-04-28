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
        padding-top:5%;
        max-width:30%;
    }
    .row .row {
        background:#777;
    }
    .col-6 {
        color: white;
        background:#white;
    }
    .col-4 {
        background:peachpuff;
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
                    <form class="d-flex" action="../process/searchbar.php" method="post">
                        <input class="form-control me-2" type="text" name="search" placeholder="Makanan khas Tangerang" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit" name="submit-search">Cari</button>
                    </form>
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
        </div>
    </div>
</body>
