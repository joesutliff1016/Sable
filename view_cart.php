<?php // view_cart.php
// This page displays the contents of the shopping cart.
// This page also lets the user update the contents of the cart.

$page_title ='Sable — My Cart';
include('inc/header2.php');


// Check if the form has been submitted (to update the cart).
if(isset($_POST['submit'])) { // Check if the form on this page has been submitted

// Change any quantities
foreach($_POST['qty'] as $k => $v ) {

$pid = (int) $k; // type cast the data to be an integer (strings will convert to the integer 0)
$qty = (int) $v;

// Reference:http://www.php.net/manual/en/language.types.type-juggling.php#language.types.type casting

if($qty == 0) { // delete product from cart if quantity is 0
unset($_SESSION['cart'][$pid]);

//update the shopping cart to reflect the changes
header("Refresh:0; url=view_cart.php");
exit();

} elseif($qty > 0) { // change quantity (don't allow negative numbers - it would generate a refund)
$_SESSION['cart'][$pid]['quantity'] = $qty;
}
} // end of FOREACH
} // end of SUBMITTED IF

// Check if the shopping cart is empty
$empty = TRUE;
if(isset($_SESSION['cart'])) {
  foreach($_SESSION['cart'] as $value) {

    if(isset($value)) {
      $empty = FALSE;

      break; // leave the loop
    }
  } // end of foreach
} // end of ISSET IF

// display the cart if it's not empty
if(!$empty) {
// make sure you are connected to your database here (include the connect script in your header file)

// Retrieve all of the information for the products in the cart.
//$sql = "SELECT * FROM product WHERE product_id IN (3,5,22) ORDER BY product_id";
$sql = "SELECT * FROM product WHERE product_id IN (";
foreach($_SESSION['cart'] as $pid => $value) { // (we are re-initializing the $pid variable here)
$sql .= $pid.','; // compile a comma-separated list of the selected product ids
}
$sql = substr($sql, 0, -1).") ORDER BY product_id"; //remove the last comma
$result = mysqli_query($db, $sql); // should I put "or die..." here?


//print 'sql = '.$sql.'<br />'; // test print the SQL query to check its syntax

 // Create a table and a form
?>
<div id="check-out-form">
<p style="text-align: center;">SHOPPING CART</p>
<form action="view_cart.php" method="post">
<table>
  <tr>
    <th class="align_left">ITEM</th>
    <th class="align_left"></th>
    <th class="align_left"></th>
    <th class="align_left">QTY.</th>
    <th class="align_right">PRICE</th>
  </tr>
<?php
// Print each item
$total = 0; // Total cost of the order.
while($row = mysqli_fetch_assoc($result)) {
$subtotal = $_SESSION['cart'][$row['product_id']]['quantity'] *
$_SESSION['cart'][$row['product_id']]['price']; // use cart price in case you have given a discount, and price is different than price in the database.

$total += $subtotal;
//$total = $total + $subtotal;

// print the row
?>
<tr>
<td class="yellow"><img class="cart-photo" src="images/<?php print $row['larger_photo'];?>"
alt="<?php print $row['product_photo_alt_text'];?>"/></td>
<td class="yellow"><?php print $row['product_name']; ?></td>
<td class="yellow align_left"><?php print
$_SESSION['cart'][$row['product_id']]['']; ?></td>
<td class="yellow"><input type="text" size="3" style="text-align:center;"
name="qty[<?php print $row['product_id']; ?>]" value="<?php print
$_SESSION['cart'][$row['product_id']]['quantity']; ?>" /></td>
<td class="yellow align_right">$<?php print number_format($subtotal, 2);
?></td>
</tr>
<?php
} // end while loop
?>
<tr>
<td class="yellow"></td>
<td colspan="3" class="yellow align_right"><strong>Total</strong></td>
<td class="yellow align_right">$<?php print number_format($total, 2); ?></td>
</tr>
</table>
<div id="update">
<button id="update-button" type="submit" name="submit">UPDATE CART</button>
</div>
<div id="checkout">
<button id="checkout-button" type="button" onClick="window.location = './customer_form.php';">CHECKOUT</button>
</div>
</form>
</div>
<?php
// Write order total to a session variable. Because we aren't submitting the data via a form (we go to the next page via a link), the next page will need to be able
//to access it from the session.
$_SESSION['total'] = $total;

/*print '<pre>';
print_r($GLOBALS) ;
print '</pre>';
exit;*/


} else {
  echo '<p style="text-align: center; min-height: 250px;">Your cart is currently empty.</p>';
}


include('inc/footer2.php');


?>
