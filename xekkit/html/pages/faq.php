<?php
include_once('../templates/common.php');
draw_header();
draw_nav_bar();


function draw_faq_element($id, $question, $answer){ 
?>
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading<?=$id?>">
            <button class="accordion-button collapsed text-white bg-light-dark" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?=$id?>" aria-expanded="true" aria-controls="flush-collapse<?=$id?>">
                <?=$question?>
            </button>
        </h2>
        <div id="flush-collapse<?=$id?>" class="accordion-collapse collapse" aria-labelledby="flush-heading<?=$id?>" data-bs-parent="#faq">
            <div class="accordion-body">
                <?=$answer?>
            </div>
        </div>
    </div>
<?php }


?>
<div class="container-xl text-white">
    <h1><i class="fas fa-book"></i>     FAQ</h1>    
    <br>
    <div class="accordion accordion-flush" id="faq">
        <?php
        draw_faq_element(1,
            "I'm not registered and I can't make a new post or comment/vote on existing posts.",
            "In order to make new posts and comment/vote on existing posts you must be registered and signed in on our website.");
        draw_faq_element(2,
            "I found a post/comment/profile that doesn't follow the community guidelines, what should I do?",
            "If you found anything that doesn't follow the community guidelines you should use the report button (the danger sign on the top right of the post/comment/profile) and report the situation to a moderator. Following the community guidelines is a MUST a everyone that doesn't follow them can be temporarily banned or even permenently banned on recurrent situations.");
        draw_faq_element(3,
            "I can't select the button to ask for partner.",
            "In order to apply for partner you must have at least 100,000 points of reputation.");
        draw_faq_element(4,
            "How can I get reputation points?",
            "In order to get reputation points you must interact with other people on XEKKIT:
            <br><br>
            + 1 point for every vote you make (until a maximum of 5 points per day);<br>
            +/- 1 points for every upvote/downvote you get on your comments.<br>
            +/- 5 points for every upvote/downvote you get from regular users on your published news.<br>
            +/- 10 points for every upvote/downvote you get from partner users on your published news.");
        ?>
        
    </div>
</div>

<?php
draw_footer();
?>
