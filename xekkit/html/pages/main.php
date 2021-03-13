<?php

include_once('../templates/common.php');
include_once('../templates/trending.php');
include_once('../templates/post.php');
include_once('../templates/new_post.php');

draw_header();
draw_nav_bar();
draw_trending();
draw_new_post(false); 
?>

<div class="container-xl">
    <div class="row hidden-md-down">
        <div class="col-12 col-lg-9">
            <?php draw_posts();?>
        </div>
        <div class="col-lg-3">
            <section class="container bg-light-dark text-white p-3">
                <h2 class="mb-4">Explore</h2>
                <h6 class="mb-2 clickable-small"><a href="search.php" class="text-decoration-none text-white">#music <span class="badge bg-secondary">1</span></a></h6>                
                <h6 class="mb-2">#celebrities <span class="badge bg-secondary">3</span></h6>
                <h6 class="mb-2">#world</h6>
            </section>
        </div>
    </div>
    <nav class="hidden-md-up">
        <ul class="nav nav-pills mb-3 text-white bg-light-dark" id="pills-tab" role="tablist">
            <li class="nav-item " role="presentation">
                <button class="nav-link active text-white" id="pills-trending-tab" data-bs-toggle="pill" data-bs-target="#pills-trending" type="button" role="tab" aria-controls="pills-trending" aria-selected="true">Home</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-white" id="pills-explore-tab" data-bs-toggle="pill" data-bs-target="#pills-explore" type="button" role="tab" aria-controls="pills-explore" aria-selected="false">Explore</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-trending" role="tabpanel" aria-labelledby="pills-trending-tab">
                <?php
                draw_posts();
                ?>
            </div>
            <div class="tab-pane fade" id="pills-explore" role="tabpanel" aria-labelledby="pills-explore-tab">
                <section class="container bg-light-dark text-white p-3">
                    <h2 class="mb-4">Explore</h2>
                    <h6 class="mb-2">#music <span class="badge bg-secondary">1</span></h6>                
                    <h6 class="mb-2">#celebrities <span class="badge bg-secondary">3</span></h6>
                    <h6 class="mb-2">#world</h6>
                </section>
            </div>
        </div>
    </nav>
</div>

<?php
draw_footer();
?>
