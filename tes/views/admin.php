<?php
session_start();
if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") : ?>
    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Catatan Pengembang</button>

    <div class="offcanvas offcanvas-top" data-bs-scroll="true" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasTopLabel">Work In Progress</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            Di sini anda bisa mengubah data sesuai kebutuhan.
        </div>
    </div>
<?php endif; ?>