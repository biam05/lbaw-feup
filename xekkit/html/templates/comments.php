<?php
function draw_comment($level, $author, $partner, $date, $comment, $votes, $replies){?>
<div class="row mb-3">
    <?php for($i=0; $i<$level; $i++) {?>
        <div class="col-auto ps-2"></div>
    <?php }?>
    <div class="col">
        <div class="d-flex">
            <img src="../img/user.png" class="rounded-circle" alt="..." width="20" height="20">
            <p class="text-white text-muted px-2 m-0"><small>
                <a class="col-auto text-muted pe-2" href="../pages/profile.php">
                    <? if($partner){?>
                        <i class="fas fa-check"></i>
                    <?}?>
                    <?= $author?></a><?= $date?></small>
                <button class="clickable-big text-muted ps-2"><i class="fas fa-exclamation-triangle"></i></button>
            </p> 
        </div> 
        <div class="row">
            <p class="text-white m-0"><?= $comment?></p>   
            <div class="row align-items-center text-muted">
                <div class="col-auto d-flex flex-column pe-1">
                    <button class="clickable-big">
                        <i class="fas fa-angle-up text-white"></i>
                    </button>
                    <button class="clickable-big">
                        <i class="fas fa-angle-down text-white"></i>
                    </button>
                </div>
                <span class="col-auto ps-0"><?= $votes?></span>
                <button class="col-auto clickable text-muted" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-reply text-white"></i> <?= $replies?></button>
            </div>  
        </div>                          
    </div>
</div>
<?php
}


function draw_comments(/* $comments */){ ?>



<div class="container-xl mb-3 p-3 bg-light-dark">
    <div class="form-floating">
        <h3 class="text-white">Leave a Comment here</h3>
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" width="100%"></textarea>
        <div class="col text-end mt-3">
            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
        </div>
    </div>
</div>
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
