<?php
function draw_post($title, $description, $author, $date, $tags, $image, $comments, $votes )
{?>

<div class="card mb-3 text-white bg-light-dark">
    <div class="card-body">
      <h5 class="card-title" style="display:inline-block"><?=$title?></h5>
      <button class="card-author clickable text-white"><?=$author?></button>
      <button class="card-report clickable-big text-white"><i class="fas fa-exclamation-triangle"></i></button>
      <span class="card-date"><?=$date?></span>
      <img src=<?=$image?> class="card-img-top" alt="..." draggable="false"> 
      <p class="card-text"><?=$description?></p>
    </div>
    <div class="card-footer text-muted" style="display:flex;">
      <div class="votes">
        <button class="clickable-big">
          <i class="fas fa-angle-up text-white"></i>
        </button>
        <button class="clickable-big">
          <i class="fas fa-angle-down text-white "></i>
        </button>
      </div>
      <footer>
          <span><?=$votes?></span>
          <button  class="comments clickable" ><i class="fas fa-comment"></i> <?=$comments?></button>
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
  ?>
</div>


<?php
}
?>

