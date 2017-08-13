<?php
//process_upload.php
//Allowed file MIME types.
$allowedtypes = array ("image/jpeg","image/pjpeg","image/png","image/gif");
//Where we want to save the file to.
$savefolder = "images";
//If we have a valid file
if (isset ($_FILES['myfile'])){
//Then we need to confirm it is of a file type we want.
if (in_array ($_FILES['myfile']['type'], $allowedtypes)){
//Then we can perform the copy.
if ($_FILES['myfile']['error'] == 0){
$thefile = $savefolder . "/" . $_FILES['myfile']['name'];
if (!move_uploaded_file ($_FILES['myfile']['tmp_name'], $thefile)){
echo "There was an error uploading the file.";
} else {
//Signal the parent to load the image.
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="functions.js"></script>
</head>
<body onload="doneloading (parent,'<?=$thefile?>')">
<img src="<?=$thefile?>" />
</body>
</html>
<?php
}
}
}
}
?>