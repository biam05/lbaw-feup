<div class="modal fade text-white" id="stopPartnership" tabindex="-1"
aria-labelledby="Report-modal-label" aria-hidden="true">


<div class="modal-dialog text-white">
<div class="modal-content bg-light-dark text-white">
<div class="modal-header">
    <h5 class="modal-title text-white" id="Report-modal-label">Stop Partnership</h5>
    <button type="button" class="btn-close btn-close-white " data-bs-dismiss="modal"
        aria-label="Close"></button>
</div>
<div class="modal-body">
    <form method="post" action="/user/{{$user->username}}/stop_partnership/"  enctype="multipart/form-data">
        {{csrf_field()}}

    <div class="mb-3">
        <label for="StopPartnership-modal-description" class="form-label">Please confirm your password</label>
        <input type="password" name="password" id="StopPartnership-modal-description" class="input form-control" >
    </div>

    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</div>
</div>
</div>


<button type="submit" id="stop_partnership" class="col-auto align-self-end btn btn-danger" data-bs-toggle="modal" data-bs-target="#stopPartnership">Stop Partnership</a>
