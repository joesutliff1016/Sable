<?php
$css = "css/home.css";
$page_title = "Sable";
include('inc/header.php');
?>

         <div class="one">
           <div class="one-grid">
           <div class="one-row1">
             <p id="new">New</p>
             <p class="bolder">SPRING / SUMMER<br />COLLECTION</p>
             <p id="lighter">Our favorite collection yet featuring fresh notes of burgamot and lilac.</p>
             <form action="all_products.php">
             <button type="submit" id="shop-button">SHOP NOW</button>
             </form>
           </div>
           <div class="one-row2">
            <img src="images/woman_tub.jpg" alt="Beautiful tub.">
          </div>
         </div>
       </div>

       <div class="one-bottom"></div>
      <div class="two">
         <h2>Crafted with care</h2>
         <div class="two-grid">
            <div id="two-row1">
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
            <div id="two-row2">
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
            <div id="two-row3">
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

        <div id="three-grid">
          <div id="three-row1">
             <img id="video" src="images/washing_hands.jpg" alt="">
             <i class="fas fa-play-circle"></i>
          </div>

          <div id="three-row2">
            <div id="about">
            <h3>Team</h3>
            <p>WE'RE JACOB +<br />MADISON</p>
            <form action="about_us.php">
            <button type="submit" name="button" id="about-button">READ OUR STORY</button>
            </form>
          </div>
          </div>

       </div>
      </div>
      <div class="four">
        <div id="white">
          <h4>From the blog</h4>
        </div>
        <div id="tan"></div>
            <div id="four-grid">
            <div class="blog-container four-row1">
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
            <div class="blog-container four-row2">
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
            <div class="four-row3">
              <form action="blog.php">
                <button type="submit" id="blog-button">VISIT THE BLOG</button>
              </form>
            </div>
          </div>
      </div>
      <?php include('inc/footer.php'); ?>
