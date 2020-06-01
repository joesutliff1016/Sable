<?php // display_order.inc.php
// need to be connected to your database here


//retrieve all of the info for the products in the cart.
//$sql ="SELECT * FROM product WHERE product_id IN (1,3,5) ORDER BY product_id";
$sql = "SELECT * FROM product WHERE product_id IN (";
foreach($_SESSION['cart'] as $pid => $value) {
	$sql .= $pid.','; //compile a comma seperated list of the selected product ids
}
$sql = substr($sql, 0, -1).") ORDER BY product_id"; //remove the last comma
$result = mysqli_query($db, $sql) or die(mysqli_error($db)."<br />SQL: $sql");

//create the table and form

?>
<p>Items to be shipped:</p>
<table>
<tr>
	<th class="yellow align_left">Product Name</th>
    <th class="yellow align_right">Price</th>
    <th class="yellow">Qty</th>
    <th class="yellow align_right">Total Price</th>
</tr>
<?php
//print each item
$total = 0; // total cost of the order
while($row = mysqli_fetch_assoc($result)) {

	//calculate the sub-total and total
	$subtotal = $_SESSION['cart'][$row['product_id']]['quantity'] *
	$_SESSION['cart'][$row['product_id']]['price'];
	$total += $subtotal;

	//print the row
	?>
    <tr>
    	<td class="yellow"><?php print $row['product_name']; ?></td>
        <td class="yellow align_right"><?php print
		 $_SESSION['cart'][$row['product_id']]['price']; ?></td>
        <td class="yellow center"><?php print
		$_SESSION['cart'][$row['product_id']]['quantity']; ?></td>
        <td class="yellow align_right"><?php print number_format($subtotal,2); ?></td>
    </tr>
     <?php

}
?>
<tr>
<td colspan="3" class="yellow align_left"><strong>Total:</strong></td>
<td class="yellow align_right">$<?php print number_format($total,2); ?></td>
</tr>
</table>
<form action="submit_order.php" method="post">
<div id="checkout">
<input id="checkout-button" type="submit" name="submit" value="SUBMIT ORDER" />
</div>
</form>
