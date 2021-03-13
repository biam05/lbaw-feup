<?php

include_once('../templates/common.php');
include_once('../templates/trending.php');
include_once('../templates/post.php');
include_once('../templates/new_post.php');

draw_header();
draw_nav_bar();
draw_trending();
draw_new_post_modal();
draw_posts();
draw_footer();
?>
