<?php
include_once('../templates/common.php');
draw_header();

include_once('../templates/post.php');
include_once('../templates/users.php');

$logged = true;

draw_nav_bar($logged);

$is_myprofile = true;
$partner = true;

?>

<section class="container-xl page profile">
    <section>
        
        <div class="row justify-content-start">
            <h5 class="col-auto text-white"><?php if($partner){ ?><i class="fas fa-check"></i><? } ?> x/johndoe</h5>
            <?php if (!$is_myprofile) { ?>
                <button type="button" class="col-auto clickable-big text-white" data-bs-toggle="modal" data-bs-target="#reportModal">
                    <i class="fas fa-exclamation-triangle"></i>
                </button>
            <?php } ?>
        </div>

        <div class="row justify-content-start text-white align-items-end mb-3">
            <div class="col-auto">
                <img src="../img/user.png" alt="user image" width="200" height="200">
            </div>
            <div class="col-auto">
                <h6 class="text-muted">Reputation</h6>
                <h2>254,789</h2>


                <?php if ($logged) { ?>
                    <?php if ($is_myprofile) { ?>
                        <a href="edit_profile.php" class="col align-self-end btn btn-primary">Edit Profile</a>
                    <?php } else { ?>
                        <a href="#" class="col-auto align-self-end btn btn-primary">Follow</a>
                    <?php }
                }?>
                
                
                
            </div>
        </div>
        <p class="lead text-white mb-3">My name is John and I'm a partner example user for this framewhire. My posts are really about any trending topic.</p>
        
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
                draw_posts($logged);
                ?>
            </div>
            <div class="tab-pane fade" id="pills-top" role="tabpanel" aria-labelledby="pills-top-tab">
                <?php
                draw_posts($logged);
                ?>
            </div>
            <div class="tab-pane fade" id="pills-new" role="tabpanel" aria-labelledby="pills-new-tab">
                <?php
                draw_posts($logged);
                ?>
            </div>
            <div class="tab-pane fade" id="pills-following" role="tabpanel" aria-labelledby="pills-following-tab">
                <?php
                draw_users();
                ?>
            </div>
        </div>
    </nav>
</section>

<?php
draw_footer();
?>
