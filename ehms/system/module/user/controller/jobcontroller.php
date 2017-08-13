<?php
include '../model/jobmodel.php';
$ob=new job();

if($_GET['action']=="delete"){
    $jd_id=$_GET['jd_id'];
    $user_id=$_GET['user_id'];
    $result=$ob->deleteJob($jd_id);
    
    if($result){
        $msg="A Job Detail has been deleted.... ";
        $id=1;
        
    }else{
        $msg="A Job Detail has not been deleted.... ";
        $id=0;
    }
    
    $m=  base64_encode($msg);
    header("Location:../view/addjobdetails.php?msg=$m&id=$id&user_id=$user_id");
    
}
