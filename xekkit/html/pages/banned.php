<?php
include_once('../templates/common.php');
draw_header();
?>

<div class="text-center text-white p-5">
    <img class="mb-3" src="../img/banned.png">
    <span class="display-1 d-block mb-3">Oh no :/</span>
    <div class="mb-4 lead">Looks like you got banned...</div>
    <button type="button" class="btn btn-outline-danger btn-lg" data-bs-toggle="modal" data-bs-target="#unbanAppeal">
        Unban Appeal
    </button>    
    <div class="mb-4 mt-4 lead">Or</div>
    <a href="../pages/main.php" class="btn btn-outline-secondary btn-lg" tabindex="-1" role="button" aria-disabled="true">Logout and go to main page as a guest</a>
</div>

<div class="modal fade text-white" id="unbanAppeal" tabindex="-1" aria-labelledby="newPostLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-light-dark">
        <div class="modal-header">
          <h5 class="modal-title text-white" id="newPostLabel">Unban Appeal</h5>
          <button type="button" class="btn-close btn-close-white " data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p class="text-white">Fill out the form so the moderators can review your unban appeal</p>
          <form>
            <div class="mb-3">
                <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="" required>
                <div class="invalid-feedback">
                    Email already in use or invalid format.
                </div>
            </div>    
            <div class="mb-3">
                <input type="password" value="" class="form-control" id="inputPassword" placeholder="Password">
                <div class="invalid-feedback">
                    Your password must be at least 8 characters long, contain letters and numbers.
                </div>
            </div>
            <div class="mb-3">
              <label for="News-modal-description" class="form-label">Unban Appeal</label>
              <span id="News-modal-description" class="input form-control" role="textbox" rows="3" contenteditable aria-multiline="true">
              </span>
            </div>
            <div class="mb-3">
              <div class="container" id="file-display-area">
              </div>
            </div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" onclick="location.href='banned.php';">Submit</button>
          </form>
        </div>

      </div>
    </div>
  </div>