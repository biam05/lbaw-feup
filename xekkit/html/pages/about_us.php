<?php
include_once('../templates/common.php');
draw_header();
draw_nav_bar();
?>

<div id="carouselExampleIndicators" class="container-xl carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="containerfeupimg carousel-item active">
            <img src="../img/feup.jpg" class="feupimg d-block w-100" alt="...">
            <div class="carousel-caption">
                <h1>How it Started</h1>
            </div>
        </div>
        <div class="containerfeupimg carousel-item">
            <img src="../img/lbaw.jpg" class="feupimg d-block w-100" alt="...">
            <div class="carousel-caption">
                <h1>How it Started</h1>
            </div>
        </div>
        <div class="containerfeupimg carousel-item">
            <img src="../img/covid.jpg" class="feupimg d-block w-100" alt="...">
            <div class="carousel-caption">
                <h1>How it Started</h1>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container-xl pt-3">   
    
    <h1 class="text-white text-center pt-4 pb-4">Our Team</h1>
    <div class="container">
        <div class="row text-white pt-4">
            <div class="col-lg-3 text-center">
                <img class="rounded-circle" src="../img/user.png" width="140" height="140">
                <h2>Beatriz Mendes</h2>
                <p>up201806551</p>
            </div>
            <div class="col-lg-3 text-center">
                <img class="rounded-circle" src="../img/user.png" width="140" height="140">
                <h2>Guilherme Calassi</h2>
                <p>up201800157</p>
            </div>
            <div class="col-lg-3 text-center">
                <img class="rounded-circle" src="../img/user.png" width="140" height="140">
                <h2>André Assunção</h2>
                <p>up201806140</p>
            </div>
            <div class="col-lg-3 text-center">
                <img class="rounded-circle" src="../img/user.png" width="140" height="140">
                <h2>Ricardo Cardoso</h2>
                <p>up201604686</p>
            </div>
        </div>
    </div>  
    <hr class="featurette-divider text-white mt-5 mb-5">  
    <div class="row featurette">
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
