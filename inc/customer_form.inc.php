
<p style="width: 100%; text-align: center;">Please enter your billing information.</p>
<div class="form_container">
<form action="<?php print $_SERVER['PHP_SELF']; ?>" method="post">

<?php  if(!empty($_POST['customer_id'])) { ?>
<label for="delete">Delete</label>
<input type="radio" name="delete" id="delete" tabindex="1" value="y"
 title="delete customer"/>Yes
 <input type="radio" name="delete"  tabindex="2" value="n"
 title="delete customer" checked="checked" />No
 <br />

<?php } ?>

<input type="text" name="first_name" tabindex="3" placeholder="First Name"
     value="<?php print $_POST['first_name']; ?>"/>
     <p class="error"><?php if($problem){print $error_messageFirst;}?></p>

<input type="text" name="last_name" tabindex="4" placeholder="Last Name"
     value="<?php print $_POST['last_name']; ?>"/>
     <p class="error"><?php if($problem){print $error_messageLast;}?></p>

<input type="text" name="phone" tabindex="5" placeholder="Phone"
     value="<?php print $_POST['phone']; ?>"/>
     <p class="error"><?php if($problem){print $error_messagePhone1;}?></p>
     <p class="error"><?php if($problem){print $error_messagePhone2;}?></p>

<input type="text" name="email" tabindex="7" placeholder="Email"
     value="<?php print $_POST['email']; ?>"/>
     <p class="error"><?php if($problem){print $error_messageEmail1;}?></p>
     <p class="error"><?php if($problem){print $error_messageEmail2;}?></p>







<input type="text" name="billing_street" tabindex="8" placeholder="Address 1"
     value="<?php print $_POST['billing_street']; ?>"/>
     <p class="error"><?php if($problem){print $error_messageAddress;}?></p>

<input type="text" name="billing_street2" tabindex="9" placeholder="Address 2"
	value="<?php  print $_POST['billing_street2']; ?>"/>

<input type="text" name="billing_city" tabindex="10" placeholder="City"
     value="<?php print $_POST['billing_city']; ?>"/>
     <p class="error"><?php if($problem){print $error_messageCity;}?></p>

<input type="text" name="billing_state" tabindex="11" placeholder="State"
     value="<?php print $_POST['billing_state']; ?>"/>
     <p class="error"><?php if($problem){print $error_messageState;}?></p>

<input type="text" name="billing_zip" tabindex="12" placeholder="Zip Code"
     value="<?php print $_POST['billing_zip']; ?>"/>
     <p class="error"><?php if($problem){print $error_messageZip1;}?></p>
     <p class="error"><?php if($problem){print $error_messageZip2;}?></p>
     <br /><br />



<input type="checkbox" id="use_billing_address" name="use_billing_address"
<?php if(!empty($_POST['use_billing_address'])){print ' checked="checked" ';}  ?>
 tabindex="13" title="use_billing_address"/>
<label for="use_billing_address">Ship to billing address</label><br /><br /><br />

<input type="text" name="shipping_street" tabindex="14" placeholder="Address 1"
     value="<?php print $_POST['shipping_street']; ?>"/>
     <p class="error"><?php if($problem){print $error_messageAddress2;}?></p>

<input type="text" name="shipping_street2" tabindex="15" placeholder="Address 2"
	  value="<?php print $_POST['shipping_street2'];   ?>"/>

<input type="text" name="shipping_city" tabindex="16" placeholder="City"
     value="<?php print $_POST['shipping_city']; ?>"/>
     <p class="error"><?php if($problem){print $error_messageCity2;}?></p>

<input type="text" name="shipping_state" tabindex="17" placeholder="State"
     value="<?php print $_POST['shipping_state']; ?>"/>
     <p class="error"><?php if($problem){print $error_messageState2;}?></p>

<input type="text" name="shipping_zip" tabindex="18" placeholder="Zip Code"
     value="<?php print $_POST['shipping_zip']; ?>"/>
     <p class="error"><?php if($problem){print $error_messageZip3;}?></p>
     <p class="error"><?php if($problem){print $error_messageZip4;}?></p>

<input name="customer_id" type="hidden" value="<?php print $_POST['customer_id']; ?>"/>

<input type="submit" name="submit" value="CONTINUE" tabindex="18"/>
</form>


</div>
