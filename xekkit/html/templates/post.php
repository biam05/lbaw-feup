<?php
include_once('toast.php');

draw_toast();
?>


<?php
function draw_post($title, $description, $author, $date, $tags, $image, $comments, $votes )
{?>

  <div class="card mb-3 text-white bg-light-dark">
      <div class="card-body">
        <h5 class="card-title" style="display:inline-block"><?=$title?></h5>
        <button class="card-author clickable text-white" onclick="document.location='../pages/profile.php'"><?=$author?></button>
        <button id="toastbtn" class="card-report clickable-big text-white"><i class="fas fa-exclamation-triangle"></i></button>
        <br>
        <button class="card-date clickable text-decoration-none text-white" onclick="document.location='../pages/thispost.php'"><?=$date?></button>
        <img src=<?=$image?> class="card-img-top" alt="..." draggable="false"> 
        <p class="card-text">
            <?php 
          echo substr($description,0,150);
          if(strlen($description)>150)
          {
            echo '...';
          }
          ?>
        </p>
      </div>
      <div class="card-footer text-muted" style="display:flex;">
        
        <footer>
        <div class="card-tags">
              <?php
              foreach($tags as $tag)
              {
                ?>
                  <button class="clickable text-white">#<?=$tag?></button>
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
            <span><?=$votes?></span>
            <button  class="comments clickable" ><i class="fas fa-comment"></i> <?=$comments?></button>
            
        </footer>
      </div>
  </div>



<?php
}

function draw_posts()
{?>

<div class="container-xl">
  
  <?php
    draw_post("Daft Punk", "Daft Punk Break Up Announcement image", "x/johndoe", "Jan 23, 2021", ["music", "celebreties"], "../img/daft_punk.jpeg", "58", "7873" );
    draw_post("Daft Punk", "This is a test to see the size of a description needed to trigger the reticências. So far this has 100 characteres. Is it good enough? Short maybe? Long maybe? One could never know writing text on the text editor, so I continue to write until I can consider this a big Post. Maybe I should just paste some Lorem Ipsum shit, but I don't really want to, this is more genuine", "x/johndoe", "Jan 23, 2021", ["music", "celebreties"], "../img/daft_punk.jpeg", "58", "7873" );
  ?>
</div>


<?php
}
?>
