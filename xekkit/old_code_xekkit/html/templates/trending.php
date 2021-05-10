<?php

function draw_card($img_src, $title, $tags, $date, $user)
{ 
    ?>

<div style="cursor: pointer" onclick="location.href='../pages/news.php'" class="card text-white bg-dark position-relative custom_card">
    <img class="card-img" src="<?=$img_src ?>" alt="Card image cap">
    <div class="card-img-overlay d-flex flex-column justify-content-end p-1">
        <h5 class="card-title px-1"><?=$title ?></h5>
        <div class="d-flex px-1">
            <?php foreach($tags as $tag){ ?>
                <a href="" class="card-link link-light text-decoration-none">#<?=$tag ?></a>
            <?}?>
        </div>
        <div class="row pt-1" style="font-size: smaller;">
            <div class="col">  
                <span class="card-text"><?=$date ?></span>
            </div>
            <div class="col">
                <a href="../pages/profile.php" class="card-link link-light text-decoration-none"><?=$user ?></a>
            </div>  
        </div>
    </div>


</div>


<?php
}

/**
 * Draws the header for all pages. 
 */
function draw_trending()
{ 
    ?>

<div class="container-xl my-2">
    <h2 class="text-center text-light">Trending News</h2>
    <div class="card-deck row flex-row flex-nowrap overflow-auto g-0 gap-3 w-30">
        <?php
        draw_card('../img/billieeilish.jpg', 'Billie Eilish won the coveted Record of the Year at Sunday\'s Grammy Awards', ["pop", "music"], '1h ago', 'x/johndoe');
        draw_card('../img/neuralnetwork.png', 'Initialising neural network', ['neuralnetwork'], 'Jan 21, 2021', 'x/deepvalue');        
        draw_card('../img/war.jpg_200', 'Fighting against evil and tyranny', ['war', 'world'], 'Jan 21, 2021', 'x/deepvalue');
        draw_card('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg', 'Justice to all', ["music", "celebrities"], 'Jan 23, 2021', 'x/johndoe');
        draw_card('https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(20).jpg', 'Landscape', ["wow"], 'Jan 10, 2021', 'x/johndoe');
        ?>       
    </div>  
</div>

<?php 
} 
