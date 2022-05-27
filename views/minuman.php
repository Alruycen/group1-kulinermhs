<style>
    .col-8 {
        padding-left: 5%;
        padding-top: 5%;
    }

    .col-4 {
        padding-top: 5%;
    }

    .col-8 .col-6 {
        padding: 0 5% 5% 0;
    }

    .col-8 .col-4 {
        padding: 0 5% 5% 0;
    }

    .card-img-top {
        height: 12rem;
        background: #6aabd2;
    }
    form select {
        margin-right: 1%;
    }
    #sidebar img {
        max-height: 12rem;
    }
</style>

<div class="row">
    <div class="col-8 col-s-4">
        <div class="row row-cols-1 g-4">
            <div class="col-6 col-s-12">
                <div class="card">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Resep</h4>
                    </div>
                    <a href="index.php?page=resep&kategori=minuman" class="stretched-link"><img class="card-img-top"></a>
                </div>
            </div>
            <div class="col-6 col-s-12">
                <div class="card">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Minuman viral</h4>
                    </div>
                    <a href="index.php?page=artikel&kategori=minuman" class="stretched-link"><img class="card-img-top"></a>
                </div>
            </div>
        </div>
        <div class="row row-cols-1 g-4">
            <div class="col-4 col-s-12">
                <div class="card">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Minuman khas</h4>
                    </div>
                    <a href="index.php?page=artikel&kategori=minuman" class="stretched-link"><img class="card-img-top"></a>
                </div>
            </div>
            <div class="col-4 col-s-12">
                <div class="card">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Rentang harga</h4>
                    </div>
                    <a href="index.php?page=rentangharga&kategori=minuman" class="stretched-link"><img class="card-img-top"></a>
                </div>
            </div>
            <div class="col-4 col-s-12">
                <div class="card">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Rating & Review</h4>
                    </div>
                    <a href="index.php?page=rentangharga&kategori=minuman" class="stretched-link"><img class="card-img-top"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4 col-s-8">
        <?php
        include 'views/sidebar.php'; ?>
    </div>
</div>

<br /><br /><br /><br />