<?php
include '../../../common/dbconnection.php';
$ob=new dbconnection();
$con=$ob->connection();
$GLOBALS['con']=$con;

class category{
    
    function viewCategory(){
         $con=$GLOBALS['con'];
 $sql="SELECT * FROM category ORDER BY cat_id DESC";
 $result=$con->query($sql); //To execute query
 return $result;
        
    }
    
    
}
class size{
    
    function viewSize(){
         $con=$GLOBALS['con'];
 $sql="SELECT * FROM size ORDER BY size_id";
 $result=$con->query($sql); //To execute query
 return $result;
        
    }
    
    
}


class product{
    function addProduct($p_name,$p_type,$cat_id,$p_color,$p_price){
          $con=$GLOBALS['con'];
    $sql="INSERT INTO product VALUES('','$p_name','$p_type','$cat_id',"
  . "'$p_color','$p_price','','Active')";
    $result=$con->query($sql);
    return $result;
    
    }
    
    
    function checkProductName($p_name){
         $con=$GLOBALS['con'];//get connection string
             $sql="SELECT * FROM product WHERE p_name='$p_name'";
             $result=$con->query($sql);
             $nor=$result->num_rows;
             return $nor;
        
    }
    function checkColorName($p_color){
         $con=$GLOBALS['con'];//get connection string
             $sql="SELECT * FROM color WHERE color_name='$p_color'";
             $result=$con->query($sql);
             $row=$result->fetch_assoc();
             $color_id=$row['color_id'];
             return $color_id;
        
    }
    
    
    
     function addProductSize($p_id, $e){
         $con=$GLOBALS['con'];//get connection string
        
            $sql="INSERT INTO product_size VALUES('$p_id','$e','')";
             $result=$con->query($sql);
             return $result;
        
    }
    
    function addColor($p_color){
         $con=$GLOBALS['con'];//get connection string
        
            $sql="INSERT INTO color VALUES('','$p_color','')";
             $result=$con->query($sql);
             $color_id=$con->insert_id;
             return $color_id;
        
    }
    
    
       //To upadte an image
    function updateImage($p_id,$image_name){
         $con=$GLOBALS['con'];//get connection string
         $sql="UPDATE product SET p_image='$image_name' WHERE p_id='$p_id'";
         $r=$con->query($sql);
         return $r;
        
    }
    
    function viewAllProduct(){
         $con=$GLOBALS['con'];
 $sql="SELECT * FROM product p,color c,category ca WHERE p.cat_id=ca.cat_id AND p.p_color=c.color_id ORDER BY p_id DESC";
 $result=$con->query($sql); //To execute query
 return $result;
        
    }
    
    function getSizes($p_id){
         $con=$GLOBALS['con'];
 $sql="SELECT * FROM product_size ps,size s WHERE ps.size_id=s.size_id AND ps.p_id='$p_id'";
 $result=$con->query($sql); //To execute query
 return $result;
    }
    
    function deleteProduct($p_id){
         $con=$GLOBALS['con'];
 $sql="DELETE p,ps FROM product p,product_size ps WHERE p.p_id='$p_id' AND ps.p_id=p.p_id";
 $result=$con->query($sql); //To execute query
 return $result;
    }
    
}

?>
