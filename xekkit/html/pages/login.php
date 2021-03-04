<?php

    include_once('../templates/common.php');

    draw_header();
?>


<script src="../js/validate_form.js" defer></script>


<div class="container">
    <div class="row align-items-center vh-100">
        <div class="col-lg-7">
            <p class="fs-1 fw-bold text-white">Welcome to XEKKIT</p>
            <a href="../pages/main.php" class="btn btn-outline-secondary btn-lg" tabindex="-1" role="button" aria-disabled="true">Visit the website without an account.</a>
        </div>
        
        <form class="col-lg-5 p-3 g-3 border needs-validation bg-light" novalidate>
            <p class="text-center fs-1">Login</p>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="inputUsername" placeholder="Username/Email" required>
                <label for="inputUsername">Username/Email</label>
                <div class="invalid-feedback">
                    Username not found.
                </div>
            </div>
            <div class="form-floating mb-3 position-relative">
                <input type="password" class="form-control pe-5" id="inputPassword" placeholder="Password" required>
                <div onclick="toggleEye(this)" class="position-absolute top-50 end-0 translate-middle-y me-3">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
    
                <label for="inputPassword" class="form-label">Password</label>
                <div class="invalid-feedback">
                    Invalid password.
                </div>
            </div>
    
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>
            <a href="../pages/register.php">Don't you have an account?</a>
            <br>
            <a href="#" >Lost my password</a>
            <div class="col-autom text-center">
                <button type="submit" class="btn btn-lg btn-primary">Login</button>
            </div>
        </form>
        
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<?php
    draw_footer();

?>
