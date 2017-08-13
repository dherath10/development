<?php

class commonQuery{
    
    function viewModule($module_id){
        
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM module WHERE module_id='$module_id'";
        $result=$con->query($sql);
        $row=$result->fetch_assoc();
        return $row;
        
    }
    
    
    
}

