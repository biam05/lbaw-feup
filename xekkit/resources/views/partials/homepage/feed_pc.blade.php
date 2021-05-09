<nav class="row hidden-md-down">
    <div class="col-12 col-lg-9">
        <ul class="nav nav-pills mb-3 text-white bg-light-dark" id="pills-tab-pc" role="tablist">
            @auth
                @include('partials.tab', ['active' => True, 'type' => 'feed', 'pc' => True, 'name' => "Feed"])
                @include('partials.tab', ['active' => False, 'type' => 'recent', 'pc' => True, 'name' => "Recent"])
            @endauth

            @guest            
                @include('partials.tab', ['active' => True, 'type' => 'recent', 'pc' => True, 'name' => "Recent"])
            @endguest
            
            @include('partials.tab', ['active' => False, 'type' => 'hot', 'pc' => True, 'name' => "Hot"])
        </ul>
        
        <div class="tab-content" id="pills-tabContent-pc">
            @auth
                @include('partials.tab_content', ['active'=>True, 'type'=>'feed', 'pc'=>True, 'explore'=>False, 'posts'=>$feedPosts])
                @include('partials.tab_content', ['active'=>False, 'type'=>'recent', 'pc'=>True, 'explore'=>False, 'posts'=>$recentPosts]) 
            @endauth

            @guest
                @include('partials.tab_content', ['active'=>True, 'type'=>'recent', 'pc'=>True, 'explore'=>False, 'posts'=>$recentPosts]) 
            @endguest 

            @include('partials.tab_content', ['active'=>False, 'type'=>'hot', 'pc'=>True, 'explore'=>False, 'posts'=>$hotPosts]) 
        </div>
    </div>
    <sidebar class="col-lg-3">
        <section class="container bg-light-dark text-white p-3 text-center">
            <h3 class="mb-4">Explore</h3>
            <hr class="text-muted">
            @include('partials.homepage.explore')
        </section>
    </sidebar>
</nav>