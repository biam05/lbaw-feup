<?php

include_once('toast.php');

/**
 * Draws the header for all pages.
 */
function draw_header()
{ ?>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XEKKIT</title>
    <link rel="icon" 
      type="image/png" 
      href="../img/newlogo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script defer src="https://kit.fontawesome.com/0f8556fd7f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/colors/primary.css">
    <link rel="stylesheet" href="../css/colors/secondary.css">
    <link rel="stylesheet" href="../css/colors/success.css">
    <link rel="stylesheet" href="../css/colors/danger.css">
    <link rel="stylesheet" href="../css/colors/warning.css">
    <link rel="stylesheet" href="../css/colors/info.css">
    <link rel="stylesheet" href="../css/colors/light.css">
    <link rel="stylesheet" href="../css/colors/dark.css">
    <link rel="stylesheet" href="../css/colors/light-dark.css">
    <link rel="stylesheet" href="../css/about_us.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/carousel.css">
    <link rel="stylesheet" href="../css/news_modal.css">
    <link rel="stylesheet" href="../css/search.css">
    
</head>

<?php 

draw_toast();

}


/**
 * Draws the navigation bar for all pages.
 */
function draw_nav_bar($logged = true)
{ ?>
    
    <body style="margin-bottom: 60px;">

    <script defer src="../js/nav_bar_search.js"></script>
    <!-- navbar-expand-lg-->
    <nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-dark custom_navbar">
        <div class="container-xl p-1">
            <!-- Logo -->
            <?php if ($logged) { ?>
                <a class="navbar-brand" href="../pages/main_logged_in.php">
                <img src="../img/newlogo.png" alt="" width="30" height="30" class="d-inline-block align-top">
                XEKKIT
                </a>
            <?php } else { ?>
                <a class="navbar-brand" href="../pages/main.php">
                <img src="../img/newlogo.png" alt="" width="30" height="30" class="d-inline-block align-top">
                XEKKIT
                </a>
             <?php } ?>
            

            <!-- Mobile search and notifications -->
            <div class="mobile ms-auto">
                <a href="javascript:void(0)"><i onclick="openSearchBar()" class="text-white clickable fas fa-search me-3"></i></a>
                <?php if ($logged) { ?>
                <a href="../pages/notifications.php"><i class="bell-notification fas fa-bell"></i></a>
                <?php } ?>
            </div>

            <!-- responsive right toggler-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse gap-4" id="navbarSupportedContent">
                <!-- Desktop search bar -->
                <form class="desktop d-flex flex-grow-1 justify-content-center" action="../pages/search.php">
                    <input class="form-control" style="max-width:300px;" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success ms-1" type="submit"><i class="fas fa-search"></i></button>
                </form>
                
                <?php if ($logged) { ?>
                    <!-- Desktop right side of nav bar -->
                    <div class="desktop ms-auto gap-2">
                        <div class="row">
                            <a href="../pages/notifications.php" class="col-auto align-self-center"><i class="bell-notification fas fa-bell"></i></a>
                                
                            <div class="col-auto nav-item navbar-nav dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Hello, johndoe!
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="../pages/profile.php">My Profile</a></li>
                                    <li><a class="dropdown-item" href="../pages/login.php">Logout</a></li>
                                </ul>
                                    
                            </div>
                        </div>
                    </div>

                    <!-- Mobile right side of nav bar -->
                    <ul class="mobile navbar-nav ms-auto my-2 my-lg-0 gap-2 p-2 text-end bg-light-dark">
                        <li class="nav-item p-1">
                            <h3 class="text-white">Hello, johndoe!</h3>
                        </li>
                        <li class="nav-item p-1">
                            <a href="../pages/profile.php" class="nav-link">My Profile</a>
                        <li class="nav-item p-1">
                            <a href="../pages/login.php" class="nav-link">Logout</a>
                        </li>
                    </ul>
                <?php } else { ?>
                    <!-- Desktop and Mobile right side of nav bar -->
                    <ul class="navbar-nav ms-auto my-2 my-lg-0 gap-2">
                        <li class="nav-item">
                            <a class="btn btn-outline-primary" href="../pages/login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-primary" href="../pages/register.php">Register</a>
                        </li>
                    </ul>
                <?php } ?>
            </div>
        </div>
        <div id="search-bar-mobile" class="mobile search-form-mobile w-100 p-2">
            <form class="d-flex flex-grow-1 justify-content-center" action="../pages/search.php">
                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success ms-1" type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </nav>
<?php }


/**
 * Draws the footer for all pages.
 */
function draw_footer()
{ ?>

<footer class="footer fixed-bottom mt-auto py-3 bg-dark">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-2 col-sm-3 col-4 d-flex justify-content-between">
                <a href="../pages/about_us.php" class="text-light text-decoration-none fs-6">About</a>
                <a href="../pages/faq.php" class="text-light text-decoration-none fs-6">FAQ</a>
            </div>
            <div class="col-md-10 col-sm-9 col-8 text-end">
                <span class="text-light fs-6"> &copy; XEKKIT <?= date('Y') ?> </span>
            </div>
        </div>
    
    
    </div>
</footer>

<script defer src="../js/main.js"></script>
</body>

</html>
<?php } ?>
