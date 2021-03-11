<?php
    include_once('../templates/common.php');    
    include_once('../templates/post.php'); 
    draw_header();
    draw_nav_bar();
?>

<section class="container page profile">
    <section class="usercard">
        <div class="card" style="width: 20em;">
            <div class="container">
                <div class="row align-items-start">
                    <div class="col">
                        <h5 class="card-title"> <i class="fas fa-check"></i> x/johndoe</h5> 
                    </div>
                    <div class="col">                
                        <a href="#" class="btn btn-primary">Follow</a>
                    </div>
                    <div class="col">                
                    <button type="button" class="profile-report clickable-big text-white" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="fas fa-exclamation-triangle"></i>
                        </button>
                            <?php draw_report_modal()?>      

                    </div>
                </div>  
                <div class="row align-items-center">
                    <div class="col">
                        <img src="../img/user.png" class="card-img-top" alt="user image" style="width: 10rem;">
                    </div>
                    <div class="col">                
                        <div class="card-text">
                            <p>Reputation</p>
                            <h2>254,789</h4>
                        </p>    
                    </div>
                </div>           
            </div>          
        </div>
        <div class="card" style="width: 30em;">
            <div class="card-body">
                <h5 class="card-title">Description</h5>
                <p class="card-text">My name is John and I'm a partner example user for this framewhire. My posts are really about any trending topic.</p>
            </div>
        </div>
    </section>
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
                draw_posts();
            ?>
        </div>
        <div class="tab-pane fade" id="pills-top" role="tabpanel" aria-labelledby="pills-top-tab">
            <?php
                draw_posts();
            ?>
        </div>
        <div class="tab-pane fade" id="pills-new" role="tabpanel" aria-labelledby="pills-new-tab">
            <?php
                draw_posts();
            ?>
        </div>
        <div class="tab-pane fade" id="pills-following" role="tabpanel" aria-labelledby="pills-following-tab">
            <div class="container d-flex alignt-items-center text-center">    
                <div class="row">
                    <div class="col-sm">
                        <div class="card align-items-center text-white bg-light-dark" style="width: 18rem;">
                            <img src="../img/user.png" class="card-img-top" alt="user image" style="width: 10rem;">
                            <div class="card-body"> 
                                <button class="card-title clickable text-white">x/someone</button>              
                                <div class="card-text">
                                    <p>Reputation</p>
                                    <h2>254,789</h4>
                                </div>                   
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">   
                        <div class="card align-items-center text-white bg-light-dark" style="width: 18rem;">
                            <img src="../img/user.png" class="card-img-top" alt="user image" style="width: 10rem;">
                            <div class="card-body"> 
                                <button class="card-title clickable text-white">x/someone</button>              
                                <div class="card-text">
                                    <p>Reputation</p>
                                    <h2>254,789</h4>
                                </div>                   
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card align-items-center text-white bg-light-dark" style="width: 18rem;">
                            <img src="../img/user.png" class="card-img-top" alt="user image" style="width: 10rem;">
                            <div class="card-body"> 
                                <button class="card-title clickable text-white">x/someone</button>              
                                <div class="card-text">
                                    <p>Reputation</p>
                                    <h2>254,789</h4>
                                </div>                   
                            </div>
                        </div>

                    </div>
                </div>
            </div>            
        </div>
    </div>
</section>

<?php  
    draw_footer();
?>
