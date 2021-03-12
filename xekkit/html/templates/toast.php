<?php
/**
 * Draws notification toast
 */
function draw_toast()
{ ?>

<script defer src="../js/toast.js"></script>

<div class="position-fixed bottom-0 end-0 p-3 mb-5">
  <div id="liveToast" class="toast hide bg-light-dark" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header btn-primary">
      <img src="../img/warning.png" class="rounded me-2" width="20">
      <strong class="me-auto">New Notification</strong>
      <small>Just Now</small>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body text-white">
        <a class="text-decoration-none text-white clickable" href="../pages/news.php">
            Someone tried to report your post
        </a>
    </div>
  </div>
</div>

<?php } ?>
