<?php
if(!isset($_SESSION)){ //To check session not start
session_start(); //Start a session
}
$username=$_POST['username']; //To get Inputs from From
$password=sha1($_POST['password']); //Encryption 

include '../model/login.php'; //Server Side Include
$obj=new login(); //To create an object using login class
$r=$obj->loginvalidate($username, $password); //To call a method and passing parameters
$nor=$r->num_rows; //To count the rows
if($nor==1){
    
    $row=$r->fetch_assoc();// To create an array
    $user_id=$row['user_id'];
    $_SESSION['session_id']=$session_id=time()."_".$user_id;
    $_SESSION['userinfo']=$row;
    $date=date("Y-m-d"); //Date
    $t=date("H:i:s"); //Time
    $username=$row['username'];
    
    //To get IP address
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
    $ip = $_SERVER['REMOTE_ADDR'];
    }
    echo $ip;
    $obj->log($date, $t, $username, $session_id,$ip); //To call log function
    
    
    
    
    header("Location:../view/dashboard.php?ip=$ip"); //Redirection 
}else{
    $msg="Invalid User Name or Password";
    $msg1=  base64_encode($msg); //Encoding Mechanism
 header("Location:../view/index.php?msg=$msg1"); //Redirection n passing data
    //Through URL
}
?>