<?php
include '../../../common/dbconnection.php';
$ob=new dbconnection();
$con=$ob->connection();
$GLOBALS['con']=$con;//Globalize value

class inquiry{
    
    function viewInquiry(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM inquiry ORDER BY in_id DESC";
        $result=$con->query($sql);
        return $result;
        
    }
    
    function updateSeen($in_id){
        $con=$GLOBALS['con'];
        $sql="UPDATE inquiry SET in_status='Seen' WHERE in_id='$in_id'";
        $result=$con->query($sql);
        return $result;
        
    }
    
    
}
?>

