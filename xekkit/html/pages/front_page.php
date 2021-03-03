<?php

include_once('../templates/common.php');
include_once('../templates/carousel.php');

draw_header();
draw_nav_bar();
draw_carousel();

include '../templates/post.php';

draw_footer();
?>
