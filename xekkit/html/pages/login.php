<?php
include_once('../templates/common.php');
draw_header();
?>


<script src="../js/validate_form.js" defer></script>


<div class="container">
    <div class="row align-items-center vh-100">
        <div class="col-lg-7 d-grid">
            <p class="fs-1 fw-bold text-center text-white">Welcome to XEKKIT</p>
            <a href="../pages/main.php" class="btn btn-outline-secondary btn-lg" tabindex="-1" role="button" aria-disabled="true">Visit the website without an account.</a>
        </div>
        
        <form action="../pages/main_logged_in.php" class="col-lg-5 p-3 g-3 border needs-validation bg-light" novalidate >
            <p class="text-center fs-1">Login</p>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="inputUsername" placeholder="Username/Email" required>
                <label for="inputUsername">Username/Email</label>
                <div class="invalid-feedback">
                    Username not found.
                </div>
            </div>
            <div class="row g-2">
                <div class="col form-floating mb-3">
                    <input type="password" class="form-control pe-5" id="inputPassword" placeholder="Password" required>
                    
        
                    <label for="inputPassword" class="form-label">Password</label>
                    <div class="invalid-feedback">
                        Invalid password.
                    </div>
                </div>
                <div onclick="toggleEye(this)" class="col-1 text-center align-self-center">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
            </div>
    
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="rememberMe">
                <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>
            <a href="../pages/register.php">Don't you have an account?</a>
            <br>
            <a href="" data-bs-toggle="modal" data-bs-target="#forgotPassword" >Lost my password</a>
            <div class="col-auto text-center">
                <button type="submit" class="btn btn-lg btn-primary">Login</button>
            </div>
        </form>
        
    </div>
</div>

<div class="modal fade text-white" id="forgotPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog text-white">
        <div class="modal-content bg-light-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="Forgot-modal-label">Forgot Password</h5>
                <button type="button" class="btn-close btn-close-white " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <p>Tell us your username/email and we will send you an email with the instructions you must follow to reset your password.</p>
                </div>
                <div class="mb-3">
                <div class="form mb-3">
                    <input type="email" class="form-control" id="inputEmail" placeholder="Username/Email" required>
                    <div class="invalid-feedback">
                        Username/Email doesn't exist.
                    </div>
                </div>
                </div>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Confirm</button>
                </form>
            </div>
        
        </div>
    </div>
</div>


<?php
    draw_footer();

?>
