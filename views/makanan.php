<style>
    .col-8 {
        padding-left: 5%;
        padding-top: 5%;
    }

    .col-4 {
        padding-top: 5%;
    }

    .col-6 {
        padding: 0 5% 5% 0;
    }
    form select {
        margin-right: 1%;
    }

    .card-img-top {
        height: 12rem;
        background: #6aabd2
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
                        <h4 class="my-0 fw-normal">Makanan khas</h4>
                    </div>
                    <a href="index.php?page=artikel&kategori=makanan" class="stretched-link"><img class="card-img-top"></a>
                </div>
            </div>
            <div class="col-6 col-s-12">
                <div class="card">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Rating & Review</h4>
                    </div>
                    <a href="index.php?page=rentangharga&kategori=makanan" class="stretched-link"><img class="card-img-top"></a>
                </div>
            </div>
            <div class="col-6 col-s-12">
                <div class="card">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Cari Restoran</h4>
                    </div>
                    <a href="index.php?page=tempat" class="stretched-link"><img class="card-img-top"></a>
                </div>
            </div>
            <div class="col-6 col-s-12">
                <div class="card">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Rentang Harga</h4>
                    </div>
                    <a href="index.php?page=rentangharga&kategori=makanan" class="stretched-link"><img class="card-img-top"></a>
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