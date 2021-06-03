@if($pc == True)
    @php ($device = "-pc")
@else 
    @php ($device = "")
@endif

<li class="nav-item " role="presentation">        
    @if ($active == True)
        <button 
            class="nav-link active text-white clickable" 
            id="pills-{{$type}}-tab{{$device}}" 
            data-bs-toggle="pill" 
            data-bs-target="#pills-{{$type}}{{$device}}" 
            type="button" 
            role="tab" 
            aria-controls="pills-{{$type}}" 
            aria-selected="true"
            data-bs-toggle="tooltip" 
            data-bs-placement="bottom" 
            title="Visit {{$name}}"
        >
            {{$name}}
        </button>
    @else
        <button 
            class="nav-link text-white clickable" 
            id="pills-{{$type}}-tab{{$device}}" 
            data-bs-toggle="pill" 
            data-bs-target="#pills-{{$type}}{{$device}}" 
            type="button" 
            role="tab" 
            aria-controls="pills-{{$type}}" 
            aria-selected="false"
            data-bs-toggle="tooltip" 
            data-bs-placement="bottom" 
            title="Visit {{$name}}"
        >
            {{$name}}
        </button>
    @endif
</li>