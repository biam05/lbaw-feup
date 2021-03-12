<?php

function draw_user_card(){?>
<div class="col-auto text-center mb-3">
    <div class="card align-items-center text-white bg-light-dark pt-3" style="width: 18rem;">
        <img src="../img/user.png" class="card-img-top" alt="user image" style="width: 10rem;">
        <div class="card-body">
            <button class="card-title clickable text-white">x/someone</button>
            <div class="card-text">
                <p>Reputation</p>
                <h2>254,789</h2>
            </div>
        </div>
    </div>
</div>

<?php
}

function draw_users(/* $users */) {?>

<div class="row text-white pt-4 justify-content-evenly">
    <?php
    draw_user_card();
    draw_user_card();
    draw_user_card();
    draw_user_card();
    draw_user_card();
    draw_user_card();
    draw_user_card();
    draw_user_card();
    ?>
</div>

<?php
}
