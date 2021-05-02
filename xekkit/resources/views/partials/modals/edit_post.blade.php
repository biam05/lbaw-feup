
<!-- Modal -->
<div class="modal fade text-white" id="editPost" tabindex="-1" aria-labelledby="newPostLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-light-dark">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="newPostLabel">New Post</h5>
                <button type="button" class="btn-close btn-close-white " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/news/{{$news->content_id}}/">
                    {{csrf_field()}}
                    @method('patch')
                    <div class="mb-3">
                        <label for="News-modal-title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="News-modal-title" value="{{$news->title}}">

                    </div>

                    <div class="mb-3">
                        <label for="News-modal-description" class="form-label">Description</label>
                        <textarea rows="4" id="News-modal-description" name="description" class="input form-control" role="textbox" rows="3" contenteditable aria-multiline="true">{{$news->content->body}}</textarea>
                    </div>
                    <div class="mb-3">
                        <div class="container" id="file-display-area">
                            @isset($news->image)
                            <img src={{ asset('storage/img/news/' . $news->image) }} width=400>
                            @endisset
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
