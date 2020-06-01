<?php
$css = "css/style2.css";
$page_title = "Sable — Shopping";
include('inc/header2.php');

//This query gets the product_id from the url
$sql = "SELECT product_id, larger_photo, product_description, product_price, product_name FROM product WHERE product_id = {$_GET['product_id']}";
$result = mysqli_query($db, $sql) or die(mysqli_error($db)."<br />SQL: $sql");



if($row = mysqli_fetch_assoc($result)){
?>
<div id="back-to-shopping">
<a onclick="goBack()"><i class="fas fa-arrow-left"></i>&nbsp;BACK TO SHOP</a>
</div>
<div class="individual-products-container">
<div id="row1">
<p id="individual-product-name"><?php print $row['product_name'];?></p>
</div>
<div id="row2">
<img src="images/<?php print $row['larger_photo'];?>" alt="<?php print $row['product_photo_alt_text']; ?>"/>
</div>
<div id="row3">
<p class="price_desc">$<?php print $row['product_price'];?><br /><br /><?php print $row['product_description'];?></p>

<form class="add-to-cart" action="add_cart.php" method="post">
	<p>
	<select name="quantity">
		<?php
		for($i=1; $i < 31; $i++) {
			print "\n".'<option value="'.$i.'">'.$i.'</option>';

		}

		?>
	</select>
    <input type="hidden" name="pid" value="<?php print $row['product_id'];  ?>"/>
    <input name="submit" type="submit" value="ADD TO CART" id="add-button" />
	</p>
</form>
</div>


<?php
}
?>
</div> <!--end of individual-products-container-->
<?php
include('inc/footer2.php');
?>
