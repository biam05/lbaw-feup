<!--script src="../js/carousel.js" defer></script-->

<?php

function draw_card($img_src, $title, $tags, $date, $user)
{ ?>

<div class="card text-white bg-dark position-relative custom_card">
    <img class="card-img" src="<?=$img_src ?>" alt="Card image cap">
    <div class="card-img-overlay d-flex flex-column justify-content-end carousel_card_overlay">
        <h5 class="card-title"><?=$title ?></h5>
        <div class="d-flex">
            <? foreach($tags as $tag){ ?>
                <a href="#" class="card-link link-light text-decoration-none">#<?=$tag ?></a>
            <?}?>
        </div>                  
        <span class="card-text card_date"><?=$date ?></span>
        <a href="#" class="card-link link-light text-decoration-none card_author"><?=$user ?></a>
            
    </div>
</div>


<?php
}

/**
 * Draws the header for all pages. 
 */
function draw_carousel()
{ ?>

<div class="container-xl my-5">
    <h2 class="text-center text-light">Trending News</h2>
    <div class="card-deck row flex-row flex-nowrap overflow-auto g-0 gap-3">
        <?php
        draw_card('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg', 'Card 1', ['sports','voleyball'], 'Jan 21, 2021', 'x/deepfuckingvalue');
        draw_card('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg', 'Card 2', ['sports','voleyball'], 'Jan 21, 2021', 'x/deepfuckingvalue');
        draw_card('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg', 'Card 3', ['sports','voleyball'], 'Jan 21, 2021', 'x/deepfuckingvalue');
        draw_card('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg', 'Card 4', ['sports','voleyball'], 'Jan 21, 2021', 'x/deepfuckingvalue');
        draw_card('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg', 'Card 5', ['sports','voleyball'], 'Jan 21, 2021', 'x/deepfuckingvalue');
        draw_card('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg', 'Card 6', ['sports','voleyball'], 'Jan 21, 2021', 'x/deepfuckingvalue');
        draw_card('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg', 'Card 7', ['sports','voleyball'], 'Jan 21, 2021', 'x/deepfuckingvalue');
        draw_card('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg', 'Card 8', ['sports','voleyball'], 'Jan 21, 2021', 'x/deepfuckingvalue');
        draw_card('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg', 'Card 9', ['sports','voleyball'], 'Jan 21, 2021', 'x/deepfuckingvalue');
        draw_card('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg', 'Card 10', ['sports','voleyball'], 'Jan 21, 2021', 'x/deepfuckingvalue');

        ?>       
    </div>  
</div>

<?php } ?>
