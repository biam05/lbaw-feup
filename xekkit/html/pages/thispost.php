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
        <div class="container m-0 p-0 comments bg-light-dark">
            <div class="row p-3">
                <div class="col-md-1">
                    <img src="../img/user.png" class="rounded-circle" alt="..." width = 50>
                </div>
                <div class="col-md">
                    <p class="text-white text-muted p-0 m-0"><small>x/uCanadaba3 10 hours ago</small>
                        <button class="clickable-big text-muted"><i class="fas fa-exclamation-triangle"></i></button>
                    </p>        
                    <p class="text-white">Sad moment in the music industry test test test test test test test test test test test test test test test test test test test test test test test test</p>
                    <div class="row">
                        <div class="col-md-1">
                            <img src="../img/user.png" class="rounded-circle" alt="..." width = 50>
                        </div>
                        <div class="col-md">
                            <p class="text-white text-muted p-0 m-0"><small>x/johndoe 10 hours ago</small>
                                <button class="clickable-big text-muted"><i class="fas fa-exclamation-triangle"></i></button>
                            </p>  
                            <p class="text-white">Agreed :(</p>                              
                        </div>
                    </div>
                </div>
            </div> 
            <footer class="text-muted">
                <div class="votes">
                    <button class="clickable-big">
                        <i class="fas fa-angle-up text-muted"></i>
                    </button>
                    <button class="clickable-big">
                        <i class="fas fa-angle-down text-muted"></i>
                    </button>
                </div>
                <span>123</span>
                <button  class="comments clickable" ><i class="fas fa-reply"></i> 123</button>
            </footer>                
            <hr class="featurette-divider text-muted ml-1 mr-1">  
            <div class="row p-3">
                <div class="col-md-1">
                    <img src="../img/user.png" class="rounded-circle" alt="..." width = 50>
                </div>
                <div class="col-md">
                    <p class="text-white">The majority of our website structure and concept (including the name, obviously)
                        is based on the famous website</p>
                </div>
            </div>            
            <hr class="featurette-divider text-muted ml-1 mr-1">  
            <div class="row p-3">
                <div class="col-md-1">
                    <img src="../img/user.png" class="rounded-circle" alt="..." width = 50>
                </div>
                <div class="col-md">
                    <p class="text-white">The majority of our website structure and concept (including the name, obviously)
                        is based on the famous website</p>
                </div>
            </div>
        </div>   
    </div>
    <aside class="bd-aside mt-4">
        <div class="card align-items-center text-center text-white bg-light-dark" style="width: 18rem;">
            <img src="../img/user.png" class="card-img-top" alt="user image" style="width: 10rem;">
            <div class="card-body"> 
                <button class="card-title clickable text-white">x/johndoe</button>              
                <div class="card-text">
                    <p>Reputation</p>
                    <h2>254,789</h4>
                </div>                   
            </div>
        </div>  
        
    </aside>
    
</div>

<?php
draw_footer();
?>