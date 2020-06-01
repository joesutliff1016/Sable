<?php // customer_form_help.php
$page_title = "Sable — Registration";

$problem = FALSE;
$pattern = NULL;
$error_message = NULL;
session_start();

include('inc/header2.php');


//print '<p>Hello, ' . $_SESSION['email'] . '!</p>';

//check to see if administrator is logged in
if(isset($_SESSION['email'])){
	//include the interior page content
	//print '<p>You are now on the customer form page!</p>';


}else{
	//redirect to the login page
	header('Location: login2.php?denied=y');
	exit;
}


//edit existing customer

if(is_numeric($_POST['customer'])) {

$_POST['customer_id'] = $_POST['customer'];

//get customer from database
$sql = 'SELECT *
		FROM customer
		WHERE customer_id = '.$_POST['customer_id'];

	$result = mysqli_query($db, $sql) or die(mysqli_error($db)."<br />SQL: $sql");
	$row = mysqli_fetch_assoc($result);

	foreach($row as $key => $value) {
		$key = substr($key, 9); // strip off "customer_"
		$_POST[$key] = $value; // put values into $_POST array for use in sticky form

	}
}


//process form data if submitted
if(isset($_POST['submit'])) {

	if($_POST['delete'] != 'y') {

		//put billing address data into shipping address $_POST variables
		if(!empty($_POST['use_billing_address'])) {
			$_POST['shipping_street'] = $_POST['billing_street'];
			$_POST['shipping_street2'] = $_POST['billing_street2'];
			$_POST['shipping_city'] = $_POST['billing_city'];
			$_POST['shipping_state'] = $_POST['billing_state'];
			$_POST['shipping_zip'] = $_POST['billing_zip'];

		}



	//validate form inputs
	//check that recquired fields are not empty
	foreach($_POST as $key => $value) {
		if(empty($value) && ($key != 'submit') && ($key != 'billing_street2') && ($key != 'shipping_street2') && ($key != 'fax') && ($key != 'customer_id')) {
			$problem = TRUE;

			$key = str_replace('_', ' ', $key);// convert "first_name" to "first name"
		    $key = ucwords($key); //convert "first name" to "First Name"
			$error_message .= $key.' is a required field.<br />';
		}
	}

	// check billing zip for proper formatting
	$pattern = '/^([0-9]{5})(-[0-9]{4})?$/';

	if(!preg_match($pattern, stripslashes(trim($_POST['billing_zip']))) && !empty($_POST['billing_zip'])) {
		$problem = TRUE;
		$error_message .= 'Please submit a valid billing zip code.<br />';
	}

	//validate shipping zip, email, phone, and fax formats here

	// check shipping zip for proper formatting
	$pattern = '/^([0-9]{5})(-[0-9]{4})?$/';

	if(!preg_match($pattern, stripslashes(trim($_POST['shipping_zip']))) && !empty($_POST['shipping_zip'])) {
		$problem = TRUE;
		$error_message .= 'Please submit a valid shipping zip code.<br />';
	}
	//check email
	$pattern = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';

	if(!preg_match($pattern, stripslashes(trim($_POST['email']))) && !empty($_POST['email'])) {
		$problem = TRUE;
		$error_message .= 'Please submit a valid email.<br />';
	}
	//check phone
	$pattern = '/^\(?(\d{3})\)?[- ]?[. ]?(\d{3})[- ]?[. ]?(\d{4})$/';


	if(!preg_match($pattern, stripslashes(trim($_POST['phone']))) && !empty($_POST['phone'])) {
		$problem = TRUE;
		$error_message .= 'Please submit a valid phone number.<br />';
	}
	//check fax
	$pattern = '/^\(?(\d{3})\)?[- ]?[. ]?(\d{3})[- ]?[. ]?(\d{4})$/';

	if(!preg_match($pattern, stripslashes(trim($_POST['fax']))) && !empty($_POST['fax'])) {
		$problem = TRUE;
		$error_message .= 'Please submit a valid fax.<br />';
	}
    } //end delete IF




	if($problem) {
		////// include sticky customer form
		print "<p class=\"error\">$error_message</p>";
		include('inc/customer_form.inc.php');


	} else { // if form fields all validate...
	// display form inputs here
		//print 'Data validates';
		include('inc/customer_formprocessor.inc.php');

	}

} else {
	include('inc/customer_form.inc.php');
}

include('inc/footer2.php');


?>
