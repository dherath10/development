<?php
if(!isset($_SESSION)){
session_start(); //Start a session
}
include '../model/notificationmodel.php';
$obj=new notification();

$action=$_REQUEST['action'];



if($action=="add"){
    $msg=$_POST['msg'];
    $no_cat=$_POST['no_cat'];

   $role_id=$_POST['role_id'];
   
   $result=$obj->addNotification($msg,$no_cat);
   $no_id=$con->insert_id;
   $resultu=$obj->getUsers($role_id);
   while($rowu=$resultu->fetch_assoc()){
       $user_id=$rowu['user_id'];
       $obj->addUserNotification($user_id,$no_id);
   }
  
   
    $msg="Add users to notification";
         $m=base64_encode($msg);
   header("Location:../view/notification.php?msg=$m");
   
    
}
    
    ?>