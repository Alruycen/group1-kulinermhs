<form class="d-flex" action="../views/resep.php?submenu=resep" method="post">
    <input class="form-control me-2" type="text" id="search" name="search" placeholder="Makanan khas Tangerang" aria-label="Search" onkeyup="showHint(this.value)">
    <button class="btn btn-outline-success" type="submit" name="submit-search">Cari</button>
</form>
<select id="livesearch" onc hange="chooseHint(this)"></select>
<script>
    function showHint(str) {
        var xhttp;
        if(str.length == 0) {
            document.getElementById("livesearch").InnerHTML = "";
            return;
        }
        else {
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("livesearch").innerHTML = xhttp.responseText;
                    document.getElementById("livesearch").style.border="1px solid";
                }
            };
            xhttp.open("GET", "../process/gethint.php?submenu=<?= $submenu = $_GET['submenu']; ?>&q="+str, true);
            xhttp.send();
        }
    }
    function chooseHint(data) {
        document.getElementById("search").value = data.value;
    }
</script>
