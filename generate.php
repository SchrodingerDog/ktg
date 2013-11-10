<?php
header('Content-type: image/jpeg');

if (isset($_GET['image']) and isset($_GET['dir']) and isset($_GET['m'])) {
	$image = $_GET['image'];
	$dir = $_GET['dir'];
	$m = $_GET['m'];

	$imageSize = getimagesize($dir.'/'.$image);
	
	$imageWidth = $imageSize[0];
	$imageHeight = $imageSize[1];

	$newSize = ($imageWidth + $imageHeight)/(($imageHeight/$m)*$imageWidth);

	$newWidth = $imageWidth*$newSize;
	$newHeight = $imageHeight*$newSize;
	
	$newImage = imagecreatetruecolor($newWidth, $newHeight);
	$oldImage = imagecreatefromjpeg($dir.'/'.$image);

	imagecopyresized($newImage, $oldImage, 0, 0, 0, 0, $newWidth, $newHeight, $imageWidth, $imageHeight);
	imagejpeg($newImage,$dir.'/thumbs/'.$image);		

}
?>