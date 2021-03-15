
<?php
function draw_notification_upvote($user)
{?>

<article class="card bg-light-dark text-white mb-3">
  <div class="card-body">
    <div class="card-title">
      <p>
        <i class="fas fa-angle-up"></i> <?=$user?><b class="text-secondary"> upvoted</b> your <a href="../pages/news.php" class="link-light stretched-link">post</a>.
      </p>
    </div>
  </div>
</article>
<?php
}

function draw_notification_comment($user, $text)
{?>

<article class="card bg-light-dark text-white comment-notification mb-3">
  <div class="card-body">
    <div class="card-title">
      <p>
        <i class="fas fa-comment"></i>
        <?=$user?>
        <b class="text-info"> commented</b> your 
        <a href="../pages/news.php" class="link-light stretched-link">post</a>:
      </p>
    </div>
    <p class="card-text fw-light"><?=$text?></p>
  </div>
</article>
<?php
}
function draw_user_notifications()
{
  draw_notification_upvote("x/someone");
  draw_notification_comment("x/someone", "SO SAD :(");
}
?>
