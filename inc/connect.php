<?php
//define login variables

$db_host = 'server128.web-hosting.com';
$db_username = 'joesazim_joesutliff';
$db_password = 'Dragonmonkey1$';
$db_name = 'joesazim_NWSoaps';


//create connection
$db = mysqli_connect($db_host,$db_username, $db_password, $db_name);

//check connection
if(mysqli_connect_errno()){
	echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
}/*else {
	 echo 'Success!';
}

*/

?>
