<?php

if(!isset($GLOBAL['con'])){
include '../../../common/dbconnection.php';
$ob=new dbconnection();
$con=$ob->connection();
$GLOBAL['con']=$con; //to put con as a superglobal variable
}

class notification{
    
      
    
    function addNotification($msg,$no_cat){
    $con=$GLOBALS['con'];
$sql="INSERT INTO notification VALUES ('',now(),'common','$no_cat','Unseen','','$msg')";
        $result=$con->query($sql);
        return $result;
        
    }
    
    function addUserNotification($user_id,$no_id){
    $con=$GLOBALS['con'];
$sql="INSERT INTO user_notification VALUES ('$user_id','$no_id','Unseen')";
        $result=$con->query($sql);
        return $result;
        
    }
    
    
     
    
    function viewallNotification(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM notification ORDER BY no_id DESC";
        $result=$con->query($sql);
        return $result;
        
    }
    
    function viewNotificationlimit($page1){
         $con=$GLOBALS['con'];
        $sql="SELECT * FROM notification ORDER BY no_id DESC limit $page1,5";
        $result=$con->query($sql);
        return $result;
    }
    
    function getResCustomer($ref_id){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM reservation r,customer c"
                . " WHERE c.cus_id=r.cus_id AND r.res_id='$ref_id'";
        $result=$con->query($sql);
        return $result;
        
    }
    
    function getUsers($role_id){
        
        $con=$GLOBALS['con'];
        if($role_id==0){
        $sql="SELECT * FROM user";
        }else{
           $sql="SELECT * FROM user WHERE role_id='$role_id'"; 
        }
        $result=$con->query($sql);
        return $result;
        
    }
    
    
}

?>
