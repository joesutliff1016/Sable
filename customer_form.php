<?php // customer_form_help.php
$page_title = "Sable — Checkout";

$problem = FALSE;
$pattern = NULL;
$error_message = NULL;


include('inc/header2.php');


//process form data if submitted
if(isset($_POST['submit']) && !empty($_SESSION['cart'])) {

	//put billing address data into shipping address $_POST variables

	if(!empty($_POST['use_billing_address'])) {
		$_POST['shipping_street'] = $_POST['billing_street'];
		$_POST['shipping_street2'] = $_POST['billing_street2'];
		$_POST['shipping_city'] = $_POST['billing_city'];
		$_POST['shipping_state'] = $_POST['billing_state'];
		$_POST['shipping_zip'] = $_POST['billing_zip'];

		}

	//validate form inputs
	//check that required fields are not empty
	foreach($_POST as $key => $value) {
		if(empty($value) && ($key != 'submit') && ($key != 'billing_street2')
		 && ($key != 'shipping_street2') && ($key != 'fax') && ($key != 'customer_id')) {
			$problem = TRUE;
		}
	}
	if(empty($_POST['first_name'])) {
		$problem = TRUE;
		$error_messageFirst = 'Please enter your first name.';

	}
	if(empty($_POST['last_name'])) {
		$problem = TRUE;
		$error_messageLast = 'Please enter your last name.';

	}
	if(empty($_POST['phone'])) {
		$problem = TRUE;
		$error_messagePhone1 = 'Please enter your phone number.';

	}
	//check phone
	$pattern = '/^\(?(\d{3})\)?[- ]?[. ]?(\d{3})[- ]?[. ]?(\d{4})$/';


	if(!preg_match($pattern, stripslashes(trim($_POST['phone']))) && !empty($_POST['phone'])) {
		$problem = TRUE;
		$error_messagePhone2 = 'Please submit a valid phone number.';
	}
	if(empty($_POST['email'])) {
		$problem = TRUE;
		$error_messageEmail1 = 'Please enter your email.';

	}
	//check email
	$pattern = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';

	if(!preg_match($pattern, stripslashes(trim($_POST['email']))) && !empty($_POST['email'])) {
		$problem = TRUE;
		$error_messageEmail2 = 'Please submit a valid email.';
	}
	if(empty($_POST['billing_street'])) {
		$problem = TRUE;
		$error_messageAddress = 'Please enter your address.';

	}
	if(empty($_POST['billing_city'])) {
		$problem = TRUE;
		$error_messageCity = 'Please enter your city.';

	}
	if(empty($_POST['billing_state'])) {
		$problem = TRUE;
		$error_messageState = 'Please enter your state.';

	}
	if(empty($_POST['billing_zip'])) {
		$problem = TRUE;
		$error_messageZip1 = 'Please enter your zip code.';

	}
	// check billing zip for proper formatting
	$pattern = '/^([0-9]{5})(-[0-9]{4})?$/';

	if(!preg_match($pattern, stripslashes(trim($_POST['billing_zip']))) && !empty($_POST['billing_zip'])) {
		$problem = TRUE;
		$error_messageZip2 = 'Please submit a valid billing zip code.';
	}


		if(empty($_POST['shipping_street'])) {
			$problem = TRUE;
			$error_messageAddress2 = 'Please enter your shipping address.';
		}
		if(empty($_POST['shipping_city'])) {
			$problem = TRUE;
			$error_messageCity2 = 'Please enter your shipping city.';
		}
		if(empty($_POST['shipping_state'])) {
			$problem = TRUE;
			$error_messageState2 = 'Please enter your shipping state.';
		}
		if(empty($_POST['shipping_zip'])) {
			$problem = TRUE;
			$error_messageZip3 = 'Please enter your shipping zip code.';
		}
		// check shipping zip for proper formatting
		$pattern = '/^([0-9]{5})(-[0-9]{4})?$/';

		if(!preg_match($pattern, stripslashes(trim($_POST['shipping_zip']))) && !empty($_POST['shipping_zip'])) {
			$problem = TRUE;
			$error_messageZip4 = 'Please submit a valid shipping zip code.';
		}


	if($problem) {
		//strip slashes from all form inputs (for sticky form)
		foreach($_POST as $key => $value) {
			$_POST[$key] = stripslashes($value);
		}
		//include customer form
		include('inc/customer_form.inc.php');

	}else {
		//if form fields validate display form inputs
		include('inc/display_inputs.inc.php');
	}

}else {
		//show form
		if(!empty($_SESSION['cart'])){ //if cart is not empty...
		include('inc/customer_form.inc.php');

		}else{
			echo '<p class="error2">Your cart is currently empty.</p>';
		}
}

/*
print '<pre>';
print_r($GLOBALS);
print '</pre>';
 */

include('inc/footer2.php');
?>
