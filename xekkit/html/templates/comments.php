<?php
function draw_comment($level, $author, $partner, $date, $comment, $votes, $replies){?>
<div class="row mb-3">
    <?php for($i=0; $i<$level; $i++) {?>
        <div class="col-auto ps-4"></div>
    <?php }?>
    <div class="col">
        <div class="d-flex">
            <img src="../img/user.png" class="rounded-circle" alt="..." width="30" height="30">
            <p class="text-white text-muted px-2 m-0"><small>
                <a class="col-auto text-muted pe-2" href="../pages/profile.php">
                    <? if($partner){?>
                        <i class="fas fa-check"></i>
                    <?}?>
                    <?= $author?></a><?= $date?></small>
                <button class="clickable-big text-muted ps-2"><i class="fas fa-exclamation-triangle"></i></button>
            </p> 
        </div> 
        <div class="row ms-4">
            <p class="text-white m-0 pb-1"><?= $comment?></p>   
            <div class="row align-items-center text-muted">
                <div class="col-auto d-flex flex-row pe-1 align-items-center">
                    <button class="clickable-big me-1">
                        <i class="fas fa-angle-up text-white"></i>
                    </button>
                    <span class="col-auto ps-0"><?= $votes?></span>
                    <button class="clickable-big ms-1">
                        <i class="fas fa-angle-down text-white"></i>
                    </button>
                </div>
                <button class="col-auto clickable text-muted" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-reply text-white"></i> <?= $replies?></button>
            </div>  
        </div>                          
    </div>
</div>
<?php
}


function draw_comments(/* $comments */){ ?>


<form action="" class="container-xl mb-3 p-3 bg-light-dark"> 
    <div class="mb-3">
        <label for="postComment" class="form-label text-white fs-5">Leave a comment here:</label>
        <textarea class="form-control" id="postComment" rows="3"></textarea>
        
    </div>
    <div class="row pe-3">
        <button type="submit" class="col-auto btn btn-primary ms-auto">Send</button>
    </div>
</form>
<div class="container-xl p-3 bg-light-dark">

    <?php
        draw_comment(0, "x/uCanadaba3", false, "10 hours ago", "Sad moment in the music industry", 15, 1);
        draw_comment(1, "x/johndoe", true, "10 hours ago", "Agreed :(", 2, 0);    
    ?>
    <hr class="text-muted">  
    <?php
        draw_comment(0, "x/randomdude", false, "2 days ago", "Never really liked them tbh", 1, 0);
    ?>
    
</div>   

<?php
}
