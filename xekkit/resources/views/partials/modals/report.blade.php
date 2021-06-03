@if ($type == 'news' || $type == 'comment')
    <div class="modal fade text-white" id="reportContent_{{ $report_to_id }}_{{ $tab ?? '' }}_{{ $device ?? '' }}"
        tabindex="-1" aria-labelledby="Report-modal-label" aria-hidden="true">
@endif
@if ($type == 'user')
    <div class="modal fade text-white" id="reportUser_{{ $report_to_id }}" tabindex="-1"
        aria-labelledby="Report-modal-label" aria-hidden="true">
@endif

<iframe name="dummyframe" id="dummyframe" style="display:none"></iframe>

<div class="modal-dialog text-white">
    <div class="modal-content bg-light-dark text-white">
        <div class="modal-header">
            <h5 class="modal-title text-white" id="Report-modal-label">Report form</h5>
            <button type="button" class="btn-close btn-close-white " data-bs-dismiss="modal"
                aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @if ($type == 'news')
                <form  enctype="multipart/form-data" target="dummyframe">
            @endif
            @if ($type == 'comment')
                <form  enctype="multipart/form-data" target="dummyframe">
            @endif
            @if ($type == 'user')
                <form  enctype="multipart/form-data" target="dummyframe">
            @endif
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="Report-modal-description" class="form-label">Reason to Report</label>
                <textarea name="body" id="Report-modal-description" class="input form-control" role="textbox"
                    rows="4"></textarea>
            </div>

            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button  class="btn btn-primary" data-bs-dismiss="modal" onclick="report('{{$type}}','{{$tab ?? ''}}','{{$device ?? ''}}', {{$report_to_id}})">Submit</button>
            </form>
        </div>

    </div>
</div>
</div>

<script defer src="{{ asset('js/report.js') }}"></script>

