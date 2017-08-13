<?php
include '../../../common/dbconnection.php';
$ob=new dbconnection();
$con=$ob->connection();
$GLOBALS['con']=$con;//Globalize value

class login{
    
    function loginValidate($u,$p){
      
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM login l,user u,role r WHERE l.username='$u'
              AND l.password='$p' AND l.user_id=u.user_id AND u.role_id=r.role_id";
        $result=$con->query($sql); //To execute the query
        return $result;
        
        
    } 
    
    function addLog($ip,$session_id,$user_id){
     $con=$GLOBALS['con'];
     $sql="INSERT INTO log VALUES"
             . "('',now(),'','$ip','Loggedin','$session_id','$user_id')";
       $result=$con->query($sql); //To execute the query
        return $result;   
        
    }
}


?>

