<?php
if(!isset($_SESSION)){
session_start(); //Start a session
}

if(isset($_POST['login'])){ //If login button clicked
//To get User name and password...

$uname=$_POST['uname'];
$pass=sha1($_POST['pass']); //One way encryption

include '../model/login.php'; //To call the login page
$obj=new login();
$result=$obj->loginvalidate($uname, $pass);
    $no=$result->num_rows;
    if($no==1){
        $row=$result->fetch_assoc();
        $_SESSION['user_info']=$row; //To store into an array
        $session_id=$row['user_id']."_".time();
     
//        TO get IP Address
if(!empty($_SERVER['HTTP_CLIENT_IP'])){
    $ip = $_SERVER['HTTP_CLIENT_IP'];
}elseif(!empty($_SERVER['HTTP_X_FORWADED_FOR'])){
    $ip = $_SERVER['HTTP_X_FORWADED_FOR'];
 }else{
     $ip = $_SERVER['REMOTE_ADDR'];
 }
 
    $obj->log($uname,$session_id,$ip);
    header("Location:../view/dashboard.php");
    }
    else{
        $msg="Invalid User Name or Password";
        $msg1= base64_encode($msg);
        header("Location:../view/index.php?msg=$msg1");
    }
}

?>
