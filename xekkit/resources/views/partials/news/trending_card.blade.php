<div style="cursor: pointer" onclick="location.href='/news/{{$news->content_id}}'" class="card text-white bg-dark position-relative custom_card">
    @if(isset($news->image))
        <img class="card-img" src={{ asset('storage/img/news/' . $news->image) }} alt="Card image cap">
    @else
        <div class="custom_card bg-light-dark card-img"></div>
    @endif       
    <div class="card-img-overlay d-flex flex-column justify-content-end p-1">
        <h5 class="card-title px-1">{{$news->title}}</h5>
        <div class="d-flex px-1">
            @foreach ($news->tags as $tag)
                <a href="/search?search={{$tag->name}}" class="card-link link-light text-decoration-none">#{{ $tag->name }}</a>
            @endforeach
        
        </div>
        <div class="row pt-1" style="font-size: smaller;">
            <div class="col">  
                <span class="card-text">{{ $news->formatDate() }}</span>
            </div>
            <div class="col">
                <a href="/user/{{$news->content->author->username  }}" class="card-link link-light text-decoration-none">
                    @if($news->content->author->is_partner)
                        <i class="fas fa-check"></i>
                    @endif
                    x/{{ $news->content->author->username  }}
                </a>
            </div>  
        </div>
    </div>
</div>