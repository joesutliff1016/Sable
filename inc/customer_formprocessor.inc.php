<?php //customer_formprocessor.php

if($_POST['delete'] == 'y') {

	//delete from database
	$sql = 'DELETE FROM customer
			WHERE customer_id = '.$_POST['customer_id'];


}else if(!empty($_POST['customer_id'])) {
	//update customer
	$sql = "UPDATE customer
			SET
			  customer_first_name	   = '{$_POST['first_name']}',
			  customer_last_name       = '{$_POST['last_name']}',
			  customer_phone		   = '{$_POST['phone']}',
			  customer_fax			   = '{$_POST['fax']}',
			  customer_email           = '{$_POST['email']}',

			  customer_billing_street  = '{$_POST['billing_street']}',
			  customer_billing_street2 = '{$_POST['billing_street2']}',
			  customer_billing_city	   = '{$_POST['billing_city']}',
			  customer_billing_state   = '{$_POST['billing_state']}',
			  customer_billing_zip      = '{$_POST['billing_zip']}',

			  customer_shipping_street  = '{$_POST['shipping_street']}',
			  customer_shipping_street2 = '{$_POST['shipping_street2']}',
			  customer_shipping_city    = '{$_POST['shipping_city']}',
			  customer_shipping_state   = '{$_POST['shipping_state']}',
			  customer_shipping_zip     = '{$_POST['shipping_zip']}'

			 WHERE customer_id          = ".$_POST['customer_id'];




}else {

	$sql = "INSERT INTO customer (
			  customer_first_name,
			  customer_last_name,
			  customer_phone,
			  customer_fax,
			  customer_email,

			  customer_billing_street,
			  customer_billing_street2,
			  customer_billing_city,
			  customer_billing_state,
			  customer_billing_zip,

			  customer_shipping_street,
			  customer_shipping_street2,
			  customer_shipping_city,
			  customer_shipping_state,
			  customer_shipping_zip)

			VALUES (
			'{$_POST['first_name']}',
			'{$_POST['last_name']}',
			'{$_POST['phone']}',
			'{$_POST['fax']}',
			'{$_POST['email']}',

			'{$_POST['billing_street']}',
			'{$_POST['billing_street2']}',
			'{$_POST['billing_city']}',
			'{$_POST['billing_state']}',
			'{$_POST['billing_zip']}',

			'{$_POST['shipping_street']}',
			'{$_POST['shipping_street2']}',
			'{$_POST['shipping_city']}',
			'{$_POST['shipping_state']}',
			'{$_POST['shipping_zip']}'
			)";



}
mysqli_query($db, $sql) or die(mysqli_error($db)."<br />SQL: $sql");

header('Location: admin.php');
exit();




?>
