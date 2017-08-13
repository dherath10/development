<?php
if(!isset($_SESSION)){ //If session is not existing
    session_start(); //Start the sesstion
}
//Server side validation
if($_POST['uname']!="" && $_POST['pass']!=""){
//Getting date from index page(Login)
$uname=$_POST['uname'];
$pass=sha1($_POST['pass']); //Encryption - Password
include '../model/login.php'; //To get login class
$obj=new login();  //Instantiate an Object 
$r=$obj->loginValidate($uname, $pass); //Call a method in Class
$nor=$r->num_rows; //No of records 
if($nor>0){//1 record
    $row=$r->fetch_assoc(); //A record has been assigned into an array
    $_SESSION['userinfo']=$row; //An array Assigns into a session
    $_SESSION['session_id']=time()."_".$row['user_id']; //Unquie ID
    
    //To get IP address
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
    $ip = $_SERVER['REMOTE_ADDR'];
    }
     
  //calling a function for adding log details  
  $obj->addLog($ip,$_SESSION['session_id'],$row['user_id']);
    
    
    
    
    header("Location:../view/dashboard.php");
}else{ //0 record
    $msg="Invalid User Name or Passpord";
     header("Location:../view/index.php?msg=$msg");
}

}else{
    $msg="Blank User Name or Password";
    header("Location:../view/index.php?msg=$msg");
    
}


?>
