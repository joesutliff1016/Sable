<?php

$css = "css/style2.css";
$page_title = "Sable — Shopping";
include('inc/header2.php');

$sql = "SELECT name FROM category WHERE category_id = {$_GET['category_id']}";
$result = mysqli_query($db, $sql) or die(mysqli_error($db)."<br />SQL: $sql");
$row = mysqli_fetch_assoc($result);
$_SESSION['category_id'] = $_GET['category_id'];

?>
<div id="desktop">
<ul>
	<li><a href="http://www.joesutliffwebdev.com/NorthWestSoaps/all_products.php?" class="normal">ALL</a></li>
	<li><a href="http://www.joesutliffwebdev.com/NorthWestSoaps/product_page.php?category_id=6" class="<?php
	if($_SESSION['category_id'] == '6'){
		print 'add';
	}else{ print 'normal';}   ?>">HAND SOAPS</a></li>
	<li><a href="http://www.joesutliffwebdev.com/NorthWestSoaps/product_page.php?category_id=2" class="<?php
	if($_SESSION['category_id'] == '2'){
		print 'add';
	}else{ print 'normal';}   ?>">BATH SOAPS</a></li>
	<li><a href="http://www.joesutliffwebdev.com/NorthWestSoaps/product_page.php?category_id=7" class="<?php
	if($_SESSION['category_id'] == '7'){
		print 'add';
	}else{ print 'normal';}   ?>">LOTIONS</a></li>
</ul>
</div>
<div id="dropdwn-container">
<div class="dropdown">
<button type="button" id="target" class="<?php
	if($_SESSION['category_id'] == '6'){
		print 'dropbtn1';
	}
	else if($_SESSION['category_id'] == '2'){
		print 'dropbtn2';
	}
	else if($_SESSION['category_id'] == '7'){
		print 'dropbtn3';
	}
	else{
		print 'dropbtn';
	}
	 ?>"></button>
<div id="myDropdown" class="dropdown-content">
<a class="normal" id="all" href="http://www.joesutliffwebdev.com/NorthWestSoaps/all_products.php?">ALL</a>
<a class="<?php
if($_SESSION['category_id'] == '6'){
	print 'add';
}else{ print 'normal';}   ?>" href="http://www.joesutliffwebdev.com/NorthWestSoaps/product_page.php?category_id=6">HAND SOAPS</a>
<a class="<?php
if($_SESSION['category_id'] == '2'){
	print 'add';
}else{ print 'normal';}   ?>" href="http://www.joesutliffwebdev.com/NorthWestSoaps/product_page.php?category_id=2">BATH SOAPS</a>
<a class="<?php
if($_SESSION['category_id'] == '7'){
	print 'add';
}else{ print 'normal';}   ?>" href="http://www.joesutliffwebdev.com/NorthWestSoaps/product_page.php?category_id=7">LOTIONS</a>
</div>
</div>
</div>
<div class="products-container">

<?php
// get product data from database
$sql = "SELECT * FROM product WHERE category_id = {$_GET['category_id']}";
$result = mysqli_query($db, $sql) or die(mysqli_error($db)."<br />SQL: $sql");
while($row = mysqli_fetch_assoc($result)){
	if( !empty($row['larger_photo']) && file_exists('images/'.$row['larger_photo'])) {
		$photo_dimensions = getimagesize('/Images/'.$row['larger_photo']);
	}
	else {
		$photo_dimensions = array(3 => 'width="632" height="632"');

	}

?>
<div class="products">
<a href="individual_product_page.php?product_id=<?php print $row['product_id'];?>">
<img src="images/<?php print $row['larger_photo'];?>"
<?php print $photo_dimensions[3];?> alt="<?php print $row['product_photo_alt_text'];?>"/>
</a>
<p class="products-info"><?php print $row['product_name'];?><br /><?php print '$'; print $row['product_price'];?></p>
</div><!--end of products-->
<?php
}
?>
</div> <!--end of products-container-->




<?php
require('inc/footer2.php');
?>
