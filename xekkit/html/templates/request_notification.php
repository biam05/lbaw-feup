<?php
function draw_partner_request($requester, $motivation)
{?>

<div class="card bg-light-dark text-white partner-request request">
  <div class="card-header">
    <i class="fas fa-plus" style="font-size:larger;"></i>
    <?=$requester?> wants to become a <b class="text-primary">partner</b>
  </div>
  <div class="card-body">
    <p class="card-text"><?=$motivation?></p>

    <a href="#" class="btn btn-primary">Accept</a>
    <a href="#" class="btn btn-danger">Reject</a>

  </div>
</div>
<?php
}


function draw_report_request($requester)
{?>

<div class="card bg-light-dark text-white report-request request">
  <div class="card-header">
    <i class="fas fa-exclamation-triangle" style="font-size:larger;"></i>
    <?=$requester?> wants to <b class="text-danger">report</b> a post
  </div>
  <div class="card-body">
    <?php draw_post("The Universe is too populated","I will kill half of the universe to keep the balance","x/thanos", "Jan 23, 2021", ["OverPopulation"],"../img/balanced.gif","2","50");?>

    <a href="#" class="btn btn-primary">Accept</a>
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
    draw_report_request("x/someone");
  ?>
</div>


<?php
}
?>