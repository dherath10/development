<?php
include 'dbconnection.php'; //DB connection
$obj=new dbconnection();//To create an object using dbconnection class
$con=$obj->connection();//To call a function called connection
$GLOBALS['con']=$con; //To create a global variable any where it can be used
class query{
    
    function disRole(){
        $con=$GLOBALS['con'];//Get the conection string from superglobal varibal
        $sql="SELECT * FROM role";//SQL
        $result=$con->query($sql);//To execute sql
        return $result;//Once sql is executed result will be returned....
        
    }
    
    function viewUser($user_id){
        $con=$GLOBALS['con'];//Get the conection string from superglobal varibal
    $sql="SELECT * FROM user u,role r,login l WHERE u.user_id='$user_id'"
            . "AND u.user_id=l.user_id and r.role_id=u.role_id";//SQL
        $result=$con->query($sql);//To execute sql
        return $result;//Once sql is executed result will be returned....
        
    }
    function viewJob($user_id){
        $con=$GLOBALS['con'];//Get the conection string from superglobal varibal
        $sql="SELECT * FROM jobdetail WHERE user_id='$user_id'";//SQL
        $result=$con->query($sql);//To execute sql
        return $result;//Once sql is executed result will be returned...
    }
    
    function viewTimeSlot($id){
        $con=$GLOBALS['con'];//Get the conection string from superglobal varibal
        $sql="SELECT * FROM time_slot WHERE ts_id='$id'";//SQL
        $result=$con->query($sql);//To execute sql
        return $result;//Once sql is executed result will be returned...
    }
 
    
    function getScheduleInfo($sch_id){
         $con=$GLOBALS['con'];
         $sql="SELECT * FROM schedule s,donor d,time_slot ts "
                 . "WHERE s.ts_id=ts.ts_id AND s.donor_id=d.donor_id "
                 . "AND s.sch_id='$sch_id'";                 
         $result=$con->query($sql);
         $row=$result->fetch_assoc();
         return $row;
        
    }
    
     function addLogOut($session_id){
         $con=$GLOBALS['con'];
         $sql="UPDATE log SET log_out=now(),log_status='loggedout' WHERE session_id='$session_id'" ;                 
         $result=$con->query($sql);         
         return $result;
        
    }
    
    function viewActiveUser(){
        $con=$GLOBALS['con'];//Get the conection string from superglobal varibal
    $sql="SELECT * FROM user WHERE user_status='Active'";//SQL
        $result=$con->query($sql);//To execute sql
        return $result;//Once sql is executed result will be returned....
        
    }
    
    function getLogCount($user_id,$date){
        $con=$GLOBALS['con'];//Get the conection string from superglobal varibal
    $sql="SELECT * FROM log WHERE log_in LIKE '$date%' AND user_id='$user_id'";//SQL
        $result=$con->query($sql);//To execute sql
        $nor=$result->num_rows;
        return $nor;
        
    }
    
    
}



?>

