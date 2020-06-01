<?php
$page_title = "Logout";
include('inc/header2.php');


//need the session
session_start();


//delete the session variables
unset($_SESSION);

//Destroy the session data
session_destroy();


?>
<div style="height:250px;">
<p style="text-align: center;">You are now logged out.</p>
<p style="text-align: center;"><a href="login.php">Click here to log in again.</a></p>
</div>
<?php

include('inc/footer2.php');

?>
