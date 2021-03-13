<?php
include_once('../templates/common.php');
include_once('../templates/post.php');
draw_header();
draw_nav_bar();

$is_myprofile = true;
$is_logged = true;
?>

<section class="container page profile">
    <section class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item clickable"><a class="text-decoration-none text-muted" href="profile.php">Profile</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">Edit Profile</li>
            </ol>
        </nav>
    </section>
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
                <button type="button" class="btn btn-primary w-100 h-100" data-bs-toggle="modal" data-bs-target="#updatePassword">Change</button>
            </div>
        </div>
        
        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="inputBirthDate" placeholder="Birth Date" required>
            <label for="inputBirthDate" class="form-label">Birth Date</label>
        </div>

        <label class="form-label text-white">Gender</label>
        <select class="form-select mb-3 bg-white" aria-label="Gender">
            <option selected>Male</option>
            <option value="1">Female</option>
            <option value="2">Rather Not Say</option>
        </select>
    
        <div class="form-floating mb-3">
            <textarea placeholder="Description (Optional)" style="width: 100%; padding: 10px" rows="5"></textarea>
        </div>
        <div class="form-floating mb-3">
            <button type="submit" class="btn btn-primary w-100">Update</button>
        </div>
    </form>
    <form class="col-lg-8 p-3 pt-3 g-3 needs-validation bg-light-dark">
        <div class="form-floating mb-3">
            <button type="button" class="btn btn-secondary w-100" data-bs-toggle="modal" data-bs-target="#askForPartner">Ask for Partner</button>
        </div>
        <div class="form-floating mb-3">
            <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#deleteAccount">Delete Account</button>
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

<div class="modal fade text-white" id="askForPartner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog text-white">
        <div class="modal-content bg-light-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="Report-modal-label">Ask for Partner</h5>
                <button type="button" class="btn-close btn-close-white " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <p>Please tell us why you should become a partner:</p>
                </div>
                <div class="mb-3">
                    <div class="form-group">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="I should become a partner because..."></textarea>
                </div>
                </div>
                
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
                </form>
            </div>
        
        </div>
    </div>
</div>

<div class="modal fade text-white" id="deleteAccount" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog text-white">
        <div class="modal-content bg-light-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="Report-modal-label">Delete Account</h5>
                <button type="button" class="btn-close btn-close-white " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <p>Do you wish to delete your account?</p>
                    <p class="small">Your profile will be deleted, but your posts will stay in our website.</p>
                </div>
                
                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Delete Account</button>
                </form>
            </div>
        
        </div>
    </div>
</div>

<?php
draw_footer();
?>
