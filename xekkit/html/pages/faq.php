<?php
include_once('../templates/common.php');
draw_header();
draw_nav_bar();
?>
<div class="container text-white">
    <h1><i class="fas fa-book"></i>     FAQ</h1>    
    <br>
    <div class="accordion bg-light-dark">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button collapsed text-white bg-light-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit?</h5>
        </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <p>Phasellus pharetra, libero nec venenatis rhoncus, mauris quam pulvinar nunc, vel dictum nulla enim a felis.</p>
        </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed text-white bg-light-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit?</h5>
        </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <p>Phasellus pharetra, libero nec venenatis rhoncus, mauris quam pulvinar nunc, vel dictum nulla enim a felis.</p>
        </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed text-white bg-light-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            <h5>Lorem ipsum dolor sit amet, consectetur adipiscing elit?</h5>
        </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
            <p>Phasellus pharetra, libero nec venenatis rhoncus, mauris quam pulvinar nunc, vel dictum nulla enim a felis.</p>
        </div>
        </div>
    </div>
    </div>
</div>

<?php
draw_footer();
?>
