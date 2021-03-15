<?php
include_once('../templates/common.php');
draw_header();
draw_nav_bar();
?>

<div class="text-center text-white p-5">
    <img class="mb-3" src="../img/sadpaper.png">
    <span class="display-1 d-block mb-3">404</span>
    <div class="mb-4 lead">The page you are looking for was not found.</div>
    <a href="../pages/main.php" class="btn btn-outline-secondary btn-lg" tabindex="-1" role="button" aria-disabled="true">Back to Homepage</a>
</div>

<?php
draw_footer();
