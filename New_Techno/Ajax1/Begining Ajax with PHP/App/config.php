<?php
//config.php
// Max dimensions of generated images.
$GLOBALS['maxwidth'] = 500;
$GLOBALS['maxheight'] = 200;
// Max dimensions of generated thumbnails.
$GLOBALS['maxwidththumb'] = 60;
$GLOBALS['maxheightthumb'] = 60;
// Where to store the images and thumbnails.
$GLOBALS['imagesfolder'] = "images";
$GLOBALS['thumbsfolder'] = "images/thumbs";
// Allowed file types and mime types
$GLOBALS['allowedmimetypes'] = array('image/jpeg',
'image/pjpeg',
'image/png',
'image/gif');
$GLOBALS['allowedfiletypes'] = array(
'jpg' => array('load' => 'ImageCreateFromJpeg',
'save' => 'ImageJpeg'),
'jpeg' => array('load' => 'ImageCreateFromJpeg',
'save' => 'ImageJpeg'),
'gif' => array('load' => 'ImageCreateFromGif',
'save' => 'ImageGif'),
'png' => array('load' => 'ImageCreateFromPng',
'save' => 'ImagePng')
);

// Number of images per row in the navigation.
$GLOBALS['maxperrow'] = 7;
?>
Listing 7-4. The File Containing the PHP Functions to Be Used in the Gallery
(functions.php)
<?php
// functions.php
// A function to create an array of all the images in the folder.
function getImages()
{
$images = array();
if (is_dir($GLOBALS['imagesfolder'])) {
$files = scandir ($GLOBALS['imagesfolder']);
foreach ($files as $file) {
$path = $GLOBALS['imagesfolder'] . '/' . $file;
if (is_file($path)) {
$pathinfo = pathinfo($path);
if (array_key_exists($pathinfo['extension'],
$GLOBALS['allowedfiletypes']))
$images[] = $file;
}
}
}
return $images;
}
// Calculate the new dimensions based on maximum allowed dimensions.
function calculateDimensions($width, $height, $maxWidth, $maxHeight)
{
$ret = array('w' => $width, 'h' => $height);
$ratio = $width / $height;

if ($width > $maxWidth || $height > $maxHeight) {
$ret['w'] = $maxWidth;
$ret['h'] = $ret['w'] / $ratio;
if ($ret['h'] > $maxHeight) {
$ret['h'] = $maxHeight;
$ret['w'] = $ret['h'] * $ratio;
}
}
return $ret;
}
// A function to change the size of an image.
function createThumb($img, $maxWidth, $maxHeight, $ext = '')
{
$path = $GLOBALS['imagesfolder'] . '/' . basename($img);
if (!file_exists($path) || !is_file($path))
return;
$pathinfo = pathinfo($path);
$extension = $pathinfo['extension'];
if (!array_key_exists($extension, $GLOBALS['allowedfiletypes']))
return;
$cursize = getImageSize($path);
$newsize = calculateDimensions($cursize[0], $cursize[1],
$maxWidth, $maxHeight);
$newfile = preg_replace('/(\.' . preg_quote($extension, '/') . ')$/',
$ext . '\\1', $img);
$newpath = $GLOBALS['thumbsfolder'] . '/' . $newfile;
$loadfunc = $GLOBALS['allowedfiletypes'][$extension]['load'];
$savefunc = $GLOBALS['allowedfiletypes'][$extension]['save'];
$srcimage = $loadfunc($path);
$dstimage = ImageCreateTrueColor($newsize['w'], $newsize['h']);

ImageCopyResampled($dstimage, $srcimage,
0, 0, 0, 0,
$newsize['w'], $newsize['h'],
$cursize[0], $cursize[1]);
$savefunc($dstimage, $newpath);
return $newpath;
}
?>                                                                          