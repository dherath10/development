<?php
if(!isset($_SESSION)){
session_start(); //Start a session
}
include '../model/vehiclemodel.php';
$obj=new vehicle();

$action=$_REQUEST['action'];

if($action=="make"){
    $make=$_POST['make_name'];
    $result=$obj->addMake($make);
    header("Location:../view/addvehicle.php");
    
}
if($action=="model"){
    $make_id=$_POST['make_id'];
        $model_name=$_POST['model_name'];
            $class_id=$_POST['class_id'];
    $result=$obj->addModel($make_id,$model_name,$class_id);
    header("Location:../view/addvehicle.php");
    
}

if($action=="add"){
    $make_id=$_POST['make_id'];
    $model_id=$_POST['model_id'];
    $v_no=$_POST['v_no'];
    $e_no=$_POST['e_no'];
     $c_no=$_POST['c_no'];
    $nos=$_POST['nos'];
    $v_ac=$_POST['v_ac'];
    $ftype=$_POST['ftype'];
    //$v_image=$_POST['v_image'];
    $v_trans=$_POST['v_trans'];
   $owner_id=$_POST['title'];
   
   $r=$obj->checkOwner($owner_id);
   $nor=$r->num_rows;
   if($nor>=1){
       $arr=  explode('-', $owner_id);
        $owner_id=$arr[1];
       
   }else{
       $re=$obj->addOwner($owner_id);
       $owner_id=$con->insert_id;
       
    } 
    $result=$obj->addVehicle($make_id,$model_id,$v_no,$c_no,$e_no,
            $nos,$v_ac,$ftype,$v_img,$v_trans,$owner_id);
    
  
   header("Location:../view/vehicle.php");
    
}
    
    ?>