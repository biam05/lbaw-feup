@include('partials.navbar')
@extends('layouts.app')
@include('partials.trending')
@section('content')

<?php

draw_delete_post_modal();
draw_report_modal();
draw_posts(true);

function draw_post($title, $description, $author, $partner, $date, $tags, $image, $comments, $votes, $is_mine)
{
?>
    
<div class="card mb-3 text-white bg-light-dark">
    <div class="card-body">
        <div class="row card-title justify-content-between mb-2">
            <a href="../pages/news.php" class="col-auto text-white text-decoration-none">
                <h5 ><?= $title ?></h5>
            </a>
            
            <?php if ($is_mine) { ?>
                <div class="col-auto">
                    <button type="button" class="card-report clickable-big text-primary pe-2 preventer" data-bs-toggle="modal" data-bs-target="#todo">
                    <i class="fa fa-pencil" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i>
                    </button>
                    <button type="button" class="col-auto card-report clickable-big text-danger preventer" data-bs-toggle="modal" data-bs-target="#deletePostModal">
                        <i class="fas fa-trash" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i>
                    </button>
                </div>
            <?php 
            
            } else { ?>
                <button type="button" id="toastbtn" class="col-auto card-report clickable-big text-white preventer" data-bs-toggle="modal" data-bs-target="#reportModal">
                    <i class="fas fa-exclamation-triangle" data-bs-toggle="tooltip" data-bs-placement="top" title="Report"></i>
                </button>
            <?php 
            
            } ?>
                
                
                
            
        </div>
        
        <div class="row justify-content-between card-subtitle mb-2">
            <a class="col-auto clickable text-muted text-decoration-none" href="../pages/profile.php">
                <h6>
                <? if($partner){?>
                    <i class="fas fa-check"></i>
                <?}?>
                <?= $author ?>
                </h6>
            </a>
            <h6 class="col-auto text-muted"><?= $date ?></h6>
        </div>

        <img src="<?= $image ?>" class="card-img-top" alt="..." draggable="false">
        <p class="card-text text-truncate mt-2">
            <?= $description ?>
        </p>
        
        
    </div>
    <footer class="card-footer text-muted">
        <div class="row">
            <?php
            foreach ($tags as $tag) {
                ?>
                <button class="col-auto clickable text-white px-1">#<?= $tag ?></button>
                <?php
            }
            ?>
        </div>
        <div class="row align-items-center">
            <div class="col-auto d-flex flex-column pe-1">
                <button class="clickable-big">
                    <i class="fas fa-angle-up text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Upvote"></i>
                </button>
                <button class="clickable-big">
                    <i class="fas fa-angle-down text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Downvote"></i>
                </button>
            </div>
            <span class="col-auto ps-1 text-white"><?= $votes ?></span>
            <button class="col-auto clickable text-white">
                <i class="fas fa-comment text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Comments"></i> <?= $comments ?>
            </button>
        </div>
    </footer>
</div>
    
<?php
}

function draw_posts($logged)
{
?>

<div class="container-xl">
    
    <?php
    draw_post("Billie Eilish won the coveted Record of the Year at Sunday's Grammy Awards", 
    "The 19-year-old singer felt \"embarrassed\" to accept the night's biggest honour for 'Everything I Wanted' because she was thought Megan Thee Stallion \"deserved\" it more for 'Savage', her collaboration with Beyonce.", "x/johndoe", true, "1 hour ago",
        ["pop", "music"], "../img/billieeilish.jpg", "2", "7873", $logged);
    draw_post("Daft Punk",
        "Daft Punk Break Up Announcement image",
        "x/johndoe", true, "Jan 23, 2021", ["music", "celebrities"], "../img/daft_punk.jpeg", "58", "7873", $logged);
    ?>
</div>

<?php
}

function draw_delete_post_modal(){?>
<div class="modal fade text-white" id="deletePostModal" tabindex="-1" aria-labelledby="deletePost-modal-label" aria-hidden="true">
    <div class="modal-dialog text-white">
        <div class="modal-content bg-light-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="deletePost-modal-label">Delete Post</h5>
                <button type="button" class="btn-close btn-close-white " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="deletePost-modal-description" class="form-label">Confim by typing your password</label>
                    <span id="deletePost-modal-description" class="input form-control" role="textbox" rows="3" contenteditable aria-multiline="true">
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

function draw_report_modal(){?>
<div class="modal fade text-white" id="reportModal" tabindex="-1" aria-labelledby="Report-modal-label" aria-hidden="true">
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

@endsection