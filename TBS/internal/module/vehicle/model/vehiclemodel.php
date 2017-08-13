<?php

if(!isset($GLOBAL['con'])){
include '../../../common/dbconnection.php';
$ob=new dbconnection();
$con=$ob->connection();
$GLOBAL['con']=$con; //to put con as a superglobal variable
}

class vehicle{
    
    function addMake($make){
        $con=$GLOBALS['con'];
        $sql="INSERT INTO make VALUES('','$make')";
        $result=$con->query($sql);
        return $result;
    }
    
    
     function addModel($make_id,$model_name,$class_id){
        $con=$GLOBALS['con'];
        $sql="INSERT INTO model VALUES('','$model_name','$make_id','$class_id')";
        $result=$con->query($sql);
        return $result;
    }
    
    function addVehicle($make_id,$model_id,$v_no,$c_no,$e_no,
            $nos,$v_ac,$ftype,$v_img,$v_trans,$owner_id){
    $con=$GLOBALS['con'];
$sql="INSERT INTO vehicle VALUES('','$make_id','$model_id','$v_no','$e_no',"
        . "'$c_no','$nos','$ftype','$v_ac','$v_img','$v_trans','$owner_id','Active')";
        $result=$con->query($sql);
        return $result;
        
    }
    
    function checkOwner($owner){
        $arr=  explode('-', $owner);
        $owner_id=$arr[1];
       $con=$GLOBALS['con'];
       $sqlo="SELECT * FROM owner WHERE owner_id='$owner_id'";
        $result=$con->query($sqlo);
        return $result;
        
    }
    
     function addOwner($owner_id){
    $con=$GLOBALS['con'];
$sql="INSERT INTO owner (owner_fname) VALUES('$owner_id')";
        $result=$con->query($sql);
        return $result;
        
    }
    
    function viewallVehicle(){
        $con=$GLOBALS['con'];
        $sql="SELECT * FROM vehicle v, owner w,make m, model mm "
                . "WHERE v.make_id=m.make_id AND v.owner_id=w.owner_id AND "
                . "v.model_id=mm.model_id ORDER BY v.v_id DESC";
        $result=$con->query($sql);
        return $result;
        
    }
    
    function viewVehiclelimit($page1){
         $con=$GLOBALS['con'];
        $sql="SELECT * FROM vehicle v, owner w, make m, model mm "
                . "WHERE v.owner_id=w.owner_id AND v.make_id=m.make_id AND "
                . "v.model_id=mm.model_id ORDER BY v.v_id DESC limit $page1,5";
        $result=$con->query($sql);
        return $result;
    }
    
    
}

?>
