<?php
    include_once('../templates/common.php');
    draw_header();
    draw_nav_bar();
?>

<section class="page profile">
    <div class="card" style="width: 20em;">
        <div class="container">
            <div class="row align-items-start">
                <div class="col">
                    <h5 class="card-title"> <i class="fas fa-check"></i> x/johndoe</h5> 
                </div>
                <div class="col">                
                    <a href="#" class="btn btn-primary">Follow</a>
                </div>
            </div>  
            <div class="row align-items-center">
                <div class="col">
                    <img src="../img/user.png" class="card-img-top" alt="user image" style="width: 10rem;">
                </div>
                <div class="col">                
                    <p class="card-text">
                        <p>Reputation</p>
                        <h2>254,789</h4>
                    </p>    
                </div>
            </div>           
        </div>          
    </div>
    <div class="card" style="width: 40rem;">
        <div class="card-body">
            <h5 class="card-title">Description</h5>
            <p class="card-text">My name is John and I'm a partner example user for this framewhire. My posts are really about any trending topic.</p>
        </div>
    </div>
    <nav>

    <ul class="nav nav-pills mb-3 text-white bg-light-dark" id="pills-tab" role="tablist">
        <li class="nav-item " role="presentation">
            <button class="nav-link active text-white" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending" aria-selected="true">Home</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-white" id="pills-top-tab" data-bs-toggle="pill" data-bs-target="#pills-top" type="button" role="tab" aria-controls="pills-top" aria-selected="false">Top</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-white" id="pills-new-tab" data-bs-toggle="pill" data-bs-target="#pills-new" type="button" role="tab" aria-controls="pills-new" aria-selected="false">New</button>
        </li>    
        <li class="nav-item" role="presentation">
            <button class="nav-link text-white" id="pills-following-tab" data-bs-toggle="pill" data-bs-target="#pills-following" type="button" role="tab" aria-controls="pills-following" aria-selected="false">Following</button>
        </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-trending" role="tabpanel" aria-labelledby="pills-trending-tab">
            <?php
            include '../templates/post.php';
            ?>
        </div>
        <div class="tab-pane fade" id="pills-top" role="tabpanel" aria-labelledby="pills-top-tab">
            <?php
            include '../templates/post.php';
            ?>
        </div>
        <div class="tab-pane fade" id="pills-new" role="tabpanel" aria-labelledby="pills-new-tab">
            <?php
            include '../templates/post.php';
            ?>
        </div>
        <div class="tab-pane fade" id="pills-following" role="tabpanel" aria-labelledby="pills-following-tab">

        </div>
    </div>
</section>
