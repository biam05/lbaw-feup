<?php

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
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/post.css">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/carousel.css">
    <link rel="stylesheet" href="../css/faq.css">
    <link rel="stylesheet" href="../css/requests.css">
    <link rel="stylesheet" href="../css/news-modal.css">
    <link rel="stylesheet" href="../css/search.css">
    <link rel="stylesheet" href="../css/about_us.css">
</head>

    <body style="margin-bottom: 60px;">

<?php }


/**
 * Draws the navigation bar for all pages.
 */
function draw_nav_bar()
{ ?>
    <nav class="navbar sticky-top navbar-expand-sm navbar-dark bg-dark custom_navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">
                <img src="../img/logo.png" alt="" width="24" height="24" class="d-inline-block align-top">
                XEKKIT
            </a>
            
            <form class="d-flex nav-search-form"  action="../pages/search.php">
                <input class="form-control me-2 border-0" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
            </form>
            <div class="d-grid gap-2 d-md-block">
                <a class="btn btn-outline-primary" href="../pages/login.php" role="button">Login</a>
                <a class="btn btn-primary" href="../pages/register.php" role="button">Register</a>
            </div>
            
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
    </body>

</html>
<?php } ?>
