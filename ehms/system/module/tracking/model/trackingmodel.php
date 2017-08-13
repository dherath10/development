<?php
include '../../../common/dbconnection.php';
$ob=new dbconnection();
$con=$ob->connection();
$GLOBALS['con']=$con;//Globalize value

class tracking{
    
    function viewTracking(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM log l,user u WHERE u.user_id=l.user_id"
                . " ORDER BY l.log_id DESC";
        $result=$con->query($sql);
        return $result;
        
    }
}
?>

