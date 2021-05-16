@if($pc == True)
    @php ($device = "-pc")
@else 
    @php ($device = "")
@endif

@if ($active == True)            
    <div class="tab-pane fade show active" id="pills-{{$type}}{{$device}}" role="tabpanel" aria-labelledby="pills-{{$type}}-tab{{$device}}">
        @if(count($posts) === 0)
            <p class="text-white text-center h6 pt-4 pb-3">No results found</p>
        @else
            @if ($explore == True)
                <section class="container-xl bg-light-dark text-white p-3 text-center">
                    @include('partials.homepage.explore')
                </section>
            @else
                @foreach($posts as $post)
                    @include('partials.news.post', ['news'=>$post,'type'=>"{{$type}}", 'device'=>"{{$device}}"])
                @endforeach
            @endif            
        @endif
    </div>
@else
    <div class="tab-pane fade show" id="pills-{{$type}}{{$device}}" role="tabpanel" aria-labelledby="pills-{{$type}}-tab{{$device}}">
        @if(count($posts) === 0)
            <p class="text-white text-center h6 pt-4 pb-3">No results found</p>
        @else
            @if ($explore == True)
                <section class="container-xl bg-light-dark text-white p-3 text-center">
                    @include('partials.homepage.explore')
                </section>
            @else
                @foreach($posts as $post)
                    @include('partials.news.post', ['news'=>$post,'type'=>"{{$type}}", 'device'=>"{{$device}}"])
                @endforeach
            @endif
        @endif    
    </div>  
@endif

