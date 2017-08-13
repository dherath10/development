<?php

class user{
    
    function displayAllUsers(){
        $con=$GLOBALS['con']; //To get connection string
        $sql="SELECT * FROM user u, role r WHERE u.role_id=r.role_id";
        $result=$con->query($sql);
        return $result;
        
    }
    
}

?>