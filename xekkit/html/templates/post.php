<?php

function draw_post($title, $description, $author, $date, $tags, $image, $comments, $votes, $is_mine = false)
{
    ?>
    
    <div class="card mb-3 text-white bg-light-dark">
        <div class="card-body">
            <a href="../pages/news.php" class="text-white text-decoration-none">
                <h5 class="card-title" style="display:inline-block"><?= $title ?></h5></a>
            <a class="card-author clickable text-white text-decoration-none" href="../pages/profile.php"><?= $author ?></a>
            <a href="../pages/news.php" class="text-white text-decoration-none">
                <?php if ($is_mine) { ?>
                    <button type="button" class="card-report clickable-big text-white preventer" data-bs-toggle="modal" data-bs-target="#deletePostModal">
                        <i class="fas fa-times"></i>
                    </button>
                <?php } else { ?>
                    <button type="button" id="toastbtn" class="card-report clickable-big text-white preventer" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <i class="fas fa-exclamation-triangle"></i>
                    </button>
                <?php } ?>
                
                <span class="card-date text-white"><?= $date ?></span>
                
                <img src="<?= $image ?>" class="card-img-top" alt="..." draggable="false">
                <p class="card-text">
                    <?php
                    echo substr($description, 0, 150);
                    if (strlen($description) > 150) {
                        echo '...';
                    }
                    ?>
                </p>
            </a>
        </div>
        <div class="card-footer text-muted" style="display:flex;">
            
            <footer>
                <div class="card-tags">
                    
                    
                    <?php
                    foreach ($tags as $tag) {
                        ?>
                        <button class="clickable text-white">#<?= $tag ?></button>
                        <?php
                    }
                    ?>
                </div>
                <div class="votes">
                    <button class="clickable-big">
                        <i class="fas fa-angle-up text-white"></i>
                    </button>
                    <button class="clickable-big">
                        <i class="fas fa-angle-down text-white "></i>
                    </button>
                </div>
                <span><?= $votes ?></span>
                <button class="comments clickable"><i class="fas fa-comment"></i> <?= $comments ?></button>
            
            </footer>
        </div>
    </div>
    
    <?php
    draw_report_modal();
    draw_delete_post();
}

function draw_posts(/* $posts */)
{
    ?>
    
    <div class="container-xl">
        
        <?php
        draw_post("Daft Punk", "Daft Punk Break Up Announcement image", "x/johndoe", "Jan 23, 2021",
            ["music", "celebreties"], "../img/daft_punk.jpeg", "58", "7873", false);
        draw_post("Daft Punk",
            "This is a test to see the size of a description needed to trigger the reticências. So far this has 100 characteres. Is it good enough? Short maybe? Long maybe? One could never know writing text on the text editor, so I continue to write until I can consider this a big Post. Maybe I should just paste some Lorem Ipsum shit, but I don't really want to, this is more genuine",
            "x/johndoe", "Jan 23, 2021", ["music", "celebreties"], "../img/daft_punk.jpeg", "58", "7873", false);
        ?>
    </div>
    
    
    <?php
}

?>

<?php function draw_report_modal()
{
    ?>
    <div class="modal fade text-white" id="reportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog text-white">
            <div class="modal-content bg-light-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="Report-modal-label">Report form</h5>
                    <button type="button" class="btn-close btn-close-white " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="mb-3">
                        <label for="Report-modal-description" class="form-label">Reason to Report</label>
                        <span id="Report-modal-description" class="input form-control" role="textbox" rows="3" contenteditable aria-multiline="true">
                        </span>
                    </div>
                    
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            
            </div>
        </div>
    </div>
    
    <?php
}

?>

<?php function draw_delete_post()
{
    ?>
    <div class="modal fade text-white" id="deletePostModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog text-white">
            <div class="modal-content bg-light-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title text-white" id="Report-modal-label">Delete Posts</h5>
                    <button type="button" class="btn-close btn-close-white " data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="Report-modal-description" class="form-label">Confim by typing your password</label>
                        <span id="Report-modal-description" class="input form-control" role="textbox" rows="3" contenteditable aria-multiline="true">
                        </span>
                    </div>
                    
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            
            </div>
        </div>
    </div>
    
    <?php
}

?>
