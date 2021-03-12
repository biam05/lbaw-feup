<?php
include_once('../templates/common.php');
draw_header();
draw_nav_bar();


function draw_edit_faq_element($id, $question, $answer){ 
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
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-outline-primary btn-sm mt-2 me-2" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-questionID="<?=$id?>">Edit</button>
                    <button type="button" class="btn btn-outline-danger btn-sm mt-2">Remove</button>
                </div>
            </div>
        </div>
        
    </div>
<?php }


?>

<script defer src="../js/edit_faq.js"></script>


<div class="container-xl text-white">
    <div class="row mb-3">
        <h1 class="col-auto"><i class="fas fa-book"></i>     FAQ</h1>  
        <a class="col-auto btn btn-secondary" href="../pages/faq.php" role="button">See as user</a>  
    </div>
    <div class="accordion accordion-flush" id="faq">
        <?php
        draw_edit_faq_element(1,
            "I'm not registered and I can't make a new post or comment/vote on existing posts.",
            "In order to make new posts and comment/vote on existing posts you must be registered and signed in on our website.");
        draw_edit_faq_element(2,
            "I found a post/comment/profile that doesn't follow the community guidelines, what should I do?",
            "If you found anything that doesn't follow the community guidelines you should use the report button (the danger sign on the top right of the post/comment/profile) and report the situation to a moderator. Following the community guidelines is a MUST a everyone that doesn't follow them can be temporarily banned or even permenently banned on recurrent situations.");
        draw_edit_faq_element(3,
            "I can't select the button to ask for partner.",
            "In order to apply for partner you must have at least 100,000 points of reputation.");
        draw_edit_faq_element(4,
            "How can I get reputation points?",
            "In order to get reputation points you must interact with other people on XEKKIT:
            <br><br>
            + 1 point for every vote you make (until a maximum of 5 points per day);<br>
            +/- 1 points for every upvote/downvote you get on your comments.<br>
            +/- 5 points for every upvote/downvote you get from regular users on your published news.<br>
            +/- 10 points for every upvote/downvote you get from partner users on your published news.");
        ?>
        
    </div>
    <form class="my-3" action="">
        
        <legend>Add new question:</legend>
        <div class="mb-3">
            <label for="question" class="form-label">Question</label>
            <input type="text" class="form-control" id="question" aria-label="new question">
        </div>
        <div class="mb-3">
            <label for="answer" class="form-label">Answer</label>
            <textarea class="form-control" id="answer" rows="4" aria-label="new answer"></textarea>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Add to FAQ</button>
        </div>
        
    </form>

    <!-- Modal -->
    <div class="modal fade text-white" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content bg-light-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit FAQ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Question:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Answer:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
draw_footer();
?>
