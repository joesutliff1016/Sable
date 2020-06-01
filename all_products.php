<?php
$page_title = "Sable — All Products";
include('inc/header2.php');
?>
<div id="desktop">
<ul>
	<li><a class="urhere" href="http://www.joesutliffwebdev.com/NorthWestSoaps/all_products.php?">ALL</a></li>
	<li><a class="nothere" href="http://www.joesutliffwebdev.com/NorthWestSoaps/product_page.php?category_id=6">HAND SOAPS</a></li>
	<li><a class="nothere" href="http://www.joesutliffwebdev.com/NorthWestSoaps/product_page.php?category_id=2">BATH SOAPS</a></li>
	<li><a class="nothere" href="http://www.joesutliffwebdev.com/NorthWestSoaps/product_page.php?category_id=7">LOTIONS</a></li>
</ul>
</div>
<div id="dropdwn-container">
<div class="dropdown">
	<button type="button" id="target" class="dropbtn"></button>
	<div id="myDropdown" class="dropdown-content">
	<a class="urhere" href="http://www.joesutliffwebdev.com/NorthWestSoaps/all_products.php?">ALL</a>
	<a class="nothere" href="http://www.joesutliffwebdev.com/NorthWestSoaps/product_page.php?category_id=6">HAND SOAPS</a>
	<a class="nothere" href="http://www.joesutliffwebdev.com/NorthWestSoaps/product_page.php?category_id=2">BATH SOAPS</a>
	<a class="nothere" href="http://www.joesutliffwebdev.com/NorthWestSoaps/product_page.php?category_id=7">LOTIONS</a>
</div>
</div>
</div>
<div class="products-container">

<?php

$sql = 'SELECT * FROM product';
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
