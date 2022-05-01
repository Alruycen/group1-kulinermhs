<form class="d-flex" action="../views/artikel.php?page=" method="post">
    <select class="form-select w-20" name="page">
        <option selected>...</option>
        <option value="1">Makanan</option>
        <option value="2">Minuman</option>
        <option value="3">Tempat</option>
        <option value="4">Oleh-Oleh</option>
    </select>
    <input class="form-control me-2" type="text" name="search" placeholder="Makanan khas Tangerang" aria-label="Search">
    <button class="btn btn-outline-success" type="submit" name="submit-search">Cari</button>
</form>
