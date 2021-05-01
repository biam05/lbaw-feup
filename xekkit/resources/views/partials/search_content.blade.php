<ul class="nav nav-pills mb-3 text-white bg-light-dark" id="search-tab" role="tablist">
    <li class="nav-item " role="presentation">
        <button class="nav-link active text-white" id="search-news-tab" data-bs-toggle="pill" data-bs-target="#search-news" type="button" role="tab" aria-controls="search-news" aria-selected="true">News</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link text-white" id="search-users-tab" data-bs-toggle="pill" data-bs-target="#search-users" type="button" role="tab" aria-controls="search-users" aria-selected="false">Users</button>
</ul>
<section class="tab-content"> 
    <!-- News tab -->
    <div class="tab-pane fade show active" id="search-news" role="tabpanel" aria-labelledby="search-news-tab">
        @include('partials.post')
    </div>

    <!-- Users tab -->
    <div class="tab-pane fade" id="search-users" role="tabpanel" aria-labelledby="search-users-tab">
        <div class="row text-white pt-4 justify-content-evenly">                
            @include('partials.user_card', ['user'=>"x/andre", 'reputation'=>254789, 'partner'=>true])
            @include('partials.user_card', ['user'=>"x/antonio", 'reputation'=>54789, 'partner'=>false])
            @include('partials.user_card', ['user'=>'x/joaquim', 'reputation'=>4789, 'partner'=>false])
            @include('partials.user_card', ['user'=>'x/jorge', 'reputation'=>54579, 'partner'=>false])
        </div>        
        
    </div>
</section>