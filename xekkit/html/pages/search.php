<?php
include_once('../templates/common.php');
include_once('../templates/post.php');
include_once('../templates/search.php');
include_once('../templates/users.php');



draw_header();
draw_nav_bar();

?>

<div class="container-xl">
    <h3 class="text-white py-3 border-bottom">Results for: music</h3>
    <div class="accordion accordion-flush py-3">
        <div class="accordion-item">
            <h2 class="accordion-header" id="filterSearch">
                <button class="accordion-button collapsed text-white bg-light-dark" type="button" data-bs-toggle="collapse" data-bs-target="#filterSearchCollapse" aria-expanded="true" aria-controls="filterSearchCollapse">
                    Filter search
                </button>
            </h2>
            <div id="filterSearchCollapse" class="accordion-collapse collapse" aria-labelledby="filterSearch" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <?draw_filter_search_options();?>
                </div>
            </div>
        </div>
    </div>

  
    <ul class="nav nav-pills mb-3 text-white bg-light-dark" id="search-tab" role="tablist">
        <li class="nav-item " role="presentation">
            <button class="nav-link active text-white" id="search-news-tab" data-bs-toggle="pill" data-bs-target="#search-news" type="button" role="tab" aria-controls="search-news" aria-selected="true">News</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-white" id="search-users-tab" data-bs-toggle="pill" data-bs-target="#search-users" type="button" role="tab" aria-controls="search-users" aria-selected="false">Users</button>
    </ul>
    <div class="tab-content"> 
        <!-- News tab -->
        <div class="tab-pane fade show active" id="search-news" role="tabpanel" aria-labelledby="search-news-tab">
            <?php
            draw_posts();
            ?>
        </div>

        <!-- Users tab -->
        <div class="tab-pane fade" id="search-users" role="tabpanel" aria-labelledby="search-users-tab">
            <?php
            draw_users();
            ?>
            
            
        </div>
    </div>
</div>

<?php
draw_footer();
?>

<script defer src="../js/search.js"></script>
