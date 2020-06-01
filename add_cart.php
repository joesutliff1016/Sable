<?php
 //add cart
//this page adds products to the shopping cart

//set the page title and include the html header
$page_title = 'Add to Cart';
include('inc/header.php');

if(is_numeric($_POST['quantity']) && is_numeric($_POST['pid'])) {
	//check for a product id and quantity


	//get the price information, and add product to the cart

	$sql = 'SELECT product_price
			FROM product
			WHERE product_id = '.$_POST['pid'];

	//take this off when finished with site. Too much info for hackers!
	//comment out after $sql)
	$result = mysqli_query($db, $sql) or die(mysqli_error($db)."<br />
	SQL: $sql");

	$row = mysqli_fetch_assoc($result);

	if(mysqli_num_rows($result) == 1) {

		//add product to shopping cart
		$_SESSION['cart'][$_POST['pid']] = array(
												  'quantity' => $_POST['quantity'],
												  'price'    => $row['product_price']
												);


	//redirect to product page
	header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;

	}else {//not valid product id
		echo '<div class="error center">This page has been accessed in error!</div>';

	}

}else {//no product id, or no quantity
	echo '<div class="error center">This page has been accessed in error!</div>';
}

include('inc/footer.php');
?>
