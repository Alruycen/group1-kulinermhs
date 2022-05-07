<?php
include 'function.php';
    $kategori = $_GET['page'];
    switch ($kategori) {
        case "makanan":
            $kategori = "1";
            break;
        case "minuman":
            $kategori = "2";
            break;
        case "tempat":
            $kategori = "3";
            break;
        case "oleholeh":
            $kategori = "4";
            break;
        default:
            $kategori = "";
            break;
    }

if (isset($_POST['submit-search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM artikel WHERE id_kategori = ? AND (nama LIKE ? OR deskripsi LIKE ? OR id IN (SELECT id_artikel FROM rentangharga WHERE merek LIKE ? OR lokasi LIKE ?))";
    $sql2 = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.id_kategori = ? AND (b.merek LIKE ? OR b.lokasi LIKE ? OR c.nama LIKE ? OR c.deskripsi LIKE ?)";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$kategori, "%$search%", "%$search%", "%$search%", "%$search%"]);
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute([$kategori, "%$search%", "%$search%", "%$search%", "%$search%"]);

} else {
    $sql = "SELECT * FROM artikel WHERE id_kategori = ?";
    $sql2 = "SELECT b.id AS id_rentangharga, b.merek AS merek, b.lokasi AS lokasi, b.hargaminimal AS hargaminimal, b.hargamaksimal AS hargamaksimal, c.foto AS foto FROM rentangharga b, artikel c WHERE b.id_artikel = c.id AND c.id_kategori = ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$kategori]);
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute([$kategori]);
}
?>