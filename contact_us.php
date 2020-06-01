<?php
$css = "css/contact_us.css";
$page_title = "Sable –– Contact Us";
include('inc/header.php');
?>

         <div id="contact">
           <div id="container">
           <div id="left">
           <img src="images/contact.jpg" alt="">
           </div>
           <div id="right">
             <h2>Get in touch</h2>
             <p id="bolder">WE CAN'T WAIT TO HEAR FROM YOU!</p>
             <P id="lighter">Have a question about our soap? Curious about wholesale?
               Send us a message using the form below and we’ll get back to
               you as soon as we can. You can also find us at the places below!</P>
             <div id="icons">
               <i class="fab fa-twitter"></i>
               <i class="fab fa-facebook-f"></i>
               <i class="fab fa-pinterest"></i>
               <i class="fab fa-instagram"></i>
             </div>


          <form id="contact-form" action="/action_page.php">

            <label id="row1">Name *</label>
            <input id="row2" type="text" name="firstname">
            <label id="row3" class="small">First Name</label>

            <input id="row4" type="text" name="lastname">
            <label id="row5" class="small">Last Name</label>

            <label id="row6">Email Adress *</label>
            <input id="row7" type="email" name="email">

            <label id="row8">Subject *</label>
            <input id="row9" type="text" name="lastname">

            <label id="row10">Message *</label>
            <textarea id="row11" name="message" style="height:200px"></textarea>

            <input class="button" id="row12" type="submit" value="SUBMIT">
          </form>
          </div>
         </div>
         </div>
<?php
include('inc/footer.php');
?>
