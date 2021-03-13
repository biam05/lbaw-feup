<?php
include_once('../templates/common.php');
include_once('../templates/post.php');
draw_header();
draw_nav_bar();

$is_myprofile = true;
$is_logged = true;
?>

<section class="container page profile">
    <section class="usercard">
        <div class="card" style="width: 20em;">
            <div class="container">
                <div class="row align-items-start">
                    <div class="col">
                        <h5 class="card-title"><i class="fas fa-check"></i> x/johndoe</h5>
                    </div>
                    <?php if (!$is_myprofile) { ?>
                        <?php if ($is_logged) { ?>
                            <div class="col">
                                <a href="#" class="btn btn-primary">Follow</a>
                            </div>
                        <?php } ?>
                        <div class="col">
                            <button type="button" class="profile-report clickable-big text-white" data-bs-toggle="modal" data-bs-target="#reportModal">
                                <i class="fas fa-exclamation-triangle"></i>
                            </button>
                            <?php draw_report_modal() ?>
                        </div>
                    <?php } else { ?>
                        <?php if ($is_logged) { ?>
                            <div class="col-12">
                                <a href="editprofile.php" class="btn btn-primary">Upload New Image</a>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="row align-items-center">
                    <div class="col">
                        <img src="../img/user.png" class="card-img-top" alt="user image" style="width: 10rem;">
                    </div>
                    <div class="col">
                        <div class="card-text">
                            <p>Reputation</p>
                            <h2>254,789</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card" style="width: 30em;">
                <div class="card-body">
                    <h5 class="card-title">Description</h5>
                    <p class="card-text">My name is John and I'm a partner example user for this framewhire. My posts are really about any trending topic.</p>
                </div>
            </div>
    </section>
    <form class="col-lg-8 p-3 g-3 needs-validation bg-light-dark" novalidate>
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
        <div class="row g-2">
            <div class="col-8 form-floating mb-3">
                <input type="password" value="***********" disabled class="form-control" id="inputPassword" placeholder="Password" required>
                <label for="inputPassword" class="form-label">Password</label>
                <div class="invalid-feedback">
                    Your password must be at least 8 characters long, contain letters and numbers.
                </div>
            
            </div>
            <div class="col-4 form-floating mb-3">
                <p data-bs-toggle="modal" data-bs-target="#updatePassword" style="width: 100%; height: 100%; padding-top: 10px" class="btn btn-primary">Change</p>
            </div>
        </div>
        
        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="inputBirthDate" placeholder="Birth Date" required>
            <label for="inputBirthDate" class="form-label">Birth Date</label>
        </div>
    
        <div class="form-floating mb-3">
            <textarea placeholder="Description" style="width: 100%; padding: 10px" rows="5"></textarea>
        </div>
        <div class="col-auto text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
    
</section>

<div class="modal fade text-white" id="updatePassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog text-white">
        <div class="modal-content bg-light-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="Report-modal-label">New Password</h5>
                <button type="button" class="btn-close btn-close-white " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="Report-modal-description" class="form-label">New Password</label>
                    <span id="Report-modal-description" class="input form-control" role="textbox" rows="3" contenteditable aria-multiline="true">
                    </span>
                </div>
                <div class="mb-3">
                    <label for="Report-modal-description" class="form-label">Confim new password</label>
                    <span id="Report-modal-description" class="input form-control" role="textbox" rows="3" contenteditable aria-multiline="true">
                    </span>
                </div>
                
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        
        </div>
    </div>
</div>

<?php
draw_footer();
?>
