<?php

function draw_user_card($user, $reputation, $partner){?>
<div class="col-auto text-center mb-3">
    <div class="card align-items-center text-white bg-light-dark pt-3" style="width: 18rem;">
        <img src="../img/user.png" class="card-img-top" alt="user image" style="width: 10rem;">
        <div class="card-body">
            <button class="card-title clickable text-white">
                <? if($partner){?>
                    <i class="fas fa-check"></i>
                <?}?>
                <?= $user?>
                </button>
            <div class="card-text">
                <p>Reputation</p>
                <h2><?= $reputation?></h2>
            </div>
        </div>
    </div>
</div>

<?php
}

function draw_users(/* $users */) {?>

<div class="row text-white pt-4 justify-content-evenly">
    <?php
    draw_user_card("x/andre", "254,789", true);
    draw_user_card("x/antonio", "54,789", false);
    draw_user_card("x/joaquim", "4,789", false);
    draw_user_card("x/jorge", "54,579", false);
    draw_user_card("x/gabriel", "789", false);
    draw_user_card("x/andeia", "989", false);
    draw_user_card("x/joana", "289,452", true);
    draw_user_card("x/costa", "154,789", false);
    ?>
</div>

<?php
}
