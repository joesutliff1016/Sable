<?php //display_inputs.inc.php
$message = '<table class="review">';

foreach($_POST as $key => $value) {
	//write table rows for all fields except the omit fields
	if(!empty($value) && ($key != 'use_billing_address') && ($key != 'submit') ) {

		$_SESSION[$key] = $value; //write $_POST value to the $_SESSION (these are the customer data fields)

		$key = str_replace('_', ' ', $key);
		$key = ucwords($key);
		$value = stripslashes($value);
		$message .= "<tr>
							<td>$key:</td>
							<td>$value</td>
							</tr>
							";
	}
}
$message .= '</table>';
print '<div class="review-container">';
print '<p>Please verify your information:</p>'.$message;

//Display shopping cart contents
include('inc/display_order.inc.php');
print '</div>';

//test print session values
/*print '<pre>';
print_r($_SESSION);
print '</pre>';*/

 ?>
