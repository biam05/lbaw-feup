<?php
function draw_partner_request($requester, $motivation)
{?>

<div class="card bg-light-dark text-white mb-3">
  
  <div class="card-body">
    <div class="card-title">
      <p>
        <i class="fas fa-plus"></i>
        <a href="../pages/profile.php" class="clickable text-white"><?=$requester?></a> wants to become a <b class="text-primary">partner</b>:
      </p>
    </div>
    <p class="card-text fw-light"><?=$motivation?></p>

    <a href="#" class="btn btn-primary me-1">Accept</a>
    <a href="#" class="btn btn-danger">Reject</a>

  </div>
</div>
<?php
}


function draw_report_request($requester, $motivation)
{?>

<div class="card bg-light-dark text-white mb-3">
  
  <div class="card-body">
    <div class="card-title">
      <i class="fas fa-exclamation-triangle"></i>
      <?=$requester?> wants to <b class="text-danger">report</b> a <a href="../pages/news.php" class="link-light">post</a>:
    </div>
    <p class="card-text fw-light"><?=$motivation?></p>
    <a href="#" class="btn btn-primary me-1">Accept</a>
    <a href="#" class="btn btn-danger">Reject</a>

  </div>
</div>
<?php
}

function draw_partner_requests()
{?>

<div class="container-xl">
  <?php
    draw_partner_request("x/someone", "I want to become a partner because I feel like I am an influent and trusted member of the community");
    draw_report_request("x/someone", "This post should be removed because it contains sexual content.");
  ?>
</div>


<?php
}
?>
