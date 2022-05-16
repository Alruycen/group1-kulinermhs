<style>
    .col-m-8 {
        padding-left: 5%;
        padding-top: 5%;
        max-width: 66%;
    }
    .card-img-top {
        height: 12rem;
    }

    .col-m-4 {
        padding-top: 5%;
        padding-left: 10%;
        max-width: 33%;
    }

    .col-sm-6 {
        padding: 0 5% 5% 0;
    }
</style>

<div class="row">
    <div class="col-m-8">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Resep</h4>
                    </div>
                    <a href="index.php?page=resep&kategori=minuman" class="stretched-link"><img class="card-img-top"></a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Minuman viral</h4>
                    </div>
                    <a href="index.php?page=artikel&kategori=minuman" class="stretched-link"><img class="card-img-top"></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Minuman khas</h4>
                    </div>
                    <a href="index.php?page=artikel&kategori=minuman" class="stretched-link"><img class="card-img-top"></a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Rentang harga</h4>
                    </div>
                    <a href="index.php?page=rentangharga&kategori=minuman" class="stretched-link"><img class="card-img-top"></a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Rating & Review</h4>
                    </div>
                    <a href="index.php?page=rentangharga&kategori=minuman" class="stretched-link"><img class="card-img-top"></a>
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