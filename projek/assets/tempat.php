<title>Tempat</title>
<style>
    .img-fluid {
        width:100%;
        margin-bottom: 5%;
        height:10rem;
        object-fit:cover;
    }
    body {
        padding:2.5% 5% 0 5%;
        background:#777;
    }
    .list-group{
        position: sticky;
        top: 1%;
    }
    .col-sm-5 {
        margin-right:7.6%;
        max-height:16rem;
        overflow-y:scroll;
    }
    .col-sm-4 {
        max-height:16rem;
        overflow-y:scroll;
    }
    .dropdown-header {
        margin-bottom:5%;
    }
    .active {
        border-bottom: 3px solid #fff;
    }
    .nav-link:hover {
        border-bottom: 1px solid #fff;
    }
</style>
<body data-bs-spy="scroll" data-bs-target="#myScrollspy">
    <img class="img-fluid" src="../images/sate-bandeng.jpg" alt="slide1">
    <div class="row">
        <div class="col-sm-2 bg-info" id="myScrollspy">
            <btn class="btn d-block bg-white">Pilih</btn>
            <div class="list-group">
                <a class="list-group-item list-group-item-action active" href="#section1">Pasar Malam</a>
                <a class="list-group-item list-group-item-action" href="#section2">Kafe</a>
                <a class="list-group-item list-group-item-action" href="#section3">Restoran</a>
            </div>
        </div>
        <div class="col-sm-5 bg-info">
            <div class="card">
                <div class="card-body">
                    <div id="section1">
		                <div id="section1">
                        </div>
		                <div id="section2">
                        </div>
		                <div id="section3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4 bg-black">
            <?php
                require 'formsearch.php';
            ?>
            <h6 class="bg-white">Rating dan Ulasan</h5>
        </div>
    </div>
</body>
<!--<div class="col-sm-6">
            <div class="row row-cols-2">
                <div class="col-md-4" id="myScrollspy">
                    <btn class="btn d-block bg-white">Pilih</btn>
                    <div class="list-group">
                        <a class="list-group-item list-group-item-action active" href="#section1">Pasar Malam</a>
                        <a class="list-group-item list-group-item-action" href="#section2">Kafe</a>
                        <a class="list-group-item list-group-item-action" href="#section3">Restoran</a>
                    </div>
                </div>
                <div class="col-md-8 bg-info">
                    <div class="card">
                        <div class="card-body">
                            <div id="section1">
				                <div id="section1">
                                </div>
			                    <div id="section2">
                                </div>
			                    <div id="section3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
