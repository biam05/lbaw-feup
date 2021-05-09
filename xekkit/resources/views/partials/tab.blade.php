@if($pc == True)
    @php ($device = "-pc")
@else 
    @php ($device = "")
@endif

<li class="nav-item " role="presentation">        
    @if ($active == True)
        <button class="nav-link active text-white" id="pills-{{$type}}-tab{{$device}}" data-bs-toggle="pill" data-bs-target="#pills-{{$type}}{{$device}}" type="button" role="tab" aria-controls="pills-{{$type}}" aria-selected="true">{{$name}}</button>
    @else
        <button class="nav-link text-white" id="pills-{{$type}}-tab{{$device}}" data-bs-toggle="pill" data-bs-target="#pills-{{$type}}{{$device}}" type="button" role="tab" aria-controls="pills-{{$type}}" aria-selected="false">{{$name}}</button>
    @endif
</li>