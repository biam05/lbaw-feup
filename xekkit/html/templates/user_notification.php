
<?php
function draw_notification_upvote($user)
{?>

<div class="card bg-light-dark text-white report-request mb-3">
  <div class="card-header">
    <i class="fas fa-angle-up" style="font-size:larger;"></i>
    <?=$user?><b class="text-secondary"> upvoted</b> your <a href="../pages/news.php" class="link-light">post</a>
  </div>
</div>
<?php
}

function draw_notification_comment($user, $text)
{?>

<div class="card bg-light-dark text-white comment-notification request">
  <div class="card-header">
    <i class="fas fa-comment" style="font-size:larger;"></i>
    <?=$user?><b class="text-info"> commented</b> your <a href="../pages/news.php" class="link-light">post</a>
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
