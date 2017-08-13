<?php
$myImage=ImageCreate(150,150);
$black=ImageColorAllocate($myImage,0,0,0);
$white=ImageColorAllocate($myImage,255,255,255);
$red=ImageColorAllocate($myImage,255,0,0);
$green=ImageColorAllocate($myImage,0,255,0);
$blue=ImageColorAllocate($myImage,0,0,255);

ImageRectangle($myImage,15,15,40,55,$red);
ImageRectangle($myImage,40,55,65,95,$white);

header("Content-type:image/png");
ImagePng($myImage);

ImageDestroy($myImage);
?>

