<div class="modal fade text-white" id="partnerRequest" tabindex="-1"
aria-labelledby="Report-modal-label" aria-hidden="true">


<div class="modal-dialog text-white">
<div class="modal-content bg-light-dark text-white">
<div class="modal-header">
    <h5 class="modal-title text-white" id="Report-modal-label">Apply for partner</h5>
    <button type="button" class="btn-close btn-close-white " data-bs-dismiss="modal"
        aria-label="Close"></button>
</div>
<div class="modal-body">
    <form method="post" action="/user/{{$user->username}}/partner_request/"  enctype="multipart/form-data">
        {{csrf_field()}}

    <div class="mb-3">
        <label for="PartnerRequest-modal-description" class="form-label">Tell us why you would be a great partner</label>
        <textarea name="body" id="PartnerRequest-modal-description" class="input form-control" role="textbox"
            rows="4"></textarea>
    </div>

    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</div>
</div>
</div>


<button id="partner_request" class="col-auto align-self-end btn btn-primary" data-bs-toggle="modal" data-bs-target="#partnerRequest">Apply for Partner</a>
