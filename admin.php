<?php
$page_title = 'Sable — Admin';

session_start();
unset($_SESSION['product_id']);
unset($_SESSION['category_id']);
unset($_SESSION['name']);
include('inc/header2.php');

// add or edit customer
$sql = 'SELECT
			  customer_first_name,
			  customer_last_name,
			  customer_id
		    FROM customer
		    ORDER BY customer_last_name, customer_first_name ASC';

$result = mysqli_query($db, $sql) or die(mysqli_error($db)."<br />SQL: $sql");
?>
<div style="width: 95%; margin: 0 auto;">
<p>Edit a customer:</p>
<form action="admin_customer_form.php" method="post">
<p>
<select name="customer">
<option value="new">New Customer</option>
<?php
while($row = mysqli_fetch_assoc($result )){
	?>
    <option value="<?php print $row['customer_id'];?>">
	<?php print $row['customer_last_name'].', '.$row['customer_first_name'] ;?></option>
  <?php
}
?>
</select>
<input type="submit" value="Edit" />
</p>
</form>
<br />
<?php
//check to see if administrator is logged in
if(isset($_SESSION['email']) && isset($_SESSION['password'])){
	//include the interior page content
	//print '<p>You are now on the edit product page!</p>';

}else{
	//redirect to the login page
	header('Location: login.php?denied=y');
	exit;
}
$sql = 'SELECT
		    product_id,
		    product_name
		    FROM product
		    ORDER BY product_name ASC';

$result = mysqli_query($db, $sql) or die(mysqli_error($db)."<br />SQL: $sql");
?>
<p>Edit a product:</p>
<p><a href="product_form.php">Add a new product</a></p>
<ul>
<?php
while($row = mysqli_fetch_assoc($result )){
?>
    <li><a href="product_form.php?product_id=<?php print $row['product_id'];?>">
    <?php  print $row['product_name']; ?></a></li>
<?php
}
?>
</ul>
<p><a href="logout.php">Click here to log out!</a></p>
</div>
<?php
include('inc/footer2.php');
?>
