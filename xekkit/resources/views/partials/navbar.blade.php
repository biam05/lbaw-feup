
<nav class="navbar sticky-top navbar-expand-sm navbar-dark custom_navbar">
    <!-- TODO ver se está logged in na base de dados -->
    <!-- TODO buscar o nome do user à base de dados-->
    <div class="container-xl p-1">
        <!-- Logo -->
        @guest
            <a class="navbar-brand clickable" href="{{ route('home') }}">
            <img src="../img/newlogo.png" alt="" width="30" height="30" class="d-inline-block align-top spin">
            {{ config('app.name', 'Laravel') }}
            </a>
        @endguest
        @auth
            <a class="navbar-brand clickable" href="{{ route('home') }}">
            <img src="../img/newlogo.png" alt="" width="30" height="30" class="d-inline-block align-top spin">
            XEKKIT
            </a>
        @endauth
        

        <!-- Mobile search and notifications -->
        <div class="mobile ms-auto pe-2">
            <a href="javascript:void(0)"><i onclick="openSearchBar()" class="text-white clickable fas fa-search me-3"></i></a>
            @auth
            <a href="../pages/notifications.php"><i class="bell-notification fas fa-bell"></i></a>
            @endauth
        </div>

        <!-- responsive right toggler-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse gap-4" id="navbarSupportedContent">
            <!-- Desktop search bar -->
            <form class="desktop d-flex flex-grow-1 justify-content-center" action="{{ route('search') }}" method="get">
                <input class="form-control" style="max-width:300px;" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success ms-1" type="submit"><i class="fas fa-search"></i></button>
            </form>
            
            @auth
                <!-- Desktop right side of nav bar -->
                <div class="desktop ms-auto d-inline-flex">
                    
                        <a href="../pages/notifications.php" class="align-self-center"><i class="bell-notification fas fa-bell"></i></a>
                            
                        <div class="nav-item navbar-nav dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hello, {{Auth::user()->username}}!
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="../pages/profile.php">My Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                            </ul>
                                
                        </div>
                    
                </div>

                <!-- Mobile right side of nav bar -->
                <ul class="mobile navbar-nav ms-auto my-2 my-lg-0 gap-2 p-2 text-end bg-light-dark">
                    <li class="nav-item p-1">
                        <h3 class="text-white">Hello, {{Auth::user()->username}}!</h3>
                    </li>
                    <li class="nav-item p-1">
                        <a href="../pages/profile.php" class="nav-link">My Profile</a>
                    <li class="nav-item p-1">
                        <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                    </li>
                </ul>
            @endauth
            @guest
                <!-- Desktop and Mobile right side of nav bar -->
                <ul class="navbar-nav ms-auto my-2 my-lg-0 gap-2">
                    <li class="nav-item ms-auto">
                        <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item ms-auto">
                        <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            @endguest
        </div>
    </div>
    <div id="search-bar-mobile" class="mobile search-form-mobile w-100 p-2">
        <form class="d-flex flex-grow-1 justify-content-center" action="{{ route('search') }}" method="get">
            <input class="form-control" type="search" placeholder="Search" name="search" aria-label="Search">
            <button class="btn btn-outline-success ms-1" type="submit"><i class="fas fa-search"></i></button>
        </form>
    </div>
</nav>

<script defer src="../js/nav_bar_search.js"></script>
