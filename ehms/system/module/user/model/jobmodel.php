<?php
include '../../../common/dbconnection.php';
$ob=new dbconnection();
$con=$ob->connection();
$GLOBALS['con']=$con;//Globalize value

class job{
    
    
    function deleteJob($jd_id){
        $con=$GLOBALS['con'];
        $sql="DELETE FROM jobdetail WHERE jd_id='$jd_id'";
        $result=$con->query($sql);
        return $result;
    }
    
}


?>