<?php
 include'../../../common/session.php';
include '../model/booking_mod.php';
$obj=new booking();

$action=$_REQUEST['action'];
if($action=="add"){
    $title=$_POST['title'];
    $user_fname=$_POST['user_fname'];
    $user_lname=$_POST['user_lname'];
    $user_nic=$_POST['nic'];
    $user_email=$_POST['user_email'];
    $user_tel_no=$_POST['telno'];
    $from=$_POST['from'];
    $to=$_POST['to'];
    $date=$_POST['res_date'];
    $time=$_POST['res_time'];
    $class=$_POST['class'];
    $ac_type=$_POST['ac_type'];
    $remarks=$_POST['remarks'];
    
//    $nic=$_POST['user_name'];
    //$user_fname=$_POST['user_fname'];
//    $role_id=$_POST['role_id'];
//    $dob=$_POST['dob'];
//    $gender=$_POST['gender'];
//    $district_id=$_POST['district_id'];
    
//    $user_image=$_FILES['user_image']['name'];
//    if($user_image!=""){
//        $ui=$user_image;
//        $tmp=$_FILES['user_image']['tmp_name'];
//    }else{
//        $ui="";
//        $tmp="";
//    }
    $r=$obj->addBooking($title,$user_fname,$user_lname,$user_email,$user_tel_no,$from,$to,$date,$time,$class,$ac_type,$remarks);
    if($r){
        $msg="A record has been added...";
            $id=1;
    }else{
        $msg="A record has not been added...";
                $id=0;
    }
      $m=base64_encode($msg);
       header("Location:../view/booking.php?msg=$m&id=$id");
    
    }

if($action=="search"){
    $key=$_POST['searchuser'];
    
    $r=$obj->viewusersearch($key);
    //$_SESSION['r']=$r;
    //header("Location:../view/usersearch.php");
}

if($action=="Deactive"){
    $user_id=$_GET['id'];
    $r=$obj->statusdeactive($user_id);
    if($r){
        $msg="User has been activated";
    }else{
        $msg="User has been Deactivated";
    }
    header("Location:../view/user.php");
}

if($action=="Active"){
    $user_id=$_GET['id'];
    $r=$obj->statusactive($user_id);
    if($r){
        $msg="User has been activated";
    }else{
        $msg="User has been Deactivated";
    }
    header("Location:../view/user.php");
}
//For upadate
if($action=="update"){
    $page=$_GET['page'];
    $user_fname=$_POST['user_fname'];
    $user_lname=$_POST['user_lname'];
    $user_email=$_POST['user_email'];
    $user_id=$_GET['user_id'];
    $user_tel_no=$_POST['user_tel_no'];
    //$user_fname=$_POST['user_fname'];
    $role_id=$_POST['role_id'];
    $user_nic=$_POST['nic'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $district_id=$_POST['district_id'];
    
    $user_image=$_FILES['user_image']['name'];
    if($user_image!=""){
        $ui=$user_image;
        $tmp=$_FILES['user_image']['tmp_name'];
    
    }else{
        $ui="";
        $tmp="";
    }
    $r=$obj->updateUser($user_fname,$user_lname,$user_email,$user_tel_no,$ui,$role_id,$user_nic,'Active',$dob,$gender,$district_id,$user_id, $tmp);
    if($r){
        $msg="A record has been updated...";
            $id=1;
    }else{
        $msg="A record has not been updated...";
                $id=0;
    }
        $m=base64_encode($msg);
       header("Location:../view/user.php?msg=$m&id=$id&page=$page");
    }

    //To delete a record
    if($action=="Delete"){
        $res_id=$_GET['id'];
        $result=$obj->deleteBooking($res_id);
        if($result){
            $msg="A record has been deleted.";
        }else{
            $msg="A record has not been deleted.";
        }
        $m= base64_encode($msg);
        header("Location:../view/booking.php?msg=$m");
    }
?>

