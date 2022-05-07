<form class="d-flex" action="index.php?page=rentangharga&kategori=<?= $kategori = $_GET['kategori']; ?>" method="post" >
    <select class="form-select w-20" name="harga">
        <option selected value="">...</option>
        <option value="1">Harga < Rp 50.000</option>
        <option value="2">Harga <= Rp 100.000</option>
        <option value="3">Harga > Rp 100.000</option>
    </select>
    <input class="form-control me-2" type="text" name="search" placeholder="Makanan khas Tangerang" aria-label="Search">
    <input type="hidden" name="page" value="<?= $kategori; ?>">
    <button class="btn btn-outline-success" type="submit" name="submit-search"><i data-feather="search"></i></button>
</form>