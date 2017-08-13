<?php
include '../model/schedulemodel.php';
$obj=new schedule();
$action=$_GET['action'];
if($action=="donor"){
    
    $donor_title=$_POST['tit'];
    $donor_name=$_POST['fname'];
    $donor_add=$_POST['address'];
    $donor_tel=$_POST['telno'];
    $donor_email=$_POST['email'];
    $donor_nic=$_POST['nic'];
    $status=$_POST['status'];
    $passwd=sha1($donor_tel);
    
    $id=$_GET['id'];
    $date=$_GET['date'];

    $r=$obj->addDonor($donor_title,$donor_name,
            $donor_add,$donor_tel,$donor_email,$donor_nic,$passwd);
    
    if($r){
        $donor_id=$con->insert_id;
     $result=$obj->addSchedule($date,$status,$donor_id,$id);
     $sch_id=$con->insert_id;
     if($result){
         header("Location:../view/viewschedule.php?sch_id=$sch_id");
     }else{
         $msg="A record has not been added";
         header("Location:../view/schedule.php?msg=$msg");
     }
     
    }
    
}


if($action=="add"){
    
    $title=$_POST['title'];
    $status=$_POST['status'];
    $id=$_GET['id'];
    $date=$_GET['date'];
    $arr=  explode('-', $title);
    $donor_name=$arr[0];
    $donor_tel=$arr[1];
    
    $donor_id=$obj->getDonorID($donor_name,$donor_tel);
    $result=$obj->addSchedule($date,$status,$donor_id,$id);
    $sch_id=$con->insert_id;
     if($result){
         header("Location:../view/viewschedule.php?sch_id=$sch_id");
     }else{
         $msg="A record has not been added";
         header("Location:../view/schedule.php?msg=$msg");
     }
    
    
    
}