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
            <p class="text-center fs-1">Register</p>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="inputUsername" placeholder="Username" required>
                <label for="inputUsername">Username</label>
                <div class="invalid-feedback">
                    Username already in use.
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="inputEmail" placeholder="Email" required>
                <label for="inputEmail" class="form-label">Email</label>
                <div class="invalid-feedback">
                    Email already in use or invalid format.
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="inputPassword" placeholder="Password" required>
                <div onclick="toggleEye(this)" class="password-eye">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
                <label for="inputPassword" class="form-label">Password</label>
                <div class="invalid-feedback">
                    Your password must be at least 8 characters long, contain letters and numbers.
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="inputConfirmPassword" placeholder="Confirm Password" required>
                <div onclick="toggleEye(this)" class="password_eye">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
                <label for="inputConfirmPassword" class="form-label">Confirm Password</label>
                <div class="invalid-feedback">
                    Your passwords don't match.
                </div>
            </div>
            
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="inputBirthDate" placeholder="Birth Date" required>
                <label for="inputBirthDate" class="form-label">Birth Date</label>
            </div>
            <a href="../pages/login.php">Already have an account?</a>
            <div class="col-autom text-center">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
        
    </div>
</div>


<?php
    draw_footer();

?>
