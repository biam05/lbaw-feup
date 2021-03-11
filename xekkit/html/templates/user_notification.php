
<?php
function draw_notification_upvote($user)
{?>

<div class="card bg-light-dark text-white report-request request">
  <div class="card-header">
    <i class="fas fa-angle-up" style="font-size:larger;"></i>
    <?=$user?><b class="text-secondary"> upvoted</b> your post
  </div>
  <div class="card-body">
    <?php draw_post("Daft Punk", "Daft Punk Break Up Announcement image", "x/johndoe", "Jan 23, 2021", ["music", "celebreties"], "../img/daft_punk.jpeg", "58", "7873" );?>
  </div>
</div>
<?php
}

function draw_notification_comment($user, $text)
{?>

<div class="card bg-light-dark text-white comment-notification request">
  <div class="card-header">
    <i class="fas fa-comment" style="font-size:larger;"></i>
    <?=$user?><b class="text-info"> commented</b> your post
  </div>
  <div class="card-body">
  <p class="card-text"><?=$text?></p>
  </div>
</div>
<?php
}
function draw_user_notifications()
{?>

<div class="container-xl">
  <?php
    draw_notification_upvote("x/someone");
    draw_notification_comment("x/someone", "SO SAD :(");
  ?>
</div>


<?php
}
?>