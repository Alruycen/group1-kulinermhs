<?php
    include 'function.php';
    
    $sqlterbaru = "SELECT id, nama, foto, id_kategori FROM artikel WHERE id_kategori = ? AND tanggalditulis >= (SELECT MAX(tanggalditulis) FROM artikel WHERE id_kategori = ?)";
    
    $sqldiminati = "SELECT a.id AS id, merek, a.foto AS foto_rentangharga, b.foto AS foto, b.id_kategori AS id_kategori FROM rentangharga a, artikel b WHERE a.id_artikel = b.id AND a.id IN (SELECT id_artikel FROM ratingulasan GROUP BY id_artikel HAVING AVG(rating) >= (SELECT AVG(rating) FROM ratingulasan c, rentangharga a, artikel b WHERE c.id_artikel = a.id AND a.id_artikel = b.id AND b.id_kategori = ?)) AND b.id_kategori = ?";

    $sqlterbarudef = "SELECT id, nama, foto, id_kategori FROM artikel WHERE tanggalditulis >= (SELECT MAX(tanggalditulis) FROM artikel)";

    $sqldiminatidef = "SELECT a.id AS id, merek, a.foto AS foto_rentangharga, b.foto AS foto, b.id_kategori AS id_kategori FROM rentangharga a, artikel b WHERE a.id_artikel = b.id AND a.id IN (SELECT id_artikel FROM ratingulasan GROUP BY id_artikel HAVING AVG(rating) >= (SELECT AVG(rating) FROM ratingulasan c, rentangharga a, artikel b WHERE c.id_artikel = a.id AND a.id_artikel = b.id))";
?>