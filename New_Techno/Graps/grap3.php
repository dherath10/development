<?php
$myImage=ImageCreate(200,200);
$black=ImageColorAllocate($myImage,0,0,0);
$white=ImageColorAllocate($myImage,255,255,255);
$red=ImageColorAllocate($myImage,255,0,0);
$green=ImageColorAllocate($myImage,0,255,0);
$blue=ImageColorAllocate($myImage,0,0,255);

ImageFilledArc($myImage,100,100,200,100,0,75,$red,IMG_ARC_PIE);
ImageFilledArc($myImage,100,100,200,100,76,180,$green,IMG_ARC_PIE);
ImageFilledArc($myImage,100,100,200,100,181,360,$blue,IMG_ARC_PIE);

header("Content-type:image/png");
ImagePng($myImage);

ImageDestroy($myImage);
?>

