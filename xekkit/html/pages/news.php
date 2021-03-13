<?php
include_once('../templates/common.php');
include_once('../templates/post.php');


draw_header();
draw_nav_bar();
?>

<div class="mainpost container">
    <div class="content">
        <?php
            draw_post("Daft Punk", "Daft Punk Break Up Announcement image", "x/johndoe", "Jan 23, 2021", ["music", "celebreties"], "../img/daft_punk.jpeg", "58", "7873" );
        ?>
        <div class="container mb-3 p-3 bg-light-dark">
            <div class="form-floating">
                <h3 class="text-white">Leave a Comment here</h3>
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" width="100%"></textarea>
                <div class="col text-end mt-3">
                    <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                </div>
            </div>
        </div>
        <div class="container p-3 bg-light-dark">
            <div class="row">
                <div class="col-md-1">
                    <img src="../img/user.png" class="rounded-circle" alt="..." width = 50>
                </div>
                <div class="col-md">
                    <p class="text-white text-muted p-0 m-0"><small>x/uCanadaba3 10 hours ago</small>
                        <button class="clickable-big text-muted"><i class="fas fa-exclamation-triangle"></i></button>
                    </p>        
                    <p class="text-white m-0">Sad moment in the music industry</p>
                    <footer class="text-muted">
                        <div class="votes">
                            <button class="clickable-big">
                                <i class="fas fa-angle-up text-muted"></i>
                            </button>
                            <button class="clickable-big">
                                <i class="fas fa-angle-down text-muted"></i>
                            </button>
                        </div>
                        <span>15</span>
                        <button  class="comments clickable" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-reply"></i> 1</button>
                    </footer> 
                </div>                 
            </div> 
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-1">
                    <img src="../img/user.png" class="rounded-circle" alt="..." width = 50>
                </div>
                <div class="col-md">
                    <p class="text-white text-muted p-0 m-0"><small>x/johndoe 10 hours ago</small>
                        <button class="clickable-big text-muted"><i class="fas fa-exclamation-triangle"></i></button>
                    </p>  
                    <p class="text-white m-0">Agreed :(</p>   
                    <footer class="text-muted">
                        <div class="votes">
                            <button class="clickable-big">
                                <i class="fas fa-angle-up text-muted"></i>
                            </button>
                            <button class="clickable-big">
                                <i class="fas fa-angle-down text-muted"></i>
                            </button>
                        </div>
                        <span>2</span>
                        <button  class="comments clickable" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-reply"></i> 0</button>
                    </footer>                            
                </div>
            </div>
            <hr class="featurette-divider text-muted">  
            <div class="row p-3">
                <div class="col-md-1">
                    <img src="../img/user.png" class="rounded-circle" alt="..." width = 50>
                </div>
                <div class="col-md">
                    <p class="text-white text-muted p-0 m-0"><small>x/randomdude 2 days ago</small>
                        <button class="clickable-big text-muted"><i class="fas fa-exclamation-triangle"></i></button>
                    </p>        
                    <p class="text-white m-0">Never really liked them tbh</p>
                    <footer class="text-muted">
                        <div class="votes">
                            <button class="clickable-big">
                                <i class="fas fa-angle-up text-muted"></i>
                            </button>
                            <button class="clickable-big">
                                <i class="fas fa-angle-down text-muted"></i>
                            </button>
                        </div>
                        <span>1</span>
                        <button  class="comments clickable" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-reply"></i> 0</button>
                    </footer> 
                </div>                 
            </div>          
            
        </div>   
    </div>
    <aside class="bd-aside d-none-not-desktop">
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
        
    </aside>
    
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
