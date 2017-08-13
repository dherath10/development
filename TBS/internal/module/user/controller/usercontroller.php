<?php
if(!isset($_SESSION)){
session_start(); //Start a session
}
include '../model/user.php';
$obj=new user();

$action=$_REQUEST['action'];
if($action=="add"){
    
    $user_fname=$_POST['user_fname'];
    $user_lname=$_POST['user_lname'];
    $user_email=$_POST['user_email'];
    $user_name=$_POST['user_name'];
    $user_tel_no=$_POST['user_tel_no'];
    $role_id=$_POST['role_id'];
    $user_nic=$_POST['nic'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $district_id=$_POST['district_id'];
    
    $user_image=$_FILES['user_image']['name'];
    if($user_image!==""){
        $ui=$user_image;
        $tmp=$_FILES['user_image']['tmp_name'];
        
    }else{
        $ui="";
        $tmp="";
    }
    $r=$obj->addUser($user_fname,$user_lname,$user_email,$user_tel_no,$ui,$role_id,$user_nic,'Active',$dob,$gender,$district_id,$user_name,$tmp);
    if($r){
        $msg="A record has been Added...";
        $id=1;
       }else{
           $msg="A record has not been Added...";
           $id=0;
       }
       $m= base64_encode($msg);
       header("Location:../view/user.php?msg=$m&id=$id");
}


if($action=="Deactive"){
    $user_id=$_GET['id'];
    $r=$obj->statusDeactive($user_id);
    if($r){
        $msg="User has been deactivated";
    }  else {
        $msg="User has not been deactivated";
    }
    header("Location:../view/user.php");
}

if($action=="Active"){
    $user_id=$_GET['id'];
    $r=$obj->statusActive($user_id);
    if($r){
        $msg="User has been Activated";
    }  else {
        $msg="User has not been Activated";
    }
    header("Location:../view/user.php");
}

//For Updation
if($action=="update"){
    $page=$_GET['page'];
    $user_fname=$_POST['user_fname'];
    $user_lname=$_POST['user_lname'];
    $user_email=$_POST['user_email'];
    $user_id=$_GET['user_id'];
    $user_tel_no=$_POST['user_tel_no'];
    $role_id=$_POST['role_id'];
    $user_nic=$_POST['nic'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $district_id=$_POST['district_id'];
    
    $user_image=$_FILES['user_image']['name'];
    if($user_image!==""){
        $ui=$user_image;
        $tmp=$_FILES['user_image']['tmp_name'];
        
    }else{
        $ui="";
        $tmp="";
    }
    $r=$obj->updateUser($user_fname,$user_lname,$user_email,$user_tel_no,$ui,$role_id,$user_nic,'Active',$dob,$gender,$district_id,$user_id,$tmp);
    if($r){
        $msg="A record has been updated...";
        $id=1;
       }else{
           $msg="A record has not been updated...";
           $id=0;
       }
       $m= base64_encode($msg);
       header("Location:../view/user.php?msg=$m&id=$id&page=$page");
}
if($action=="search"){
    $key=$_POST['searchuser'];
    
$r=$obj->viewusersearch($key); 

}
////    $_SESSION['r']=$r;
//    header("Location:../view/usersearch.php?r=$r");
//}

if($action=="delete"){
    $user_id=$_REQUEST['id'];
    $r=$obj->Delete($user_id);
    if($r){
        $msg="A record has been Deleted...";
        $id=1;
       }else{
           $msg="A record has not been Deleted...";
           $id=0;
       }
       $m= base64_encode($msg);
       header("Location:../view/user.php?msg=$m&id=$id");
}

?>