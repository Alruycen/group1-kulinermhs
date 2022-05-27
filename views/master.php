<?php
if (!isset($_GET['page'])) {
    $page = 'home';
} else {
    $page = $_GET['page'];
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link href="assets/style.css" rel="stylesheet" />
    <title>Kuliner Mahasiswa - <?= $page; ?></title>
</head>

<body>
    <!-- 
        #e5e8e8 white
        #8d9797 pewter
        #4e545c gunmental gray
        #000401 jetblack
        -->
    <style>
        * {
            box-sizing: border-box;
        }

        [class *="col-"] {
            width: 100%;
            
        }

        @media only screen and (min-width: 600px) {
            /* For tablets: */
            .col-s-1 {width: 8.33%;}
            .col-s-2 {width: 16.66%;}
            .col-s-3 {width: 25%;}
            .col-s-4 {width: 33.33%;}
            .col-s-5 {width: 41.66%;}
            .col-s-6 {width: 50%;}
            .col-s-7 {width: 58.33%;}
            .col-s-8 {width: 66.66%;}
            .col-s-9 {width: 75%;}
            .col-s-10 {width: 83.33%;}
            .col-s-11 {width: 91.66%;}
            .col-s-12 {width: 100%;}
        }

        @media only screen and (min-width: 992px) {
            /* For desktop: */
            .col-1 {width: 8.33%;}
            .col-2 {width: 16.66%;}
            .col-3 {width: 25%;}
            .col-4 {width: 33.33%;}
            .col-5 {width: 41.66%;}
            .col-6 {width: 50%;}
            .col-7 {width: 58.33%;}
            .col-8 {width: 66.66%;}
            .col-9 {width: 75%;}
            .col-10 {width: 83.33%;}
            .col-11 {width: 91.66%;}
            .col-12 {width: 100%;}
        }

        body {
            background: #e5e8e8;
            padding-bottom: 10%;
        }

        img {
            object-fit: cover;
            image-rendering: -webkit-optimize-contrast;
        }

        .active {
            border-bottom: 3px solid #e5e8e8;
        }

        .nav-link:hover {
            border-bottom: 1px solid #e5e8e8;
        }

        .scrolling {
            overflow-y: scroll;
            overflow-x: clip;
        }
    </style>
    <main>
        <?php
        require 'views/' . $page . '.php';
        ?>
    </main>
    <footer>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-bottom bg-dark">
            <div class="container-fluid">
                <?php include 'process/activenavbar.php'; ?>
            </div>
        </nav>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace();
    </script>
</body>

</html>