<form class="d-flex" action="index.php" method="get" >
    <input type="hidden" name="page" value="rentangharga">
    <input type="hidden" name="kategori" value="<?= $kategori = $_GET['kategori']; ?>">
    <select class="form-select w-20" name="harga">
        <option selected value="" label="Pilih Terserah"/>
        <option value="1" label="Harga < Rp 50.000" />
        <option value="2" label="Harga <= Rp 100.000" />
        <option value="3" label="Harga > Rp 100.000" />
    </select>
    <input class="form-control me-2" type="text" name="search" placeholder="Makanan khas Tangerang" aria-label="Search">
    <button class="btn btn-outline-success" type="submit"><i data-feather="search"></i></button>
</form>