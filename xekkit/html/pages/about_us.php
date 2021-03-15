<?php
include_once('../templates/common.php');
draw_header();
draw_nav_bar();
?>

<div id="feupCarousel" class="container-xl carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="containerfeupimg carousel-item active" data-bs-interval="4000">
            <img src="../img/feup.jpg" class="feupimg d-block w-100" alt="...">
        </div>
        <div class="containerfeupimg carousel-item" data-bs-interval="4000">
            <img src="../img/lbaw.jpg" class="feupimg d-block w-100" alt="...">
        </div>
        <div class="containerfeupimg carousel-item" data-bs-interval="4000">
            <img src="../img/covid.jpg" class="feupimg d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#feupCarousel"  data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#feupCarousel"  data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container-xl pt-3">   
    
    <h1 class="text-white text-center py-4">Our Team</h1>
    
        <div class="row text-white pt-4">
            <div class="col-lg-3 col-sm-6 text-center">
                <img class="rounded-circle" src="../img/201806551.png" width="140" height="140">
                <h2>Beatriz Mendes</h2>
                <p class="text-muted">up201806551</p>
            </div>
            <div class="col-lg-3 col-sm-6 text-center">
                <img class="rounded-circle" src="../img/201800157.jpg" width="140" height="140">
                <h2>Guilherme Calassi</h2>
                <p class="text-muted">up201800157</p>
            </div>
            <div class="col-lg-3 col-sm-6 text-center">
                <img class="rounded-circle" src="../img/201806140.jpg" width="140" height="140">
                <h2>L. André Assunção</h2>
                <p class="text-muted">up201806140</p>
            </div>
            <div class="col-lg-3 col-sm-6 text-center">
                <img class="rounded-circle" src="../img/201604686.jpg" width="140" height="140">
                <h2>Ricardo Cardoso</h2>
                <p class="text-muted">up201604686</p>
            </div>
        </div>
     
    <hr class="text-white mt-5 mb-5">  
    <div class="row">
        <div class="col-md-9 order-md-2">
            <h2 class="featurette-heading text-white pt-5">Our Main Inspiration</h2>
            <p class="lead text-white">The majority of our website structure and concept (including the name, obviously)
                is based on the famous website <a class="text-decoration-none text-primary" href="https://www.reddit.com/">©reddit</a></p>
        </div>
            <div class="col-md-3 order-md-1">
            <img src="../img/reddit.jpg" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" alt="..." width = 400>
        </div>
    </div>
</div>

<?php
draw_footer();
?>
