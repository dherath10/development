<?php
include '../../../common/dbconnection.php';
$ob=new dbconnection();
$con=$ob->connection();
$GLOBALS['con']=$con;





class order{
    
    
    
    function checkSupName($sup_name){
         $con=$GLOBALS['con'];//get connection string
             $sql="SELECT * FROM supplier WHERE sup_name='$sup_name'";
             $result=$con->query($sql);
       
             return $result;
        
    }
    
    function addSupplier($sup_name){
         $con=$GLOBALS['con'];//get connection string
             $sql="insert into supplier (sup_name) VALUES('$sup_name')";
             $result=$con->query($sql);
       
             return $result;
        
    }
    
    function addoRDER($sup_id){
         $con=$GLOBALS['con'];//get connection string
             $sql="insert into purchase_order VALUES('','$sup_id',now(),'','pending')";
             $result=$con->query($sql);
       
             return $result;
        
    }
    
    
    
}

?>
