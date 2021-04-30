<script defer src="../js/image_preview.js"></script>
<div class="container-xl">
    <div class="row justify-content-center p-3">
        <div class="col-md-7 col-9">
            <h2 class="text-white text-center">Something New? Share with us!</h2>
        </div>
        <button type="button" class="col-md-2 col-7 btn btn-primary" data-bs-toggle="modal" data-bs-target="#newPost">
            Make new post
        </button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade text-white" id="newPost" tabindex="-1" aria-labelledby="newPostLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-light-dark">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="newPostLabel">New Post</h5>
                <button type="button" class="btn-close btn-close-white " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/news/create/">
                    <div class="mb-3">
                        <label for="News-modal-title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="News-modal-title">
                    </div>

                    <div class="mb-3">
                        <label for="News-modal-tags" class="form-label">Tags</label>
                        <input type="text" class="form-control" id="News-modal-tags">
                        <p id="parentTags"></p>
                    </div>

                    <div class="mb-3">
                        <label for="News-modal-description" class="form-label">Description</label>
                        <span id="News-modal-description" class="input form-control" role="textbox" rows="3" contenteditable aria-multiline="true">
                        </span>
                    </div>
                    <div class="mb-3">
                        <div class="container" id="file-display-area">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="custom-file-upload form-control" id="modal-image">
                            <input type="file" name="photo" id="fileToUpload" accept="image/*">
                            <i class="fa fa-upload"></i> Image/video to upload
                        </label>
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
