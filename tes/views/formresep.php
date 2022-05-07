<form class="d-flex" action="index.php?page=resep&kategori=<?= $kategori = $_GET['kategori']; ?>" method="post">
    <span class="input-group-text" id="basic-addon1"><i data-feather="search"></i></span>
    <input class="form-control me-2" type="text" list="livesearch" id="search" name="search" placeholder="Makanan khas Tangerang" aria-label="Search" aria-describedby="basic-addon1" onkeyup="showHint(this.value)">
    <datalist id="livesearch"></datalist>
    <button class="btn btn-outline-success" type="hidden" name="submit-search"></button>
</form>
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
            xhttp.open("GET", "process/gethint.php?page=<?= $page = $_GET['page']; ?>&q="+str, true);
            xhttp.send();
        }
    }

</script>