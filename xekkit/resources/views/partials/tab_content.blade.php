@if($pc == True)
    @php ($device = "-pc")
@else 
    @php ($device = "")
@endif

@if ($active == True)
    <div class="tab-pane fade show active" id="pills-{{$type}}{{$device}}" role="tabpanel" aria-labelledby="pills-{{$type}}-tab{{$device}}">
        @if ($explore == True)
            <section class="container-xl bg-light-dark text-white p-3 text-center">
                @include('partials.homepage.explore')
            </section>
        @else
            @each('partials.news.post', $posts, 'news')
        @endif
        
    </div>
@else
    <div class="tab-pane fade show" id="pills-{{$type}}{{$device}}" role="tabpanel" aria-labelledby="pills-{{$type}}-tab{{$device}}">
        @if ($explore == True)
            <section class="container-xl bg-light-dark text-white p-3 text-center">
                @include('partials.homepage.explore')
            </section>
        @else
            @each('partials.news.post', $posts, 'news')
        @endif
    </div>
@endif
