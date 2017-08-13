<?php
include '../../../common/dbconnection.php';
$ob=new dbconnection();
$con=$ob->connection();
$GLOBALS['con']=$con;

class track{
    
    function viewAllTracking(){
         $con=$GLOBALS['con'];
 $sql="SELECT * FROM log ORDER BY log_id DESC";
 $result=$con->query($sql); //To execute query
 return $result;
        
    }
    
    
}



?>
