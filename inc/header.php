<?php
  ob_start();
  session_start();
  include('inc/connect.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@600&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Sacramento&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
      <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?php print $css;?>">
      <link rel="stylesheet" type="text/css" href="css/header.css">
      <link rel="stylesheet" type="text/css" href="css/footer.css">
      <script src="js/jquery.js"></script>
      <title><?php print $page_title;?></title>
   </head>
   <body>
      <header>
         <div class="header-grid">
            <div id="header-row1">
               <nav id="left-nav">
                  <ul>
                     <li><a href="home.php">HOME</a></li>
                     <li><a href="about_us.php">ABOUT</a></li>
                     <li><a href="all_products.php">SHOP</a></li>
                  </ul>
               </nav>
            </div>
            <div id="header-row2">
              <a href="home.php">
               <h1>Sable</h1>
               <p id="bottom">SOAP COMPANY</p>
               <img id="line" src="images/line.jpg" alt="">
              </a>
            </div>
            <div id="header-row3">
               <nav id="right-nav">
                  <ul>
                     <li><a href="blog.php">BLOG</a></li>
                     <li><a href="stockists.php">STOCKISTS</a></li>
                     <li><a href="contact_us.php">CONTACT</a></li>
                     <li><a href="view_cart.php"><i class="fas fa-shopping-cart">&nbsp;<?php
                       if(sizeof($_SESSION['cart']) > 0 ){
                         echo sizeof($_SESSION['cart']);
                       }
                       ?></i></a></li>

                  </ul>
               </nav>
            </div>
            <div id="header-row4">
               <nav id="bottom-nav">
                  <ul>
                     <li>HOME</li>
                     <li><a href="about_us.php">ABOUT</a></li>
                     <li><a href="all_products.php">SHOP</a></li>
                     <li><a href="blog.php">BLOG</a></li>
                     <li><a href="stockists.php">STOCKISTS</a></li>
                     <li><a href="contact_us.php">CONTACT</a></li>
                     <li><a href="view_cart.php"><i class="fas fa-shopping-cart">&nbsp;<?php
                       if(sizeof($_SESSION['cart']) > 0 ){
                         echo sizeof($_SESSION['cart']);
                       }
                       ?></i></a></li>
                  </ul>
               </nav>
            </div>
         </div>
         <nav id="navPhone">
           <div class="bars"></div>
           <div class="bars"></div>
           <div class="bars"></div>
         </nav>
         <nav id="cart">
           <ul>
             <li><a href="view_cart.php"><i class="fas fa-shopping-cart">&nbsp;<?php
               if(sizeof($_SESSION['cart']) > 0 ){
                 echo sizeof($_SESSION['cart']);
               }
               ?></i></a></li>
           </ul>
         </nav>
         </header>
         <nav id="nav">
           <ul id="navPhoneMenu">
             <li><a href="home.php">HOME</a></li>
             <li><a href="about_us.php">ABOUT</a></li>
             <li><a href="all_products.php">SHOP</a></li>
             <li><a href="blog.php">BLOG</a></li>
             <li><a href="stockists.php">STOCKISTS</a></li>
             <li><a href="contact_us.php">CONTACT</a></li>
           </ul>
         </nav>
