<?php

function upload_photo($db){

  $thumb = '';
  $extension = NULL;

  $directory = dirname($_SERVER['SCRIPT_FILENAME']);
  //$directory = dirname ($directory);// this is added for Bruce. Because my files are in the "assignment example" sub-folder,
  //I need to go up one level. Students should not need this line.
  //$directory = dirname($_SERVER(['SCRIPT FILENAME'], 2); // PHP 7 version
  define('IMAGE_PATH',$directory.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR);
  //students should replace "images" with the names of their image folders.

  //////DELETE PHOTO FILES//////
  if(($_POST['delete_photo'] == 'yes') || (!empty($_POST['photo']) && (is_uploaded_file($_FILES['userfile']['tmp_name']) || ($_POST['delete'] == 'y')))) {
	  $extension = pathinfo($_POST['photo'], PATHINFO_EXTENSION); // get photo file extension

	  if(file_exists(IMAGE_PATH.$_POST['photo'])) {
			  unlink(IMAGE_PATH.$_POST['photo']);
	  }
	  if(file_exists(IMAGE_PATH.'master_'.$_POST['product_id'].'.'.$extension)){
			  unlink(IMAGE_PATH.'master_'.$_POST['product_id'].'.'.$extension);
	  }
  }
  /*print '<pre>';
  print_r($_FILES) ;
  print '</pre>';
  exit;*/


  // / / / / / CHECK FOR FILE UPLOAD / / / / / / /

  if(is_uploaded_file($_FILES['userfile']['tmp_name']) && ($_POST['delete'] != 'y')) {
  	// if file is uploaded & not deleting the product . . .

	  // see http://www.php.net/manual/en/features.file-upload.post-method.php

	  // / / / / / MOVE UPLOADED FILE TO IMAGES FOLDER / / / / / / /
	  $extension = pathinfo(strtolower($_FILES['userfile']['name']), PATHINFO_EXTENSION); // get file extension
	  if($extension == 'jpeg') {$extension = 'jpg';}

	  switch($extension){
      case 'jpg':
		  case 'gif':
		  case 'png':
			$master = 'master_'.$_POST['product_id'].'.'.$extension;
			$thumb = 'thumb_'.$_POST['product_id'].'.'.$extension;
			break;
	    default:
		  print 'Error: The image could not be uploaded . It must be in
		  .jpg, .jpeg, .gif, or .png format.';
		  exit;
	  }

	  ///MOVE THE FILE OVER AND GIVE IT A NAME////
	  move_uploaded_file($_FILES['userfile']['tmp_name'], IMAGE_PATH.$master);



	  ////COPY IMAGE FOR MAKING RESIZED PHOTO //////
	  copy (IMAGE_PATH.$master, IMAGE_PATH.$thumb);

	  /////RESIZE/RESAMPLE UPLOADED PHOTO, IF NEEDED /////
	  $uploadedsize = getimagesize(IMAGE_PATH.$thumb);
	  $width = $uploadedsize[0];
	  $height = $uploadedsize[1];

	  // set maximum height and width for design template
	  define('MAX_WIDTH', 632);
	  define ('MAX_HEIGHT', 632);

	  if(($width > MAX_WIDTH) || ($height > MAX_HEIGHT)) { // maximum allowed dimensions for de Sign template
	  ////RESIZE PHOTO TO FIT DESIGN TEMPLATE / / / / / / /
		  $widthHeightRatio = $width/$height; // width /height ratio of uploaded image
		  if((MAX_WIDTH/$widthHeightRatio) >= MAX_HEIGHT) { // calculate if height of uploaded image is too large
			  $newHeight = MAX_HEIGHT;
			  $newWidth = floor(MAX_HEIGHT * $widthHeightRatio);
		  } else if((MAX_HEIGHT * $widthHeightRatio) > MAX_WIDTH) {  //calculate if width of uploaded image is too large
			  $newWidth = MAX_WIDTH;
			  $newHeight = floor(MAX_WIDTH/$widthHeightRatio);
		  }

	  } else { // if the dimensions of the uploaded image are not too large, use actual dimensions
		  $newHeight = $height;
		  $newWidth = $width;
	  }

	  $img_copy = imagecreatetruecolor($newWidth, $newHeight);

	  // Process .jpg file format
	  if(strcmp($extension, 'jpg') == 0) {
		  $img = imagecreatefromjpeg(IMAGE_PATH.$thumb);

		  imagecopyresampled($img_copy, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
		  imagejpeg($img_copy, IMAGE_PATH.$thumb);
	  }
	    // Process .png file format (preserves transparency)
	  if(strcmp($extension, 'png') == 0 ){
		  $img = imagecreatefrompng(IMAGE_PATH.$thumb);

		  imagealphablending($img_copy, false);
		  $color = imagecolorallocatealpha($img_copy, 0, 0, 0, 127);
		  imagefill($img_copy, 0, 0, $color);
		  imagesavealpha($img_copy, true);

		  imagecopyresampled($img_copy, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
		  imagepng($img_copy, IMAGE_PATH.$thumb);
	  }
	 // Process ... gif file format (preserves transparency)
	  if(strcmp($extension, 'gif') == 0) {
		  $img = imagecreatefromgif(IMAGE_PATH.$thumb);

		  $transindex = imagecolortransparent($img);
		  $transcol = imagecolorsforindex($img, $transindex);
		  $transindex = imagecolorallocatealpha($img_copy, $transcol['red'], $transcol['green'], $transcol['blue'], 127);
		  imagefill($img_copy, 0, 0, $transindex);
		  imagecolortransparent($img_copy, $transindex);

		  imagecopyresampled($img_copy, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
		  imagegif($img_copy, IMAGE_PATH.$thumb);
	  }
	  imagedestroy($img_copy);

	 	// Update photo name in database
	  $sql = "UPDATE product
            SET product_photo = '$thumb',
					  larger_photo  = '$master'
            WHERE product_id = {$_POST['product_id']}";

	  //$sql = "UPDATE product SET product_photo = '$thumb' WHERE product_id = {$_POST['product_id']}";

	 /*print '<pre>';
	 print_r(get_defined_vars()) ;
	 print '</pre>';
	 exit;*/

	 mysqli_query($db, $sql) or die(mysqli_error($db)."<br />SQL: $sql");

	 //mysqli_query($db, $sq1) or die(mysqli_error($db)."<br />SQL: $sql");

  }



	/* Resources:
	Preserving gif & png transparency: http://stackoverflow.com/questions/6819822/how-to-allow-upload-transparent-gifor-png-with php
	- also see comments at http://us.php.net/manual/en/function.imageCopyresampled.php - http://php.net/manual/en/function.imagecopyresampled.php#89987
	How to get image type: http://u.s.php.net/manual/en/function.getimageSize.php(retrieves array of image details, including imagetype constants)
	http://ils.php.net/manual/en/function.exif-imagetype.php (see list of image type Constants)
	*/
}
?>
