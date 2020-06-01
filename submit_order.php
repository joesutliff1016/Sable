<?php # submit_order.php
//this page inserts the order info into the table
//this page would come after the billing process.
//this page assumes that the billing process worked

//set the page title and include the html header
$page_title = "Sable — Order Confirmation";
include('inc/header2.php');

if(!empty($_POST['submit']) && !empty($_SESSION['total'])) { //total was written to session on view_cart.php, line 114

	//$ignore = array('cart', 'total');
	$ignore = array('category_id', 'quantity', 'cart', 'total', 'loggedin', 'student_loggedin', 'course', 'year',
	'quarter', 'code');

	//insert customer into db
	$sql = "INSERT INTO customer (";
	foreach($_SESSION as $key => $value) {
		if(!in_array($key, $ignore)) {
			$sql .= 'customer_'.$key.', '; //add table name prefix to field names

		}
	}
	$sql = substr($sql, 0, -2).') VALUES ('; // remove last comma and space, and add closing parenthesis
	foreach($_SESSION as $key => $value) {
		if(!in_array($key, $ignore)){
			$sql .= "'$value', ";

		}
	}
	$sql = substr($sql, 0, -2).')'; // remove last comma and space, and add closing parenthesis
	//print '$sql = '.$sql.'<br />';
	mysqli_query($db, $sql) or die(mysqli_error($db)."<br />SQL: $sql");

	//get the customer id
	$customer = mysqli_insert_id($db);

	$sql = "INSERT INTO orders (customer_id, orders_total_cost, orders_paid,
	orders_timestamp) VALUES ($customer, {$_SESSION['total']}, 'y', now())";
	/*assumes the payment has been successfully processed. An alternate method (for instance, when using paypal)
	would be to write the order to the db with orders_paid = 'n', then toggling it to 'y' when you recieve payment
	confirmation from the payment processor.*/
	mysqli_query($db, $sql) or die(mysqli_error($db)."<br />SQL: $sql");

	if(mysqli_affected_rows($db) == 1) { //check if order was written to db
	//get the order id
	$oid = mysqli_insert_id($db);

	//insert the specific order contents into the db
	//include the price from the cart table, because price from the product table
	//can change (you want the price at the time of this order)

	//$sql = "INSERT INTO cart (orders_id, product_id, cart_quantity, cart_price)
	//VALUES ('value1', 'value2', 'value3', 'value4'),
	//('value1', 'value2', 'value3', 'value4'), ('value1', 'value2', 'value3', 'value4')";
	$sql = "INSERT INTO cart (orders_id, product_id, cart_quantity, cart_price)
	VALUES ";
	foreach($_SESSION['cart'] as $pid => $value) {
		$sql .= "($oid, $pid, {$value['quantity']}, {$value['price']}), ";//use curly braces to avoid sql parse errors caused by single quotes
	}
	$sql = substr($sql, 0, -2); //chop off the last two characters
	mysqli_query($db, $sql) or die(mysqli_error($db)."<br />SQL: $sql");

	//report on the success
	if(mysqli_affected_rows($db) == count($_SESSION['cart'])) {
		//close the connection
		mysqli_close($db);

		//message to the customer
		echo '<p class="success">Thank you for your order. You will be notified when the items ship.</p>';

		//send emails and do whatever else

		//clear the cart and customer data from the session
		//unset($_SESSION['cart']);
		$_SESSION = array(); // reset the entire $_SESSION array to delet every session variable
		session_destroy(); //remove all the session data from the server

	}


	}else { //report the problem
		mysqli_close($db);
		echo '<p class="error2">Your order could not be process due to a sytem error. You will be contacted in order to have the problem fixed. we apologize for the incovenience.</p>';
		//send the order information to the administrator here
	}
}else{//report the problem
	mysqli_close($db);
	echo '<p class="error2">Error: You must go through the order process before you can submit an order.</p>';
	//send the order information to the administrator here

}
/*print '<pre>';
print_r($_SESSION);
print '</pre>';*/

include('inc/footer2.php');


?>
