<style>
    .col-m-8 {
        padding-left: 5%;
        padding-top: 5%;
        max-width: 66%;
    }

    .col-m-4 {
        padding-top: 5%;
        padding-left: 10%;
        max-width: 33%;
    }

    .col-sm-6 {
        padding: 0 5% 0 0;
    }

    .card-img-top {
        height: 12rem;
    }
</style>
<div class="row">
    <div class="col-m-8">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col col-sm-6">
                <div class="card">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Makanan khas</h4>
                    </div>
                    <a href="index.php?page=artikel&kategori=makanan" class="stretched-link"><img class="card-img-top"></a>
                </div>
            </div>
            <div class="col col-sm-6">
                <div class="card">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Rating & Review</h4>
                    </div>
                    <a href="index.php?page=rentangharga&kategori=makanan" class="stretched-link"><img class="card-img-top"></a>
                </div>
            </div>
            <div class="col col-sm-6">
                <div class="card">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Cari Restoran</h4>
                    </div>
                    <a href="index.php?page=tempat" class="stretched-link"><img class="card-img-top"></a>
                </div>
            </div>
            <div class="col col-sm-6">
                <div class="card">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Rentang Harga</h4>
                    </div>
                    <a href="index.php?page=rentangharga&kategori=makanan" class="stretched-link"><img class="card-img-top"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-m-4">
        <?php
        include 'views/sidebar.php'; ?>
    </div>
</div>


<br /><br /><br /><br />