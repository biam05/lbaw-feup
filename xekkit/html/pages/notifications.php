<?php
include_once('../templates/common.php');
include_once('../templates/user_notification.php');
include_once('../templates/request_notification.php');
include_once('../templates/post.php');

draw_header();
draw_nav_bar();
?>
<div class="container-xl">
    <h1 class="text-white">Your Notifications</h1>
    <ul class="nav nav-pills mb-3 text-white bg-light-dark" id="pills-tab" role="tablist">
        <li class="nav-item " role="presentation">
            <button class="nav-link active text-white" id="pills-notification-tab" data-bs-toggle="pill" data-bs-target="#pills-notification" type="button" role="tab" aria-controls="pills-trending" aria-selected="true">Notifications</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-white" id="pills-moderator-tab" data-bs-toggle="pill" data-bs-target="#pills-moderator" type="button" role="tab" aria-controls="pills-top" aria-selected="false">Moderator</button>
        </li>
    </ul>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-notification" role="tabpanel" aria-labelledby="pills-notification-tab">
            <?php
                draw_user_notifications();
            ?>
        </div>
        <div class="tab-pane fade" id="pills-moderator" role="tabpanel" aria-labelledby="pills-moderator-tab">
            <?php
                draw_partner_requests();
            ?>
        </div>
    </div>
</div>
<?php
draw_footer();
?>
