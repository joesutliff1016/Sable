
<?php
$page_title = 'Add Product';
include('inc/header2.php');
include('inc/upload_photo.inc.php');



//print '<p>Hello, ' . $_SESSION['email'] . '!</p>';

//check to see if administrator is logged in
if(isset($_SESSION['email'])){
	//include the interior page content
	//print '<p>You are now on the product form page!</p>';


}else{
	//redirect to the login page
	header('Location: login2.php?denied=y');
	exit;
}


if(!empty($_GET['product_id'])){
	$_SESSION['product_id'] = $_GET['product_id'];
	//get product data from the database
	$sql = 'SELECT * FROM product WHERE product_id = '.$_SESSION['product_id'];

	$result = mysqli_query($db, $sql) or die(mysqli_error($db)."<br />SQL: $sql");

	$row = mysqli_fetch_assoc($result);

	$_SESSION['category_id'] = $row['category_id'];


}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$problem = false;

	if(empty($_POST['name'])) {
	$problem = true;
	$error_message .= 'Please enter a product name.<br />';
	}
	if(empty($_POST['description'])) {
	$problem = true;
	$error_message .= 'Please enter a product description.<br />';
	}
	if(empty($_POST['price'])) {
	$problem = true;
	$error_message .= 'Please enter a product price.<br />';
	}
	if ($_POST['category_id'] == 'select') {
	$problem = true;
	$error_message .= 'Please select a product category.<br />';
	}

	$pattern = '/^(\d*([.,](?=\d{3}))?\d+)+((?!\2)[.,]\d\d)?$/';

	if(!preg_match($pattern, $_POST['price']) && !empty($_POST['price'])) {
	$problem = true;
	$error_message .= 'Please enter a valid product price.';
	}
	if($problem) {
	print "<p class=\"error\">$error_message</p>";

	}
}


  if(!empty($_SESSION['product_id'])){
	//get product data from the database
	$sql = 'SELECT * FROM product WHERE product_id = '.$_SESSION['product_id'];

	$result = mysqli_query($db, $sql) or die(mysqli_error($db)."<br />SQL: $sql");

	$row = mysqli_fetch_assoc($result);

}



	if(empty($_POST['submit']) || $problem == true) {?>
	<div>
	<form enctype="multipart/form-data" action="<?php  print $_SERVER['PHP_SELF'];
	?>" method="post" id="f">

	<fieldset>
	<legend>Please fill out this form to register your product.</legend>

	<?php if(!empty($_SESSION['product_id'])) { ?>
	<label for="delete">Delete this product</label>
	<input type="radio" name="delete" id="delete" tabindex="1" value="y"
	title="delete product"/> Yes
	<input type="radio" name="delete" tabindex="2" value="n" title="delete
	product" checked="checked" /> No
	<br />
	<?php } ?>

	<label>Product Name: </label>
	<input type="text" name="name" size="30" tabindex="3" value="<?php print $row['product_name'];?>"/>
	<br />

	<label>Description: </label>
	<textarea name="description" rows="3" cols="25" tabindex="4"><?php print $row['product_description'];?></textarea>
	<br />

	<label>Price: </label>
	<input type="text" name="price" size="30" tabindex="5" value="<?php print $row['product_price'];?>"/>
	<br />

	<label>Category: </label>
  <select name="category_id" tabindex="6">
	<option value="select">select</option>
	<?php
	$sql = 'SELECT * FROM category';
	$result = mysqli_query($db, $sql) or die(mysqli_error($db)."<br />SQL: $sql");
	while($row = mysqli_fetch_assoc($result )){
	?>
  <option value="<?php print $row['category_id'];?>">
	<?php print $row['name'];?></option>
  <?php
	}
	?>
	</select>
  <br />

  <?php

  if(!empty($_SESSION['product_id'])){
	//get product data from the database
	$sql = 'SELECT * FROM product WHERE product_id = '.$_SESSION['product_id'];

	$result = mysqli_query($db, $sql) or die(mysqli_error($db)."<br />SQL: $sql");

	$row = mysqli_fetch_assoc($result);

}
?>



	<?php if(!empty($_SESSION['product_id'])){ ?>
	<label for="delete_photo">Delete Existing Photo?</label>
	<input type="radio" name="delete_photo" id="delete_photo" tabindex=""
	value="yes" title="delete_photo"/>Yes
	<input type="radio" name="delete_photo" tabindex="7" value="no" title="delete_photo"
	checked="checked" /> No
	<br />
	<?php } ?>

	<label for="userfile">New Photo<br />(replaces existing photo):</label>
	<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
	<input type="file" name="userfile" id="userfile"  tabindex="8" title="userfile" />
	<br />

	<label>Photo Alt Text:</label>
	<input type="text" name="photo_alt_text" size="30" tabindex="9" value="<?php print $row['product_photo_alt_text'];?>"/>
	<br />

	<label>Ingredients:</label>
	<input type="text" name="ingredients" size="30" tabindex="10" value="<?php print $row['product_ingredients'];?>"/>
	<br />
	<input type="hidden" name="product_id" value="<?php print $_SESSION['product_id']; ?>" />


	<input type="hidden" name="photo" size="30" value="<?php print $row['product_photo'];   ?>"/>
	<input type="submit" name="submit" tabindex="11" value="submit"/></fieldset></form>
	</div>
  <?php

	} else {
		// delete product from the database
		if($_POST['delete'] == 'y') {

		$sql = 'DELETE FROM product
			WHERE product_id = '.$_SESSION['product_id'];

	//update existing product
	} else if(!empty($_POST['product_id'])){

	  $sql = "UPDATE product
			SET
			   product_name			          = '".$_POST['name']."',
			   product_description 		    = '{$_POST['description']}',
			   product_price	   		      = ".$_POST['price'].",
			   category_id	   			      = ".$_POST['category_id'].",
			   product_photo_alt_text 	  = '{$_POST['photo_alt_text']}',
			   product_ingredients	 	    = '{$_POST['ingredients']}'

			WHERE product_id			        = ".$_SESSION['product_id'];


	//add a new product
	}else if($problem == false){

	$sql = " INSERT INTO product (
			     product_name,
			     product_description,
			     product_price,
			     category_id,
			     product_photo_alt_text,
			     product_ingredients
			   )
			   VALUES (
			   	'{$_POST['name']}',
					'{$_POST['description']}',
					'{$_POST['price']}',
					'{$_POST['category_id']}',
					'{$_POST['photo_alt_text']}',
					'{$_POST['ingredients']}'

			)";


	}

	mysqli_query($db, $sql) or die(mysqli_error($db)."");

	//get product ID for use in upload_photo.inc.php
	if(mysqli_insert_id($db) > 0 ){
		$_POST['product_id'] = mysqli_insert_id($db);
	}
	upload_photo($db);
	header('Location: admin.php'); //redirect back to the admin page
	exit();
}
	/*print '<pre>';
	print_r($GLOBALS) ;
	print '</pre>';
	exit;*/

include('inc/footer2.php');

?>
