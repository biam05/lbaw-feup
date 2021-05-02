
<div style="cursor: pointer" onclick="location.href='../pages/news.php'" class="card text-white bg-dark position-relative custom_card">
    <img class="card-img" src={{ asset('storage/img/billieeilish.jpg') }} alt="Card image cap">
    <div class="card-img-overlay d-flex flex-column justify-content-end p-1">
        <h5 class="card-title px-1">Billie Eilish won the coveted Record of the Year at Sunday's Grammy Awards</h5>
        <div class="d-flex px-1">
            <?php 
            $tags=["pop", "music"];
                foreach($tags as $tag){ ?>
                <a href="" class="card-link link-light text-decoration-none">#<?=$tag ?></a>
            <?php
        }
        ?>
        </div>
        <div class="row pt-1" style="font-size: smaller;">
            <div class="col">  
                <span class="card-text">1h ago</span>
            </div>
            <div class="col">
                <a href="../pages/profile.php" class="card-link link-light text-decoration-none">x/johndoe</a>
            </div>  
        </div>
    </div>


</div>
