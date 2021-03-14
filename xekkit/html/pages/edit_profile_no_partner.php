<?php
include_once('../templates/common.php');
draw_header();


include_once('../templates/post.php');

$logged = true;

draw_nav_bar($logged);

$partner = false;

?>

<script src="../js/validate_form.js" defer></script>

<section class="container-xl">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item clickable"><a class="text-decoration-none text-muted" href="profile.php">Profile</a></li>
            <li class="breadcrumb-item active text-white" aria-current="page">Edit Profile</li>
        </ol>
    </nav>
    <section class="p-3">
        <div class="row justify-content-start">
            <h5 class="col-auto text-white"><i class="fas fa-check"></i> x/johndoe</h5>
        </div>

        <div class="row justify-content-start text-white align-items-end mb-3">
            <div class="col-auto">
                <img src="../img/user.png" alt="user image" width="200" height="200">
            </div>
            <div class="col-auto">
                <h6 class="text-muted">Reputation</h6>
                <h2>254,789</h2>

                <a href="edit_profile.php" class="col align-self-end btn btn-primary">Change Photo</a>
            </div>
        </div>
        
    </section>
    <section class="col-lg-8 col-md-9 col-sm-11">
        <form class="p-3 g-3 needs-validation" novalidate>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="inputUsername" placeholder="Username" value="johndoe" required>
                <label for="inputUsername">Username</label>
                <div class="invalid-feedback">
                    Username already in use.
                </div>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="john.doe@mail.com" required>
                <label for="inputEmail" class="form-label">Email</label>
                <div class="invalid-feedback">
                    Email already in use or invalid format.
                </div>
            </div>
            <div class="row g-2">
                <div class="col-7 form-floating mb-3">
                    <input type="password" value="***********" disabled class="form-control" id="inputPassword" placeholder="Password" disabled>
                    <label for="inputPassword" class="form-label">Password</label>
                    <div class="invalid-feedback">
                        Your password must be at least 8 characters long, contain letters and numbers.
                    </div>
                
                </div>
                <div class="col-5 form-floating mb-3">
                    <button type="button" class="btn btn-primary w-100 h-100" data-bs-toggle="modal" data-bs-target="#updatePassword">Change password</button>
                </div>
            </div>
            
            <div class="form-floating mb-3">
                <input type="date" class="form-control" id="inputBirthDate" placeholder="Birth Date" value="1994-06-01" required>
                <label for="inputBirthDate" class="form-label">Birth Date</label>
            </div>

            <div class="form-floating mb-3">
                    <select class="form-select bg-white" id="gender" aria-label="Gender" required>
                        <option></option>
                        <option selected value="0">Male</option>
                        <option value="1">Female</option>
                        <option value="2">Rather Not Say</option>
                    </select>
                    <label for="gender">Gender<label>
                    <div class="invalid-feedback">
                            Please select you gender.
                    </div>
            </div>

            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Leave a comment here" id="description" style="height: 100px">My name is John and I'm a partner example user for this framewhire. My posts are really about any trending topic.</textarea>
                <label for="description">Description (optional)</label>
            </div>

            <div class="form-floating mb-3">
                <button type="submit" class="btn btn-primary w-100">Save Changes</button>
            </div>
        </form>
        <form class="p-3 pt-3 g-3 needs-validation">
            <?php if($partner){ ?>
                <div class="form-floating mb-3">
                    <button type="button" class="btn btn-outline-danger w-100" data-bs-toggle="modal" data-bs-target="#cancelPartnership">Cancel Partnership</button>
                </div>
            <?php } else { ?>
            <div class="form-floating mb-3">
                <button type="button" class="btn btn-secondary w-100" data-bs-toggle="modal" data-bs-target="#askForPartner">Ask for Partner <i class="fas fa-check"></i></button>
            </div>
            <?php } ?>
            <div class="form-floating mb-3">
                <button type="button" class="btn btn-outline-danger w-100" data-bs-toggle="modal" data-bs-target="#deleteAccount">Delete Account</button>
            </div>
        </form>
    </section>
    
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
                
                <button type="submit" class="btn btn-danger" data-bs-dismiss="modal"  onclick="location.href='main.php'">Delete Account</button>
                </form>
            </div>
        
        </div>
    </div>
</div>

<?php
draw_footer();
?>
