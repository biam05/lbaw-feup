<?php
include_once('../templates/common.php');
include_once('../templates/post.php');
include_once('../templates/comments.php');

draw_header();
draw_nav_bar();
?>

<div class="container-xl">
    <div class="row">
        <div class="col">
        <?php
            draw_post("Daft Punk", "Daft Punk Break Up Announcement image", "x/johndoe", "Jan 23, 2021", ["music", "celebreties"], "../img/daft_punk.jpeg", "58", "7873" );
            draw_comments();
        ?>
        </div>
    
        <div class="hidden-md-down col-lg-auto">
            <div class="card align-items-center text-center text-white bg-light-dark" style="width: 18rem;">
                <img src="../img/user.png" class="card-img-top" alt="user image" style="width: 10rem;">
                <div class="card-body"> 
                    <button class="card-title clickable text-white">x/johndoe</button>              
                    <div class="card-text">
                        <p>Reputation</p>
                        <h2>254,789</h2>
                    </div>                   
                </div>
            </div>  
            
        </div>
    </div>
    
</div>


<!-- Modal -->
<div class="modal fade text-white" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog text-white">
      <div class="modal-content bg-light-dark text-white">
        <div class="modal-header">
          <h5 class="modal-title text-white" id="exampleModalLabel">Reply</h5>
          <button type="button" class="btn-close btn-close-white " data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" width="100%"></textarea>
                <div class="col text-end mt-3">
                    <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                </div>
            </div>
        </div>

      </div>
    </div>
  </div>

<?php
draw_footer();
?>
