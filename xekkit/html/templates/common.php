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
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script defer src="https://kit.fontawesome.com/0f8556fd7f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="../css/primary.css">     
        <link rel="stylesheet" href="../css/secondary.css">  
        <link rel="stylesheet" href="../css/success.css">  
        <link rel="stylesheet" href="../css/danger.css">  
        <link rel="stylesheet" href="../css/warning.css">  
        <link rel="stylesheet" href="../css/info.css">  
        <link rel="stylesheet" href="../css/light.css">  
        <link rel="stylesheet" href="../css/dark.css">  
        <link rel="stylesheet" href="../css/light-dark.css">
        <link rel="stylesheet" href="../css/profile.css"> 
        <link rel="stylesheet" href="../css/trending_cards.css"> 
        <link rel="stylesheet" href="../css/post.css">
        <link rel="stylesheet" href="../css/nav_bar.css">         
        <link rel="stylesheet" href="../css/common.css">
        <link rel="stylesheet" href="../css/carousel.css">
    </head>

    <body style="margin-bottom: 60px;">

<?php }


/**
 * Draws the navigation bar for all pages.
 */
function draw_nav_bar()
{ ?>
<nav class="navbar sticky-top navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">
            <img src="../img/logo.png" alt="" width="24" height="24" class="d-inline-block align-top">
            XEKKIT
        </a>
       
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <div class="d-grid gap-2 d-md-block">
            <a class="btn btn-primary" href="../pages/login.php" role="button">Login</a>
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
        
        <nav class="navbar fixed-bottom navbar-expand navbar-dark bg-dark">
            <div class="container-fluid">
                <ul class="navbar-nav me-auto mb-0 ">
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/about_us.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/faq.php">FAQ</a>
                    </li>
                </ul>
                <span class="navbar-text"> &copy; XEKKIT 2021 </span>
                
            </div>
        </nav>
    </body>

    </html>
<?php } ?>
