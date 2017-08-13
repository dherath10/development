<?php
$action=$_GET['action'];
include '../../product/model/productmodel.php';
$ob=new product();
if($action=="add"){
    $p_name=$_POST['p_name'];
    $p_type=$_POST['p_type'];
    echo $cat_id=$_POST['cat_id'];
    echo $p_color=$_POST['p_color'];
    $p_price=$_POST['p_price'];
    print_r($p_size=$_POST['p_size']);
    
   
   
    $nor=$ob->checkProductName($p_name);
    
     $color_id=$ob->checkColorName($p_color);
     
     if($color_id==0){
         $color_id=$ob->addColor($p_color);
     }
    
    if($nor==0){    
    $r=$ob->addProduct($p_name,$p_type,$cat_id,$color_id,$p_price);
    if($r){
        //echo "Added";
        $p_id=$con->insert_id; 
        
        //To call addUserRights function
        foreach ($p_size as $e){
        $re=$ob->addProductSize($p_id, $e);        
        }
      
        $msg="A record has been added....";
        $status=1;
        
        //Adding user image
        if($_FILES['p_image']['name']!=""){ //If a file has been uploaded 
            $image_name=$_FILES['p_image']['name'];//To get file name
$image_name_tmp=$_FILES['p_image']['tmp_name'];//To get file name temp location
        $image_new=$p_id."_".$image_name; //New Image Name
        $path="../../../images/product_images/".$image_new; //New Path to move
        move_uploaded_file($image_name_tmp, $path); //To move the file
        //To update an image in user table
        $ob->updateImage($p_id,$image_new);
               
        }
        
        
        
    }else{
         $msg="A record has not been added...."; //User not addded.......
         $status=0;
    }        
        $m=  base64_encode($msg);
       header("Location:../view/product.php?m=$m&status=$status");
    }else{
        $msg="Existing Product Name";
        $m=base64_encode($msg); //To encode 
        $status=0; //To define an error
        header("Location:../view/addproduct.php?m=$m&status=$status");
    } 
    
    
}

if($action=="delete"){
    $p_id=$_GET['p_id'];
    
    $result=$ob->deleteProduct($p_id); 
    if($result){
        $msg="Product ID : ".$p_id." has been deactivated";
        $status=1;
    }else{
        $msg="Product ID : ".$p_id." has not been deactivated";
        $status=0;
    }
    $m=base64_encode($msg);
    header("Location:../view/product.php?m=$m&status=$status&page=$page");
}
