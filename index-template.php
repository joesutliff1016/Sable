

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
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Sacramento&display=swap" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <script src="js/jquery.js"></script>
    <title>Sable</title>
  </head>
  <body>
    <header>
      <div class="header-grid">
        <div id="header-row1">
          <nav id="left-nav">
            <ul>
              <li><a href="index.php">HOME</a></li>
              <li>ABOUT</li>
              <li>LOOKBOOK</li>
            </ul>
          </nav>
        </div>
        <div id="header-row2">
          <h1>Sable</h1>
          <p id="bottom">SOAPS & LOTIONS</p>
          <p id="line"></p>
        </div>
        <div id="header-row3">
          <nav id="right-nav">
            <ul>
              <li>BLOG</li>
              <li>STOCKISTS</li>
              <li>CONTACT</li>
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
              <li><a href="index.php">HOME</a></li>
              <li>ABOUT</li>
              <li>LOOKBOOK</li>
              <li>BLOG</li>
              <li>STOCKISTS</li>
              <li>CONTACT</li>
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
        <li><a href="index.php">HOME</a></li>
        <li><a href="#">ABOUT</a></li>
        <li><a href="#">LOOKBOOK</a></li>
        <li><a href="#">BLOG</a></li>
        <li><a href="#">STOCKISTS</a></li>
        <li><a href="#">CONTACT</a></li>
      </ul>
    </nav>
    <div class="one">
      <div class="one-grid">
        <div class="one-grid1">
          <p class="bolder">NEW</p>
          <p class="bolder">SPRING / SUMMER<br />COLLECTION</p>
          <p id="lighter">Our favorite collection yet featuring fresh notes of burgamot and lilac.</p>
          <button type="button" name="button" id="shop-button">SHOP NOW</button>
        </div>
        <div class="one-grid2">
          <img src="images/woman_tub.jpg" alt="Beautiful tub.">
        </div>
      </div>
    </div>
    <div class="one-bottom"></div>
    <div class="two">
      <h2>Crafted with care</h2>
      <div class="intro-grid">
        <div id="grid-one">
          <?php
            // get category data from database

            $sql = 'SELECT * FROM category WHERE category_id = 6';

            $result = mysqli_query($db, $sql) or die(mysqli_error($db)."<br />SQL: $sql");

            while($row = mysqli_fetch_assoc($result)){


            	if( !empty($row['category_photo']) && file_exists('images/'.$row['category_photo']) ) {
            		$photo_dimensions = getimagesize('/images/'.$row['category_photo']);
            	}
            	else {
            		$photo_dimensions = array(3 => 'width="366" height="410"'); // use your default thumbnail dimensions

            	}

            ?>
          <a href="product_page.php?category_id=<?php print $row['category_id'];  ?>"><img src="images/<?php print $row['category_photo'];  ?>"
            <?php print $photo_dimensions[3];   ?> alt="<?php print $row['category_photo_alt_text'];    ?>" /></a>
          <p><?php print $row['name'];?></p>
          <?php
            }
            ?>
        </div>
        <div id="grid-two">
          <?php
            // get category data from database

            $sql = 'SELECT * FROM category WHERE category_id = 2';

            $result = mysqli_query($db, $sql) or die(mysqli_error($db)."<br />SQL: $sql");

            while($row = mysqli_fetch_assoc($result)){


             if( !empty($row['category_photo']) && file_exists('images/'.$row['category_photo']) ) {
               $photo_dimensions = getimagesize('/images/'.$row['category_photo']);
             }
             else {
               $photo_dimensions = array(3 => 'width="366" height="410"'); // use your default thumbnail dimensions

             }

            ?>
          <a href="product_page.php?category_id=<?php print $row['category_id'];  ?>"><img src="images/<?php print $row['category_photo'];  ?>"
            <?php print $photo_dimensions[3];   ?> alt="<?php print $row['category_photo_alt_text'];    ?>" /></a>
          <p><?php print $row['name'];?></p>
          <?php
            }
            ?>
        </div>
        <div id="grid-three">
          <?php
            // get category data from database

            $sql = 'SELECT * FROM category WHERE category_id = 7';

            $result = mysqli_query($db, $sql) or die(mysqli_error($db)."<br />SQL: $sql");

            while($row = mysqli_fetch_assoc($result)){


             if( !empty($row['category_photo']) && file_exists('images/'.$row['category_photo']) ) {
               $photo_dimensions = getimagesize('/images/'.$row['category_photo']);
             }
             else {
               $photo_dimensions = array(3 => 'width="366" height="410"'); // use your default thumbnail dimensions

             }

            ?>
          <a href="product_page.php?category_id=<?php print $row['category_id'];  ?>"><img src="images/<?php print $row['category_photo'];  ?>"
            <?php print $photo_dimensions[3];   ?> alt="<?php print $row['category_photo_alt_text'];    ?>" /></a>
          <p><?php print $row['name'];?></p>
          <?php
            }
            ?>
        </div>
      </div>
    </div>
    <div class="three">
      <h3>Always Organic!</h3>
    </div>
    <div class="four">
      <div id="white">
        <h4>From the blog</h4>
      </div>
      <div id="tan">
        <div id="outer-blog-container">
          <div class="blog-container blog1">
            <img src="./images/blog1.jpg" alt="">
            <h5>OUR FAVORITE SPRING DIY PROJECTS</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              Donec congue, nisl eget consectetur venenatis, sem eros
              bibendum risus, eget sodales elit justo eget enim. Morbi
              feugiat pretium urna, sit amet vestibulum nisl aliquam sed.
              Proin id consectetur nulla, ac mollis massa. Aenean tincidunt
              vulputate lorem, non placerat risus auctor feugiat. In non feugiat
              lacus. Nunc sed tempor est, vel sollicitudin massa. Nullam sit amet
              nisl varius, facilisis turpis non, vulputate mi.
            </p>
          </div>
          <div class="blog-container blog2">
            <img src="./images/blog2.jpg" alt="">
            <h6>GIFT IDEAS FOR SOMEONE SPECIAL</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              Donec congue, nisl eget consectetur venenatis, sem eros
              bibendum risus, eget sodales elit justo eget enim. Morbi
              feugiat pretium urna, sit amet vestibulum nisl aliquam sed.
              Proin id consectetur nulla, ac mollis massa. Aenean tincidunt
              vulputate lorem, non placerat risus auctor feugiat. In non feugiat
              lacus. Nunc sed tempor est, vel sollicitudin massa. Nullam sit amet
              nisl varius, facilisis turpis non, vulputate mi.
            </p>
          </div>
          <div class="blog3">
            <button id="blog-button">VISIT THE BLOG</button>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <div id="footer-grid">
        <div class="footer-row1">
          <nav>
            <p>SHOP</p>
            <ul>
              <li>PRODUCTS</li>
              <li>WHOLESALE</li>
              <li>LOOKBOOK</li>
              <li>STOCKISTS</li>
            </ul>
          </nav>
        </div>
        <div class="footer-row2">
          <nav>
            <P>ABOUT</P>
            <ul>
              <li>OUR STORY</li>
              <li>BLOG</li>
              <li>FAQ</li>
              <li>CONTACT</li>
            </ul>
          </nav>
        </div>
        <div class="footer-row3">
          <nav>
            <P>SOCIAL</P>
            <ul>
              <li>INSTAGRAM</li>
              <li>TWITTER</li>
              <li>FACEBOOK</li>
              <li>PINTEREST</li>
            </ul>
          </nav>
        </div>
        <div class="footer-row4">
          <p id="news">GET NEWS + DEALS</p>
          <form action="#">
            <input type="text" name="email" placeholder="Email Address">
          </form>
          <button id="signup-button">SIGN UP</button>
        </div>
      </div>
      <small>SITE CREATED BY JOE | INSPIRED BY STATION SEVEN "FABLE"</small>
    </footer>
    <script src="js/my_js.js"></script>
  </body>
</html>
<?php
  ob_end_flush(); //end output buffering
  ?>
