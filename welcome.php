<?php
session_start();

$page_title = "Welcome!";

include('inc/header2.php');


print '<p style="margin-left:10px;">Hello, ' . $_SESSION['email'] . '!</p>';



//check to see if user is logged in
if(isset($_SESSION['email'])){
	//include the interior page content


}else{
	//redirect to the login page
	header('Location: login2.php?denied=y');
	exit();
}



// Print out how long the user has been logged in
date_default_timezone_set('America/Los_Angeles');

print '<div class="forms"><p>You have been logged in since: '. date('g:i a', $_SESSION['loggedin']) . '</p>';

//Make a logout link
//print '<p><a href="logout.php">Click here to log out.</a></p>';
?>
<p><a href="user_edit_register_form.php?email=<?php print $_SESSION['email'];  ?>">Click here to edit your contact information.</a></p></div>
<?php
include('inc/footer2.php');
?>
