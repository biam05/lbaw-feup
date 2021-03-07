<?php
include_once('../templates/common.php');
include_once('../templates/post.php');
draw_header();
draw_nav_bar();
?>

<div class="search container">
    <aside class="bd-aside text-muted text-white align-self-start mb-3 mb-xl-5 px-2">
        <h2 class="text-white h3 pt-4 pb-3 mb-4 border-bottom">Results for: music</h2>
        <nav class="small" id="toc">
            <ul class="list-unstyled">
                <li class="my-2">
                <h6 class="text-white">Sort by: </h6>
                <select class="form-select border-0 text-white" aria-label="Sorting Options">
                    <option selected>Top</option>
                    <option value="1">New</option>
                    <option value="2">Trending</option>
                </select>
                </li>
                <li class="my-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label text-white" for="flexCheckDefault">
                            Only Partners Posts
                        </label>
                    </div>
                </li>
                <li class="my-2">
                    <p class="text-white h5 pt-4 pb-3">Filter by categories:</p>
                    <input autocomplete="off" type="text" id="filterInput" onkeyup="filterInList()" placeholder="Search for categories.." title="Type in a name">
                    <ul id="listOption">
                        <?php for($i=0;$i<10;){ ?>
                        <li><a href="javascript:void(0)">Item <?= ++$i ?><input type="checkbox" name="filter-category" value="Item <?= ++$i ?>"></a></li>
                        <?php } ?>
                    </ul>
                    <a class="text-white clear-all mt-2" href="javascript:void(0)" onclick="clearAll()">Clear All</a>
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

<script defer src="../js/search.js"></script>
