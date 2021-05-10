<div class="modal fade text-white" id="reportModal_{{$report_to_id}}" tabindex="-1" aria-labelledby="Report-modal-label" aria-hidden="true">
    <div class="modal-dialog text-white">
        <div class="modal-content bg-light-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="Report-modal-label">Report form</h5>
                <button type="button" class="btn-close btn-close-white " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                 @if ($type=="news")
                <form method="post" action="/news/{{$report_to_id}}/report/" enctype="multipart/form-data">
                @endif
                @if ($type=="comment")
                <form method="post" action="/comment/{{$report_to_id}}/report/" enctype="multipart/form-data">
                @endif
                @if ($type=="user")
                <form method="post" action="/user/{{$report_to_id}}/report/" enctype="multipart/form-data">
                @endif  
                    {{csrf_field()}}
                    <div class="mb-3">
                        <label for="Report-modal-description" class="form-label">Reason to Report</label>
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