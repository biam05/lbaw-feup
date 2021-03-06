<?php
include_once('../templates/common.php');
include_once('../templates/post.php');
draw_header();
draw_nav_bar();
?>

<div class="search container">
    <aside class="bd-aside text-muted text-white align-self-start mb-3 mb-xl-5 px-2">
        <h2 class="text-white  h3 pt-4 pb-3 mb-4 border-bottom">Results for: music</h2>
        <nav class="small" id="toc">
            <ul class="list-unstyled">
                <li class="my-2">
                    <div class="dropdown">
                        <h6 class="text-white">Sort by:
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Top
                            </button>
                        </h6>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Recent</a>
                            <a class="dropdown-item" href="#">Trending</a>
                        </div>
                    </div>
                </li>
                <li class="my-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label text-white" for="flexCheckDefault">
                            Only Partners Posts
                        </label>
                    </div>
                </li>
            
            </ul>
        </nav>
    </aside>
    <div class="bd-cheatsheet container-fluid ">
        <section id="content">
            <nav>
                <ul class="nav nav-pills mb-3 text-white bg-light-dark" id="pills-tab" role="tablist">
                    <li class="nav-item " role="presentation">
                        <button class="nav-link active text-white" id="pills-news-tab" data-bs-toggle="pill" data-bs-target="#pills-news" type="button" role="tab" aria-controls="pillsnews" aria-selected="true">News</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-white" id="pills-users-tab" data-bs-toggle="pill" data-bs-target="#pills-users" type="button" role="tab" aria-controls="pills-users" aria-selected="false">Users</button>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-news" role="tabpanel" aria-labelledby="pills-news-tab">
                        <?php
                        draw_posts();
                        ?>
                    </div>
                    <div class="tab-pane fade" id="pills-users" role="tabpanel" aria-labelledby="pills-users-tab">
                        <div class="container d-flex alignt-items-center text-center">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="card align-items-center text-white bg-light-dark" style="width: 18rem;">
                                        <img src="../img/user.png" class="card-img-top" alt="user image" style="width: 10rem;">
                                        <div class="card-body">
                                            <button class="card-title clickable text-white">x/someone</button>
                                            <div class="card-text">
                                                <p>Reputation</p>
                                                <h2>254,789</h2>
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
                                                <h2>254,789</h2>
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
                                                <h2>254,789</h2>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</div>

<?php
draw_footer();
?>
