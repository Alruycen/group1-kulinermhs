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
        background: #4e545c;
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
                    <a href="index.php?page=resep&kategori=minuman" class="btn-outline-dark stretched-link p-3"><h4 class="my-0 fw-normal">Resep</h4></a>
                    <img class="card-img-top">
                </div>
            </div>
            <div class="col-6 col-s-12">
                <div class="card">
                    <a href="index.php?page=artikel&kategori=minuman" class="btn-outline-dark p-3 stretched-link"><h4 class="my-0 fw-normal">Minuman viral</h4></a>
                    <img class="card-img-top">
                </div>
            </div>
        </div>
        <div class="row row-cols-1 g-4">
            <div class="col-4 col-s-12">
                <div class="card">
                    <a href="index.php?page=artikel&kategori=minuman" class="btn-outline-dark p-3 stretched-link"><h4 class="my-0 fw-normal">Minuman khas</h4></a>
                    <img class="card-img-top">
                </div>
            </div>
            <div class="col-4 col-s-12">
                <div class="card">
                    <a href="index.php?page=rentangharga&kategori=minuman" class="btn-outline-dark p-3 stretched-link"><h4 class="my-0 fw-normal">Rentang harga</h4></a>
                    <img class="card-img-top">
                </div>
            </div>
            <div class="col-4 col-s-12">
                <div class="card">
                    <a href="index.php?page=rentangharga&kategori=minuman" class="btn-outline-dark p-3 stretched-link"><h4 class="my-0 fw-normal">Rating & Review</h4></a>
                    <img class="card-img-top">
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