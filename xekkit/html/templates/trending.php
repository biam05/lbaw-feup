<!--script src="../js/carousel.js" defer></script-->

<?php

function draw_card($img_src, $title, $tags, $date, $user)
{ ?>

<div style="cursor: pointer" onclick="location.href='../pages/news.php'" class="card text-white bg-dark position-relative custom_card">
    <img class="card-img" src="<?=$img_src ?>" alt="Card image cap">
    <div class="card-img-overlay d-flex flex-column justify-content-end carousel_card_overlay">
        <h5 class="card-title"><?=$title ?></h5>
        <div class="d-flex">
            <?php foreach($tags as $tag){ ?>
                <a href="" class="card-link link-light text-decoration-none">#<?=$tag ?></a>
            <?}?>
        </div>                  
        <span class="card-text card_date"><?=$date ?></span>
        <a href="../pages/profile.php" class="card-link link-light text-decoration-none card_author"><?=$user ?></a>
    </div>
</div>


<?php
}

/**
 * Draws the header for all pages. 
 */
function draw_trending()
{ ?>

<div class="container-xl my-2">
    <h2 class="text-center text-light">Trending News</h2>
    <div class="card-deck row flex-row flex-nowrap overflow-auto g-0 gap-3">
        <?php
        draw_card('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg', 'Initialising neural network', ['sports','voleyball'], 'Jan 21, 2021', 'x/deepfuckingvalue');
        draw_card('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg', 'One for all and all for one', ['sports','voleyball'], 'Jan 21, 2021', 'x/deepfuckingvalue');
        draw_card('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg', 'Fighting against evil and tyranny', ['sports','voleyball'], 'Jan 21, 2021', 'x/deepfuckingvalue');
        draw_card('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg', 'Justice to all', ['sports','voleyball'], 'Jan 21, 2021', 'x/deepfuckingvalue');
        draw_card('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg', 'Down the road', ['sports','voleyball'], 'Jan 21, 2021', 'x/deepfuckingvalue');
        draw_card('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg', 'Can’t stay for long', ['sports','voleyball'], 'Jan 21, 2021', 'x/deepfuckingvalue');
        draw_card('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg', 'I’ll just keep moving on', ['sports','voleyball'], 'Jan 21, 2021', 'x/deepfuckingvalue');
        draw_card('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg', 'This is my boss, Jonathan Hart', ['sports','voleyball'], 'Jan 21, 2021', 'x/deepfuckingvalue');
        draw_card('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg', 'There’s a voice that keeps on calling me', ['sports','voleyball'], 'Jan 21, 2021', 'x/deepfuckingvalue');
        draw_card('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg', 'Hong Kong Phooey, number one super guy.', ['sports','voleyball'], 'Jan 21, 2021', 'x/deepfuckingvalue');

        ?>       
    </div>  
</div>

<?php 
} 


