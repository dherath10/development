<?php
//Login class
class login{
    //To check username and password
    function validateLogin($u,$p){
        $con=$GLOBALS['con']; //To get connection string
        
        $sql="SELECT * FROM login l,user u,role r "
                . "WHERE l.username='$u' AND l.password='$p' "
                . "AND u.role_id=r.role_id AND u.user_id=l.user_id";
        $result=$con->query($sql); //To excute the query
        return $result;
    }
    
    
}

class module{
    
    function getModule($role_id){
        $con=$GLOBALS['con']; //To get connection string
        $sql="SELECT * FROM module_role WHERE role_id='$role_id'";
        $result=$con->query($sql); //To excute the query
        $arr=array();
        while($row=$result->fetch_assoc()){
            array_push($arr, $row['module_id']);
            
        }
        
        return $arr;
    }
    
}

class log{
    function insertLog($log_ip,$user_id){
        $con=$GLOBALS['con']; 
        $sql="INSERT INTO log VALUES('',NOW(),'','$log_ip','in','$user_id')";
        $result=$con->query($sql);
        $log_id=$con->insert_id;
        return $log_id;
        
    }
    
    function updateLog($log_id){
        $con=$GLOBALS['con']; 
        $sql="UPDATE log SET log_out=NOW() WHERE log_id='$log_id'";
        $result=$con->query($sql);
        
    }
    
}


?>
