<form class="d-flex" action="index.php" method="get">
    <input type="hidden" name="page" value="artikel">
    <select name="kategori" class="form-control">
        <option value="" label="Pilih Terserah"/>
        <option value="makanan" label="Makanan" />
        <option value="minuman" label="Minuman" />
        <option value="tempat" label="Tempat" />
        <option value="oleholeh" label="Oleh-Oleh" />
    </select>
    <input class="form-control me-2" type="text" id="search" name="search" placeholder="Makanan khas Tangerang" aria-label="Search">
    <button class="btn btn-outline-success" type="submit"></button>
</form>