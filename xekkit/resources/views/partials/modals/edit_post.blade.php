{{-- <script defer src={{ asset('js/image_preview.js') }}></script>
 --}}
<!-- Modal -->
<div class="modal fade text-white" id="editPost" tabindex="-1" aria-labelledby="newPostLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-light-dark">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="newPostLabel">New Post</h5>
                <button type="button" class="btn-close btn-close-white " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="patch" action="/news/{edit}/"">
                    {{csrf_field()}}
                    <div class="mb-3">
                        <label for="News-modal-title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="News-modal-title" value="teste">
                    </div>

                    <div class="mb-3">
                        <label for="News-modal-tags" class="form-label">Tags</label>
                        <input type="text" name="tags" class="form-control" id="News-modal-tags" value="pop music">
                        <p id="parentTags"></p>
                    </div>

                    <div class="mb-3">
                        <label for="News-modal-description" class="form-label">Description</label>
                        <span id="News-modal-description" name="description" class="input form-control" role="textbox" rows="3" contenteditable aria-multiline="true">
                            The 19-year-old singer felt 'embarrassed' to accept the night's biggest honour for 'Everything I Wanted' because she was thought Megan Thee Stallion 'deserved' it more for 'Savage', her collaboration with Beyonce.
                        </span>
                    </div>
                    <div class="mb-3">
                        <div class="container" id="file-display-area">
                            <img src={{ asset('img/billieeilish.jpg') }} width=400>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="custom-file-upload form-control" id="modal-image">
                            <input type="file" name="image" id="fileToUpload" accept="image/*">
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
