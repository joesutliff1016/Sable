<?php


$page_title = 'Login Form';
include('inc/header2.php');
$email_array = array('user1@site.com', 'user2@site.com', 'user3@site.com');
$pwd_array = array('pass1', 'pass2', 'pass3');

for($i = 0; $i < 3; $i++){
	if(strcasecmp($email_array[$i], $_POST['email']) == 0) {

		if(strcmp($pwd_array[$i],$_POST['password']) == 0) {

			//write session variable
			//redirect to the welcome page
			//exit

			session_start();
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['password'] = $_POST['password'];
			$_SESSION['loggedin'] = time();
			ob_end_clean(); // destroy the buffer
			header('Location: admin.php');
			exit();

		}
	}
}


if($_SERVER['REQUEST_METHOD'] == 'POST') {

	if(!empty($_POST['email']) && !empty($_POST['password'])){

		if((strtolower($_POST['email']) == 'me@example.com') && ($_POST['password'] == 'testpass')) {

			//Do something with sessions
			session_start();
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['loggedin'] = time();

			// Redirect the user to the welcome page
			ob_end_clean(); // destroy the buffer
			header('Location: admin.php');
			exit();


		}else {
			?>
			<p style="color:red; margin-left:10px;">The submitted email address and password do not match those on file!</p>
            <?php

			print '<div style="height:600px;">
   <div style="float:left; width:500px; margin-left:10px;">
      <form action="login.php" method="post">
         <fieldset style="width:500px;">
            <legend>Please enter your information:</legend>
            <label></label>Email Address: <input type="text" name="email" size="20" /><br />
            <label></label>Password: <input type="password" name="password" size="20" /><br />
            <label></label><input type="submit" name="submit" value="Log in!" /><br />
         </fieldset>
      </form>
   </div>
</div>

';
		}

	}else{
			?>
			<p style="color:red; margin-left:10px;">Please make sure you enter both an email address and a password!</p>
            <?php


			print '<div style="height:600px;">
   <div style="float:left; width:500px; margin-left:10px;">
      <form action="login.php" method="post">
         <fieldset style="width:500px;">
            <legend>Please enter your information:</legend>
            <label></label>Email Address: <input type="text" name="email" size="20" /><br />
            <label></label>Password: <input type="password" name="password" size="20" /><br />
            <label></label><input type="submit" name="submit" value="Log in!" /><br />
         </fieldset>
      </form>
   </div>
</div>

';
	}
}
else {

	if(!$_SESSION['loggedin']){
	print '<div style="height:600px;">
   <div style="float:left; width:500px; margin-left:10px;">
      <p style="margin-left:10px;">You must login to access this page!</p>
      <form action="login.php" method="post">
         <fieldset style="width:500px;">
            <legend>Please enter your information:</legend>
            <label></label>Email Address: <input type="text" name="email" size="20" /><br />
            <label></label>Password: <input type="password" name="password" size="20" /><br />
            <label></label><input type="submit" name="submit" value="Log in!" /><br />
         </fieldset>
      </form>
   </div>
</div>

';


	}

}


include('inc/footer2.php');



?>
