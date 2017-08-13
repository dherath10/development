<?php
/**************************************************************
* This script is brought to you by Vasplus Programming Blog
* Website: www.vasplus.info
* Email: info@vasplus.info
****************************************************************/


$upload_location = "uploads/";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
	$name = $_FILES['vasPhoto_uploads']['name'];
	$size = $_FILES['vasPhoto_uploads']['size'];
	
	$allowedExtensions = array("jpg","jpeg","gif","png");  //Allowed file types
	
		
				  $actual_image_name = $name; // This could be a random name such as rand(125678,098754).'.gif';
					 
				  if(move_uploaded_file($_FILES['vasPhoto_uploads']['tmp_name'], $upload_location.$actual_image_name)) 
				  {
					  //Run your SQL Query here to insert the new image file named $actual_image_name if you deem it necessary
					  echo '<span><img src="'.$upload_location.$actual_image_name.'" width="150" height="100"></span><br clear="all" /><br clear="all" />';
				  }
				  else 
				  {
					  echo "<div class='info' style='width:500px;'>Sorry, Your Image File could not be uploaded at the moment. <br>Please try again or contact the site admin if this problem persist. Thanks.</div><br clear='all' />";
				  }
			 
}
?>