<?php function draw_news_modal()
{
?>
  <script defer src="../js/image_preview.js"></script>
  <div id="catch-phrase">
    <h2 class="text-white">Something New? Share with us!</h2>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Make new post
    </button>
  </div>

  <!-- Modal -->
  <div class="modal fade text-white" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog text-white">
      <div class="modal-content bg-light-dark text-white">
        <div class="modal-header">
          <h5 class="modal-title text-white" id="exampleModalLabel">New Post</h5>
          <button type="button" class="btn-close btn-close-white " data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Title</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
              <label for="modal-description" class="form-label">Description</label>
              <span id="modal-description" class="input form-control" role="textbox" rows="3" contenteditable aria-multiline="true">
              </span>
            </div>
            <div class="mb-3">
              <label class="custom-file-upload form-control" id="modal-image">
                <input type="file" name="photo" id="fileToUpload" accept="image/*">
                <i class="fa fa-upload"></i> Image to upload
              </label>
            </div>
            <div class="mb-3">
            <div class="container" id="file-display-area">

            </div>
            </div>
              <div id=error-display-area>
              </div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>

      </div>
    </div>
  </div>

<?php
}
?>